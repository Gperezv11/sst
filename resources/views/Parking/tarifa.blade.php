@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
      integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tarifas</h1>
            </div>
             
        </div>
    </div>
</section>
<!-- Manejo de mensajes -->
<section class="content">
    <div class="row">
        @if(session('status'))
            <div class="col-12">
                <div class="alert alert-success">{{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if(session('messageerror'))
            <div class="col-12">
                <div class="alert alert-danger">{{session('messageerror')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Listar Tarifas
                        </h3>
                    </div>
                    <div class="card-body">
                            <button href="#" class="btn btn-success"><i class="fas fa-plus"></i> Nueva Tarifa </button>
                            
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <table id="" class="table table-striped table-bordered shadow-lg mt-4" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Vehiculo</th>
                                        <th scope="col">Precio Minutos</th>
                                        <th scope="col">Precio Dia</th>
                                        <th scope="col">Tolerancia</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Auto</td>
                                        <td>$ 30</td>
                                        <td>$ 6000</td>
                                        <td>10</td>
                                        <td>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Moto</td>
                                        <td>$ 20</td>
                                        <td>$ 4000</td>
                                        <td>10</td>
                                        <td>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Camion</td>
                                        <td>$ 40</td>
                                        <td>$ 12000</td>
                                        <td>--</td>
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

@endsection