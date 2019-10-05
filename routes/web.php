<?php

Auth::routes(['verify' => true]);
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

Route::view('dlaczego-mam-sie-rejestrowac', 'auth.register_info')->name('register.info')->middleware('guest');
Route::view('panel-administratora', 'admin.index')->name('admin.index')->middleware('admin');

Route::middleware(["verified"])->group(function(){
    Route::namespace("Admin")->group(function(){
        Route::get('dodaj-skladnik', 'IngredientsController@create')->name('ingredient.create');
        Route::post('dodaj-skladnik', 'IngredientsController@store')->name('ingredient.store');
        Route::get('edytuj-skladnik/{ingredient}', 'IngredientsController@edit')->name('ingredient.edit');
        Route::post('edytuj-skladnik/{ingredient}', 'IngredientsController@update')->name('ingredient.update');
        Route::delete('usun-skladnik/{ingredient}', 'IngredientsController@delete')->name('ingredient.destroy');
        Route::get('lista-skladnikow', 'IngredientsController@index' )->name('ingredient.list');

        Route::get('cache-for-production', 'AppController@cache')->name('production.cache');
        Route::get('lista-uzytkownikow', 'AppController@userList')->name('user.list');
        Route::post('run', 'AppController@runCommand')->name('command.run');
        Route::get('mailing', 'MailsController@index')->name('mails.index');
        Route::get('mailing/preview', 'MailsController@show')->name('mails.preview');
        Route::post('mailing/send', 'MailsController@send')->name('mails.send');
    });
});

//landing, or app
Route::get('{any}', 'App\HomeController@handleRoute')->where('any', '.*');
