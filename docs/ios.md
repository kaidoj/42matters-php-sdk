# IOS usage

```php  
<?php
$client = new Kaidoj\SDK\Android(
    new Kaidoj\SDK\Config($accessToken)
);

// Endpoint is taken from endpoint url
// https://data.42matters.com/api/v2.0/ios/apps/{endpointFromHere}.json
$resp = $client->lookup()
    ->id('12340589')
    ->bundleId('com.test')
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
| Reviews  |  reviews |  +    |
| Search (text) | search | +   |
| Advanced query |       |     |
