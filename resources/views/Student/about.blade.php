{{-- All the Links and scrpit Here --}}
@extends('Student.Layouts.links')
@section('title', 'About the Project')
@section('content')
    <div class="container">
        <h4 class="text-danger">About the Project</h4>
        <ol>
            <li>Basic CRUD operation with js validation and backend validation. If any error, error message shows.</li>
            <li>Toast pop-up <i class="fa-solid fa-arrow-right"></i> From the <span
                    class="bg-success text-white">StudentController</span> passing message and color.</li>
            <li><span class="bg-success text-white">StudentController.php</span></li>
            <pre><code>
                Route::get('/index', [StudentController::class, 'index'])->name('student.index');
                Route::get('/about', [StudentController::class, 'about'])->name('student.about');
                Route::get('/create', [StudentController::class, 'create'])->name('student.create');
                Route::post('/store', [StudentController::class, 'store'])->name('students.store');
                Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
                Route::post('/update/{id}', [StudentController::class, 'update'])->name('students.update');
                Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
                </code></pre>


        </ol>
    </div>
@endsection
