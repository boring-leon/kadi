<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Filters\IsNull;

class IsNullFilterTest extends TestCase
{
    private function data(){
        return [
            $this->makeUser(['name' => 'Zach', 'email' => 'zach@yahoo.com']),
            $this->makeUser(['name' => 'John', 'email' => 'test@gmail.com']),
            $this->makeUser(['name' => 'Mark', 'email' => null]),
        ];
    }

    public function testFilteringNotNullNamesOut(){
        request()->replace(['is_null' => 'email']);
        $result = $this->getCollectionResult()->pluck('name')->all();
        $this->assertEquals($result, ['Mark']);
    }

    private function getCollectionResult(){
        return (new IsNull)->applyOnCollection(collect($this->data()));
    }

    private function makeUser(array $data){
        return (new \App\Models\User)->fill($data);
    }
}
