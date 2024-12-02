@extends('layouts.admin')

@section('content')
<div class="card mt-4 mb-4 border-light shadow">

    <div class="card-header hstack gap-2">
        <span>Visualizar Usuário</span>

        <span class="ms-auto d-sm-flex flex-row">

            <a href="{{route('user.index')}}" class="btn btn-info btn-sm me-3">Listar</a>
            
            <a href="{{route('user.edit',['user'=>$user ->id])}}" class="btn btn-warning btn-sm me-3">Editar</a>
            
            <form method="POST" action="{{route('user.destroy',['user'=>$user ->id])}}">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Tem certeza que desja apagar esse usuário?')">Apagar</button>
            </form>
        </span>
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-3">id:</dt>
            <dd class="col-sm-9">{{($user->id) }}</dd>

            <dt class="col-sm-3">Nome:</dt>
            <dd class="col-sm-9"> {{($user->name) }}</dd>

            <dt class="col-sm-3">Email:</dt>
            <dd class="col-sm-9">{{($user->email) }}</dd>

            <dt class="col-sm-3">Cadastrado</dt>
            <dd class="col-sm-9">{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>

            <dt class="col-sm-3">Editado</dt>
            <dd class="col-sm-9">{{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}</dd>


        </dl>
    </div>
</div>

@endsection