@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Control de Acceso</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Control Acceso</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Ingreso
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label>Fecha de Ingreso:</label>
                                <input type="text" id="fecha_ingreso_txt" name="fecha_ingreso_txt" class="form-control" placeholder="Nombres" value="07/06/2021" disabled>
                                <label>Hora de Ingreso:</label>
                                <input type="text" id="hora_ingreso_txt" name="hora_ingreso_txt" class="form-control" placeholder="Nombres" value="10:06" disabled>
                                <label>Temperatura de Ingreso:</label>
                                <input type="text" id="temp_ingrso_txt" name="temp_ingreso_txt" class="form-control" placeholder="Nombres" value="36,4°" disabled>
                            </div>
                            <div class="col-6">
                                <br>
                                <br>
                                <div class="image-contrainer">
                                    <img src="/images/flowcode.png" alt="Codigo QR" style="width:150px;height:150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Salida
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label>Fecha de Salida:</label>
                                <input type="text" id="fecha_ingreso_txt" name="fecha_ingreso_txt" class="form-control" placeholder="Nombres" value="07/06/2021" disabled>
                                <label>Hora de Salida:</label>
                                <input type="text" id="hora_ingreso_txt" name="hora_ingreso_txt" class="form-control" placeholder="Nombres" value="18:06" disabled>
                                <label>Temperatura de Salida:</label>
                                <input type="text" id="temp_ingrso_txt" name="temp_ingreso_txt" class="form-control" placeholder="Nombres" value="36,2°" disabled>
                            </div>
                            <div class="col-6">
                                <br>
                                <br>
                                <div class="image-contrainer">
                                    <img src="/images/flowcode.png" alt="Codigo QR" style="width:150px;height:150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
