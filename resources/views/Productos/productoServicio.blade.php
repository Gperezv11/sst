@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
      integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ingreso De Productos y Servicios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Productos</li>
                    <li class="breadcrumb-item">Ingreso De Productos y Servicios</li>
                    
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Manejo de mensajes -->
<section class="content">
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
    </div>
</section>

<form id="ingresoProductos" action="{{route('addProductos') }}" enctype="multipart/form-data" method="post">
@csrf 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Ingreso De Producto o Servicios
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="image-contrainer align-content-center" id="nofile">
                                    <img id ="demo" src="/images/logo.png" alt="Codigo QR" height="250px" width="250px"/>
                                    <input accept="image/*" type='file' id="imglogo" name="imglogo" required/>
                                </div>
                                </br>
                                
                                <div class="row">
                                    <div class="col-6"> 
                                        <div> 
                                            <label>¿Es inventariable?</label>
                                            <div>
                                                <input type="checkbox" name="inventario" class="toggle-class" data-toggle="toggle" data-on="Si" data-off="No" data-size="small" data-onstyle="success" data-offstyle="primary" data-width="100">
                                            </div>
                                        </div> 
                                        <div > 
                                            <label>Afecto IVA</label>
                                            <div>
                                                <input type="checkbox" name="afecto" class="toggle-class" data-toggle="toggle" data-on="Si" data-off="No" data-size="small" data-onstyle="success" data-offstyle="primary" data-width="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label>¿Se Vende?</label>
                                            <div>
                                                <input type="checkbox" name="estado_venta" class="toggle-class" data-toggle="toggle" data-on="Si" data-off="No" data-size="small" data-onstyle="success" data-offstyle="primary" data-width="100">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Otros Impuestos</label>
                                            <div>
                                                <input type="checkbox" name="otro_impuesto" class="toggle-class" data-toggle="toggle" data-on="Si" data-off="No" data-size="small" data-onstyle="success" data-offstyle="primary" data-width="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <!-- -->
                                <div>
                                    <label>Nombre del Producto</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre del producto" required>
                                    <label>SKU</label>
                                    <input id="sku" name="sku" type="text" class="form-control" placeholder="SKU" required>
                                    <label>Codigo de barra</label>
                                    <input id="codigo_barra" name="codigo_barra" type="text" class="form-control" placeholder="Codigo de barra" required>
                                    <label>Unidad de Medida</label>
                                    <select id="unidad_medida" name="unidad_medida" class="form-control" >
                                            <option value="" disabled selected>Selecciona unidad de medida</option>
                                            @foreach($unidades as $cat)
                                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                            @endforeach
                                    </select>
                                    <label>Tipo de Producto</label>
                                    <select id="id_tipoProducto" name="id_tipoProducto" class="form-control" >
                                            <option value="" disabled selected>Selecciona Tipo de Producto</option>
                                            @foreach($tipoProds as $prod)
                                                <option value="{{$prod->id}}">{{$prod->nombre}}</option>
                                            @endforeach
                                    </select>
                                    <label>Stock Critico</label>
                                    <input id="stock_critico" name="stock_critico" type="text" class="form-control" placeholder="Stock critico">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>Linea de Negocio</label>
                                <select id="id_linea_negocio" name="id_linea_negocio" class="form-control" >
                                        <option value="" disabled selected>Selecciona Linea de Negocio</option>
                                        @foreach($tipoNegs as $neg)
                                            <option value="{{$neg->id}}">{{$neg->nombre}}</option>
                                        @endforeach
                                </select>
                                <label>Categoria</label>
                                <select id="id_categoria" name="id_categoria" class="form-control" >
                                        <option value="" disabled selected>Selecciona Categoria</option>
                                        @foreach($categorias as $cate)
                                            <option value="{{$cate->id}}">{{$cate->nombre}}</option>
                                        @endforeach
                                </select>
                                <label>Subcategoria</label>
                                <select id="id_subcategoria" name="id_subcategoria" class="form-control" >
                                        <option value="" disabled selected>---</option>
                                </select>
                                <label>Marca</label>
                                <select id="id_marca" name="id_marca" class="form-control" >
                                        <option value="" disabled selected>Selecciona Marca</option>
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                        @endforeach
                                </select>
                                <label>Submarca</label>
                                <select id="id_submarca" name="id_submarca" class="form-control" >
                                        <option value="" disabled selected>---</option>
                                </select>
                                </br>
                                <label>Decripcion del Producto</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" placeholder="descripcion del producto"></textarea>
                                <label>Stock maximo</label>
                                <input id="stock_maximo" name="stock_maximo" type="text" class="form-control" placeholder="Stock maximo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!-- Boton -->
        <div class="row">
            <div class="col-md-10">
                <div class="float-lg-right">
                    <button class="btn btn-success" id="agregar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){
        //cambio subcategoria al seleccionar categoria
        $(document).on('change','#id_categoria',function(){
            //console.log("Cambio");
            var id_categoria=$(this).val();
            console.log("this" + $(this).val())
            console.log("id" + id_categoria)
            var div=$(this).parent();
            var op=" ";
            $.ajax({
                type: 'get',
                url:"{{ route('findsubcategoria') }}",
                data:{'id_categoria':id_categoria},
                befordSubmit:function(data){
                        console.log(data);
                    },
                success:function (data){
                    console.log('success');

                    console.log(data);

                    console.log(data.length);
                    op+='<option value="0" selected disabled>Selecciona una Subcategoria</option>';
                    for(var i=0;i<data.length;i++) {
                        op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $('#id_subcategoria').html(" ");
                    $('#id_subcategoria').append(op);
                },
                error:function (xhr, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
            });
        });

        //cambio submarca al seleccionar marca
        $(document).on('change','#id_marca',function(){
            //console.log("Cambio");
            var id_marca=$(this).val();
            //console.log("this" + $(this).val())
            //console.log("id" + id_marca)
            var div=$(this).parent();
            var op=" ";
            $.ajax({
                type: 'get',
                url:"{{ route('findSubMarca') }}",
                data:{'id_marca':id_marca},
                befordSubmit:function(data){
                        console.log(data);
                    },
                success:function (data){
                    console.log('success');

                    console.log(data);

                    console.log(data.length);
                    op+='<option value="0" selected disabled>Selecciona una Submarca</option>';
                    for(var i=0;i<data.length;i++) {
                        op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $('#id_submarca').html(" ");
                    $('#id_submarca').append(op);
                }, 
                error:function (xhr, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
            });
        });
    });

    var input = document.getElementById('imglogo');
    input.addEventListener('imglogo', function(evt) {
    this.setCustomValidity('');
    });
    
    input.addEventListener('invalid', function(evt) {
    // Required
        if (this.validity.valueMissing) {
            this.setCustomValidity('Por favor seleccione una imagen!');
        }
    });

    //Visualizador de Imagen
    imglogo.onchange = evt => {
        const [file] = imglogo.files
        if (file) {
            demo.src = URL.createObjectURL(file)
        }
    }

</script>
        
@endsection