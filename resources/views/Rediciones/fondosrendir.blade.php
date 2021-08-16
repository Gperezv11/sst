@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Centros de Costo</h1>
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
                            <h3 class="card-title">Fondos Asignados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Fondo Asignado</li>
                                        <li class="list-group-item">Nombre</li>
                                        <li class="list-group-item">Rut</li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">$999.999.999</li>
                                        <li class="list-group-item">Nombre 1</li>
                                        <li class="list-group-item">12.123.123-4</li>
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
                                        <li class="list-group-item">Fondo Entregado</li>
                                        <li class="list-group-item">Fondo Utilizado</li>
                                        <li class="list-group-item">Saldo</li>

                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">$999.999.999</li>
                                            <li class="list-group-item">$900.000.000</li>
                                            <li class="list-group-item">$99.999.999</li>
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
                            <button href="#" class="btn btn-success"><i class="fas fa-plus"></i> Nueva Centro </button>
                            <button class="btn btn-danger"><i class="fas fa-file-excel"></i> Descargar Excel</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Tipo Dcto.</th>
                                        <th scope="col">N° Dctop.</th>
                                        <th scope="col">Rut Proveedor</th>
                                        <th scope="col">Nombre Proveedor</th>
                                        <th scope="col">Concepto/Detalle</th>
                                        <th scope="col">Centro Costo</th>
                                        <th scope="col">Nave</th>
                                        <th scope="col">Linea de Negocio</th>
                                        <th scope="col">Proyecto</th>
                                        <th scope="col">Monto</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>07/06/21</td>
                                        <td>Tipo Dcto. 1</td>
                                        <td>1111111</td>
                                        <td>16.636.149-4</td>
                                        <td>Nombre 1</td>
                                        <td>Detalle 1</td>
                                        <td>Centro Costo 1</td>
                                        <td>Nave 1</td>
                                        <td>Linea 1</td>
                                        <td>Proyecto 1</td>
                                        <td>$5.000.000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>07/06/21</td>
                                        <td>Tipo Dcto. 1</td>
                                        <td>22222222</td>
                                        <td>17.095.149-5</td>
                                        <td>Nombre 2</td>
                                        <td>Detalle 2</td>
                                        <td>Centro Costo 2</td>
                                        <td>Nave 2</td>
                                        <td>Linea 2</td>
                                        <td>Proyecto 2</td>
                                        <td>$50.000.000</td>
                                    </tr>
                                    </tbody>
                                </table>
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
