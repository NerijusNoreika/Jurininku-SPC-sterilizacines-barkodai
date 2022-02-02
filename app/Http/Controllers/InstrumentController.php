<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Http\Requests\StoreInstrumentRequest;
use App\Http\Requests\UpdateInstrumentRequest;
use App\Models\InstrumentCategory;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instruments = Instrument::with('category')->get();

        return view('instrument.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = InstrumentCategory::all();
        return view('instrument.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstrumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstrumentRequest $request)
    {
        $model = new Instrument();
        $model->fill($request->all());
        $model->count_per_instrument = 1;
        $model->save();

        return redirect()->route('instrument.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument $instrument)
    {
        $cats = InstrumentCategory::all();
        return view('instrument.edit', compact('instrument', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstrumentRequest  $request
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstrumentRequest $request, Instrument $instrument)
    {   
        // dd($instrument);
        // dd($request->only(['short_name', 'instrument_index', 'instrument_category_id']));
        $instrument->fill($request->only(['name', 'instrument_index', 'instrument_category_id']));
        $instrument->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        //
    }
}
