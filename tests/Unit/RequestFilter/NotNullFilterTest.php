<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Filters\NotNull;

class NotNullFilterTest extends TestCase
{
    private function data(){
        return [
            $this->makeUser(['name' => 'Zach']),
            $this->makeUser(['name' => 'Ally']),
            $this->makeUser(['name' => null]),
        ];
    }

    public function testFilteringNullNameOut(){
        request()->replace(['not_null' => 'name']);
        $result = $this->getCollectionResult()->pluck('name')->all();
        $this->assertEquals($result, ['Zach', 'Ally']);
    }

    private function getCollectionResult(){
        return (new NotNull)->applyOnCollection(collect($this->data()));
    }

    private function makeUser(array $data){
        return (new \App\Models\User)->fill($data);
    }
}
