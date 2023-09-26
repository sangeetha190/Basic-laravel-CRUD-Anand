{{-- All the links and script Here --}}
@extends('Student.Layouts.links')
<style>
    .toast-header {
        border-bottom: none !important;
    }

    /* .toast.position-relative.overflow-hidden {
        border-left: 4px solid #028809;
    } */

    .toast .progress1 {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background-color: #fff;
    }

    .toast .progress1:before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width: 100%;
        background-color: #028809;
    }

    .progress1:before {
        animation: progress 5s linear forwards;
    }

    .toast-header i {
        font-size: 19px;
    }

    .toast-body,
    .toast-header {
        background-color: #fff;
    }

    @keyframes progress {
        100% {
            right: 100%;
        }
    }

    /* Delete style Starts */
    .fa-solid.fa-triangle-exclamation {
        color: red;
        font-size: 25px;
    }

    /* Delete style Ends */
</style>
@section('title', 'Student List')

@section('content')
    <h1 class="text-center mt-2">Student List</h1>
    {{-- @foreach ($student as $value)
    {{ dd($value->name) }}
    <p>{{ $value->id }}</p>
    <h3>{{ $value->name }}</h3>
    <p>{{ $value->email }}</p>
    <p>{{ $value->mobile_number }}</p>
@endforeach --}}
    <div class="container mt-5">
        <div class="my-3 d-flex justify-content-end">
            <a href="{{ route('student.create') }}"> <button class="btn btn-dark"><i class="fa-solid fa-user-plus"></i>
                    Create Student</button></a>
        </div>

        <table id="data-table" class="table table-striped table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $value)
                    <tr>
                        {{-- {{ dd($value->name) }} --}}
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->mobile_number }}</td>
                        <td>
                            {{-- {{ route('students.update', $student->id) }} --}}
                            {{-- {{ route('students.edit', ['id' => $student->id]) }}" --}}
                            <div class="d-flex justify-content-lg-around">
                                <a href="{{ route('students.edit', $value->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                {{-- /delete/{id} --}}
                                {{-- <a href="{{ route('students.delete', $value->id) }}"> --}}
                                <i class="fa-solid fa-trash-can" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                {{ $value->id }}
                                {{-- </a> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Modal Starts --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-triangle-exclamation"></i> Delete
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete the data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Ends --}}
    @if ($message = Session::get('success'))
        {{-- Extract the color from the session data --}}
        @php
            $color = Session::get('color', 'green'); // Default to green if color is not provided
        @endphp

        {{-- Show the toast starts --}}
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast position-relative overflow-hidden" role="alert" aria-live="assertive"
                aria-atomic="true" style=" border-left: 4px solid {{ $color }};">
                <div class="toast-header">
                    <i class="fa-solid fa-circle-check fa-beat" style="color: {{ $color }}"></i>
                    <h5 class="me-auto mx-2 mb-0 pb-0" style="font-size: 18px; color: {{ $color }}">
                        Success
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body py-1 mb-2">{{ $message }}</div>
                {{-- <div class="progress1"></div> --}}
                <div class="progress1" style="position: relative; display: inline-block;">
                    <div
                        style="content: ''; position: absolute; bottom: 0; right: 0; height: 100%; width: 100%; background-color:{{ $color }}; animation: progress 5s linear forwards;">
                    </div>
                </div>
            </div>
        </div>
        {{-- Show the toast ends --}}
    @endif

    </div>
@endsection
