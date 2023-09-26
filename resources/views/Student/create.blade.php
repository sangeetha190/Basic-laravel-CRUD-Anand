<style>
    .error-msg {
        color: red;
    }
</style>
@extends('Student.Layouts.links')
@section('content')
    <div class="container">
        <h1>Create</h1>

        <form action="{{ route('students.store') }}" method="POST" id="student-form">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">UserName</label>
                <input type="text" name="student_name" id="student_name" class="form-control" placeholder="sample">
                <span class="error-msg"></span>
                @error('student_name')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="student_email" id="student_email" class="form-control"
                    placeholder="name@example.com">

                <span class="error-msg"></span>
                @error('student_email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                <input type="text" name="student_mobile_number" id="student_mobile_number" class="form-control"
                    placeholder="123456789">
                <span class="error-msg"></span>
                @error('student_mobile_number')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#student-form').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting

                // Clear existing error messages
                $('.error-msg').text('');

                // Basic validation
                var studentName = $('#student_name').val();
                var studentEmail = $('#student_email').val();
                var studentMobile = $('#student_mobile_number').val();

                if (studentName === '') {
                    $('#student_name').next('.error-msg').text('Username is required.');
                } else if (!isValidName(studentName)) {
                    $('#student_name').next('.error-msg').text(
                        'Username should contain letter and number.');
                }
                // else if (!isValidName(studentName)) {
                //     $('#student_name').next('.error-msg').text('Username is required');
                // }

                if (studentEmail === '') {
                    $('#student_email').next('.error-msg').text('Email is required.');
                } else if (!isValidEmail(studentEmail)) {
                    $('#student_email').next('.error-msg').text('Invalid email format.');
                }
                if (studentMobile === '') {
                    $('#student_mobile_number').next('.error-msg').text('Mobile number is required.');
                } else if (!isValidMobile(studentMobile)) {
                    $('#student_mobile_number').next('.error-msg').text('Invalid mobile number.');
                }

                // If there are no errors, submit the form
                if ($('.error-msg').text() === '') {
                    this.submit();
                }
            });

            function isValidName(input) {
                var regex = /^[a-zA-Z0-9\s]*$/;
                return regex.test(input);
            }
            // function isValidName(name) {
            //     var regex = /^[a-zA-Z\s]+$/;
            //     console.log(regex, name);
            //     return regex.test(name);
            // }uuuuuuu
            // Function to validate email format
            function isValidEmail(email) {
                // var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var pattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
                return pattern.test(email);
            }
            // Function to validate mobile number
            function isValidMobile(mobile) {
                var pattern = /^[0-9]{10}$/;
                return pattern.test(mobile);
            }
        });
    </script>
    {{-- script Ends --}}
@endsection
