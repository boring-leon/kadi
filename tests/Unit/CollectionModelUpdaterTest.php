<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Cache\CollectionModelUpdater;
use App\Models\Ingredient;

class CollecionModelUpdaterTest extends TestCase
{
    public function testUpdatingAnItem(){
        $model = $this->getModel(['name' => 'chleb', 'id' => 1]);
        $updater = $this->getModelUpdater([$model]);
        $result = $updater->update($this->getModel(['name' => 'papryka', 'id' => 1]));
        $this->assertEquals($result->first()->toArray()['name'], 'papryka');
    }

    public function testDeletingAnItem(){
        $model = $this->getModel(['name' => 'chleb', 'id' => 1]);
        $updater = $this->getModelUpdater([$model]);
        $this->assertEquals($updater->delete($model)->toArray(), []);
    }

    private function getModel(array $data){
        return (new Ingredient)->fill($data);
    }

    private function getModelUpdater(array $data){
        return new CollectionModelUpdater(collect($data));
    }
}
