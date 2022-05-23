@extends('layouts.master')
@section('title', 'Datos')

@section('styles')
    <link rel="stylesheet" href=" {{ asset('/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-12">
                    <h1 style="text-align: center">Crear nueva incidencia</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row md-2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos de la Incidencia</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/newIncidence" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputTitle">Título</label>
                            <input type="text" 
                                   class="form-control" 
                                   name="title" 
                                   id="InputTitle"
                                   placeholder="Introduce el título" 
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Clase</label>
                            <select name="id_aula" 
                                    class="form-control select2" 
                                    style="width: 100%;">
                                @foreach ($data['aulas'] as $aula)
                                    <option value="{{ $aula['id'] }}">{{ $aula['aula'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Incidencia</label>
                            <textarea class="form-control" 
                                      rows="3"
                                      name="description" 
                                      placeholder="Introduce la descripción de tu incidencia."></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enviar Incidencia</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    @stop

    @section('scripts')

        <!-- Select2 -->
        <script src=" {{ asset('/select2/js/select2.full.min.js') }}"></script>

        <script>
            $(function() {
                $('.select2').select2()
            })

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        </script>

    @stop
