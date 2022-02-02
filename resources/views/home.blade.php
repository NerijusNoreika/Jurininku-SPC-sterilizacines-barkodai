@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="devices">
            @foreach($devices as $device)
            <a class="devices__link" href="device/{{ $device->id }}">
                <div class="device">
                        <span class="device__department">{{ $device->departments->name }}</span>
                        <h2 class="h1">{{ $device->name }} </h2>
                    </div>
                </a>    
            @endforeach
            </div>
           
        </div>
    </div>
</div>
@endsection
