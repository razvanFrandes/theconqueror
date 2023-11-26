<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

function scrape_data_from_theconqueror() {
  $client = new Client(HttpClient::create(['verify_peer' => false, 'verify_host' => false]));

  $crawler = $client->request('GET', 'https://www.theconqueror.events/all-challenges/');

  $results = [];

  $crawler->filter('.all-challenges-container .tc-sortable-card.product-impression')->each(function (Crawler $node, $i) use (&$results) {

    if ($node->attr('style')) {
      $style = $node->attr('style');
      preg_match('/url\(\'([^\']+)\'\)/', $style, $matches);
      $backgroundImage = $matches[1] ?? null;
    } else {
      $backgroundImage = null;
    }

    $title = $node->filter('.tc-card-name')->text();
    $images = $node->filter('.tc-card-medal-front, .tc-card-medal-back')->each(function (Crawler $imgNode) {
      return $imgNode->attr('src');
    });

    $distanceText = $node->filter('.tc-card-distance')->text();
    preg_match('/(\d+)\s*KM/i', $distanceText, $distanceMatches);
    $distanceKm = $distanceMatches[1] ?? '0';
    $postcards = $node->filter('.tc-card-postcards')->text();
    $streetView = $node->filter('.tc-card-streetview')->text();

    $badgeHtml = $node->filter('.tc-card-badge')->count() ? $node->filter('.tc-card-badge')->text() : '';
    preg_match('/(\d+)%/', $badgeHtml, $badgeMatches);
    $discountPercentage = $badgeMatches[1] ?? null;

    $randomPrice = rand(10, 20);

    $results[] = [
      'id' => $i + 1,
      'backgroundImage' => $backgroundImage,
      'title' => $title,
      'images' => $images,
      'distance' => $distanceKm,
      'postcards' => $postcards,
      'streetView' => $streetView,
      'discount' => $discountPercentage,
      'price' => $randomPrice
    ];
  });

  return $results;
}

// $results = scrape_data_from_theconqueror();
// header('Content-Type: application/json');
// echo json_encode($results, JSON_PRETTY_PRINT);
