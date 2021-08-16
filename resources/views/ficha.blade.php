@extends('layouts.app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ficha Personal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Ficha Personal</li>
                    </ol>
                </div>
            </div>
        </div>
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
                    <div id="wrongimage" class="alert alert-danger">Archivo de formato incorrecto. Solo se aceptan archivo .jpeg y .png<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="largegimage" class="alert alert-danger">Imagen demasiado grande.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            </div>
        </div>

        <form id="ficha" action="/ficha" enctype="multipart/form-data" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!--Datos Personales-->
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Datos de Personales</h3>
                            </div>
                            <div class="card-body">
                                <!--Columna superior-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <img id="blah" src="images/placeholder.jpg" height="150px" width="150px"/>
                                        <input accept="image/*" type='file' id="imgInp" name="imgInp" required/>
                                    </div>
                                    <div class="col-md-4">

                                        <label>Rut:</label>
                                        <input autocomplete="off" id="rut" name="rut" type="text" class="form-control" placeholder="Rut con guión y sin puntos" required>
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
                                                        Rut Incorrecto. Recuerde ingresar Rut sin puntos y con codigo verificador.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <label>Apellido Paterno:</label>
                                        <input type="text" id="apat_txt" name="apat_txt" class="form-control" placeholder="Apellido Paterno" required>

                                    </div>
                                    <div class="col-md-4">

                                        <label>Nombres:</label>
                                        <input type="text" id="nombre_txt" name="nombre_txt" class="form-control" placeholder="Nombres" required>

                                        <label>Apellido Materno:</label>
                                        <input type="text" id="amat_txt" name="amat_txt" class="form-control" placeholder="Apellido Materno" required>

                                    </div>
                                </div>
                                <!--Columna inferior-->
                                <div class="row">
                                    <div class="col-md-4">

                                        <label>Region:</label>
                                        <select id="region_cat" name="region_cat" class="form-control">
                                            <option value="" disabled selected>Elija una región</option>
                                            @foreach($reg as $cat)
                                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                            @endforeach
                                        </select>

                                        <label>Nacionalidad:</label>
                                        <select id="naci_cat" name="naci_cat" class="form-control">
                                            <option value="" disabled selected>Nacionalidad</option>
                                            <option value="Colombiana">Colombiana</option>
                                            <option value="Chilena">Chilena</option>
                                            <option value="Venezolana">Venezolana</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4">

                                        <label>Comuna:</label>
                                        <select id="comuna_cat" name="comuna_cat" class="form-control">
                                            <option value="" disabled selected>Seleccione una comuna</option>
                                        </select>

                                        <label>Direccion:</label>
                                        <input type="text" id="dire_txt" name="dire_txt" class="form-control" placeholder="Direccion" required>

                                    </div>
                                    <div class="col-md-4">

                                        <label>Fono</label>
                                        <input type="text" id="fono_txt" name="fono_txt" class="form-control" placeholder="Fono" required>

                                        <label>E-Mail</label>
                                        <input type="email" id="mail_txt" name="mail_txt" class="form-control" placeholder="Mail" required>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--Datos Empresa-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Datos Empresa</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">

                                        <label>Empresa:</label>
                                        <select id="empe_txt" name="empe_txt" class="form-control">
                                            <option value="" disabled selected>Empresa</option>
                                            <option value="GM Empresa">GM Empresa</option>
                                            <option value="Buses Mayorga">Buses Mayorga</option>
                                        </select>

                                    </div>
                                    <div class="col-3">

                                        <label>Cargo:</label>
                                        <select id="cargo_txt" name="cargo_txt" class="form-control">
                                            <option value="" disabled selected>Cargo</option>
                                            <option value="Cargo 1">Cargo 1</option>
                                            <option value="Cargo 2">Cargo 2</option>
                                            <option value="Cargo 3">Cargo 3</option>
                                        </select>

                                    </div>
                                    <div class="col-3">

                                        <label>Supervisor:</label>
                                        <select id="supe_txt" name="supe_txt" class="form-control">
                                            <option value="" disabled selected>Supervisor</option>
                                            <option value="Rolando Silva">Rolando Silva</option>
                                            <option value="Gonzalo Pérez">Gonzalo Pérez</option>
                                        </select>

                                    </div>

                                    <div class="col-3">

                                        <label>Proyecto:</label>
                                        <select id="proye_txt" name="proye_txt" class="form-control" placeholder="Elija Nacionalidad">
                                            <option value="" disabled selected>Proyecto</option>
                                            <option value="Salmonera">Salmonera</option>
                                            <option value="Petrolera">Petrolera</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Datos Remuneraciones -->
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Datos de Remuneraciones</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">

                                        <label>Sueldo Base:</label>
                                        <input type="text" id="sbase_txt" name="sbase_txt" class="form-control" placeholder="Sueldo Base" required>

                                    </div>

                                    <div class="col-3">

                                        <label>Bono:</label>
                                        <input type="text" id="bono_txt" name="bono_txt" class="form-control" placeholder="Bono" required>

                                    </div>
                                    <div class="col-3">

                                        <label>Asignacion:</label>
                                        <input type="text" id="asig_txt" name="asig_txt" class="form-control" placeholder="Asignacion" required>

                                    </div>
                                    <div class="col-3">

                                        <label>AFP:</label>
                                        <select id="afp_txt" name="afp_txt" class="form-control" placeholder="Elija Nacionalidad">
                                            <option value="" disabled selected>AFP</option>
                                            <option value="Provida">Provida</option>
                                            <option value="Cuprum">Cuprum</option>
                                            <option value="Habitat">Habitat</option>
                                        </select>

                                    </div>
                                    <div class="col-3">

                                        <label>Salud:</label>
                                        <select id="salud_txt" name="salud_txt" class="form-control" placeholder="Elija Nacionalidad">
                                            <option value="" disabled selected>Salud</option>
                                            <option value="Fonasa">Fonasa</option>
                                            <option value="Banmedica">Banmedica</option>
                                            <option value="Colmena">Colmena</option>
                                        </select>

                                    </div>
                                    <div class="col-3">

                                        <label>Plan de Salud:</label>
                                        <input type="text" id="psalud_txt" name="psalud_txt" class="form-control" placeholder="Plan de salud" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Mensaje de error Archivos PDF-->
                <div class="row">
                    <div class="col-sm-12">
                        <div id="wrongfile" class="alert alert-danger">Archivo de formato incorrecto. Solo se aceptan archivo .pdf<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="largefile" class="alert alert-danger">Archivo demasiado grande.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">

                        <!--Datos de Contrato-->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos de Contrato</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-4">
                                        <label>Fecha de Ingreso:</label>
                                        <input autocomplete="off" id="fing_date" name="fing_date" type="text" class="form-control datepicker">
                                    </div>

                                    <div class="col-4">
                                        <label>Fecha de Termino:</label>
                                        <input autocomplete="off" id="fter_date" name="fter_date" Type="text" class="form-control datepicker">
                                    </div>

                                    <div class="col-4">
                                        <label>Tipo de Contrato:</label>
                                        <select id="tcon_txt" name="tcon_txt" class="form-control">
                                            <option value="" disabled selected>Elija tipo de contrato</option>
                                            <option value="Fijo">Fijo</option>
                                            <option value="Indefinido">Indefinido</option>
                                            <option value="Obra o Faena">Obra o Faena</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-4">
                                        <label>Contrato:</label>
                                        <input accept="application/pdf" type="file" id="cont_file" name="cont_file">
                                    </div>

                                    <div class="col-4">
                                        <label>Anexo:</label>
                                        <input accept="application/pdf" type="file" id="anex_file" name="anex_file">
                                    </div>

                                    <div class="col-4">
                                        <label>Finiquito:</label>
                                        <input accept="application/pdf" type="file" id="fini_file" name="fini_file">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <!--Entrega Documentos-->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Entrega de Documentos e Implementos</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Reglamento Interno:</label>
                                        <input accept="application/pdf" type="file" id="regint_file" name="regint_file" value="oli">
                                    </div>
                                    <div class="col-5">
                                        <label>Entrega de Implementos:</label>
                                        <input accept="application/pdf" type="file" id="entim_file" name="entim_file">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-lg-right">
                            <button class="btn btn-success">Guardar</button>
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
            //Cambio de regiones y comunas
            $(document).on('change','#region_cat',function(){
                //console.log("Cambio");

                var region_cat=$(this).val();
                //console.log(region_cat)
                var div=$(this).parent();
                var op=" ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findComuna') !!}',
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

            $("#ficha").submit(function (event){
                var submit = true;
                var file = document.getElementById('imgInp');

                if(file.value === null || file.vale === ""){
                    $("#nofile").fadeTo(2000, 500).slideUp(500, function () {
                        $("#nofile").slideUp(500);
                        submit = false;
                    })
                }
                if (submit === false){
                    event.preventDefault();
                }
            })

        });
        //formateador Rut
        $('#rut').change(function(){
                var rut = $('#rut').val()

                var asd = rut.split('-')[1]


                var asd3 = dgv(rut.split('-')[0])
                if(asd==asd3) ; else $('#myModal').modal('show');
                function dgv(T)    //digito verificador
                {
                    var M=0,S=1;
                    for(;T;T=Math.floor(T/10))
                        S=(S+T%10*(9-M++%6))%11;
                    return S?S-1:'k';


                }

            });

        //Visualizador de Imagen
        imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }

        //Traductor mensajes
        $('#ficha input[type=text]').on('change invalid', function() {
            var textfield = $(this).get(0);
            textfield.setCustomValidity('');

            if (!textfield.validity.valid) {
                textfield.setCustomValidity('Complete este campo');
            }
        });

        $('#ficha input[type=file]').on('change invalid', function(){
            var textin = $(this).get(0);
            textin.setCustomValidity('');

            if(!textin.validity.valid){
                textin.setCustomValidity('Cargue este archivo')
            }
        });

        //Datepicker
        $(".datepicker").datepicker({dateFormat: "dd/mm/yy"});

        //Validador Formato Imagen
        document.getElementById("imgInp").addEventListener("change", validateFoto)

        $("#wrongimage").hide();
        $("#largegimage").hide();
        function validateFoto(){
            const allowedExtensions =  ['jpg','png','jpeg'],
                sizeLimit = 1000000;
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

        //Validadores PDF
        document.getElementById("anex_file").addEventListener("change", validateFile)
        document.getElementById("fini_file").addEventListener("change", validateFile)
        document.getElementById("regint_file").addEventListener("change", validateFile)
        document.getElementById("entim_file").addEventListener("change", validateFile)
        document.getElementById("cont_file").addEventListener("change", validateFile)

        $("#wrongfile").hide();
        $("#largefile").hide();
        function validateFile(){
            const allowedExtensions =  ['pdf'],
                sizeLimit = 10000000;

            const { name:fileName, size:fileSize } = this.files[0];

            const fileExtension = fileName.split(".").pop();

            if(!allowedExtensions.includes(fileExtension)){
                $("#wrongfile").fadeTo(2000, 500).slideUp(500, function(){
                    $("#wrongfile").slideUp(500);
                });
                this.value = null;
            }else if(fileSize > sizeLimit){
                $("#largegfilefile").fadeTo(2000, 500).slideUp(500, function(){
                    $("#largefile").slideUp(500);
                });
                this.value = null;
            }
        }

        var myTextbox = document.getElementById('rut');
        myTextbox.addEventListener('keypress', checkName, false);

        function checkName(evt) {
            var charCode = evt.charCode;
            if (charCode != 0) {
                if (charCode < 45 || charCode > 57) {
                    evt.preventDefault();
                    displayWarning(
                        "Por favor use solo números."
                        + "\n" + "charCode: " + charCode + "\n"
                    );
                }
            }
        }

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
    </script>
@endsection
