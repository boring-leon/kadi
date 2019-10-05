<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Services\Meal\IngredientFilter;

class IngredientFilterTest extends TestCase
{
    public function testRemovingOnIdAndIsCustomMatch(){
        $filter = new IngredientFilter(1);
        $result = $filter->shouldIngredientStay(['id' => 1, 'is_custom' => true]);
        $this->assertFalse($result);
    }

    public function testKeepingOnUnmatch(){
        $filter = new IngredientFilter(1);
        $result = $filter->shouldIngredientStay(['id' => 2, 'is_custom' => false]);
        $this->assertTrue($result);
    }

    public function testKeepingOnOnlyIdMatch(){
        $filter = new IngredientFilter(1);
        $result = $filter->shouldIngredientStay(['id' => 1, 'is_custom' => false]);
        $this->assertTrue($result);
    }

    public function testKeepingOnOnlyIsCustomMatch(){
        $filter = new IngredientFilter(1);
        $result = $filter->shouldIngredientStay(['id' => 3, 'is_custom' => true]);
        $this->assertTrue($result);
    }
}
