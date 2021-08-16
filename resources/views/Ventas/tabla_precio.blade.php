<div class="col-12 text-end"> 
    <form name="buscarXlista" action="{{route('listadoprecio.index')}}" method="GET">
        <div class="input-group">
        <div>
            <label class="col-form-label">Selecciona lista de precios</label>
        </div>   
        <div>
            <select id="id_lista_precio" name="id_lista_precio" class="form-control"required>
                    <option value="0" disabled selected>Selecciona Lista Precio</option>
                    @foreach($listaPrecios as $cato)
                        <option value="{{$cato->id}}">{{$cato->nombre}}</option>
                    @endforeach
            </select>
            </div>
            <button type="submit" class="btn btn-primary" title="Buscar"><i class="fas fa-search"></i></button> 
        </div>
    </form>
</div>
<br><br>

<div id="tabla_dinamica">
    <table class="table table-hover" id="tablafichas">
        <thead>
        <tr>
            <th scope="col">Fecha Creacion</th>
            <th scope="col">SKU</th>
            <th scope="col">Nombre</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio Venta Final</th>
            <th scope="col">Bodega</th>
            <th scope="col">Lista Precio</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prodprecio as $ficha)
            <div>
                <tr>
                    <th>{{$ficha->created_at}}</th>
                    <td>{{$ficha->fichaPrecio->sku}}</td>
                    <td>{{$ficha->fichaPrecio->nombre}}</td>
                    <td>{{$ficha->stock}}</td>
                    <td>{{$ficha->precio_venta_final}}</td>
                    <td>{{$ficha->bodega->nombre}}</td>
                    <td>{{$ficha->listaPrecio->nombre}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editModal{{$ficha->id}}"><i class="fas fa-edit"></i></button> 
                        <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$ficha->id}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </div>
            <!-- modal para eliminar -->
            <div class="modal fade" id="eliminarModal{{$ficha->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Precio Producto</h5>
                            <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="deleteNegocio" action="{{route('listadoprecio.destroy', $ficha->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombreLic">Desea eliminar {{$ficha->fichaPrecio->nombre}}</label>
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
            <!-- modal para actualizar -->
            <div class="modal fade" id="editModal{{$ficha->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Precio Producto</h5>
                            <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="storePrecioProducto" action="{{route('listadoprecio.update', $ficha->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>SKU</label>
                                        <input id="sku_producto" name="sku_producto" type="text" class="form-control" placeholder="SKU" value="{{$ficha -> sku}}" disabled>
                                        <input id="sku_producto_edit" name="sku_producto_edit" type="text" class="form-control" placeholder="SKU" value="{{$ficha -> sku}}" hidden>
                                    </div>

                                    <div class="col-md-6">
                                    <label>Codigo de barra</label>
                                        <input id="codigo_barra_prod" name="codigo_barra_prod" type="text" class="form-control" placeholder="Codigo de barra" value="{{$ficha -> codigo_barra}}" disabled>
                                        <input id="codigo_barra_prod_edit" name="codigo_barra_prod_edit" type="text" class="form-control" placeholder="Codigo de barra" value="{{$ficha -> codigo_barra}}" hidden>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre del Producto</label>
                                        <input id="nombre_prod" name="nombre_prod" type="text" class="form-control" placeholder="Nombre del producto" value="{{$ficha->fichaPrecio->nombre}}"disabled>
                                        <input id="nombre_prod_edit" name="nombre_prod_edit" type="text" class="form-control"  value="{{$ficha -> fichaPrecio->nombre}}"hidden>
                                        <input id="id_producto_edit" name="id_producto_edit" type="text" class="form-control"  value="{{$ficha -> id_producto}}"hidden>
                                            
                                    </div>
                                    <div class="col-md-6">
                                        <label>Lista de Precio</label>
                                        <select id="id_listaPrecio_edit" name="id_listaPrecio_edit" class="form-control" required>
                                            <option value="" disabled selected>Selecciona Lista Precio</option>
                                            @foreach($listaPrecios as $cato)
                                                <option value="{{$cato->id}}"{{$cato->id == $ficha->id_lista_precio ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <label>Bodega</label>
                                        <select id="id_bodega_edit" name="id_bodega_edit" class="form-control">
                                            @foreach($bodegas as $cato)
                                                <option value="{{$cato->id}}"{{$cato->id == $ficha->id_bodega ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <label>Precio Costo</label>
                                        <input id="precioCosto_edit" name="precioCosto_edit" type="text" class="form-control" value="{{$ficha -> precio_costo}}">
                                        <label>Margen</label>
                                        <input id="margen_edit" name="margen_edit" type="text" class="form-control" value="{{$ficha -> margen}}">
                                        <label>Precio venta Neto</label>
                                        <input id="precioVenta_edit" name="precioVenta_edit" type="text" class="form-control" value="{{$ficha -> precio_venta}}">
                                        <label>Descuento</label>
                                        <input id="descuento_edit" name="descuento_edit" type="text" class="form-control" value="{{$ficha -> descuento}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Valor Venta Neto</label>
                                        <input id="ventaNeto_edit" name="ventaNeto_edit" type="text" class="form-control" value="{{$ficha -> valor_venta_neto}}">
                                        <label>Iva</label>
                                        <input type="text" name="iva_edit" id="iva_edit" class="form-control" {{$ficha->iva == '' || $ficha->iva == '0'  ? 'disabled' : 'Enabled'}} value="{{$ficha -> iva}}">
                                        <label>Otro Impuesto</label>
                                        <input type="text" id="otroImpuesto_edit" name="otroImpuesto_edit" class="form-control" {{$ficha->otro_impuesto == '' || $ficha->otro_impuesto == '0'  ? 'disabled' : 'Enabled'}} value="{{$ficha -> otro_impuesto}}">
                                        <label>Precio Venta Final</label>
                                        <input id="ventaFinal_edit" name="ventaFinal_edit" type="text" class="form-control" value="{{$ficha -> precio_venta_final}}">
                                        <label>stock</label>
                                        <input id="stock_edit" name="stock_edit" type="text" class="form-control" value="{{$ficha -> stock}}">
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