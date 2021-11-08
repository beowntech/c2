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

use App\Booking;
use App\Events\Enquiry;
use App\Menu;
use App\Properties;
use App\Exam;
use App\Rooms;
use App\SEO;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;

if (env('APP_ENV') === 'production') {
    \Illuminate\Support\Facades\URL::forceScheme('https');
}

Route::middleware('doNotCacheResponse')->group(function (){
Route::get('/admin/{any}', 'ApplicationController')->where('any', '.*');
Route::get('/admin', function () {
    return redirect('/admin/login');
});
Route::get('/login', function () {
    return view('front.auth.login');
})->name('login');

Route::get('/thank-you', function () {
    return view('front.dynamic.thanku');
})->name('thanku');

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/', 'AlotFronController@index')->name('home');
Route::get('/hostels', [App\Http\Controllers\HostelsController::class,'index']);
Route::get('/nearby/{slug?}', [App\Http\Controllers\HostelsController::class,'nearby']);
Route::get('/features', function (){
    return view('v2.front.hostel.features');
});
//Route::get('/compare', 'AlotFronController@compare')->name('compare');
Route::get('/bank', 'AlotFronController@bank')->name('bank');
Route::get('/search/colleges', 'CategoriesController@index')->name('search-college');
Route::get('/exam/{catg?}', 'ExamController@index');
Route::get('/search2/{name?}', 'CategoriesController@search');
Route::post('/send/email', 'MailController@mail');
Route::post('/send/mailpop', 'MailController@mailPop');
Route::post('/user/login', 'UserController@frontLogin');
Route::post('logout', 'UserController@frontLogout');
Route::get('dashboard', 'AlotFronController@dashboard');
Route::get('profile', 'AlotFronController@profile');
Route::post('add_review', 'AlotFronController@addReview');
Route::get('change-password', 'AlotFronController@changePass');

Route::get('hostel-form', function () {
    return view('front.blog.forms.hostalform');
});


Route::post('hostel-form/submit', 'BestHotelFormController@store');
Route::post('edu-loan/submit', 'EducationLoanFormController@store');

Route::post('comment', 'CommentController@store');

Route::get('loan-form', function () {
    return view('front.blog.forms.loanform');
});
//Route::get('/login', function (){
//    return view('alotfront.auth.login');
//});
Route::get('/add-tales', 'AlotFronController@tales');
Route::get('/blog', 'AlotFronController@blog')->name('blog-index');
Route::post('/login', 'UserController@fLogin');
Route::post('/add_user_tale', 'AlotFronController@addTale');
Route::post('applogin', 'UserController@appLogin');
Route::get('prop_list', 'AppController@getProp');
Route::get('prop_list_all', 'AppController@getPropAll');
Route::get('rooms_list', 'AppController@getRooms');
Route::get('profile_data', 'AppController@profileData');
Route::post('add_booking', 'AppController@addBooking');
Route::get('un_book_room', 'AppController@unbookRoom');
Route::get('get_college_details', 'PropertiesController@details');
Route::get('get_bank_details', 'AlotFronController@getBank');

Route::post('information-submit', 'EnquiryController@informationForm');
Route::get('convert-all', 'PropertiesController@convertAll');

Route::get('checkG', function () {
    return getcwd();
});


Route::get('checkN', function () {
    $booking = Booking::all();
    foreach ($booking as $book) {
        if ($book->from_date->isTomorrow()) {
            $room = Rooms::where('id', $book->room_id)->get();
            $Roomname = $room[0]->name;
            $guestCount = $book->guests;
            $prop = Properties::where('id', $book->property_id)->get('host');
            $firebaseToken = User::where('id', $prop[0]->host)->pluck('device_token');
//            return $firebaseToken;

            $SERVER_API_KEY = 'AAAANFQlu2M:APA91bFpbDUhMZddZp9-KSXQCHBowLKls52QJxy1YlK_Gd9T-zQDewqarAcDIEXqQLUUnHp_aPqg95LkjCmV_AE2KiAJKJPwa_9rXGn-GLDj65Nx_jK6c-OwCGUImZsny2vBWSVL2A9t';

            $data = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => "Room Booking Tomorrow",
                    "body" => "$Roomname is booked for Tomorrow for $guestCount Guests",
                ]
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response = curl_exec($ch);

            dd($response);
        }
    }
});
Route::get('currency/change', 'AlotFronController@changeCurr');
Route::get('education-loan', 'AlotFronController@educationLoan');

Route::get('privacy-policy', 'AlotFronController@privacy')->name('privacy');
Route::get('terms', 'AlotFronController@terms')->name('terms');
Route::get('contact', function () {
    return view('front.contact');
});

Route::get('/compare/{properties}', [App\Http\Controllers\CompareController::class, 'index'])->name('compare');

Route::get('hostel', function () {
    return view('front.hostel');
});
Route::get('updates-notification', function () {
    return view('front.Notificatios');
});
Route::get('about-us', function () {
    return view('front.about');
});
Route::get('coming-soon', function () {
    return view('front.commingsoon');
});

Route::get('test', function () {
    return view('front.blog.index');
});

Route::post('gakey', function (Request $request) {
    return $request;
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('cyber-leads', 'CyberController@getLeads');
    Route::post('cyber-leads/add', 'CyberController@addLead');
    Route::get('cyber-dashboard', function () {
        return view('front.cyber.cyber-dashboard');
    });
});
Route::get('cyber-partner', function () {
    return view('front.cyber.cyber-partner');
})->name('cyber-partner');


Route::post('contact/send', 'MailController@sendContact')->name('contact');
Route::get('pgpage', 'SitemapController@ppPage');

Route::get('/useremail', function () {
//    $data = array('name'=>'Naval');
//    return view('emails.user_email',compact('data'));
});

Route::get('/pp/{slug?}', function (Request $request) {
    $data = SEO::where('permalink', $request->slug)->get();
    if ($data->isNotEmpty()) {
        $page = $data[0]->dynamic;
        $course = \App\Course::groupBy('stream')
            ->selectRaw('count(*) as total, stream')
            ->get();
        $cou = [];
        foreach ($course as $c => $val) {
            $cou[] = $val->stream;
        }
        $main = \App\FrontCategories::whereIn('id', $cou)->get();
        \App\DynamicPage::where('id', $data[0]->dynamic[0]->id)->increment('views');
        return view('front.dynamic.indx', compact('page', 'main'));
    }
    return abort(404);
});

//Route::get('/admissions-open', function (){
//    //return view('front.ads');
//    return 'hello';
//});

Route::get('/gen', function () {
    $sitemap = Sitemap::create();

    $data = Properties::where('deleted_at', null)->get();
    foreach ($data as $s => $val) {
        if ($val->seo->isNotEmpty()) {
            $city = Properties::where('id', $val->id)->with('location')->get();
            if ($city[0]->location->isNotEmpty()) {
                $sitemap->add(Url::create(env('APP_URL') . "/college-in-" . strtolower(str_replace(' ', '_', $city[0]->location[0]->cities[0]->name)) . "/" . $val->seo[0]->permalink . "")
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setLastModificationDate($val->updated_at)
                    ->setPriority(1.0));
            }
        }
    }
    $sitemap->writeToFile(public_path('sitemap_colleges.xml'));
});
Route::get('/exam-gen', function () {
    $sitemap = Sitemap::create();

    $data = Exam::all();
    foreach ($data as $s => $val) {
        if ($val->seo->isNotEmpty()) {
            $sitemap->add(Url::create(env('APP_URL') . "/exam/" . $val->seo[0]->permalink . "")
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate($val->updated_at)
                ->setPriority(1.0));
        }
    }
    $sitemap->writeToFile(public_path('sitemap-exams.xml'));
});
Route::get('/blogs', function () {
    return redirect('/blog');
});

Route::get('checkc', function () {
    return Menu::categories();
});

//Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');
Route::get('{city?}/{id?}/{more?}', ['uses' => 'CategoriesController@single'])->name('details');
});
