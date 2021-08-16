@extends('layouts.app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link red="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Resumen de Personal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Resumen de Personal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="ficha_tablas" class="table table-striped table-bordered shadow-lg mt-4" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">RUT</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido Paterno</th>
                                        <th scope="col">Apellido Materno</th>
                                        <th scope="col">Tipo de contrato</th>
                                        <th scope="col">Fecha de Inicio</th>
                                        <th scope="col">Fecha de Termino</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fichas as $ficha)
                                        <tr>
                                            <th scope="row">{{$ficha->id}}</th>
                                            <td>{{ $ficha->rut }}</td>
                                            <td>{{ $ficha->nombre }}</td>
                                            <td>{{ $ficha->apellido_pat }}</td>
                                            <td>{{ $ficha->apellido_mat }}</td>
                                            <td>{{ $ficha->tipo_contrato }}</td>
                                            <td>{{ $ficha->fecha_ingreso }}</td>
                                            <td>{{ $ficha->fecha_termino }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editModal{{$ficha->id}}"><i class="fas fa-user-edit"></i></button>
                                                <button type="button" class="btn btn-danger" title="Dar de baja"><i class="fas fa-eye-slash"></i></button>
                                            </td>
                                        </tr>
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
                                                    <form action ="{{route('tablaficha.update', $ficha) }}" method="POST">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" id="idEdit">
                                                            <div class="container-fluid">
                                                                <div class="row">

                                                                    <!--Datos Personales-->
                                                                    <div class="card card-blue">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">Datos de Personales</h3>
                                                                            </div>

                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <img id="blah" src="{{ asset('imagenes/' . $ficha->imagen) }}" height="150px" width="150px"/>
                                                                                        <input id="imgInp" name="imgInp" type="file" accept="image/*" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label>Rut:</label>
                                                                                        <input type="text" id="RUT_edit_txt" name="RUT_edit_txt" class="form-control" value="{{$ficha -> rut}}" disabled>

                                                                                        <label>Nombres:</label>
                                                                                        <input type="text" id="nombre_edit_txt" name="nombre_edit_txt" class="form-control" value="{{$ficha -> nombre}}" disabled>

                                                                                        <label>Apellido Paterno:</label>
                                                                                        <input type="text" id="apellido_pat_edit_txt" name="apellido_pat_edit_txt" class="form-control" value="{{$ficha -> apellido_pat}}" disabled>

                                                                                        <label>Apellido Materno:</label>
                                                                                        <input type="text" id="apellido_mat_edit_txt" name="apellido_mat_edit_txt" class="form-control" value="{{$ficha -> apellido_mat}}" disabled>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">

                                                                                        <label>Nacionalidad:</label>
                                                                                        <select id="naci_cat" name="naci_cat" class="form-control">
                                                                                            <option value="" disabled selected>Elija Nacionalidad</option>
                                                                                            <option value="Colombiana"{{$ficha->nacionalidad == "Colombiana" ? 'selected' : ''}}>Colombiana</option>
                                                                                            <option value="Chilena"{{$ficha->nacionalidad == "Chilena" ? 'selected' : ''}}>Chilena</option>
                                                                                            <option value="3"{{$ficha->nacionalidad == "Venezolana" ? 'selected' : ''}}>Venezolana</option>
                                                                                        </select>

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

                                                                                        <label>Fono</label>
                                                                                        <input type="text" id="fono_edit_txt" name="fono_edit_txt" class="form-control" value="{{$ficha -> fono}}">

                                                                                        <label>E-Mail</label>
                                                                                        <input type="text" id="mail_edit_txt" name="mail_edit_txt" class="form-control" value="{{$ficha -> mail}}">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

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
                                                                                        <option value="GM Empresa"{{$ficha->empresa == "GM Empresa" ? 'selected' : ''}}>GM Empresa</option>
                                                                                        <option value="Buses Mayorga"{{$ficha->empresa == "Buses Mayorga" ? 'selected' : ''}}>Buses Mayorga</option>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="col-3">

                                                                                    <label>Cargo:</label>
                                                                                    <select id="cargo_txt" name="cargo_txt" class="form-control"">
                                                                                        <option value="" disabled selected>Cargo</option>
                                                                                        <option value="Cargo 1"{{$ficha->cargo == "Cargo 1" ? 'selected' : ''}}>Cargo 1</option>
                                                                                        <option value="Cargo 2"{{$ficha->cargo == "Cargo 2" ? 'selected' : ''}}>Cargo 2</option>
                                                                                        <option value="Cargo 3"{{$ficha->cargo == "Cargo 3" ? 'selected' : ''}}>Cargo 3</option>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="col-3">

                                                                                    <label>Supervisor:</label>
                                                                                    <select id="supe_txt" name="supe_txt" class="form-control">
                                                                                        <option value="" disabled selected>Supervisor</option>
                                                                                        <option value="Rolando Silva"{{$ficha->supervisor == "Rolando Silva" ? 'selected' : ''}}>Rolando Silva</option>
                                                                                        <option value="Gonzalo Pérez"{{$ficha->supervisor == "Gonzalo Pérez" ? 'selected' : ''}}>Gonzalo Pérez</option>
                                                                                    </select>

                                                                                </div>

                                                                                <div class="col-3">

                                                                                    <label>Proyecto:</label>
                                                                                    <select id="proye_txt" name="proye_txt" class="form-control" placeholder="Elija Nacionalidad">
                                                                                        <option value="" disabled selected>Proyecto</option>
                                                                                        <option value="Salmonera"{{$ficha->proyecto == "Salmonera" ? 'selected' : ''}}>Salmonera</option>
                                                                                        <option value="Petrolera"{{$ficha->proyecto == "Petrolera" ? 'selected' : ''}}>Petrolera</option>
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
                                                                                    <input type="text" id="sueldo_edit_txt" name="sueldo_edit_txt" class="form-control" value="{{$ficha -> sueldo_base}}">
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label>Bono:</label>
                                                                                    <input type="text" id="bono_edit_txt" name="bono_edit_txt" class="form-control" value="{{$ficha -> bono}}">
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label>Asignacion:</label>
                                                                                    <input type="text" id="asignacion_edit_txt" name="asignacion_edit_txt" class="form-control" value="{{$ficha -> asignacion}}">
                                                                                </div>
                                                                                <div class="col-3">

                                                                                    <label>AFP:</label>
                                                                                    <select id="afp_txt" name="afp_txt" class="form-control">
                                                                                        <option value="" disabled selected>AFP</option>
                                                                                        <option value="Provida"{{$ficha->afp == "Provida" ? 'selected' : ''}}>Provida</option>
                                                                                        <option value="Cuprum"{{$ficha->afp == "Cuprum" ? 'selected' : ''}}>Cuprum</option>
                                                                                        <option value="Habitat"{{$ficha->afp == "Habitat" ? 'selected' : ''}}>Habitat</option>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="col-3">

                                                                                    <label>Salud:</label>
                                                                                    <select id="salud_txt" name="salud_txt" class="form-control">
                                                                                        <option value="" disabled selected>Salud</option>
                                                                                        <option value="Fonasa"{{$ficha->salud == "Fonasa" ? 'selected' : ''}}>Fonasa</option>
                                                                                        <option value="Banmedica"{{$ficha->salud == "Banmedica" ? 'selected' : ''}}>Banmedica</option>
                                                                                        <option value="Colmena"{{$ficha->salud == "Colmena" ? 'selected' : ''}}>Colmena</option>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label>Plan de Salud:</label>
                                                                                    <input type="text" id="psalud_edit_txt" name="psalud_edit_txt" class="form-control" value="{{$ficha -> plan_salud}}" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <!--Datos de Contrato-->
                                                                    <div class="card card-info">
                                                                            <div class="card-header">
                                                                                <h3 class="card-title">Datos de Contrato</h3>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-4">
                                                                                        <label>Fecha de Ingreso:</label>
                                                                                        <input id="fing_date" name="fing_date" type="text" class="form-control datepicker" value="{{$ficha->fecha_ingreso}}">
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <label>Fecha de Termino:</label>
                                                                                        <input id="fter_date" name="fter_date" Type="text" class="form-control datepicker" value="{{$ficha->fecha_termino}}">
                                                                                    </div>
                                                                                    <div class="col-4">

                                                                                        <label>Tipo de Contrato:</label>
                                                                                        <select id="tcon_txt" name="tcon_txt" class="form-control">
                                                                                            <option value="" disabled selected>Elija tipo de contrato</option>
                                                                                            <option value="Fijo"{{$ficha->tipo_contrato == "Fijo" ? 'selected' : ''}}>Fijo</option>
                                                                                            <option value="Indefinido"{{$ficha->tipo_contrato == "Indefinido" ? 'selected' : ''}}>Indefinido</option>
                                                                                            <option value="Obra o Faena"{{$ficha->tipo_contrato == "Obra o Faena" ? 'selected' : ''}}>Obra o Faena</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">

                                                                                    <div class="col-4">
                                                                                        <label>Contrato:</label>                                                                                         }</a>
                                                                                        <input type="text" class="form-control" value="{{$ficha -> contrato}}" disabled>
                                                                                        <a href="{{ asset('archivos/'.$ficha->contrato) }}" target="_blank">Visualizar</a>
                                                                                    </div>

                                                                                    <div class="col-4">
                                                                                        <label>Anexo:</label>
                                                                                        <input type="text" class="form-control" value="{{$ficha -> anexo}}" disabled>
                                                                                        <a href="{{ asset('archivos/'.$ficha->anexo) }}" target="_blank">Visualizar</a>
                                                                                    </div>

                                                                                    <div class="col-4">
                                                                                        <label>Finiquito:</label>
                                                                                        <input type="text" class="form-control" value="{{$ficha -> finiquito}}" disabled>
                                                                                        <a href="{{ asset('archivos/'.$ficha->finiquito) }}" target="_blank">Visualizar</a>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                    <!--Datos de Contrato-->
                                                                    <div class="card card-info">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Carga nuevos documentos de Contrato</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">

                                                                                <div class="col-4">
                                                                                    <label>Contrato:</label>
                                                                                    <input accept="application/pdf" type="file" id="cont_file_re" name="cont_file_re">
                                                                                </div>

                                                                                <div class="col-4">
                                                                                    <label>Anexo:</label>
                                                                                    <input accept="application/pdf" type="file" id="anex_file_re" name="anex_file_re">
                                                                                </div>

                                                                                <div class="col-4">
                                                                                    <label>Finiquito:</label>
                                                                                    <input accept="application/pdf" type="file" id="fini_file_re" name="fini_file_re">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <!--Datos Documentos e Implementos -->
                                                                    <div class="card card-info">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Documentos e Implementos Entregados</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <label>Reglamento Interno:</label>
                                                                                    <input Type="text" class="form-control" value="{{$ficha->regla}}" disabled>
                                                                                    <a href="{{ asset('archivos/'.$ficha->regla) }}" target="_blank">Visualizar</a>
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <label>Implementos:</label>
                                                                                    <input Type="text" class="form-control" value="{{$ficha->imple}}" disabled>
                                                                                    <a href="{{ asset('archivos/'.$ficha->imple) }}" target="_blank">Visualizar</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="card card-info">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Cargar nuevos Documentos e Implementos</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <label>Reglamento Interno:</label>
                                                                                    <input accept="application/pdf" type="file" id="regint_file_re" name="regint_file_re">
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <label>Implementos:</label>
                                                                                    <input accept="application/pdf" type="file" id="entim_file_re" name="entim_file_re">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="modalCloseBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
        });
        //Datepicker
        $(".datepicker").datepicker({dateFormat: "dd/mm/yy"});

        //Recargador de Pagina
        $('#modalCloseBtn').click(function() {
            location.reload();
        });

        $('#modalCLoseX').click(function() {
            location.reload();
        });

        //Visualizador de Imagen
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

    </script>
@endsection
