<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::get();


        return new RoomCollection($rooms);

    }

    public function store(StoreRoomRequest $request)
    {
        $room = Room::create([
            'code'          => $request->code,
            'department_id' => $request->department_id,
            'name'          => $request->name,
            'floor'         => $request->floor
        ]);
        return new RoomResource($room);
    }

    public function show(Room $room)
    {
        return new RoomResource($room);
        
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update([
            'code'          => $request->code,
            'department_id' => $request->department_id,
            'name'          => $request->name,
            'floor'         => $request->floor
        ]);
        return new RoomResource($room);
    }

    public function destroy(Room $room)
    {
        //
    }
}
