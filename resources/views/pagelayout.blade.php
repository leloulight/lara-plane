@include('header')
    <header class="header">
        page header
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-24">
                @yield('content')
            </div>
        </div>
    </div>
@include('footer')