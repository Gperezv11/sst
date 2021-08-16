@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lineas de Naves</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Ventas</li>
                        <li class="breadcrumb-item">Listado de Naves</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">
                                Listado de Naves Actuales
                            </h3>
                        </div>
                        <div class="card-body">
                            <button href="#" class="btn btn-success"><i class="fas fa-plus"></i> Nueva Nave </button>
                            <button class="btn btn-danger"><i class="fas fa-file-excel"></i>Descargar Excel</button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">ID</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Nave 1</td>
                                        <td>ScaneN3k8M</td>
                                        <td>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Nave 2</td>
                                        <td>jFxbCrCahS</td>
                                        <td>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Nave 3</td>
                                        <td>53L0Mgeznv</td>
                                        <td>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
