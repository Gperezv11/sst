@php
    $subTotal=0;
    $propina =0;
    $totalPago =0;
    $descuento =0;
@endphp
<div>
    <table width="100%" style="border-spacing: 5px; border-collapse: separate;" class="">
        <tr>
            <td width="10" valign="top"><strong>Eliminar</strong></td>
            <td><strong>Item</strong></td>
            <td width="80"><strong>Cantidad</strong></td>
            <td width="15%" class="text-right"><strong>P.uni</strong></td>
            <td width="15%" class="text-right"><strong>Dscto</strong></td>
            <td width="15%" class="text-right"><strong>Total</strong></td>
            <td width="15%" class="text-right"><strong>Editar</strong></td>
        </tr>
    </table>
</div>
<div id="tabla_dinamica" style="overflow-x: hidden; overflow-y: auto; height: 25em">
    <table width="100%" style="border-spacing: 5px; border-collapse: separate;" class="">
        <tbody id="CartHTML">
            @foreach($pedido as $comanda)
            @foreach($comanda->producto as $prod)
            <tr>
                <td><button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$comanda->id}}"><i class="far fa-trash-alt size:2x"></i></button></td>
                <td><h6 style="margin:0px;">{{$prod->nombre}}</h6></td>
                <td width="80" class="text-center">{{$comanda->cantidad}}</td>
                <td width="15%" class="text-right"><h6 style="margin:0px;">$ {{ number_format($comanda->precio_venta, 0, ",", ".")}}</h6> </td>
                <td width="15%" class="text-right"><h6 style="margin:0px;">$ {{ number_format($comanda->descuento, 0, ",", ".")}}</h6> </td>
                <td width="15%" class="text-right"><h6 style="margin:0px;">$ {{ number_format($comanda->total_pago, 0, ",", ".")}} </h6> </td>
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
                        <form name="deleteProducto" action="{{route('posMini.destroy', $comanda->id) }}" method="POST">
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
                        <form name="finalizarOrden" action="{{route('finalizarPedidoPOS', $order->id)}}" method="POST">
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
                                        <label for="propina"><h5>Descuento</h5> </label>
                                    </div>
                                    <div class="col-3 text-right">
                                        
                                    </div>
                                    <div class="col-1 text-right">
                                        
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
                        <form name="deleteProducto" action="{{route('eliminarPedidoPOS', $order->id)}}" method="POST">
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
                        <form name="updateProducto" action="{{route('posMini.update', $comanda->id) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="orden_id" name="orden_id" value ="{{$order->id}}" >
                                    <input type="hidden" class="form-control" id="producto_id" name="producto_id" value ="{{$comanda->producto_id}}">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value ="{{$prod->nombre}}"  readonly="readonly">
                                <div class="form-group">
                                    <label for="precio">Precio Venta</label>
                                    <input type="text" class="form-control" id="precio" name="precio"  value ="{{$comanda->precio_venta}}"  readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value ="{{$comanda->cantidad}}" >  
                                        </div>
                                        <div class="col">
                                            <label for="cantidad">Descuento Aplicado</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" style="width: 47%;" id="descuentoEdit" name="descuentoEdit" placeholder="Descuento" value ="{{$comanda->descuento}}">
                                                <span class="input-group-addon"></span>
                                                <select name="tipoDscto" id="tipoDscto" class="form-control" style="width: 47%;">
                                                    <option value="peso">$</option>
                                                    <option value="porcentaje">%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                    $subTotal+=$comanda->total_pago;//sumanos los valores, ahora solo fata mostrar dicho valor
                    $descuento+=$comanda->descuento;
                @endphp
            @endforeach
        </tbody>
        
        <tfoot>
        <tr>
            <td colspan ="6">
				
			</td>
			<td class="text-right">
				
			</td>
        </tr>
        <tr>
			<td colspan ="4">
				<h4>Subtotal</h4>
			</td>
			<td colspan ="3" class="text-right">
				<h4 id="p_subtotal">$ {{number_format($subTotal, 0, ",", ".")}}</h4>
			</td>
		</tr>
        <!-- -->
    </tfoot>
    </table>
    <br><br><br>

    <div class="row">
        <div class="form-group col-8">
            <label for="descuentoGlobal">Descuento Global</label>
        </div>
        <div class="form-group col">
            <div class="input-group">
                <input type="text" name="dsctoGlobal" id="dsctoGlobal" class="form-control" style="width: 25%;" onkeypress=" return (event.charCode >= 48 && event.charCode <= 57)" value="{{number_format($order->descuento, 0, ",", ".")}}" maxlength ="4">
                <span class="input-group-addon"></span>
                
                <select name="tipoDsctoGlobal" id="tipoDsctoGlobal" class="form-control" style="width: 5%;">
                    <option value="0"></option>
                    <option value="peso">$</option>
                    <option value="porcentaje">%</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row bg-info">
        <div class="col-9">
            <label for="totalPago"><h4>Total</h4></label>
        </div>
        <div class="col text-right">
            <div id="totalNo">
                @php
                    $totalPago=$subTotal-$descuento;
                @endphp
                <h4 class="TotalAmount">$ {{ number_format($order->total, 0, ",", ".")}} </h4>
                <input id="totalPago" type="hidden" value = "{{$totalPago}}"> </input>
            </div>
        </div>
    </div>
    
</div>
<div>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td colspan="4" class="text-center">
                    <button type="button" id="btnFinalizar" class="btn btn-success xl" title="Finalizar" data-toggle="modal" ><i class="fas fa-cart-arrow-down"></i> Procesar</button>
                </td>
                <td colspan="4" class="text-center">
                    <button type="button" class="btn btn-danger xl" title="Limpiar" data-toggle="modal" data-target="#eliminarPedido"><i class="fas fa-brush"></i>  Cancelar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>