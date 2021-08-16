@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
      integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Resumen Productos y Servicios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item">Listar Productos/Servicios</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="productos_tablas" class="table table-striped table-bordered shadow-lg mt-4" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha Creacion</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Codigo de barra</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">¿Se Vende?</th>
                                            <th scope="col">¿Es inventariable?</th>
                                            <th scope="col">Afecto IVA</th>
                                            <th scope="col">Otros Impuestos</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fichas as $ficha)
                                        <div id="listaDinamica">
                                            <tr> 
                                                <td scope="row">{{ $ficha->created_at}}</td>
                                                <td>{{ $ficha->sku }}</td>
                                                <td>{{ $ficha->codigo_barra }}</td>
                                                <td>{{ $ficha->nombre }}</td>
                                                <td><input type="checkbox" id="ckbactivoventa" class="toggle-class" data-toggle="toggle" data-id="{{$ficha->id}}" data-on="Si" data-off="No" data-size="small" data-width="100" {{$ficha->estado_venta==true ? 'checked':'' }}></td>
                                                <td><input type="checkbox" id="ckbactivoinventario" class="toggle-class" data-toggle="toggle" data-id="{{$ficha->id}}" data-on="Si" data-off="No" data-size="small" data-width="100" {{$ficha->inventario==true ? 'checked':'' }}></td>
                                                <td><input type="checkbox" id="ckbactivoafecto" class="toggle-class" data-toggle="toggle" data-id="{{$ficha->id}}" data-on="Si" data-off="No" data-size="small" data-width="100" {{$ficha->afecto==true ? 'checked':'' }}></td>
                                                <td><input type="checkbox" id="ckbactivoimpuesto" class="toggle-class" data-toggle="toggle" data-id="{{$ficha->id}}" data-on="Si" data-off="No" data-size="small" data-width="100" {{$ficha->otro_impuesto==true ? 'checked':'' }}></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editModal{{$ficha->id}}"><i class="fas fa-user-edit"></i></button>
                                                    <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$ficha->id}}"><i class="fas fa-eye-slash"></i></button>
                                                </td>
                                            </tr>
                                        </div>
                                        <!-- modal para eliminar -->
                                        <div class="modal fade" id="eliminarModal{{$ficha->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                                                        <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form name="deleteProducto" action="{{route('listProdyservicio.destroy', $ficha->id) }}" method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nombreLic">Desea eliminar {{$ficha->nombre}}</label>
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
                                        <!-- Modal Edición Ficha -->
                                        <div class="modal fade" id="editModal{{$ficha->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Ficha</h5>
                                                        <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="editProducto" action ="{{route('listProdyservicio.update', $ficha->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="modal-body">
                                                            <!-- Contenido para actualizar ficha producto -->
                                                            <input type="hidden" name="id" id="idEdit">
                                                            <div class="container-fluid">
                                                            <div class="row">
                                                                <!--Datos del producto-->
                                                                <div class="card card-blue">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Modificar Producto o Servicio</h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="image-contrainer align-content-center" id="nofile">
                                                                                <img id ="blah" src="{{ asset('imagenes/' . $ficha->imagen) }}" alt="Logo" height="250px" width="250px" class="logo"/>
                                                                                <input accept="image/*" type="file" id="imglogo" name="imglogo" class="file" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </br>
                                                                    <div class="row">         
                                                                        <div class="col-md-6">
                                                                            <label>SKU</label>
                                                                            <input id="sku" name="sku" type="text" class="form-control" placeholder="SKU" value="{{$ficha -> sku}}" disabled>
                                                                            <label>Codigo de barra</label>
                                                                            <input id="codigo_barra" name="codigo_barra" type="text" class="form-control" placeholder="Codigo de barra" value="{{$ficha -> codigo_barra}}" disabled>
                                                                            <label>Nombre del Producto</label>
                                                                            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre del producto" value="{{$ficha -> nombre}}">
                                                                            <label>Unidad de Medida</label>
                                                                            <select id="unidad_medida" name="unidad_medida" class="form-control" >
                                                                                    <option value="" disabled selected>Selecciona unidad de medida</option>
                                                                                    @foreach($unidades as $cat)
                                                                                        <option value="{{$cat->id}}"{{$cat->id == $ficha->unidad_medida ? 'selected' : ''}}>{{$cat->nombre}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            
                                                                            <label>Tipo de Producto</label>
                                                                            <select id="id_tipoProducto" name="id_tipoProducto" class="form-control" >
                                                                                    <option value="" disabled selected>Selecciona Tipo de Producto</option>
                                                                                    @foreach($tipoProds as $prod)
                                                                                        <option value="{{$prod->id}}"{{$prod->id == $ficha->id_tipoProducto ? 'selected' : ''}}>{{$prod->nombre}}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                            <label>Stock Critico</label>
                                                                            <input id="stock_critico" name="stock_critico" type="text" class="form-control" placeholder="Stock critico" value="{{$ficha -> stock_critico}}">
                                                                        </div>
                                                                        
                                                                            <div class="col-md-6">
                                                                                <label>Linea de Negocio</label>
                                                                                <select id="id_linea_negocio" name="id_linea_negocio" class="form-control" >
                                                                                        <option value="" disabled selected>Selecciona Linea de Negocio</option>
                                                                                        @foreach($tipoNegs as $neg)
                                                                                            <option value="{{$neg->id}}"{{$neg->id == $ficha->id_linea_negocio ? 'selected' : ''}}>{{$neg->nombre}}</option>
                                                                                        @endforeach
                                                                                </select>
                                                                                <label>Categoria</label>
                                                                                <select id="id_categoria" name="id_categoria" class="form-control" >
                                                                                    <option value="" disabled selected>Selecciona Categoria</option>
                                                                                    @foreach($categorias as $cate)
                                                                                        <option value="{{$cate->id}}"{{$cate->id == $ficha->id_categoria ? 'selected' : ''}}>{{$cate->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label>Subcategoria</label>
                                                                                <select id="id_subcategoria" name="id_subcategoria" class="form-control" >
                                                                                    <option value="" disabled selected>Selecciona Subcategoria</option>
                                                                                    @foreach($subcategorias as $subcat)
                                                                                        <option value="{{$subcat->id}}"{{$subcat->id == $ficha->id_subcategoria ? 'selected' : ''}}>{{$subcat->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label>Marca</label>
                                                                                <select id="id_marca" name="id_marca" class="form-control" >
                                                                                    <option value="" disabled selected>Selecciona Marca</option>
                                                                                    @foreach($marcas as $marca)
                                                                                        <option value="{{$marca->id}}"{{$marca->id == $ficha->id_marca ? 'selected' : ''}}>{{$marca->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label>Submarca</label>
                                                                                <select id="id_submarca" name="id_submarca" class="form-control" >
                                                                                    <option value="" disabled selected>Selecciona Marca</option>
                                                                                    @foreach($submarcas as $submarca)
                                                                                        <option value="{{$submarca->id}}"{{$submarca->id == $ficha->id_submarca ? 'selected' : ''}}>{{$submarca->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                </br>
                                                                                <label>Decripcion del Producto</label>
                                                                                <textarea id="descripcion" name="descripcion" class="form-control" placeholder="descripcion del producto" >{{$ficha -> descripcion}}</textarea>
                                                                                <label>Stock maximo</label>
                                                                                <input id="stock_maximo" name="stock_maximo" type="text" class="form-control" placeholder="Stock maximo" value="{{$ficha -> stock_maximo}}">
                                                                            </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="modalCloseBtn" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                                     
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('scripts')

    <script type="text/javascript" >
    
        $(document).ready(function(){

                       
         //Cambio de regiones y comunas cliente
         $(document).on('change','#id_categoria.form-control',function(){
                //console.log("Cambio");

                var id_categoria=$(this).val();
                //console.log(id_categoria)
                var div=$(this).parent();
                var op=" ";
                $.ajax({
                    type: 'get',
                    url:"{{ route('findsubcategoria') }}",
                    data:{'id_categoria':id_categoria},                    
                    success:function (data){
                        console.log('success');
                        console.log(data.length);
                        op+='<option value="0" selected disabled>Seleccione Subcategoria</option>';
                        for(var i=0;i<data.length;i++) {
                            op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        $('#id_subcategoria.form-control').html(" ");
                        $('#id_subcategoria.form-control').append(op);

                    },
                    error:function()
                    {

                    }
                });
            });

            // cambiar submarca cuando cambie marca
            $(document).on('change','#id_marca.form-control',function(){
                //console.log("Cambio");
                var id_marca=$(this).val();
                //console.log(id_marca)
                var div=$(this).parent();
                var op=" ";
                $.ajax({
                    type: 'get',
                    url:"{{ route('findSubMarca') }}",
                    data:{'id_marca':id_marca},                    
                    success:function (data){
                        console.log('success');
                        console.log(data.length);
                        op+='<option value="0" selected disabled>Seleccione Submarca</option>';
                        for(var i=0;i<data.length;i++) {
                            op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        $('#id_submarca.form-control').html(" ");
                        $('#id_submarca.form-control').append(op);

                    },
                    error:function()
                    {

                    }
                });
            });     
            
        });

          

        
        //cambiar status inventario activo / inactivo
        $('#ckbactivoinventario.toggle-class').on('change',function(){
            //alert("cambiar estado");
            var status=$(this).prop('checked')==true ? 1 : 0;
            var ficha_id=$(this).data('id');

            $.ajax({
                type:'GET',
                dataType: 'json',
                url:'{{route("cambiarStatusInventario")}}',
                data:{'inventario':status, 'id':ficha_id},         
                success:function(data){
                    console.log(data);
                }
            });
        });

        //cambiar status inventario activo / inactivo
        $('#ckbactivoventa.toggle-class').on('change',function(){
            //alert("cambiar estado");
            var status=$(this).prop('checked')==true ? 1 : 0;
            var ficha_id=$(this).data('id');

            $.ajax({
                type:'GET',
                dataType: 'json',
                url:'{{route("cambiarStatusVenta")}}',
                data:{'estado_venta':status, 'id':ficha_id},         
                success:function(data){
                    console.log(data);
                }
            });
        });

        //cambiar afecto a IVA activo / inactivo
        $('#ckbactivoafecto.toggle-class').on('change',function(){
            
            var status=$(this).prop('checked')==true ? 1 : 0;
            var ficha_id=$(this).data('id');
            //alert("cambiar estado : " + status + " ficha : " +  ficha_id);
            $.ajax({
                type:'GET',
                dataType: 'json',
                url:'{{route("cambiarStatusAfecto")}}',
                data:{'afecto':status, 'id':ficha_id},         
                success:function(data){
                    console.log(data);
                }
            });
        });

        //cambiar otros impuestos activo / inactivo
        $('#ckbactivoimpuesto.toggle-class').on('change',function(){
            
            var status=$(this).prop('checked')==true ? 1 : 0;
            var ficha_id=$(this).data('id');
            //alert("cambiar estado : " + status + " ficha : " +  ficha_id);
            $.ajax({
                type:'GET',
                dataType: 'json',
                url:'{{route("cambiarStatusAfecto")}}',
                data:{'otro_impuesto':status, 'id':ficha_id},         
                success:function(data){
                    console.log(data);
                }
            });
        });


        
        //Estado Ficha
        $(function (){
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        }); 

        //redireccionamiento
        $('#modalCLoseX.close').click(function() {
            location.reload();
        });
    
        $('#modalCloseBtn.btn-secondary').click(function() {
            location.reload();
        });
         

        function readImage (input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah.logo').attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imglogo.file").change(function () {
            // Código a ejecutar cuando se detecta un cambio de archivO
            readImage(this);
        });

    </script>
        
@endsection