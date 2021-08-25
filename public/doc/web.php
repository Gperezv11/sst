<?php
use App\Http\Controllers\CalendarioController;

use Illuminate\Support\Facades\Route;
use App\Models\CalendarioEvent;
use App\Http\Controllers\LoginCoteleController;
use App\Http\Controllers\LoginTierrasBlancasController;
use App\Http\Controllers\LoginMundoAnimal;
use App\Http\Controllers\LoginDiscoController;
use App\Http\Controllers\LoginPoteController;
use App\Http\Controllers\LoginTransporteController;
use App\Http\Controllers\LoginRepartoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/ficha', 'App\Http\Controllers\FichaController');
Route::resource('/tablaficha', 'App\Http\Controllers\TablaFichaController');
Route::resource('/controlacceso','App\Http\Controllers\FichaIngresoController');
Route::resource('/estacionamiento','App\Http\Controllers\FichaEstacionamientoController');
Route::resource('/sucursal','App\Http\Controllers\SucursalController');
Route::resource('/tarifa','App\Http\Controllers\FichaTarifaController');
Route::resource('/patente','App\Http\Controllers\PatenteController');
Route::resource('/vehiculo','App\Http\Controllers\FichaVehiculoController');
Route::resource('/modelo','App\Http\Controllers\ModeloController');
Route::resource('/reserva','App\Http\Controllers\ReservaController');
Route::resource('/mesa','App\Http\Controllers\MesaController');
Route::get('/findModelo','App\Http\Controllers\ModeloController@findModelo')->name('findModelo');
Route::get('/findPatente','App\Http\Controllers\PatenteController@findPatente')->name('findPatente');
Route::post('/modelo/update', 'App\Http\Controllers\ModeloController@update');
Route::post('/modelo/destroy', 'App\Http\Controllers\ModeloController@destroy')->name('eliminarMarca');
ROute::post('/tablaficha/edit','App\Http\Controllers\TablaFichaController@edit');
Route::get('/findComuna','App\Http\Controllers\FichaController@findComuna')->name('findComuna');
Route::resource('/formHonor','App\Http\Controllers\formHonorController');
Route::get('/formHonor/cargar','App\Http\Controllers\formHonorController@cargar')->name='cargar';

Route::resource('/clientev','App\Http\Controllers\ClienteVentaController');
Route::get('/findComunaC','App\Http\Controllers\ClienteVentaController@findComunaC')->name('findComunaC');
Route::get('/validexistrut','App\Http\Controllers\ClienteVentaController@validexistrut')->name('validexistrut');
Route::resource('/listacliente','App\Http\Controllers\TablaClienteController');
Route::post('/listacliente/update','App\Http\Controllers\TablaClienteController@update');
Route::post('/listacliente/destroy', 'App\Http\Controllers\TablaClienteController@destroy')->name('eliminarCliente');
Route::get('/findComuna','App\Http\Controllers\TablaClienteController@findComuna')->name('findComunalistC');

Route::get('/findComuna','App\Http\Controllers\ComunaController@findComuna')->name('findComunalist');

Route::resource('/proveedores','App\Http\Controllers\ProveedoresController');
Route::post('/proveedores/store','App\Http\Controllers\ProveedoresController@store')->name('addProveedor');
Route::get('/validexistrut','App\Http\Controllers\ProveedoresController@validexistrut')->name('existrutProv');
Route::resource('/listarProveedores','App\Http\Controllers\ListarProveedoresController');
Route::get('/cambiarStatusProv','App\Http\Controllers\ListarProveedoresController@cambiarStatusProv')->name('cambiarStatusProv');
Route::post('/listarProveedores/update','App\Http\Controllers\ListarProveedoresController@update')->name('upProveedor');
Route::post('/listarProveedores/destroy', 'App\Http\Controllers\ListarProveedoresController@destroy')->name('eliminarProveedor');


Route::resource('/prestadores','App\Http\Controllers\HonorariosController');
Route::post('/prestadores/store','App\Http\Controllers\HonorariosController@store')->name('addHonorario');
Route::get('/prestadores/existrutPrestador','App\Http\Controllers\HonorariosController@validexistrutPrest')->name('existrutPrestador');

Route::resource('/listarPrestadores','App\Http\Controllers\ListarHonorariosController');
Route::get('/cambiarStatusPres','App\Http\Controllers\ListarHonorariosController@cambiarStatusPres')->name('cambiarStatusPres');
Route::post('/listarPrestadores/update','App\Http\Controllers\ListarHonorariosController@update')->name('upPrestador');
Route::post('/listarPrestadores/destroy', 'App\Http\Controllers\ListarHonorariosController@destroy')->name('eliminarPrestador');

Route::resource('/rendidores','App\Http\Controllers\RendicionesController');
Route::post('/rendidores/store','App\Http\Controllers\RendicionesController@store')->name('addRendicion');
Route::get('/rendidores/existrutRendidor','App\Http\Controllers\RendicionesController@validexistrutPrest')->name('existrutRendidor');

Route::resource('/listarRendidores','App\Http\Controllers\ListarRendicionesController');
Route::get('/cambiarStatusRendidor','App\Http\Controllers\ListarRendicionesController@cambiarStatus')->name('cambiarStatusRendidor');
Route::post('/listarRendidores/update','App\Http\Controllers\ListarRendicionesController@update')->name('upPrestador');
Route::post('/listarRendidores/destroy', 'App\Http\Controllers\ListarRendicionesController@destroy')->name('eliminarRendidor');

Route::resource('/lnegocionc','App\Http\Controllers\LineaNegociosContabilidadController');
Route::resource('/centrocosto','App\Http\Controllers\CentroCostoContabilidadController');
Route::resource('/proyectoc', 'App\Http\Controllers\ProyectoContabilidadController');
Route::resource('/pautorizado','App\Http\Controllers\PersonalAutorizadoController');
Route::resource('/listadonaves','App\Http\Controllers\ListadoNavesController');
Route::resource('/fondosrendir', 'App\Http\Controllers\FondosRendirController');
Route::resource('/reported', 'App\Http\Controllers\ReporteDiarioController');
Route::resource('/reporta','App\Http\Controllers\ReporteAsistenciaController');
Route::resource('/estador', 'App\Http\Controllers\EstadoResultadoController');
Route::get('/cambiarStatus','App\Http\Controllers\FichaController@cambiarStatus')->name('cambiar.Status');
Route::get('/cambiarStatusCliente','App\Http\Controllers\TablaClienteController@cambiarStatusCliente')->name('cambiarStatusCliente');

Route::resource('/permisos','App\Http\Controllers\PermisosController');
Route::resource('/tablapermisos','App\Http\Controllers\TablaPermisoController');
Route::resource('/listacliente','App\Http\Controllers\TablaClienteController');

Route::resource('/maestropermisos', 'App\Http\Controllers\LicenciasController');


Route::resource('/mahome','App\Http\Controllers\MAHomeController');
Route::resource('/macalendario','App\Http\Controllers\MACalendarioController');
Route::resource('/mafichapersonal', 'App\Http\Controllers\MAFichaPersonalController');
Route::resource('/matablafichapersonal','App\Http\Controllers\MATablaFichaPersonalController');

Route::resource('/mantUnidadMedida', 'App\Http\Controllers\UnidadMedidaController');
Route::post('/mantUnidadMedida/update', 'App\Http\Controllers\MarcaController@update');
Route::post('/mantUnidadMedida/destroy', 'App\Http\Controllers\MarcaController@destroy')->name('eliminarUnidad');

Route::resource('/mantTipo', 'App\Http\Controllers\TipoProductosController');
Route::post('/mantTipo/update', 'App\Http\Controllers\TipoProductosController@update');
Route::post('/mantTipo/destroy', 'App\Http\Controllers\TipoProductosController@destroy')->name('eliminarTipo');
Route::resource('/mantLineaNeg', 'App\Http\Controllers\LineaNegocioController');
Route::post('/mantLineaNeg/update', 'App\Http\Controllers\LineaNegocioController@update');
Route::post('/mantLineaNeg/destroy', 'App\Http\Controllers\LineaNegocioController@destroy');

Route::resource('/mantCategoria', 'App\Http\Controllers\CategoriaController');
Route::post('/mantCategoria/update', 'App\Http\Controllers\CategoriaController@update');
Route::post('/mantCategoria/destroy', 'App\Http\Controllers\CategoriaController@destroy')->name('eliminarCategoria');

Route::resource('/mantSubcategoria', 'App\Http\Controllers\SubcategoriaController');
Route::post('/mantSubcategoria/update', 'App\Http\Controllers\SubcategoriaController@update');
Route::post('/mantSubcategoria/destroy', 'App\Http\Controllers\SubcategoriaController@destroy')->name('eliminarSubcat');

Route::resource('/mantMarcas', 'App\Http\Controllers\MarcaController');
Route::post('/mantMarcas/update', 'App\Http\Controllers\MarcaController@update');
Route::post('/mantMarcas/destroy', 'App\Http\Controllers\MarcaController@destroy')->name('eliminarMarca');

Route::resource('/mantSubmarca', 'App\Http\Controllers\SubmarcaController');
Route::post('/mantSubmarca/update', 'App\Http\Controllers\SubmarcaController@update');
Route::post('/mantSubmarca/destroy', 'App\Http\Controllers\SubmarcaController@destroy')->name('eliminarSubcat');

Route::resource('/prodyservicio','App\Http\Controllers\ProductoServicioController');
Route::post('/prodyservicio/store','App\Http\Controllers\ProductoServicioController@store')->name('addProductos');
Route::get('/findSubCat','App\Http\Controllers\ProductoServicioController@findSubCat')->name('findsubcategoria');
Route::get('/findSubMarca','App\Http\Controllers\ProductoServicioController@findSubMarca')->name('findSubMarca');
Route::resource('/listProdyservicio','App\Http\Controllers\ListarProductoServicioController');
Route::post('/listProdyservicio/update','App\Http\Controllers\ListarProductoServicioController@update');
Route::post('/listProdyservicio/destroy', 'App\Http\Controllers\ListarProductoServicioController@destroy')->name('eliminarProducto');
Route::get('/cambiarStatusInventario','App\Http\Controllers\ListarProductoServicioController@cambiarStatusInventario')->name('cambiarStatusInventario');
Route::get('/cambiarStatusVenta','App\Http\Controllers\ListarProductoServicioController@cambiarStatusVenta')->name('cambiarStatusVenta');
Route::get('/cambiarStatusAfecto','App\Http\Controllers\ListarProductoServicioController@cambiarStatusAfecto')->name('cambiarStatusAfecto');
Route::get('/cambiarStatusImpuesto','App\Http\Controllers\ListarProductoServicioController@cambiarStatusImpuesto')->name('cambiarStatusImpuesto');

Route::resource('/ingresarprecio','App\Http\Controllers\ListaPrecioController');
Route::post('/ingresarprecio/store', 'App\Http\Controllers\ListaPrecioController@store');

Route::resource('/listadoprecio','App\Http\Controllers\TablaPrecioController');
Route::post('/listadoprecio/update','App\Http\Controllers\TablaPrecioController@update');
Route::post('/listadoprecio/destroy','App\Http\Controllers\TablaPrecioController@destroy');
Route::resource('/crearListaPrecio','App\Http\Controllers\CrearListaPrecioController');
Route::post('/crearListaPrecio/update', 'App\Http\Controllers\CrearListaPrecioController@update');
Route::post('/crearListaPrecio/destroy', 'App\Http\Controllers\CrearListaPrecioController@destroy')->name('eliminarListaPrecio');

Route::resource('/crearBodega','App\Http\Controllers\CrearBodegaController');
Route::post('/crearBodega/update', 'App\Http\Controllers\CrearBodegaController@update');
Route::post('/crearBodega/destroy', 'App\Http\Controllers\CrearBodegaController@destroy')->name('eliminarBodega');
Route::get('/obProdxListaPrecio','App\Http\Controllers\TablaPrecioController@obProdxListaPrecio')->name('obProdxListaPrecio');

Route::resource('/orden','App\Http\Controllers\OrdenController');
Route::post('/orden/destroy','App\Http\Controllers\OrdenController@destroy');
Route::post('/orden/update','App\Http\Controllers\OrdenController@update');
Route::post('/orden/finalizarPedido/{id}','App\Http\Controllers\OrdenController@finalizarPedido')->name('finalizarPedido');
Route::post('/orden/eliminarPedido/{id}','App\Http\Controllers\OrdenController@eliminarPedido')->name('eliminarPedido');

Route::get('/imprimirOrden/{id}','App\Http\Controllers\ImprimirOrdenController@index')->name('imprimirOrden');
Route::resource('/listarOrdenes','App\Http\Controllers\ComandaController');

Route::resource('/posMini','App\Http\Controllers\VentaMinimarketController');
Route::post('/posMini/store','App\Http\Controllers\VentaMinimarketController@store')->name('addProductoPOS');
Route::post('/posMini/destroy','App\Http\Controllers\VentaMinimarketController@destroy');
Route::post('/posMini/update','App\Http\Controllers\VentaMinimarketController@update');
Route::post('/posMini/finalizarPedido','App\Http\Controllers\VentaMinimarketController@finalizarPedido')->name('finalizarPedidoPOS');
Route::post('/posMini/eliminarPedido/{id}','App\Http\Controllers\VentaMinimarketController@eliminarPedido')->name('eliminarPedidoPOS');
Route::post('/posMini/buscarProducto/{id}','App\Http\Controllers\VentaMinimarketController@buscarProducto')->name('buscarProducto');
Route::post('/posMini/fetch', 'App\Http\Controllers\VentaMinimarketController@fetch')->name('autocomplete.fetch');

//calendario
Route::get('calendar-event', [CalendarioController::class, 'index']);
Route::post('calendar-crud-ajax',[CalendarioController::class, 'calendarEvents']);

//Logins
Route::resource('logincotele', LoginCoteleController::class);
Route::resource('logintierrasblancas', LoginTierrasBlancasController::class);
Route::resource('loginmundoanimal', LoginMundoAnimal::class);
Route::resource('logindisco', LoginDiscoController::class);
Route::resource('loginpote', LoginPoteController::class);
Route::resource('logintransporte', LoginTransporteController::class);
Route::resource('loginreparto', LoginRepartoController::class);


