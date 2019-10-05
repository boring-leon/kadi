<?php

namespace App\Listeners;

use App\Events\CustomIngredientDeleted;
use App\Services\Meal\CustomMealUpdater;
use App\Models\User;

class UpdateCustomMeals
{
    private $customMealUpdater;

    public function __construct(CustomMealUpdater $customMealUpdater){
        $this->customMealUpdater = $customMealUpdater;
    }
    
    public function handle(CustomIngredientDeleted $event){
        $userCustomMeals = User::find($event->ingredient->user_id)->meals;
        $this->customMealUpdater->setMeals($userCustomMeals);
        $this->customMealUpdater->removeFromAll($event->ingredient);
        $this->customMealUpdater->saveAll();
    }
}
