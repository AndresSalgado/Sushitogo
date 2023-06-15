<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CajeroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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

// Route::get('/', function () {
//     return view('Home');
// });
// ->middleware('auth');

Route::get('/', [Controller::class, 'index'])
    ->name('Home.index');

#region Usuario
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');
#endregion

#region Recuperar Contraseña
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])
    ->name('password.update');
#endregion

#region Admin
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('/ventas', [AdminController::class, 'ventas'])
    ->middleware('auth.admin')
    ->name('view.venta');

Route::get('/estadisticas/ventas', [AdminController::class, 'ventas'])
    ->name('estadisticas.ventas');

Route::post('estadisticas/reiniciar', [PedidoController::class, 'reiniciarEstadisticas'])
    ->name('estadisticas.reiniciar');
#endregion

#region Cajero
Route::get('/cajero', [CajeroController::class, 'inicio'])
    ->middleware('auth.cajero')
    ->name('cajero.index');
#endregion

#region Usuario
Route::get('/usuario', [UsuarioController::class, 'inicio'])
    ->middleware('auth.admin')
    ->name('usuario.index');

Route::get('/crearusuario', [UsuarioController::class, 'create'])
    ->middleware('auth.admin')
    ->name('usuario.create');

Route::post('/crearUsuario', [UsuarioController::class, 'store'])
    ->middleware('auth.admin')
    ->name('InsertarUsuario');

Route::get('/usuarioDelete/{id}', [UsuarioController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('deleteUsuario');

Route::get('/usuarioUpdate/{id}', [UsuarioController::class, 'edit'])
    ->middleware('auth.admin')
    ->name('updateUsuario');

Route::post('/usuarioUpdate', [UsuarioController::class, 'editBd'])
    ->middleware('auth.admin')
    ->name('updateBdUsuario');

Route::get('/perfil', [UsuarioController::class, 'perfil'])
    ->name('perfil.edit');

Route::put('/perfil/actualizar', [UsuarioController::class, 'update'])
    ->name('perfil.actualizar');

Route::put('/perfil/pedido', [UsuarioController::class, 'carritoPerfil'])
    ->name('carrito.perfil.actualizar');
#endregion

#region crud carta
Route::get('/carta', [CartaController::class, 'inicio'])
    ->middleware('auth.admin')
    ->name('carta.index');

Route::get('/crearcarta', [CartaController::class, 'create'])
    ->middleware('auth.admin')
    ->name('carta.create');

Route::post('/crearCarta', [CartaController::class, 'store'])
    ->middleware('auth.admin')
    ->name('InsertarCarta');

Route::get('/cartaDelete/{id}', [CartaController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('deleteCarta');

Route::get('/cartaUpdate/{id}', [CartaController::class, 'edit'])
    ->middleware('auth.admin')
    ->name('updateCarta');

Route::post('/cartaUpdate', [CartaController::class, 'editBd'])
    ->middleware('auth.admin')
    ->name('updateBdCarta');
#endregion

#region crud restaurante
Route::get('/restaurante', [RestauranteController::class, 'inicio'])
    ->middleware('auth.admin')
    ->name('restaurante.index');

Route::get('/crearRestaurante', [RestauranteController::class, 'create'])
    ->middleware('auth.admin')
    ->name('restaurante.create');

Route::post('/crearRestaurante', [RestauranteController::class, 'store'])
    ->middleware('auth.admin')
    ->name('InsertarRestaurante');

Route::get('/restauranteDelete/{id}', [RestauranteController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('deleteRestaurante');

Route::get('/restauranteUpdate/{id}', [RestauranteController::class, 'edit'])
    ->middleware('auth.admin')
    ->name('updateRestaurante');

Route::post('/restauranteUpdate', [RestauranteController::class, 'editBd'])
    ->middleware('auth.admin')
    ->name('updateBdRestaurante');
#endregion

#region crud producto
Route::get('/producto', [ProductoController::class, 'inicio'])
    ->middleware('auth.admin')
    ->name('producto.index');

Route::get('/crearProducto', [ProductoController::class, 'create'])
    ->middleware('auth.admin')
    ->name('producto.create');

Route::post('/crearProducto', [ProductoController::class, 'store'])
    ->middleware('auth.admin')
    ->name('InsertarProducto');

Route::get('/productoDelete/{id}', [ProductoController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('deleteProducto');

Route::get('/productoUpdate/{id}', [ProductoController::class, 'edit'])
    ->middleware('auth.admin')
    ->name('updateProducto');

Route::post('/productoUpdate', [ProductoController::class, 'editBd'])
    ->middleware('auth.admin')
    ->name('updateBdProducto');
#endregion

#region
Route::get('/municipio', [MunicipioController::class, 'inicio'])
    ->middleware('auth.admin')
    ->name('municipio.index');

Route::get('/CrearMunicipio', [MunicipioController::class, 'create'])
    ->middleware('auth.admin')
    ->name('municipio.create');

Route::post('/CrearMunicipio', [MunicipioController::class, 'store'])
    ->middleware('auth.admin')
    ->name('InsertarMunicipio');

Route::get('/municipioDelete/{id}', [MunicipioController::class, 'destroy'])
    ->middleware('auth.admin')
    ->name('deleteMunicipio');

Route::get('/municipioUpdate/{id}', [MunicipioController::class, 'edit'])
    ->middleware('auth.admin')
    ->name('updateMunicipio');

Route::post('/municipioUpdate', [MunicipioController::class, 'editBd'])
    ->middleware('auth.admin')
    ->name('updateBdMunicipio');
#endregion

#region vista cliente
Route::get('/Restaurante', [RestauranteController::class, 'vista'])
    ->name('Restaurante.view');

Route::get('/Producto', [ProductoController::class, 'vista'])
    ->name('Producto.view');

Route::get('/Acerca_De', [Controller::class, 'vista'])
    ->name('AcercaDe.view');

Route::get('/Historial', [HistorialController::class, 'index'])
    ->name('Historial.view');

Route::get('/step', [PedidoController::class, 'step'])
    ->middleware('auth')
    ->name('step.view');
#endregion

#region Carrito

Route::post('/add', [CartController::class, 'store'])
    ->name('cart.store');

Route::get('/cart-checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');

Route::post('/cart-clear', [CartController::class, 'clear'])
    ->name('cart.clear');

Route::post('/cart-remove', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/cart-update', [CartController::class, 'update'])
    ->name('cart.update');

Route::get('/cart/proceso', [CartController::class, 'procesopedido'])
    ->name('pedido.proceso');

#endregion

#region Pedido

Route::get('/pedido/index', [CajeroController::class, 'inicio'])
    ->middleware('auth.cajero')
    ->name('pedido.index');

Route::get('/pedido/proceso', [PedidoController::class, 'proceso'])
    ->middleware('auth.cajero')
    ->name('pedido.viewproceso');

Route::get('/pedido/terminado', [PedidoController::class, 'terminado'])
    ->middleware('auth.cajero')
    ->name('pedido.viewterminado');

Route::get('/pedido/crear', [PedidoController::class, 'create'])
    ->middleware('auth.cajero')
    ->name('pedido.create');

Route::get('/pedidoDelete/{id}', [PedidoController::class, 'destroy'])
    ->middleware('auth.cajero')
    ->name('deletePedido');

Route::get('/pedido/estado1/{id}', [PedidoController::class, 'estado_1'])
    ->middleware('auth.cajero')
    ->name('pedido.estado_1');

Route::get('/pedido/estado2/{id}', [PedidoController::class, 'estado_2'])
    ->middleware('auth.cajero')
    ->name('pedido.estado_2');

Route::post('/pedidoUpdate', [PedidoController::class, 'update'])
    ->middleware('auth.cajero')
    ->name('updatepedido');
#endregion

#region Detalle Pedido

Route::get('/pedido/detalle/{id}', [DetalleController::class, 'inicio'])
    ->middleware('auth.cajero')
    ->name('pedido.detalle');

#endregion

#region Pdf

Route::get('/Factura/{id}/Pdf', [PdfController::class, 'DescargarFactura'])
    ->name('Factura.detalle');

#endregion
