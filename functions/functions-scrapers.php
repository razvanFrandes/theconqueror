<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

function scrapeConquerorChallenges() {
  $client = new Client(HttpClient::create(['verify_peer' => false, 'verify_host' => false]));


  $crawler = $client->request('GET', 'https://www.theconqueror.events/all-challenges/');

  $results = [];


  $crawler->filter('.all-challenges-container .tc-sortable-card.product-impression')->each(function (Crawler $node, $i) use (&$results) {

    if ($node->attr('style')) {
      $style = $node->attr('style');
      preg_match('/url\(\'([^\']+)\'\)/', $style, $matches);
      $backgroundImage = $matches[1] ?? 'Image not found';
    } else {
      $backgroundImage = 'Background image not found';
    }

    $title = $node->filter('.tc-card-name')->text();
    $images = $node->filter('.tc-card-medal-front, .tc-card-medal-back')->each(function (Crawler $imgNode) {
      return $imgNode->attr('src');
    });
    $distance = $node->filter('.tc-card-distance')->text();
    $postcards = $node->filter('.tc-card-postcards')->text();
    $streetView = $node->filter('.tc-card-streetview')->text();

    // Add to results with a unique ID
    $results[] = [
      'id' => $i + 1,
      'backgroundImage' => $backgroundImage,
      'title' => $title,
      'images' => $images,
      'distance' => $distance,
      'postcards' => $postcards,
      'streetView' => $streetView
    ];
  });

  return $results;
}

// $results = scrapeConquerorChallenges();
// header('Content-Type: application/json');
// echo json_encode($results, JSON_PRETTY_PRINT);
