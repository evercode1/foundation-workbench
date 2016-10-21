<?php

namespace App\Http\Controllers;

use App\Exceptions\EmailNotFoundException;
use App\Exceptions\PaymentDeclinedException;
use Illuminate\Http\Request;
use App\Tank;
use Illuminate\Support\Facades\Redirect;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        throw new PaymentDeclinedException('what the heck!');

        //return view('tank.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('tank.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|unique:tanks|string|max:30',

        ]);

        $tank = Tank::create(['name' => $request->name]);

        $tank->save();

        return Redirect::route('tank.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $tank = Tank::findOrFail($id);

        return view('tank.show', compact('tank'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $tank = Tank::findOrFail($id);

        return view('tank.edit', compact('tank'));

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
        $this->validate($request, [

            'name' => 'required|string|max:40|unique:tanks,name,' .$id

        ]);

        $tank = Tank::findOrFail($id);

        $tank->update(['name' => $request->name]);


        return Redirect::route('tank.show', ['tank' => $tank]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Tank::destroy($id);

        return Redirect::route('tank.index');

    }
}