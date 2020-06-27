# Android documentation

## How to use

```php  
<?php
$client = new Kaidoj\SDK\Android(
    new Kaidoj\SDK\Config($accessToken)
);

// Endpoint is taken from endpoint url
// https://data.42matters.com/api/v2.0/android/apps/{endpointFromHere}.json
$resp = $client->lookup()
    ->package('com.instagram.android')
    ->appCountry('US')
    ->includeUnpublished()
    ->lang('EN')
    ->fields('test1,test2')
    ->callback('testCallback')
    ->fetch();

```

## Supported endpoints

| Endpoint | Method | Supported  |
| :---     | :---  | :---: | 
| Lookup   | lookup | +    |
| Reviews  |  |     |
| Search (text) | search | +   |



