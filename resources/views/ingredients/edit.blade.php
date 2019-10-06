@extends('layouts.app')

@section('title') Edytuj {{ $ingredient->name }} @endsection

@section('content')
<main>
    <header>
        <h1 class='display-4'> Edytuj {{ $ingredient->name }} </h1>
    </header>
    <article style='margin-top:30px;'>
        <form method="POST" action="{{ route('ingredient.update', $ingredient->id) }}">
            @csrf
            <div class="form-group">
                <input type='text' class='form-control @error("name") is-invalid @enderror' 
                required name='name' placeholder="nazwa składnika" value="{{ $ingredient->name }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <select class='form-control @error("type") is-invalid @enderror' name='type'>
                <option selected value="{{ $ingredient->type }}">{{ $ingredient->type }}</option>
                    @foreach($types as $type)
                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>Wybrany rodzaj sładnika jest niepoprawny</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                    <input type='number' class='form-control  @error("kcal") is-invalid @enderror' 
                    required name='kcal' placeholder="kcal/porcja" value="{{ $ingredient->kcal }}">
                    @error('kcal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <input type='number' class='form-control  @error("glycemic_index") is-invalid @enderror' 
                name='glycemic_index' placeholder="IG" value="{{ $ingredient->glycemic_index }}">
                @error('glycemic_index')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type='number' class='form-control  @error("exchanger") is-invalid @enderror' 
                required name='exchanger' placeholder="WW/porcja" value="{{ $ingredient->exchanger }}" step="0.01">
                @error('exchanger')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror       
            </div>
            <div class="form-group">
                <input type='number' class='form-control' placeholder="węglowodany na 100 g" 
                step="0.01" name="custom_exchanger">
            </div>
            <div class="form-group">
                <input type='text' class='form-control @error("portion_name") is-invalid @enderror' 
                name='portion_name' placeholder="nazwa porcji - domyślna 1 porcja" 
                value="{{ $ingredient->portion['name'] }}">
                @error('portion_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type='number' class='form-control @error("portion_weight") is-invalid @enderror' 
                name='portion_weight' placeholder="waga porcji - domyślna 100g" 
                value="{{ $ingredient->portion['weight'] }}">
                @error('portion_weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class='btn btn-block btn-lg btn-success' type="submit"> Zapisz składnik </button>
        </form>

        <form method="POST" action="{{ route('ingredient.destroy', $ingredient->id) }}" id="delete_ingredient_form">
            @csrf
            {{ method_field('delete') }}
            <button class="btn btn-lg btn-block btn-danger mt-2" type="button">
                Usuń składnik (2x click) 
            </button>
        </form>
    </article>
    <script src="{{ asset('js/portion_exchange_setter.js') }}"></script>
    <script>
        document.querySelector('.btn-danger').addEventListener('dblclick', function(){
-         document.querySelector('#delete_ingredient_form').submit();
        });
    </script>
    
</main>
@endsection