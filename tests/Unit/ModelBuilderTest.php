<?php

namespace Tests\Unit;

use App\Services\Builders\ModelBuilder;
use Tests\TestCase;

class TestBuilder extends ModelBuilder
{
    protected function getData(){
        return ['name' => 'mark'];
    }

    protected function getAdditionalData(): array{
        return ['job_name' => 'IT'];
    }

    protected function transformData(array $data): array {
        return ['name' => strtoupper($data['name'])];
    }

    protected function getExcludedData() { return []; }
}

class ModelBuilderTest extends TestCase
{
    public function setUp() : void{
        $this->data = (new TestBuilder)->getModelData();
    }
    
    public function testMergingAdditionalData(){
        $this->assertEquals($this->data['job_name'], 'IT');
    }

    public function testTransformingData(){
        $this->assertEquals($this->data['name'], 'MARK');
    }
}
