<?php
require_once './config.php';
// uncomment to view data
// degx(json_encode(scrape_data_from_theconqueror()));
require_once './layout/header.php';

$allChalanges = get_challenges(); ?>


<div class="container text-center">
  <h1 class="text-5xl font-bold">All challenges</h1>
</div>
<div class="container mt-20">
  <div class="{ grid sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-10 gap-7 }">
    <?php foreach ($allChalanges as $chalange) : ?>
      <div class="col-span-2">
        <?php include __DIR__ . '/templates/card.php'; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php
require_once './layout/footer.php';
