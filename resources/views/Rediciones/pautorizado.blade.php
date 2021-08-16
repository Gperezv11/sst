@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Creacion Cliente</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Ventas</li>
                        <li class="breadcrumb-item">Usuario</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-cyan">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ingreso Nuevo Cliente
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <br>
                                    <br>
                                    <div class="image-contrainer align-content-center">
                                        <img src="/images/test.jpg" alt="test" style="width:150px;height:150px;">
                                    </div>
                                    <input type="file" disabled>
                                </div>
                                <div class="col-8">
                                    <label>Rut</label>
                                    <input type="text" class="form-control" value="16.636.149-4" disabled>
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" value="Nombre" disabled>
                                    <label>Cargo</label>
                                    <input type="text" class="form-control" value="Cargo" disabled>
                                    <label>Monto Asignado</label>
                                    <input type="text" class="form-control" value="$500.000" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
