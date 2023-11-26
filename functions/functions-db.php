<?php

function get_challenges($ids = null) {
  $db = file_get_contents(__DIR__ . '/../database.json');
  $challenges = json_decode($db, true);

  if (!empty($ids)) {
    $ids = json_decode($ids, true);


    if (is_array($ids) && isset($ids[0]) && is_array($ids[0])) {
      $ids = array_column($ids, 'id');
    }

    if (is_array($ids)) {
      return array_filter($challenges, function ($challenge) use ($ids) {
        return in_array($challenge['id'], $ids);
      });
    }
  }

  return $challenges; 
}
