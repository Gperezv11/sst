@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de Ventas</h1>
                    <br>

                    <div class="card" style="width: 30%;">
                        <table>
                            <tr>
                                <td><strong>Total Neto:</strong>198.823.500</td>
                            </tr>
                            <tr>
                                <td><strong>Total Iva:</strong>37.776.465</td>
                            </tr>
                            <tr>
                                <td><strong>Monto Total:</strong>236.599.965</td>
                            </tr>
                            <tr>
                                <td><strong>VTA ER:</strong>198.823.500</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="tabla-animal" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Año</td>
                                        <td>Mes</td>
                                        <td>Tipo Documento</td>
                                        <td>Tipo Venta</td>
                                        <td>Rut</td>
                                        <td>Razon Social</td>
                                        <td>Folio</td>
                                        <td>FDocto</td>
                                        <td>MExento</td>
                                        <td>MNeto</td>
                                        <td> MIVA</td>
                                        <td>Mtotal</td>
                                        <td>VTAER</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rVenta as $c)
                                        <tr>
                                            <td>{{ $c->id }}</td>
                                            <td>{{ $c->año }}</td>
                                            <td>{{ $c->mes }}</td>
                                            <td>{{ $c->tipoDoc }}</td>
                                            <td>{{ $c->tipoVenta }}</td>
                                            <td>{{ $c->rutClient }}</td>
                                            <td>{{ $c->RSocial }}</td>
                                            <td>{{ $c->folio }}</td>
                                            <td>{{ $c->FDocto }}</td>
                                            <td>{{ $c->MExento }}</td>
                                            <td>{{ $c->MNeto }}</td>
                                            <td>{{ $c->MIVA }}</td>
                                            <td>{{ $c->Mtotal }}</td>
                                            <td>{{ $c->VTAER }}</td>

                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#tabla-animal').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                    responsive: true
                }
            });
        });
    </script>
@endsection
