@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="agenda">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingreso Nueva Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" hidden>
                        </div>

                        <div class="form-group">
                            <label for="">Nombre de Mascota</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                placeholder="Por favor ingrese el nombre de la mascota">
                        </div>

                        <div class="form-group">
                            <label for="">Medico Tratante</label>
                            <select class="form-control" name="medico" id="medico">
                                <option value="" disabled selected>Seleccione un medico</option>
                                @foreach ($medicos as $m)
                                    <option value="{{ $m->nombre1 }}">{{ $m->nombre1 }} {{ $m->apellido_pat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nombre Cliente</label>
                            <input type="text" class="form-control" name="owner" id="owner" aria-describedby="helpId"
                                placeholder="Ingrese nombre cliente">
                        </div>

                        <div class="form-group">
                            <label for="">E-mail Cliente</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId"
                                placeholder="E-mail Cliente">
                        </div>

                        <div class="form-group">
                            <label for="">Telefono Cliente</label>
                            <input type="text" class="form-control" name="fono" id="fono" aria-describedby="helpId"
                                placeholder="Telefono Cliente">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="form-group d-none">
                            <label for="start">Fecha</label>
                            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId"
                                placeholder="">
                        </div>

                        <div class="form-group d-none">
                            <label for="end">Termino</label>
                            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId"
                                placeholder="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
