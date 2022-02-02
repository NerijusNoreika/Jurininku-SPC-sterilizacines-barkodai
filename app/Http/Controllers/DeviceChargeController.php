<?php

namespace App\Http\Controllers;

use App\Models\DeviceCharge;
use App\Http\Requests\StoreDeviceChargeRequest;
use App\Http\Requests\UpdateDeviceChargeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $charges = DeviceCharge::with('user', 'device.departments')->paginate(15);
        return view('charge.index', compact('charges'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeviceChargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceChargeRequest $request)
    {
        $userId = Auth::user()->id;
        $deviceId = $request->device;
        // dd($deviceId);
        $currentTime = new Carbon();
        $timeAfterHalfYear = Carbon::now()->addMonths(6);
        $chargeIndex = DeviceCharge::whereRelation('device', 'device_id', '=', $deviceId)->whereDate('start_date', Carbon::today())->max('charge_index') + 1;
       
        $barcode = "{$currentTime->format('ymd')}-${deviceId}-{$chargeIndex}-{$timeAfterHalfYear->format('md')}";


        $deviceCharge = new DeviceCharge();
        $deviceCharge->user_id    = $userId;
        $deviceCharge->device_id  = $deviceId;
        $deviceCharge->charge_index = $chargeIndex;
        $deviceCharge->barcode = $barcode;
        $deviceCharge->start_date = $currentTime;
        $deviceCharge->end_date   = $timeAfterHalfYear;
        $deviceCharge->save();


        foreach($request->input('instrument') as $id => $instrumentValue) {
            if ($instrumentValue > 0) {
                $deviceCharge->instruments()->attach($id, ['instrument_count_per_charge' => $instrumentValue]);
            }
        }

        return redirect()->route('charge_show_id', $deviceCharge->id);
    }


    public function search(Request $request) {

        $barcodeQuery = $request->query('barcode');

        if (empty($barcodeQuery)) {
            return view('search.index');
        }else {
            redirect()->route('charge_show_barcode', $barcodeQuery);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeviceCharge  $deviceCharge
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceCharge $deviceCharge)
    {  

        $deviceCharge->load('user', 'instruments', 'device');
        $totalDevices = 0;
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $barcodeName = $deviceCharge->barcode;
        $barcode = base64_encode($generator->getBarcode($deviceCharge->barcode, $generator::TYPE_CODE_128, 1, 45));


        foreach($deviceCharge->instruments as $instrument) {
            $totalDevices += $instrument->pivot->instrument_count_per_charge;
        }
        $endOfTerm = Carbon::now()->gt($deviceCharge->end_date);
        return view('charge.show', compact('deviceCharge', 'endOfTerm', 'totalDevices', 'barcode', 'barcodeName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceCharge  $deviceCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceCharge $deviceCharge)
    {
        //
    }
}
