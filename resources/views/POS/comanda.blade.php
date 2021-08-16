@extends('layouts.app')
@section('css')
    
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comanda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">POS</li>
                        <li class="breadcrumb-item">Comanda</li>
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
                <form class="d-flex">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="col-md-10">
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Ingreso
                                </h3>

                                <nav class="navbar">
                                    <div class="container-fluid">
                                        <div class="col-sm-1">
                                            <label class="label label-default">N°</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" name="num_comanda" class="form-control" value="{{$orden->id}}" disabled>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            
                                <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <div class="image-contrainer align-content-center" id="nofile">
                                                <img id ="demo" src="/images/logo.png" alt="Codigo QR" height="150px" width="150px"/>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 ">
                                            <div>
                                                <label class="form-label">RUT Empresa</label>
                                                <input type="text" id="rut_empresa" name="rut_empresa" class="form-control" value ="76.863.627-3" disabled>
                                            </div>
                                            <div>
                                                <label class="form-label">Nombre Empresa</label>
                                                <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" value ="Potes SpA" disabled>
                                            </div>
                                            <div>
                                                <label class="form-label">Sucursal Empresa</label>
                                                <select id="sucursal" name="sucursal" class="form-control">
                                                    <option value="0" disabled selected>Selecciona Sucursal</option>
                                                    <option value="1">Cienfuegos</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Lista Precio</label>
                                                <select id="lista_precio_id" name="lista_precio_id" class="form-control" required>
                                                    <option value="0" disabled selected>Selecciona Lista Precio</option>
                                                        @foreach($listaPrecios as $cato)
                                                            <option value="{{$cato->id}}"{{$cato->id == $listaElejida ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Bodega</label>
                                                <select id="bodega_id" name="bodega_id" class="form-control" required>
                                                    <option value="" disabled selected>Selecciona Bodega</option>
                                                    @foreach($bodegas as $cato)
                                                    <option value="{{$cato->id}}" {{$cato->id == $bodegaElejida ? 'selected' : ''}}>{{$cato->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div>
                                                <label class="form-label">Fecha</label>
                                                <input type="text" id="fecha" name="fecha" class="form-control" value="{{$fecha}}" disabled>
                                            </div>
                                            <div>
                                                <label class="form-label">Hora</label>
                                                <input type="text" id="hora" name="hora" class="form-control" value="{{$hora}}" disabled>
                                            </div>
                                            <div>
                                                <label class="form-label">Vendedor</label>
                                                <select id="vendedor" name="vendedor" class="form-control">
                                                    <option value="" disabled selected>Selecciona Vendedor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">productos</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <label >Búsqueda</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="buscarNombre" name="buscarNombre" class="form-control" placeholder="Buscar por nombre...">
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="row">
                                </br>
                                </div>
                </form>
                                <div class="row">
                                    <table class="table" id="tablaProductos">
                                        <tbody>
                                            <div>
                                                @foreach($buscarProducto as $comanda)
                                                    <tr>
                                                        <td>{{$comanda->nombre}}</td>
                                                        <td>{{$comanda->precio_venta_final}}</td>
                                                        <td><button id="agregar" type="button" class="btn btn-success" title="Agregar" data-value ="{{$comanda->id}}"><i class="fas fa-plus"></i> Agregar</button>
                                                    </tr>
                                                @endforeach
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card card-blue">
                            <div class="card-header">
                                <h3 class="card-title">Generar Orden</h3>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-success btn-lg" type="button">Guardar</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-info btn-lg" type="button">Modificar</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-danger btn-lg" type="button">Eliminar</button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-warning btn-lg" type="button">Imprimir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- div para comanda -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">
                                
                            </h3>
                        </div>
                        <div class="card-body">
                            @include('POS.tabla_comanda')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        






                                
                                
   
@endsection

@section('scripts')
    <script>
       
       $('#agregar.btn-success').click(function() {
            alert("estoy aqui");
            //declaro todas las variables
           //console.log(region_cat)
           
            $.ajax({
                type: 'get',
                url: "{{ route('storePedido') }}",
                data:{'id_prod':'11'},
                success:function (data){
                    console.log('success');
                    console.log(data);
                    console.log(data.length);
                },
                error:function(e)
                {
                    console.log(e);
                }
            });
       });
    </script>
@endsection
