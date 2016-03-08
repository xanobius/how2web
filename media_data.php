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
    'books' => 'Bücher'
];


$sql = "SELECT * FROM media_items";
$result = $conn->query($sql);

$media = [
    'movies' => [],
    'music' => [],
    'books' => []
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

/*
$media = [
    'movies' => [
        [
            'title' => 'Gladiator',
            'description' => 'Maximus rocks the roman empire',
            'rating' => '3',
            'tags' => ['fav', 'tc']
        ],[
            'title' => 'Das Boot',
            'description' => 'Submarine during the WWII.',
            'rating' => '3',
            'tags' => []
        ],[
            'title' => 'Big Fish',
            'description' => 'Dream along and tell about it',
            'rating' => '4',
            'tags' => ['tc']
        ]
    ],
    'music' => [
        [
            'title' => 'Tubular Bells',
            'description' => 'Because Oldfield has other nice things but moonlight shadow',
            'rating' => '1',
            'tags' => ['dnt']
        ],[
            'title' => 'Nectar I',
            'description' => 'German avant-garde black metal',
            'rating' => '3',
            'tags' => ['fav']
        ]
    ],
    'books' => [
        [
            'title' => 'Der Club Dumas',
            'description' => 'Read it and feel the eager to smoke and drink',
            'rating' => '4',
            'tags' => ['fav']
        ],[
            'title' => 'Also sprach Zarathustra',
            'description' => '',
            'rating' => '2',
            'tags' => ['dnt']
        ],[
            'title' => 'Gödel - Escher - Bach',
            'description' => 'German avant-garde black metal',
            'rating' => '3',
            'tags' => ['tc']
        ],[
            'title' => 'ES',
            'description' => 'Horror archetype, shitty end',
            'rating' => '3',
            'tags' => []
        ]
    ]
];
*/
