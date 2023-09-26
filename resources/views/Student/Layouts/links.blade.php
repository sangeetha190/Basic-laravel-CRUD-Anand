<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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

</head>

<body>
    {{-- header starts --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('/images/Common_image/logo.png') }}"
                    alt="logo" width="100px" style="position: relative;top:-8px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('student.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.create') }}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- header Ends --}}

    <h3 class="text-center mt-2">Basic CRUD Operation </h3>
    <!-- loader -->
    <div class="page_loader">
        <div class="loader">
            <img src="https://i.pinimg.com/originals/58/e4/a4/58e4a4e4fa041a11f796a2014b1bcfa4.gif" alt="loader" />
        </div>
    </div>
    <!-- end loader -->

    @yield('content')



    {{-- For DataTable --}}
    <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    {{-- For toast Start --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>
    <script>
        new bootstrap.Toast(document.querySelector('#liveToast')).show();
    </script>
    {{-- Loader Starts --}}
    <script>
        "use strict";
        var loader = document.querySelector(".loader");
        const main_content = document.querySelector(".main_container");
        window.addEventListener("load", function() {
            loader.style.opacity = 0;
            loader.style.display = "none";
            main_content.style.display = "block";
            main_content.style.opacity = 1;
        });
    </script>
    {{-- Loader Ends --}}

</body>

</html>
