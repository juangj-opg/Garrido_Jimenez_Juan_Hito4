@extends('layouts.master')
@section('title', 'Datos')

@section('content')

<!-- Pendiente de cambiar estilos y vista -->

<!-- Tal vez, añadir imagen de perfil-->

<!-- Añadir un boton de editar por la parte superior de la vista -->
<h1> {{$user['first_name']}} {{$user['last_name']}} </h1>
<h3> Rol: {{$user['rol']}} </h3> <!-- Cambiarle color según el rol -->
<h4> Correo: {{$user['email']}}</h3>
<h4> Teléfono: {{$user['tel']}}</h3>
<h4> DNI: {{$user['dni']}}</h4>
<h4> Género: 
    @if ($user['gender'] == "M")
        Hombre
    @elseif ($user['gender'] == "F")
        Mujer
    @elseif ($user['gender'] == "O")
        Otro
    @else
        Indefinido
    @endif
</h4>
<h4> ¿Puedo recibir correos? 
    <b>
        @if ($user['notify_email'])
            Sí.
        @else  
            No.
        @endif
    </b>
</h4>
<!-- Cuando se haga la vista nueva, añadir fecha de actualización del perfil-->
@stop