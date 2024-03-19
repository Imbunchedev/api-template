<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return response()->json($players);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $player = Player::create($request->all());
        return response()->json($player);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $player = Player::find($id);
        if ($player) {
            return response()->json($player);
        }else{
            return response()->json(['message' => 'player not found.'], 404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        if ($player) {
            $player->name        = is_null($request->name) ? $player->name : $request->name;
            $player->last_name   = is_null($request->last_name) ? $player->last_name : $request->last_name;
            $player->age         = is_null($request->age) ? $player->age : $request->age;
            $player->nationality = is_null($request->nationality) ? $player->nationality : $request->nationality;
            $player->position     = is_null($request->position) ? $player->position : $request->position;

            $player->save();

            return response()->json(Player::find($player->id));
        }else{
            return response()->json(['message' => 'player not found.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        if ($player) {
            $player->delete();

            return response()->json(['message' => 'player deleted.'], 202);
        }else{
            return response()->json(['message' => 'player not found.'], 404);
        }
    }
}
