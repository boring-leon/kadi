<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use App\Services\Mappers\IngredientTypesMapper;
use App\Repositories\Ingredient\IngredientQueries;

class HomeController extends Controller
{
    private $typesMapper, $ingredientRepo;

    public function __construct(IngredientTypesMapper $mapper, IngredientQueries $ingredientRepo){
        $this->typesMapper = $mapper;
        $this->ingredientRepo = $ingredientRepo;
    }

    public function handleRoute(){
        if(auth()->check()){
            return auth()->user()->email_verified_at 
            ? $this->serveFrontend() : redirect()->route('verification.notice');
        }
        return view('landing.index');
    }

    public function serveFrontend(){
        $data = [
            'user' => auth()->user(),
            'ingredients' => $this->ingredientRepo->all(),
            'custom_ingredients' => auth()->user()->ingredients,
            'custom_plates' => auth()->user()->meals,
            'ingredient_types' =>  $this->typesMapper->getMappedItems(),
            'activities' => config('static.activities'),
            'admin_route' => route('admin.index'),
            'home_route' => url('/')
        ];

        return view('app')->with('data', $data);
    }
}
