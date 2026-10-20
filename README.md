# Main Immobilien

A luxury real estate demo website for the Frankfurt Rhein-Main region,
built with a custom WordPress theme and custom plugins.

This portfolio project uses PHP, vanilla JavaScript and SCSS.

## Features

- Property catalog with purchase and rental listings
- Filters for location, property type and price
- Different price options for buying and renting
- Load more functionality
- Hash-based navigation and property detail views
- Testimonials managed through WordPress
- Contact form with a custom REST API endpoint
- Loading and error states
- Responsive layout
- Custom 404 page

## Technologies

- WordPress and PHP
- JavaScript
- WordPress REST API
- SCSS
- jQuery and Slick Carousel
- Git

## Project structure

- `assets/` — images, fonts, JavaScript and vendor files
- `scss/` — stylesheet source
- `project-plugins/` — custom WordPress plugins
- `style.css` — compiled theme stylesheet
- `functions.php` — theme setup and asset loading
- `header.php` and `footer.php` — shared templates
- `index.php` — main application
- `404.php` — not-found template

## Local installation

1. Set up a local WordPress installation.
2. Copy this repository into:
   `wp-content/themes/main-immobilien`
3. Copy the custom plugins from `project-plugins` into
   `wp-content/plugins`, preserving their file and folder structure.
4. Activate the theme and custom plugins in WordPress.
5. Open Settings → Permalinks and save the settings.
6. Create property listings and testimonials in the dashboard.
7. Assign featured images, taxonomy terms and custom fields.

The repository contains theme and plugin code.
The WordPress database and uploaded media are not included.

## Development

Install dependencies:

    npm install

Watch and compile SCSS:

    npm run node:sass

## Contact form

The form sends requests to:

    /wp-json/main-immobilien/v1/contact

Email delivery must be configured and tested for the hosting environment.

## Demo content

Property listings, prices and testimonials are fictional demo content.
Property images include AI-generated visuals.

## Current limitations

- Property detail views use hash-based URLs.
- The catalog fetches all property records before filtering them
  in the browser. A larger production catalog would need
  server-side filtering and pagination.

## Author

Adnan Musinovic
