@extends('layouts.app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Creacion Cliente</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Ventas</li>
                        <li class="breadcrumb-item">Cliente</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- mensajes de sistema --> 
        <div class="row">
            <div class="col-sm-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('messageerror'))
                <div class="alert alert-danger">{{session('messageerror')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('status'))
                <div class="alert alert-danger">{{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div id="wrongimage" class="alert alert-danger">Archivo de formato incorrecto. Solo se aceptan archivo .jpeg y .png<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="largegimage" class="alert alert-danger">Imagen demasiado grande.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="formvacio" class="alert alert-info">Complete los campos del formulario<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        
        
        <form id="fichacliente" action="/clientev" enctype="multipart/form-data" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Ingreso Nuevo Cliente
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-md-4">
                                        <div class="image-contrainer align-content-center" id="nofile">
                                            <img id ="demo" src="/images/logo.png" alt="Codigo QR" height="150px" width="150px"/>
                                            <input accept="image/*" type='file' id="imglogo" name="imglogo" require/>
                                        </div>
                                        <label>Region</label>
                                        <select id="region_cat" name="region_cat" class="form-control" require>
                                                <option value="" disabled selected>Elija una región</option>
                                                @foreach($reg as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                @endforeach
                                        </select>
                                        <label>Direccion</label>
                                        <input type="text" id="dir_cliente_txt" name="dir_cliente_txt" class="form-control" placeholder="Dirección #123" require>
                                       
                                    </div>                           
                                    <div class="col-md-4">
                                        <label>Rut</label>
                                        <input autocomplete="off" id="rut" name="rut" type="text" class="form-control" maxlength="9" placeholder="Rut sin guión y sin puntos" require>
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
                                                            Ya existe este cliente, ingrese otro rut, o modifiquelo en ficha clientes.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <label>Nombre</label>
                                        <input type="text" id="nombre_cliente_txt" name="nombre_cliente_txt" class="form-control"   placeholder="Nombre" require>
                                        <br>
                                        <br>
                                        <label>Comuna</label>
                                            <select id="comuna_cat" name="comuna_cat" class="form-control" require>
                                                <option value="" disabled selected>Seleccione una comuna</option>
                                            </select>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nacionalidad:</label>
                                            <select id="naci_cat" name="naci_cat" class="form-control" require>
                                                <option value="" disabled selected>Nacionalidad</option>
                                                <option value="Colombiana">Colombiana</option>
                                                <option value="Chilena">Chilena</option>
                                                <option value="Venezolana">Venezolana</option>
                                            </select>
                                            <label>E-mail</label>
                                        <input type="email" id="email_cliente_txt" name="email_cliente_txt" class="form-control" placeholder="correo@empresa.cl" require>
                                        <br>
                                        <br>
                                        <label>Telefono</label>
                                        <input type="text" id="telefono_cliente_txt"  name="telefono_cliente_txt" class="form-control" maxlength="9" placeholder="912345698" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            
                    <!--Datos del SII-->
                    <div class="col-md-6">
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Datos De SII</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Giro:</label>
                                        <input type="text" id="giro_cliente" name="giro_cliente" class="form-control" placeholder="Giro" require>
                                        
                                    </div>
                                    <div class="col-4">
                                        <label>Codigo de Actividad:</label>
                                        <input type="text" id="codigo_act_cliente" name="codigo_act_cliente" class="form-control" placeholder="Codigo actividad" require>
                                    </div>
                                    <div class="col-4">
                                        <label>Sucursal del SII</label>
                                        <input type="text" id="sucursal_cliente" name="sucursal_cliente" class="form-control" placeholder="Sucursal" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!--Datos Del Representante Legal -->                  
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Datos Del Representante Legal</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Rut Representante:</label>
                                        <input autocomplete="off" id="rut_rep_txt" name="rut_rep_txt" type="text" class="form-control" maxlength="9" placeholder="Rut con guión y sin puntos" require>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModalRep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Rut Incorrecto. Recuerde ingresar Rut sin puntos ni guion y con codigo verificador.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="col-8">
                                        <label>Nombre Representante:</label>
                                        <input type="text" id="nombre_rep_txt" name="nombre_rep_txt" class="form-control" placeholder="Nombre" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <!--Datos de Sucursal-->
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Sucursales</h3>
                            </div>
                            <div class="card-body">
                                <!-- boton para gregar mas sucursales
                                <a target="_self"  href="#contenedor_suc">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="float-lg-right">
                                                <button id="add" name="add" class="btn btn-info">Agregar Sucursal</button>
                                            </div>
                                        </div>
                                    </div> 
                                </a>
                                -->
                                
                                <div class="row">
                                    <div class="col-4">
                                        <label>Nombre de Sucursal:</label>
                                        <input type="text" id="nombre_suc_txt" name="nombre_suc_txt" class="form-control" placeholder="Nombre Sucursal" require>
                                    </div>
                                    <div class="col-4">
                                        <label>Codigo Sucursal:</label>
                                        <input type="text" id="codigo_suc_txt" name="codigo_suc_txt" class="form-control" placeholder="Codigo Sucursal" require>
                                    </div>
                                    <div class="col-4">
                                        <label>Encargado De Sucursal:</label>
                                        <input type="text" id="encargado_suc_txt" name="encargado_suc_txt" class="form-control" placeholder="Encargados" require>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-4">
                                        <label>Region:</label>
                                        <select id="region_cat_suc" name="region_cat_suc" class="form-control" require>
                                            <option value="" disabled selected>Elija una región</option>
                                            @foreach($reg as $cat)
                                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Comuna:</label>
                                        <select id="comuna_cat_suc" name="comuna_cat_suc" class="form-control" require>
                                            <option value="" disabled selected>Seleccione una comuna</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Direccion:</label>
                                        <input type="text" id="direcc_suc_txt" name="direcc_suc_txt" class="form-control" placeholder="Direccion" require>
                                    </div>
                                </div><!--
                                </br>
                                <div class="row">
                                    <div class="col-9" id="contenedor_suc">
                                        <div id="suc_cliente-1" class="suc_cliente">
                                             
                                            <p>Contenido Sucursal</p>
                                            
                                        </div>
                                    </div>
                                </div> 
                                -->
                            </div>
                        </div>
                    </div>
                           
                    <div class="col-md-6">
                        <!--Datos De Contacto-->
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Datos De Contacto</h3>
                            </div>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-6">
                                        <label>Nombre:</label>
                                        <input type="text" id="nombre_contacto_txt" name="nombre_contacto_txt" class="form-control" placeholder="Nombre" require>
                                    </div>
                                    <div class="col-6">
                                        <label>Telefono:</label>
                                        <input type="text" id="telefono_contacto_txt" name="telefono_contacto_txt" class="form-control" maxlength="9" placeholder="Telefono" require>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>Email:</label>
                                        <input type="email" id="email_contacto_txt" name="email_contacto_txt" class="form-control" placeholder="Mail" require>
                                    </div>
                                    <div class="col-6">
                                        <label>Cargo:</label>
                                        <input type="text" id="cargo_contacto_txt" name="cargo_contacto_txt" class="form-control" placeholder="Cargo" require>
                                    </div>
                                </div>      
                                <!--
                                </br>                                 
                                <div class="row">
                                    <div class="col-9" id="contenedor">
                                        <div id="obra-social-1" class="obra-social">
                                            <p>Contenido contacto</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="float-lg-right">
                                                <button id="add_con" name="add_con" class="btn btn-info">Agregar Contacto</button>
                                            </div>
                                        </div>
                                    </div>
-->
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                    
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-lg-right">
                            <button class="btn btn-success" id="agregar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            
            $(document).on('change','#region_cat',function(){
                //console.log("Cambio");

                var region_cat=$(this).val();
                //console.log(region_cat)
                var div=$(this).parent();
                var op=" ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findComunaC') !!}',
                    data:{'id':region_cat},
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
                    error:function()
                    {

                    }
                });
            });

            //funcion para validar logo
            $("#fichacliente").submit(function (event){
                var submit = true;
                var file = document.getElementById('imglogo');

                

                if(file.value == null || file.value == ""){
                    submit = false;
                    
                   // $("#nofile").fadeTo(2000, 500).slideUp(500, function () {
                   // $("#nofile").slideUp(500);
                    //    submit = false;
                   // });
                } 
                
                if (submit == false){
                    $("#formvacio").fadeTo(2000, 500).slideUp(500, function(){
                    $("#formvacio").slideUp(500);
                    });
                    event.preventDefault();
                }
            });              

            // cambia comunas de sucursales
            $(document).on('change','#region_cat_suc',function(){
                //console.log("Cambio");

                var region_cat_suc=$(this).val();
                //console.log(region_cat)
                var div=$(this).parent();
                var op=" ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findComunaC') !!}',
                    data:{'id':region_cat_suc},
                    success:function (data){
                        console.log('success');

                        console.log(data);

                        console.log(data.length);
                        op+='<option value="0" selected disabled>Elija comuna</option>';
                        for(var i=0;i<data.length;i++) {
                            op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        $('#comuna_cat_suc').html(" ");
                        $('#comuna_cat_suc').append(op);
                    },
                    error:function()
                    {

                    }
                });
            });
            
            //funcion para duplicar sucursales
            $('#add').click(function() {
                var contador = $('.suc_cliente').length + 1;
	            var bloque = '<div id="suc_cliente-' + contador + '" class="suc_cliente"><div class="row">"' +
                                '"<div class="col-4"> " '+
                                    '"<label>Nombre de Sucursal:</label>"' +
                                    '"<input type="text" id="nombre_suc_txt" name="nombre_suc_txt" class="form-control" placeholder="Nombre Sucursal" >"'+
                                '" <div class="col-4"> "' +
                                    '" <label>Codigo Sucursal:</label> "' +
                                    '" <input type="text" id="codigo_suc_txt" name="codigo_suc_txt" class="form-control" placeholder="Codigo Sucursal" >"' +
                                '" </div> "' +
                                '"<div class="col-4">"' +
                                    '" <label>Encargado De Sucursal:</label>"' +
                                    '" <input type="text" id="encargado_suc_txt" name="encargado_suc_txt" class="form-control" placeholder="Encargados" >"' +
                                '"</div>"' +
                                
                                '"</div>"' +                                                    

                             '"<div class="row">"' +
                                '"<div class="col-4">"' +
                                    '" <label>Region:</label>"' +
                                    '"<select id="region_cat_suc" name="region_cat_suc" class="form-control">"' +
                                        '" <option value="" disabled selected>Elija una región</option>"'+
                                        '" @foreach($reg as $cat)"' +
                                            '" <option value="{{$cat->id}}">{{$cat->nombre}}</option>"' +
                                        '" @endforeach"' +
                                    '"</select>"' +
                                '" </div>"' +
                                '" <div class="col-4">"' +
                                    '"<label>Comuna:</label>"'+
                                    '"<select id="comuna_cat_suc" name="comuna_cat_suc" class="form-control">" '+
                                        '"<option value="" disabled selected>Seleccione una comuna</option>"'+
                                    '"</select>"' +
                                '"</div>"'+
                                '"<div class="col-4">"'+
                                    '"<label>Direccion:</label>"' +
                                    '"<input type="text" id="direcc_suc_txt" name="direcc_suc_txt" class="form-control" placeholder="Direccion" >"'+
                                '"</div>"'+
                            '"</div></div></div>"';
                $('#contenedor_suc').append(bloque);
            });
        });  

        $("#formvacio").hide();
        
        //formateador Rut cliente
        $('#rut').change(function(){
            var rut = $('#rut').val()
           
            var asd = rut.substr(rut.length-1,rut.length)
            //alert(rut.substr(0,rut.length-1));
            var asd3 = dgv(rut.substr(0,rut.length-1))
            
            $.ajax({
                type: 'get',
                url: '{!! URL::to('validexistrut') !!}',
                data:{'rut':rut},
                
                success:function (data){
                    console.log('success');
                    console.log(data.value);
                    //alert("respuesta bd : " + data)                      
                    
                    //if (data.length != null || data.length != ''){
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
                error:function(){

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

            

        //formateador Rut Representante
        $('#rut_rep_txt').change(function(){
            var rut = $('#rut_rep_txt').val()
            var asd = rut.substr(rut.length-1,rut.length)
            var asd3 = dgv(rut.substr(0,rut.length-1))

            // despejar punto
            var valor = rut.replace('.','');
            // Despejar Guión
            valor = valor.replace('-','');
            valor = valor.replace('.','');
            // Aislar Cuerpo y Dígito Verificador
            var cuerpo = valor.slice(0,-1);

            var dv = valor.slice(-1).toUpperCase();
            var rutformato =cuerpo.substr(0,2) + "." + cuerpo.substr(2,3) + "." + cuerpo.substr(5,cuerpo.length) + "-" + dv;

            if(asd==asd3){
                document.getElementById("rut_rep_txt").value = rutformato;
                                
            }else{
                document.getElementById("rut_rep_txt").value = '';
                $('#myModalRep').modal('show');
            };


            function dgv(T)    //digito verificador
            {
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';


            }

        });

        
        //archivo requerido
        $('#fichacliente input[type=file]').on('change invalid', function(){
                var textin = $(this).get(0);
                textin.setCustomValidity('');

                if(!textin.validity.valid){
                    textin.setCustomValidity('Cargue este archivo')
                }
        });
        
        //Traductor mensajes
        $('#fichacliente input[type=text]').on('change invalid', function() {
            var textfield = $(this).get(0);
            textfield.setCustomValidity('');

            if (!textfield.validity.valid) {
                textfield.setCustomValidity('Complete este campo');
            }
        });

        var myTextbox = document.getElementById('telefono_cliente_txt');
            myTextbox.addEventListener('keypress', checkName, false);

            var myTextbox2 = document.getElementById('telefono_contacto_txt');
            myTextbox2.addEventListener('keypress', checkName, false);

            //valida solo numeros
            function checkName(evt) {
                var charCode = evt.charCode;
                if (charCode != 0) {
                    if (charCode < 45 || charCode > 57) {
                        evt.preventDefault();
                        displayWarning("Por favor use solo números.");
                    }
                }
            }

            
            // funcion despliega mensajes de error
            var warningTimeout;
            var warningBox = document.createElement("div");
            warningBox.className = "warning";

            function displayWarning(msg) {
                warningBox.innerHTML = msg;

                if (document.body.contains(warningBox)) {
                    window.clearTimeout(warningTimeout);
                } else {
                    // insert warningBox after myTextbox
                    myTextbox.parentNode.insertBefore(warningBox, myTextbox.nextSibling);
                }

                warningTimeout = window.setTimeout(function() {
                    warningBox.parentNode.removeChild(warningBox);
                    warningTimeout = -1;
                }, 2000);
            }

            //Visualizador de Imagen
            imglogo.onchange = evt => {
                const [file] = imglogo.files
                if (file) {
                    demo.src = URL.createObjectURL(file)
                }
            }

            //Validador Formato Imagen
            document.getElementById("imglogo").addEventListener("change", validateFoto)
            $("#wrongimage").hide();
            $("#largegimage").hide();

            function validateFoto(){
                const allowedExtensions =  ['jpg','png','jpeg'],sizeLimit = 1000000;
                const { name:fileName, size:fileSize } = this.files[0];
                const fileExtension = fileName.split(".").pop();
                if(!allowedExtensions.includes(fileExtension)){
                            $("#wrongimage").fadeTo(2000, 500).slideUp(500, function(){
                                $("#wrongimage").slideUp(500);
                            });
                    this.value = null;
                }else if(fileSize > sizeLimit){
                    $("#largegimage").fadeTo(2000, 500).slideUp(500, function(){
                        $("#largegimage").slideUp(500);
                    });
                    this.value = null;
                }
            }
        
  </script>
@endsection
