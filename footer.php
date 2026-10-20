
    <footer class="site-footer">
        <div class="wrapper">
            <div class="site-footer__top">
                <a href="#" class="site-footer__logo">main immobilien</a>

                <div class="site-footer__nav">
                    <ul>
                        <a href="<?php echo esc_url(home_url('/#/immobilien/kaufen')); ?>">Kaufen</a>
                        <a href="<?php echo esc_url(home_url('/#/immobilien/mieten')); ?>">Mieten</a>
                        <a href="<?php echo esc_url(home_url('/#uber-uns')); ?>">Über uns</a>
                        <a href="<?php echo esc_url(home_url('/#kontakt')); ?>">Kontakt</a>
                    </ul>

                    <ul>
                        <a href="#">Impresium</a>
                        <a href="#">Datenschutz</a>
                        
                    </ul>
                </div>
            </div>

            <p class="site-footer__copyright">&copy; <span class="year"></span> Main Immobilien</p>
        </div>
    </footer>
        <?php wp_footer(); ?>
</body>

</html>