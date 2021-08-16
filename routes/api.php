<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','UserController@register');
Route::post('register/confirmPin','UserController@confirmPin');
Route::post('login','UserController@login');
Route::get('profile','UserController@getAuthenticatedUser');

Route::get('dynamic_enquiry','EnquiryController@dynamicPageEnquiry');

Route::prefix('status')->group(function () {
    Route::post('add','StatusController@add');
    Route::get('property/get','StatusController@getProperty');
    Route::get('all','StatusController@all');
    Route::post('update','StatusController@update');
});

Route::prefix('d_page')->group(function () {
    Route::post('add','DynamiPageController@addPage');
    Route::post('image_upload','DynamiPageController@uploadImage');
    Route::get('all','DynamiPageController@all');
    Route::post('getPage','DynamiPageController@getPage');
    Route::post('update','StatusController@update');
});

Route::prefix('pages')->group(function () {
    Route::post('update','PagesController@update');
    Route::get('all','PagesController@get');
    Route::post('updateSEO','PagesController@updateSeo');
    Route::post('getSEO','PagesController@getSeo');
});
Route::prefix('amenities')->group(function () {
    Route::post('parent','AmenitiesController@parent');
    Route::post('subamen','AmenitiesController@subparent');
    Route::post('add','AmenitiesController@add');
    Route::post('sub-add','AmenitiesController@subadd');
    Route::post('update','AmenitiesController@update');
});
Route::prefix('categories')->group(function () {
    Route::post('parent','CategoriesController@parent');
    Route::post('update','CategoriesController@update');
    Route::post('sub_update','CategoriesController@subupdate');
    Route::post('subcat','CategoriesController@subparent');
    Route::post('add','CategoriesController@add');
    Route::post('sub-add','CategoriesController@subadd');
    Route::post('getNames','CategoriesController@subNames');
    Route::post('course-catg','CategoriesController@getCCatg');
    Route::post('course-stream','CategoriesController@getCStream');
    Route::post('course-sub-stream','CategoriesController@getCSStream');
});
Route::prefix('blog')->group(function () {
    Route::post('add','AlotFronController@addBlog');
    Route::post('update','AlotFronController@updateBlog');
    Route::post('delete','AlotFronController@deleteBlog');
    Route::post('all','AlotFronController@getBlog');
    Route::get('get','AlotFronController@blogData');
    Route::post('updateStatus', 'AlotFronController@updateStatus');
    Route::post('getSEO', 'AlotFronController@getSEO');
    Route::post('updateSEO', 'AlotFronController@updateSEO');
});
Route::post('course/add','PropertiesController@addCourse');
Route::get('click-enquiry/all','EnquiryController@listClicks');
Route::post('course/data','PropertiesController@getCourse');
Route::post('course/update','PropertiesController@updateCourse');
Route::post('course/delete','PropertiesController@deleteCourse');
Route::post('exam/add','ExamController@addExam');
Route::get('exam/all','ExamController@allExam');
Route::post('exam/delete_image','ExamController@deleteImage');
Route::post('exam/image_upload','ExamController@uploadImage');
Route::post('stream/delete','CategoriesController@deleteStream');
Route::get('course/get-all','PropertiesController@getAllCourse');
Route::post('scholarship/add','PropertiesController@addScholarShip');
Route::get('scholarship/get','PropertiesController@getScholarShip');
Route::post('profile','UserController@getAuthenticatedUser');
Route::post('users/managers','UserController@getManager');
Route::post('users/guest','UserController@getGuest');
Route::post('users/editors','UserController@getEditors');
Route::post('users/cyber-list','UserController@getCyber');
Route::post('cyber/approve','SuperAdminController@approveCyberPartner');
Route::post('cyber/terminate','SuperAdminController@terminateCyberPartner');
Route::post('users/callers','UserController@getCallers');
Route::post('users/callers/add-update','UserController@addUpdateCaller');
Route::post('users/editors/add-update','UserController@addUpdateEditor');
Route::post('users/delete','UserController@deleteUsers');
Route::post('enquiry/list','EnquiryController@list');
Route::post('enquiry/caller','EnquiryController@callerEnquiry');
Route::post('enquiry/cyber','EnquiryController@cyberEnquiry');
Route::post('enquiry/dynamic','EnquiryController@dynamicEnquiry');
Route::post('enquiry/dynamic/status/update','EnquiryController@updatedynamicStatus');
Route::get('enquiry/detail','EnquiryController@enquiryDetail');
Route::get('enquiry/dynamic-detail/{id?}','EnquiryController@enquiryDynamicDetail');


//Bank Api
Route::get('bank/list','BankController@bankList');
Route::post('bank/add','BankController@bankAdd');

Route::get('cyber/detail','CyberController@cyberDetail');
Route::get('excel/detail','EnquiryController@excelDetail');

Route::post('enquiry/status/update','EnquiryController@updateStatus');
Route::post('cyber/status/update','CyberController@updateStatus');
Route::post('excel/status/update','EnquiryController@updateExcelStatus');
Route::post('enquiry/reason','EnquiryController@reasonAdd');
Route::post('enquiry/dynamic/reason','EnquiryController@reasonAddDynamic');
Route::post('cyber/reason','CyberController@reasonAdd');
Route::post('excel/reason','EnquiryController@reasonAddExcel');
Route::post('reviews/list','EnquiryController@reviewlist');
Route::post('testimonials/list','EnquiryController@testlist');
Route::post('testimonial/add','AlotFronController@addTestimonial');
Route::post('status/all','AlotFronController@statusList');
Route::post('testimonial/update','AlotFronController@updateTest');
Route::post('hostel/add','AlotFronController@addHostel');
Route::get('hostel/get','AlotFronController@getHostel');
Route::post('amenities/get','AlotFronController@getAmen');
Route::post('policies/get','AlotFronController@getPolicy');

Route::group(['prefix' => 'properties'], function () {
    Route::get('bycategory', 'Categoriescontroller@loadAjax');
    Route::get('byname', 'Categoriescontroller@loadAjaxName');
    Route::post('get', 'Categoriescontroller@loadproperty');
    Route::post('step1', 'PropertiesController@step1');
    Route::post('step2', 'PropertiesController@step2');
    Route::post('step3', 'PropertiesController@step3');
    Route::post('step4', 'PropertiesController@step4');
    Route::post('step5', 'PropertiesController@step5');
    Route::post('gallery', 'PropertiesController@gallery');
    Route::post('submit', 'PropertiesController@submit');
    Route::post('getAll', 'PropertiesController@get');
    Route::post('getaUser', 'PropertiesController@getaUser');
    Route::post('updateStatus', 'PropertiesController@updateStatus');
    Route::post('getProp', 'PropertiesController@getProp');
    Route::post('getSEO', 'PropertiesController@getSEO');
    Route::post('updateSEO', 'PropertiesController@updateSEO');
    Route::post('images', 'PropertiesController@getImages');
    Route::post('placements', 'PropertiesController@getPlacements');
    Route::post('images/upload', 'PropertiesController@uploadImages');
    Route::get('images/delete', 'PropertiesController@deleteImage');
    Route::post('placement/upload', 'PropertiesController@uploadPlacement');
    Route::get('placement/delete', 'PropertiesController@deletePlacement');
    Route::post('update/basic', 'PropertiesController@updateBasic');
    Route::post('update/location', 'PropertiesController@updateLocation');
    Route::post('delete', 'PropertiesController@deleteProp');
    Route::get('getStat','PropertiesController@dashboardData');
    Route::post('getLocation','PropertiesController@getLocation');
});

Route::post('state/get','AlotFronController@getState');
Route::post('teachers/list','AlotFronController@getTeachers');
Route::post('city/get','AlotFronController@getCity');


Route::group(['prefix' => 'search'], function () {
    Route::get('check', 'AlotFronController@search');
});
Route::group(['prefix' => 'bookings'], function () {
    Route::post('all', 'BookingController@get');
    Route::post('data', 'BookingController@dataCount');
});

Route::post('payment', 'PaymentController@payment');

Route::post('teacher/add', 'TeacherController@addTeacher');
Route::post('teacher/update', 'TeacherController@updateTeacher');
Route::post('teacher/delete','TeacherController@remove');
Route::post('room/add', 'RoomController@addRoom');
Route::get('claim/sendOTP', 'ClaimController@send');
Route::get('claim/submit', 'ClaimController@submit');
Route::get('claim/create', 'ClaimController@create');


//App Api
Route::post('applogin','UserController@appLogin');
Route::get('prop_list','AppController@getProp');
Route::get('prop_list_all','AppController@getPropAll');
Route::get('rooms_list','AppController@getRooms');
Route::get('profile_data','AppController@profileData');
Route::post('add_booking','AppController@addBooking');
Route::get('un_book_room','AppController@unbookRoom');
Route::get('getPrivacy','AppController@getPrivacy');
Route::get('getChangeData','AppController@getChangeData');
Route::get('getNotification','NotificationController@getNotification');
Route::get('getNotificationDetail','NotificationController@getNotificationDetail');
Route::post('getInstitutes','PropertiesController@getUserIns');
Route::get('search','PropertiesController@searchData');
Route::get('get_states','AlotFronController@statesData');
Route::get('get_cities','AlotFronController@citiesData');
Route::post('cities/get','AlotFronController@getCities');
Route::get('get_colleges','AlotFronController@collegeList');
Route::get('get_exams','AlotFronController@examList');
Route::get('get_colleges_search','AlotFronController@filterList');
Route::get('get_courses','AlotFronController@courseList');
Route::get('get_search_filter','PropertiesController@searchFilter');
Route::get('enquiry-form-submit','MailController@enquiryForm');
Route::get('enquiry-form','MailController@enquiryFormDetail');
Route::get('statistics/data','PropertiesController@getData');
Route::get('join_cyber','CyberController@joinCyber');
Route::get('click','AlotFronController@buttonClicks');


Route::post('excel_upload','EnquiryController@importExcel');
Route::post('excel/data','EnquiryController@getExcel');

Route::get('/test',function (){
    $callers = User::whereHas('roles', function ($query) {
        $query->where('name', '=', 'Caller');
    })->get('id');
    $call = [];
    foreach ($callers as $c) {
        $call[] = $c->id;
    }
    $search = array_search(45, $call);
    $count = count($call) - 1;
    $main = 0;
    if($search == $count){
        $main = $call[0];
    }else{
        $main = $call[$search + 1];
    }
    return compact('search','count','main');
});
