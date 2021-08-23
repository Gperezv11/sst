@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Estado de Reporte</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Contabilidad</li>
                        <li class="breadcrumb-item">Estado de Reporte</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">
                                Listado de Estado de Reporte
                            </h3>
                        </div>
                        <div class="card-body">
                            <button href="#" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo Ingreso </button>
                            <button class="btn btn-danger"><i class="fas fa-file-excel"></i>Descargar Excel</button>
                        </div>
                        <div class="card-body">
                            <div class="row scrollmenu">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="1"></th>
                                            <th colspan="13">Año 2021</th>
                                        </tr>
                                        <tr>
                                            <th>Ingresos por venta</th>
                                            <th>Enero</th>
                                            <th>Febrero</th>
                                            <th>Marzo</th>
                                            <th>Abril</th>
                                            <th>Mayo</th>
                                            <th>Junio</th>
                                            <th>Julio</th>
                                            <th>Agosto</th>
                                            <th>Septiembre</th>
                                            <th>Octubre</th>
                                            <th>Noviembre</th>
                                            <th>Diciembre</th>
                                            <th>TOTALES</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ventas</td>
                                            <td>
                                                <button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#enero">
                                                    198.823.500
                                                </button>

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#febrero">
                                                    75.262.473
                                                </button>

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#marzo">
                                                    72.927.730
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#abril">
                                                    145.219.782
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light" data-toggle="modal"
                                                    data-target="#mayo">
                                                    198.823.500
                                                </button>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>961.056.985</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Costos de Venta</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Resultado Operacional</th>
                                            <th>198.823.500</th>
                                            <th>75.262.473</th>
                                            <th>72.927.730</th>
                                            <th>145.219.782</th>
                                            <th>198.823.500</th>
                                            <th>-</th>
                                            <th>-</th>
                                            <th>-</th>
                                            <th>-</th>
                                            <th>-</th>
                                            <th>-</th>
                                            <th>-</th>
                                            <th>961.056.985</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>Margenes</th>
                                            <th>100,00%</th>
                                            <th>100,00%</th>
                                            <th>100,00%</th>
                                            <th>100,00%</th>
                                            <th>100,00%</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>100,00%</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>Remuneraciones</td>
                                            <td>(30.663.947)</td>
                                            <td>(33.431.163)</td>
                                            <td>(37.158.120)</td>
                                            <td>(42.829.251)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(144.082.481)</td>
                                            <td>20.85%</td>
                                        </tr>
                                        <tr>
                                            <td>Aesoria Juridica</td>
                                            <td>(200.000)</td>
                                            <td>(200.000)</td>
                                            <td>(200.000)</td>
                                            <td>(200.000)</td>
                                            <td>(200.000)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(1.000.000)</td>
                                            <td>0,14%</td>
                                        </tr>
                                        <tr>
                                            <td>Servicios de Buceo</td>
                                            <td></td>
                                            <td>(282.485)</td>
                                            <td>(340.500)</td>
                                            <td></td>
                                            <td>(1.468.927)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(2.091.912)</td>
                                            <td>0,30%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Embarcaciones</td>
                                            <td></td>
                                            <td>(113.500)</td>
                                            <td></td>
                                            <td></td>
                                            <td>(232.769)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(346.269)</td>
                                            <td>0,05%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Inspeccion</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(135.594)</td>
                                            <td>(70.000)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(205.594)</td>
                                            <td>0.03%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Mantencion</td>
                                            <td>(192.096)</td>
                                            <td></td>
                                            <td></td>
                                            <td>(285.00)</td>
                                            <td>(325.989)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(803.085)</td>
                                            <td>0.12%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Remolque</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(474.576)</td>
                                            <td>(316.384)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(790.960)</td>
                                            <td>0.11%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos Legales</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(12.000)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(12.000)</td>
                                            <td>0.00%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos por Revisar</td>
                                            <td>(20.431.025)</td>
                                            <td>(19.591.488)</td>
                                            <td>(53.462.843)</td>
                                            <td>(23.693.470)</td>
                                            <td>(59.138.986)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(176.317.812)</td>
                                            <td>(25,51%)</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Combustible</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(283.986)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(283.986)</td>
                                            <td>0,04%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Seguros</td>
                                            <td>(83.840)</td>
                                            <td>(84.207)</td>
                                            <td>(84.656)</td>
                                            <td>(216.032)</td>
                                            <td>(151.100)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(619.835)</td>
                                            <td>0,09%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Viaje</td>
                                            <td></td>
                                            <td></td>
                                            <td>(661.990)</td>
                                            <td>(1.376.819)</td>
                                            <td>(1.502.218)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(3.541.027)</td>
                                            <td>(0,51%)</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Autopista</td>
                                            <td>(6.295)</td>
                                            <td>(7.066)</td>
                                            <td>(538)</td>
                                            <td>(4.565)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(18.464)</td>
                                            <td>0,00%</td>
                                        </tr>
                                        <tr>
                                            <th>Gastos de Administracion y Venta</th>
                                            <th>(51.577.203)</th>
                                            <th>(53.709.909)</th>
                                            <th>(91.908.647)</th>
                                            <th>(69.499.293)</th>
                                            <th>(63.418.373)</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>(330.113.425)</th>
                                            <th>47,77%</th>
                                        </tr>
                                        <tr>
                                            <th>Resultado Operacional</th>
                                            <th>147.246.297</th>
                                            <th>21.552.564</th>
                                            <th>(18.980.917)</th>
                                            <th>75.720.489</th>
                                            <th>135.405.127</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>360.943.560</th>
                                            <th>52,23%</th>
                                        </tr>
                                        <tr>
                                            <td>Gastos Bancarios</td>
                                            <td>(101.243)</td>
                                            <td>(4.137.506)</td>
                                            <td>(1.278.938)</td>
                                            <td>(1.271.794)</td>
                                            <td>(1.342.581)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(8.132.062)</td>
                                            <td>1,18%</td>
                                        </tr>
                                        <tr>
                                            <td>Gastos de Factoring</td>
                                            <td>(5.500)</td>
                                            <td>(75.000)</td>
                                            <td>(25.000)</td>
                                            <td>(5.000)</td>
                                            <td>(50.000)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(160.500)</td>
                                            <td>0,02%</td>
                                        </tr>
                                        <tr>
                                            <th>Otros Gastos</th>
                                            <th>(106.743)</th>
                                            <th>(4.212.506)</th>
                                            <th>(1.303.506)</th>
                                            <th>(1.276.794)</th>
                                            <th>(1.392.581)</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>(8.292.562)</th>
                                            <th>1,20%</th>
                                        </tr>
                                        <tr>
                                            <th>Resultado antes de Impuesto</th>
                                            <th>142.139.554</th>
                                            <th>17.340.058</th>
                                            <th>(20.284.855)</th>
                                            <th>74.443.695</th>
                                            <th>134.012.546</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>352.650.998</th>
                                            <th>51,03%</th>
                                        </tr>
                                        <tr>
                                            <td>Impuesto a la renta</td>
                                            <td>-</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>0,00%</td>
                                        </tr>
                                        <tr>
                                            <th>Resultado del ejercicio</th>
                                            <th>147.139.554</th>
                                            <th>17.340.058</th>
                                            <th>(20.284.855)</th>
                                            <th>74.443.695</th>
                                            <th>134.012.546</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>352.650.998</th>
                                            <th>51,03%</th>
                                        </tr>
                                    </tbody>

                                </table>
                                <!-- Modal Enero -->
                                <div class="modal fade" id="enero" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Enero / 2021</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row scrollmenu">
                                                    <table class="table" border="1">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Tipo Documento</th>
                                                                <th scope="col">Tipo Venta</th>
                                                                <th scope="col">Rut Cliente</th>
                                                                <th scope="col">Razon Social</th>
                                                                <th scope="col">Folio</th>
                                                                <th scope="col">Fecha Documento</th>
                                                                <th scope="col">Monto Neto</th>
                                                                <th scope="col">Monto IVA</th>
                                                                <th scope="col">Monto Total</th>
                                                                <th scope="col">Venta ER</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76043092-7
                                                                </td>
                                                                <td>PUERTO OXXEAN S.A.
                                                                </td>
                                                                <td>4963</td>
                                                                <td>20-05-2021</td>
                                                                <td> 10.947.500</td>
                                                                <td> 2.080.025
                                                                </td>
                                                                <td> 13.027.525
                                                                </td>
                                                                <td> 10.947.500
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76192878-3
                                                                </td>
                                                                <td>COMERCIAL Y SERVICIOS MANUEL ALEJANDRO TORRES OLIVARES
                                                                    EMPRESA INDIVID
                                                                </td>
                                                                <td>4964</td>
                                                                <td>31-05-2021</td>
                                                                <td> 8.500.000</td>
                                                                <td> 1.615.000
                                                                </td>
                                                                <td> 10.115.000
                                                                </td>
                                                                <td> 8.500.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76113326-8
                                                                </td>
                                                                <td>ABICK S.A.
                                                                </td>
                                                                <td>4965</td>
                                                                <td>31-05-2021</td>
                                                                <td> 160.000.000</td>
                                                                <td> 30.400.000
                                                                </td>
                                                                <td> 190.400.000
                                                                </td>
                                                                <td> 160.000.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>77836810-2
                                                                </td>
                                                                <td>GEOSINERGIA INGENIERIA Y MEDIO AMBIENTE LIMITADA
                                                                </td>
                                                                <td>4966</td>
                                                                <td>31-05-2021</td>
                                                                <td> 3.376.000
                                                                </td>
                                                                <td> 641.440
                                                                </td>
                                                                <td> 4.017.440
                                                                </td>
                                                                <td> 3.376.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76113326-8
                                                                </td>
                                                                <td>ABICK S.A.
                                                                </td>
                                                                <td>4967</td>
                                                                <td>31-05-2021</td>
                                                                <td> 16.000.000
                                                                </td>
                                                                <td> 3.040.000
                                                                </td>
                                                                <td> 19.040.000
                                                                </td>
                                                                <td> 16.000.000
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Febrero-->
                                <div class="modal fade" id="febrero" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Febrero / 2021</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row scrollmenu">
                                                    <table class="table" border="1">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Tipo Documento</th>
                                                                <th scope="col">Tipo Venta</th>
                                                                <th scope="col">Rut Cliente</th>
                                                                <th scope="col">Razon Social</th>
                                                                <th scope="col">Folio</th>
                                                                <th scope="col">Fecha Documento</th>
                                                                <th scope="col">Monto Neto</th>
                                                                <th scope="col">Monto IVA</th>
                                                                <th scope="col">Monto Total</th>
                                                                <th scope="col">Venta ER</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76192878-3
                                                                </td>
                                                                <td>COMERCIAL Y SERVICIOS MANUEL ALEJANDRO TORRES OLIVARES
                                                                    EMPRESA INDIVID

                                                                </td>
                                                                <td>475
                                                                </td>
                                                                <td>04-02-2021
                                                                </td>
                                                                <td>5.490.500
                                                                </td>
                                                                <td>1.043.195
                                                                </td>
                                                                <td>6.533.695
                                                                </td>
                                                                <td>5.490.500
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>476
                                                                </td>
                                                                <td>05-02-2021
                                                                </td>
                                                                <td>47.217.188
                                                                </td>
                                                                <td>8.971.266
                                                                </td>
                                                                <td>56.188.454
                                                                </td>
                                                                <td>47.217.188
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>477
                                                                </td>
                                                                <td>05-02-2021
                                                                </td>
                                                                <td> 12.225.821
                                                                </td>
                                                                <td> 2.322.906
                                                                </td>
                                                                <td> 14.548.727
                                                                </td>
                                                                <td> 12.225.821
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>478
                                                                </td>
                                                                <td>05-02-2021
                                                                </td>
                                                                <td> 1.027.152
                                                                </td>
                                                                <td> 195.159
                                                                </td>
                                                                <td> 1.222.311
                                                                </td>
                                                                <td> 1.027.152
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>479
                                                                </td>
                                                                <td>11-02-2021
                                                                </td>
                                                                <td> 6.282.812
                                                                </td>
                                                                <td> 1.193.734
                                                                </td>
                                                                <td> 7.476.546
                                                                </td>
                                                                <td> 6.282.812
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76043092-7
                                                                </td>
                                                                <td>PUERTO OXXEAN S.A.
                                                                </td>
                                                                <td>480
                                                                </td>
                                                                <td>11-02-2021
                                                                </td>
                                                                <td> 1.039.000
                                                                </td>
                                                                <td> 197.410
                                                                </td>
                                                                <td> 1.236.410
                                                                </td>
                                                                <td> 1.039.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76506065-6
                                                                </td>
                                                                <td>SURINGEN SPA
                                                                </td>
                                                                <td>481
                                                                </td>
                                                                <td>12-02-2021
                                                                </td>
                                                                <td> 1.980.000
                                                                </td>
                                                                <td> 376.200
                                                                </td>
                                                                <td> 2.356.200
                                                                </td>
                                                                <td> 1.980.000
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Marzo -->
                                <div class="modal fade" id="marzo" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Marzo / 2021</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row scrollmenu">
                                                    <table class="table" border="1">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Tipo Documento</th>
                                                                <th scope="col">Tipo Venta</th>
                                                                <th scope="col">Rut Cliente</th>
                                                                <th scope="col">Razon Social</th>
                                                                <th scope="col">Folio</th>
                                                                <th scope="col">Fecha Documento</th>
                                                                <th scope="col">Monto Neto</th>
                                                                <th scope="col">Monto IVA</th>
                                                                <th scope="col">Monto Total</th>
                                                                <th scope="col">Venta ER</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>482
                                                                </td>
                                                                <td>01-03-2021
                                                                </td>
                                                                <td> 53.500.000
                                                                </td>
                                                                <td> 10.165.000
                                                                </td>
                                                                <td> 63.665.000
                                                                </td>
                                                                <td> 53.500.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>483
                                                                </td>
                                                                <td>01-03-2021
                                                                </td>
                                                                <td> 12.225.821
                                                                </td>
                                                                <td> 2.322.906
                                                                </td>
                                                                <td> 14.548.727
                                                                </td>
                                                                <td> 12.225.821
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>484
                                                                </td>
                                                                <td>01-03-2021
                                                                </td>
                                                                <td> 6.162.909
                                                                </td>
                                                                <td> 1.170.953
                                                                </td>
                                                                <td> 7.333.862
                                                                </td>
                                                                <td> 6.162.909
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76043092-7
                                                                </td>
                                                                <td>PUERTO OXXEAN S.A.
                                                                </td>
                                                                <td>485
                                                                </td>
                                                                <td>04-03-2021
                                                                </td>
                                                                <td> 1.039.000
                                                                </td>
                                                                <td> 197.410
                                                                </td>
                                                                <td> 1.236.410
                                                                </td>
                                                                <td> 1.039.000
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Abril-->
                                <div class="modal fade" id="abril" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Abril / 2021</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row scrollmenu">
                                                    <table class="table" border="1">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Tipo Documento</th>
                                                                <th scope="col">Tipo Venta</th>
                                                                <th scope="col">Rut Cliente</th>
                                                                <th scope="col">Razon Social</th>
                                                                <th scope="col">Folio</th>
                                                                <th scope="col">Fecha Documento</th>
                                                                <th scope="col">Monto Neto</th>
                                                                <th scope="col">Monto IVA</th>
                                                                <th scope="col">Monto Total</th>
                                                                <th scope="col">Venta ER</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>487
                                                                </td>
                                                                <td>07-04-2021
                                                                </td>
                                                                <td> 53.500.000
                                                                </td>
                                                                <td> 10.165.000
                                                                </td>
                                                                <td> 63.665.000
                                                                </td>
                                                                <td> 53.500.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>488
                                                                </td>
                                                                <td>07-04-2021
                                                                </td>
                                                                <td> 14.144.692
                                                                </td>
                                                                <td> 2.687.491
                                                                </td>
                                                                <td> 16.832.183
                                                                </td>
                                                                <td> 14.144.692
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>489
                                                                </td>
                                                                <td>07-04-2021
                                                                </td>
                                                                <td> 3.999.272
                                                                </td>
                                                                <td> 759.862
                                                                </td>
                                                                <td> 4.759.134
                                                                </td>
                                                                <td> 3.999.272
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>491
                                                                </td>
                                                                <td>29-04-2021
                                                                </td>
                                                                <td> 53.500.000
                                                                </td>
                                                                <td> 10.165.000
                                                                </td>
                                                                <td> 63.665.000
                                                                </td>
                                                                <td> 53.500.000
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>79797990-2
                                                                </td>
                                                                <td>INVERMAR S.A.
                                                                </td>
                                                                <td>492
                                                                </td>
                                                                <td>29-04-2021
                                                                </td>
                                                                <td> 20.075.818
                                                                </td>
                                                                <td> 3.814.405
                                                                </td>
                                                                <td> 23.890.223
                                                                </td>
                                                                <td> 20.075.818
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Abril-->
                                <div class="modal fade" id="mayo" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Mayo / 2021</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row scrollmenu">
                                                    <table class="table" border="1">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Tipo Documento</th>
                                                                <th scope="col">Tipo Venta</th>
                                                                <th scope="col">Rut Cliente</th>
                                                                <th scope="col">Razon Social</th>
                                                                <th scope="col">Folio</th>
                                                                <th scope="col">Fecha Documento</th>
                                                                <th scope="col">Monto Neto</th>
                                                                <th scope="col">Monto IVA</th>
                                                                <th scope="col">Monto Total</th>
                                                                <th scope="col">Venta ER</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76043092-7
                                                                </td>
                                                                <td>PUERTO OXXEAN S.A
                                                                </td>
                                                                <td>493
                                                                </td>
                                                                <td>20-05-2021
                                                                </td>
                                                                <td>  10.947.500 
                                                                </td>
                                                                <td>  2.080.025 
                                                                </td>
                                                                <td>  13.027.525 
                                                                </td>
                                                                <td>  10.947.500 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76192878-3
                                                                </td>
                                                                <td>COMERCIAL Y SERVICIOS MANUEL ALEJANDRO TORRES OLIVARES EMPRESA INDIVID
                                                                </td>
                                                                <td>494
                                                                </td>
                                                                <td>31-05-2021
                                                                </td>
                                                                <td>  8.500.000 
                                                                </td>
                                                                <td>  1.615.000 
                                                                </td>
                                                                <td>  10.115.000 
                                                                </td>
                                                                <td>  8.500.000 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76113326-8
                                                                </td>
                                                                <td>ABICK S.A.
                                                                </td>
                                                                <td>495
                                                                </td>
                                                                <td>31-05-2021
                                                                </td>
                                                                <td>  160.000.000 
                                                                </td>
                                                                <td>  30.400.000 
                                                                </td>
                                                                <td>  190.400.000 
                                                                </td>
                                                                <td>  160.000.000 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>77836810-2
                                                                </td>
                                                                <td>GEOSINERGIA INGENIERIA Y MEDIO AMBIENTE LIMITADA
                                                                </td>
                                                                <td>496
                                                                </td>
                                                                <td>31-05-2021
                                                                </td>
                                                                <td>  3.376.000 
                                                                </td>
                                                                <td>  641.440 
                                                                </td>
                                                                <td>  4.017.440 
                                                                </td>
                                                                <td>  3.376.000 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>Del Giro</td>
                                                                <td>76113326-8
                                                                </td>
                                                                <td>ABICK S.A.
                                                                </td>
                                                                <td>497
                                                                </td>
                                                                <td>31-05-2021
                                                                </td>
                                                                <td>  16.000.000 
                                                                </td>
                                                                <td>  3.040.000
                                                                </td>
                                                                <td>  19.040.000 
                                                                </td>
                                                                <td>  16.000.000 
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            div.scrollmenu {
                                overflow: auto;
                                white-space: nowrap;
                            }

                            div.scrollmenu a {
                                display: inline-block;
                                color: white;
                                text-align: center;
                                padding: 14px;
                                text-decoration: none;
                            }

                            div.scrollmenu a:hover {
                                background-color: #777;
                            }

                            th[colspan="13"] {
                                text-align: center;
                            }

                            th {
                                color: DodgerBlue;
                            }

                        </style>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
