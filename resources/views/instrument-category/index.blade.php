@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Pavadinimas</th>
                      <th scope="col">Redaguoti</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($cats as $cat)
                      <tr>
                          <td>{{ $loop->index +1 }}</td>              
                          <td>{{ $cat->short_name }}</td>
                          <td><a class="text-muted" href="{{ route('instrument-category.edit', $cat) }}">Redaguoti kategoriją</a></td>
                      </tr>
                      @endforeach
                    </tbody>
            </table>
            <a class="btn btn-success" href="{{ url()->previous() }}">← Grįžti atgal</a>
            <a href="{{ route('instrument-category.create') }} " class="btn btn-success">Kurti naują kategoriją
            </a>
        </div>
    </div>
</div>
    
@endsection

