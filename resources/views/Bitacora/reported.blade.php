@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bitacora</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Control Acceso</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!--Datos Empresa-->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Control de Servicios Diarios</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Empresa</li>
                                        <li class="list-group-item">Ubicación</li>
                                        <li class="list-group-item">Centro</li>
                                        <li class="list-group-item">Fecha</li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Empresa A</li>
                                        <li class="list-group-item">Ubicación A</li>
                                        <li class="list-group-item">Centro 1</li>
                                        <li class="list-group-item">07/05/21</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Datos Remuneraciones -->
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">Fondos Entregados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Supervisor de Matricula</li>
                                        <li class="list-group-item">Capitan</li>
                                        <li class="list-group-item">Movil</li>
                                        <li class="list-group-item">Fecha</li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">S.Matricula 1</li>
                                        <li class="list-group-item">Capitan 1</li>
                                        <li class="list-group-item">Movil 1</li>
                                        <li class="list-group-item">10/06/21</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">
                                Listado de Centros de Costo
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label>Descripción de trabajo</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="align-content-center">Personal Faena</label>
                                    </div>
                                    <div class="row">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">Nombre 1</th>
                                                <td>Apellido 1</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nombre 2</th>
                                                <td>Apellido 2</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card card-cyan">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Observaciones
                                                    </h3>
                                                </div>
                                                <div cass="card-body">
                                                    <h5 class="text-center">Observacion 1</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-cyan">
                        <div class="card-header">
                            <h3 class="card-title">
                                Total a Pagar
                            </h3>
                        </div>
                        <div cass="card-body">
                            <h5 class="text-center">$55.000.000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
