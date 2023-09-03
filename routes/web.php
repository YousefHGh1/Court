<?php

use App\Http\Controllers\CitizenController;
use App\Http\Controllers\Contract1Controller;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\EducationalController;
use App\Http\Controllers\EmergencyHolidayController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExternalHolidayController;
use App\Http\Controllers\HolidayReportController;
use App\Http\Controllers\NormalHolidayController;
use App\Http\Controllers\SickHolidayController;
use App\Http\Controllers\SonController;
use App\Http\Controllers\VolanteerController;
use App\Http\Controllers\WifeController;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;

// ***********************************************welcome**************************************************************
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EmployeeController::class, 'welcome']);

// *********************************اضافة اخطار 1 ********************************************
Route::resource('court', CourtController::class);

// ***********************************************court**************************************************************

Route::prefix('court/')->group(function () {

    // ***********************************طلب تنفيذي أمر المحكمة 2 *************************************
    Route::get('/court_order/{id}', [CourtController::class, 'court_order'])->name('court.court_order');

    // ************************قبل عمل الاخطار ******************************
    Route::get('/B_all_amount/{id}', [CourtController::class, 'B_all_amount'])->name('court.B_all_amount');
    Route::get('/B_part_amount/{id}', [CourtController::class, 'B_part_amount'])->name('court.B_part_amount');

    // *****************************************أوامر المنع*************************************
    Route::get('/travel_ban/{id}', [CourtController::class, 'travel_ban'])->name('court.travel_ban');
    Route::get('/salary_reservation/{id}', [CourtController::class, 'salary_reservation'])->name('court.salary_reservation');
    Route::get('/detention_order/{id}', [CourtController::class, 'detention_order'])->name('court.detention_order');

    // ************************بعد عمل الاخطار ******************************
    Route::get('/A_all_amount/{id}', [CourtController::class, 'A_all_amount'])->name('court.A_all_amount');
    Route::get('/A_all_amount_travel/{id}', [CourtController::class, 'A_all_amount_travel'])->name('court.A_all_amount_travel');
    Route::get('/A_part_amount/{id}', [CourtController::class, 'A_part_amount'])->name('court.A_part_amount');
    Route::get('/A_part_amount_travel/{id}', [CourtController::class, 'A_part_amount_travel'])->name('court.A_part_amount_travel');
    Route::get('/end_detention/{id}', [CourtController::class, 'end_detention'])->name('court.end_detention');
    //
});
// ***********************************************employee**************************************************************

Route::prefix('/')->group(function () {

    // ***********************************شؤون الموظفين *************************************
    Route::resource('employee', EmployeeController::class);
    Route::resource('contract', Contract1Controller::class);
    Route::resource('daily', DailyController::class);
    Route::resource('volanteer', VolanteerController::class);
    Route::resource('educational', EducationalController::class);
    Route::resource('dependent', DependentController::class);
    Route::resource('wife', WifeController::class);
    Route::resource('son', SonController::class);
    Route::get('/son/create/{id}', [SonController::class, 'create']);
    Route::get('/wife/create/{id}', [WifeController::class, 'create']);
    Route::get('/educational/create/{id}', [EducationalController::class, 'create']);
    Route::get('/dependent/create/{id}', [DependentController::class, 'create']);

    Route::get('/son/{id}/edit', [SonController::class, 'edit']);
    Route::get('/wife/{id}/edit', [WifeController::class, 'edit']);
    Route::get('/educational/{id}/edit', [EducationalController::class, 'edit']);
    Route::get('/dependent/{id}/edit', [DependentController::class, 'edit']);
});

// ***********************************الإجازات *************************************

Route::prefix('holiday/')->group(function () {

    Route::resource('normal', NormalHolidayController::class);
    Route::resource('external', ExternalHolidayController::class);
    Route::resource('emergency', EmergencyHolidayController::class);
    Route::resource('sick', SickHolidayController::class);
});
Route::get('/holiday_employee/{id}', [HolidayReportController::class, 'holiday_employee'])->name('holiday_employee');

Route::get('/citizen/full-name/{id}', [CitizenController::class, 'getCitizenFullName']);


Route::get('/defendant/{id}', function ($id) {
    $response = Http::withHeaders([
        'x-sso-authorization' => '407041516',
        'x-user-id' => '407041516',
        'x-user-ip' => '407041516',
        'x-user-agent' => '407041516'
    ])->get('https://ws.gov.ps/citizen/id/' . $id);

    if ($response->ok()) {
        $data = $response->json();

        // قم بتحليل الاستجابة واستخراج البيانات اللازمة
        // يمكنك ضبط الكود حسب هيكل الاستجابة المتوقع

        return response()->json($data);
    }

    return response()->json(['message' => 'Failed to fetch defendant data'], 500);
});

Route::get('/userdata', [CitizenController::class, 'getDta'])->name('getuserData');


// Route::get('ajaxUserDataNotice', 'CourtController@getAjaxUserData');
// Route::post('getUserData', 'UserController@getUserData')->name('users.data');
// Route::get('/league-table', 'LeagueTableController@show');
// Route::get('/league-table', [LeagueTableController::class, 'show']);
// Route::get('/league-table1', [LeagueTableController::class, 'getLeagueTable']);

// Route::get('requests/create/{mokalaf}', 'RequestController@createReqMokalaf')->name('createReqMokalaf');

// Route::get('/requests_mail/{request_mail}/{response_id}', 'RequestMailController@show')->name('req_mail_show');
// Route::get('/request_types/{request_type}/paths', 'RequestTypesController@paths')->name('request_type_paths');

// Route::get('/paths/{path}/responses', 'PathController@responses');
// Route::get('/notifications/{id}', 'NotificationController@read')->name('notification.read');
// Route::get('/pusher_notifications', 'NotificationController@pusher_notifications')->name('pusher_notifications');

// Route::get('image/upload','ImageUploadController@fileCreate');
// Route::post('image/upload/store2/{id}','RequestController@fileupload2')->name('request_upload2');
// Route::get('requests/{id}/addAttach','RequestController@addAttach')->name('requests.addAttach');

// Route::post('image/destroy/{id}','RequestController@fileDestroy');

// Route::get('/autocomplete/fetch-id', 'RequestController@fetchIDNO')->name('autocomplete.fetch_id');
// Route::get('/autocomplete/fetch-name', 'RequestController@fetchName')->name('autocomplete.fetch_name');
// Route::get('/autocomplete/fetch-mokalaf', 'RequestController@fetchMokalaf')->name('autocomplete.fetch_mokalaf');

// Route::post('/getRequestData', 'RequestController@getRequestData')->name('requests.data');
// Route::post('/getSectionData', 'SectionController@getSectionData')->name('sections.data');
// Route::post('/getMokalafData', 'MokalafController@getMokalafData')->name('mokalafs.data');
// Route::post('/getRequestTypeData', 'RequestTypesController@getRequestTypeData')->name('request_types.data');
// Route::post('/getDocumentData', 'DocumentController@getDocumentData')->name('documents.data');
// Route::post('/getRequestMailDataWaiting', 'RequestMailController@getRequestMailDataWaiting')->name('requests_mail.data.waiting');
// Route::post('/getRequestMailDataAccepted', 'RequestMailController@getRequestMailDataAccepted')->name('requests_mail.data.accepted');
// Route::post('/getRequestMailDataPending', 'RequestMailController@getRequestMailDataPending')->name('requests_mail.data.pending');
// Route::post('/getRequestMailDataUnaccepted', 'RequestMailController@getRequestMailDataUnaccepted')->name('requests_mail.data.unaccepted');
// Route::post('/getRequestMailDataAll', 'RequestMailController@getRequestMailDataAll')->name('requests_mail.data.all');

// Route::post('/requests/{request}/destroy', 'RequestController@destroy');
// Route::post('/sections/{section}/destroy', 'SectionController@destroy');
// Route::post('/users/{user}/destroy', 'UserController@destroy');
// Route::post('/mokalafs/{mokalaf}/destroy', 'MokalafController@destroy');
// Route::post('/request_types/{request_type}/destroy', 'RequestTypesController@destroy');
// Route::post('/documents/{document}/destroy', 'DocumentController@destroy');
// Route::post('/paths/{path}/destroy', 'PathController@destroy');

// Route::get('/request_types/{request_type}/add_path', 'RequestTypesController@add_path');
// Route::get('/requests/{request}/status', 'RequestController@status')->name('req_status');

// Route::get('/ajaxUserData', 'RequestController@getAjaxUserData');
// Route::get('/getAjaxMokalafData', 'RequestController@getAjaxMokalafData');
// Route::get('/ajaxNameData', 'RequestController@getAjaxNameData');
// Route::get('/ajaxSectionUser', 'RequestTypesController@getAjaxSectionUser');
// Route::get('/ajaxDocData', 'RequestController@getAjaxDocData');

// Route::get('profile', 'UserController@profile')->name('profile');
// Route::get('profile/change_password', 'UserController@profile_change_password')->name('profile_change_password');
// Route::put('profile', 'UserController@updateProfile')->name('profile.update');
// Route::put('profile/change_password', 'UserController@updatePassword')->name('profile.updatePassword');

// // Reservation
// Route::resource('reservations', 'ReservationController');
// Route::post('image/upload/store3/{id}','ReservationController@fileupload2')->name('reservation_upload2');
// Route::get('reservations/{id}/addAttach','ReservationController@addAttach')->name('reservations.addAttach');
// Route::post('reservations/{reservation}/storeAttach','ReservationController@storeAttach')->name('reservations.storeAttach');
// Route::post('attach/destroy/{id}','ReservationController@fileDestroy');
// Route::post('/getReservationData', 'ReservationController@getReservationData')->name('reservations.data');

// Notice
// Route::resource('notices', 'NoticeController');
// Route::resource('pages/notices', NoticeController::class);
// Route::post('/getNoticesData', [NoticeController::class, 'getNoticesData'])->name('notices.data');
// Route::get('/ajaxUserDataNotice', [NoticeController::class, 'getAjaxUserData']);
// Route::get('/ajaxNameDataNotice', [NoticeController::class, 'getAjaxNameData']);
// Route::get('/ajaxJebaiaDataNotice', [NoticeController::class, 'getAjaxJebaiaData']);

// Route::resource('notice_reasons', 'NoticeReasonController');
// Route::post('/getNoticesData', 'NoticeController@getNoticesData')->name('notices.data');
// Route::post('/getNoticeReasonData', 'NoticeReasonController@getNoticeReasonData')->name('notice_reasons.data');
// Route::get('/ajaxUserDataNotice', 'NoticeController@getAjaxUserData');
// Route::get('/ajaxNameDataNotice', 'NoticeController@getAjaxNameData');
// Route::get('/ajaxJebaiaDataNotice', 'NoticeController@getAjaxJebaiaData');

// Route::get('/noticess/fetch-id', 'NoticeController@fetchIDNO')->name('notices.fetch_id');
// Route::get('/noticess/fetch-name', 'NoticeController@fetchName')->name('notices.fetch_name');
// Route::get('/noticess/fetch-jebaia', 'NoticeController@fetchJebaia')->name('notices.fetch_jebaia');
// Route::get('imprisonment_orders/create/{notice}', 'ImprisonmentOrderController@createImprisonmentNotice')->name('createImprisonmentNotice');
// Route::get('/userdata', [UserDataApiController::class, 'getDta'])->name('getuserData');
// Route::get('/insertuserData', [UserDataApiController::class, 'insertDta'])->name('insertuserData');
// Route::post('/getUserData', [UserController::class, 'getUserData'])->name('users.data');