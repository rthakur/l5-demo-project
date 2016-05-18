<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/custom_style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="auth-container">
            <img src="http://placehold.it/200x100" alt="Logo">
            @yield('content')
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="/assets/js/jquery-2.1.1.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>
