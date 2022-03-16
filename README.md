# Quick Short URL tool

Quick way to convert a numeric ID to letter represent, to be used as a short URL. You can define the letters for each number. This works on your current domain name, no externals. The tool can also be used for a simple conversion of letter to digits and vice versa.

## How to use as a simple convertor

```php
<?php
use Fallenangelbg\QuickShortURL;

$uniqueId = 57819;
$convertedToLetters = shortUrl::buildShortLink($uniqueId);
echo $convertedToLetters;
// Result is 'QZpfw'

$lettersToBeConverted = 'mwwjj';
$convertedToUniqueId = shortUrl::buildShortLink($uniqueId);
echo $convertedToUniqueId;
// Result is 49933
```

## Usage as a short url

This tool can be helpful when creating a short url to be shared. Presume we have an address like this:

```
https://www.example.com/blog/entry/some-article-to-be-displayed.html
```

If you use a unique numerical ID in your database, you can then create a short URL from it:

```php
use Fallenangelbg\QuickShortURL;
$myId = $db->query("SELECT `id` FROM `blog` WHERE `slug` = 'some-article-to-be-displayed' ");
$shortUrl = $_SERVER['SERVER_NAME'] . "/l/" . shortUrl::buildShortLink($myId);
echo $shortUrl;
// result: www.example.com/l/QZwwj
```

Then you can build a small tool which converts back from the short letters to an unique ID:

```php
use Fallenangelbg\QuickShortURL;
/** get the part after '/l/' */
$shortUrlFromAddress = $parsedString;
$foundId = shortUrl::buildShortLink($shortUrlFromAddress);
$mySlug = $db->query("SELECT `slug` FROM `blog` WHERE `id` = '$foundId' ");

header("Location: https://www.example.com/blog/entry/" . $mySlug . ".html");
exit;
```
