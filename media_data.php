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

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            // save the row in the same format as befor
        $new_item = [
            'title' => $row["title"],
            'description' =>  $row["desc"],
            'rating' => $row["rating"],
            'tags' => explode(',', $row['tags'])
        ];

            // add the new item to the media array in the correct sub array
        array_push($media[$row["mediatype"]], $new_item);
    }
} else {
    echo "0 results";
}
