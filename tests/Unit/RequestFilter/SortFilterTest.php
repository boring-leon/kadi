<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Filters\Sort;

class SortFilterTest extends TestCase
{
    private $data = [ 
        ['name' => 'Zach', 'id' => 2], ['name' => 'Arthur', 'id' => 1], ['name' => 'Marry', 'id' => 3 ]
    ];
    
    public function testSortingByDefaultNameKey(){
        request()->replace(['sort' => 'asc']);
        $names = $this->getCollectionResult()->pluck('name')->all();
        $this->assertEquals($names, ['Arthur', 'Marry', 'Zach']);
    }

    public function testSortingByCustomNameKey(){
        request()->replace(['sort' => 'asc', 'sort_by' => 'id']);
        $names = $this->getCollectionResult()->pluck('id')->all();
        $this->assertEquals($names, [1,2,3]);
    }

    private function getCollectionResult(){
        return (new Sort)->applyOnCollection(collect($this->data));
    }
}
