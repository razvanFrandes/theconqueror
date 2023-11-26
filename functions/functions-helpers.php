<?php

function deg($code) {
  echo '<pre>';
  print_r($code);
  echo '</pre>';
};

function degx($code) {
  deg($code);
  exit();
};

function get_svg($name, $class = false, $image = false) {
  $file_path = __DIR__ . '../assets/images/svg/' . $name . '.svg';

  if (file_exists($file_path)) {

    $file_contents = file_get_contents($file_path);
    $file_contents = str_replace('<svg', '<svg aria-hidden="true" ', $file_contents);

    if ($class) {
      $file_contents = str_replace('<svg', '<svg class="' . $class . '" ', $file_contents);
      $file_contents = str_replace('fill=', '', $file_contents);
    }
    if ($image) {
      $file_contents = str_replace('xlink:href=""', 'xlink:href="' . $image . '" ', $file_contents);
    }
    return $file_contents;
  }
}
