<?php

use App\Http\Controllers\StudentController;
use App\Models\Students;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/create', function () {
//     return view('Student.create');
// });
Route::get('/index', [StudentController::class, 'index'])->name('student.index');
Route::get('/about', [StudentController::class, 'about'])->name('student.about');
Route::get('/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::post('/update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
// Sample Routes
// Route::get('/table',function(){
//     return  view('/Student.table');
// });
Route::get('/toast', function () {
    return  view('/Student.toast');
});

// ====================== API Routes ========================
Route::get('/api-data', function () {
    // Fetch JSON data from the API
    $response = Http::get('https://api-thirukkural.vercel.app/api?num=1');

    // Decode the JSON response
    $jsonData = $response->json();
    // $number = $jsonData['number'];
    // dd($jsonData['number'], $jsonData['sect_tam']);

    return view('API.index', ['jsonData' => $jsonData]);
});
