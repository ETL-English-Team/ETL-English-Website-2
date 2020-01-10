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

// Đăng nhập
Route::get('login', 'LoginController@userLoginView')->middleware('check_user_login');
Route::post('login', 'LoginController@userLogin');
Route::get('logout', 'UserController@userLogout');

//Đăng ký
Route::get('sign-up', 'CreateUserController@showUserSignUpView');
Route::post('sign-up', 'CreateUserController@userSignUp');

//Hiển thị trang chủ
Route::get('home', 'UserController@showViewUserHome')->middleware('check_user_login');

//Level list routes
Route::get('level-list', 'TopicController@showView')->middleware('check_user_login');

//vocabulary routes
Route::get('vocabulary/{id}', 'WordEnController@showView')->middleware('check_user_login');

//examination routes
Route::get('examination-rules/{level}', 'ExaminationController@showExamRulesView')->middleware('check_user_login');
Route::post('examination-rules','ExaminationController@acceptOrNotRules');
Route::get('examination', 'ExaminationController@showExamView')->middleware('check_user_login');

//Thông tin cá nhân
Route::get('profile', 'ProfileController@showViewUserProFile')->middleware('check_user_login');

//Game
Route::get('magic-sound-box', 'GameMagicSoundBoxController@showViewMagicSoundBox');
Route::get('magic-sound-box-rules', 'GameMagicSoundBoxController@showViewMagicSoundBoxRules');
Route::post('magic-sound-box-rules', 'GameMagicSoundBoxController@acceptOrNotRules');

//Chức năng đang phát triển.
Route::get('development-view', 'UserController@showViewUserDevelopmentView')->middleware('check_user_login');

//Admin
Route::group(['prefix'=>'admin'],function(){
    //Hiển thị trang chủ
    Route::get('home', 'UserController@showViewAdminHome')->middleware('check_admin_login');

    //Tạo tài khoản admin
    Route::get('create-admin-account', 'CreateUserController@showViewCreateAdminAccount')->middleware('check_admin_login');
    Route::post('create-admin-account', 'CreateUserController@createAdminAccount');

    // Đăng nhập
    Route::get('login', 'LoginController@adminLoginView')->middleware('check_admin_login');
    Route::post('login', 'LoginController@adminLogin');
    Route::get('logout', 'UserController@adminLogout');

    //Hiển thị danh sách topic và event click button topic list
    Route::get('topic-list', 'TopicController@showViewTopicList')->middleware('check_admin_login');
    Route::post('topic-list', 'TopicController@clickButtonEvent');

    //Hiển thị danh sách từ vựng
    Route::get('vocabulary-list/{id}', 'WordEnController@showViewVocaList')->middleware('check_admin_login');

    //Hiển thị danh sách tài khoản người dùng
    Route::get('admin-list-table', 'UserListController@showViewAdminListTable')->middleware('check_admin_login');
    Route::get('user-list-table', 'UserListController@showViewUserListTable')->middleware('check_admin_login');

    //Thêm
    Route::get('insert-topic', 'TopicController@showViewInsertTopic')->middleware('check_admin_login');
    Route::post('insert-topic', 'TopicController@clickButtonEvent');
    Route::get('insert-vocabulary/{id}', 'WordEnController@showViewInsertVoca')->middleware('check_admin_login');
    Route::post('insert-vocabulary', 'WordEnController@clickButtonEvent');

    //Cập nhật
    Route::get('update-topic/{id}', 'TopicController@showViewUpdateTopic')->middleware('check_admin_login');
    Route::post('update-topic', 'TopicController@clickButtonEvent');
    Route::get('update-vocabulary/{id}', 'WordEnController@showViewUpdateVocabulary')->middleware('check_admin_login');
    Route::post('update-vocabulary', 'WordEnController@clickButtonEvent');

    //Chức năng đang phát triển
    Route::get('development-view', 'UserController@showViewAdminDevelopmentView')->middleware('check_admin_login');
});



//Ajax routes
Route::group(['prefix'=>'ajax'],function(){
    Route::get('check-answer/{answer}', 'ExaminationController@checkAnswer');
    Route::get('next-question','ExaminationController@nextQuestion');
    Route::get('check-topic-image-upload/{value}','CheckFileController@checkTopicImageUpload');
    Route::get('check-voca-sound-upload/{value}','CheckFileController@checkVocaSoundUpload');
});
