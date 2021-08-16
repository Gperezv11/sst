@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Resumen de Personal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Resumen de Personal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <table class="table table-striped table-bordered" id="tablapermisos">
            <thead>
            <tr>
                <th scope="col">Rut</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo Permiso</th>
                <th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha de Termino</th>
                <th scrope="col">Acciones</th>
            </tr>
            </thead>

            @foreach($permisos as $permiso)
                <tbody>
                <td scope="row">{{ $permiso->rut }}</td>
                <td>{{ $permiso->nombre }}</td>
                <td>{{ $permiso->tipopermiso}}</td>
                <td>{{ $permiso->finicio }}</td>
                <td>{{ $permiso->ftermino }}</td>
                <td>
                    <button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editPermModal{{$permiso->id}}"><i class="far fa-edit"></i></button>
                </td>

                <!-- Edit Modal -->
                <div class="modal fade" id="editPermModal{{$permiso->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Editar Permiso</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form1" action="{{route('tablapermisos.update',$permiso)}}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="form-group">
                                            <label>Rut</label>
                                            <input type="text" class="form-control" id="rut" name="rut" value="{{$permiso->rut}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombreInput">Nombre</label>
                                            <input type="text" class="form-control" id="nombreInput" name="nombreInput" value="{{$permiso->nombre}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tipo de Permiso</label>
                                            <select class="form-control" id="permBoxEdit" name="permBoxEdit">
                                                <option selected disabled>Seleccione opcion</option>
                                                <option value="Permiso Laboral"{{$permiso->tipopermiso == "Permiso Laboral" ? 'selected' : ''}} >Permiso Laboral</option>
                                                <option value="Permiso Medico"{{$permiso->tipopermiso == "Permiso Medico" ? 'selected' : ''}} >Permiso Medico</option>
                                                <option value="Licencia"{{$permiso->tipopermiso == "Licencia" ? 'selected' : ''}} >Licencia</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fecha Inicio</label>
                                            <input autocomplete="off" type="text" class="form-control datepicker" id="fInicio" name="fInicio" value="{{$permiso->finicio}}">
                                            <label for="">Fecha Termino</label>
                                            <input autocomplete="off" type="text" class="form-control datepicker" id="fTermino" name="fTermino" value="{{$permiso->ftermino}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".datepicker").datepicker({
            dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true
        });
    </script>
@endsection
