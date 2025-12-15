<?php

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-mentor', function () {
    return view('MentorDashboard');
})->name('MentorDashboard');

Route::get('/dashboard-platinum', function () {
    return view('PlatinumDashboard');
})->name('PlatinumDashboard');

Route::get('/dashboard-staff', function () {
    return view('StaffDashboard');
})->name('StaffDashboard');

// Publication route
Route::get('/platinum/publication/mypublication', [PublicationController::class, 'MyPublication'])->name('manage_publication.PlatinumMyPublication');

Route::get('/platinum/publication/upload', [PublicationController::class, 'upload'])->name('manage_publication.PlatinumUploadPublication');
Route::post('/platinum/publication/mypublication', [PublicationController::class, 'store'])->name('manage_publication.store');

Route::get('/platinum/publication/{publication}/edit', [PublicationController::class, 'edit'])->name('manage_publication.PlatinumEditPublication');
Route::put('/platinum/publication/{publication}/update', [PublicationController::class, 'update'])->name('manage_publication.update');

Route::delete('/platinum/publication/{publication}/delete', [PublicationController::class, 'delete'])->name('manage_publication.delete');

Route::get('/platinum/publication/{publication}/view', [PublicationController::class, 'viewPlatinum'])->name('manage_publication.PlatinumViewPublication');

Route::get('/platinum/publication/search', [PublicationController::class, 'search'])->name('manage_publication.PlatinumSearchPublication');

Route::get('/mentor/publication/list', [PublicationController::class, 'list'])->name('manage_publication.MentorListPublication');
Route::get('/mentor/publication/{publication}/generatePublication', [PublicationController::class, 'generatePDF'])->name('manage_publication.MentorGeneratePublication');
Route::get('/mentor/publication/generateFiltered', [PublicationController::class, 'generatePDFFiltered'])->name('manage_publication.MentorGenerateFilteredPublication');
Route::get('/mentor/publication/{publication}/view', [PublicationController::class, 'viewMentor'])->name('manage_publication.MentorViewPublication');

// Expert route
Route::get('/platinum/expertdomain/findexpert', [ExpertController::class, 'find'])->name('manage_expertdomain.FindExpert');
Route::get('/platinum/expertdomain/download', [ExpertController::class, 'download'])->name('manage_expertdomain.Download');


Route::get('/platinum/expertdomain/uploadexpert', [ExpertController::class, 'UploadExpert'])->name('manage_expertdomain.UploadExpert');
Route::post('/platinum/expertdomain/savexpert', [ExpertController::class, 'SaveExpert'])->name('manage_expertdomain.SaveExpert');

Route::get('/platinum/expertdomain/{expertdomain}/viewexpert', [ExpertController::class, 'view'])->name('manage_expertdomain.ViewExpert');
Route::get('/platinum/expertdomain/{expertdomain}/{publicationTitle}/viewpublication', [ExpertController::class, 'viewpublication'])->name('manage_expertdomain.ViewPublication');

Route::get('/platinum/expertdomain/myexpertlist', [ExpertController::class, 'MyExpertList'])->name('manage_expertdomain.MyExpertList');

Route::get('/platinum/expertdomain/{expertdomain}/edit', [ExpertController::class, 'edit'])->name('manage_expertdomain.EditExpert');
Route::put('/platinum/expertdomain/{expertdomain}/update', [ExpertController::class, 'update'])->name('manage_expertdomain.UpdateExpert');
Route::delete('/platinum/expertdomain/{expertdomain}/delete', [ExpertController::class, 'delete'])->name('manage_expertdomain.DeleteExpert');

Route::get('/mentor/expertdomain/mentorfindexpert', [ExpertController::class, 'search'])->name('manage_expertdomain.MentorFindExpert');
Route::get('/mentor/expertdomain/{expertdomain}/mentorviewexpert', [ExpertController::class, 'MentorViewExpert'])->name('manage_expertdomain.MentorViewExpert');
Route::get('/mentor/expertdomain/{expertdomain}/{publicationTitle}/mentorviewpublication', [ExpertController::class, 'MentorViewPublication'])->name('manage_expertdomain.MentorViewPublication');

// Research Information route

Route::get('platinum/research/listResearch', [ResearchController::class, 'ResearchInfo'])->name('manage_research.PlatinumresearchInfo');
Route::get('platinum/research/addResearch', [ResearchController::class, 'addResearch'])->name('manage_research.PlatinumaddResearch');
Route::post('platinum/research/saveResearch', [ResearchController::class, 'saveResearch'])->name('manage_research.saveResearch');
Route::get('platinum/research/editResearch/{id}', [ResearchController::class, 'editResearch'])->name('manage_research.PlatinumeditResearch');
Route::post('platinum/research/updateResearch', [ResearchController::class, 'updateResearch'])->name('manage_research.updateResearch');
Route::get('platinum/research/deleteResearch/{id}', [ResearchController::class, 'deleteResearch'])->name('manage_research.deleteResearch');
Route::get('platinum/research/viewResearch/{id}', [ResearchController::class, 'view'])->name('manage_research.PlatinumviewResearch');

// Registration route
Route::get('staff/register/addregister', [UsersController::class, 'addregister'])->name('manage_registration.StaffRegisterPlatinum');
Route::post('staff/register/saveRegistration', [UsersController::class, 'saveRegistration'])->name('manage_registration.StaffRegisterPlatinum');
Route::get('mentor/register/MentorviewRegister/{id}', [UsersController::class, 'MentorviewRegister'])->name('manage_registration.Mentorview');
Route::get('mentor/register/listRegistered', [UsersController::class, 'listRegistered'])->name('manage_registration.MentorViewRegisteredUser');

// Profile route
Route::get('platinum/profile/platinumList', [UsersController::class, 'listPlatinum'])->name('manage_profile.PlatinumList');
Route::get('platinum/profile/viewRegister/{id}', [UsersController::class, 'PlatinumviewRegister'])->name('manage_profile.PlatinumViewPlatinumProfile');
Route::get('platinum/profile/viewProfile/{id}', [UsersController::class, 'viewProfile'])->name('manage_profile.PlatinumViewProfile');
Route::get('platinum/profile/editProfile/{id}', [UsersController::class, 'editProfile'])->name('manage_profile.PlatinumEditProfile');
Route::put('platinum/profile/updateProfile/{id}', [UsersController::class, 'updateProfile'])->name('manage_profile.PlatinumupdateProfile');

Route::get('staff/profile/staffList', [UsersController::class, 'index'])->name('manage_profile.StaffListUsers');
Route::get('staff/profile/viewRegister/{id}', [UsersController::class, 'StaffviewRegister'])->name('manage_profile.StaffViewPlatinumProfile');
Route::get('staff/profile/viewStaff/{id}', [UsersController::class, 'StaffviewStaff'])->name('staff.view');
Route::get('staff/profile/viewMentor/{id}', [UsersController::class, 'StaffviewMentor'])->name('mentor.view');
Route::get('staff/profile/report', [UsersController::class, 'generateReport'])->name('staff.report');
Route::get('staff/profile/{id}', [UsersController::class, 'showStaffProfile'])->name('profile.staff.view');
Route::get('staff/profile/edit/{id}', [UsersController::class, 'editStaffProfile'])->name('profile.staff.edit');
Route::post('staff/profile/update', [UsersController::class, 'updateStaffProfile'])->name('profile.staff.update');

Route::get('mentor/profile/mentorList', [UsersController::class, 'indexMentor'])->name('manage_profile.MentorListUsers');
Route::get('mentor/profile/viewRegister/{id}', [UsersController::class, 'MentorviewRegister'])->name('manage_profile.MentorViewPlatinumProfile');
Route::get('mentor/profile/viewStaff/{id}', [UsersController::class, 'MentorviewStaff'])->name('manage_profile.MentorViewStaffProfile');
Route::get('mentor/profile/viewMentor/{id}', [UsersController::class, 'MentorviewMentor'])->name('manage_profile.MentorViewMentorProfile');
Route::get('/profile/mentor/{id}', [UsersController::class, 'showMentorProfile'])->name('profile.mentor.view');
Route::get('/profile/mentor/edit/{id}', [UsersController::class, 'editMentorProfile'])->name('profile.mentor.edit');
Route::post('/profile/mentor/update', [UsersController::class, 'updateMentorProfile'])->name('profile.mentor.update');

Route::get('/forgetpass', [UserController::class, 'forgetpass'])->name('forgetpass');
Route::post('/resetpass', [UserController::class, 'reset'])->name('resetpass');
require __DIR__.'/auth.php';
