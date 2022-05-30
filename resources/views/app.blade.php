<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

        <!-- Styles -->
        <link rel="stylesheet" href="/css/material-dashboard.css">
        <link rel="stylesheet" href="/css/btn-oxford.css">
        <link rel="stylesheet" href="/css/btn-blue.css">
        <link rel="stylesheet" href="/css/btn-glaucous.css">
        <link rel="stylesheet" href="/css/btn-crayola.css">
        <link rel="stylesheet" href="/css/btn-cultured.css">
        <link rel="stylesheet" href="/css/datatable.css">
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="g-sidenav-show bg-gray-200">
        @inertia
        <!--   Core JS Files   -->
        <script src="/js/core/popper.min.js"></script>
        <script src="/js/core/bootstrap.min.js"></script>
        <script src="/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/js/material-dashboard.min.js?v=3.0.0"></script>
    </body>
</html>
