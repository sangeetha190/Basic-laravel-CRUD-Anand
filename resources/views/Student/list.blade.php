@extends('.index')

<style>
    /* loader  Starts*/
    /* Loader */
    .main_container {
        opacity: 0;
        display: none;
        transition: opacity 1s ease-in;
    }

    .loader {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -moz-justify-content: center;
        -webkit-align-items: center;
        -moz-align-items: center;
        -o-align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #ffffff;
    }

    .loader img {
        width: 300px;
    }

    /* loader  Ends*/
</style>
@section('content')
    <div class="main_container">
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
                                    <a href="{{ route('students.edit', $value->id) }}"><i
                                            class="fa-solid fa-pencil"></i></a>
                                    {{-- /delete/{id} --}}
                                    <a href="{{ route('students.delete', $value->id) }}"><i
                                            class="fa-solid fa-trash-can"></i></a>
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
        @if ($message = Session::get('success'))
            {{-- <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div> --}}
            {{-- show the toast Starts --}}
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="liveToast" class="toast position-relative overflow-hidden" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-solid fa-circle-check fa-beat" style="color: #028809"></i>
                        <h5 class="me-auto mx-2 mb-0 pb-0" style="font-size: 18px;color: #028809">
                            Success
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body py-1 mb-2">{{ $message }}</div>
                    <div class="progress1"></div>
                </div>
            </div>
            {{-- show the toast Ends --}}
        @endif
    </div>
@endsection
