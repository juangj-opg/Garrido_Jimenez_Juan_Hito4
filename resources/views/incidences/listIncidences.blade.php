@extends('layouts.master')
@section('title', 'Incidencias')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-12">
                    <h1 style="text-align: center">Listado de incidencias</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <table class="table table-bordered table-hover" style="text-align: center">
        <thead>
            <tr>
                <th>Título</th>
                <th>Aula</th>
                <th>Estado</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
                <th>Fecha de cierre</th>

                <th>Acciones</th>
            </tr>
        </thead>
        @foreach ($data['incidencias'] as $incidencia)
            <tr>
                <td>{{ $incidencia['title'] }} </td>
                @foreach ($data['aulas'] as $aula)
                    @if ($aula['id'] === $incidencia['id_aula'])
                        <td> {{ $aula['aula'] }} </td>
                    @endif
                @endforeach

                @if ($incidencia['state'] == 'new')
                <td>
                    <span style="background-color: rgba(0,225,0,0.8);
                                 border-radius: 10px;
                                 color: white;
                                 padding:5px 10px 5px 10px;
                                 width: 200px;
                    ">
                        Nuevo
                    </span>
                </td>
                @elseif($incidencia['state'] == 'open')
                    <td>
                        <span style="background-color: rgba(255,128,0,0.8);
                                     border-radius: 10px;
                                     color: black;
                                     padding:5px 10px 5px 10px;
                                     width: 200px;
                        ">
                            Abierto
                        </span>
                    </td>
                @else
                    <td>
                        <span style="background-color: rgba(255,0,0,0.8);
                                     border-radius: 10px;
                                     color: white;
                                     padding:5px 10px 5px 10px;
                        ">
                            Cerrado
                        </span>
                    </td>
                @endif
                <td> {{ $incidencia['create_date'] }} </td>
                <td> 
                    @if ($incidencia['update_date'])
                        {{ $incidencia['update_date'] }}
                    @else
                        No se ha actualizado
                    @endif 
                </td>
                <td>
                    @if ($incidencia['close_date'])
                        {{ $incidencia['close_date'] }}
                    @else
                        No se ha cerrado
                    @endif  
                </td>
                <td>
                    <!-- TODO: Cambiar las palabras por iconos y un buen estilo-->
                    <a href="/infoIncidence/{{ $incidencia['id_incidencia'] }}">Detalles</a>
                    <a href="/editIncidence/{{ $incidencia['id_incidencia'] }}">Editar</a>
                    <a href="/deleteIncidence/{{ $incidencia['id_incidencia'] }}">Borrar</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop

@section('scripts')
<script>
</script>

@stop
