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
                          <th scope="col">Instrumento Kategorija</th>
                          <th scope="col">Instrumento indeksas</th>
                          <th scope="col">Redaguoti</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($instruments as $instrument)
                          <tr>
                              <td>{{ $loop->index +1 }}</td>              
                              <td>{{ $instrument->name }}</td>
                              <td>{{ $instrument->category->short_name }}</td>
                              <td>{{ $instrument->instrument_index }}</td>
                              <td><a class="text-muted" href="{{ route('instrument.edit', $instrument) }}">Redaguoti instrumentą</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                </table>
            <a class="btn btn-success" href="{{ url()->previous() }}">← Grįžti atgal</a>

                <a href="{{ route('instrument.create') }}" class="btn btn-success">Kurti naują instrumentą</a>
            </div>
        </div>
    </div>
@endsection