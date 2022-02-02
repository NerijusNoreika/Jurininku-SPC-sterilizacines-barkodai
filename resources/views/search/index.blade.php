@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-8">
                <h1 class="fw-bold mb-3">Barkodo paieška</h1>
                <div class="mb-3">
                    <form class="search-form" method="get" action="{{ route('search_index') }}">
                        @csrf
                        <div class="form-group search">
                            <input autocomplete="off" name="barcode" placeholder="Nuskenuokite barkodą arba suveskite barkodo tekstą" class="form-control py-4 fs-5 search__input" type="text">
                            <img class="search__image" src="{{ asset('img/scanner.svg') }}" alt="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let form = document.querySelector('.search-form');
        input = form.querySelector('input[name="barcode"');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            window.location = "/charge/barcode/" + input.value;
        });
    </script>
@endsection