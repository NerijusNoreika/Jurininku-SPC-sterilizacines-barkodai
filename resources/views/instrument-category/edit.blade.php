@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('instrument-category.update', $instrumentCategory) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label" for="name">Kategorijos pavadinimas:</label>
                        <input class="form-control" name="name" value="{{ $instrumentCategory->short_name }}" placeholder="{{ $instrumentCategory->short_name }}" type="text">
                    </div>
                    <a class="btn btn-success" href="{{ url()->previous() }}">← Grįžti atgal</a>
                    <button type="submit" class="btn btn-success">Pakeisti</button>
                </form>
            </div>
        </div>
    </div>
@endsection