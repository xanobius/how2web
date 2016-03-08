<?php

$tags = [
    'fav' => 'favorite',
    'tc' => 'to-consume-list',
    'dnt' => 'don\'t'
];

$ratings = [
    '1' => 'lame',
    '2' => 'mediocre',
    '3' => 'pretty cool',
    '4' => 'awesome'
];

$categories = [
    'movies' => 'Filme',
    'music' => 'Musik',
    'books' => 'Bücher',
    'games' => 'Spiele'
];


$sql = "SELECT * FROM media_items";
$result = $conn->query($sql);

$media = [
    'movies' => [],
    'music' => [],
    'books' => [],
	'games' => []
];

$media = getItemsFromDatabase($media);
