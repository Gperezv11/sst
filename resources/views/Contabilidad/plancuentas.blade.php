@extends('layouts.app')
@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="content-header">
        <div class="table table-striped table-bordered">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos y Servicios</h1>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#agregarModal">Agregar nuevo servicio</button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Contabilidad</li>
                        <li class="breadcrumb-item">Plan de cuentas</li>
                    </ol>
                </div>
            </div>
            <table>
                <div class="col-sm-12">
                    <div class="card card-blue">
                        {{-- <div class="card-body"> --}}
                            <div class="row scrollmenu">
                                <table id="tabla-reportecompra" class="table table-hover dt-responsive" cellspacing="0" width="100%" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Servicio</td>
                                            <td>tipo de cuenta</td>
                                            <td>Opciones</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tservicios as $c)
                                        <tr>
                                            <td>{{ $c->id }}</td>
                                            <td>{{ $c->nombre }}</td>
                                            <td>{{ $c->cuenta }}</td>
                                            <td>
                                                <form action="{{ route('tipo_servicio.destroy', $c->id) }}" method="POST">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#editModal{{ $c->id }}">Editar</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Editar Servicio</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">

                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('tipo_servicio.update', $c->id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="form-group">
                                                        <label for="">Servicio</label>
                                                        <input type="text" class="form-control" name="servicio_edit"
                                                            id="servicio_edit" value="{{ $c->nombre }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="">Tipo de cuenta</label>
                                                            <select class='form-control' name="cuenta_edit" id="cuenta_edit" required>
                                                                <option value="" disabled selected>Elija un tipo de cuenta</option>
                                                                @foreach ($tcuenta as $s)
                                                                    <option value='{{ $s->id }}'>{{ $s->nombre_tipo_cuenta }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                        <!-- Modal -->
                                        <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Servicio</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('tipo_servicio.store') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Servicio</label>
                                                                <input type="text" class="form-control" name="servicio"
                                                                    id="servicio" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="">Tipo de cuenta</label>
                                                                    <select class='form-control' name="cuenta" id="cuenta" required>
                                                                        <option value="" disabled selected>Elija un tipo de cuenta</option>
                                                                        @foreach ($tcuenta as $s)
                                                                            <option value='{{ $s->id }}'>{{ $s->nombre_tipo_cuenta }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        {{-- </div> --}}
                                <style>
                                    div.scrollmenu {
                                        overflow: auto;
                                        white-space: nowrap;
                                    }

                                    div.scrollmenu a {
                                        display: inline-block;
                                        color: white;
                                        text-align: center;
                                        padding: 14px;
                                        text-decoration: none;
                                    }

                                    div.scrollmenu a:hover {
                                        background-color: #777;
                                    }
                                    th[colspan="13"] {
                                        text-align: center;
                                    }
                                    th{
                                        color:DodgerBlue;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $.noConflict();
            $('#tabla-reportecompra').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                    responsive: true
                }
            });
        });
</script>
@endsection

