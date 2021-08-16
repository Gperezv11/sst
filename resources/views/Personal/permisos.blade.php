@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingreso de Permisos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Ingreso de Permisos</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <form name="form1" action="/permisos" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingrese Rut">
                        <div class="input-group-append">
                            <button id="btnBuscar" class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombreInput">Nombre</label>
                        <input type="text" class="form-control" id="nombreInput" name="nombreInput">
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Permiso</label>
                        <select class="form-control" id="permBox" name="permBox">
                            <option selected disabled>Seleccione opcion</option>
                            @foreach($permisos as $permiso)
                                <option value="{{$permiso->id}}">{{$permiso->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Inicio</label>
                        <input autocomplete="off" type="text" class="form-control datepicker" id="fInicio" name="fInicio">
                        <label for="">Fecha Termino</label>
                        <input autocomplete="off" type="text" class="form-control datepicker" id="fTermino" name="fTermino">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

            </div>
            <style>
                #rut, #btnBuscar{
                    margin-top: 50px;
                }
                .container{
                    align-self: center;
                }
            </style>
        </div>
@endsection

@section('scripts')
    <script src="js/validador.js'"></script>
    <script type="text/javascript">
        $('#rut').change(function(){
            var rut = $('#rut').val()


        })

        //Datepicker
        $(".datepicker").datepicker({
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true
        });
    </script>

@endsection
