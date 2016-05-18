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

<body>


      <div id="wrapper">
          @include('includes.left_navbar')

          <div id="page-wrapper" class="gray-bg">
            @include('includes.top_navbar')

            @yield('content')

            @include('includes.footer')
          </div>
     </div>

    <!-- Mainly scripts -->
    <script src="/assets/js/jquery-2.1.1.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="/assets/js/inspinia.js"></script>
    @yield('extra_scripts')
</body>
</html>
