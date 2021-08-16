@php
    $subTotal=0;
    $propina =0;
    $totalPago =0;
    $descuento =0;
    $desc = 0;
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
             @if($comanda->estado == 1)
            <tr>
                <td><button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$comanda->id}}"><i class="far fa-trash-alt size:2x"></i></button></td>
                <td><h6 style="margin:0px;">{{$prod->nombre}}</h6></td>
                <td width="80" class="text-center">{{$comanda->cantidad}}</td>
                @php
                    if($comanda->tipo_descuento == 0){
                        $desc = $comanda->descuento;
                    }elseif($comanda->tipo_descuento == 1){
                        $desc = ((($comanda->precio_venta * $comanda->cantidad)*$comanda->descuento)/100);
                    }
                @endphp
                <td width="15%" class="text-right"><h6 style="margin:0px;">$ {{ number_format($comanda->precio_venta, 0, ",", ".")}}</h6> </td>
                <td width="15%" class="text-right"><h6 style="margin:0px;">$ {{ number_format($desc, 0, ",", ".")}}</h6> </td>
                <td width="15%" class="text-right"><h6 style="margin:0px;">$ {{ number_format($comanda->total_pago, 0, ",", ".")}} </h6> </td>
                <td class="text-right"><button type="button" class="btn btn-info" title="Modificar" data-toggle="modal" data-target="#editModal{{$comanda->id}}"><i class="fas fa-pencil-alt"></i></button></td>
            </tr>
            @php
                $subTotal+=$comanda->total_pago;//sumanos los valores, ahora solo fata mostrar dicho valor
                $descuento+=$comanda->descuento;
            @endphp
            @elseif($comanda->estado == 2)
            <tr>
                <td><button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$comanda->id}}" disabled ><i class="far fa-trash-alt size:2x"></i></button></td>
                <td><h6 style="margin:0px; color:LightSlateGray;">{{$prod->nombre}}</h6></td>
                <td width="80" class="text-center"><h6 style="color:LightSlateGray;">{{$comanda->cantidad}}</h6></td>
                @php
                    if($comanda->tipo_descuento == 0){
                        $desc = $comanda->descuento;
                    }elseif($comanda->tipo_descuento == 1){
                        $desc = ((($comanda->precio_venta * $comanda->cantidad)*$comanda->descuento)/100);
                    }
                @endphp
                <td width="15%" class="text-right"><h6 style="margin:0px; color:LightSlateGray;">$ {{ number_format($comanda->precio_venta, 0, ",", ".")}}</h6> </td>
                <td width="15%" class="text-right"><h6 style="margin:0px; color:LightSlateGray;">$ {{ number_format($desc, 0, ",", ".")}}</h6> </td>
                <td width="15%" class="text-right"><h6 style="margin:0px; color:LightSlateGray;">$ {{ number_format($comanda->total_pago, 0, ",", ".")}} </h6> </td>
                <td class="text-right"><button type="button" class="btn btn-info" title="Modificar" data-toggle="modal" data-target="#editModal{{$comanda->id}}" disabled><i class="fas fa-pencil-alt"></i></button></td>
            </tr>

            @endif
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
                                <div class="form-group">
                                    <input type="hidden" name="idProducto" value="{{$prod->id}}">
                                    <input type="text" name="comentarioEliminacion" id="comentarioEliminacion" class ="form-control" placeholder="Ingresa un comentario" required>
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
                                    <input type="text" class="form-control" id="precio" name="precio"  value ="{{$comanda->precio_venta}}"  data-target-id-text = "{{$comanda->id}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value ="{{$comanda->cantidad}}" maxlength ="4" data-target-id-text = "{{$comanda->id}}">  
                                        </div>
                                        <div class="col">
                                            <label for="cantidad">Descuento Aplicado</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" style="width: 47%;" id="descuentoEdit" name="descuentoEdit" placeholder="Descuento" value ="{{$comanda->descuento}}" maxlength ="4" data-target-id-text = "{{$comanda->id}}">
                                                <span class="input-group-addon"></span>
                                                <select name="tipoDscto" id="tipoDsctoEdit" class="form-control" style="width: 47%;" data-target-id-text = "{{$comanda->id}}">
                                                    <option value="1"{{$comanda->descuento == '' &&  $comanda->tipo_descuento == 0 ? 'selected' : ''}}></option>
                                                    <option value="peso"{{$comanda->descuento != '' && $comanda->tipo_descuento == 0 ? 'selected' : ''}}>$</option>
                                                    <option value="porcentaje"{{$comanda->descuento != '' && $comanda->tipo_descuento == 1 ? 'selected' : ''}}>%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group">
                                                <label for="desc3" class="form-label">Descuento</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" name="descApli" id="descApli" class="form-control" value="$ {{number_format($desc, 0, ",", ".") }}" data-target-id-text = "{{$comanda->id}}" readonly>
                                            </div>    
                                        </div>
                                        
                                        <div class="col">
                                            <div class="input-group">
                                                <label for="desc3" class="form-label">Total</label>
                                            </div>
                                            <div class="input-group">
                                                @php
                                                    $TotaldescApli = ($comanda->precio_venta * $comanda->cantidad) - $desc;
                                                @endphp
                                                <input type="text" name="TotaldescApli" id="TotaldescApli" class="form-control" value="$ {{number_format($TotaldescApli, 0, ",", ".") }}" data-target-id-text = "{{$comanda->id}}" readonly>
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
                <input type="text" name="dsctoGlobal" id="dsctoGlobal" class="form-control" style="width: 25%;" onkeypress=" return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46)" value="{{number_format($order->descuento, 0, ",", ".")}}" maxlength ="4">
                <span class="input-group-addon"></span>
                
                <select name="tipoDsctoGlobal" id="tipoDsctoGlobal" class="form-control" style="width: 5%;">
                    <option value="0"></option>
                    <option value="peso">$</option>
                    <option value="porcentaje">%</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="valorDescuento"><h5> Descuento </h5></label>
        </div>
        <div class="col text-right" id="valorDescuento">
        </div>
    </div>
    <div class="row  bg-info">
        <div class="col-9">
            <label for="totalPago"><h5>Cobrar </h5></label>
        </div>
        <div class="col text-right">
            <div id="totalNo">
                <h4 class="TotalAmount">$ {{ number_format($order->total, 0, ",", ".")}} </h4>
                <input id="totalPago" type="hidden" value = "{{$order->total}}"> </input>
            </div>
        </div>
    </div>
        
</div>

<div id="DivBotones">
    <div class="row" style = "margin-top: 10px;">
        <div class="col text-center">
            <button type="button"  class="btn btn-outline-secondary  btn-lg" title="Finalizar" ><i class="fas fa-print"></i> Comanda</button>
        </div>
        <div class="col text-center">
            <button type="button" id="btnFinalizar" class="btn btn-outline-primary  btn-lg" title="Guardar" ><i class="far fa-save"></i>  Guardar</button>
        </div>
        <div class="col text-center">
            <button type="button" class="btn btn-outline-danger  btn-lg" title="Cancelar" data-toggle="modal" data-target="#eliminarPedido"><i class="fas fa-brush"></i>  Cancelar</button>
        </div>
    </div>
    <div class="row" style = "margin-top: 20px;">
        <div class="col text-center">
            <button type="button" id="btnPagar" class="btn btn-outline-info  btn-lg btn-block" title="Pagar" ><i class="fas fa-cart-arrow-down"></i> Pagar</button>     
        </div>
    </div>
</div>

<div id="DivDocumentos" class="hidden">
    <div class="row">
        <div class="col text-center">
            <label for=""><h4>Documentos</h4> </label>
        </div>      
    </div>
    <div class="row" style = "margin-top: 20px;">
        <div class="col text-center">
            <div class="form-check form-check-inline text-center">
                <input type="radio" class="btn-check" name="tipoDoc" id="ticket" value="ticket" autocomplete="off">
                <label class="btn btn-outline-secondary" for="ticket"><h4> Ticket</h4></label>
            </div>
            <div class="form-check form-check-inline text-center">
                <input type="radio" class="btn-check" name="tipoDoc" id="boleta" value="boleta" autocomplete="off" checked>
                <label class="btn btn-outline-secondary" for="boleta"><h4> Boleta</h4></label>
            </div>
            <div class="form-check form-check-inline text-center">
                <input type="radio" class="btn-check" name="tipoDoc" id="factura" value="factura" autocomplete="off">
                <label class="btn btn-outline-secondary" for="factura"><h4> Factura</h4></label>
            </div>
            <div class="form-check form-check-inline text-center">
                <input type="radio" class="btn-check" name="tipoDoc" id="guia" value="guia" autocomplete="off">
                <label class="btn btn-outline-secondary" for="guia"><h4> Guía</h4></label>
            </div>
        </div>
    </div>
    <div class="row bg-secondary" style = "margin-top: 20px;">
        <div class="col-11 text-center">
            <label for="FormaPago"><h4>Forma de Pago</h4></label>
        </div>  
        <div class="col-1">
            <button type="button" id="btnAddForma" class="btn" title="Pagar" ><i class="fas fa-plus"></i></button> 
        </div>  
    </div>
    <div id="DivformaPago" style = "margin-top: 20px;">
        <div class="row" id="DivformaPago0">
            <div class="col-4">
                <select class="form-control" aria-label="Selector Forma De Pago" id="selectFormaPago" name="selectFormaPago">
                    <option value="0" selected>Efectivo</option>
                    <option value="1">Tarjeta</option>
                    <option value="2">Transferencia</option>
                    <option value="3">Cheque</option>
                    <option value="3">Qr</option>
                </select>
            </div>
            <div class="col-4 input-group">
                <h5 style=" margin-top: 8px;">$ </h5>
                <span class="input-group-addon"></span>
                <input type="text" name="monto" id="monto" class="form-control" onkeypress=" return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46)">
            </div>
            
        </div>
    </div>
    <div class="row bg-light" style = "margin-top: 20px;">
        <div class="col">
            <label for="vuelto">Vuelto</label>
        </div>
            
        <div id="vuelto" class="col" class="text-right">
                    
        </div>
    </div>
    <div class="row" style = "margin-top: 20px;">
        <div class="col-4 text-center">
            <button type="button" id="btnctaxCobrar" class="btn btn-outline-success btn-lg text-nowrap" title="Cobrar" > Cuenta por Cobrar</button>
        </div>
        <div class="col-3 text-center">
            <button type="button" id="btnConsumo" class="btn btn-outline-success btn-lg text-nowrap" title="Consumo"> Consumo</button>
        </div>
        <div class="col-2 text-center">
            <button type="button" id="btnOtros" class="btn btn-outline-success btn-lg text-nowrap" title="Otro"> Otro</button>
        </div>
        <div class="col-2 text-center">
            <button type="button" id="btnVolver" class="btn btn-outline-primary btn-lg text-nowrap" title="Otro"> Volver</button>
        </div>
    </div>
    
</div>
