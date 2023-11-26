<?php
require_once './config.php';
// uncomment to view data
// degx(json_encode(scrape_data_from_theconqueror()));
require_once './layout/header.php';

$IDS = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : ''; ?>


<div class="">
  <?php if (isset($IDS) && !empty($IDS)) : ?>
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
        <?php $cartChalanges = get_challenges($IDS); ?>
        <?php foreach ($cartChalanges as $item) : ?>
          <div class="cart-item justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
            <img class="w-32 h-auto" src="<?php echo $item['images']['0']; ?>" />
            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
              <div class="mt-5 sm:mt-0">
                <h2 class="text-lg font-bold text-gray-900"><?php echo $item['title']; ?></h2>
                <p class="mt-1 text-xs text-gray-700">
                  <?php if ($item['distance']) : ?>
                    Distance: <?php echo number_format(convert_km_to_miles($item['distance'])); ?> Miles/
                    <?php echo number_format($item['distance']); ?> KM
                  <?php else : ?>
                    Free Shipping
                  <?php endif; ?>
                </p>
                <p class="mt-1 text-xs text-gray-700">Price: <?php echo $item['price']; ?>$</p>
                <div class="pt-4">
                  <button data-id="<?php echo $item['id']; ?>" class="add-to-cart-button is-cart btn btn__small btn__primary">Add challenge</button>
                </div>
              </div>
              <div class="mt-4 sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                <div class=" border-gray-100 text-right">
                  <input data-quantity-id="<?php echo $item['id']; ?>" data-price="<?php echo $item['price']; ?>" class="h-8 w-16 border bg-white text-center text-xs outline-none" type="number" value="1" min="1" />
                </div>
                <div class="flex items-center space-x-4">
                  Total: <p class="text-sm" data-total="<?php echo $item['id']; ?>"><?php echo $item['price']; ?>$</p>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      </div>
      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3 sticky top-[140px]">
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <p class="mb-1 text-lg font-bold" id="order_total">$134.98 USD</p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
      </div>
    </div>
  <?php else : ?>
    <h1 class="mb-10 text-center text-2xl font-bold">Please add a challange before you proceed</h1>
  <?php endif; ?>
</div>
<?php
require_once './layout/footer.php';
