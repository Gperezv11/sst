@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link red="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingreso Subcategorias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item">Subcategorias</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearIngreso">Nuevo Ingreso</button>
        </div>
        <!-- Modal Crear Ingreso -->
        <div class="modal fade" id="crearIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Ingreso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="ingresoLinea" action="/mantSubcategoria" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>                               
                                <select id="categoria_op" name="categoria_op" class="form-control" required>
                                    <option value="" disabled selected>Elija una categoria</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="nombreLic">Nombre</label>
                                <input type="text" class="form-control" id="nombreTipo" name="nombreTipo" placeholder="Ingrese Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="abreviaturaTipo">Abreviatura</label>
                                <input type="text" class="form-control" id="abreviaturaTipo" name="abreviaturaTipo" placeholder="EX">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-hover" id="tablaTipos">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Abreviatura</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tipos as $tipo)
            <div>
                    <tr>
                        <th>{{$tipo->id}}</th>
                        <td>{{$tipo->nombre}}</td>
                        <td>{{$tipo->abreviatura}}</td>
                        <td>{{$tipo->categoria}}</td>
                        <td><button type="button" class="btn btn-primary" title="Editar"  data-toggle="modal" data-target="#editModal{{$tipo->id}}"><i class="fas fa-user-edit"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$tipo->id}}"><i class="fas fa-eye-slash"></i></button></td>
                    </tr>
                </div>

                <!-- modal para actualizar -->
                <div class="modal fade" id="editModal{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Subcategoria</h5>
                                <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="upSubcat" action="{{route('mantSubcategoria.update', $tipo->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select id="id_categoria" name="id_categoria" class="form-control" >
                                            <option value="" disabled selected>Selecciona Categoria</option>
                                            @foreach($categorias as $cate)
                                                <option value="{{$cate->id}}"{{$cate->id == $tipo->id_categoria ? 'selected' : ''}}>{{$cate->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombreLic">Nombre</label>
                                        <input type="text" class="form-control" id="nombreTipo_edit" name="nombreTipo_edit" placeholder="Ingrese Nombre" value="{{$tipo->nombre}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="abreviaturaTipo">Abreviatura</label>
                                        <input type="text" class="form-control" id="abreviaturaTipo_edit" name="abreviaturaTipo_edit" placeholder="EX" value="{{$tipo->abreviatura}}">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal para eliminar -->
                <div class="modal fade" id="eliminarModal{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Subcategoria</h5>
                                <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="deleteSubcat" action="{{route('mantSubcategoria.destroy', $tipo->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreLic">Desea eliminar {{$tipo->nombre}}</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </section>
    <style>
        .container{
            align-self: center;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $.noConflict();
            $('#tablaTipos').DataTable({
                language:{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ning??n dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "??ltimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colecci??n",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %d fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "1": "Mostrar 1 fila",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "A??adir condici??n",
                        "button": {
                            "0": "Constructor de b??squeda",
                            "_": "Constructor de b??squeda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condici??n",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vac??o",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vac??o",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vac??o",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vac??o",
                                "contains": "Contiene",
                                "notEmpty": "No Vac??o",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangr??a",
                        "title": {
                            "0": "Constructor de b??squeda",
                            "_": "Constructor de b??squeda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de b??squeda",
                            "_": "Paneles de b??squeda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de b??squeda",
                        "loadMessage": "Cargando paneles de b??squeda",
                        "title": "Filtros Activos - %d"
                    },
                    "select": {
                        "1": "%d fila seleccionada",
                        "_": "%d filas seleccionadas",
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "$d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "??Est?? seguro que desea eliminar %d filas?",
                                "1": "??Est?? seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">M??s informaci??n&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "M??ltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aqu??, de lo contrario conservar??n sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
                }
            });
        } );
    </script>
@endsection
