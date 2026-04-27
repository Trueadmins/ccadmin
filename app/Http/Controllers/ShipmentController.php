<?php

namespace App\Http\Controllers;

use App\Models\CompanyCourierService;
use App\Models\CourierRate;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function getAvailableServices(Request $request)
    {
        $companyId = auth()->user()->company_id;

        $services = CompanyCourierService::whereHas('companyCourier', function($q) use ($companyId){
            $q->where('company_id', $companyId)
                ->where('is_active', true);
        })
            ->where('is_active', true)
            ->with('companyCourier.courier')
            ->get();

        return response()->json(['services'=>$services]);
    }

    public function calculateRates(Request $request)
    {
        $v = $request->validate([
            'country_id'=>'required|exists:countries,id',
            'parcel_type'=>'required',
            'weight'=>'required|numeric|min:0',
        ]);

        $companyId = auth()->user()->company_id;

        $services = CompanyCourierService::whereHas('companyCourier', function($q) use ($companyId){
            $q->where('company_id',$companyId)->where('is_active',true);
        })
            ->where('is_active',true)
            ->get();

        $results = [];

        foreach($services as $service){
            $rate = CourierRate::where('company_courier_service_id',$service->id)
                ->where('country_id',$v['country_id'])
                ->where('parcel_type',$v['parcel_type'])
                ->where('weight_from','<=',$v['weight'])
                ->where('weight_to','>',$v['weight'])
                ->first();

            if($rate){
                $results[] = [
                    'service_id'=>$service->id,
                    'service_name'=>$service->service_name,
                    'price'=>$rate->rate
                ];
            }
        }

        return response()->json($results);
    }

}
