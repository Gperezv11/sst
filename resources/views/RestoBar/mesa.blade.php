
@extends('layouts.app')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
      integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('css')
<style type="text/css">

.item {
  margin: 0 12px 24px;
  width: 180px;
  height: 190px;
  border-radius: 8px;
  background: #FFF;
  color: #1E1E3A;
  box-shadow: 0 2px 3px #c2c6d6, 0 5px 10px #c2c6d6;
}

.item .item-image {
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}

.item .item-body {
  padding: 16px;
}

.item .item-body a {
  text-decoration: none;
  color: #065758;
}

.item .item-body a:hover {
  text-decoration: underline;
}

.item .item-body h5 {
  margin: 0 0 16px;
  font-size: 16px;
}

.item .item-body h5 a {
  color: #1E1E3A;
}



</style>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MESAS DISPONIBLES</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Mesas</li>
                        <li class="breadcrumb-item"></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            @if(session('messageerror'))
                <div class="col-12">
                    <div class="alert alert-danger">{{session('messageerror')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if(session('messageinfo'))
                <div class="col-12">
                    <div class="alert alert-info">{{session('messageinfo')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearIngreso">Nueva Mesa +</button>
        </div>
    </section>
    
    <!-- Modal Crear Ingreso -->
        <div class="modal fade" id="crearIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Mesa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="ingresoTipo" action="/mesa" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="abreviaturaTipo">Numero Mesa</label>
                                <input type="number" class="form-control" id="numeroMesa" name="numeroMesa" placeholder="Numero mesa">
                            </div>
                            <div class="form-group">
                                <label for="abreviaturaTipo">Detalle</label>
                                <input type="text" class="form-control" id="detalle" name="detalle" placeholder="Descripcion">
                            </div>
                            <div class="form-group">
                                <label for="abreviaturaTipo">Capacidad</label>
                                <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Total ocupantes">
                            </div>
                            <div class="form-group">
                                 <label for="estado">Estado</label>
                                 <select name="estado" class="form-control" id="estado">
                                    <option value="" disabled selected>Seleccione Estado</option>
                                    <option value"1">Activa</option>
                                    <option value"0">Desactivada</option>
                                 </select>
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
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Mesas:
                        </h3>
                    </div>
                   
                    <div class="row">
                         <table class="table table-hover" id="tablaTipos">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Mesa</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipos as $tipo)
                                <div>
                                    <tr>
                                        <th>{{$tipo->id}}</th>
                                        <td>{{$tipo->mesa}}</td>
                                        <td>{{$tipo->descripcion}}</td>
                                        <td>{{$tipo->capacidad}}</td>
                                        <td>{{$tipo->estado}}</td>
                                        <td><button type="button" class="btn btn-primary" title="Editar"  data-toggle="modal" data-target="#editModal{{$tipo->id}}"><i class="fas fa-user-edit"></i></button>
                                            <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$tipo->id}}"><i class="fas fa-eye-slash"></i></button></td>
                                    </tr>
                                </div>
                                 <!-- modal para actualizar -->
                                <div class="modal fade" id="editModal{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Marcas</h5>
                                                <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form name="upLineaNegocio" action="{{route('mesa.update', $tipo->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="modal-body">
                                                     <div class="form-group">
                                                        <label for="abreviaturaTipo">Numero Mesa</label>
                                                        <input type="number" class="form-control" id="numeroMesa_edit" name="numeroMesa_edit" placeholder="Numero mesa" value="{{$tipo->mesa}}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="abreviaturaTipo">Detalle</label>
                                                        <input type="text" class="form-control" id="detalle_edit" name="detalle_edit" placeholder="Descripcion" value="{{$tipo->descripcion}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="abreviaturaTipo">Capacidad</label>
                                                        <input type="number" class="form-control" id="capacidad_edit" name="capacidad_edit" placeholder="Total ocupantes" value="{{$tipo->capacidad}}">
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="estado">Estado</label>
                                                         <select name="estado_edit" class="form-control" id="estado_edit">
                                                            <option value="{{$tipo->estado}}">{{$tipo->estado}}</option>
                                                            <option value"0">Desactivada</option>
                                                         </select>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Marcas</h5>
                                                <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form name="deleteNegocio" action="{{route('mesa.destroy', $tipo->id) }}" method="POST">
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
                                    
                    </div> 
                    
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Detalle Mesa</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                               
                                    <label>Personas:</label>
                                    <select name="tipoVehiculo" class="form-control"><option value="" disabled selected>----</option><option>1</option><option>2</option><option>3</option><option>4</option></select>
                                    <label>Cliente:</label>
                                    <select name="tipoVehiculo" class="form-control"><option value="" disabled selected>----</option><option>Cliente 1</option><option>Cliente 2</option><option>Cliente 3</option></select>
                                    <label>Camarero:</label>
                                    <select name="tipoVehiculo" class="form-control"><option value="" disabled selected>----</option><option>Camarero 1</option><option>Camarero 2</option><option>Camarero 3</option></select>
                                    <label>Comentarios:</label>
                                    <textarea class="form-control" id="comentario" resize:none></textarea>  
                                    
                            </div> 
                            
                            
                        <div>
                    </div>
                </div> <br>
                <!-- Boton -->
        <div class="row">
            <div class="col-md-10">
                <div class="float-lg-right">
                    <button class="btn btn-success" id="agregar">Abrir Mesa</button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>

        var checkbox = document.getElementById('dejaPropina');
        var op = "";
        checkbox.addEventListener( 'change', function() {
            if(this.checked) {
                op = '<label for="propina"></label>';
            }else{
                op = '<label for="propina"></label>';
            }
            $('#pago').html(" ");
            $('#pago').append(op);
        });

        $(document).ready( function () {            
            $.noConflict();
            $('#tablaProductos').DataTable({
                language:{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
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
                        "collection": "Colección",
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
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
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
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
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
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
                }
            });
        });

        $('#btnFinalizar').click(function() {
            $pago = $('#totalPago').val()
      //      alert("finalizar" + $pago);
            
        });
    </script>
@endsection