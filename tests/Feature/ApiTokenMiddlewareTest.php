<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Http\Middleware\ApiToken;
use Illuminate\Http\Request;

class ApiTokenMiddlewareTest extends TestCase
{
    public function testRejectingUserWithWrongId(){
        $token = User::find(1, ['api_token'])->api_token;
        $response = $this->getResponse(['user_id' => -15, 'api_token' => $token]);
        $this->assertEquals($response->getStatusCode(), 422);
    }

    public function testRejectingUserWithWrongToken(){
        $wrongToken = User::find(1, ['api_token'])->api_token."wrong_token";
        $response = $this->getResponse(['user_id' => 1, 'api_token' =>  $wrongToken]);
        $this->assertEquals($response->getStatusCode(), 422);
    }

    public function testPassingCorrectUser(){
        $token = User::find(1, ['api_token'])->api_token;
        $response = $this->getResponse(['user_id' => 1, 'api_token' => $token ]);
        $this->assertEquals($response, "success");
    }

    private function getResponse(array $requestData){
        $request = new Request;
        $request->merge($requestData);
        $middleware = new ApiToken;
        return $middleware->handle($request, function ($request) {
            return "success";
        });
    }
}
