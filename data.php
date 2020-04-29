<?php
header('Content-Type: application/json');
require __DIR__.'/vendor/autoload.php';
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
?>


<?php if (is_null($filename[1]) && is_null($poster[1])){    $arr = array(    "status" => 404,    "msg" => "file not found or file not support uptostream",    "Credit" => "https://github.com/heirro/uptobox");}else if(empty($files)){$arr = array(    "status" => 400,    "msg" => "missing parameter",    "Credit" => "https://github.com/heirro/uptobox");}else if(isset($files)){$arr = array(    "metaData" => array(        "fileName" => $filename[1],        "thumbImg" => $poster[1],    ),    "Credit" => "https://github.com/heirro/uptobox");}echo json_encode($arr, JSON_PRETTY_PRINT);?>
