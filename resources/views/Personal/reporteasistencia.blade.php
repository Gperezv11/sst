@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de Asistencia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Personal</li>
                        <li class="breadcrumb-item">Reporte de Asistencia</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-blue">
                        <div class="card-header">
                            <h3 class="card-title">
                                Listado Reporte de Asistencias
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
                                        <th colspan="6"></th>
                                        <th colspan="31">Mes de Junio 2021</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Rut</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Sucursal</th>
                                        <th scope="col">Departamento</th>
                                        <th scope="col">Supervisor</th>
                                        <th scope="col">1</th>
                                        <th scope="col">2</th>
                                        <th scope="col">3</th>
                                        <th scope="col">4</th>
                                        <th scope="col">5</th>
                                        <th scope="col">6</th>
                                        <th scope="col">7</th>
                                        <th scope="col">8</th>
                                        <th scope="col">9</th>
                                        <th scope="col">10</th>
                                        <th scope="col">11</th>
                                        <th scope="col">12</th>
                                        <th scope="col">13</th>
                                        <th scope="col">14</th>
                                        <th scope="col">15</th>
                                        <th scope="col">16</th>
                                        <th scope="col">17</th>
                                        <th scope="col">18</th>
                                        <th scope="col">19</th>
                                        <th scope="col">20</th>
                                        <th scope="col">21</th>
                                        <th scope="col">22</th>
                                        <th scope="col">23</th>
                                        <th scope="col">24</th>
                                        <th scope="col">25</th>
                                        <th scope="col">26</th>
                                        <th scope="col">27</th>
                                        <th scope="col">28</th>
                                        <th scope="col">29</th>
                                        <th scope="col">30</th>
                                        <th scope="col">Días Trabajados</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">14.003.611-0</th>
                                        <td>ROLANDO SILVA QUIROZ</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>24 FILETE 2 MERCEDES GUTIERREZ</td>
                                        <td>MERCEDES GUTIERREZ</td>
                                        <td><a data-toggle="modal" data-target="#Modal1">D1</a></td>
                                        <td style="color:red;"><a data-toggle="modal" data-target="#Modal2">L</a></td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>D1</td>
                                        <td>PL</td>
                                        <td>PL</td>
                                        <td>PL</td>
                                        <td>PL</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">15.299.373</th>
                                        <td>JUAN VICTOR CHAVEZ MIRANDA</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>20 MATANZA JUAN CHAVEZ</td>
                                        <td>HECTOR MIERES ROMAN</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>F</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">16.909.153-6</th>
                                        <td>JOCELYN PAOLA NAVARRO BARRIENTOS</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>14 FILETE JUAN URIBE</td>
                                        <td>CRISTIAN GALINDO</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td style="color:red;">N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">17.532.660-K</th>
                                        <td>RODRIGO RENAN ARISMENDI MONTESINOS</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>86 FRIGORIFICO CERMAQ</td>
                                        <td>CLAUDIO PIZARRO</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">19.030.060-9</th>
                                        <td>CONSTANZA DANIELA GARCIA GONZALEZ</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>85 PREVENCION CERMAQ</td>
                                        <td>SIN SUPERVISOR</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">19.502.453-7</th>
                                        <td>FRANCISCO ESTEBAN GOMEZ MANSILLA</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>52 EMP CONGELADO SAMUEL VARGAS</td>
                                        <td>HECTOR MIERES ROMAN</td>
                                        <td>T1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>T1</td>
                                        <td>T1</td>
                                        <td>T1</td>
                                        <td>T1</td>
                                        <td>T1</td>
                                        <td>T1</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">126.297.975-K</th>
                                        <td>ALEJANDRO JOSE GONZALEZ RUIZ</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>86 FRIGORIFICO CERMAQ</td>
                                        <td>JUAN URIBE</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>V</td>
                                        <td>V</td>
                                        <td>V</td>
                                        <td style="color:red;">V</td>
                                        <td>V</td>
                                        <td>V</td>
                                        <td>V</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>N1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">18.886.093-1</th>
                                        <td>DANIELA ANDREA ZAGAL ARANEDA</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>86 FRIGORIFICO CERMAQ</td>
                                        <td>GERMAN MAYORGA</td>
                                        <td>D1</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">V</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>L</td>
                                        <td style="color:red;">L</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>30</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">26.879.093-1</th>
                                        <td>NESTROS FABIAN ROGEL</td>
                                        <td>Cermaq</td>
                                        <td>Cermaq</td>
                                        <td>86 FRIGORIGICO CERMAQ</td>
                                        <td>HECTOR MIERES ROMAN</td>
                                        <td style="color:red;"><a data-toggle="modal" data-target="#Modal3">█</a></td>
                                        <td style="color:red;">█</td>
                                        <td style="color:red;">█</td>
                                        <td style="color:red;">█</td>
                                        <td style="color:red;">█</td>
                                        <td>D1</td>
                                        <td>D1</td>
                                        <td>F</td>
                                        <td>F</td>
                                        <td>L</td>
                                        <td style="color:red;">V</td>
                                        <td>F</td>
                                        <td>F</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>TC</td>
                                        <td>30</td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                    th[colspan="31"] {
                                        text-align: center;
                                    }
                                </style>
                                <div class="modal fade" id="Modal1">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Horario</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    Entrada: 09:30 AM
                                                </div>
                                                <div class="row">
                                                    Salida: 06:45 PM
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="Modal2">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Informe</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    Licencia por 3 días.
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="Modal3">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Informe</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    Ausente
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


