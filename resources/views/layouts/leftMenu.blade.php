

<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <img src="/images/S png.png" alt="SSTecnologic SA" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>SSTecnologic</b> SA</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/CEO2.png" height="160px" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name  }}</a>
                <a class="d-block">CEO Fundador</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!--Personal-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Personal
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/ficha" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ficha Personal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tablaficha" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Fichas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/reporta" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte Asistencia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/controlacceso" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Control de Accesos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/maestropermisos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro de Permisos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/permisos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tablapermisos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Permisos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Certificados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liquidaciones de Sueldo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Libro de Remuneraciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Previred</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vacaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Turnos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Parking-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-parking"></i>
                        <p>
                            Parking
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sucursal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estacionamientos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tarifa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/estacionamiento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Control de Acceso</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Ventas-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-dollar-sign"></i>
                        <p>
                            Ventas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/clientev" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listacliente" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ingresarprecio" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mantenedor De Precio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listadoprecio" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Precios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/crearListaPrecio" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mantenedor Lista de Precios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/crearBodega" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mantenedor Bodega</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cotizaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Facturacion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/eVenta" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Pos-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cart-plus"></i>
                        <p>
                            POS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/boletasimple" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boleta Simple</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/posMini" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>POS Minimarket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/orden" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>POS Orden</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listarOrdenes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Orden</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Compras -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cart-arrow-down"></i>
                        <p>
                            Compras
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/proveedores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listarProveedores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado Proveedores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/reporteCompra" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte Compra</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Honorarios -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>
                            Honorarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/prestadores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prestadores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listarPrestadores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado Prestadores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/prestador" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ingreso Honorarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Rendiciones-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-clipboard-list"></i>
                        <p>
                            Rendiciones
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/rendidores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rendidores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listarRendidores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado Rendidores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pautorizado" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Personal Autorizado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/fondosrendir" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fondos a Rendir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Bitacora-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-book"></i>
                        <p>
                            Bitacora
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/reported" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte Diario</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Contabilidad-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calculator"></i>
                        <p>
                            Contabilidad
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/estador" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estado de Resultados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/plancuentas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Plan de Cuentas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/lnegocionc" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lineas de Negocio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/centrocosto" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Centros de Costo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/proyectoc" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proyectos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listadonaves" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de Naves</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Libros Contables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Productos y/o Servicios-->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-boxes"></i>
                        <p>
                            Productos y/o Servicios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/prodyservicio" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Creación de productos y/o Servicios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listProdyservicio" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar productos y/o Servicios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantUnidadMedida" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unidades de medida</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantTipo" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro Tipo de Producto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantLineaNeg" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro Linea de Negocio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantCategoria" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro Categoria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantSubcategoria" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro Subcategoria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantMarcas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro Marcas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/mantSubmarca" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maestro Submarca</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>

    <div class="sidebar-custom">
        <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
        <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
    </div>
</aside>

