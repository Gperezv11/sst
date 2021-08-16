@php
    $subTotal=0;
    $propina =0;
    $totalPago =0;
@endphp

<div id="tabla_dinamica">
    <table width="100%" style="border-spacing: 5px; border-collapse: separate;" class="">
        <tr>
            <td width="10" valign="top">Eliminar</td>
            <td>Item</td>
            <td width="80">Cantidad</td>
            <td width="15%" class="text-right">P.Venta</td>
            <td width="15%" class="text-right">Editar</td>
        </tr>
        <tbody id="CartHTML">
            @foreach($pedido as $comanda)
            @foreach($comanda->producto as $prod)
            <tr>
                <td><button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$comanda->id}}"><i class="far fa-trash-alt size:2x"></i></button></td>
                <td><h6 style="margin:0px;">{{$prod->nombre}}</h6></td>
                <td width="80" class="text-center">{{$comanda->cantidad}}</td>
                <td width="15%" class="text-right"><h6 style="margin:0px;">{{$comanda->precio_venta}}</h6> </td>
                <td class="text-right"><button type="button" class="btn btn-info" title="Modificar" data-toggle="modal" data-target="#editModal{{$comanda->id}}"><i class="fas fa-pencil-alt"></i></button></td>
            </tr>

            <!-- modal para eliminar -->
            <div class="modal fade" id="eliminarModal{{$comanda->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar del Pedido </h5>
                            <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="deleteProducto" action="{{route('orden.destroy', $comanda->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombreLic">Desea eliminar {{$comanda->cantidad}}  {{$prod->nombre}}</label>
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
            <!-- modal finalizar pedido -->
            <div class="modal fade" id="finalizarpedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <div class="text-center">
                                <h4 class="modal-title" id="exampleModalLabel">Confirmar pedido</h4>
                            </div>
                            <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="finalizarOrden" action="{{route('finalizarPedido', $order->id)}}" method="POST">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <type class="hidden" name="propina"></type>
                                </div>
                                <div class="text-center">
                                    <label for="medioPago">Medio de pago</label>
                                </div>
                                <div class="text-center">
                                    <div class="form-check form-check-inline text-center">
                                        <input type="radio" class="btn-check" name="medioPago" id="efectivo" value="efectivo" autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary xl" for="efectivo"><h1><i class="far fa-money-bill-alt 7x"></i></h1></label>
                                    </div>
                                    <div class="form-check form-check-inline text-center">
                                        <input type="radio" class="btn-check" name="medioPago" id="tarjeta" value="tarjeta" autocomplete="off">
                                        <label class="btn btn-outline-secondary xl" for="tarjeta"><h1><i class="far fa-credit-card 7x"></i></h1></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-7">
                                        <label for="total_pago"><H5>Total</H5> </label>
                                    </div>
                                    <div class="col-3 text-right">
                                        <label for="totalPago"> $ {{$order->total}}</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-7">
                                        <label for="propina"><h5>Propina</h5> </label>
                                    </div>
                                    <div class="col-3 text-right">
                                        <label for="propina"> ${{$order->propina}}</label>
                                    </div>
                                    <div class="col-1 text-right">
                                        <input type="checkbox" class="form-check-input" name="dejaPropina" id="dejaPropina">
                                    </div>                     
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <label for="propina"><h5>Total a Pagar</h5> </label>
                                    </div>
                                    <div class="col-3 text-right" id="pago">
                                        <label for="propina"> ${{$order->total}}</label>
                                    </div>                                                    
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Completar Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
             <!-- modal para eliminar pedidos de la orden -->
             <div class="modal fade" id="eliminarPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar del Pedido </h5>
                            <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="deleteProducto" action="{{route('eliminarPedido', $order->id)}}" method="POST">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombreLic">Desea eliminar el pedido {{$order->id}}</label>
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
            <!-- Modal update Ingreso -->
            <div class="modal fade" id="editModal{{$comanda->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modificar Pedido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="updateProducto" action="{{route('orden.update', $comanda->id) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="orden_id">#Pedido</label>
                                    <input type="text" class="form-control" id="orden_id" name="orden_id" value ="{{$order->id}}"  readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="producto_id">ID</label>
                                    <input type="text" class="form-control" id="producto_id" name="producto_id" value ="{{$comanda->producto_id}}"  readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value ="{{$prod->nombre}}"  readonly="readonly">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio"  value ="{{$comanda->precio_venta}}"  readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value ="{{$comanda->cantidad}}" >
                                </div>
                                <div class="form-group">
                                    <label for="comentario">Comentario</label>
                                    <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario" value ="{{$comanda->comentario}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
            @endforeach
                @php
                    $subTotal+=$comanda->precio_venta*$comanda->cantidad;//sumanos los valores, ahora solo fata mostrar dicho valor
                    $propina=$subTotal*0.1;
                    $totalPago=$subTotal + $propina;
                @endphp
            @endforeach
        </tbody>
        
        <tfoot>
        <tr>
            <td colspan ="5">
				
			</td>
			<td class="text-right">
				
			</td>
        </tr>
        <tr>
			<td colspan ="4">
				<h4>Subtotal</h4>
			</td>
			<td class="text-right">
				<h4 id="p_subtotal">${{$subTotal}}</h4>
			</td>
		</tr>
		<tr>
			<td colspan ="4" style="color:rgb(150, 152, 154);">
				<h4>Propina(10%)</h4>
			</td>
			<td class="text-right" style="color:rgb(150, 152, 154);">
                <div id="propinaSi" >
				    <h4 id="p_hst">${{$propina}}</h4>
                </div>
            </td>
            
		</tr>
        <tr>
			
		</tr>
        <tr>
            <td colspan="5">
                <div class="bg-info">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <h4><strong>Total</strong></h4>
                                </td>
                                <td class="text-right ">
                                    <div id="totalNo">
                                        @php
                                            $totalPago=$subTotal;
                                        @endphp
                                        <h4 class="TotalAmount">$ {{$totalPago}}</h4>
                                        <input id="totalPago" type="hidden" value = "{{$totalPago}}"> </input>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <!-- -->
    </tfoot>
</table>
    <br><br><br>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td colspan="4" class="text-center">
                    <button type="button" id="btnFinalizar" class="btn btn-success xl" title="Finalizar" data-toggle="modal" data-target="#finalizarpedido"><i class="fas fa-cart-arrow-down"></i> Procesar Pedido</button>
                </td>
                <td colspan="4" class="text-center">
                    <button type="button" class="btn btn-danger xl" title="Limpiar" data-toggle="modal" data-target="#eliminarPedido"><i class="fas fa-brush"></i>  Limpiar pedido</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>