<?php


Route::group(['middleware' => 'web'], function () {
    //Authentication Routs
    Route::get('auth/login',['as'=>'login', 'uses'=>'Auth\LoginController@showLoginForm']);
    Route::post('auth/login','Auth\LoginController@Login');
    Route::get('auth/logout',['as'=>'logout', 'uses'=>'Auth\LoginController@logout']);
    //Dashboard
    Route::get('admin/dashboard', 'DashboardController@dashboardData')->name('admin.dashboard');
    //Registration Routes
    Route::get('auth/register','Auth\RegisterController@showRegistrationForm');
    Route::post('auth/register','Auth\RegisterController@register');
// Password reset routs
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::resource('categories', 'CategoryController',['except'=>['create']]);
    Route::resource('message', 'MessageController',['except'=>['create']]);
    Route::resource('tags', 'TagController',['except'=>['create']]);
    Route::resource('subcategories', 'SubCategoryController');
    Route::get('subcategories/ajax/{id}',array('as'=>'subcategory.ajax','uses'=>'SubCategoryController@subcategoryAjax'));
    Route::get('datafilter/{category}/{number}',array('as'=>'datafilter.ajax','uses'=>'BlogController@getSelected'));

    Route::post('comments/{post_id}',['uses'=>'CommentsController@store', 'as'=>'comments.store']);
    Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit', 'as'=>'comments.edit']);
    Route::put('comments/{id}',['uses'=>'CommentsController@update', 'as'=>'comments.update']);
    Route::delete('comments/{id}',['uses'=>'CommentsController@destroy', 'as'=>'comments.destroy']);
    Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete', 'as'=>'comments.delete']);


    Route::get('shayari', ['uses' => 'BlogController@getIndex', 'as' => 'shayari.index']);
    Route::get('science/{slug}', 'BlogController@getDataShayarwise');
    Route::get('tag/{slug}', 'BlogController@getDataTagwise');
    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');

    Route::get('/', 'BlogController@getShayeriForHome');

    Route::resource('posts', 'PostController');

    Route::resource('mediatypes', 'MediaTypesController');

    Route::resource('albums', 'AlbumsController');

    Route::resource('artists', 'ArtistsController');

    Route::resource('fateha', 'FatehaController');

    Route::post('postss',['uses'=> 'PostController@filter','as'=>'posts.filter']);
    //Route::resource('gallery', 'PhotoGalleryController');
    Route::post('gallery',['uses'=>'PhotoGalleryController@store', 'as'=>'gallery.store']);
    Route::get('gallery/create',['uses'=>'PhotoGalleryController@create', 'as'=>'gallery.create']);
    Route::put('gallery/{gallery}',['uses'=>'PhotoGalleryController@update', 'as'=>'gallery.update']);
    Route::get('gallery/{gallery}',['uses'=>'PhotoGalleryController@show', 'as'=>'gallery.show']);
    Route::get('gallery/{gallery}/edit',['uses'=>'PhotoGalleryController@edit', 'as'=>'gallery.edit']);
    Route::get('gallery',['uses'=>'PhotoGalleryController@index', 'as'=>'gallery.index']);
    Route::delete('gallery/{gallery}',['uses'=>'PhotoGalleryController@index', 'as'=>'gallery.destroy']);
    Route::post('gallery/filter',['uses'=>'PhotoGalleryController@filter', 'as'=>'gallery.filter']);
    Route::get('shayari-image',['uses'=>'PublicPhotoGalleryController@frontgallery', 'as'=>'gallery.frontgallery']);
    Route::get('shayari-image/{gallery}',['uses'=>'PublicPhotoGalleryController@showimage', 'as'=>'gallery.showimage']);
    Route::get('disclaimer', function (){
        return view('shayari.disclaimer');
    });
    Route::get('privacy-policy', function (){
        return view('shayari.privacy-policy');
    });


    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        return "<h3> Cache cleared. </h3>";
    });
    //Clear View cache:
    Route::get('/view-clear', function() {
        $exitCode = Artisan::call('view:clear');
        return '<h1>View cache cleared</h1>';
    });
    Route::get('/{slug}',['as'=>'shayari.single','uses'=>'BlogController@getSingle'])
        ->where('slug','[\w\d\-\_]+');
});
