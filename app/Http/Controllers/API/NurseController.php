<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NurseResource;
use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NurseResource::collection(Nurse::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Nurse::create($request->all());
        return response()->json([
            "res" => true,
            "msg" => "Enfermero/a creado satisfactoriamente"
        ], 200); */

        return (New NurseResource(Nurse::create($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $nurse)
    {
        return New NurseResource($nurse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nurse $nurse)
    {
        $nurse->update($request->all());
        return response()->json([
            "res" => true,
            "data" => "registro actualziado correctamente"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        $nurse->delete();
        return (new NurseResource($nurse))->additional([
            'msg' => 'Enfermer@ eliminado correctamente'
        ], 200);
    }
}
