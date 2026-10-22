<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (is_front_page()) : ?>
    <meta name="description" content="Entdecken Sie ausgewählte Immobilien zum Kaufen und Mieten in Frankfurt am Main, Offenbach und Bad Homburg. Finden Sie Ihr neues Zuhause mit Main Immobilien.">
    <meta property="og:type" content="website">
<meta property="og:locale" content="de_DE">
<meta property="og:site_name" content="Main Immobilien">
<meta property="og:title" content="Main Immobilien – Ihr neues Zuhause im Rhein-Main-Gebiet">
<meta property="og:description" content="Entdecken Sie ausgewählte Immobilien zum Kaufen und Mieten in Frankfurt am Main, Offenbach und Bad Homburg.">
<meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
<meta property="og:image" content="<?php echo esc_url(get_theme_file_uri('/assets/images/social-preview.webp')); ?>">
<meta property="og:image:alt" content="Main Immobilien – Immobilien im Rhein-Main-Gebiet">
<?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php if (is_front_page()) : ?>id="home-page"<?php endif; ?>>

    <?php wp_body_open(); ?>
    <header class="site-header">
        <div class="wrapper">
            <a class="site-logo"
                id="site-logo"
                href="<?php echo esc_url(home_url('/')); ?>">
               
                <img src="<?php  echo esc_url(get_theme_file_uri('/assets/images/logo.png'))?>" alt="Main Immobilien Logo">
            </a>

            <nav class="site-nav" aria-label="Hauptnavigation">
                <a class="nav-link"  href="<?php echo esc_url(home_url('/#/immobilien/kaufen')); ?>" data-offer="kaufen">Kaufen <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right preview-icon nav-icon"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg></a>
                <a class="nav-link"  href="<?php echo esc_url(home_url('/#/immobilien/mieten')); ?>" data-offer="mieten">Mieten <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right preview-icon nav-icon"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg></a>
                <a class="nav-link"  href="<?php echo esc_url(home_url('/#uber-uns')); ?>">Über uns <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right preview-icon nav-icon"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg></a>
                <a class="nav-link"  href="<?php echo esc_url(home_url('/#kontakt')); ?>">Kontakt <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right preview-icon nav-icon"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg></a>
                <p class="nav-copy">frankfurt &amp; rhein-main</p>
            </nav>

            <button type="button" class="hamburger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </button>
        </div>
    </header>