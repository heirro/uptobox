<?php
require __DIR__.'/autoload.php';
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
$files = $_GET['get'];
$arrrplc = array(
    "https://uptobox.com/",
    "http://uptobox.com/",
    "https://uptostream.com/",
    "http://uptostream.com/"
);
$fnctrplc = str_replace($arrrplc, "", $files);
$client = new Client();
$response = $client->request('GET', 'https://uptostream.com/iframe/' .$fnctrplc);
$body = $response->getBody()->getContents();
$crawler = new Crawler($body);
$first = $crawler->filter('script')->parents()->getNode(1)->nodeValue;
preg_match('/filename = \'(.*?)\'/', $first, $filename);
preg_match('/poster: \'(.*?)\'/', $first, $poster);
