@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="row">
            <div class="col-sm-12">
                {{-- @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}<button type="button" class="close"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('messageerror'))
                    <div class="alert alert-danger">{{ session('messageerror') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif --}}

                <form name="ingresoHonor" id="ingresoHonor" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-blue">
                                    <div class="card-header">
                                        <h3 class="card-title">Prestador</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none">
                                                    <li>
                                                        <label>Rut:</label>
                                                        <input id="rut" name="rut" type="text" class="form-control"
                                                            placeholder="Rut con guión y sin puntos" required>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Teléfono</label>
                                                        <input type="number" id="telefono" name="telefono"
                                                            class="form-control" required>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Region:</label>
                                                        <select id="region_cat" name="region_cat" class="form-control">
                                                            <option value="" disabled selected>Elija una región</option>
                                                            @foreach ($reg as $cat)
                                                                <option value="{{ $cat->id }}">{{ $cat->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Comuna:</label>
                                                        <select id="comuna_cat" name="comuna_cat" class="form-control">
                                                            <option value="" disabled selected>Seleccione una comuna
                                                            </option>
                                                        </select>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Dirección:</label>
                                                        <input id="direccion" name="direccion" type="text"
                                                            class="form-control" placeholder="Ingrese su dirección"
                                                            required>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul style="list-style-type: none">
                                                    <li>
                                                        <label>Nombre:</label>
                                                        <input type="text" id="nombre" value="" name="nombre"
                                                            class="form-control" placeholder="Nombre" required>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Apellido Paterno:</label>
                                                        <input type="text" id="apellidoP" value="" name="apellidoP"
                                                            class="form-control" placeholder="Apellido Paterno" required>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Apellido Materno:</label>
                                                        <input type="text" id="apellidoM" value="" name="apellidoM"
                                                            class="form-control" placeholder="Apellido Materno" required>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Email:</label>
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            placeholder="ejemplo@gmail.com" required>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <label>Cargo:</label>
                                                        <select id="cargo" name="cargo" class="form-control">
                                                            <option value="" disabled selected>Elija un cargo</option>
                                                            @foreach ($cargos as $car)
                                                                <option value="{{ $car->id }}">
                                                                    {{ $car->nombre_cargos }}</option>
                                                            @endforeach
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="float-lg-right">
                                                    <button class="btn btn-primary" class="button" name="enviar"
                                                        id="enviar">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                {{-- <input type="text" id="idprestador" name="idprestador"> --}}
                <form id="ingresoDocumento" action="{{ route('honorario.store') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    {{-- <div class="row"> --}}
                    <!--Documentos-->
                    {{-- <div class="container-fluid">
                        <div class="row"> --}}
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Documentos</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="card col-md-4">
                                        <ul style="list-style-type: none">
                                            <input type="hidden" id="rutpc" name="rutpc" class="form-control">
                                            <li>
                                                <label>Fecha de Emición:</label><br>
                                                <input type="date" id="fechaE" name="fechaE" style="width: 240px"
                                                    max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" oninput="calcularfecha(),obtenermes()">
                                                <br>
                                                <br>
                                            </li>
                                            <li>
                                                <label>Periodo:</label><br>
                                                <input style="width: 240px" type="text" id="periodo" name="periodo">
                                                <br>
                                                <br>
                                            </li>
                                            <li>
                                                <label>Plazo (en días):</label><br>
                                                <input style="width: 240px" type="number" id="plazo" name="plazo"
                                                    value="<?php echo date('Y-m-d'); ?>">
                                                    <br>
                                                    <br>
                                            </li>
                                            <li>
                                                <label>Sucursal:</label>
                                                <br>
                                                <select style="width: 240px" name="sucur" id="sucur" class="form-select"
                                                    Required>
                                                    <option value="" disable selected>--seleccionar Sucursal--
                                                    </option>
                                                    @foreach ($sucursal as $s)
                                                        <option value="{{ $s->id }}">
                                                            {{ $s->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card col-md-4">
                                        <ul style="list-style-type: none">
                                            <li>
                                                <label>Vencimiento:</label><br>
                                                <input style="width: 240px" type="DATE" id="vencimiento" name="vencimiento"
                                                    value="<?php echo date('Y-m-d'); ?>" oninput="calcularfecha(), obtenermes()">
                                                <br>
                                                <br>
                                            </li>
                                            <li>
                                                <label>Número de documento:</label><br>
                                                <input style="width: 240px" type="number" id="numeroDocumento"
                                                    name="numeroDocumento" Required>
                                                <br>
                                                <br>
                                            </li>
                                            <li>
                                                <label>Tipo de documento:</label>
                                                <br>
                                                <select style="width: 240px" name="tipoDoc" id="tipoDoc" class="form-select"
                                                    Required>
                                                    <option value="" disable selected>--seleccionar tipo de documento--
                                                    </option>
                                                    @foreach ($tipo_documento as $tipo)
                                                        <option value="{{ $tipo->id }}">
                                                            {{ $tipo->nombre_tipo_documento_honorario }}</option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card col-md-4">
                                        <ul style="list-style-type: none">
                                            <li>
                                                <label>Comentario:</label>
                                                <textarea style="width: 240px" class="form-control" name="comentario"
                                                    id="comentario"></textarea>
                                                <br>
                                                <br>
                                            </li>
                                            <li>
                                                <label>Tipos de pago:</label>
                                                <br>
                                                <select style="width: 240px" name="tipoPago" id="tipoPago"
                                                    class="form-select" Required>
                                                    <option value="" disable selected>--seleccionar metodo de pago--
                                                    </option>
                                                    @foreach ($forma as $f)
                                                        <option value="{{ $f->id }}">
                                                            {{ $f->nombre_forma_pago }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <br>
                                            </li>
                                            <li>
                                                <label>Documento:</label>
                                                <input class="form-control" style="width: 240px" type="file" id="fini_file"
                                                    name="fini_file">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="float-lg-right">
                                    <button class="btn btn-primary" class="submit" name="enviarArchivo"
                                        id="enviarArchivo" onclick="PasarValor()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div>
                    </div> --}}
                </form>
                <form action="{{ route('detallehonorario.store') }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-blue">
                                    <div class="card-header">
                                        <h3 class="card-tile">Detalle Honorarios</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <table border="1" class="table table-striped " id="tablaprueba">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Numero documento</th>
                                                        <th>Producto o Servicio</th>
                                                        <th>Comentario</th>
                                                        <th>Bruto</th>
                                                        <th>Retencion</th>
                                                        <th>Liquido a Pagar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                    <td><input name="idh" id="idh" style="width: 100px" type="text" onKeyUp="Pasarnum();" required></td>
                                                    <td> 
                                                        <select style="width: 240px" name="servicio" id="servicio"
                                                            class="form-select" Required>
                                                            <option value="" disable selected>--seleccionar Servicio--</option>
                                                            @foreach ($servicio as $s)
                                                                <option value="{{ $s->id }}">
                                                                    {{ $s->nombre_servicio }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input name="comentarioH" id="comentarioH" style="width: 200px" type="text" required></td>
                                                    <td><input name="bruto" id="bruto" style="width: 100px" type="text" onKeyUp="calcularliquido();" required></td>
                                                    <td><input name="retencion" id="retencion" style="width: 100px" type="text" readonly=»readonly» required></td>
                                                    <td><input name="liquido" id="liquido" style="width: 100px" type="text" readonly=»readonly» required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><input name="idh2" id="idh2" style="width: 100px" type="text" required readonly=»readonly»></td>
                                                        <td> 
                                                            <select style="width: 240px" name="servicio2" id="servicio2"
                                                                class="form-select">
                                                                <option value="" disable selected>--seleccionar Servicio--
                                                                </option>
                                                                @foreach ($servicio as $s)
                                                                    <option value="{{ $s->id }}">
                                                                        {{ $s->nombre_servicio }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input name="comentarioH2" id="comentarioH2" style="width: 200px" type="text"></td>
                                                        <td><input name="bruto2" id="bruto2" style="width: 100px" type="text" onKeyUp="calcularliquido2();"></td>
                                                        <td><input name="retencion2" id="retencion2" style="width: 100px" type="text" readonly=»readonly»></td>
                                                        <td><input name="liquido2" id="liquido2" style="width: 100px" type="text" readonly=»readonly»></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td><input name="idh3" id="idh3" style="width: 100px" type="text" required readonly=»readonly»></td>
                                                            <td> 
                                                                <select style="width: 240px" name="servicio3" id="servicio3"
                                                                    class="form-select">
                                                                    <option value="" disable selected>--seleccionar Servicio--
                                                                    </option>
                                                                    @foreach ($servicio as $s)
                                                                        <option value="{{ $s->id }}">
                                                                            {{ $s->nombre_servicio }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input name="comentarioH3" id="comentarioH3" style="width: 200px" type="text"></td>
                                                            <td><input name="bruto3" id="bruto3" style="width: 100px" type="text" onKeyUp="calcularliquido3();"></td>
                                                            <td><input name="retencion3" id="retencion3" style="width: 100px" type="text" readonly=»readonly»></td>
                                                            <td><input name="liquido3" id="liquido3" style="width: 100px" type="text" readonly=»readonly»></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td><input name="idh4" id="idh4" style="width: 100px" type="text" required readonly=»readonly»></td>
                                                                <td> 
                                                                    <select style="width: 240px" name="servicio4" id="servicio4"
                                                                        class="form-select">
                                                                        <option value="" disable selected>--seleccionar Servicio--
                                                                        </option>
                                                                        @foreach ($servicio as $s)
                                                                            <option value="{{ $s->id }}">
                                                                                {{ $s->nombre_servicio }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input name="comentarioH4" id="comentarioH4" style="width: 200px" type="text"></td>
                                                                <td><input name="bruto4" id="bruto4" style="width: 100px" type="text" onKeyUp="calcularliquido4();"></td>
                                                                <td><input name="retencion4" id="retencion4" style="width: 100px" type="text" readonly=»readonly»></td>
                                                                <td><input name="liquido4" id="liquido4" style="width: 100px" type="text" readonly=»readonly»></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td><input name="idh5" id="idh5" style="width: 100px" type="text" required readonly=»readonly»></td>
                                                                    <td> 
                                                                        <select style="width: 240px" name="servicio5" id="servicio5"
                                                                            class="form-select">
                                                                            <option value="" disable selected>--seleccionar Servicio--
                                                                            </option>
                                                                            @foreach ($servicio as $s)
                                                                                <option value="{{ $s->id }}">
                                                                                    {{ $s->nombre_servicio }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><input name="comentarioH5" id="comentarioH5" style="width: 200px" type="text"></td>
                                                                    <td><input name="bruto5" id="bruto5" style="width: 100px" type="text" onKeyUp="calcularliquido5();"></td>
                                                                    <td><input name="retencion5" id="retencion5" style="width: 100px" type="text" readonly=»readonly»></td>
                                                                    <td><input name="liquido5" id="liquido5" style="width: 100px" type="text" readonly=»readonly»></td>
                                                                    </tr>
                                                </tbody>
                                            </table>
                                            {{-- <div class="form-group">
                                                <button type="button" class="btn btn-primary mr-2"
                                                    onclick="agregarFila()">Agregar Prestación</button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="eliminarFila()">Eliminar Prestación</button>
                                            </div> --}}
                                        </div>
                                        <div class="float-lg-right">
                                            <button class="btn btn-primary" class="submit" name="enviarArchivo"
                                                id="enviarArchivo">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>


    <script type="text/javascript">

       // function agregarFila() {
       //     document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input name="idh" id="idh" style="width: 100px" type="text"></td><td><input name="servicio" id="servicio" style="width: 200px" type="text"></td><td><input name="comentarioH" id="comentarioH" style="width: 200px" type="text"></td><td><input name="bruto" id="bruto" style="width: 100px" type="text" onKeyUp="calcularliquido();"></td><td><input name="retencion" id="retencion" style="width: 100px" type="text" readonly=»readonly»></td><td><input name="liquido" id="liquido" style="width: 100px" type="text" readonly=»readonly»></td>';
       // }

        function eliminarFila() {
            var table = document.getElementById("tablaprueba");
            var rowCount = table.rows.length;
            //console.log(rowCount);

            if (rowCount <= 1)
                alert('No se puede eliminar el encabezado');
            else
                table.deleteRow(rowCount - 1);
        }
        //pasar datos
        function PasarValor()
        {
            document.getElementById("rutpc").value = document.getElementById("rut").value;
        };
        //pasar numero
        function Pasarnum()
        {
            document.getElementById("idh2").value = document.getElementById("idh").value;
            document.getElementById("idh3").value = document.getElementById("idh").value;
            document.getElementById("idh4").value = document.getElementById("idh").value;
            document.getElementById("idh5").value = document.getElementById("idh").value;
        };
        //calcular retencion y liquido
        function calcularliquido()
        {
            var bruto = $('#bruto').val();
            var retencion = 0;
            var liquido = 0;
            retencion = (bruto*11.5)/100;
            liquido = bruto-retencion;
            document.getElementById("retencion").value = retencion;
            document.getElementById("liquido").value = liquido;
        };
        function calcularliquido2()
        {
            var bruto = $('#bruto2').val();
            var retencion = 0;
            var liquido = 0;
            retencion = (bruto*11.5)/100;
            liquido = bruto-retencion;
            document.getElementById("retencion2").value = retencion;
            document.getElementById("liquido2").value = liquido;
        };
        function calcularliquido3()
        {
            var bruto = $('#bruto3').val();
            var retencion = 0;
            var liquido = 0;
            retencion = (bruto*11.5)/100;
            liquido = bruto-retencion;
            document.getElementById("retencion3").value = retencion;
            document.getElementById("liquido3").value = liquido;
        };
        function calcularliquido4()
        {
            var bruto = $('#bruto4').val();
            var retencion = 0;
            var liquido = 0;
            retencion = (bruto*11.5)/100;
            liquido = bruto-retencion;
            document.getElementById("retencion4").value = retencion;
            document.getElementById("liquido4").value = liquido;
        };
        function calcularliquido5()
        {
            var bruto = $('#bruto5').val();
            var retencion = 0;
            var liquido = 0;
            retencion = (bruto*11.5)/100;
            liquido = bruto-retencion;
            document.getElementById("retencion5").value = retencion;
            document.getElementById("liquido5").value = liquido;
        };
        //calcular fecha
        function calcularfecha(){
            var fecha1 = new Date(document.getElementById("fechaE").value);
            var fecha2 = new Date(document.getElementById("vencimiento").value);
            var diff = fecha2.getTime() - fecha1.getTime();
            document.getElementById("plazo").value = Math.round(diff / (1000 * 60 * 60 * 24));
        }
        //obtener mes
        function obtenermes(){
            var fecha1 = new Date(document.getElementById("fechaE").value);
            var mes = fecha1.getMonth();
            let meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            let nombre = meses[mes];
            document.getElementById("periodo").value = nombre;
        }
        //formateador Rut

        $('#rut').change(function() {
            var rut = $('#rut').val()
            console.log(rut)

            var asd = rut.substr(rut.length - 1, rut.length)
            var asd3 = dgv(rut.substr(0, rut.length - 1))

            $.ajax({
                type: 'get',
                url: '{!! URL::to('formatoRut') !!}',
                data: {
                    'rut': rut
                },

                success: function(data) {
                    // despejar punto
                    var valor = rut.replace('.', '');
                    // Despejar Guión
                    valor = valor.replace('-', '');
                    valor = valor.replace('.', '');
                    // Aislar Cuerpo y Dígito Verificador
                    var cuerpo = valor.slice(0, -1);

                    var dv = valor.slice(-1).toUpperCase();
                    var rutformato = cuerpo.substr(0, 2) + "." + cuerpo.substr(
                            2,
                            3) + "." + cuerpo.substr(5, cuerpo.length) + "-" +
                        dv;
                    document.getElementById("rut").value = rutformato;

                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('rutFinder') !!}',
                        data: {
                            'rut': rutformato
                        },
                        success: function(data) {
                            console.log(data);
                            document.getElementById("nombre").value = data[0]
                                .nombre_prestador;
                            document.getElementById("apellidoP").value = data[0]
                                .apellido_p_prestador;
                            document.getElementById("apellidoM").value = data[0]
                                .apellido_m_prestador;
                            document.getElementById("email").value = data[0]
                                .email_prestador;
                            document.getElementById("telefono").value = data[0]
                                .telefono_prestador;
                            document.getElementById("direccion").value = data[0]
                                .direccion_prestador;
                            document.getElementById("razonSocial").value = data[0]
                                .razon_social_prestador;
                            document.getElementById("direccionE").value = data[0]
                                .direccion_empresa_prestador;
                            document.getElementById("telefonoE").value = data[0]
                                .telefono_empresa_prestador;
                            document.getElementById("cargo").value = data[0].cargos_id;
                            $('#region_cat').val(data[0].region);
                            $('#comuna_cat').val(data[0].comuna_id);

                            var idprestador = data[0].id;
                        },
                        error: function(data) {
                            console.log('Nuevo Ingreso')
                        }
                    });
                },
                error: function() {

                }
            });

            function dgv(T) //digito verificador
            {
                var M = 0,
                    S = 1;
                for (; T; T = Math.floor(T / 10))
                    S = (S + T % 10 * (9 - M++ % 6)) % 11;
                return S ? S - 1 : 'k';
            }
        });

        $(document).ready(function() {
            //Cambio de regiones y comunas
            $(document).on('change', '#region_cat', function() {
                //console.log("Cambio");

                var region_cat = $(this).val();
                //console.log(region_cat)
                var div = $(this).parent();
                var op = " ";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findComuna') !!}',
                    data: {
                        'id': region_cat
                    },
                    success: function(data) {
                        console.log('success');

                        console.log(data);

                        console.log(data.length);
                        op += '<option value="0" selected disabled>Elija comuna</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nombre +
                                '</option>';
                        }
                        $('#comuna_cat').html(" ");
                        $('#comuna_cat').append(op);
                    },
                    error: function() {

                    }
                });
            });

            //Ingreso de Cliente
            $(document).ready(function() {
                $('#enviar').on('click', function() {
                    var rut_s = $('#rut').val();
                    var nombre_s = $('#nombre').val();
                    var apellidoP_s = $('#apellidoP').val();
                    var apellidoM_s = $('#apellidoM').val();
                    var comuna_s = $('#comuna_cat').val();
                    var direccion_s = $('#direccion').val();
                    // var sector_d = $('#sector_dd').val();
                    var email_s = $('#email').val();
                    var telefono_s = $('#telefono').val();
                    var cargo_s = $('#cargo').val();
                    var telefonoE_s = $('#telefonoE').val();
                    var direccionE_s = $('#direccionE').val();
                    var razon_s = $('#razonSocial').val();



                    if (rut_s != "" && nombre_s != "" && apellidoP_s != "" && apellidoM_s !=
                        "" && comuna_s !=
                        "" && direccion_s != "" && cargo_s != "" && email_s != "" &&
                        telefono_s != "" && telefonoE_s !=
                        "" && direccionE_s != "" && razon_s != "") {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                        $.ajax({
                            url: '{{ route('prestador.store') }}',
                            type: "POST",
                            data: {
                                rut: rut_s,
                                nombre: nombre_s,
                                apellido_p: apellidoP_s,
                                apellido_m: apellidoM_s,
                                comuna: comuna_s,
                                direccion: direccion_s,
                                cargo: cargo_s,
                                email: email_s,
                                telefono: telefono_s,
                                telefonoE: telefonoE_s,
                                direccionE: direccionE_s,
                                razon: razon_s,
                            },
                            success: function(data) {
                                let arr = JSON.parse(data);
                                // console.log(arr);
                                $("#idprestador").val(arr["object"]["id"])
                                // alertify.set('notifier', 'position', 'top-center');
                                // alertify.set('notifier', 'delay', 3);
                                // alertify.success(data);

                                // $('#rut').val('');
                                // $('#nombre').val('');
                                // $('#apellidoP').val('');
                                // $('#apellidoM').val('');
                                // $('#region_cat').val('');
                                // $('#comuna_cat').val('');
                                // $('#direccion').val('');
                                // $('#cargo').val('');
                                // $('#email').val('');
                                // $('#telefono').val('');
                                // $('#telefonoE').val('');
                                // $('#direccionE').val('');
                                // $('#razonE').val('');

                            }
                        });
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                        // $.ajax({
                        //     type: 'get',
                        //     url: '{!! URL::to('rutFinder') !!}',
                        //     data: {
                        //         'rut': rut
                        //     },
                        //     success: function(data) {
                        //         var idprestador = data[0].id;
                        //         console.log('ID Capturada');
                        //         console.log(data[0].id);
                        //         $.ajax({
                        //             url: '{{ route('honorario.store') }}',
                        //             type: "POST",
                        //             data: {
                        //                 id_prestador: idprestador,

                        //             },
                        //             success: function(data) {
                        //                 console.log(
                        //                     'Mascota creada')
                        //                 alertify.set('notifier', 'position',
                        //                     'top-center');
                        //                 alertify.set('notifier', 'delay',
                        //                 3);
                        //                 alertify.success(data);

                        //             },
                        //         });
                        //     }
                        // });
                    } else {
                        alertify.set('notifier', 'position', 'top-center');
                        alertify.set('notifier', 'delay', 3);
                        alertify.error(
                            'Ningun campo puede estar vacio. Por favor ingrese todos los datos'
                        );
                    }


                })


            });

            // $(document).on('change', '#rut', function() {

            //     var rut = $(this).val();
            //     console.log(rut);

            //     $.ajax({
            //         type: 'get',
            //         url: '{!! URL::to('rutFinder') !!}',
            //         data: {
            //             '': rut
            //         },
            //         success: function(data) {
            //             console.log(data);
            //             document.getElementById("nombre").value = data[0].nombre_prestador;
            //             document.getElementById("apellidoP").value = data[0].apellido_p_prestador;
            //             document.getElementById("apellidoM").value = data[0].apellido_m_prestador;
            //             document.getElementById("email").value = data[0].email_prestador;
            //             document.getElementById("telefono").value = data[0].telefono_prestador;
            //             document.getElementById("direccion").value = data[0].direccion_prestador;
            //             document.getElementById("razonSocial").value = data[0].razon_social_prestador;
            //             document.getElementById("direccionE").value = data[0].direccion_empresa_prestador;
            //             document.getElementById("telefonoE").value = data[0].telefono_empresa_prestador;
            //             document.getElementById("cargo").value = data[0].cargos_id;
            //             $('#region_cat').val(data[0].region);
            //             $('#comuna_cat').val(data[0].comuna);

            //             var idprestador = data[0].id;
            //         },
            //         error: function(data) {
            //             console.log('Nuevo Ingreso')
            //         }
            //     });
            // });

        });
    </script>
@endsection
