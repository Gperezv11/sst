@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Control de Acceso</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Control Acceso</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-yellow">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ingreso
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label>Sucursal:</label>
                                    <select id="id_sucursal" name="id_sucursal" class="form-control" >
                                        <option value="" disabled selected>Selecciona Sucursal</option>
                                        @foreach($sucursals as $sucursal)
                                            <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <label>Fecha ingreso:</label>
                                    <input class="form-control" type="datetime-local">
                                    <label>Patente:</label>
                                    <select id="id_patente" name="id_patente" class="form-control" >
                                        <option value="" disabled selected>Selecciona Patente</option>
                                        @foreach($patentes as $patente)
                                            <option value="{{$patente->id}}">{{$patente->patente}}</option>
                                        @endforeach
                                    </select>
                                    <label>Modelo:</label>
                                    <select id="id_submarca" name="id_submarca" class="form-control" >
                                        <option value="" disabled selected>---</option>
                                    </select>
                                    <label>Nombre:</label>
                                    <input type="text" id="id_nombre" name="id_nombre" class="form-control" placeholder="" value="" enable>
                                    <label>Celular:</label>
                                    <input type="text" id="celular_txt" name="celular_txt" class="form-control" placeholder="" value="" enable>
                                   
                                </div>
                                <div class="col-6">
                                    <label>Atendido por:</label>
                                    <select name="Sucursal" class="form-control"><option value="" disabled selected>Seleccione Atendedor</option><option>Atendedor 1</option><option>Atendedor 2</option><option>Atendedor 3</option></select>
                                    <label>Tarifa:</label>
                                    <select id="nombre" name="nombre" class="form-control" >
                                        <option value="" disabled selected>---</option>
                                    </select>
                                    <label>Marca:</label>
                                    <select id="id_marca" name="id_marca" class="form-control" >
                                        <option value="" disabled selected>Selecciona Marca</option>
                                        @foreach($vehiculos as $vehiculo)
                                            <option value="{{$vehiculo->id}}">{{$vehiculo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <label>Tipo Vehiculo:</label>
                                    <select name="tipoVehiculo" class="form-control"><option value="" disabled selected>Seleccione tipo vehiculo</option><option>Auto</option><option>Moto</option><option>Otro</option></select>
                                    <label>E-mail:</label>
                                    <input type="text" id="id_submarca" name="id_submarca" class="form-control" placeholder="" value="" enable>
                                   <label>N° de estacionamiento:</label>
                                    <input type="text" id="mail_estacionamiento_txt" name="mail_estacionamiento_txt" class="form-control" placeholder="" value="" enable>
                                </div>
                            </div>
                            <div class="row">
                                
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </section>
@endsection

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){

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
                url:"{{ route('findModelo') }}",
                data:{'id_marca':id_marca},
                befordSubmit:function(data){
                        console.log(data);
                    },
                success:function (data){
                    console.log('success');

                    console.log(data);

                    console.log(data.length);
                    op+='<option value="0" selected disabled>Seleccione un modelo</option>';
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
   
        //cambio nombre al seleccionar patente
        $(document).on('change','#id_patente',function(){
           
            var id_patente=$(this).val();
            
            var div=$(this).parent();
            var op=" ";
            $.ajax({
                type: 'get',
                url:"{{ route('findPatente') }}",
                data:{'id_patente':id_patente},
                befordSubmit:function(data){
                        console.log(data);
                    },
                success:function (data){
                    console.log('success');

                    console.log(data);
                    console.log(data.length);
                    op+='<option value="0" selected disabled>Seleccione un modelo</option>';
                    for(var i=0;i<data.length;i++) {
                        op += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                    }
                    $('#nombre').html(" ");
                    $('#nombre').append(op);
                 
                }, 
                error:function (xhr, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
            });
        });
    });
</script>

@endsection



