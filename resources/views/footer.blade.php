</div> <!-- end wrap -->
<footer class="footer">
    <div class="container">
        <div class="row footer-top">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="/" class="footer-logo">Footer-logo</a>
            </div>
            <div class="develop col-md-12 col-sm-12 col-xs-12">
                <a href="#" class="develop__link">Develop Link</a>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="copyright col-md-24">
                <p class="copyright__text">Copyright &copy; 2015.</p>
            </div>
        </div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{!! asset('js/libs/bootstrap.min.js') !!}"></script>
{{-- <script src='js/libs/jquery.bxslider.min.js'></script> --}}

<script src="{!! asset('bower/masonry/dist/masonry.pkgd.min.js') !!}"></script>
<script src="{!! asset('build/js/global.min.js') !!}"></script>

{{-- Elixir livereload --}}
@if ( Config::get('app.debug') )
    <script type="text/javascript">
        document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
    </script>
@endif

</body>