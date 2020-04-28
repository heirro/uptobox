<?php
header('Content-Type: application/json');
require_once __DIR__ . './vendor/autoload.php';
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
<?php
echo eval(base64_decode("aWYgKGlzX251bGwoJGZpbGVuYW1lWzFdKSAmJiBpc19udWxsKCRwb3N0ZXJbMV0pKXsgICAgJGFyciA9IGFycmF5KCAgICAic3RhdHVzIiA9PiA0MDQsICAgICJtc2ciID0+ICJmaWxlIG5vdCBmb3VuZCBvciBmaWxlIG5vdCBzdXBwb3J0IHVwdG9zdHJlYW0iLCAgICAiQ3JlZGl0IiA9PiAiaHR0cHM6Ly9naXRodWIuY29tL2hlaXJyby91cHRvYm94Iik7fWVsc2UgaWYoZW1wdHkoJGZpbGVzKSl7JGFyciA9IGFycmF5KCAgICAic3RhdHVzIiA9PiA0MDAsICAgICJtc2ciID0+ICJtaXNzaW5nIHBhcmFtZXRlciIsICAgICJDcmVkaXQiID0+ICJodHRwczovL2dpdGh1Yi5jb20vaGVpcnJvL3VwdG9ib3giKTt9ZWxzZSBpZihpc3NldCgkZmlsZXMpKXskYXJyID0gYXJyYXkoICAgICJtZXRhRGF0YSIgPT4gYXJyYXkoICAgICAgICAiZmlsZU5hbWUiID0+ICRmaWxlbmFtZVsxXSwgICAgICAgICJ0aHVtYkltZyIgPT4gJHBvc3RlclsxXSwgICAgKSwgICAgIkNyZWRpdCIgPT4gImh0dHBzOi8vZ2l0aHViLmNvbS9oZWlycm8vdXB0b2JveCIpO31lY2hvIGpzb25fZW5jb2RlKCRhcnIsIEpTT05fUFJFVFRZX1BSSU5UKTs="));
?>
