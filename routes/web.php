<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Usuaries
    Route::delete('usuaries/destroy', 'UsuariesController@massDestroy')->name('usuaries.massDestroy');
    Route::post('usuaries/media', 'UsuariesController@storeMedia')->name('usuaries.storeMedia');
    Route::post('usuaries/ckmedia', 'UsuariesController@storeCKEditorImages')->name('usuaries.storeCKEditorImages');
    Route::resource('usuaries', 'UsuariesController');

    // Fichas De Seguimiento
    Route::delete('fichas-de-seguimientos/destroy', 'FichasDeSeguimientoController@massDestroy')->name('fichas-de-seguimientos.massDestroy');
    Route::post('fichas-de-seguimientos/media', 'FichasDeSeguimientoController@storeMedia')->name('fichas-de-seguimientos.storeMedia');
    Route::post('fichas-de-seguimientos/ckmedia', 'FichasDeSeguimientoController@storeCKEditorImages')->name('fichas-de-seguimientos.storeCKEditorImages');
    Route::resource('fichas-de-seguimientos', 'FichasDeSeguimientoController');

    // Areas
    Route::delete('areas/destroy', 'AreasController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreasController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
