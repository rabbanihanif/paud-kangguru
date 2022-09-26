<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// landing page 
$routes->get('/', 'Home::index', ['as' => 'homepage']);
$routes->get('/kegiatan', 'Home::kegiatan', ['as' => 'kegiatan']);
$routes->get('/kegiatan/(:num)/detail', 'Home::kegiatanDetail/$1', ['as' => 'kegiatan.detail']);
$routes->get('/tentang-sekolah', 'Home::tentang');
$routes->get('/info-pendaftaran', 'Home::info');
$routes->get('/program-sekolah', 'Home::programsekolah');
// end landing page 

// Auth
$routes->get('/login', 'Auth\LoginController::index', ['as' => 'login']);
$routes->post('/login', 'Auth\LoginController::auth', ['as' => 'login-auth']);
$routes->get('/register', 'Auth\RegisterController::index', ['as' => 'register']);
$routes->post('/register', 'Auth\RegisterController::auth', ['as' => 'register-auth']);
$routes->get('/logout', 'Auth\LoginController::logout', ['as' => 'logout']);

// Dashboard
$routes->get('/home', 'DashboardController::home', ['filter' => 'auth', 'as' => 'home']);
$routes->get('/(:any)/cetak', 'PrintController::view', ['as' => 'cetak']);

// Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
  // Berita
  $routes->group('berita', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\BeritaController::index', ['as' => 'berita.index']);
    $routes->get('create', 'Admin\BeritaController::create', ['as' => 'berita.create']);
    $routes->post('/', 'Admin\BeritaController::store', ['as' => 'berita.store']);
    $routes->get('(:num)/edit', 'Admin\BeritaController::edit/$1', ['as' => 'berita.edit']);
    $routes->put('(:num)', 'Admin\BeritaController::update/$1', ['as' => 'berita.update']);
    $routes->delete('/', 'Admin\BeritaController::destroy', ['as' => 'berita.destroy']);
  });
  // End of Berita

  // kegiatan 
  // $routes->group('kegiatan', ['filter' => 'admin'], function ($routes) {
  //   $routes->get('/', 'Admin\KegiatanController::index', ['as' => 'berita.index']);
  //   $routes->get('create', 'Admin\KegiatanController::create', ['as' => 'berita.create']);
  //   $routes->post('/', 'Admin\KegiatanController::store', ['as' => 'berita.store']);
  //   $routes->get('(:num)/edit', 'Admin\KegiatanController::edit/$1', ['as' => 'berita.edit']);
  //   $routes->put('(:num)', 'Admin\KegiatanController::update/$1', ['as' => 'berita.update']);
  //   $routes->delete('/', 'Admin\KegiatanController::destroy', ['as' => 'berita.destroy']);
  // });
  // end of kegiatan 

  // Admin
  $routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index', ['as' => 'admin.index']);
    $routes->get('create', 'Admin\AdminController::create', ['as' => 'admin.create']);
    $routes->post('/', 'Admin\AdminController::store', ['as' => 'admin.store']);
    $routes->get('(:num)/edit', 'Admin\AdminController::edit/$1', ['as' => 'admin.edit']);
    $routes->put('(:num)', 'Admin\AdminController::update/$1', ['as' => 'admin.update']);
    $routes->delete('/', 'Admin\AdminController::destroy', ['as' => 'admin.destroy']);
  });
  // End of Admin

  // TA
  $routes->group('ta', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\TaController::index', ['as' => 'ta.index']);
    $routes->get('create', 'Admin\TaController::create', ['as' => 'ta.create']);
    $routes->post('/', 'Admin\TaController::insert', ['as' => 'ta.insert']);

    $routes->get('(:num)/aktif', 'Admin\TaController::aktif/$1', ['as' => 'ta.aktif']);
    $routes->get('(:num)/nonaktif', 'Admin\TaController::nonaktif/$1', ['as' => 'ta.nonaktif']);
    $routes->delete('/', 'Admin\TaController::destroy', ['as' => 'ta.destroy']);
  });
  // End of TA

  // Murid
  $routes->group('murid', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\MuridController::index', ['as' => 'murid.index']);
    $routes->get('pg', 'Admin\MuridController::listpg', ['as' => 'murid.listpg']);
    $routes->get('tka', 'Admin\MuridController::listtka', ['as' => 'murid.listtka']);
    $routes->get('tkb', 'Admin\MuridController::listtkb', ['as' => 'murid.listtkb']);
    $routes->get('create', 'Admin\MuridController::create', ['as' => 'murid.create']);
    $routes->post('/', 'Admin\MuridController::store', ['as' => 'murid.store']);
    $routes->get('(:num)/edit', 'Admin\MuridController::edit/$1', ['as' => 'murid.edit']);
    $routes->get('(:num)/view', 'Admin\MuridController::view/$1', ['as' => 'murid.view']);
    $routes->put('(:num)', 'Admin\MuridController::update/$1', ['as' => 'murid.update']);
    $routes->delete('/', 'Admin\MuridController::destroy', ['as' => 'murid.destroy']);
  });
  // End of Murid

  // playgroup
  $routes->group('playgroup', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\MuridController::index', ['as' => 'playgroup.index']);
    // $routes->get('create', 'Admin\MuridController::create', ['as' => 'murid.create']);
    // $routes->post('/', 'Admin\MuridController::store', ['as' => 'murid.store']);
    // $routes->get('(:num)/edit', 'Admin\MuridController::edit/$1', ['as' => 'murid.edit']);
    // $routes->get('(:num)/view', 'Admin\MuridController::view/$1', ['as' => 'murid.view']);
    // $routes->put('(:num)', 'Admin\MuridController::update/$1', ['as' => 'murid.update']);
    // $routes->delete('/', 'Admin\MuridController::destroy', ['as' => 'murid.destroy']);
  });
  // End of playgroup

  // Berkas
  $routes->group('dokumen', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\BerkasController::index', ['as' => 'dokumen.index']);
    $routes->get('create', 'Admin\BerkasController::create', ['as' => 'dokumen.create']);
    $routes->post('/', 'Admin\BerkasController::store', ['as' => 'dokumen.store']);
    $routes->get('(:num)/edit', 'Admin\BerkasController::edit/$1', ['as' => 'dokumen.edit']);
    $routes->put('(:num)', 'Admin\BerkasController::update/$1', ['as' => 'dokumen.update']);
    $routes->delete('/', 'Admin\BerkasController::destroy', ['as' => 'dokumen.destroy']);
  });
  // End of Berkas

  // Pembayaran
  $routes->group('pembayaran', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\PembayaranController::index', ['as' => 'pembayaran.index']);
    $routes->get('(:num)/terima', 'Admin\PembayaranController::terima/$1', ['as' => 'pembayaran.terima']);
    $routes->get('(:num)/tolak', 'Admin\PembayaranController::tolak/$1', ['as' => 'pembayaran.tolak']);
  });
  // End of Pembayaran

  // Pendaftar
  $routes->group('pendaftar', ['filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Admin\PendaftarController::index', ['as' => 'pendaftar.index']);
    $routes->get('(:num)/view', 'Admin\PendaftarController::view/$1', ['as' => 'pendaftar.view']);
    $routes->get('(:num)/print', 'Admin\PendaftarController::print/$1', ['as' => 'pendaftar.print']);
    $routes->get('(:num)/choose', 'Admin\PendaftarController::choose/$1', ['as' => 'pendaftar.choose']);
    $routes->get('printall', 'Admin\PendaftarController::printall', ['as' => 'pendaftar.printall']);
    $routes->get('excel', 'Admin\PendaftarController::excel', ['as' => 'pendaftar.excel']);
    // $routes->delete('/', 'Admin\PendaftarController::destroy', ['as' => 'pendaftar.destroy']);
    // $routes->get('print', 'Admin\PendaftarController::print', ['as' => 'pendaftar.print']);
  });
  // End of Pendaftar
});
// End of Admin


// Ortu


$routes->get('(:num)/print', 'DashboardController::print/$1', ['as' => 'cetakbukti']);

$routes->get('formulir-pendaftaran', 'Ortu\DataDiriMuridController::index', ['as' => 'form.murid', 'filter' => 'ortu']);
$routes->put('formulir-pendaftaran', 'Ortu\DataDiriMuridController::store', ['as' => 'form.murid.store', 'filter' => 'ortu']);

$routes->group('formulir-pendaftaran', ['filter' => 'auth'], function ($routes) {
  // $routes->get('data-diri-murid', 'Ortu\DataDiriMuridController::index', ['as' => 'form.murid', 'filter' => 'ortu']);
  // $routes->put('data-diri-murid', 'Ortu\DataDiriMuridController::store', ['as' => 'form.murid.store', 'filter' => 'ortu']);
  // $routes->get('data-orang-tua', 'Ortu\DataOrangTuaMuridController::index', ['as' => 'form.ortu', 'filter' => 'ortu']);
  // $routes->put('data-orang-tua', 'Ortu\DataOrangTuaMuridController::store', ['as' => 'form.ortu.store', 'filter' => 'ortu']);
  // $routes->get('berkas-murid', 'Ortu\BerkasMuridController::index', ['as' => 'form.dokumen', 'filter' => 'ortu']);
  // $routes->put('berkas-murid', 'Ortu\BerkasMuridController::store', ['as' => 'form.dokumen.store', 'filter' => 'ortu']);
});

$routes->get('upload-berkas', 'Ortu\BerkasMuridController::index', ['as' => 'form.dokumen', 'filter' => 'ortu']);
$routes->put('upload-berkas', 'Ortu\BerkasMuridController::store', ['as' => 'form.dokumen.store', 'filter' => 'ortu']);
// End of Ortu

// Pembayaran
$routes->group('bukti-pembayaran', ['filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Ortu\PembayaranController::index', ['as' => 'form.pembayaran', 'filter' => 'ortu']);
  $routes->put('/', 'Ortu\PembayaranController::store', ['as' => 'form.pembayaran.store', 'filter' => 'ortu']);
});
// End of Pembayaran

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
