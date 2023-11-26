<div data-id="<?php echo $chalange['id']; ?>" class="border border-gray-200 rounded-md">
  <div class="rounded-t-md bg-contain relative bg-top" <?php if ($chalange['backgroundImage']) : ?> style="background-image: linear-gradient(rgba(0,0,0,0) 40%, rgba(255,255,255,1) 53%),url(<?php echo $chalange['backgroundImage']; ?>);" <?php else : ?> style="background-image: linear-gradient(rgba(0,0,0,1) 20%, rgba(255,255,255,5) 53%)" <?php endif; ?>>

    <?php //Discount
    if ($chalange['discount']) : ?>
      <div class="absolute top-0 left-3 px-3 py-1 font-bold z-10" style="background-image: url('<?php echo get_home_url() . 'assets/images/svg/badge.svg'; ?>')">
        <?php echo $chalange['discount']; ?>%
      </div>
    <?php endif; ?>

    <?php //Images 
    if (count($chalange['images']) > 1) : ?>
      <div class="splide slider chalange-gallery is--small overflow-hidden rounded-md relative -top-7" data-arrows="true" data-pagination="true">
        <div class="splide__track">
          <ul class="splide__list">
            <?php foreach ($chalange['images'] as $img) : ?>
              <li class="splide__slide">
                <img class="h-44 mx-auto" src="<?php echo $img; ?>">
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="splide__arrows absolute top-[45%] left-0 right-0 h-10 w-full mx-auto ">
          <button type="button" class="splide__arrow splide__arrow--prev bg-white !left-2 !border !border-black">
            <?php echo get_svg('ico/arrow-right'); ?>
          </button>
          <div class="counterPagination w-full hidden">
            <ul class="splide__pagination text-center">
              <li>/ 2</li>
            </ul>
          </div>
          <button type="button" class="splide__arrow splide__arrow--next bg-white !right-2 !border !border-black">
            <?php echo get_svg('ico/arrow-right'); ?>
          </button>
        </div>
      </div>
    <?php else : ?>
      <img class="h-44 mx-auto relative -top-7" src="<?php echo $chalange['images'][0] ?? 'default_image_path...idknow'; ?>">
    <?php endif; ?>
  </div>

  <div class="p-3 text-center space-y-2 -mt-7 relative">
    <h3 class="font-bold"><?php echo $chalange['title']; ?></h3>
    <div class="text-sm space-y-3">
      <?php if ($chalange['distance']) : ?>
        <p>
          <?php echo number_format(convert_km_to_miles($chalange['distance'])); ?> Miles/
          <?php echo number_format($chalange['distance']); ?> KM
        </p>
      <?php else : ?>
        <p>
          Free Shipping
        </p>
      <?php endif; ?>
      <div class="text-gray-800">
        <p><?php echo $chalange['postcards']; ?></p>
        <p><?php echo $chalange['streetView']; ?></p>
      </div>
    </div>
      <div class="pt-2">
        <button data-id="<?php echo $chalange['id']; ?>" data-price="<?php echo $chalange['price']; ?>"  class="add-to-cart-button btn btn__primary w-full">Add challenge</button>
      </div>
    </div>
</div>