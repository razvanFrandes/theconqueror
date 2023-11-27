<?php
require_once './config.php';
require_once './layout/header.php'; ?>


<div class="container text-center">
  <h1 class="text-5xl font-bold">Creative Proccess</h1>
</div>
<div class="container mt-20 max-w-xl">
  <h1 class="text-2xl font-bold mb-4">Project README</h1>

  <p class="mb-4">
    This project uses PHP and JavaScript for its implementation. Although React or a JS library could have simplified certain aspects, a custom JavaScript function was developed to manage minimal state requirements for this project.
  </p>

  <h2 class="text-xl font-semibold mb-2">1. Assets Management</h2>
  <ul class="list-disc list-inside mb-4">
    <li>Utilized Webpack configuration with Tailwind CSS integration.</li>
    <li>Implemented the latest ES version for JavaScript.</li>
  </ul>

  <h2 class="text-xl font-semibold mb-2">2. Loading Data</h2>
  <p class="mb-4">
    A scraper was created to pull all necessary data from the original site <a href="https://www.theconqueror.events/" class="text-blue-500">www.theconqueror.events</a>. This included fetching challenge links and extracting images from each individual challenge.
  </p>

  <h2 class="text-xl font-semibold mb-2">3. CSS</h2>
  <ul class="list-disc list-inside mb-4">
    <li>Used PostCSS preprocessor for developing mobile header navigation and the slider UI for each card.</li>
    <li>Implemented Tailwind CSS for rapid prototyping.</li>
  </ul>

  <h2 class="text-xl font-semibold mb-2">4. JavaScript</h2>
  <ul class="list-disc list-inside mb-4">
    <li>Developed a state management system to store IDs and prices for each challenge, affecting cart icon changes and price updates on the cart page.</li>
    <li>Created a cookie function helper.</li>
    <li>State is preserved in cookies, allowing the user to maintain their session state for 7 days.</li>
    <li>Though React was not used, the principle of state management was followed.</li>
  </ul>

  <h2 class="text-xl font-semibold mb-2">5. PHP</h2>
  <ul class="list-disc list-inside mb-4">
    <li>Developed helper functions for debugging, fetching SVGs, converting KM to miles, and retrieving the homepage URL.</li>
    <li>Simple and straightforward routing with three main pages: Home, Cart, and README.</li>
    <li>Implemented the scraper for data extraction.</li>
  </ul>
</div>
<?php
require_once './layout/footer.php';
