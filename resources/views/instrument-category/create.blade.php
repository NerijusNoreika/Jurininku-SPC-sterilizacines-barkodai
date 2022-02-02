@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Sukurti naują kategoriją</h1>
                <form action="{{ route('instrument-category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label name="name" for="name" class="form-label">Kategorija:</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Kategorijos pavadinimas">
                      </div>
                      <a class="btn btn-success" href="{{ url()->previous() }}">← Grįžti atgal</a>
                      <button type="submit" class="btn btn-success">Sukurti</button>
                </form>
            </div>
        </div>
    </div>
@endsection