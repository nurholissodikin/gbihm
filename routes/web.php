<?php

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





Auth::routes();



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('ran', function() {
    $a = md5(1);
    return $a;
});

Route::group(['prefix'=>'acl'], function(){
    Route::get('role', 'Acl\RoleController@index');
    Route::get('role/delete/{id}', 'Acl\RoleController@destroy');
    Route::post('role/store', 'Acl\RoleController@store');
    Route::get('url', 'Acl\UrlController@index');
    Route::post('url/store', 'Acl\UrlController@store');
    Route::get('url/delete/{id}', 'Acl\UrlController@destroy');
    Route::get('rule', 'Acl\RuleController@index');


});
Route::get('kirim-ulang-email/{id}','JabatanpelayananController@kirim_ulang_email');
Route::get('signin', 'SigninController@form')->name('signin.form');
Route::post('attempt', 'SigninController@attempt')->name('signin.attempt');

Route::post('/login', 'Auth\LoginController@login')->middleware('cekstatus');
Route::get('generate', 'GenerateController@index');
Route::post('generate/store', 'GenerateController@generate');
Route::get('random', 'GenerateController@randomString');
Route::get('randomnum', 'GenerateController@randomNumber');
Route::post('jabatanImport', 'JabatanController@storedata');
Route::post('ptamuImport', 'PtamuController@storedata');
Route::post('profesiImport', 'ProfesiController@import');
Route::post('ptamukhususImport', 'PtamukhususController@storedata');
Route::post('coolImport', 'CoolController@storedata');
Route::post('pengerjaImport', 'JabatanpelayananController@storedata');

Route::group(['middleware'=>['auth','cekstatus']], function(){
    Route::get('demoa', function(){
    return view('frontend.generate.pelayanan.index');
});
Route::get('demo', function(){
    return view('frontend.generate.pelayanan.index');
});
Route::get('/barcode','BarcodegeneratorController@barcode');
Route::get('/', 'HomeController@index')->name('index'); 
 Route::get('delete_user/pelayan/{id}','GenerateController@user_delete');
        Route::get('/create','CountryController@provinces');
        Route::get('/personal/detail/{idpersonal}','DetailController@detail');
        Route::get('/json-regencies','CountryController@regencies');
        Route::get('/json-districts', 'CountryController@districts');
        Route::get('/json-village', 'CountryController@villages');
        Route::get('/json-subrayon', 'CountryController@subrayon');
        Route::get('/json-cabang', 'CountryController@cabang');
        Route::resource('personal', 'PersonalController');
        Route::resource('kkj', 'KkjController');
        Route::post('/addItem', 'KkjController@store');
        Route::get('get_data/{id_personal}','KkjController@get_data');
        Route::post('personal/action','PersonalController@action');
        Route::post('personal/action/kkj','PersonalController@add_kkj');
        Route::get('personal/kkj/{no_kkj}','PersonalController@get_list_by_kkj');
        Route::get('personal/all/{no_kkj}','PersonalController@get_all_personal');
        Route::get('personal/destroy/{idpersonal}', 'PersonalController@destroy');
        Route::post('personal/pen','personalController@add_pendidikan');
        Route::get('personal/pen/{id_pen}','PersonalController@get_list_by_pendidikan');
        Route::get('personal/kom/{id_pekom}','PersonalController@get_list_by_komisi');
        Route::get('personal/jabpel/{id}','PersonalController@get_list_by_jabpel');
        Route::get('personal/brk/{id}','PersonalController@add_brk');
        Route::put('pen/edit/{idpendidikan}','PersonalController@edit_pendidikan');
        Route::get('pendidikan/delete/{idpendidikan}', 'PersonalController@delete_pen');
        Route::put('kkj/delete/{idpersonal}', 'PersonalController@delete_personal_kkj');
        Route::put('kkj/edit/{idpersonal}', 'PersonalController@edit_personal_kkj');

        Route::resource('rayon', 'RayonController');
        Route::resource('subrayon', 'SubrayonController');
        Route::resource('cabang', 'CabangController');

        Route::resource('saldo', 'SaldoController');
        Route::get('rayon/setorsaldo/{idrayon}','RayonController@get_rayon');
        Route::get('rayon/saldo/detail/{idtransaksi}','saldoController@detail_salra');
        Route::get('rayon/detail/{idrayon}','RayonController@detail_rayon');
        Route::get('rayon/personal/{idrayon}','RayonController@personal');
        Route::get('rayon/personal/edit/{idpersonal}','RayonController@edit_personal');
        Route::put('rayon/personal/upd/{idpersonal}','RayonController@upd_personal');
        Route::get('rayon/personal/detail/{idpersonal}','RayonController@detail_personal');

        Route::get('badge','SaldoController@badge');\
        Route::get('modul/pengerja/historibadge/{id}','SaldoController@detail_badge');
        Route::post('setortransaksi','SaldoController@setor_rayon');
        Route::post('saldostore','SaldoController@setor_divisi');
        Route::post('saldosub','SaldoController@setor_subrayon');
        Route::post('saldocab','SaldoController@setor_cabang');

        Route::resource('divisi', 'DivisiController');
        Route::get('divisi/setorsaldo/{iddivisi}','DivisiController@get_divisi');
        Route::get('divisi/detail/{iddivisi}','DivisiController@detail_divisi');
        Route::get('divisi/saldo/detail/{idtransaksi}','SaldoController@detail_saldiv');

        Route::get('subrayon/setorsaldo/{idsubrayon}','SubrayonController@get_subrayon');
        Route::get('subrayon/detail/{idsubrayon}','SubrayonController@detail_subrayon');
        Route::get('subrayon/saldo/detail/{idtransaksi}','SaldoController@detail_salsub');
        Route::get('subrayon/personal/{idsubrayon}','SubrayonController@personal');
        Route::get('subrayon/personal/edit/{idpersonal}','SubrayonController@edit_personal');
        Route::put('subrayon/personal/upd/{idpersonal}','SubrayonController@upd_personal');
        Route::get('subrayon/personal/detail/{idpersonal}','SubrayonController@detail_personal');
        Route::get('subrayon/kegiatan/{id}','SubrayonController@kegiatan');


        Route::resource('cabang', 'CabangController');
        Route::get('cabang/kebaktian/{idcabangranting}','KebaktianController@kebaktian');
        Route::post('kirimkebaktian','KebaktianController@create_kebaktian');
        Route::get('cabang/detail/{idcabangranting}','CabangController@detail_cabang');
        Route::get('cabang/saldo/{idcabangranting}','CabangController@cabang_saldo');
        Route::get('cabang/saldo/tambah/{idcabangranting}','CabangController@add_saldo');
        Route::get('cabang/saldo/detail/{idtransaksi}','SaldoController@detail_salcab');
        Route::get('cabang/kebaktian/detail/{idkebaktian}','KebaktianController@detail_kebaktian');
        Route::get('cabang/personal/{idcabangranting}','CabangController@personal');
        Route::get('cabang/personal/edit/{idpersonal}','CabangController@edit_personal');
        Route::put('cabang/personal/upd/{idpersonal}','CabangController@upd_personal');
        Route::get('cabang/personal/detail/{idpersonal}','CabangController@detail_personal');

        Route::get('cabang/kegiatan/{id}','CabangController@kegiatan');

        Route::resource('kebaktian', 'KebaktianController');
        Route::get('cabang/kebaktian/tambah/{idcabangranting}','CabangController@get_cabang');
        Route::get('cabang/kebaktian/edit/{idkebaktian}','CabangController@get_kebaktian');
        Route::post('tambahkebaktian','KebaktianController@add_kebaktian');
        Route::put('editkebaktian/{idkebaktian}','KebaktianController@edit_kebaktian');

        Route::resource('keanggotaan', 'KeanggotaanController');
        Route::get('keanggotaan/create/{idpersonal}','KeanggotaanController@create');
        Route::get('keanggotaan/mutasi/{idpersonal}','KeanggotaanController@mutasi');

        Route::resource('diserahkan', 'DiserahkanController');
        Route::get('personal/dipen/{id_dipen}','PersonalController@get_list_by_diserahkan');
        Route::post('diserahkan/update/{id_diserahkan}','DiserahkanController@update');
        Route::get('diserahkan/delete/{id_diserahkan}','DiserahkanController@destroy');
        Route::get('diserahkan/get/{id_diserahkan}','DiserahkanController@edit');

        Route::get('anak/get/{id}','AnakController@edit');
        Route::get('anak/delete/{id}','AnakController@destroy');
        Route::post('anak/update/{id}','AnakController@update');
        Route::get('nikah/get/{id}','NikahController@edit');
        Route::post('nikah/update/{id}','NikahController@update');
        Route::get('nikah/delete/{id}','NikahController@destroy');
        Route::get('baptisan/get/{id}','BaptisanairController@edit');
        Route::get('baptisan/delete/{id}','BaptisanairController@destroy');
        Route::post('baptisan/update/{id}','BaptisanairController@update');

        Route::resource('baptisan', 'BaptisanairController');
        Route::get('baptisan/allpersonal/{idpersonal}','PersonalController@get_all_personal_batpisan');
        Route::get('get_data_baper/{id_personal}','BaptisanairController@get_data_baper');
        Route::get('get_data_niper/{id_personal}','BaptisanairController@get_data_baper');
        Route::get('get_data_anakper/{id_personal}','AnakController@get_data_baper');

        Route::resource('nikah', 'NikahController');
        Route::resource('anak', 'AnakController');

        Route::get('komisi/mutasi/{idpersonal}','RohaniController@mutasi');
        
        Route::post('autocomplete-ajax', 'RohaniController@ajaxData')->name('autocomplete.ajax');
        Route::get('/modul/kom', function () { 
            return view('/frontend/modul/kom/index'); 
        });
      
        Route::get('daftarsendiri','PertemuanController@dirisendiri');

        Route::get('pertemuan/absensi/{id}','PertemuanController@absensi_p');
        Route::get('pertemuan/absensi','PertemuanController@index_a');
        Route::get('pertemuan/absensi/detail/cool/{id}','PertemuanController@absensi_detail_cool');
        Route::get('pertemuan/absensi/detail/tamu/{id}','PertemuanController@absensi_detail_tamu');
        Route::get('pertemuan/absensi/detail/pengerja/{id}','PertemuanController@absensi_detail_pengerja');
        Route::post('absensi/pertemuan/','PertemuanController@absensi_store');
        Route::get('absensipertemuan/get/{id}','PertemuanController@get_absensi');
        Route::post('absensipertemuan/update/{id}','PertemuanController@absensi_update');

        Route::get('pertemuan/absensi/detail/{id}','PertemuanController@get_absensi_detail');

        Route::get('mdpj/badge/','SaldoController@mdpj');
        Route::get('mdpj/adbadge/','SaldoController@tambah_mdpj');
        Route::resource('komisi','KomisiController');
        Route::get('komisi/delete/{id}', 'KomisiController@destroy');
        Route::put('komisi/update/{idkebaktian}','KomisiController@update');
        Route::post('komisi/store', 'KomisiController@storea')->name('komisi.storea');

        Route::resource('pelayanan', 'PelayananController');
        Route::get('pelayanan/create/{id}', 'PelayananController@create');
        Route::get('pelayanan/edit/{id}', 'PelayananController@edit');
        Route::resource('jabatanpelayanan', 'JabatanpelayananController');
        Route::get('jabpel/get/{id}','JabatanpelayananController@edit');
        Route::post('jabpel/update/{id}','JabatanpelayananController@update');
        Route::get('jabpel/delete/{id}','JabatanpelayananController@destroy');
        Route::post('jabpel/renew/','JabatanpelayananController@renew');
        Route::post('jabpel/badge/','JabatanpelayananController@badge');

        Route::resource('kegiatan','KegiatanController');
        Route::get('modul/kegiatan/calender','KegiatanController@kalender');
        Route::get('modul/kegiatan/create','KegiatanController@create');
        Route::get('kegiatan/kehadiran/{id}','KegiatanController@kehadiran');
        Route::get('kegiatan/pelayan/{id}','KegiatanController@pelayan');
        Route::get('kegiatan/detail/pelayan/{id}','KegiatanController@pelayandetail');
        Route::get('kegiatan/detail/peserta/{id}','KegiatanController@pesertadetail');
        Route::get('modul/kegiatan/pelayan/create/{id}','KegiatanController@pelayancreate');
        Route::get('kegiatan/peserta/{id}','KegiatanController@peserta');
        Route::get('modul/kegiatan/peserta/create/{id}','KegiatanController@pesertacreate');
        Route::get('kegiatan/get/{id}','KegiatanController@get_data_jabpel');
        Route::get('kegiatan/get/kegiatan/{id}','KegiatanController@get_kegiatan');

        Route::get('personal/kegiatan/pelayan/detail/{id}','KegiatanController@pelayandetailpersonal');
        Route::get('personal/kegiatan/pelayan/edit/{id}','KegiatanController@pelayaneditpersonal');
        Route::get('personal/kegiatan/pelayan/create/{id}','KegiatanController@pelayancreatepersonal');
        Route::post('addpelayan/kegiatan', 'PelayankegiatanController@add_personal_kegiatan');


        // Master data
        Route::resource('profesi','ProfesiController');
        Route::get('profesi/delete/{id}','ProfesiController@destrPoy');
        Route::resource('bidangpekerjaan','BidangpekerjaanController');
        Route::get('bidangpekerjaan/delete/{id}','BidangpekerjaanController@destroy');
        Route::resource('jenispekerjaan','JenispekerjaanController');
        Route::get('jenispekerjaan/delete/{id}','JenispekerjaanController@destroy');
        Route::resource('jabatananggotacool','JabatananggotaController');
        Route::get('jabatananggotacool/delete/{id}','JabatananggotaController@destroy');
        Route::resource('jabatangembalacool','JabatangembalaController');
        Route::get('jabatangembalacool/delete/{id}','JabatangembalaController@destroy');
        Route::resource('komseri','KomseriController');
        Route::get('komseri/delete/{id}','KomseriController@destroy');

        Route::resource('materi','MateriController');
        Route::get('materi/delete/{id}','MateriController@destroy');
        Route::get('materi/pengajar/{id}','MateriController@guru');
        Route::post('materipengajar/store','MateriController@guru_store');
        Route::get('materipengajar/delete/{id}','MateriController@guru_destroy');
        Route::get('materi/pengajar/edit/{id}','MateriController@guru_edit');
        Route::put('materipengajar/update/{id}','MateriController@guru_update');

        Route::resource('kkmta','KkmtaController');
        Route::get('kkmta/delete/{id}','KkmtaController@destroy');

        Route::resource('kelaskom' , 'KelaskomController');
        Route::get('kelaskom/delete/{id}','KelaskomController@destroy');
        Route::get('kelaskom/murid/{id}','KelaskomController@murid');
        Route::get('kelaskom/tambah/murid/{id}','KelaskomController@add_murid');
        Route::post('kelasmurid/store', 'KelaskomController@store_murid');
        Route::get('kelaskom/edit/murid/{id}','KelaskomController@edit_murid');
        Route::put('kelaskommurid/update/{id}', 'KelaskomController@update_murid');
        Route::get('kelaskom/detail/{id}','KelaskomController@detail');
        Route::get('komkehadiran/detail/{id}','KomkehadiranController@detail');
        Route::get('komkehadiran/absensi/{id}','KomkehadiranController@absensi');


        Route::resource('murid','MuridController');
        Route::get('murid/delete/{id}','MuridController@destroy');
        Route::resource('guru','GuruController');
        Route::get('guru/delete/{id}','GuruController@destroy');
        Route::get('guru/materi/{id}','GuruController@add_materi');
        Route::post('gurumateri/store','GuruController@store_materi');
        Route::resource('komkehadiran','KomkehadiranController');
        Route::get('komkehadiran/delete/{id}','KomkehadiranController@destroy');
        Route::resource('komujian','KomujianController');
        Route::get('komujian/delete/{id}','KomujianController@destroy');
        Route::resource('komlkp','KomlkpController');
        Route::get('komlkp/delete/{id}','KomlkpController@destroy');
        Route::get('komlkp/detail/{id}','KomlkpController@detail');
        Route::get('komlkp/absensi/{id}','KomlkpController@absensi');
        Route::resource('magang','KommagangController');
        Route::get('magang/delete/{id}','KommagangController@destroy');
        Route::resource('tugas','KomtugasController');
        Route::get('tugas/delete/{id}','KomtugasController@destroy');
        
        Route::resource('kegiatanpelayan','PelayankegiatanController');
        Route::get('kegiatanpelayan/delete/{id}','PelayankegiatanController@destroy');
        Route::resource('kegiatanpeserta','PesertakegiatanController');
        Route::get('tipecool/delete/{id}','TipecoolController@destroy');
        Route::resource('tipecool','TipecoolController');
        Route::get('jabatan/delete/{id}','JabatanController@destroy');
        Route::resource('jabatan','JabatanController');
        Route::get('pertemuan/delete/{id}','PertemuanController@destroy');
        Route::get('pertemuan/tambah/{id}','PertemuanController@tambah');
        Route::resource('pertemuan','PertemuanController');


        Route::post('coolpengerja/store','CoolController@cool_pengerja_store');
        Route::post('mdpjpengerja/store','JabatanpelayananController@mdpj_pengerja_store');


        Route::get('cool/delete/{id}','CoolController@destroy');
        Route::resource('cool','CoolController');
        Route::get('cool/anggota/{id}','CoolController@anggota');
        Route::post('anggota/store','CoolController@anggota_post');
        Route::get('anggota/delete/{id}','CoolController@anggota_delete');
        Route::get('cool/anggota/edit/{id}','CoolController@anggota_edit');
        Route::get('cool/anggota/detail/{id}','CoolController@anggota_detail');
        Route::put('anggota/update/{id}','CoolController@anggota_update');
        Route::get('cool/absensi/{id}','CoolController@absensi');
        Route::get('cool/absensi/edit/{id}','CoolController@absensi_edit');
        Route::post('absensi/store','CoolController@absensi_post');
        Route::put('absensi/update/{id}','CoolController@absensi_update');
        Route::get('absensi/delete/{id}','CoolController@absensi_delete');
        Route::get('cool/absensi/detail/{id}','CoolController@absensi_detail');
        Route::get('cool/histori/all','CoolController@data_history');
         Route::get('cool/histori/{id}','CoolController@histori');
        Route::get('cool/data/absensi','CoolController@data_absensi');
        Route::get('get/cool/{id}','CoolController@get_cool');
        Route::get('cool/data/absensi/edit/{id}','CoolController@data_absensi_edit');
        Route::put('data/absensi/update/{id}','CoolController@data_absensi_update');


        
        Route::post('ibadahraya/store','IbadahrayaController@store');
       
        Route::get('modul/pengerja','JabatanpelayananController@pengerja');
        Route::get('modul/pengerja/edit/{id}','JabatanpelayananController@edit_pengerja');
        Route::get('modul/pengerja/detail/{id}','JabatanpelayananController@detail_pengerja');   
        Route::put('pengerja/update/{id}','JabatanpelayananController@update_pengerja');

        Route::get('mdpj/pengerja/edit/{id}','JabatanpelayananController@mdpj_edit_pengerja');
        Route::get('mdpj/pengerja/detail/{id}','JabatanpelayananController@mdpj_detail_pengerja');
        Route::get('mdpj/cool/detail/{id}','JabatanpelayananController@mdpj_detail_cool'); 
        Route::put('mdpjpengerja/update/{id}','JabatanpelayananController@mdpj_update_pengerja');
        Route::post('mdpj/cetak/{id}','JabatanpelayananController@mdpj_cetak_pengerja');

        Route::get('mdpj/cetak_badge','MdpjController@badge');
        Route::get('mdpj/cetak_badge/cetak/{id}','MdpjController@badge_cetak');
        Route::get('mdpj/cetak_badge/detail/{id}','MdpjController@badge_detail');
        Route::get('mdpj/cetak_badge/order/{id}','MdpjController@badge_order');
        Route::get('mdpj/approve_gembala_cabang','MdpjController@index_gembalacabang');
         Route::get('mdpj/approve_pusat','MdpjController@index_pusat');
        Route::get('mdpj/approve_admin_rayon','MdpjController@index_adminrayon');
        Route::get('mdpj/approve_gembala_rayon','MdpjController@index_gembalarayon');
        Route::put('kirim/pusat/{id}','MdpjController@kirim_pusat');
        Route::get('pengerja/kirim_gembalacabang/{id}','JabatanpelayananController@kirim_mdpj_approve');
         Route::post('pengerja_approve/kirim_gembalacabang/all','MdpjController@kirim_mdpj_approve_all');
         Route::get('pengerja_approve/pusat/{id}','MdpjController@pusat');
        Route::get('pengerja/approve/{id}','JabatanpelayananController@mdpj_approve');
        Route::get('pengerja_approve/gembalacabang/{id}','MdpjController@pengerja_approve_gembalacabang');
        Route::get('pengerja/kirim_adminrayon/{id}','MdpjController@kirim_adminrayon');
        Route::get('pengerja_approve/gembalarayon/{id}','MdpjController@approve_gembala_rayon');
        Route::get('pengerja_approve/adminrayon/{id}','MdpjController@pengerja_approve_admin_rayon');
        Route::post('pengerja_approve/adminrayon/all','MdpjController@kirim_adminrayon_all');
        Route::post('pengerja_approve/gembalarayon/all','MdpjController@kirim_gembalarayon_all');
        Route::get('pengerja/kirim_gembalarayon/{id}','MdpjController@kirim_gembalarayon');
        Route::get('tamukhusus/approve/{id}','PtamukhususController@mdpj_approve');
 
        Route::post('tamukhusus/store','PtamukhususController@store');
        Route::post('tamukhusus/store_cetak','PtamukhususController@store_cetak');
        Route::get('tamukhusus/destroy/{id}','PtamukhususController@destroy');
        Route::put('tamukhusus/update/{id}','PtamukhususController@update');
        Route::get('modul/pengkhotbah/tamukhusus/detail/{id}','PtamukhususController@tamukhusus_detail');

        Route::get('modul/pengkhotbah/tamu/detail/{id}','PtamuController@tamu_detail'); 
        Route::post('tamu/store','PtamuController@store');
        Route::get('tamu/destroy/{id}','PtamuController@destroy');
        Route::put('tamu/update/{id}','PtamuController@update');
        Route::resource('modul/pengkhotbah/tamu','PtamuController');
        Route::resource('modul/pengkhotbah/tamukhusus','PtamukhususController');


        Route::resource('modul/ibadahraya','IbadahrayaController');
        Route::get('modul/ibadahraya/kalender','IbadahrayaController@kalender');
        Route::get('modul/ibadahraya/pelayan/{id}','IbadahrayaController@ibadahraya_pelayan');
        Route::get('modul/ibadahraya/pelayan/create/{id}','IbadahrayaController@ibadahraya_pelayancreate');
        Route::get('modul/ibadahraya/pelayan/detail/{id}','IbadahrayaController@ibadahraya_pelayandetail');
        Route::post('ibadahrayapelayan/store','IbadahrayaController@ibadahraya_pelayan_store');
        Route::get('ibadahrayapelayan/delete/{id}','IbadahrayaController@ibadahraya_pelayan_delete');
        Route::put('ibadahraya/update/{id}','IbadahrayaController@update');
        Route::put('ibadahrayapelayan/update/{id}','IbadahrayaController@ibadahraya_pelayan_update');
        Route::get('modul/ibadahraya/kehadiran/{id}','IbadahrayaController@ibadahraya_kehadiran');
        Route::get('kegiatan/kehadiran/{id}','KegiatanController@kehadiran');
        Route::put('kehadirankegiatan/update/{id}','KegiatanController@kehadiran_update');
        Route::put('kehadiranibadah/update/{id}','IbadahrayaController@kehadiran_update');
        Route::put('kegiatan/pelayan/update/{id}','KegiatanController@pelayan_detail_update');

        Route::get('/modul/bp2n', function () { 
            return view('/frontend/modul/bp2n/index'); 
        });
        Route::resource('bp2nmateri','BpnmateriController');
        Route::get('bp2nmateri/delete/{id}','BpnmateriController@destroy');
        Route::resource('bp2ncalonguru','BpncalonguruController');
        Route::get('bp2ncalonguru/delete/{id}','BpncalonguruController@destroy');
        Route::resource('bp2nguru','BpnguruController');
        Route::get('bp2nguru/delete/{id}','BpnguruController@destroy');
        Route::resource('bp2npeserta','BpnpesertaController');
        Route::resource('bp2nkonseling','BpnkonselingController');
        Route::get('bp2npeserta/delete/{id}','BpnpesertaController@destroy');
        Route::get('get/peserta/{id}','BpnpesertaController@get_peserta');
        Route::post('bp2npeserta/konseling/store','BpnkonselingController@konseling_store');
        Route::get('bp2npeserta/konseling/{id}','BpnpesertaController@get_konseling');
        Route::get('bp2npeserta/konseling/create/{id}','BpnpesertaController@get_konseling_create');
        Route::get('bp2npeserta/konseling/edit/{id}','BpnpesertaController@get_konseling_edit');
        Route::get('bp2npeserta/konseling/detail/{id}','BpnpesertaController@get_konseling_detail');
        Route::put('bp2npeserta/konseling/update/{id}','BpnkonselingController@konseling_update');
        Route::resource('bp2nkehadiran','BpnkehadiranController');
        Route::get('bp2n/kehadiran/pasca','BpnkehadiranController@pasca');
        Route::get('bp2n/kehadiran/pra','BpnkehadiranController@pra');
        Route::get('bp2npeserta/kehadiran/{id}','BpnpesertaController@get_kehadiran');
        Route::get('bp2npeserta/kehadiran/create/{id}','BpnpesertaController@get_kehadiran_create');
        Route::get('bp2npeserta/kehadiran/edit/{id}','BpnpesertaController@get_kehadiran_edit');
        Route::get('bp2npeserta/kehadiran/detail/{id}','BpnpesertaController@get_kehadiran_detail');
        Route::get('bp2npeserta/get_peserta/{id}','BpnkehadiranController@get_peserta');
        Route::post('bp2npeserta/kehadiran/store','BpnkehadiranController@kehadiran_store');
        Route::put('bp2npeserta/kehadiran/update/{id}','BpnkehadiranController@kehadiran_update');
        Route::get('modul/pelayanjemaat/baptisan','BaptisanairController@baptisan');
        Route::get('modul/pelayanjemaat/baptisan/caper','BaptisanairController@baptisan_caper');
        Route::get('modul/pelayanjemaat/baptisan/tambahakta','BaptisanairController@baptisan_create');
        Route::get('bap_personal/get/{id}','BaptisanairController@get_data_baper');
        Route::get('modul/pelayanjemaat/baptisan/pendaftaran','BaptisanairController@baptisan_pendaftaran');
        Route::resource('dokumenbaptisan','BaptisandokumenController');
        Route::get('dokumenbaptisan/delete/{id}','BaptisandokumenController@destroy');
        Route::post('tambahakta/store','BaptisanairController@baptisan_store');
        Route::post('baptisan/caper_store','BaptisanairController@baptisan_caper_store');
        Route::get('modul/pelayanjemaat/baptisan/calon/edit/{id}','BaptisanairController@baptisan_caper_edit');
        Route::put('caper/update/{id}','BaptisanairController@caper_update');
        Route::get('modul/pelayanjemaat/baptisan/calon/detail/{id}','BaptisanairController@baptisan_caper_detail');
        Route::get('modul/pelayanjemaat/baptisan/tambahakta/edit/{id}','BaptisanairController@akta_edit');
        Route::get('modul/pelayanjemaat/baptisan/tambahakta/detail/{id}','BaptisanairController@akta_detail');
        Route::put('baptisan/akta_update/{id}','BaptisanairController@akta_update');
        
        Route::resource('dokumenanak','AnakdokumenController');
        Route::get('dokumenanak/delete/{id}','AnakdokumenController@destroy');
        Route::get('modul/pelayanjemaat/penyerahananak','AnakController@anak');
        Route::get('modul/pelayanjemaat/penyerahananak/caper','AnakController@anak_caper');
        Route::get('modul/pelayanjemaat/penyerahananak/pendaftaran','AnakController@anak_pendaftaran');
        Route::get('modul/pelayanjemaat/penyerahananak/tambahakta','AnakController@anak_akta');
        Route::post('anak/caper_store','AnakController@anak_caper_store');
        Route::post('anak/akta_store','AnakController@akta_store');
        Route::get('modul/pelayanjemaat/penyerahananak/pendaftaran/edit/{id}','AnakController@anak_pendaftaran_edit');
        Route::get('modul/pelayanjemaat/penyerahananak/pendaftaran/detail/{id}','AnakController@anak_pendaftaran_detail');
        Route::put('anak/caper_update/{id}','AnakController@anak_caper_update');
        Route::put('anak/akta_update/{id}','AnakController@akta_update');

        Route::resource('dokumenpernikahan','NikahdokumenController');
        Route::get('dokumenpernikahan/delete/{id}','NikahdokumenController@destroy');
        Route::get('modul/pelayanjemaat/pernikahan','NikahController@pernikahan');
        Route::get('modul/pelayanjemaat/pernikahan/caper','NikahController@pernikahan_caper');
        Route::get('modul/pelayanjemaat/pernikahan/pendaftaran','NikahController@pernikahan_pendaftaran');
        Route::get('modul/pelayanjemaat/pernikahan/pendaftaran/edit/{id}','NikahController@pernikahan_pendaftaran_edit');
        Route::get('modul/pelayanjemaat/pernikahan/tambahakta','NikahController@pernikahan_akta');
        Route::get('modul/pelayanjemaat/pernikahan/pendaftaran/detail/{id}','NikahController@pernikahan_pendaftaran_detail');
        Route::post('pernikahan/caper_store','NikahController@caper_store');
        Route::post('pernikahan/akta_store','NikahController@akta_store');
        Route::put('pernikahan/caper_update/{id}','NikahController@caper_update');
        Route::put('pernikahan/akta_update/{id}','NikahController@akta_update');
        Route::get('modul/pelayanjemaat/pernikahan/tambahakta/detail/{id}','NikahController@akta_detail');
        Route::get('modul/pelayanjemaat/pernikahan/tambahakta/edit/{id}','NikahController@akta_edit');

        Route::resource('dokumenpeneguhan','PeneguhandokumenController');
        Route::post('peneguhan/caper_store','PeneguhanController@caper_store');
        Route::post('peneguhan/akta_store','PeneguhanController@akta_store');
        Route::get('dokumenpeneguhan/delete/{id}','PeneguhandokumenController@destroy');
        Route::get('modul/pelayanjemaat/peneguhan','PeneguhanController@peneguhan');
        Route::get('modul/pelayanjemaat/peneguhan/caper','PeneguhanController@peneguhan_caper');
        Route::get('modul/pelayanjemaat/peneguhan/pendaftaran','PeneguhanController@peneguhan_pendaftaran');
        Route::get('modul/pelayanjemaat/peneguhan/tambahakta','PeneguhanController@peneguhan_akta');
        Route::get('modul/pelayanjemaat/peneguhan/pendaftaran/edit/{id}','PeneguhanController@peneguhan_pendaftaran_edit');
        Route::get('modul/pelayanjemaat/peneguhan/pendaftaran/detail/{id}','PeneguhanController@peneguhan_pendaftaran_detail');
        Route::get('modul/pelayanjemaat/peneguhan/tambahakta/detail/{id}','PeneguhanController@akta_detail');
        Route::get('modul/pelayanjemaat/peneguhan/tambahakta/edit/{id}','PeneguhanController@akta_edit');
        Route::put('peneguhan/caper_update/{id}','PeneguhanController@caper_update');
        Route::put('peneguhan/akta_update/{id}','PeneguhanController@akta_update');

        // MDPDJ
        Route::get('/email/terkirim', function () { 
            return view('/frontend/mails/lanjutan'); 
        });
        Route::post('mdpj/tamukhusus/store','PtamukhususController@mdpj_store');
        Route::post('verifikasi/pelayan', 'GenerateController@pelayan_verif'); 
        Route::get('verif/tamu', 'PtamukhususController@mdpj_verif')->name('verifikasi.email'); 
        
        Route::get('verif/pengerjacool', 'JabatanpelayananController@mdpj_verif')->name('verifikasi.cool'); 
        // Setting
        Route::resource('menu','MenuController');
        Route::get('menu/delete/{id}','MenuController@destroy');
        Route::resource('menulist','MenulistController');
        Route::get('menulist/delete/{id}','MenulistController@destroy');

        Route::put('acl/rule/update/{id}','Acl\RuleController@update');

        
        
  
        Route::get('pengerja/{id}','MdpjController@pengerja');

        Route::put('pengerja/person/update/{id}','JabatanpelayananController@person_upd');
        Route::put('pengerja/cool/update/{id}','CoolController@cool_pengerja_upd');

       
  });
        Route::post('change/pw','Auth\ChangePasswordController@resetPassword');
        Route::get('verif/pengerja', 'JabatanpelayananController@mdpj_verif')->name('verifikasi.pengerja'); 