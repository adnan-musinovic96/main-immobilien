/* Navigation */
const hamburgerMenu = document.querySelector(".hamburger-menu");
const navigation = document.querySelector(".site-nav");
const navigationLinks = document.querySelectorAll(".nav-link");

hamburgerMenu.addEventListener("click", function () {
  const isOpen = hamburgerMenu.classList.toggle("is-open");
  hamburgerMenu.setAttribute("aria-expanded", String(isOpen));
  const navMobile = navigation.classList.toggle("site-nav-open");
});

function closeNav() {
  if (navigation.classList.contains("site-nav-open")) {
    navigation.classList.remove("site-nav-open");
    hamburgerMenu.classList.toggle("is-open");
  }
}

navigationLinks.forEach((link) => {
  link.addEventListener("click", function () {
    closeNav();
  });
});

if (document.body.id === "home-page") {
  const homeGrid = document.querySelector(".ausgewahlte-immobilien__bottom");
  const catalogGrid = document.querySelector("#catalog-grid");

  let previousView;

  let properties = [];
  let kaufenPrices = [
    { value: "", label: "Alle Preise" },
    { value: "500000", label: "Bis 500.000 €" },
    { value: "1000000", label: "Bis 1.000.000 €" },
  ];

  let mietenPrices = [
    { value: "", label: "Alle Preise" },
    { value: "1000", label: "Bis 1.000€/Monat" },
    { value: "1500", label: "Bis 1.500€/Monat" },
    { value: "2000", label: "Bis 2.000€/Monat" },
  ];

  function updatePriceOption(option) {
    let priceSelect = document.querySelector("#preis");
    priceSelect.replaceChildren();

    option.forEach((item) => {
      let itemHTML = document.createElement("option");
      itemHTML.value = item.value;
      itemHTML.textContent = item.label;
      priceSelect.appendChild(itemHTML);
    });
  }

  const kaufenBtn = document.querySelector("#kaufen");
  const mietenBtn = document.querySelector("#mieten");

  kaufenBtn.addEventListener("change", () => {
    updatePriceOption(kaufenPrices);
  });
  mietenBtn.addEventListener("change", () => {
    updatePriceOption(mietenPrices);
  });

  async function getData() {
    const url = "/wp-json/wp/v2/immobilie?_embed&per_page=100";

    homeGrid.textContent = "Immobilien werden geladen …";

    try {
      let allProperties = [];
      let page = 1;
      let totalPages = 1;

      do {
        const response = await fetch(`${url}&page=${page}`);

        if (!response.ok) {
          throw new Error(`Response status: ${response.status}`);
        }

        const result = await response.json();

        allProperties.push(...result);
        totalPages = Number(response.headers.get("X-WP-TotalPages"));
        page++;
      } while (page <= totalPages);

      properties = allProperties;

      renderProperties(properties.slice(0, 3), homeGrid);
      handleRoute();
    } catch (error) {
      homeGrid.textContent = "Die Immobilien konnten nicht geladen werden.";

      const newSart = document.createElement("button");
      newSart.textContent = "Erneut versuchen";
      newSart.type = "button";

      newSart.addEventListener("click", getData);
      homeGrid.appendChild(newSart);

      console.error(error.message);
    }
  }

  getData();

  async function getTestimonialData() {
    const testimonialUrl = "/wp-json/wp/v2/testimonials";
    const testimonialsGrid = document.querySelector(".testimonials__grid");
    try {
      testimonialsGrid.textContent = "Bewertungen werden geladen …";
      const testimonialsResponse = await fetch(testimonialUrl);

      if (!testimonialsResponse.ok) {
        throw new Error(`Response status: ${testimonialsResponse.status}`);
      }

      let testimonialsResult = await testimonialsResponse.json();
      testimonialsGrid.textContent = "";
      renderTestimonials(testimonialsResult);
      console.log(testimonialsResult);
    } catch (error) {
      testimonialsGrid.textContent =
        "Die Bewertungen konnten nicht geladen werden.";
      console.log(error.message);
    }
  }

  getTestimonialData();
  function renderTestimonials(test) {
    let testimonialsTemplate = document.querySelector("#testimonials-template");
    let testimonialsGrid = document.querySelector(".testimonials__grid");

    test.forEach((a) => {
      const template = testimonialsTemplate.content.cloneNode(true);
      let testimonialsRating = template.querySelectorAll(
        ".testimonials__card-rating span",
      );
      let testimonialsContent = template.querySelector(
        ".testimonials__card-quote blockquote",
      );
      let testimonialsName = template.querySelector(".testimonials__card-name");
      let testimonialsLocation = template.querySelector(
        ".testimonials__card-location",
      );

      testimonialsRating.forEach((star, index) => {
        if (index < a.meta.rating) {
          star.classList.add("gold");
        }
      });

      let rating = a.meta.rating;
      let content = a.content.rendered;
      let name = a.title.rendered;
      let location = a.meta.location;

      //testimonialsRating.textContent = rating.length;
      testimonialsContent.innerHTML = content;
      testimonialsName.textContent = name;
      testimonialsLocation.textContent = location;
      //console.log(a.content, a.meta.rating, a.meta.location, a.title.rendered);
      console.log(testimonialsContent, testimonialsName, testimonialsLocation);

      testimonialsGrid.appendChild(template);
    });

    jQuery(testimonialsGrid).slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      infinite: false,
      prevArrow:
        '<button type="button" class="slick-prev" aria-label="Vorherige Bewertung"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M19 12H5m7-7-7 7 7 7"/></svg></button>',
      nextArrow:
        '<button type="button" class="slick-next" aria-label="Nächste Bewertung"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12h14m-7-7 7 7-7 7"/></svg></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  /** Form */

  const form = document.querySelector("#form");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const selectedOffer = form.querySelector('input[name="angebot"]:checked');
    //console.log(selectedOffer);

    const ort = form.querySelector("#ort");
    const ort_list = ort.selectedOptions;

    const immobilientyp = form.querySelector("#immobilientyp");
    const immobilientyp_list = immobilientyp.selectedOptions;

    const preis = form.querySelector("#preis");
    const preis_list = preis.selectedOptions;

    //console.log(selectedOffer.value, ort_list[0].value, immobilientyp_list[0].value, preis_list[0].value);

    //console.log(properties);

    let filtered_properties = properties.filter((prop) => {
      //console.log(prop.title.rendered, prop._embedded);
      const terms = prop._embedded?.["wp:term"]?.flat() ?? [];
      let offer = terms.find((term) => term.taxonomy === "angebot");
      let city = terms.find((term) => term.taxonomy === "ort");
      let type = terms.find((term) => term.taxonomy === "immobilientyp");
      let matches_type =
        immobilientyp.value === "" || type?.slug === immobilientyp.value;
      let matches_price =
        preis.value === "" || prop.meta.preis <= Number(preis.value);
      let matches_ort = ort.value === "" || city?.slug === ort.value;
      if (
        offer?.slug === selectedOffer.value &&
        matches_type &&
        matches_price &&
        matches_ort
      ) {
        return true;
      } else {
        return false;
      }
    });

    homeView.hidden = true;
    propertyView.hidden = true;
    catalogView.hidden = false;

    renderProperties(filtered_properties, catalogGrid);
  });

  function renderProperties(item, container) {
    //const container = document.querySelector(".ausgewahlte-immobilien__bottom");
    const template = document.getElementById("immobilie-template");
    container.replaceChildren();

    if (item.length === 0) {
      container.textContent = "Keine Immobilien gefunden.";
      return;
    }
    item.forEach((element) => {
      /*console.log(element.id,
                element.title.rendered,
                element._embedded?.["wp:featuredmedia"]?.[0]?.source_url);*/
      const card = template.content.cloneNode(true);

      //console.log(card);
      const title = card.querySelector("h3");
      title.textContent = element.title.rendered;

      const image = card.querySelector("img");
      const image_src =
        element._embedded?.["wp:featuredmedia"]?.[0]?.source_url;
      let priece = card.querySelector(".card-price");

      priece.textContent = new Intl.NumberFormat("de-DE", {
        style: "currency",
        currency: "EUR",
        maximumFractionDigits: 0,
      }).format(element.meta.preis);
      if (image_src) {
        image.src = image_src;
      }

      const dimensions = card.querySelector(".card-dimensions");
      dimensions.textContent =
        new Intl.NumberFormat("de-DE").format(element.meta.wohnflaeche) +
        " m\u00B2";

      const room = card.querySelector(".room");
      room.textContent = element.meta.zimmer + " Zimmer";

      const location = card.querySelector(".card-location");
      const terms = element._embedded?.["wp:term"]?.flat() ?? [];
      const city = terms.find((term) => term.taxonomy === "ort");

      location.textContent = city?.name ?? "Ort nicht angegeben";

      const ribbon = card.querySelector(".ribbon");
      const offer = terms.find((term) => term.taxonomy === "angebot");
      if (offer?.slug === "mieten") {
        //priece.textContent += " / Monat";
        const suffix = document.createElement("span");
        suffix.className = "price-suffix";
        suffix.textContent = " / Monat";
        priece.appendChild(suffix);
      }

      ribbon.textContent = offer?.name ?? "Angebot nicht angegeben";

      const immobilientyp = card.querySelector(".immobilientyp");
      const type = terms.find((term) => term.taxonomy === "immobilientyp");
      immobilientyp.textContent = type?.name ?? "Immobilientyp nich angegeben";

      //console.log(element.id, element.ort, element._embedded);

      const propertyCard = card.querySelector(".immobilien-card");
      //console.log(element.featured_media, element._embedded);

      propertyCard.addEventListener("click", function () {
        window.location.hash = "/immobilie/" + element.id;

        if (homeView.hidden === false) {
          previousView = homeView;
        } else {
          previousView = catalogView;
        }

        homeView.hidden = true;
        catalogView.hidden = true;
        propertyView.hidden = false;

        let heading = propertyView.querySelector("h2");
        let propertyViewImage = propertyView.querySelector("img");
        let propertyPrice = propertyView.querySelector(".property-price");
        let propertyLocation = propertyView.querySelector(".property-location");
        let propertyArea = propertyView.querySelector(".property-area");
        let propertyRooms = propertyView.querySelector(".property-rooms");
        let propertyDescription = propertyView.querySelector(
          ".property-description",
        );
        propertyPrice.textContent = priece.textContent;
        propertyLocation.textContent = location.textContent;
        propertyArea.textContent = dimensions.textContent;
        propertyRooms.textContent = room.textContent;
        propertyDescription.innerHTML = element.content.rendered;

        //console.log("ovo je ", city);

        heading.textContent = element.title.rendered;

        //console.log(image_src, propertyViewImage);

        if (image_src) {
          propertyViewImage.src = image_src;
          propertyViewImage.alt = element.title.rendered;
          propertyViewImage.hidden = false;
        } else {
          propertyViewImage.hidden = true;
          propertyViewImage.removeAttribute("src");
        }
      });

      container.appendChild(card);
    });
  }

  function showProperty(property) {
    homeView.hidden = true;
    catalogView.hidden = true;
    propertyView.hidden = false;

    let title = property.title.rendered;
    let description = document.querySelector(".property-description");

    description.innerHTML = property.content.rendered;

    let img = document.querySelector(".property-image");
    let imgUrl = property._embedded?.["wp:featuredmedia"]?.[0]?.source_url;
    img.url = imgUrl;

    if (imgUrl) {
      img.src = imgUrl;
      img.alt = title;
      img.hidden = false;
    } else {
      img.hidden = true;
      img.removeAttribute("src");
    }

    let propertyPrice = document.querySelector(".property-price");
    propertyPrice.textContent = new Intl.NumberFormat("de-DE", {
      style: "currency",
      currency: "EUR",
      maximumFractionDigits: 0,
    }).format(property.meta.preis);
    const terms = property._embedded?.["wp:term"]?.flat() ?? [];
    const offer = terms.find((term) => term.taxonomy === "angebot");
    if (offer?.slug === "mieten") {
      propertyPrice.textContent += " / Monat";
    }

    let heading = document.querySelector(".property-view h2");
    heading.textContent = title;

    let location = document.querySelector(".property-location");
    let city = terms.find((term) => term.taxonomy === "ort");
    console.log(city);
    location.textContent = city.name;

    const area = document.querySelector(".property-area");

    const room = document.querySelector(".property-rooms");
    room.textContent = property.meta.zimmer;

    window.scrollTo({
      top: 0,
      left: 0,
      behavior: "instant",
    });
  }

  form.addEventListener("reset", function () {
    renderProperties(properties, homeGrid);
    updatePriceOption(kaufenPrices);
  });

  let homeView = document.querySelector("#home-view");
  let catalogView = document.querySelector("#catalog-view");
  let alleImmobilienBtn = document.querySelector("#alleImmobilien");

  alleImmobilienBtn.addEventListener("click", function (event) {
    event.preventDefault();
    homeView.hidden = true;
    catalogView.hidden = false;

    //renderProperties(properties, catalogGrid);
    catalogProperties = properties;
    visibleCount = 6;
    renderCatalog();
    window.location.hash = "/immobilien";
  });

  let siteLogo = document.querySelector("#site-logo");
  siteLogo.addEventListener("click", function (event) {
    event.preventDefault();
    homeView.hidden = false;
    propertyView.hidden = true;
    catalogView.hidden = true;

    //renderProperties(properties, catalogGrid);
    window.location.hash = "/";
  });

  let cityCards = document.querySelectorAll(".location-card");

  cityCards.forEach((card) => {
    card.addEventListener("click", function (e) {
      e.preventDefault();
      //console.log(card.dataset.city);

      let cityProperties = properties.filter((prop) => {
        const terms = prop._embedded?.["wp:term"]?.flat() ?? [];
        const city = terms.find((term) => term.taxonomy === "ort");

        return city?.slug === card.dataset.city;
      });
      homeView.hidden = true;
      catalogView.hidden = false;
      //renderProperties(cityProperties, catalogGrid);
      catalogProperties = cityProperties;
      visibleCount = 6;
      renderCatalog();
    });
  });

  let propertyView = document.querySelector("#property-view");
  let backToCatalog = document.querySelector("#back-to-catalog");

  backToCatalog.addEventListener("click", function () {
    propertyView.hidden = true;
    //homeView.hidden = true;
    //catalogView.hidden = false;

    previousView.hidden = false;
  });

  let navData = document.querySelectorAll(".site-nav a[data-offer]");

  /*navData.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      //console.log(link.dataset.offer);

      let offerProperties = properties.filter((prop) => {
        const terms = prop._embedded?.["wp:term"]?.flat() ?? [];
        let offer = terms.find((term) => term.taxonomy === "angebot");
        return offer?.slug === link.dataset.offer;
      });

      homeView.hidden = true;
      propertyView.hidden = true;
      catalogView.hidden = false;
      renderProperties(offerProperties, catalogGrid);
    });
  });*/

  document
    .querySelector("#back-to-home")
    .addEventListener("click", function () {
      catalogView.hidden = true;
      propertyView.hidden = true;
      homeView.hidden = false;
    });

  function handleRoute() {
    if (
      window.location.hash === "#/immobilien/kaufen" ||
      window.location.hash === "#/immobilien/mieten"
    ) {
      const selectedOffer = window.location.hash.split("/").pop();

      const offerProperties = properties.filter((prop) => {
        const terms = prop._embedded?.["wp:term"]?.flat() ?? [];
        const offer = terms.find((term) => term.taxonomy === "angebot");

        return offer?.slug === selectedOffer;
      });

      homeView.hidden = true;
      propertyView.hidden = true;
      catalogView.hidden = false;

      //renderProperties(offerProperties, catalogGrid);
      catalogProperties = offerProperties;
      visibleCount = 6;
      renderCatalog();
      window.scrollTo(0, 0);
      return;
    }
    if (window.location.hash.startsWith("#/immobilie/")) {
      const id = Number(window.location.hash.slice("#/immobilie/".length));

      let property = properties.find((prop) => {
        return prop.id === id;
      });

      if (property) {
        showProperty(property);
      }

      //console.log(property);

      //console.log("ID oglasa:", id);
    }

    if (window.location.hash === "#/immobilien") {
      homeView.hidden = true;
      propertyView.hidden = true;
      catalogView.hidden = false;
    }

    if (window.location.hash === "#/" || window.location.hash === "") {
      homeView.hidden = false;
      propertyView.hidden = true;
      catalogView.hidden = true;
    }
    if (
      window.location.hash === "#kontakt" ||
      window.location.hash === "#uber-uns"
    ) {
      homeView.hidden = false;
      propertyView.hidden = true;
      catalogView.hidden = true;
    }
  }

  window.addEventListener("hashchange", handleRoute);
  handleRoute();

  /* Contact Form */
  const contactForm = document.querySelector("#contactForm");
  const contactName = document.querySelector("#contact-name");
  const contactEmail = document.querySelector("#contact-email");
  const contactMessage = document.querySelector("#contact-message");
  const contactSubmit = document.querySelector("#submit");
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const contactStatus = document.querySelector("#contact-status");
  const contactWebsite = document.querySelector("#contact-website");

  contactForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    console.log(contactName.value, contactEmail.value, contactMessage.value);

    contactStatus.textContent = "";

    if (
      contactName.value.trim() !== "" &&
      contactMessage.value.trim() !== "" &&
      emailRegex.test(contactEmail.value.trim())
    ) {
      contactSubmit.disabled = true;
      contactStatus.textContent = "Ihre Anfrage wird übermittelt …";
      try {
        const response = await fetch("/wp-json/main-immobilien/v1/contact", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            name: contactName.value.trim(),
            email: contactEmail.value.trim(),
            message: contactMessage.value.trim(),
            website: contactWebsite.value,
          }),
        });
        const result = await response.json();
        if (!response.ok) {
          throw new Error(result.message || "Slanje nije uspjelo.");
        } else {
          contactStatus.textContent = result.message;
          contactForm.reset();
        }

        console.log(result);
      } catch (error) {
        contactStatus.textContent = error.message;
        console.error(error.message);
      } finally {
        contactSubmit.disabled = false;
      }
    } else {
      contactStatus.textContent =
        "Bitte füllen Sie alle Felder aus und geben Sie eine gültige E-Mail-Adresse ein.";
    }
  });

  // LOAD MORE BUTTON
  let loadMore = document.querySelector("#load-more");
  let visibleCount = 6;
  let catalogProperties = [];

  function renderCatalog() {
    let catalogPropertiesNew = catalogProperties.slice(0, visibleCount);
    renderProperties(catalogPropertiesNew, catalogGrid);

    if (visibleCount >= catalogProperties.length) {
      loadMore.hidden = true;
    } else {
      loadMore.hidden = false;
    }
  }

  loadMore.addEventListener("click", function () {
    visibleCount += 6;
    renderCatalog();
  });
}

// FOOTER

let date = new Date();
let currentYear = date.getFullYear();
console.log(currentYear);

let footerYear = document.querySelector(".year");
footerYear.textContent = currentYear;
