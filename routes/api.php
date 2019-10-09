<?php

Route::namespace('Api')->group(function(){
    Route::post('ingredients/{user}', 'CustomIngredientsController@store');
    Route::patch('ingredients/{ingredient_belongs}', 'CustomIngredientsController@update');
    Route::delete('ingredients/{ingredient_belongs}/{user_id}/{api_token}', 'CustomIngredientsController@delete');
    
    Route::post('meals/{user}', 'CustomMealsController@store');
    Route::patch('meals/{meal_belongs}', 'CustomMealsController@update');
    Route::delete('meals/{meal_belongs}/{user_id}/{api_token}', 'CustomMealsController@delete');
    
    Route::patch('account/exchanger', "AccountController@updateExchanger");
    Route::delete('account/delete/{user_id}/{api_token}', "AccountController@deleteAccount");
});
