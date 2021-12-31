<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Http\Resources\RentCollection;
use App\Http\Resources\RentResource;

class RentController extends Controller
{
    

    public function index()
    {
        $rents = Rent::get();
        return new RentCollection($rents);
    }

    public function store(StoreRentRequest $request)
    {
        
        $isAvailable = $this->IsAvailable($request->from_date,$request->until_date);
        if($isAvailable == "true")
        {
            $rent = Rent::create([
                'room_id'       => $request->room_id,
                'division_id'   => $request->division_id,
                'borrower_name' => $request->borrower_name,
                'phone'         => $request->phone,
                'from_date'     => $request->from_date,
                'until_date'    => $request->until_date,
                'description'   => $request->description,
                'note'          => $request->note
            ]);
            return new RentResource($rent);
        }
        else
        {
            return response()->json([
                'data'      => new RentCollection($isAvailable),
                'message'   => 'failed',
                'error'     => 'schedule not available'
            ]);
        }
        
    }

    public function show(Rent $rent)
    {
        return new RentResource($rent);
    }

    public function update(UpdateRentRequest $request, Rent $rent)
    {
        $rent->update([
            'room_id'       => $request->room_id,
            'division_id'   => $request->division_id,
            'borrower_name' => $request->borrower_name,
            'phone'         => $request->phone,
            'from_date'     => $request->from_date,
            'until_date'    => $request->until_date,
            'description'   => $request->description,
            'note'          => $request->note
        ]);

        return new RentResource($rent);
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();
        return new RentResource($rent);
    }

    public function IsAvailable($from_date, $until_date)
    {

        $rent = Rent::whereBetween('from_date', [$from_date, $until_date])
                    ->whereBetween('until_date', [$from_date, $until_date])
                    ->where('from_date','<=',$from_date)
                    ->where('until_date','<=',$until_date)
                    ->get(); 

        if($rent->count() == 0)
        {
            return "true";
        }   
        else
        {
            return $rent;
        }
    }

    
}
