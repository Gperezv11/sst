@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('css')

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Mascotas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Veterinaria</li>
                        <li class="breadcrumb-item">Lista de mascotas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="tabla-animal" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Dueño</td>
                                        <td>Especie</td>
                                        <td>Raza</td>
                                        <td>Edad</td>
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mascota as $m)
                                        <tr>
                                            <td>{{ $m->nombre }}</td>
                                            <td>{{ $m->nombre }}</td>
                                            <td>{{ $m->especie }}</td>
                                            <td>{{ $m->raza }}</td>
                                            <td>{{ $m->edad }}</td>
                                            <td>
                                                <form action="{{ route('vetmascota.destroy', $m->id) }}" method="POST">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#editModal{{ $m->id }}">Editar</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#tabla-animal').DataTable();
        });
    </script>
@endsection
