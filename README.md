# UPTOBOX
Uptobox &amp; Uptostream scraping data with self modification from API Uptobox Web Based.

## Uptostream
**1. Install Composer:**
```javascript
composer install
```
**2. Install Guzzle as a dependency:**
```javscript
composer require guzzlehttp/guzzle:~6.0
```
**3. Install Dom Crawler:**
```javascript
composer require symfony/dom-crawler
```

**``` Note:```** ``` If your file not available on uptostream, status code and messages will alert numeric 404, if file not found 404. ```

### Description
| HTTP Method  | GET |
| ------------- | :-------------: |
| Output Format  | JSON  |
| API | https://api.heirro.net/uptobox/stream |

| Parameter  | Description |
| :-------------: | ------------- |
| get  | Input Link or FileID Uptobox/Uptostream  |
