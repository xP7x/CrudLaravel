<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //Recuperar registros do DB 

       $users = User::orderByDesc('id')-> get();

        //Carregar a view
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        
        return view('users.show',['user'=>$user]);
    }

    public function create()
    {
        //Carregar a view
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        //validar formulário
        $request->validated();

        //Cadastrar o usuário no Database
       User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
       ]);
       //Redirecionamento e Mensagem
        return redirect()->route('user.index')->with('success','Usuário cadastrado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit' , ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        //Validar o formulário
        $request->validated();

        //Editar as informações do registro no banco de dados
        $user->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,

        ]);

        //Redirecionamento e Mensagem
        return redirect()->route('user.show',['user'=>$user->id])->with('success','Usuário editado com sucesso!');
    }

    public function destroy(User $user)
    {

        //Apagar registro no Banco de Dados
        $user -> delete();
     
        //Redirecionamento e Mensagem
        return redirect()->route('user.index')->with('success','Usuário apagado com sucesso!');
    }

}
