<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Hour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostramos las ausencias del usuario
        //Si es admin, ve las de todos los usuarios (para poder validarlas)
        // if (Auth::user()->is_admin == false ) {
             $absences['absences']=Absence::where('user_id', '=', Auth::user()->id)
                             ->join('hours', 'absences.hour_id', '=', 'hours.id')
                             ->orderBy('startdate', 'asc')
                             ->simplepaginate(10, array('absences.*', 'hours.name as hourName'));
        // } else {
        //    //ADMIN: Vista de las ausencias no validadas
        //    $absences['absences']=Absence::where('validate', '=', 'NO')
        //                     ->join('users', 'absences.user_id', '=', 'users.id')
        //                     ->join('hours', 'absences.hour_id', '=', 'hours.id')
        //                     ->orderBy('startdate', 'asc')
        //                     ->simplepaginate(10, array('absences.*', 'hours.name as hourName', 'users.name as userName'));
        // }

        return view('absences.index',$absences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos los tipos de hora para poder tipificar a la ausencia
        $hours = Hour::orderBy('name', 'asc')
                    ->get();
        return view('absences.create', compact('hours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion=[
            'hour_id' => 'required|numeric',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
        ];
         //Mensajes que retornamos en caso de que no se cumplan el atributo establecido anteriormente
         $Mensaje=["required"=>'El :attribute es obligatorio',
                   "numeric"=>'El :attribute tiene que ser numérico'];
         //Con este método aplicamos la validación
         //$this->validate($request, $validacion, $Mensaje);
         $this->validate($request, $validacion, $Mensaje);


        //Obtenemos los datos de la ausencia sin el campo token

        $datosAusencia=request()->except('_token');
        $datosAusencia['user_id']= Auth::user()->id;
        $datosAusencia['validate']='NO';
        Absence::insert($datosAusencia);
        //redireccionamos a la pantalla principal de ausencias devolviendo un mensaje satisfactorio.
        return redirect('absences')->with('Mensaje', 'Ausencia registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //ADMIN: Vista de las ausencias no validadas
        $absences['absences']=Absence::where('validate', '=', 'NO')
                        ->join('users', 'absences.user_id', '=', 'users.id')
                        ->join('hours', 'absences.hour_id', '=', 'hours.id')
                        ->orderBy('startdate', 'asc')
                        ->simplepaginate(10, array('absences.*', 'hours.name as hourName', 'users.name as userName'));
        return view('absences.show',$absences);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos la ausencia con el ID , devuelve toda la información
        $absence=Absence::findOrFail($id);
        //Obtenemos los tipos de hora para poder tipificar a la ausencia
        $hours = Hour::orderBy('name', 'asc')
                    ->get();
        return view('absences.edit', compact('hours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtenemos los datos de la ausencia sin el campo token y el metodo (recuperamos los datos)
        $absenceOLD=Absence::findOrFail($id);
        $validateOLD= $absenceOLD['validate'];

        $datosAusencia=request()->except(['_token', '_method']);

        //buscamos el id solicitado y actualizamos los datos
        Absence::where('id','=',$id)->update($datosAusencia);
        //Buscamos la ausencia con el ID , devuelve toda la información (recargar la información)
        $absence=Absence::findOrFail($id);
        if ($validateOLD == 'NO' && $absence['validate'] == 'SI') {
            return redirect('absences/show');
        } else {
            return redirect('absences');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absence=Absence::findOrFail($id);
        if($absence->validate == 'SI') {
            $error = 'No se puede eliminar una ausencia validada.';
        } else {
            Absence::destroy($id);
        }
        return redirect('absences');
    }


}
