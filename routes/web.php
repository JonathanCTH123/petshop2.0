<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-tipo-animals')->name('tbl-tipo-animals/')->group(static function() {
            Route::get('/',                                             'TblTipoAnimalController@index')->name('index');
            Route::get('/create',                                       'TblTipoAnimalController@create')->name('create');
            Route::post('/',                                            'TblTipoAnimalController@store')->name('store');
            Route::get('/{tblTipoAnimal}/edit',                         'TblTipoAnimalController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblTipoAnimalController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblTipoAnimal}',                             'TblTipoAnimalController@update')->name('update');
            Route::delete('/{tblTipoAnimal}',                           'TblTipoAnimalController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-animals')->name('tbl-animals/')->group(static function() {
            Route::get('/',                                             'TblAnimalController@index')->name('index');
            Route::get('/create',                                       'TblAnimalController@create')->name('create');
            Route::post('/',                                            'TblAnimalController@store')->name('store');
            Route::get('/{tblAnimal}/edit',                             'TblAnimalController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblAnimalController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblAnimal}',                                 'TblAnimalController@update')->name('update');
            Route::delete('/{tblAnimal}',                               'TblAnimalController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-clientes')->name('tbl-clientes/')->group(static function() {
            Route::get('/',                                             'TblClienteController@index')->name('index');
            Route::get('/create',                                       'TblClienteController@create')->name('create');
            Route::post('/',                                            'TblClienteController@store')->name('store');
            Route::get('/{tblCliente}/edit',                            'TblClienteController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblClienteController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblCliente}',                                'TblClienteController@update')->name('update');
            Route::delete('/{tblCliente}',                              'TblClienteController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-proveedors')->name('tbl-proveedors/')->group(static function() {
            Route::get('/',                                             'TblProveedorController@index')->name('index');
            Route::get('/create',                                       'TblProveedorController@create')->name('create');
            Route::post('/',                                            'TblProveedorController@store')->name('store');
            Route::get('/{tblProveedor}/edit',                          'TblProveedorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblProveedorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblProveedor}',                              'TblProveedorController@update')->name('update');
            Route::delete('/{tblProveedor}',                            'TblProveedorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-articulos')->name('tbl-articulos/')->group(static function() {
            Route::get('/',                                             'TblArticuloController@index')->name('index');
            Route::get('/create',                                       'TblArticuloController@create')->name('create');
            Route::post('/',                                            'TblArticuloController@store')->name('store');
            Route::get('/{tblArticulo}/edit',                           'TblArticuloController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblArticuloController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblArticulo}',                               'TblArticuloController@update')->name('update');
            Route::delete('/{tblArticulo}',                             'TblArticuloController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-facturas')->name('tbl-facturas/')->group(static function() {
            Route::get('/',                                             'TblFacturaController@index')->name('index');
            Route::get('/create',                                       'TblFacturaController@create')->name('create');
            Route::post('/',                                            'TblFacturaController@store')->name('store');
            Route::get('/{tblFactura}/edit',                            'TblFacturaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblFacturaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblFactura}',                                'TblFacturaController@update')->name('update');
            Route::delete('/{tblFactura}',                              'TblFacturaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tbl-factura-detalles')->name('tbl-factura-detalles/')->group(static function() {
            Route::get('/',                                             'TblFacturaDetalleController@index')->name('index');
            Route::get('/create',                                       'TblFacturaDetalleController@create')->name('create');
            Route::post('/',                                            'TblFacturaDetalleController@store')->name('store');
            Route::get('/{tblFacturaDetalle}/edit',                     'TblFacturaDetalleController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TblFacturaDetalleController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tblFacturaDetalle}',                         'TblFacturaDetalleController@update')->name('update');
            Route::delete('/{tblFacturaDetalle}',                       'TblFacturaDetalleController@destroy')->name('destroy');
        });
    });
});