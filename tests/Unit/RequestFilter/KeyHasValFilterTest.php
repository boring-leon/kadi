<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Filters\KeyHasValue;

class KeyHasValFilterTest extends TestCase
{
    private function data(){
        return [
            $this->makeUser(['name' => 'Zach', 'email' => 'zach@yahoo.com']),
            $this->makeUser(['name' => 'John', 'email' => 'test@gmail.com']),
            $this->makeUser(['name' => 'Mark', 'email' => 'mark@onet.pl']),
        ];
    }

    public function testFilteringNotNullNamesOut(){
        request()->replace(['key' => 'email', 'val' => 'mark@onet.pl']);
        $result = $this->getCollectionResult()->pluck('name')->all();
        $this->assertEquals($result, ['Mark']);
    }

    private function getCollectionResult(){
        return (new KeyHasValue)->applyOnCollection(collect($this->data()));
    }

    private function makeUser(array $data){
        return (new \App\Models\User)->fill($data);
    }
}
