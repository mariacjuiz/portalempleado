<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtenemos las vacaciones de el usuario
        $userId = Auth::user()->id;
        $vacations['vacations']=Vacation::where('user_id', $userId)
                         ->orderBy('startdate', 'desc')
                         ->simplePaginate(10);
        return view('vacations.index', $vacations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtenemos los datos registrados sin el campo token
        $datosObtenidos=request()->except('_token');

        Vacation::insert($datosObtenidos);
        //redireccionamos a la pantalla principal de las vacaciones devolviendo un mensaje satisfactorio.
        return redirect('vacations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //ADMIN: Vista de las ausencias no validadas
        $vacations['vacations']=Vacation::where('validate', '=', 'NO')
                        ->join('users', 'vacations.user_id', '=', 'users.id')
                        ->orderBy('startdate', 'asc')
                        ->simplepaginate(10, array('vacations.*', 'users.name as userName'));
        return view('vacations.show',$vacations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacation=Vacation::findOrFail($id);
        return view('vacations.edit', compact('vacation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtenemos el valor previo de la validación para ver si ha cambiado
        $vacationOLD=Vacation::findOrFail($id);
        $validateOLD= $vacationOLD['validate'];
        //Obtenemos los datos del las vacaciones sin el campo token y el metodo (recuperamos los datos)
        $datosObtenidos=request()->except(['_token', '_method']);

        //buscamos el id solicitado y actualizamos los datos
        Vacation::where('id','=',$id)->update($datosObtenidos);
        //Buscamos el usurio con el ID , devuelve toda la información (recargar la información)
        $vacation=Vacation::findOrFail($id);
        //regresamos al formulario
        if ($validateOLD == 'NO' && $vacation['validate'] == 'SI') {
            return redirect('vacations/show');
        } else {
            return redirect('vacations');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //datos del id
        $vacation=Vacation::findOrFail($id);
        //Borramos el registro del de las vacaciones
        Vacation::destroy($id);
        return redirect('vacations');
    }
}
