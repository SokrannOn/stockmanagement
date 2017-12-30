<?php
    Route::get('/','DefaultController@index');
//    ->middleware('checklog');
    Route::get('/change/password','DefaultController@changePassword')->middleware('checklog');
    Route::post('/changed/pass/success','DefaultController@changedPass')->middleware('checklog');

    Route::group(['middleware'=>['checklog','changePassword','web']],function (){
        Route::get('/home','DefaultController@index');
        Route::get('/admin','DefaultController@AdminPanel');
        Route::get('/role/view','RoleController@index');
        Route::post('/admin/create/role','RoleController@createRole');
        Route::get('/admin/delete/role/{id}','RoleController@deleteRole');
        Route::get('/admin/update/role/edit/{id}','RoleController@edit');
        Route::get('/admin/role/update/{id}','RoleController@updateRole');
        Route::patch('/admin/role/update/{id}','RoleController@updateRole');

        //Position Route
        Route::get('/admin/position/create','PositionController@createPosition');
        Route::post('/admin/position/store','PositionController@store');
        Route::get('/admin/position/delete/{id}','PositionController@deletePosition');

        Route::get('/admin/position/edit/{id}','PositionController@edit');
        Route::patch('/admin/position/update/{id}','PositionController@updatePosition');

        //user
        Route::get('/admin/user','UserController@create');
        Route::post('/admin/user/stored','UserController@stored');

        Route::get('/admin/user/edit/{id}','UserController@edit');
        Route::patch('/admin/user/update/{id}','UserController@update');
        Route::get('/admin/user/view/{id}','UserController@viewUser');
        Route::get('/admin/user/delete/{id}','UserController@delete');
        Route::get('/admin/get/user','UserController@getUserList');
        Route::get('/admin/reset/password/{id}','UserController@resetPassword');
        Route::patch('/admin/reset/user/password/{id}','UserController@resetPasswordSuccess');

        //category
        Route::resource('category','CategoryController');
        Route::get('/admin/category/delete/{id}','CategoryController@delete');
        Route::get('/admin/category/edit/{id}','CategoryController@edit');

        //productlist
        Route::get('/admin/productlist/create','ProductlistController@create');
        Route::post('/admin/productlist/store','ProductlistController@store');
        Route::get('/admin/get/productlist','ProductlistController@getTableProductlist');
        Route::get('/admin/productlist/delete/{id}','ProductlistController@delete');
        Route::get('/admin/productlist/edit/{id}','ProductlistController@editProlist');
        Route::patch('/admin/productlist/update/{id}','ProductlistController@updateProlist');

        //channel
        Route::get('/admin/channel/create','ChannelController@create');
        Route::post('/admin/channel/store','ChannelController@store');
        Route::get('/admin/channel/delete/{id}','ChannelController@delete');
        Route::get('/admin/channel/edit/{id}','ChannelController@edit');
        Route::patch('/admin/channel/update/{id}','ChannelController@update');

        //customer
        Route::get('/admin/customer/create','CustomerController@create');
        Route::post('/admin/customer/store','CustomerController@store');
        Route::get('/admin/get/customerlist','CustomerController@getTableCustomerlist');

        //Province
        Route::get('/admin/province/create/{name}','CustomerController@createProvince');
        Route::get('/admin/get/select/province','CustomerController@selectProvince');
        Route::get('/admin/getDistrict/{id}','CustomerController@getDistrict');

        //District
        Route::get('/admin/district/create/{name}/{province_id}','CustomerController@createDistrict');
        Route::get('/admin/get/select/district/{province_id}','CustomerController@selectDistrict');
        Route::get('/admin/getCommune/{id}','CustomerController@getCommune');

        //Commune
        Route::get('/admin/commune/create/{name}/{district_id}','CustomerController@createCommune');
        Route::get('/admin/get/select/commune/{district_id}','CustomerController@selectCommune');
        Route::get('/admin/getVillage/{id}','CustomerController@getVillage');

        //Commune
        Route::get('/admin/village/create/{name}/{commune_id}','CustomerController@createVillage');
        Route::get('/admin/get/select/village/{commune_id}','CustomerController@selectVillage');


    });

























Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
