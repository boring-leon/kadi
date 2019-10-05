<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Mappers\ConfigMapper;
use Illuminate\Support\Collection;

class TestMapper extends ConfigMapper
{
    const TEST_DATA = ["tom", "lucie", "scott"];
    protected $configKey = "test_data";
    
    protected function callback($name){
        return $this->toObject([
            'name' => strtoupper($name)
        ]);
    }

    protected function transformMapped($data){
        return collect($data);
    }
}

class ConfigMapperTest extends TestCase
{
    public function setUp(): void {
        parent::setUp();
        config(['test_data' => TestMapper::TEST_DATA]);
        $mapper = new TestMapper;
        $this->result = $mapper->getMappedItems();
    }

    public function testCallbackCanChangeItemDataType(){
        $this->assertIsObject($this->result->first());
    }

    public function testCallbackCanModifyItemValue(){
        $names = $this->result->map(function($item){
            return $item->name;
        })->toArray();
        $this->assertEquals($names, ["TOM", "LUCIE", "SCOTT"]);
    }

    public function testTransformationCanChangeEntireResultDataType(){
        $this->assertInstanceOf(Collection::class, $this->result);
    }
}
