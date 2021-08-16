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
                    <h1>Ingreso Precio Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Ventas</li>
                        <li class="breadcrumb-item">Precio Productos</li>
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
            @if(session('messageinfo'))
                <div class="col-12">
                    <div class="alert alert-info">{{session('messageinfo')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        

        <div id="tabla_dinamica">
            <table class="table table-hover" id="tablafichas">
                <thead>
                <tr>
                    <th scope="col">Fecha Creacion</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Codigo De Barra</th>
                    <th scope="col">Nombre</th>                    
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fichas as $ficha)
                    <div>
                        <tr>
                            <th>{{$ficha->created_at}}</th>
                            <th>{{$ficha->sku}}</th>
                            <td>{{$ficha->codigo_barra}}</td>
                            <td>{{$ficha->nombre}}</td>
                            <td>
                                <button type="button" class="btn btn-success" title="Configurar"  data-toggle="modal" data-target="#addModal{{$ficha->id}}"><i class="fas fa-dollar-sign"></i></button>
                            </td>
                        </tr>
                    </div>  
                    <!-- modal agregar precio -->
                    <div class="modal fade" id="addModal{{$ficha->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Asignar Precio</h5>
                                    <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="storePrecioProducto" action="{{route('ingresarprecio.store' ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('POST') }}
                                    
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="image-contrainer align-content-center" id="nofile">
                                                    <img id ="blah" src="{{ asset('imagenes/' . $ficha->imagen) }}" alt="Logo" height="150px" width="150px" class="logo"/>
                                                </div>
                                                <label>Bodega</label>
                                                <select id="id_bodega" name="id_bodega" class="form-control" required>
                                                        <option value="" disabled selected>Selecciona Bodega</option>
                                                        @foreach($bodegas as $bodega)
                                                            <option value="{{$bodega->id}}">{{$bodega->nombre}}</option>
                                                        @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-5">
                                                <input id="id_producto" name="id_producto" type="text" value="{{$ficha -> id}}" hidden>
                                                <label>SKU</label>
                                                <input id="sku_producto" name="sku_producto" type="text" class="form-control" placeholder="SKU" value="{{$ficha -> sku}}" disabled>
                                                <input id="sku_producto" name="sku_producto" type="text" class="form-control" placeholder="SKU" value="{{$ficha -> sku}}" hidden>
                                                <label>Codigo de barra</label>
                                                <input id="codigo_barra_prod" name="codigo_barra_prod" type="text" class="form-control" placeholder="Codigo de barra" value="{{$ficha -> codigo_barra}}" disabled>
                                                <input id="codigo_barra_prod" name="codigo_barra_prod" type="text" class="form-control" placeholder="Codigo de barra" value="{{$ficha -> codigo_barra}}" hidden>
                                                <label>Nombre del Producto</label>
                                                <input id="nombre_prod" name="nombre_prod" type="text" class="form-control" placeholder="Nombre del producto" value="{{$ficha -> nombre}}"disabled>
                                                <input id="nombre_prod" name="nombre_prod" type="text" class="form-control" placeholder="Nombre del producto" value="{{$ficha -> nombre}}"hidden>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Lista de Precios</label>
                                                <select id="id_listaPrecio" name="id_listaPrecio" class="form-control" required>
                                                        <option value="" disabled selected>Selecciona Lista Precio</option>
                                                        @foreach($listaprecios as $cato)
                                                            <option value="{{$cato->id}}">{{$cato->nombre}}</option>
                                                        @endforeach
                                                </select>
                                                <label>Precio Costo</label>
                                                <input id="precioCosto" name="precioCosto" type="text" class="form-control">
                                                <label>Margen</label>
                                                <input id="margen" name="margen" type="text" class="form-control">
                                                <label>Precio venta Neto</label>
                                                <input id="precioVenta" name="precioVenta" type="text" class="form-control">
                                                <label>Descuento</label>
                                                <input id="descuento" name="descuento" type="text" class="form-control">
                                            </div>
                                            <div class="col-md-5">
                                            
                                                <label>Valor Venta Neto</label>
                                                <input id="ventaNeto" name="ventaNeto" type="text" class="form-control">
                                                <label>Iva</label>
                                                <input type="text" name="iva" class="form-control" {{$ficha->afecto == '' || $ficha->afecto == '0'  ? 'disabled' : 'Enabled'}}>
                                                <label>Otro Impuesto</label>
                                                <input type="text" name="otroImpuesto" class="form-control" {{$ficha->otro_impuesto == '' || $ficha->otro_impuesto == '0'  ? 'disabled' : 'Enabled'}}>
                                                <label>Precio Venta Final</label>
                                                <input id="ventaFinal" name="ventaFinal" type="text" class="form-control" required>
                                                <label>stock</label>
                                                <input id="stock" name="stock" type="text" class="form-control">
                                            </div>
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
                @endforeach
                </tbody>
            </table>
        </div>
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
            $('#tablafichas').DataTable({
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
        } );
    </script>
@endsection
