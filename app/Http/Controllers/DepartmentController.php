<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostramos los usuarios de 10 en 10
        $departments['departments']=Department::orderBy('id', 'asc')
                            ->join('users', 'departments.user_id', '=', 'users.id')
                            ->simplepaginate(10, array('departments.*', 'users.name as userName'));
        return view('departments.index',$departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //Obtenemos los usuarios dados de alta para poder establecer un jefe de departamento
        $users = User::WhereNull('lowdate')
                         ->orderBy('name', 'asc')
                         ->get();
        return view('departments.create', compact('users'));

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
            'user_id' => 'required|numeric',
        ];
         //Mensajes que retornamos en caso de que no se cumplan el atributo establecido anteriormente
         $Mensaje=["required"=>'El :attribute es obligatorio',
                   "numeric"=>'El :attribute tiene que ser numérico'];
         //Con este método aplicamos la validación
         //$this->validate($request, $validacion, $Mensaje);
         $this->validate($request, $validacion, $Mensaje);


        //Obtenemos los datos del departamento sin el campo token
        $datosDepartamento=request()->except('_token');
        Department::insert($datosDepartamento);
        //redireccionamos a la pantalla principal de departamentos devolviendo un mensaje satisfactorio.
        return redirect('departments')->with('Mensaje', 'Departamento registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos el dpto con el ID , devuelve toda la información
        $department=Department::findOrFail($id);
        //Obtenemos los usuarios dados de alta para poder establecer un jefe de departamento
        $users = User::WhereNull('lowdate')
                         ->orderBy('name', 'asc')
                         ->get();
        return view('departments.edit', compact('department', 'users'));
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
          //Obtenemos los datos del dpto sin el campo token y el metodo (recuperamos los datos)
          $datosDepartamento=request()->except(['_token', '_method']);

          //buscamos el id solicitado y actualizamos los datos
          Department::where('id','=',$id)->update($datosDepartamento);
          //Buscamos el usurio con el ID , devuelve toda la información (recargar la información)
          $department=Department::findOrFail($id);
          return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=Department::findOrFail($id);
        Department::destroy($id);
        return redirect('departments');
    }



}
