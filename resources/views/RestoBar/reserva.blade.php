@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
      integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" /> 



@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link red="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ingreso Reserva</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <script src="/public/js/lib.min.js"></script>
        <script type="text/javascript">
            function sumar()
                    {
                      const $total = document.getElementById('totalPersonas');
                      let subtotal = 0;
                      [ ...document.getElementsByClassName( "monto" ) ].forEach( function ( element ) {
                        if(element.value !== '') {
                          subtotal += parseFloat(element.value);
                        }
                      });
                      $total.value = subtotal;
                    }
            $(document).ready(function(){
	            $("#sucursal1").change(function(){
                    $('#sucursal2').val($(this).val());
    	        });
            });
            
            $(document).ready(function(){
	            $("#hora1").change(function(){
                    $('#hora2').val($(this).val());
    	        });
            });
            $("#hora2").change(function(){
                    $('#hora1').val($(this).val());
    	        });
    	        
            $(document).ready(function(){
	            $("#dia").change(function(){
                    $('#fecha').val($(this).val());
    	        });
            });
             
            
            $(function() {
                $('#mesa1').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa2').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa3').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa4').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa5').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa6').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa7').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $(function() {
                $('#mesa8').change(function() {
                    $('#mesaReserva').val(this.value);
                })
            })
            $('#alerta').click(function(){
            swal({
                title: "Confirmar seleccion",
                text: "Esta acción ya no se podrá deshacer",
                type: "alert",
                });
            });

            $(function() {
                $('#id_2').change(function() {
                  $('#id2').val(this.value);
                })
              })
</script>
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
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#seleccionarMesa">Nueva Reserva</button>
        </div>
        
        
        
       
        <!-- Modal selecciona Mesa -->
        <div class="modal fade bd-example-modal-lg" id="seleccionarMesa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Seleccione Mesa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                    <form name="ingresoTipo" action="/reserva" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha" >
                                        </div>
                                       <div class="form-group">
                                            <label for="sucursal1">Sucursal</label>
                                            <select name="sucursal1_edit" class="form-control" id="sucursal1_edit">
                                                <option value="" disabled selected>Seleccione Sucursal</option>
                                                <option value"frutillar">Frutillar</option>
                                                <option value"Puerto Varas">Puerto Varas</option>
                                            </select>
                                        </div>
                                         <div>
                                            <ul class="nav nav-tabs">
                                              <li class="nav-item">
                                                <a class="nav-link active" href="#">Salon 1</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" href="#">Salon 2</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" href="#">Terraza</a>
                                              </li>
                                             
                                            </ul>
                                        </div>
                                        
                                        <div> 
                                            <label>Mesa 1</label>
                                            <div>
                                                <input id="mesa1" name"mesa1" type="checkbox"  value="1" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox"  value="1" id="mesa1"  checked data-toggle="toggle" data-on="Disponible<br>2 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60" >
                                            </div>
                                        </div> 
                                        <div> 
                                            <label>Mesa 3</label>
                                            <div>
                                                <input id="mesa3" type="checkbox"  value="3" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>2 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60">
                                            </div>
                                        </div> 
                                        <div> 
                                            <label>Mesa 5</label>
                                            <div>
                                                <input id="mesa5" type="checkbox"  value="5" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>4 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60">
                                            </div>
                                        </div> 
                                        <div> 
                                            <label>Mesa 7</label>
                                            <div>
                                                <input id="mesa7" type="checkbox"  value="7" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>4 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60">
                                            </div>
                                        </div> 
                                    </div>    
                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label for="nombreTipo">Tramo Horario</label>
                                        <select name="hora2" class="form-control " id="hora2"><option value="" disabled selected>Seleccione rango</option>
                                        <option value="12:30 - 14:30">12:30 - 14:30</option>
                                        <option value="14:30 - 16:30">14:30 - 16:30</option>
                                        <option value="18:30 - 20:30">18:30 - 20:30</option>
                                        <option value="20:30 - 22:30">20:30 - 22:30</option></select>
                                        </div>
                                       <br><br><br><br><br>
                                       
                                        <div> 
                                            <label>Mesa 2</label>
                                            <div>
                                                <input id="mesa2" type="checkbox"  value="2" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>2 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60">
                                            </div>
                                        </div> 
                                        <div> 
                                            <label>Mesa 4</label>
                                            <div>
                                                <input id="mesa4" type="checkbox"  value="4" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>2 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60">
                                            </div>
                                        </div> 
                                        <div> 
                                            <label>Mesa 6</label>
                                            <div>
                                                <input id="mesa6" type="checkbox"  value="6" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>8 personas" data-off="Ocupada" data-size="medium" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60">
                                            </div>
                                        </div> 
                                        <div> 
                                            <label>Mesa 8</label>
                                            <div>
                                                <input id="mesa8" type="checkbox"  value="8" onclick="myfunction()" data-target="#modalMesa" data-toggle="modal">
                                                <input type="checkbox" name="inventario" class="toggle-class" checked data-toggle="toggle" data-on="Disponible<br>6 personas" data-off="Ocupada" data-onstyle="success" data-offstyle="danger" data-width="119" data-height="60" data-toggle="popover">
                                            </div>
                                        </div> 
                                    </div>
                                 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <!-- Modal control mesa-->
        <div class="modal fade bd-example-modal-sm" id="modalMesa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reserva</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Desea seleccionar la mesa?</h6>
                    </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearIngreso" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
          </div>
        </div>
         <!-- Modal Crear Ingreso -->
        <div class="modal fade" id="crearIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ingresar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                    <form name="ingresoTipo" action="/reserva" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Ingrese Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="modeloTipo">Dia</label>
                                        <input type="date" class="form-control" id="dia" name="dia" placeholder="Ingrese Dia">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Adultos</label>
                                        <input type="number"  id="adultos" class="monto" onchange="sumar();"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Total personas</label>
                                        <input type="number"  id="totalPersonas"  value="0" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese Celular">
                                    </div>
                                     <div class="form-group">
                                        <label>Numero Mesa</label>
                                        <input type="number" class="form-control" id="mesaReserva" name="mesaReserva" value="">
                                    </div>
                                     
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="marcaTipo">Sucursal</label>
                                        <select name="sucursal1" class="form-control" id="sucursal1"><option value="">Seleccione Sucursal</option>
                                        <option option value="Puerto Varas">Puerto Varas</option>
                                        <option option value="Frutillar">Frutillar</option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombreTipo">Hora</label>
                                        <select name="hora1" class="form-control" id="hora1"><option value="" disabled selected>Seleccione rango</option>
                                        <option value="12:30 - 14:30">12:30 - 14:30</option>
                                        <option value="14:30 - 16:30">14:30 - 16:30</option>
                                        <option value="18:30 - 20:30">18:30 - 20:30</option>
                                        <option value="20:30 - 22:30">20:30 - 22:30</option></select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="emailTipo">Niños</label>
                                        <input type="number" id="niños"  class="monto" onchange="sumar();" />
                                    </div>
                                    <div class="form-group">
                                        <label for="patenteTipo">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="patenteTipo">Comentario</label>
                                        <input type="text" class="form-control" id="comentario" name="comentario">
                                    </div>
                                </div>
                            </div>  
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                         </div>   
                    </form>
                </div>
            </div>
        </div>
        <br>
        
        <table class="table table-hover" id="tablaTipos">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Dia</th>
                <th scope="col">Hora</th>
                <th scope="col">Adultos</th>
                <th scope="col">Niños</th>
                <th scope="col">Total personas</th>
                <th scope="col">email</th>
                <th scope="col">Celular</th>
                <th scope="col">Numero Mesa</th>
                <th scope="col">Comentarios</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tipos as $tipo)
                <div>
                    <tr>
                        <th>{{$tipo->nombre}}</th>
                        <td>{{$tipo->sucursal}}</td>
                        <td>{{$tipo->dia}}</td>
                        <td>{{$tipo->hora}}</td>
                        <td>{{$tipo->adultos}}</td>
                        <td>{{$tipo->niños}}</td>
                        <td>{{$tipo->cantidad}}</td>
                        <td>{{$tipo->email}}</td>
                        <td>{{$tipo->celular}}</td>
                        <td>{{$tipo->mesa}}</td>
                        <td>{{$tipo->comentario}}</td>
                        <td><button type="button" class="btn btn-primary" title="Editar"  data-toggle="modal" data-target="#editModal{{$tipo->id}}"><i class="fas fa-user-edit"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarModal{{$tipo->id}}"><i class="fas fa-eye-slash"></i></button></td>
                    </tr>
                </div>

                <!-- modal para actualizar -->
                <div class="modal fade" id="editModal{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Reservas</h5>
                                <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="upLineaNegocio" action="{{route('reserva.update', $tipo->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre1_edit" name="nombre1_edit" placeholder="Ingrese Nombre" value="{{$tipo->nombre}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="modeloTipo">Dia</label>
                                            <input type="date" class="form-control" id="dia_edit" name="dia_edit" placeholder="Ingrese Dia" value="{{$tipo->dia}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Adultos</label>
                                            <input type="number"  id="adultos_edit" name="adultos_edit" class="monto" onchange="sumar();" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Total personas</label>
                                            <input type="number" class="form-control" id="total_edit" name="total_edit" value="{{$tipo->cantidad}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="celular">Celular</label>
                                            <input type="text" class="form-control" id="celular_edit" name="celular_edit" placeholder="Ingrese Celular" value="{{$tipo->celular}}">
                                        </div>
                                         <div class="form-group">
                                            <label>Numero Mesa</label>
                                            <input type="number" class="form-control" id="mesaReserva_edit" name="mesaReserva_edit" value="{{$tipo->mesa}}">
                                        </div>
                                         
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sucursal1">Sucursal</label>
                                            <select name="sucursal1_edit" class="form-control" id="sucursal1_edit">
                                            <option value="{{$tipo->sucursal}}">{{$tipo->sucursal}}</option>
                                            <option value="Frutillar">Frutillar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombreTipo">Hora</label>
                                            <select name="hora1_edit" class="form-control" id="hora1_edit">
                                            <option value="{{$tipo->hora}}">{{$tipo->hora}}</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="emailTipo">Niños</label>
                                            <input type="number" id="niños_edit" name="niños_edit" class="monto" onchange="sumar();" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="patenteTipo">Email</label>
                                            <input type="text" class="form-control" id="email_edit" name="email_edit"  value="{{$tipo->email}}">
                                        </div><br>
                                         <div class="form-group">
                                             
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#seleccionarMesa"><i></i>Seleccionar Mesa</button>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="patenteTipo">Comentario</label>
                                            <input type="text" class="form-control" id="comentario_edit" name="comentario_edit" value="{{$tipo->comentario}}">
                                        </div>
                                    </div>
                                    
                                </div>  
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                             </div>   
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal para eliminar -->
                <div class="modal fade" id="eliminarModal{{$tipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Reservas</h5>
                                <button type="button" id="modalCLoseX" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="deleteNegocio" action="{{route('reserva.destroy', $tipo->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreLic">Desea eliminar {{$tipo->nombre}}</label>
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
            @endforeach
            </tbody>
        </table>
        
    <style>
        .container{
            align-self: center;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $.noConflict();
            $('#tablaTipos').DataTable({
                language:{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %d fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "1": "Mostrar 1 fila",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d"
                    },
                    "select": {
                        "1": "%d fila seleccionada",
                        "_": "%d filas seleccionadas",
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "$d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
                }
            });
        } );
    }
</script>

@endsection