@extends('layouts.master')
@section('title', 'Lista de Usuarios')

@section('content')

<table id="example2" class="table table-bordered table-hover" style="text-align: center">
<thead>
    <tr>
        <th>Nombre</th>
        <th>Validado</th>
        <th>Rol</th>
        <th>Correo</th>
        <th>Acciones</th>
      </tr>
</thead>    
    @foreach ($users as $user)
    <tr>
        <td> {{$user['first_name']}} {{$user['last_name']}} </td>
        @if ($user['validated'] == "true")
            <td> Sí </td>
        @else
            <td> No </td>
        @endif
        <td> {{$user['rol']}} </td> <!-- Ponerle función para ponerle una franja de colores según rol -->
        <td> {{$user['email']}} </td>
        <td>
            <a href="/infoUser/{{ $user['id'] }}">Detalles</a>
            <a href="/editUser/{{ $user['id'] }}">Editar</a>
            <a href="/deleteUser/{{ $user['id'] }}">Borrar</a>
        </td>
    </tr> 
    @endforeach
</table>
@stop