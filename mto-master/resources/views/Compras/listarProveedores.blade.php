@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
      integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listar Proveedores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Compras</li>
                    <li class="breadcrumb-item">Listar Proveedores</li>
                    
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Listar Proveedores
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table id="Proveedores_tablas" class="table table-striped table-bordered shadow-lg mt-4" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha Creacion</th>
                                        <th scope="col">Rut</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Region</th>
                                        <th scope="col">Comuna</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($fichas as $ficha)
                                    <div id="listaDinamica">
                                        <tr> 
                                            <td scope="row">{{ $ficha->created_at}}</td>
                                            <td>{{ $ficha->rut }}</td>
                                            <td>{{ $ficha->nombre }}</td>
                                            <td>{{ $ficha->nombre_region }}</td>
                                            <td>{{ $ficha->nombre_comuna }}</td>
                                            <td><input type="checkbox" name="ckbactivo" class="toggle-class" data-toggle="toggle" data-id="{{$ficha->id}}" data-on="Activo" data-off="Inactivo" {{$ficha->estado_ficha==true ? 'checked':'' }}></td>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
                                                        <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form name="deleteProv" action="{{route('listarProveedores.destroy', $ficha->id) }}" method="POST">
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
                                                <form id="editProveedor" action ="{{route('listarProveedores.update', $ficha->id) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body">
                                                        <!-- Contenido para actualizar ficha cliente -->
                                                        <input type="hidden" name="id" id="idEdit">
                                                        <div class="container-fluid">
                                                        <div class="row">
                                                            <!--Datos Personales cliente-->
                                                            <div class="card card-blue">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Datos del Proveedor</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <img id="blah" src="{{ asset('imagenes/' . $ficha->imagen) }}" height="150px" width="150px"/>
                                                                            <input id="imgInp" name="imgInp" type="file" accept="image/*" >
                                                                        
                                                                            <label>Region:</label>
                                                                            <select id="region_cat" name="region_cat" class="form-control">
                                                                                <option value="" disabled selected>Elija una región</option>
                                                                                @foreach($reg as $cat)
                                                                                    <option value="{{$cat->id}}"{{$cat->id == $ficha->region ? 'selected' : ''}}>{{$cat->nombre}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                            <label>Comuna:</label>
                                                                            <select id="comuna_cat" name="comuna_cat" class="form-control">
                                                                                @foreach($com as $cato)
                                                                                    <option value="{{$cato->id}}"{{$cato->id == $ficha->comuna ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                            <label>Direccion:</label>
                                                                            <input type="text" id="dire_edit_txt" name="dire_edit_txt" class="form-control" value="{{$ficha -> direccion}}">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>Rut:</label>
                                                                            <input type="text" id="RUT_edit_txt" name="RUT_edit_txt" class="form-control" value="{{$ficha -> rut}}" disabled >

                                                                            <label>Nombre:</label>
                                                                            <input type="text" id="nombre_edit_txt" name="nombre_edit_txt" class="form-control" value="{{$ficha -> nombre}}" disabled>

                                                                            <label>Email:</label>
                                                                            <input type="email" id="email_edit_txt" name="email_edit_txt" class="form-control" value="{{$ficha -> email}}" >

                                                                            <label>Telefono</label>
                                                                            <input type="text" id="fono_edit_txt" name="fono_edit_txt" maxlength="9" class="form-control" value="{{$ficha -> telefono}}">

                                                                            <label>Nacionalidad:</label>
                                                                            <select id="naci_cat" name="naci_cat" class="form-control">
                                                                                <option value="" disabled selected>Elija Nacionalidad</option>
                                                                                <option value="Colombiana"{{$ficha->nacionalidad == "Colombiana" ? 'selected' : ''}}>Colombiana</option>
                                                                                <option value="Chilena"{{$ficha->nacionalidad == "Chilena" ? 'selected' : ''}}>Chilena</option>
                                                                                <option value="3"{{$ficha->nacionalidad == "Venezolana" ? 'selected' : ''}}>Venezolana</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Contacto -->
                                                            <div class="card card-blue">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Datos De Contacto</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label>Nombre :</label>
                                                                            <input type="text" id="nomCont_edit_txt" name="nomCont_edit_txt" class="form-control" value="{{$ficha -> nombre_contacto}}" >
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label>Telefono:</label>
                                                                            <input type="text" id="fonoCont_edit_txt" name="fonoCont_edit_txt" class="form-control" value="{{$ficha -> telefono_contacto}}" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label>email:</label>
                                                                            <input type="text" id="emailCont_edit_txt" name="emailCont_edit_txt" class="form-control" value="{{$ficha -> email_contacto}}">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label>Cargo:</label>
                                                                            <input type="text" id="cargoCont_edit_txt" name="cargoCont_edit_txt" class="form-control" value="{{$ficha -> cargo_contacto}}">
                                                                        </div>
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
@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){
        //Cambio de regiones y comunas cliente
        $(document).on('change','#region_cat.form-control',function(){
            //console.log("Cambio");

            var region_cat=$(this).val();
            //console.log(region_cat)
            var div=$(this).parent();
            var op=" ";
            $.ajax({
                type: 'get',
                url:"{{ route('findComunalist') }}",
                data:{'id':region_cat},                    
                success:function (data){
                    console.log('success');
                    console.log(data.length);
                    op+='<option value="0" selected disabled>Elija comuna</option>';
                    for(var i=0;i<data.length;i++) {
                        op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $('#comuna_cat.form-control').html(" ");
                    $('#comuna_cat.form-control').append(op);

                },
                error:function()
                {

                }
            });
        });
    });

    //cambiar status cliente activo / inactivo
    $('.toggle-class').on('change',function(){
        //alert("cambiar estado");
        var status=$(this).prop('checked')==true ? 1 : 0;
        var ficha_id=$(this).data('id');

        $.ajax({
            type:'GET',
            dataType: 'json',
            url:'{{route("cambiarStatusProv")}}',
            data:{'estadoficha':status, 'id':ficha_id},
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

    //Visualizador de Imagen
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

    //redireccionamiento
    $('#modalCLoseX.close').click(function() {
        location.reload();
    });

    $('#modalCloseBtn.btn-secondary').click(function() {
        location.reload();
    });
</script>
        
@endsection