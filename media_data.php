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
