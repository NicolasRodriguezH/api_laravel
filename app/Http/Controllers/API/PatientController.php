<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePatientRequest $request)
    {
        /* return response()->json([
            'res' => true,
            'msg' => 'paciente guardado correctamente',
        ], 200); */

        return (new PatientResource(Patient::create($request->all())))
                    ->additional([
                        'msg' => 'paciente guardado correctamente',
                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        /* return response()->json([
            'res' => true,
            'patient' => $patient,
        ], 200); */

        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        /* return response()->json([
            'res' => true,
            'msg' => 'Paciente actualizado correctamente'
        ], 200); */
        
        $patient->update($request->all());
        return (new PatientResource($patient))
                    ->additional([
                        'msg' => 'paciente actualizado correctamente',
                    ])
                    ->response()
                    ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        /* return response()->json([
            'res' => true,
            'msg' => 'Paciente eliminado correctamente'
        ], 200); */
        $patient->delete();
        return (new PatientResource($patient))
                    ->additional([
                        'msg' => 'paciente eliminado correctamente',
                    ]);
    }
}
