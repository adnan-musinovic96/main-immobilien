<?php get_header(); ?>

    <main class="site-main">

        <div id="home-view">
            <!--Hero-->
            <section class="hero" aria-aria-labelledby="hero-title">
                <div class="hero__content">
                    <p class="hero__eyebrow">Frankfurt & Rhein-Main</p>
                    <h1 class="hero-title">Besondere Immobilien.<br>
                        Für besondere Ansprüche.</h1>
                    <p class="hero__description">
                        Entdecken Sie ausgewählte Wohnungen und Häuser
                        in Frankfurt und Umgebung.
                    </p>
                </div>
                <div class="hero__media">
                    <img
                        src="<?php echo esc_url(
                                    get_theme_file_uri('/assets/images/hero.png')
                                ); ?>"
                        alt="Eleganter Wohnbereich mit großen Fenstern"
                        fetchpriority="high">
                </div>
            </section>
            <!--Hero End-->

            <!--Filter Form-->
            <section class="filter-form">
                <div class="filter-form__content">
                    <form action="#" class="form" id="form">
                        <fieldset class="form__top">
<!--<legend>Angebotsart</legend>-->

                            <input type="radio" id="kaufen" value="kaufen" name="angebot" class="form-choice-btn" checked>
                            <label for="kaufen">Kaufen</label>

                            <input type="radio" id="mieten" value="mieten" name="angebot" class="form-choice-btn">
                            <label for="mieten">Mieten</label>
                        </fieldset>
                        <div class="form__bottom">
                            <div class="select-wrapper">
                                <label for="ort">Ort</label>
                                <div class="select-field">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin preview-icon select-field__icon" aria-hidden="true" focusable="false"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                                    <select name="ort" id="ort">
                                    <option value="">Alle Orte</option>
                                    <option value="frankfurt-am-main">Frankfurt am Main</option>
                                    <option value="offenbach-am-main">Offenbach am Main</option>
                                    <option value="bad-homburg">Bad Homburg</option>
                                </select>
                                </div>
                            </div>

                            <div class="select-wrapper">
                                <label for="immobilientyp">Immobilientyp</label>
                                <div class="select-field">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house preview-icon select-field__icon" aria-hidden="true" focusable="false"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    <select name="immobilientyp" id="immobilientyp">
                                    <option value="">Alle Immobilien</option>
                                    <option value="wohnung">Wohnung</option>
                                    <option value="haus">Haus</option>
                                </select>
                                </div>
                            </div>

                            <div class="select-wrapper">
                                <label for="preis">Preis</label>
                                <div class="select-field">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag preview-icon select-field__icon" aria-hidden="true" focusable="false"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"/><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"/></svg>
                                    <select name="preis" id="preis">
                                    
                                    <option value="">Alle Preise</option>
                                    <option value="500000">Bis 500.000 €</option>
                                    <option value="1000000">Bis 12.000.000 €</option>
                                </select>
                                </div>
                            </div>

                            <button type="submit" class="cta-primary" id="btn">Immobilien entdecken</button>
                            <input type="reset" value="Filter zurücksetzen" class="form__reset">
                        </div>
                    </form>
                </div>
            </section>
            <!--Filter Form End-->

            <!--Ausgewählte Immobilien-->
            <section class="ausgewahlte-immobilien">
                <div class="wrapper">
                    <div class="ausgewahlte-immobilien__top">
                        <h2>Ausgewahlte Immobilien</h2>
                        <a href="#" id="alleImmobilien" class="cta">Alle Immobilien ansehen</a>
                    </div>

                    <div class="ausgewahlte-immobilien__bottom">

                    </div>

                    <template id="immobilie-template">
                        <article class="immobilien-card">
                            <div class="immobilien-card__img">
                                <span class="ribbon"></span>
                                
                                <img
                                    src="#"
                                    alt="#"
                                    fetchpriority="high">
                            </div>

                            <div class="immobilien-card__info">
                                <h3></h3>
                                <p class="immobilientyp"></p>
                                <p class="card-location"></p>
                                <p class="card-price"></p>
                                <div class="immobilien-card__info-bottom-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ruler preview-icon card-icon"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/></svg>
                                    <p class="card-dimensions"></p>
                                    <span>&nbsp;•&nbsp;</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed preview-icon card-icon"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
                                    <p class="room"></p>
                                </div>
                            </div>
                        </article>
                    </template>

                </div>
            </section>
            <!--Ausgewählte Immobilien End-->

            <!--Location-->
            <section class="location">
                <div class="wrapper">
                    <div class="location__top">
                        <h2>Zuhause in den besten Lagen</h2>
                        <a href="#" class="cta">Alle Regionen entdecken</a>
                    </div>

                    <div class="location__grid">
                        <a href="#" data-city="frankfurt-am-main" class="location-card">
                            <div class="location-card__image">
                                <img src="<?php echo esc_url(
                                                get_theme_file_uri('/assets/images/ffm.png')
                                            ); ?>" alt="" loading="lazy">
                            </div>
                            <div class="location-card__content">
                                <h3>Frankfurt am Main</h3>
                                <p>Innovativ, international, lebenswert</p>
                            </div>
                        </a>

                        <a href="#" data-city="offenbach-am-main" class="location-card">
                            <div class="location-card__image">
                                <img src="<?php echo esc_url(
                                                get_theme_file_uri('/assets/images/off.png')
                                            ); ?>" alt="" loading="lazy">
                            </div>
                            <div class="location-card__content">
                                <h3>Offenbach</h3>
                                <p>Urban, kreativ, im Aufbruch</p>
                            </div>
                        </a>

                        <a href="#" data-city="bad-homburg" class="location-card">
                            <div class="location-card__image">
                                <img src="<?php echo esc_url(
                                                get_theme_file_uri('/assets/images/bh.png')
                                            ); ?>" alt="" loading="lazy">
                            </div>
                            <div class="location-card__content">
                                <h3>Bad Homburg</h3>
                                <p>Stilvoll, grün, exklusiv</p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!--Location End-->
        </div>

        <div id="catalog-view" hidden>
            <div class="wrapper">
                <h2>Immobilien entdecken</h2>

                <div class="catalog-grid" id="catalog-grid"></div>
                <button id="load-more" type="button">Mehr Laden</button>

                <button type="button" id="back-to-home">← Zurück</button>
            </div>
        </div>

        <div class="property-view" id="property-view" hidden>
            <div class="wrapper">
                <h2>Immobiliendetails</h2>
                <h3>Beschreibung</h3>
                <div class="property-description"></div>
                <img src="#" alt="#" class="property-image">
                <p class="property-price"></p>
                <p class="property-location"></p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ruler preview-icon card-icon"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z"/><path d="m14.5 12.5 2-2"/><path d="m11.5 9.5 2-2"/><path d="m8.5 6.5 2-2"/><path d="m17.5 15.5 2-2"/></svg>
                <p class="property-area"></p>
                <span>&nbsp;•&nbsp;</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed preview-icon card-icon"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
                <p class="property-rooms"></p>
                <button type="button" id="back-to-catalog">Zurück zum Katalog</button>
            </div>
        </div>

        <section class="about" id="uber-uns">
            <div class="wrapper">
                <div class="about__image">
                    <img src="<?php echo esc_url(
                                    get_theme_file_uri('/assets/images/about.png')
                                ); ?>" alt="Immobilien sind persönlich">
                </div>
                <div class="about__content">
                    <h2 class="about__title">Immobilien sind persönlich. <br> Unsere Beratung auch.</h2>
                    <p class="about__description">Wir begleiten Sie mit Engagement und Feingefühl auf dem Weg zu Ihrer Traumimmobilie in Frankfurt und Umgebung. Dabei stehen Ihre individuellen Wünsche und Bedürfnisse immer im Mittelpunkt.</p>
                    <div class="about__benefit">
                        <div class="about__benefit-container">
                            <div class="about__benefit-icon-container"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-group preview-icon about__benefit-icon"><path d="M17 21v-1a2 2 0 00-2-2H9a2 2 0 00-2 2v1"/><path d="M19 10h1a2 2 0 012 2v1"/><path d="M5 10H4a2 2 0 00-2 2v1"/><circle cx="12" cy="11" r="3"/><circle cx="18" cy="4" r="2"/><circle cx="6" cy="4" r="2"/></svg></div>
                            <div class="about__benefit-text-container">
                                <h4>Persönliche Beratung</h4>
                                <p>Individuell, ehrlich und auf Augenhöhe.</p>
                            </div>
                        </div>
                         <div class="about__benefit-container">
                            <div class="about__benefit-icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house preview-icon about__benefit-icon"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                            </div>
                            <div class="about__benefit-text-container">
                                <h4>Ausgewählte Immobilien</h4>
                                <p>Sorgfältig ausgewählt und mit höchsten Ansprüchen.</p>
                            </div>
                        </div>
                         <div class="about__benefit-container">
                            <div class="about__benefit-icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin preview-icon about__benefit-icon"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div class="about__benefit-text-container">
                                <h4>Regionale Expertise</h4>
                                <p>Tiefgehende Marktkenntnis in Frankfurt und der Rhein-Main-Region.</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="about__cta">Mehr über uns</a>
                </div>
            </div>
        </section>

        <!-- Steps -->
         <section class="steps">
            <div class="wrapper">
                <p class="steps__eyebrow">einfach. perönlich. zuverlässtig</p>
                <h2 class="steps__title">In drei Schritten zu Ihrem neuen Zuhause.</h2>

                <div class="steps__grid">
                    <div class="steps__item">
                        <div class="steps__number">01</div>
                        <div class="steps__content">
                            <h3 class="steps__heading">Immobilie entdecken</h3>
                        <p class="steps__description">Stöbern Sie in unserem sorgfältig ausgewählten Immobilienangebot.</p>
                        </div>
                    </div>
                    <div class="steps__item">
                        <div class="steps__number">02</div>
                        <div class="steps__content">
                            <h3 class="steps__heading">Besichtigung vereinbaren</h3>
                        <p class="steps__description">Wir organisieren Ihren individuellen Besichtigungstermin.</p>
                        </div>
                    </div>
                    <div class="steps__item">
                        <div class="steps__number">03</div>
                        <div class="steps__content">
                            <h3 class="steps__heading">Zuhause finden</h3>
                        <p class="steps__description">Wir begleiten Sie auf dem Weg zum Kauf oder zur Miete.</p>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <!--Steps End-->

         <!--Testimonials-->
         <section class="testimonials">
            <div class="wrapper">
                <div class="testimonials__top">
                    <h2>Was unsere Kunden sagen</h2>
                    <a href="#" class="cta">Weitere Bewertungen</a>
                </div>

                <div class="testimonials__grid"> 
                </div>

                <template id="testimonials-template">
                    <!-- Testimonials Card -->
                    <div class="testimonials__card">
                        <div class="testimonials__card-rating">
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                            <span class="rating">&#9733;</span>
                        </div>

                        <div class="testimonials__card-quote">
                            <blockquote></blockquote>
                        </div>

                        <p class="testimonials__card-name"></p>
                        <p class="testimonials__card-location"></p>
                    </div>
                    <!-- Testimonials Card End-->
                </template>
            </div>
         </section>
        <!--Testimonials End-->

        <!--Contact-->
        <section class="contact" id="kontakt">
            <div class="grid">
                <div class="contact__content">
                    <h2 class="contact__title">Lassen Sie uns über Ihr neues Zuhause sprechen.</h2>
                    <p class="contact__description">Wir freuen uns darauf, Sie kennenzulernen und Sie persönlich zu beraten. Nehmen Sie Kontakt mit uns auf.</p>
                    <div class="contact__details">
  <a class="contact__detail" href="tel:+496900000000">
    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
      <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.96.35 1.91.69 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.69A2 2 0 0 1 22 16.92Z"/>
    </svg>
    <span>+49 69 0000 0000</span>
  </a>

  <a class="contact__detail" href="mailto:kontakt@example.com">
    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
      <rect x="3" y="5" width="18" height="14" rx="2"/>
      <path d="m3 7 9 6 9-6"/>
    </svg>
    <span>kontakt@example.com</span>
  </a>

  <div class="contact__detail">
    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
      <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/>
      <circle cx="12" cy="10" r="3"/>
    </svg>
    <span>Frankfurt am Main &amp; Rhein-Main</span>
  </div>
</div>
                </div>
                <form action="#" class="contact__form" id="contactForm">
                    <div class="contact__form-top">
                        <div class="contact__wrapper">
                            <label for="contact-name">Name *</label>
                        <input type="text" id="contact-name" required>
                        </div>

                        <div class="contact__wrapper">
                            <label for="contact-email">Email*</label>
                        <input type="email" id="contact-email" required>
                        </div>
                    </div>

                    <div class="message__wrapper">
                        <label for="contact-message">Ihre Nachricht *</label>
                        <textarea name="message" id="contact-message" required></textarea>
                    </div>
                <!--HoneyPot-->
                <div class="contact-honeypot" aria-hidden="true" inert>
                    <label for="contact-website">Dieses Feld bitte leer lassen</label>
                    <input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off">
                </div> 
                <button type="submit" class="contact__submit" id="submit">Anfrage senden</button>
                <p id="contact-status" role="status" aria-live="polite"></p>
                </form>
            </div>
        </section>
        <!--Contact End-->
    </main>

    <?php get_footer() ?>