@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3">Nerasta. Pasitikrinkite ar duomenys teisingi</h1>
                <a class="btn btn-success" href="{{ url()->previous() }}">← Grįžti atgal</a>
            </div>
        </div>
    </div>
@endsection