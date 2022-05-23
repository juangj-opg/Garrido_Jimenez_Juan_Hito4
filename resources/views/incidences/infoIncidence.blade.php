@extends('layouts.master')
@section('title', 'Incidencia')

@section('content')
<!-- Cambiar prácticamente toda la parte visual-->
<h1>Incidencia {{$data['incidencia']['id_incidencia']}} - {{$data['incidencia']['title']}}</h1>
<h3>Descripción:</h3>
<p>{{$data['incidencia']['description']}}</p>
<h4>Estado: <b>{{$data['incidencia']['state']}}</b></h4>
<!-- Cuando se pase a modo tabla, añadir la fecha de actualización, cierre y creación.-->

<!--TODO: Falta poder ver el historial de estados y comments. Seguramente sea a través de una ramificación -->
@stop
