@extends('layouts.app')

@section('title') Dodaj składnik @endsection

@section('content')
<main>
    <header>
        <h1 class='display-4'> Dodaj składnik </h1>
    </header>
    <article style="margin-top:40px;">
        <form method="POST" action="{{ route('ingredient.store') }}">
            @csrf
            <div class="form-group">
                <input type='text' class='form-control @error("name") is-invalid @enderror' 
                required name='name' placeholder="nazwa składnika" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <select class='form-control @error("type") is-invalid @enderror' name='type'>
                    <option selected value="">rodzaj składnika</option>
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
                    required name='kcal' placeholder="kcal/porcja" value="{{ old('kcal') }}">
                    @error('kcal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <input type='number' id="ww" class='form-control  @error("exchanger") is-invalid @enderror' 
                required name='exchanger' placeholder="WW/porcja" value="{{ old('exchanger') }}" step="0.01">
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
                value="{{ old('portion_name') }}">
                @error('portion_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type='number'
                class='form-control @error("portion_weight") is-invalid @enderror' 
                name='portion_weight' placeholder="waga porcji - domyślna 100g" 
                value="{{ old('portion_weight') }}">
                @error('portion_weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class='btn btn-block btn-lg btn-success' type="submit"> Dodaj składnik </button>
        </form>
    </article>
    <script src="{{ asset('js/portion_exchange_setter.js') }}"></script>
</main>
@endsection