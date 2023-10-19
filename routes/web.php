<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Livewire\Academicyear\LivewireAcademicYear;
use App\Http\Livewire\Academicyear\LivewireAcademicYearShow;
use App\Http\Livewire\Attendance\LivewireAttendance;
use App\Http\Livewire\Books\LivewireBooks;
use App\Http\Livewire\Classes\LivewireClasses;
use App\Http\Livewire\Classes\LivewireClassesShow;
use App\Http\Livewire\Library\LivewireLibrarySession;
use App\Http\Livewire\Payments\LivewirePayments;
use App\Http\Livewire\Slots\SlotsLivewire;
use App\Http\Livewire\Students\LivewireStudent;
use App\Http\Livewire\Students\LivewireStudents;
use App\Http\Livewire\Subjects\LivewireSubjectPapers;
use App\Http\Livewire\Subjects\LivewireSubjects;
use App\Http\Livewire\Timetables\TimetableClassesLivewire;
use App\Http\Livewire\Timetables\TimetableClassLivewire;
use App\Http\Livewire\Timetables\TimetableExamLivewire;
use App\Http\Livewire\Users\LivewireUserCreate;
use App\Http\Livewire\Users\LivewireUserEdit;
use App\Http\Livewire\Users\LivewireUsers;
use App\Http\Middleware\VerifyMobile;
use Illuminate\Support\Facades\Route;

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

//public

Route::get('/', [PublicController::class, 'index'])->name('root.index');





Route::middleware([
    // 'verifymobile',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class,  'index'])->name('dashboard');
    Route::get('/users', LivewireUsers::class)->name('users');
    Route::get('/users/create/{role}',LivewireUserCreate::class)->name('user.create');
    Route::get('/users/edit/{id}/{role}',LivewireUserEdit::class)->name('user.edit');
    Route::get('/academic_year', LivewireAcademicYear::class)->name('ay');
    Route::get('/academic_year/{id}', LivewireAcademicYearShow::class)->name('ay.show');
    Route::get('/classes', LivewireClasses::class)->name('classes');
    Route::get('/classes/{classroom_id}/', LivewireClassesShow::class)->name('class.show');
    Route::get('classes/{classroom_id}/attendance',LivewireAttendance::class)->name('class.attendance');

    Route::get('/subjects', LivewireSubjects::class)->name('subjects');
    Route::get('/subjects/{id}/papers', LivewireSubjectPapers::class)->name('subjects.papers');
    Route::get('/students', LivewireStudents::class)->name('students');
    Route::get('/student/{id}', LivewireStudent::class)->name('students.show');
    Route::get('/payments', LivewirePayments::class)->name('payments');
    Route::get('/books', LivewireBooks::class)->name('books');
    Route::get('library/session/{id}',LivewireLibrarySession::class)->name('library.session');
    Route::get('/pdf/invoice/{id}/session/{log_id}',[WapController::class,'pdf'])->name('pdf.invoice_full');
    Route::get('/timetables/exam',TimetableExamLivewire::class)->name('timetable.exam');
    Route::get('/timetables/class/{id}',TimetableClassLivewire::class)->name('timetable.class.show');
    Route::get('/timetables/class',TimetableClassesLivewire::class)->name('timetable.class');
    Route::get('/slots',SlotsLivewire::class)->name('slots');
    Route::get('pdf/timetable/term/{term_id}/class/{class_id}',[PdfController::class,'term_timetable'])->name('pdf.term_timetable');
    Route::post('bot/telegram',[BotController::class,'telegram'])->name('bot.tel');
    Route::post('bot/whatsapp',[BotController::class,'whatsapp'])->name('bot.wap');
    
    // Route::get('/payments/records', LivewirePayments::class)->name('payments');
});
