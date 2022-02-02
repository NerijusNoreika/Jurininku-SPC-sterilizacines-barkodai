@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row col-md-12">
            <table class="table text-center">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Sterilizatorius</th>
                      <th scope="col">Padalinys</th>
                      <th scope="col">Sterilizavo</th>
                      <th scope="col">Pradžios data</th>
                      <th scope="col">Pabaigos data</th>
                </tr>
                  </thead>
                  <tbody>


                    @forelse ($charges as $charge)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $charge->device->name }}</td>
                            <td>{{ $charge->device->departments->name }}</td>
                            <td>{{ $charge->user->name }} {{ $charge->user->surname }}</td>
                            <td>{{  $charge->start_date  }}</td>
                            <td>{{  $charge->end_date  }}</td>
                            </tr>
                        
                @empty
                    Sterilizacijų nerasta
                @endforelse
                  </tbody>
            </table>

            {{ $charges->links() }}
        </div>
    </div>
   
@endsection