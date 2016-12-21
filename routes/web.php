<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function () {

//============================ALL USERSS ===============================//
//============================ALL USERSS ===============================//
 // AJAX REQUESTS // USER 
Route::post('createuser', 'Auth\AuthController@createViaAjax');
Route::post('loginuser', 'Auth\AuthController@doLogin');
Route::get('/login', 'ExternalController@login');

/////////////////////////////////////////////////////////////
 
 // DELETE USER //
Route::post('/admin/userkill', 'AdminProfileController@deleteUser');


//////////////////////////////////////////////////////////////


//============================EXTERNAL PAGES  ===============================//
//============================EXTERNAL PAGES  ===============================//


// External pages
Route::get('/', 'ExternalController@home');
Route::get('/faqs', 'ExternalController@faq');
Route::get('/terms', 'ExternalController@terms');
Route::get('/privacy', 'ExternalController@privacy');
Route::get('/contact', 'ExternalController@contact');

Route::get('/search', 'ExternalController@search');
Route::post('/contact', 'ExternalController@contactSave');

//Route::post('/contact', 'ExternalController@contactSave');
// blog
Route::get('/blog', 'ExternalController@blogPost');
Route::get('/blog/{post}', 'ExternalController@singlePost');

//Tutors by state
Route::get('/tutors/{tutors}', 'ExternalController@byState');


//Tutors by Subject
Route::get('/subjects/{subjects}', 'ExternalController@bySubject');

// comment submit

Route::post('/blog/{post}', 'ExternalController@commentSave');


//EMAIL VERIFICATION

Route::get('/validate/{code}', 'ExternalController@verifyEmail');


//============================AUTHENTICATION ===============================//
//============================AUTHENTICATION ===============================//
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');

//============================ADMIN PAGES ===============================//
//============================ADMIN PAGES ===============================//

// Admin Pages 
Route::get('admin/dashboard', 'AdminController@index');

// CATEGORY GET
Route::get('admin/category', 'CategoryController@index');
Route::get('admin/add-category', 'CategoryController@show');
Route::get('admin/category/{category}', 'CategoryController@edit');

//CATEGORY POST
Route::post('admin/add-category', 'CategoryController@add');
Route::post('admin/category/{category}', 'CategoryController@update');

Route::post('admin/delete/cat', 'CategoryController@delete');

//COURSE GET
Route::get('admin/courses', 'CourseController@index');
Route::get('admin/addcourse', 'CourseController@show');
Route::get('admin/course/{course}', 'CourseController@edit');

//COURSES POST
Route::post('admin/addcourse', 'CourseController@add');
Route::post('admin/course/{course}', 'CourseController@update');

Route::post('admin/delete/course', 'CourseController@delete');


// MANAGE USERS
Route::get('admin/student', 'AdminProfileController@studentlist');
Route::get('admin/tutor', 'AdminProfileController@tutorlist');
Route::get('admin/student/{student}', 'AdminProfileController@studentedit');
Route::get('admin/tutor/{tutor}', 'AdminProfileController@tutoredit');

Route::post('admin/student/{student}', 'AdminProfileController@updateStudent');
Route::post('admin/tutor/{student}', 'AdminProfileController@updateStudent');

//BLOG POSTS
Route::get('admin/blogcat', 'BlogCatController@index');

//
Route::post('admin/blogcat', 'BlogCatController@saveCat');

Route::get('admin/blogcat/edit/{cat}', 'BlogCatController@edit');
Route::post('admin/blogcat/edit/{cat}', 'BlogCatController@updateCat');



Route::get('admin/posts', 'PostController@index');
Route::get('admin/post/create', 'PostController@showForm');
Route::get('admin/post/edit/{post}', 'PostController@edit');

Route::post('admin/post/create', 'PostController@savePost');
Route::post('admin/post/edit/{post}', 'PostController@updatePost');



//TUTORSHIP
Route::get('admin/tutorship', 'TutorshipController@index');
Route::get('admin/tutorship/{tutorreq}', 'TutorshipController@show');

Route::get('admin/killtrequest/{tutorreq}', 'TutorshipController@killRequest');


Route::get('admin/icanteachrequest', 'TutorshipController@icanTeachRequests');

Route::post('admin/tutoraction/approve', 'TutorshipController@approve');
Route::post('admin/tutoraction/comment', 'TutorshipController@comment');

Route::get('admin/courserequest', 'RequestController@index');
Route::post('admin/requestaction/approve', 'RequestController@approveCourse');

// delete course request
Route::get('/admin/coursereqkill/{crequest}', 'RequestController@deleteCourseRequest');


//ICANTeach delete
Route::post('/admin/requestaction/deleteicanteach', 'TutorshipController@icanTeachDelete');
// approve
Route::post('/admin/requestaction/approveicanteach', 'TutorshipController@icanTeachApprove');

// Admin form submit


//BANK DETAILS
Route::get('admin/bank', 'AdminBankController@index');
Route::get('admin/bank/edit/{bank}', 'AdminBankController@edit');

Route::post('admin/bank', 'AdminBankController@createBank');
Route::post('admin/bank/edit/{bank}', 'AdminBankController@updateBank');
Route::post('admin/bank/delete', 'AdminBankController@deleteBank');


//CONTACTS 
Route::get('/admin/contacts', 'ContactController@index');


// MANAGE LESSONS

Route::get('/admin/lessons', 'AdminLessonController@index');
Route::get('/admin/lessons/{lesson}', 'AdminLessonController@show');
Route::post('/admin/lesson/processingfee', 'AdminLessonController@processingFee');
Route::post('/admin/lesson/mainfee', 'AdminLessonController@mainFee');





//  PAYOUT REQUESTS AND PAYMENT
Route::get('/admin/payoutrequests', 'AdminPayoutController@pendingPayout');
Route::get('/admin/payout/approve/{payout}', 'AdminPayoutController@markPayout');

Route::get('/admin/payouts/', 'AdminPayoutController@payouts');





//============================TUTURS AND USERS ===============================//
//============================TUTURS AND USERS ===============================//

//Tutors and user Pages
Route::get('user/dashboard', 'ProfileController@index');
Route::get('user/profile', 'ProfileController@show');
Route::get('user/photo', 'ProfileController@photo');
Route::get('user/video', 'ProfileController@video');
Route::get('user/password', 'SecurityController@index');

// Referral
Route::get('user/referral', 'ReferralController@show');


Route::get('user/credentials', 'CredentialController@show');
Route::get('user/guarantors', 'GuarantorController@show');
Route::get('user/teaching', 'CredentialController@teachingShow');
Route::get('user/my-subjects', 'CredentialController@icanteachShow');
Route::get('user/create-subjects', 'CredentialController@createNewSubjects');
Route::get('user/join-tutor-request', 'JoinTutorController@show');


//LESSON
Route::get('user/lessons', 'LessonController@show');
Route::get('user/new-lesson', 'LessonController@lessonStepOne');

Route::get('user/newlesson/{category}', 'LessonController@singleCategoryStart');
Route::get('user/new-lesson/{course}', 'LessonController@singleLessonStart');

 //LESSON
Route::get('user/lessonstepthree', 'LessonController@lessonStepThree');

Route::get('user/lessonsubmit', 'LessonController@lessonSubmit');

Route::post('user/searchcourse', 'CourseController@searchCourse');
Route::post('user/new-lesson', 'LessonController@lessonStepTwo');
Route::post('user/lessonstepthree', 'LessonController@lessonStepFour');
Route::post('user/lessonsubmit', 'LessonController@lessonPayment');

Route::post('user/newlesson/{category}', 'LessonController@lessonStepTwo');
Route::post('user/new-lesson/{course}', 'LessonController@lessonStepTwo');

// TOP SEARCH 

Route::post('user/topsearch', 'SearchController@index');




//  TUTOR CLASSES
Route::get('/user/my-classes', 'TutorClassController@index');
Route::get('/user/lessoncomplete/{lesson}', 'TutorClassController@lessonComplete');

Route::post('/user/lessoncomplete/{lesson}', 'TutorClassController@tutorMarkComplete');


Route::get('/user/ratecompletedlesson/{lesson}', 'TutorClassController@rating');
Route::post('/user/ratecompletedlesson/{lesson}', 'TutorClassController@rateCompletedLesson');




// STUDENT ACCEPT LESSON COMPLETE
Route::get('/user/acceptcomplete/{lesson}', 'StudentClassController@acceptComplete');

Route::post('/user/acceptcomplete/{lesson}', 'StudentClassController@doLessonAcceptReject');


//STUDENT RATE LESSON
Route::get('/user/ratelesson/{lesson}', 'StudentClassController@rating');
Route::post('/user/ratelesson/{lesson}', 'StudentClassController@rateLesson');



//APPLYING FOR TUTOR
Route::post('/user/betutor', 'JoinTutorController@beTutor');


// TUTOR PROFILE SHOWCASE
Route::get('/user/tutor/{tutor}', 'TutorController@show');

// BIDDING FOR LESSONS
Route::get('user/biddablelessons', 'BidsController@fetchBiddables');
Route::get('user/biddable/{lesson}', 'BidsController@singleBiddable');
Route::get('user/my-bids/', 'BidsController@allBids');
Route::get('user/my-bids/{bidded}', 'BidsController@singleBid');


// BIDDING LESSON POST
//Route::get('user/mybids/', 'LessonController@allBids');
Route::post('user/biddable/{lesson}', 'BidsController@saveBid');
Route::post('user/my-bids/{bidded}', 'BidsController@saveTutorChat');


// STUDENT SIDE BIDDING LESSON
Route::get('user/lessonchat/{bid}', 'BidsController@lessonChat');
Route::get('user/bids-on-my-lesson/', 'BidsController@bidsOnMyLesson');


Route::post('user/lessonchat/{bid}', 'BidsController@saveStudentChat');


// SAVING CREDENTIALS
Route::post('user/education', 'CredentialController@createEdu');
Route::post('user/workexperience', 'CredentialController@createWexp');
Route::post('user/teaching', 'CredentialController@createUpdate');
Route::post('user/icanteach', 'CredentialController@createIcanTeach');
Route::post('user/myguarantor', 'GuarantorController@add');
Route::post('user/courserequest', 'CredentialController@requestAdd');

Route::post('user/idenfification', 'CredentialController@saveID');

// DELETE COURSE REQUEST 
Route::get('user/coursereqkill/{creq}', 'CredentialController@deleteCourseRequest');



//DELETE
Route::post('/user/delete/education', 'CredentialController@deleteEdu');
Route::post('/user/delete/workexperience', 'CredentialController@deleteWexp');
Route::post('/user/delete/myguarantor', 'GuarantorController@deleteG');

//TUTOR AND USER ACTIONS 
Route::post('user/profile', 'ProfileController@updateProfile');
Route::post('user/video', 'ProfileController@saveVideo');
// PHOTO UPDATES
Route::post('user/photo', 'ProfileController@savePhoto');

Route::post('user/password', 'SecurityController@changePassword');

//LESSONS  READY

Route::get('/home', 'HomeController@index');


// DELETE I CAN TEACH
Route::post('/user/delete/icanteach', 'CredentialController@deleteIcanteach');





//==========================================================================
 //                           TUTOR AND REFERRAL PAYOUT

//==========================================================================
Route::get('/user/payout-request', 'PayoutController@showForm');
Route::post('/user/payout-request', 'PayoutController@saveForm');

Route::get('/user/bank', 'BankController@showForm');
Route::post('/user/bank', 'BankController@saveForm');






//==========================================================================
 //                           PAYMENTS
//==========================================================================
Route::get('/user/payments', 'PaymentController@index');

Route::get('/payments/stackcheck', 'PaymentController@validateStack');

//GoTo PaymentSite
Route::post('/user/paystack', 'PaymentController@goToPayStack');

//GoTo pay options
Route::post('/user/payoptions', 'PaymentController@payOptions');




//===========================================================================
//                      SOCIAL NETWORK VALIDATION
//===========================================================================

Route::get('/facebookredirect', 'SocialAuthController@doFacebookRedirect');
Route::get('/facebookcallback', 'SocialAuthController@doFacebookCallback');

Route::get('/twitterredirect', 'SocialAuthController@doTwitterRedirect');
Route::get('/twittercallback', 'SocialAuthController@doTwitterCallback');


Route::get('/googleredirect', 'SocialAuthController@doGoogleRedirect');
Route::get('/googlecallback', 'SocialAuthController@doGoogleCallback');

Route::get('/linkedinredirect', 'SocialAuthController@doLinkedinRedirect');
Route::get('/linkedincallback', 'SocialAuthController@doLinkedinCallback');
});
