@extends('layouts.app')
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
.hidden { display: none; }


</style>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>POS MINIMARKET</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">POS</li>
                        <li class="breadcrumb-item">Minimarket</li>
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
        </div>
    </section>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Productos
                        </h3>
                    </div>
                    <!-- input de búsqueda de los productos-->
                    <div class="card-body">
                        <!-- busqueda por sku / barra / -->
                        <div>
                            <form name="BuscarProducto" action="{{route('buscarProducto', $order->id)}}" method="POST">
                            @csrf
                            {{ method_field('POST') }}
                                <div class="row">
                                    <div class="col-3">
                                        <label for="busqueda">Buscar producto</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="buscarProd" id="buscarProd" class="form-control" placeholder="Ingresa sku o codigo de barra, busqueda por nombre" required>
                                        <div id="busquedaList" class="col-8"></div>
                                    </div>
                                    
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Cargar todas las categorias de productos -->
                        <div >
                            @include('POS.listarCategorias')
                        </div>
                            
                        <br><br>  
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Detalle Venta</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                
                            </div>
                            <div class="col-6">
                                
                            </div>                                  
                            <div class="col-2">
                                <label for="numero_orden" ><h6> N° Venta </h6></label>
                            </div>
                            <div class="col-2">
                                <label for="numero_orden">{{$order->id}}</label>
                            </div>
                        </div>                 
                        
                        <div>
                            <!-- mostrar listado de pedido -->
                            @include('POS.tabla_pedido')
                        <div>
                        
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
<script>

    $(document).ready( function ($) {   
        

        // funcion para boton Pagar
        $('#btnPagar').click(function() {
            $('#DivBotones').hide();
            $('#DivDocumentos').removeClass('hidden');
        });

        // funcion para el boton volver 
        $('#btnVolver').click(function(){
            $('#DivDocumentos').addClass('hidden');
            $('#DivBotones').show();
        });

        $('#dsctoGlobal.form-control').val('0');

        // descuento globlar % o $
        $('#tipoDsctoGlobal.form-control').change(function(){
            var dsctoTipo = $(this).val();
            var dscto1 = $('#dsctoGlobal.form-control').val();
            var op = "";
            var aux = {{$order->total}}
            var totalAux = 0;
            var opDscto = "";
                        
            if(dsctoTipo == 'peso'){
                aux2 = Math.round(dscto1) 
                totalAux = aux - aux2;
                op = '<label for="totalConDscto"><h5> $'+ new Intl.NumberFormat(['ban', 'id'], { maximumSignificantDigits: 4 }).format(totalAux.toFixed()) +'</h5></label>';
                opDscto = '<label for="totalDscto"><h5> $ '+ new Intl.NumberFormat(['ban', 'id'], { maximumSignificantDigits: 3 }).format(aux2)  + '</h5></label>'

            }else{
                if(dsctoTipo == 'porcentaje'){
                auxdscto = (aux * dscto1)/100;
                totalAux = Math.round(aux-auxdscto);
                op = '<label for="totalConDscto"><h5> $'+ new Intl.NumberFormat(['ban', 'id'], { maximumSignificantDigits: 4 }).format(totalAux.toFixed()) +'</h5></label>';
                opDscto = '<label for="totalDscto"><h5> $ '+ new Intl.NumberFormat(['ban', 'id'], { maximumSignificantDigits: 3 }).format(auxdscto.toFixed())  + '</h5></label>';

                }else{
                    op = '<label for="totalConDscto"><h5> $ {{ number_format($order->total, 0,",", ".")}} </h5></label>';
                    $('#dsctoGlobal.form-control').val('0');
                    opDscto = '<label for="totalDscto"><h5> $ 0</h5></label>';
                }
            }

            $('#totalNo').html(" ");
            $('#totalNo').append(op);

            $('#valorDescuento').html(" ");
            $('#valorDescuento').append(opDscto);

        });

        //llamado para auto completar con busqueda por nombre
        $('#buscarProd').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:'POST',
                    data:{query:query, _token:_token},
                    success:function(data){
                        console.log(data);
                        
                        $('#busquedaList').fadeIn();  
                        $('#busquedaList').html(data);
                    }
                });
            }
        });

        // desaparece div autocomplete
        $(document).on('click', 'li', function(){  
            var texto = $(this).text();
            var termino = "$"
            let posicion = texto.indexOf(termino);
            //alert(posicion);
            var textoCortado = texto.substr(0,posicion);
            //alert(textoCortado);
            
            $('#buscarProd').val(textoCortado);  
            $('#busquedaList').fadeOut();  
        });

        // funcion para boton finalizar compra
        $('#btnFinalizar').click(function() {
            $('#DivDocumentos').hide();
            var dsctoTipo= $('#tipoDsctoGlobal.form-control').val();
            var dscto1   = $('#dsctoGlobal.form-control').val();
            var idComada = {{$order->id}};
            var _token   = $('input[name="_token"]').val();
            
                $.ajax({
                url:"{{ route('finalizarPedidoPOS') }}",
                method:'POST',
                data:{dscto:dscto1, tipo:dsctoTipo,id:idComada, _token:_token},
                success:function(data){
                    console.log(data);
                    swal("Perfecto!", "Guardado correctamente!", "success")
                    .then((value) => {
                        location.reload();
                    });
                    //location.reload();
                },
                error : function(xhr, status) {
                    swal("Oops, Algo salió mal!!", "error");
                }
            });
        });

        // al tener el foco obligo a elegir % o $
        var x = document.getElementById("dsctoGlobal");
        x.addEventListener("focus", myFocusFunction, true);

        function myFocusFunction() {
            $("#tipoDsctoGlobal.form-control").val('0')
        }



        
        // al tener el foco obligo a elegir % o $
        $("#descuentoEdit.form-control").focus(function(){
        var idDC_P = $(this).attr("data-target-id-text");
        $("[data-target-id-text='"+idDC_P+"'][id='tipoDsctoEdit']").val('1')
        }); 

        // descuento EDITAR % o $
        $('#tipoDsctoEdit.form-control').change(function(){
            var idDC_P = $(this).attr("data-target-id-text");

            var dscto1 = $("[data-target-id-text$='"+idDC_P+"'][id='descuentoEdit'][class='form-control']").val();
            //alert(dscto1);
            var cantidad = $("[data-target-id-text$='"+idDC_P+"'][id='cantidad'][class='form-control']").val();
            //alert(cantidad);
            var dsctoTipo = $("[data-target-id-text$='"+idDC_P+"'][id='tipoDsctoEdit'][class='form-control']").val();
            //alert(dsctoTipo);
            var aux = $("[data-target-id-text$='"+idDC_P+"'][id='precio'][class='form-control']").val();;
            //alert(aux);
            
                                        
            if(dsctoTipo == 'peso'){
                desc = (aux*cantidad);
                totalDesc = desc - dscto1;
                
                $("[data-target-id-text$='"+idDC_P+"'][id='descApli'][class='form-control']").val("$" + dscto1);
                $("[data-target-id-text$='"+idDC_P+"'][id='TotaldescApli'][class='form-control']").val("$" + totalDesc);
            }else{
                if(dsctoTipo == 'porcentaje'){
                    desc = ((aux*cantidad)*dscto1)/100;
                    totalDesc = (aux*cantidad) - desc;
                    $("[data-target-id-text$='"+idDC_P+"'][id='descApli'][class='form-control']").val("$" + desc);
                    $("[data-target-id-text$='"+idDC_P+"'][id='TotaldescApli'][class='form-control']").val("$" + totalDesc);
                }else{
                    totalDesc = aux*cantidad;
                    $("[data-target-id-text$='"+idDC_P+"'][id='descApli'][class='form-control']").val('$ 0');
                    $("[data-target-id-text$='"+idDC_P+"'][id='TotaldescApli'][class='form-control']").val('$ ' + totalDesc );
                }
            }                
        });

        // Cantidad EDITAR % o $
        $('#cantidad.form-control').change(function(){
            var idDC_P = $(this).attr("data-target-id-text");

            var dscto1 = $("[data-target-id-text$='"+idDC_P+"'][id='descuentoEdit'][class='form-control']").val();
            //alert(dscto1);
            var cantidad = $("[data-target-id-text$='"+idDC_P+"'][id='cantidad'][class='form-control']").val();
            //alert(cantidad);
            var dsctoTipo = $("[data-target-id-text$='"+idDC_P+"'][id='tipoDsctoEdit'][class='form-control']").val();
            //alert(dsctoTipo);
            var aux = $("[data-target-id-text$='"+idDC_P+"'][id='precio'][class='form-control']").val();;
            //alert(aux);
            
                                        
            if(dsctoTipo == 'peso'){
                desc = (aux*cantidad);
                totalDesc = desc - dscto1;
                
                $("[data-target-id-text$='"+idDC_P+"'][id='descApli'][class='form-control']").val("$" + dscto1);
                $("[data-target-id-text$='"+idDC_P+"'][id='TotaldescApli'][class='form-control']").val("$" + totalDesc);
            }else{
                if(dsctoTipo == 'porcentaje'){
                    desc = ((aux*cantidad)*dscto1)/100;
                    totalDesc = (aux*cantidad) - desc;
                    $("[data-target-id-text$='"+idDC_P+"'][id='descApli'][class='form-control']").val("$" + desc);
                    $("[data-target-id-text$='"+idDC_P+"'][id='TotaldescApli'][class='form-control']").val("$" + totalDesc);
                }else{
                    totalDesc = aux*cantidad;
                    $("[data-target-id-text$='"+idDC_P+"'][id='descApli'][class='form-control']").val('$ 0');
                    $("[data-target-id-text$='"+idDC_P+"'][id='TotaldescApli'][class='form-control']").val('$ ' + totalDesc );
                }
            }                
        });

        //agregar mas linea de  formas de pago
        var i = 0;
        $('#btnAddForma').click(function(){
            var monto = $('#monto').val();
            if(monto){
                if(total !=0){
                    if(i < 4){
                        //alert("1");
                        var newDiv = document.createElement("div");
                        //alert("2");
                        newDiv.id = "DivformaPago"+ i++;
                        newDiv.className = 'row'; 
                        //alert("3");
                        newDiv.innerHTML = '<div class="col-4" style = "margin-top: 20px;"> '+
                                            '<select class="form-control" aria-label="Selector Forma De Pago" id="selectFormaPago'+i+'" name="selectFormaPago"> '+
                                                '<option value="0" selected>Efectivo</option>'+
                                                '<option value="1">Tarjeta</option>'+
                                                '<option value="2">Transferencia</option>'+
                                                '<option value="3">Cheque</option>'+
                                                '<option value="3">Qr</option>'+
                                            '</select>'+
                                            '</div>'+
                                            '<div class="col-4 input-group" style = "margin-top: 20px;">'+
                                            '<h5 style=" margin-top: 8px;">$</h5>'+
                                            '<span class="input-group-addon"></span>'+
                                            '<input type="text" name="monto" id="monto'+i+'" class="form-control" onkeypress=" return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46)" placeholder="'+total+'">'+
                                            '</div>';
                        //alert("4");
                        // Obtener una referencia al elemento, antes de donde queremos insertar el elemento
                        var sp2 = document.getElementById("DivformaPago0");
                        // añade el elemento creado y su contenido al DOM
                        var parentDiv = sp2.parentNode;
                        //alert("6");
                        parentDiv.appendChild(newDiv);
                    }else{
                        $("#btnAddForma").attr('disabled','disabled');
                    }
                }
            }
        });
        
        var total = {{$order->total}};
        $(document).on('change','[id*="monto"]', function(){ //esta función se ejecutará en todos los casos
            if(total !=0){
                var montoPagado = $(this).val();
                var vuelto = montoPagado - total;
                if(vuelto >= 0){
                    $("#btnAddForma").attr('disabled','disabled');
                }
                total  = total- montoPagado;
                var op ='<label for="vueltocta"><h5> $ '+ new Intl.NumberFormat(['ban', 'id'], { maximumSignificantDigits: 4 }).format(vuelto.toFixed()) +'</h5></label>'
                $('#vuelto').html(" ");
                $('#vuelto').append(op);
            }
            
        });       
    });
    </script>
@endsection
