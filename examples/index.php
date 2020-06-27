<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$dotenv->required('ACCESS_TOKEN');

$config = new \Kaidoj\SDK\Config($_ENV['ACCESS_TOKEN']);

// package=com.instagram.android
if (isset($_GET['package'])) {
    try {
        $client = new \Kaidoj\SDK\Android($config);
        $resp = $client->lookup()
            ->package('com.instagram.android')
            ->fetch();
        print_r($resp);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
    exit;
}
// id=389801252
if (isset($_GET['id'])) {
    try {
        $client = new \Kaidoj\SDK\IOS($config);
        $resp = $client->lookup()
            ->id($_GET['id'])
            ->fetch();
        print_r($resp);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
    exit;
}

if (isset($_GET['search'])) {
    try {
        $client = new \Kaidoj\SDK\Android($config);
        $resp = $client->search()
            ->query($_GET['search'])
            ->fetch();
        print_r($resp);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }

    try {
        $client = new \Kaidoj\SDK\IOS($config);
        $resp = $client->search()
            ->query($_GET['search'])
            ->fetch();
        print_r($resp);
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
    exit;
}

echo '<a href="?package=com.instagram.android">Lookup android</a> <br/>';
echo '<a href="?package=389801252">Lookup IOS</a> <br/>';
echo '<a href="?search=com.instagram.android">Search</a> <br/>' ;
