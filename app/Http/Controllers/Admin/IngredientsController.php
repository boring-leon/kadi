<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Ingredient;
use App\Services\Builders\IngredientBuilder;
use App\Http\Requests\StoreOrUpdateIngredient;
use App\Repositories\Ingredient\IngredientQueries;
use App\Services\Mappers\IngredientTypesMapper;

class IngredientsController extends Controller
{
    private $typesMapper, $ingredientBuilder, $ingredientRepo;

    public function __construct(IngredientTypesMapper $mapper, IngredientBuilder $ingredientBuilder,
    IngredientQueries $ingredientRepo){
        $this->middleware('admin');
        $this->typesMapper = $mapper;
        $this->ingredientBuilder = $ingredientBuilder;
        $this->ingredientRepo = $ingredientRepo;
    }

    public function index(){
        $ingredients = $this->ingredientRepo->allWithFilters();
        return view('ingredients.index')->with('ingredients', $ingredients);
    }

    public function create(){
        $types = $this->typesMapper->getMappedItems();
        return view('ingredients.create')->with('types', $types);
    }

    public function edit(Ingredient $ingredient){
        $data = [
            'types' => $this->typesMapper->getMappedItems(),
            'ingredient' => $ingredient
        ];
        return view('ingredients.edit')->with($data);
    }

    public function store(StoreOrUpdateIngredient $request){
        $this->ingredientRepo->create($this->ingredientBuilder->getModelData());
        return redirect()->back()->with('info', 'Dodano składnik');
    }

    public function update(StoreOrUpdateIngredient $request, Ingredient $ingredient){
        $this->ingredientRepo->update($ingredient,
            $this->ingredientBuilder->getModelData()
        );
        return redirect()->route('ingredient.list')->with('info', 'Edytowano składnik');
    }

    public function delete(Ingredient $ingredient){
        $this->ingredientRepo->delete($ingredient);
        return redirect()->route('ingredient.list')->with('info', 'Usunięto składnik');
    }

}
