<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\ConstantInventory;
use App\Models\RandomInventory;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $character = Character::create();
        $character->name = $request->input('name');
        $character->start = $request->input('start');
        $constantItem = $request->get('constant_item');
        $randomItem = $request->get('random_item');
        for($i=0; $i<count($constantItem); $i++){
            $createdConstantItem = ConstantInventory::create([
                'name' => $constantItem[$i],
            ]);
            $character->constantInventories()->save($createdConstantItem);
            $createdConstantItem->character()->associate($character);
        }
        for($i=0; $i<count($randomItem); $i++){
            $createdRandomItem = RandomInventory::create([
                'name' => $randomItem[$i],
            ]);
            $character->randomInventories()->save($createdRandomItem);
            $createdRandomItem->character()->associate($character);
        }
        $character->skill = $request->input('skill');
        $character->sanity = $request->input('sanity');
        $character->stamina = $request->input('stamina');
        $character->focus = $request->input('focus');
        $character->max_speed = $request->input('max_speed');
        $character->min_speed = $request->input('min_speed');
        $character->max_sneak = $request->input('max_sneak');
        $character->min_sneak = $request->input('min_sneak');
        $character->max_fight = $request->input('max_fight');
        $character->min_fight = $request->input('min_fight');
        $character->max_will  = $request->input('max_will');
        $character->min_will = $request->input('min_will');
        $character->max_lore = $request->input('max_lore');
        $character->min_lore = $request->input('min_lore');
        $character->max_luck = $request->input('max_luck');
        $character->min_luck = $request->input('min_luck');
        $character->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Character::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
