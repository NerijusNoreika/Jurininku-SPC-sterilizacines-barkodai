<?php

namespace App\Http\Controllers;

use App\Models\InstrumentCategory;
use App\Http\Requests\StoreInstrumentCategoryRequest;
use App\Http\Requests\UpdateInstrumentCategoryRequest;

class InstrumentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = InstrumentCategory::all();
        return view('instrument-category.index', compact('cats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instrument-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstrumentCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstrumentCategoryRequest $request)
    {
        $model = new InstrumentCategory();
        $model->short_name = $request->input('name');
        $model->save();

       return redirect()->route('instrument-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstrumentCategory  $instrumentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(InstrumentCategory $instrumentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstrumentCategory  $instrumentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(InstrumentCategory $instrumentCategory)
    {
        return view('instrument-category.edit', compact('instrumentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstrumentCategoryRequest  $request
     * @param  \App\Models\InstrumentCategory  $instrumentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstrumentCategoryRequest $request, InstrumentCategory $instrumentCategory)
    {
        $instrumentCategory->short_name = $request->input('name');
        $instrumentCategory->save();
        return redirect()->route('instrument-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstrumentCategory  $instrumentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstrumentCategory $instrumentCategory)
    {
        //
    }
}
