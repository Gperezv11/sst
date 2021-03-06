@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mantenedor Medico</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Mantenedor Medico</li>
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
                        <div class="card-header">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#crearModal">Ingreso Nuevo Medico</button>
                        </div>
                        <!-- Modal Crear -->
                        <div class="modal fade" id="crearModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ingreso Nuevo Doctor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_mascota" action="{{ route('vetmedico.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Rut</label>
                                                <input type="text" class="form-control" name="rut" id="rut">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input type="text" class="form-control" name="nom_inp" id="nom_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control" name="pat_inp" id="pat_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control" name="mat_inp" id="mat_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Especialidad</label>
                                                <input type="text" class="form-control" name="esp_inp" id="esp_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Codigo Doctor</label>
                                                <input type="text" class="form-control" name="cod_inp" id="cod_inp">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="tabla_medico" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="row">Rut</th>
                                            <th>Nombre</th>
                                            <th>Especialidad</th>
                                            <th>Codigo Doctor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medico as $m)
                                            <tr>
                                                <td scope="row">{{ $m->rut }}</td>
                                                <td>{{ $m->nombre }} {{ $m->apellido_p }} {{ $m->apellido_m }}</td>
                                                <td>{{ $m->especialidad }}</td>
                                                <td>{{ $m->codigo }}</td>
                                                <td>
                                                    <form action="{{ route('vetmedico.destroy', $m->id) }}" method="POST">
                                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#editModal{{ $m->id }}">Editar</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $m->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar
                                                                Medico
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form name="form1"
                                                            action="{{ route('vetmedico.update', $m->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="form-group">
                                                                        <label>Rut</label>
                                                                        <input type="text" class="form-control" id="rut"
                                                                            name="rut" value="{{ $m->rut }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nombre</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nom_edit" name="nom_edit"
                                                                            value="{{ $m->nombre }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Apellido Paterno</label>
                                                                        <input type="text" class="form-control"
                                                                            id="pat_edit" name="pat_edit"
                                                                            value="{{ $m->apellido_p }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Apellido Materno</label>
                                                                        <input type="text" class="form-control"
                                                                            id="mat_edit" name="mat_edit"
                                                                            value="{{ $m->apellido_m }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Especialidad</label>
                                                                        <input type="text" class="form-control"
                                                                            id="esp_edit" name="esp_edit"
                                                                            value="{{ $m->especialidad }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Codigo Doctor</label>
                                                                        <input type="text" class="form-control"
                                                                            id="cod_edit" name="cod_edit"
                                                                            value="{{ $m->codigo }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cerrar</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Actualizar</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tabla_medico').DataTable();
        });
    </script>
@endsection
