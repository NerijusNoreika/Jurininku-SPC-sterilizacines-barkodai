@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Sukurti naują instrumentą</h1>
                <form method="POST" action="{{ route('instrument.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Instrumento pavadinimas:</label>
                        <input required class="form-control" name="name" placeholder="Pavadinimas" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name">Instrumento indeksas:</label>
                        <input required class="form-control" name="instrument_index" placeholder="Indeksas"
                            type="number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Instrumento kategorija:</label>
                        <select required id="category" name="instrument_category_id" class="form-select" aria-hidden="true"">
                            <option value="">Pasirinkti kategoriją</option>
                            @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->short_name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <button type="submit" class="btn btn-success">Sukurti</button>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection
