@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ingreso De Rendidores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Rendiciones</li>
                    <li class="breadcrumb-item">Ingreso De Rendiciones</li>
                    
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
<form id="ingresoRendiciones" action="{{route('addRendicion') }}" enctype="multipart/form-data" method="post">
@csrf 
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">
                            Ingreso De Rendidor
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="image-contrainer align-content-center" id="nofile">
                                    <img id ="demo" src="/images/logo.png" alt="Codigo QR" height="150px" width="150px"/>
                                    <input accept="image/*" type='file' id="imglogo" name="imglogo" required/>
                                </div>
                            </div>                           
                            <div class="col-md-4">
                                <label>Rut</label>
                                    <input autocomplete="off" id="rut" name="rut" type="text" class="form-control" maxlength="9" placeholder="Rut sin guión y sin puntos" required>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Rut Incorrecto. Recuerde ingresar un rut valido.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal rut ya existe -->
                                    <div class="modal fade" id="myModalexiste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Ya existe este rendidor, ingrese otro rut, o modifiquelo en Lista Rendidores.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <label>Nacionalidad:</label>
                                <select id="naci_cat" name="naci_cat" class="form-control" >
                                    <option value="" disabled selected>Nacionalidad</option>
                                    <option value="Colombiana">Colombiana</option>
                                    <option value="Chilena">Chilena</option>
                                    <option value="Venezolana">Venezolana</option>
                                </select> 
                            </div>
                            <div class="col-md-4">
                                <label>Nombre Rendidor</label>
                                <input type="text" id="nombre_prov_txt" name="nombre_prov_txt" class="form-control"   placeholder="Nombre" >
                                <label>E-mail</label>
                                <input type="email" id="email_prov_txt" name="email_prov_txt" class="form-control" placeholder="correo@empresa.cl" >
                            </div>
                            <div class="col-4">
                                <label>Region</label>
                                <select id="region_cat" name="region_cat" class="form-control" >
                                        <option value="" disabled selected>Elija una región</option>
                                        @foreach($reg as $cat)
                                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Comuna</label>
                                    <select id="comuna_cat" name="comuna_cat" class="form-control" >
                                        <option value="" disabled selected>Seleccione una comuna</option>
                                    </select>
                            </div>
                            <div class="col-4">
                                <label>Telefono</label>
                                <input type="text" id="telefono_prov_txt"  name="telefono_prov_txt" class="form-control" maxlength="9" placeholder="912345698">
                            </div>
                            <div class="col-12">
                                <label>Direccion</label>
                                <input type="text" id="dir_prov_txt" name="dir_prov_txt" class="form-control" placeholder="Dirección #123">
                            </div>
                        </div>
                    </div>
                </div>

                <!--Datos De Contacto-->
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Datos De Contacto</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label>Nombre:</label>
                                <input type="text" id="nombre_contacto_txt" name="nombre_contacto_txt" class="form-control" placeholder="Nombre" >
                            </div>
                            <div class="col-6">
                                <label>Telefono:</label>
                                <input type="text" id="telefono_contacto_txt" name="telefono_contacto_txt" class="form-control" maxlength="9" placeholder="Telefono" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Email:</label>
                                <input type="email" id="email_contacto_txt" name="email_contacto_txt" class="form-control" placeholder="Mail" >
                            </div>
                        <div class="col-6">
                            <label>Cargo:</label>
                            <input type="text" id="cargo_prov_txt" name="cargo_prov_txt" class="form-control" placeholder="Cargo">
                        </div>
                    </div>      
                </div> 
            </div>
            <!-- Boton -->
            <div class="row">
                <div class="col-md-12">
                    <div class="float-lg-right">
                        <button class="btn btn-success" id="agregar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</form>

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){
        //cambio comuna x region
        $(document).on('change','#region_cat',function(){
            //console.log("Cambio");
            var region_cat=$(this).val();
            //console.log(region_cat)
            var div=$(this).parent();
            var op=" ";
            $.ajax({
                type: 'get',
                url:"{{ route('findComunalist') }}",
                data:{'id':region_cat},
                befordSubmit:function(data){
                        console.log(data);
                    },
                success:function (data){
                    console.log('success');

                    console.log(data);

                    console.log(data.length);
                    op+='<option value="0" selected disabled>Elija comuna</option>';
                    for(var i=0;i<data.length;i++) {
                        op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $('#comuna_cat').html(" ");
                    $('#comuna_cat').append(op);
                },
                error:function (xhr, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
            });
        });

        //formateador Rut cliente
        $('#rut').change(function(){
            var rut = $('#rut').val()
            var asd = rut.substr(rut.length-1,rut.length)
            //alert(rut.substr(0,rut.length-1));
            var asd3 = dgv(rut.substr(0,rut.length-1))
            
            $.ajax({
                type: 'get',
                url:"{{ route('existrutRendidor') }}",
                data:{'rut':rut},
                befordSubmit:function(data){
                        console.log(data);
                },
                success:function (data){
                    console.log('success');
                    console.log(data.value);

                    if (data.length > 0){
                        document.getElementById("rut").value = '';
                        $('#myModalexiste').modal('show');
                    }else{
                        
                        if(asd != asd3){
                            $('#myModal').modal('show');
                        }else{
                            // despejar punto
                            var valor = rut.replace('.','');
                            // Despejar Guión
                            valor = valor.replace('-','');
                            valor = valor.replace('.','');
                            // Aislar Cuerpo y Dígito Verificador
                            var cuerpo = valor.slice(0,-1);

                            var dv = valor.slice(-1).toUpperCase();
                            var rutformato =cuerpo.substr(0,2) + "." + cuerpo.substr(2,3) + "." + cuerpo.substr(5,cuerpo.length) + "-" + dv;
                            document.getElementById("rut").value = rutformato;
                        }
                    }                   
                },
                error:function (xhr, textStatus, errorThrown) {
                    console.log(xhr);    
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

            function dgv(T)    //digito verificador
            {
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
            }
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