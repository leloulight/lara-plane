<!doctype html>
<html lang="ru">
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP -->
    {{-- <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" /> --}}
    <!-- FONT-AWESOME -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{!! asset('css/admin.css') !!}" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-24">
                @yield('content')
            </div>
        </div>
    </div>



<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{!! asset('js/libs/bootstrap.min.js') !!}"></script>
<script src="{!! asset('build/js/global.min.js') !!}"></script>

{{-- Elixir livereload --}}
@if ( Config::get('app.debug') )
<script type="text/javascript">
    document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
</script>
@endif
</body>
</html>