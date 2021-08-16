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
                                        <td scope="row">Ventas</td>
                                        <td>198.823.500</td>
                                        <td>75.262.473</td>
                                        <td>72.927.730</td>
                                        <td>145.219.782</td>
                                        <td>198.823.500</td>
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
                                        <td scope="row">Costos de Venta</td>
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
                                        <th scope="row">Resultado Operacional</th>
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
                                        <th scope="row">Margenes</th>
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
                                        <td scope="row">Remuneraciones</td>
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
                                        <td scope="row">Aesoria Juridica</td>
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
                                        <td scope="row">Servicios de Buceo</td>
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
                                        <td scope="row">Gastos de Embarcaciones</td>
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
                                        <td scope="row">Gastos de Inspeccion</td>
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
                                        <td scope="row">Gastos de Mantencion</td>
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
                                        <td scope="row">Gastos de Remolque</td>
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
                                        <td scope="row">Gastos Legales</td>
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
                                        <td scope="row">Gastos por Revisar</td>
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
                                        <td scope="row">Gastos de Combustible</td>
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
                                        <td scope="row">Gastos de Seguros</td>
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
                                        <td scope="row">Gastos de Viaje</td>
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
                                        <td scope="row">Gastos de Autopista</td>
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
                                        <th scope="row">Gastos de Administracion y Venta</th>
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
                                        <th scope="row">Resultado Operacional</th>
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
                                        <td scope="row">Gastos Bancarios</td>
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
                                        <td scope="row">Gastos de Factoring</td>
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
                                        <th scope="row">Otros Gastos</th>
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
                                        <th scope="row">Resultado antes de Impuesto</th>
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
                                        <td scope="row">Impuesto a la renta</td>
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
                                        <th scope="row">Resultado del ejercicio</th>
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
                                    th{
                                        color:DodgerBlue;
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


