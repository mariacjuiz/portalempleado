<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours['hours']=Hour::orderBy('id', 'asc')
                            ->simplepaginate(10);
        return view('hours.index',$hours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hours.create');
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
            'name' => 'required|string|max:255',
        ];
         //Mensajes que retornamos en caso de que no se cumplan el atributo establecido anteriormente
         $Mensaje=["required"=>'El :attribute es obligatorio'];
         //Con este método aplicamos la validación
         $this->validate($request, $validacion, $Mensaje);


        //Obtenemos los datos del departamento sin el campo token
        $datosHora=request()->except('_token');
        Hour::insert($datosHora);
        //redireccionamos a la pantalla principal de tipos de hora devolviendo un mensaje satisfactorio.
        return redirect('hours')->with('Mensaje', 'Tipo de hora registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function show(Hour $hour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos el dpto con el ID , devuelve toda la información
        $hour=Hour::findOrFail($id);
        return view('hours.edit', compact('hour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Obtenemos los datos del dpto sin el campo token y el metodo (recuperamos los datos)
         $datosHour=request()->except(['_token', '_method']);

         //buscamos el id solicitado y actualizamos los datos
         Hour::where('id','=',$id)->update($datosHour);
         //Buscamos el usurio con el ID , devuelve toda la información (recargar la información)
         $hour=Hour::findOrFail($id);
         return redirect('hours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hour=Hour::findOrFail($id);
        Hour::destroy($id);
        return redirect('hours');
    }
}
