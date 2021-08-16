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
                <div class="col-sm-6">
                    <div class="card card-yellow">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ingreso
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label>Dia:</label>
                                    <input type="text" id="dia_estacionamiento_txt" name="fecha_ingreso_txt" class="form-control" placeholder="Nombres" value="07/06/2021" disabled>
                                    <label>Hora:</label>
                                    <input type="text" id="hora_estacionamiento_txt" name="hora_ingreso_txt" class="form-control" placeholder="Nombres" value="10:06" disabled>
                                    <label>Patente:</label>
                                    <input type="text" id="patente_estacionamiento_txt" name="patente_estacionamiento_txt" class="form-control" placeholder="Nombres" value="GZ-BL-40°" disabled>
                                    <label>N° de estacionamiento:</label>
                                    <input type="text" id="n_estacionamiento_txt" name="n_estacionamiento_txt" class="form-control" placeholder="Nombres" value="12" disabled>
                                    <label>Tiempo:</label>
                                    <input type="text" id="tiempo_estacionamiento_txt" name="tiempo_estacionamiento_txt" class="form-control" placeholder="Nombres" value="2 horas 54 minutos" disabled>
                                </div>
                                <div class="col-6">
                                    <label>Monto a Pagar:</label>
                                    <input type="text" id="monto_estacionamiento_txt" name="monto_estacionamiento_txt" class="form-control" placeholder="Nombres" value="$5.000" disabled>
                                    <label>Forma de Pago:</label>
                                    <input type="text" id="fpago_estacionamiento_txt" name="fpago_estacionamiento_txt" class="form-control" placeholder="Nombres" value="Efectivo" disabled>
                                    <label>E-mail:</label>
                                    <input type="text" id="mail_estacionamiento_txt" name="mail_estacionamiento_txt" class="form-control" placeholder="Nombres" value="nombre@correo.cl" disabled>
                                    <label>Celular:</label>
                                    <input type="text" id="cel_estacionamiento_txt" name="cel_estacionamiento_txt" class="form-control" placeholder="Nombres" value="912345678" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
