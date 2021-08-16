<div id="divProductos" style="display: none"> 

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
        @foreach($buscarProductos as $producto)
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
                                    
                                        <label for="orden_id">#Pedido</label>
                                        <input type="text" class="form-control" id="orden_id" name="orden_id" value ="{{$order->id}}"  readonly="readonly">
                                    
                                    
                                        <label for="producto_id">ID</label>
                                        <input type="text" class="form-control" id="producto_id" name="producto_id" value ="{{$producto->id_producto}}"  readonly="readonly">
                                    
                                    
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value ="{{$producto->nombre}}"  readonly="readonly">
                                    
                                        <label for="precio">Precio</label>
                                        <input type="text" class="form-control" id="precio" name="precio"  value ="{{$producto->precio_venta_final}}"  readonly="readonly">
                                    
                                    
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                                    
                                    
                                        <label for="comentario">Comentario</label>
                                        <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario">
                                    
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