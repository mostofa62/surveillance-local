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
use App\Http\Middleware\Admin;

Route::group(['prefix' => 'api/v1/'], function () {
    Route::post('login', 'Api\LoginController@login_user');
    //Schedule
    Route::get('schedule', 'Api\ScheduleController@index');
    Route::post('casesubmit', 'Api\CaseInfoController@index');
    Route::post('casesubmit/{id}', 'Api\CaseInfoController@update');
    Route::any('listcase', 'Api\CaseInfoController@list');
});

Route::get('/async', 'HomeController@async');
Route::get('/asyncget', 'HomeController@asyncupdate');
//cati jar generator
Route::get('/jargenerator', 'IvrReportController@jargenerator');

Route::get('/casedata', 'SampleAckController@casedata');

Route::get('/test', 'SampleAckController@test');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('dengue', 'HomeController@dengue');

///login and sign-up
Route::any('login', 'LoginController@index');
Route::any('forgot-password', 'LoginController@forgotpassword');
Route::get('confirm-email/{email}', 'LoginController@confirmEmail');

Route::get('/sample', 'SampleAckController@index');
Route::get('user/covic/listreport', 'SampleAckController@listreport');
Route::get('user/covic/listreportex', 'SampleAckController@listreportEx');
Route::get('user/covic/listreportpos', 'SampleAckController@listreportpos');
Route::get('user/covic/listreportposex', 'SampleAckController@listreportposEx');
Route::post('user/covic/reportupdate', 'SampleAckController@reportupdate');

//Covid positive
Route::get('covid-positive', 'CovidPositiveController@index');
Route::get('covid-positive/create', 'CovidPositiveController@create');
Route::post('covid-positive/create', 'CovidPositiveController@store');
Route::get('covid-positive/edit/{id}', 'CovidPositiveController@edit');

Route::any('datagenerator', 'ReproductiveController@datagenerator');

Route::group(['namespace' => 'Admin', 'middleware' => ['admin:admin']], function () {

    ///dashboard
    Route::any('admin/home', 'DashboardController@index');
    Route::any('admin/dashboard', 'DashboardController@index');
    Route::any('admin/log/{id}', 'DashboardController@logDetails');
    Route::any('admin/profile', 'DashboardController@profile');
    Route::any('admin/change-password', 'DashboardController@ChangePassword');
    Route::get('admin/select-language', 'DashboardController@selectLanguage');
    Route::get('admin/select-project', 'DashboardController@selectProject');
    Route::any('admin/logout', 'DashboardController@logout');


    //For Employee
    Route::any('admin/employee/status-update/{id}', 'EmployeeController@statusUpdate');

    //Dengue
    Route::any('admin/dengue/export', 'DengueController@export');
    Route::any('admin/dengue/import', 'DengueController@import');
    Route::any('admin/dengue/outdoorLabData', 'DengueController@outdoorLabData');

    //Dengue Lab
    Route::any('admin/fetpb-dengue-lab/export', 'DengueLabFetpbController@export');

    //JE
    Route::any('admin/encephalitis/callInitiate', 'EncephalitisController@callInitiate');
    Route::any('admin/encephalitis/callschedule', 'EncephalitisController@callSchedule');
    Route::any('admin/encephalitis/question/{id}', 'EncephalitisController@callQuestion');
    Route::any('admin/encephalitis/question/{id}/view', 'EncephalitisController@questionView');
    Route::any('admin/encephalitis/export', 'EncephalitisController@export');

    ///Poultry
    Route::any('admin/poultry/callInitiate', 'PoultryController@callInitiate');
    Route::any('admin/poultry/callschedule', 'PoultryController@callSchedule');
    Route::any('admin/poultry/question/{id}', 'PoultryController@callQuestion');
    Route::any('admin/poultry/question/{id}/view', 'PoultryController@questionView');
    Route::any('admin/poultry/export', 'PoultryController@export');
    Route::any('admin/poultry/gender/{mobile_no}/{type}', 'PoultryController@genderCount');

    //Reproductive
    Route::any('admin/reproductive/callInitiate', 'ReproductiveController@callInitiate');
    Route::any('admin/reproductive/callschedule', 'ReproductiveController@callSchedule');
    Route::any('admin/reproductive/question/{id}', 'ReproductiveController@callQuestion');
    Route::any('admin/reproductive/datagenerator', 'ReproductiveController@datagenerator');
    Route::any('admin/reproductive/allfileds', 'ReproductiveController@allfileds');


    Route::resources([
        'admin/dengue' => 'DengueController',
        'admin/fetpb-dengue-lab' => 'DengueLabFetpbController',
        'admin/suspected-dengue' => 'SuspectedDengueController',
        'admin/denguedeath' => 'DengueDeathController',
        'admin/encephalitis' => 'EncephalitisController',
        'admin/poultry' => 'PoultryController',
        //Reproductive
        'admin/reproductive' => 'ReproductiveController',
        //end Reproductive
        'admin/project' => 'ProjectController',
        'admin/site' => 'SiteController',
        'admin/employee' => 'EmployeeController',
        'admin/setting' => 'SettingController',
        'admin/notification' => 'NotificationController',
    ]);
});

Route::group(['middleware' =>['admin:user']], function () {
    //sirajul
    Route::get('user/select-language', 'DashboardController@selectLanguage');

    //For Employee
    Route::any('user/employee/status-update/{id}', 'EmployeeController@statusUpdate');

    //Dengue
    Route::any('user/dengue/export', 'DengueController@export');

    //Dengue Lab
    Route::any('user/fetpb-dengue-lab/export', 'DengueLabFetpbController@export');

    //rammps
    Route::any('user/rammps/callInitiate', 'RammpsController@index');
    Route::any('user/rammps/question/{id}', 'RammpsController@question');

    Route::any('user/rammps/callschedule', 'RammpsController@callSchedule');

    //JE
    Route::any('user/encephalitis/callInitiate', 'EncephalitisController@callInitiate');
    Route::any('user/encephalitis/callschedule', 'EncephalitisController@callSchedule');
    Route::any('user/encephalitis/question/{id}', 'EncephalitisController@callQuestion');
    Route::any('user/encephalitis/question/{id}/view', 'EncephalitisController@questionView');
    Route::any('user/encephalitis/export', 'EncephalitisController@export');

    ///Poultry
    Route::any('user/poultry/callInitiate', 'PoultryController@callInitiate');
    Route::any('user/poultry/callschedule', 'PoultryController@callSchedule');
    Route::any('user/poultry/question/{id}', 'PoultryController@callQuestion');
    Route::any('user/poultry/question/{id}/view', 'PoultryController@questionView');
    Route::any('user/poultry/export', 'PoultryController@export');
    Route::any('user/poultry/gender/{mobile_no}/{type}', 'PoultryController@genderCount');

    //Reproductive
    Route::any('user/reproductive/callInitiate', 'ReproductiveController@callInitiate');
    Route::any('user/reproductive/callschedule', 'ReproductiveController@callSchedule');
    Route::any('user/reproductive/question/{id}', 'ReproductiveController@callQuestion');
    Route::get('user/reproductive/pick/{id}/drop/{did?}', 'ReproductiveController@pick')->name('pick');
    Route::any('user/reproductive/{id}/qedit', 'ReproductiveController@qedit');
    Route::post('user/reproductive/{id}/qedit', 'ReproductiveController@qeditstore');
    Route::any('user/reproductive/missing', 'ReproductiveController@missingScheduleOrAppointment');
    Route::any('user/reproductive/datagenerator', 'ReproductiveController@datagenerator');
    //Reporting
    Route::any('user/reproductive/districtreport', 'ReproductiveReportController@districtwise');  
    Route::any('user/reproductive/usersummary', 'ReproductiveReportController@usersummary'); 
    Route::any('user/reproductive/district-enabled/{id}', 'ReproductiveReportController@district_enabled');
    Route::any('user/reproductive/freenumber', 'ReproductiveReportController@freenumber');


    //Ivr
    Route::any('user/ivr/callInitiate', 'IvrController@callInitiate');
    Route::any('user/ivr/callschedule', 'IvrController@callSchedule');    
    Route::any('user/ivr/question/{id}', 'IvrController@callQuestion');
    Route::get('user/ivr/pick/{id}/drop/{did?}', 'IvrController@pick')->name('pick'); 
    Route::any('user/ivr/missing', 'IvrController@missingScheduleOrAppointment'); 

    Route::any('user/ivr/checkquota', 'IvrController@checkquota');




    Route::get('user/ivr/catijar', 'IvrReportController@index');
    Route::get('user/ivr/usercompleted', 'IvrReportController@usercompleted');


    //ivr follow
    Route::any('user/ivr/incomplete', 'IvrFollowController@incomplete');
    Route::post('user/ivr/incomplete', 'IvrFollowController@incomplete_store');


    //ivr refuse
    Route::any('user/ivr/refusal', 'IvrFollowController@refusal');
    Route::post('user/ivr/refusal', 'IvrFollowController@refusal_store');


    //ivr noncontact
    Route::any('user/ivr/noncontact', 'IvrFollowController@noncontact');
    Route::post('user/ivr/noncontact', 'IvrFollowController@noncontact_store');

    //ivr pr cati
    Route::any('user/ivrpr/cati', 'IvrPrFollowController@cati');
    Route::post('user/ivrpr/cati', 'IvrPrFollowController@cati_store');
    Route::any('user/ivrpr/ivr', 'IvrPrFollowController@ivr');
    Route::post('user/ivrpr/ivr', 'IvrPrFollowController@ivr_store');


    //covic
    Route::any('user/covic/followup', 'CovicController@followUp');
    Route::any('user/covic/followup/{id}', 'CovicController@followUpStore');     
    Route::any('user/covic/followuplist', 'CovicController@followList');

    Route::get('user/covic/listreportlab', 'SampleAckController@listreportlab');
    Route::post('user/covic/reportupdatelab', 'SampleAckController@reportupdatelab');  

    Route::resources([
        'user/dengue' => 'DengueController',
        'user/fetpb-dengue-lab' => 'DengueLabFetpbController',
        'user/suspected-dengue' => 'SuspectedDengueController',
        'user/denguedeath' => 'DengueDeathController',
        'user/encephalitis' => 'EncephalitisController',
        'user/poultry' => 'PoultryController',
        'user/reproductive' => 'ReproductiveController',
        //ivr
        'user/ivr' => 'IvrController',
        //covic
        'user/covic' => 'CovicController',
        'user/project' => 'ProjectController',
        'user/site' => 'SiteController',
        'user/employee' => 'EmployeeController',
        'user/setting' => 'SettingController',
        'user/notification' => 'NotificationController',
    ]);

    ///dashboard
    Route::any('user/home', 'DashboardController@index');
    Route::any('user/dashboard', 'DashboardController@index');
    Route::any('dashboard', 'DashboardController@redirectDashboard');
    Route::any('user/log/{id}', 'DashboardController@logDetails');
    Route::any('user/profile', 'DashboardController@profile');
    Route::any('user/change-password', 'DashboardController@ChangePassword');
    Route::any('user/logout', 'DashboardController@logout');

});


