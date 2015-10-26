@include('header')
    <header class="header">
       <a href="#" class="hamburger-btn">
        <span class="hamburger-btn__line"></span>
        <span class="hamburger-btn__line"></span>
        <span class="hamburger-btn__line"></span>
       </a>
       <div class="container">
           <div class="row">
            <div class="logo-container col-md-8">
                <h1 class="logo logo--pages"><a href="/">My logotype</a></h1>
            </div>
            <div class="col-md-16 main-nav-container">
                <nav class="main-nav main-nav--pages">
                    @include('partials.pages.menu')
                </nav>
            </div>
           </div> <!-- row -->
       </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-24">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- end wrap -->
@include('footer')