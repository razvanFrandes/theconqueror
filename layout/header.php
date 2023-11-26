<!doctype html>
<html lang="en-US">

<head>
  <title>All the Conqueror Virtual Challenges | The Conqueror Virtual Challenges</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="<?php echo get_home_url(); ?>/assets/dist/css/main.css">
  <link rel="icon" href="<?php echo get_home_url(); ?>/favicon.png" type="image/png">
</head>

<body>
  <header class="mastheader sticky top-0 z-20">
    <div class="bg-gold-300 text-center text-black text-sm py-2 px-2">
      <b>THE LORD OF THE RINGS</b> Virtual Challenges are <b>HERE!</b>
    </div>
    <div class="mastheader__container {  bg-black }">
      <div class="{ container flex justify-between items-center } { md:h-20  }  { text-white }  ">
        <div>
          <a href="<?php echo get_home_url(); ?>" class="hidden md:flex w-[100px] relative -top-[4px]">
            <?php echo get_svg('logo'); ?>
          </a>
          <a href="<?php echo get_home_url(); ?>" class="w-[100px] flex md:hidden">
            <?php echo get_svg('logo_mobile'); ?>
          </a>
        </div>
        <div class="flex gap-7">
          <div id="main_nav" class="flex items-center gap-7">
            <div>
              <a href="#">Challenges</a>
            </div>
            <div>
              <a href="#">LOTR</a>
            </div>
            <div>
              <a href="#">Merch</a>
            </div>
            <div>
              <a href="#">More</a>
            </div>
            <div>
              <a href="#">Corporate</a>
            </div>
            <div>
              <a href="#">Shop</a>
            </div>
          </div>
          <div id="user_nav" class="flex items-center gap-7">
            <div>
              <div class="cursor-pointer"><?php echo get_svg('ico/heart', 'fill-white'); ?></div>
            </div>
            <div>
              <a href="<?php echo get_home_url(); ?>/cart.php" id="show_cart" class="block cursor-pointer relative"><?php echo get_svg('ico/shopping-cart', 'fill-white'); ?>
                <span class="count_cart absolute -top-4 -right-4 bg-red-500 text-white rounded-full text-[10px] text-center px-1 leading-5 min-w-[20px]"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="mastcontent mt-20">