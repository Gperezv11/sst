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
                                        <div id="busquedaList">
                                        </div>
                                    </div>
                                    
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Cargar todas las categorias de productos -->
                        <div >
                            <br><br>
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

        $(document).ready( function () {   
            // descuento globlar % o $
            $('#tipoDsctoGlobal.form-control').change(function(){
                var dsctoTipo = $(this).val();
                var dscto1 = $('#dsctoGlobal.form-control').val();
                var op = "";
                var aux = {{$order->total}}
                var totalAux = 0;

                if(dsctoTipo == 'peso'){
                    totalAux = aux - dscto1;
                    op = '<label for="totalConDscto"><h4> $ '+ new Intl.NumberFormat().format(totalAux)  + '</h4></label>';
                }else{
                    if(dsctoTipo == 'porcentaje'){
                    totalAux = aux-((aux * dscto1)/100);
                    op = '<label for="totalConDscto"><h4> $'+ new Intl.NumberFormat().format(totalAux) +'</h4></label>';
                    }else{
                        op = '<label for="totalConDscto"><h4> $ {{ number_format($order->total, 0, ",", ".")}} </h4></label>';
                        $('#dsctoGlobal.form-control').val('0');
                    }
                }
                $('#totalNo').html(" ");
                $('#totalNo').append(op);
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
                $('#buscarProd').val($(this).text());  
                $('#busquedaList').fadeOut();  
            });

            // funcion para boton finalizar compra
            $('#btnFinalizar').click(function() {
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
                        swal("Perfecto!", "Procesado correctamente!", "success")
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
            
            
        });

        
    </script>
@endsection
