<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //para poder borrar los registros de la carpeta uploads que está en storage
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostramos los usuarios de 10 en 10
        $users['users']=User::join('departments', 'users.department', '=', 'departments.id')
                            ->orderBy('users.name', 'asc')
                            ->simplepaginate(10, array('users.*', 'departments.name as departmentName'));
        return view('users.index',$users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Obtenemos los departamentos dados de alta para poder asignarle uno al usuario
        $departments = Department::orderBy('name', 'asc')
                         ->get();
        return view('users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // FUNCION PARA AGREGAR UN USUARIO
    public function store(Request $request)
    {
        // //validamos los datos de entrada
        $request->validate([
            'cif' => 'required|string|max:9',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'department' => 'required|numeric',
        ]);


        // $validacion=[
        //     'cif' => 'required|string|max:9',
        //     'name' => 'required|string|max:255',
        //     'phone' => 'required|numeric|max:9',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        // ];


        //  //Mensajes que retornamos en caso de que no se cumplan el atributo establecido anteriormente
        //  $Mensaje=["required"=>'El :attribute es obligatorio',
        //            "numeric"=>'El :attribute tiene que ser numérico'];
        //  //Con este método aplicamos la validación
        //  $this->validate($request, $validacion, $Mensaje);


        //Obtenemos los datos del usuario sin el campo token
        $datosUsuario=request()->except('_token');

        //Si se ha adjuntado una foto, añadimos la foto a nuestra carpeta 'uploads' antes de insertarla en la BD
        //La ruta en BD apuntará a esta carpeta.
        if($request->hasFile('photo')) {
            $datosUsuario['photo']=$request->file('photo')->store('uploads', 'public');
        }

        $datosUsuario['password']= Hash::make($datosUsuario['password']);
        User::insert($datosUsuario);
        //redireccionamos a la pantalla principal de usuario devolviendo un mensaje satisfactorio.
        return redirect('users')->with('Mensaje', 'Usuario registrado correctamente.');
        //$datosUsuario=request()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos el usurio con el ID , devuelve toda la información
        $user=User::findOrFail($id);
        //Obtenemos los departamentos dados de alta para poder asignarle uno al usuario
        $departments = Department::orderBy('name', 'asc')
                        ->get();
        return view('users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Obtenemos los datos del usuario sin el campo token y el metodo (recuperamos los datos)
        $datosUsuario=request()->except(['_token', '_method']);

        //Preguntamos si tiene fotografía
        if($request->hasFile('photo')) {
            //recoge los datos del id
            $user=User::findOrFail($id);
            //borrado físico de la foto
            Storage::delete('public/'.$user->photo);
            //subimos la nueva foto a la carpeta uploads
            $datosUsuario['photo']=$request->file('photo')->store('uploads', 'public');
        }
        $datosUsuario['password']= Hash::make($datosUsuario['password']);
        //buscamos el id solicitado y actualizamos los datos
        User::where('id','=',$id)->update($datosUsuario);
        //Buscamos el usurio con el ID , devuelve toda la información (recargar la información)
        $user=User::findOrFail($id);
        //regresamos al formulario
        //return view('users.edit', compact('user'))->with('Mensaje', 'Usuario actualizado correctamente.');
        // return redirect('users')->with('Mensaje', 'Usuario actualizado correctamente.');
        return redirect('users/'.$user->id.'/edit')->with('Mensaje', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //datos del id
        $user=User::findOrFail($id);
        //Borramos el registro del usuario si consigue borrar previamente la foto adjunta
        Storage::delete('public/'.$user->photo);
        User::destroy($id);

        // return redirect('users')->with('Mensaje', 'Usuario eliminado correctamente.');
        return redirect('users');
    }
}
