<?php get_header() ?>
    <main class="not-found">
        <div class="wrapper">
            <p class="not-found__code">404</p>
            <h1 class="not-found__title">Diese Seite wurde nicht gefunden.</h1>
            <p class="not-found__description">Die gesuchte Seite existiert nicht oder wurde verschoben.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="to-start">Zur Startseite</a>
        </div>
    </main>
  
<?php get_footer(); ?>
</body>
</html>