</div> <!-- end wrap -->
<footer class="footer">
    <div class="container">
        <div class="row footer-top">
            <div class="footer-logo-container col-lg-5 col-md-5 col-sm-5 hidden-xs">
                <a href="/" class="footer-logo">Footer-logo</a>
            </div>
            <div class="footer-menu col-lg-13 col-md-15 col-sm-15 col-xs-24">
                <nav class="footer-nav">
                    <ul>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="/spaceships/">Флот</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#">Карта крушений</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="/about/">О нас</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="/contact/">Контакты</a></li>
                      <li class="footer-nav__item"><a class="footer-nav__link" href="#">Купить кофе</a></li>
                    </ul>
                </nav>
            </div>
            <div class="develop col-lg-6 col-md-4 col-sm-4 col-xs-14">
                <p>Разработчик <a href="https://lollipopfly.github.io/" target="_blank" class="develop__link">lollipopfly.github.io</a></p>
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
<script src="{!! asset('build/js/global.min.js') !!}"></script>

{{-- Elixir livereload --}}
@if ( Config::get('app.debug') )
    <script type="text/javascript">
        document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
    </script>
@endif

</body>