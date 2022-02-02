@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Koreguoti instrumentą</h1>
                <form method="POST" action="{{ route('instrument.update', $instrument) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label" for="name">Instrumento pavadinimas:</label>
                        <input required class="form-control" name="name" value="{{ $instrument->name }}" placeholder="{{ $instrument->name }}" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Instrumento indeksas:</label>
                        <input required class="form-control" name="instrument_index" value="{{ $instrument->instrument_index }}" placeholder="{{ $instrument->instrument_index }}"
                            type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Instrumento kategorija:</label>
                        <select required id="category" name="instrument_category_id" class="form-select" aria-hidden="true"">
                            @foreach ($cats as $cat)
                            <option @if($cat->id === $instrument->instrument_category_id) selected @endif value="{{ $cat->id }}">{{ $cat->short_name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <button type="submit" class="btn btn-success">Koreguoti</button>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection
