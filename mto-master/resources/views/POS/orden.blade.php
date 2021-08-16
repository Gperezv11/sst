@extends('layouts.app')
@section('css')
    
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orden</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">POS</li>
                        <li class="breadcrumb-item">Orden</li>
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
    </section>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Productos
                        </h3>
                    </div>
                    <!-- input de búsqueda de los productos-->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-1">
                                    <label >Búsqueda</label>
                                </div>
                                <div class="col-3">
                                    <select id="id_lista_precio" name="id_lista_precio" class="form-control" required>
                                        <option value="">Selecciona Lista Precio</option>
                                        @foreach($listaPrecios as $cato)
                                            <option value="{{$cato->id}}"{{$cato->id == $listaElejida ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select id="bodega_id" name="bodega_id" class="form-control" required>
                                        <option value="">Selecciona Lista Bodega</option>
                                        @foreach($bodegas as $cato)
                                        <option value="{{$cato->id}}"{{$cato->id == $bodegaElejida ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-3">
                                    <input type="text" id="buscarNombre" name="buscarNombre" class="form-control" placeholder="Buscar por nombre..." value ="{{$busqueda}}">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <!-- agrega dinamicamente los productos encontrados -->
                        <form  method="POST" enctype="multipart/form-data">
                            <table class="table" id="tablaProductos">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">Imagen</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col" class="text-right">Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($buscarProducto as $producto)
                                        <tr>
                                            <td class="text-center"><div><img id="blah" src="{{ asset('imagenes/' . $producto->fichaPrecio->imagen) }}" class="rounded float-start" alt="1" height="100px" width="100px"></div></td>
                                            <td class="text-left">{{$producto->nombre}}</td>
                                            <td>{{$producto->precio_venta_final}}</td>
                                            <td class="text-right"><button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#addModal{{$producto->id}}"><i class="fas fa-plus"></i> Agregar</button></td>
                                        </tr>

                                        <!-- Modal Crear Ingreso -->
                                        <div class="modal fade" id="addModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Al Pedido</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form name="ingresounidad" action="/orden" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="orden_id">#Pedido</label>
                                                                <input type="text" class="form-control" id="orden_id" name="orden_id" value ="{{$order->id}}"  readonly="readonly">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="producto_id">ID</label>
                                                                <input type="text" class="form-control" id="producto_id" name="producto_id" value ="{{$producto->id_producto}}"  readonly="readonly">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre">Nombre</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" value ="{{$producto->nombre}}"  readonly="readonly">
                                                            <div class="form-group">
                                                                <label for="precio">Precio</label>
                                                                <input type="text" class="form-control" id="precio" name="precio"  value ="{{$producto->precio_venta_final}}"  readonly="readonly">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cantidad">Cantidad</label>
                                                                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="comentario">Comentario</label>
                                                                <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                @endforeach
                                </tbody>
                            </table>                          
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Detalle Orden</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <label for="numero_orden"><h6>Vendedor </h6></label>

                            </div>
                            <div class="col-3">
                                <select id="bodega_id" name="bodega_id" class="form-control"required>
                                    <option value="0" disabled selected>Vendedor</option>
                                    @foreach($vendedores as $cato)
                                    <option value="{{$cato->id}}">{{$cato->nombre}} {{$cato->apellido_pat}}</option>
                                    @endforeach 
                                </select>
                            </div>                                  
                            <div class="col-2">
                                <label for="numero_orden" ><h6> Pedido #</h6></label>
                            </div>
                            <div class="col-3">
                                <input type="text" name="numero_orden" id="numero_orden" value="{{$order->id}}"  readonly="readonly">
                            </div>
                        </div>                 
                        
                        <div>
                            <!-- mostrar listado de pedido -->
                            @include('POS.tabla_comanda')
                        <div>
                        
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
                op = '<label for="propina"> ${{$order->total + $order->propina}}</label>';
            }else{
                op = '<label for="propina"> ${{$order->total}}</label>';
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
