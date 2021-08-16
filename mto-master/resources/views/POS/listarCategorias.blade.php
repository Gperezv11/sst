<div id="divCategorias" style="overflow-x: hidden; overflow-y: auto; height: 40em; margin: 70px 0 0 10px;">
    <!-- llenado de categorias -->

<div class="row mb-2">
    @forelse($categorias as $categoria)
    <div class="col-md-6">
        <div class="item">
            <img src="{{ asset('imagenes/' . $categoria->imagen) }}" alt="categoria image" width="150px" height="150px" class="item-image">
            <div class="item-body" >
                <div class="row">
                    <h5>
                        <button type="button" class="btn btn-primary" title="Ver" data-toggle="modal" data-target="#verProductos{{$categoria->id}}"> {{$categoria->nombre}}</button>
                    </h5>
                </div>
            </div>
        </div>
    </div>    

         <!-- Modal mostrar productos por categoria -->
         <div class="modal fade" id="verProductos{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Producto por categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-x: hidden; overflow-y: auto; height: 30em">
                        <div class="row">
                            <div class="col"><strong> Imagen Ref.</strong></div>
                            <div class="col"><strong> Codigo</strong></div>
                            <div class="col"><strong> Nombre</strong></div>
                            <div class="col"><strong> P.venta</strong></div>
                            <div class="col"><strong> Cantidad</strong></div>
                            <div class="col"><strong> Dscto  $ / % </strong></div>
                            <div class="col"><strong> Comentarios</strong></div>
                            <div class="col"><strong> Accion</strong></div>
                        </div>
                        @forelse($buscarProductos as $producto)
                            @foreach ($producto->categorias as $cat)
                                @foreach ($producto->fichaPrecio as $prod)
                                    @if ($cat->id == $categoria->id)
                                        <form name="agregar Pedido" action="{{route('addProductoPOS', $order->id)}}" method="POST">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <div class="row">
                                                <div class="form-group col">
                                                    <img id="blah" src="{{ asset('imagenes/' . $producto->imagen) }}" class="rounded float-start" alt="1" height="100px" width="100px">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="sku">{{$producto->sku}} - {{$producto->id}}</label>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="nombre">{{$producto->nombre}}</label>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="precioVenta"> {{$prod->precio_venta_final}}</label>
                                                </div>
                                                <div class="form-group col">
                                                    <input type="text" name="cantidad" class="form-control" onkeypress=" return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46)" value="1" maxlength ="4"> 
                                                </div>
                                                <div class="form-group col">
                                                    <div class="input-group">
                                                        <input type="text" name="descuento" class="form-control" style="width: 50%;" onkeypress=" return (event.charCode >= 48 && event.charCode <= 57)" value="{{$prod->descuento}}" maxlength ="4">
                                                        <span class="input-group-addon"></span>
                                                        <select name="tipoDscto" id="tipoDscto" class="form-control" style="width: 47%;">
                                                            <option value="peso">$</option>
                                                            <option value="porcentaje">%</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <input type="textarea" name="comentario" class="form-control">
                                                </div>
                                                <div class="form-group col">
                                                    <input type="hidden" name="producto_id" value="{{$producto->id}}" class="form-control">
                                                    <input type="hidden" name="numOrden" value="{{$order->id}}" class="form-control">
                                                    <input type="hidden" name="precio" value="{{$prod->precio_venta_final}}" class="form-control">

                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach
                            @endforeach
                        @empty
                            <p>No se encontraron categorias </p>
                        @endforelse
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No se encontraron categorias </p>
    @endforelse
</div>
</div>