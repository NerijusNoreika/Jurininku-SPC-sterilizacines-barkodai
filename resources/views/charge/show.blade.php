@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="charge">
                    <div>
                        <h1 class="mb-3 fw-bold">Dienos sterilizatoriaus įkrova <span
                                class="fw-bold">{{ $deviceCharge->charge_index }}#</span>
                        </h1>
                        <div class="row">
                            <div class="col-auto">
                                <h3 class="h4">
                                    <img class="charge__image" src="{{ asset('/img/user.svg') }}" alt="Kas sterilizavo">
                                    <span class="charge__author">{{ $deviceCharge->user->name }}
                                        {{ $deviceCharge->user->surname }}</span>
                                </h3>
                            </div>
                            <div class="col-auto">
                                <h3 class="h4">
                                    <img class="charge__image" src="{{ asset('/img/sterilizer.svg') }}"
                                        alt="Sterilizatorius">
                                    <span class="charge__sterilizer">{{ $deviceCharge->device->name }}</span>
                                </h3>
                            </div>
                        </div>
                        <div
                            class="rounded-1 mt-3 mb-3 py-3 px-3 charge__term {{ $endOfTerm === true ? 'bg-danger' : 'bg-success' }}">
                            @if ($endOfTerm)
                                <p class="text-white mb-0"> <img style="width: 25px; height: auto;" class="me-2"
                                        src="{{ asset('img/wrong.svg') }}" /> Įkrova pradėta <span
                                        class="fw-bold">{{ $deviceCharge->start_date }}</span> ir baigėsi <span
                                        class="fw-bold">{{ $deviceCharge->end_date }}</span>. Įkrova <span
                                        class="fw-bolder ">nebegalioja</span>.</p>
                            @else
                                <p class="text-white mb-0"><img style="width: 25px; height: auto;" class="me-2"
                                        src="{{ asset('img/ok.svg') }}" /> Įkrova pradėta <span
                                        class="fw-bold">{{ $deviceCharge->start_date }}</span> ir baigiasi <span
                                        class="fw-bold">{{ $deviceCharge->end_date }}. </span> Įkrova vis dar
                                    <span class="fw-bolder">galioja</span>
                                </p>
                            @endif
                        </div>






                    </div>
                    @auth
                        <div class="mt-4">
                            <a class="btn btn-primary" href="{{ route('device', $deviceCharge->device->id) }} ">Daryti
                                naują sterilizaciją</a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="col-md-5">


                <div class="mb-3 instruments">
                    <h2 class="h2 fw-bold">Instrumentai</h2>

                    <p>Iš viso {{$totalDevices == 1 ? 'sterilizuotas' : ($totalDevices > 9 ? 'sterlizuota' : 'sterilizuoti') }} <span class="fw-bold">{{ $totalDevices }}</span> {{$totalDevices == 1 ? 'instrumentas' : ($totalDevices > 9 ? 'instrumentų' : 'instrumentai') }}.</p>
                    <ul class="instruments__list">
                        @foreach ($deviceCharge->instruments as $instrument)
                            <li>({{$instrument->instrument_index }} - {{ $instrument->name }}) <span
                                    class="fw-bold">{{ $instrument->pivot->instrument_count_per_charge }}
                                    vnt.</span></li>
                        @endforeach

                    </ul>
                </div>
                <h3>Barkodas:</h3>
                <div id="print" class="mb-3" style="width: fit-content">
                    <img style="display: block; width: fit-content; text-align: center;"
                        src="data:image/png;base64,{{ $barcode }}">
                    <p style="font-size: 1.1rem; margin:0; display: block; width: 100%; text-align: center;">
                        {{ $deviceCharge->barcode }}</p>
                </div>
                @auth
                    <button class="btn btn-success" onclick="printJS({printable: 'print', type: 'html', scanStyles: false, css: '/css/print.css'})">
                        <img style="width: 18px; height: auto;" src="{{ asset('img/barcode-printer.svg') }}" alt="">
                        Spausdinti barkodą</button>
                @endauth

            </div>

        </div>

    </div>

@endsection
