<?php
include('database_connection.php');

include('classes/MediaItem.php');
include('classes/Game.php');
include('classes/Book.php');
include('classes/Music.php');
include('classes/Movie.php');

$game = new Game();
$game->setTitle('Watch Dogs');
$game->setDesc('Crappy shit wannabe hacker game');
$game->setRating(1);
$game->setTags(['dnt']);
print '<p>' . ($game->save() ? "Saving successful" : "Saving unsuccessful") . '</p>';

$book = new Book();
$book->setTitle('Momo');
$book->setDesc('Dreamy and so on');
$book->setRating(4);
$book->setTags(['tc']);
print '<p>' . ($book->save() ? "Saving successful" : "Saving unsuccessful") . '</p>';

$movie = new Movie();
$movie->setTitle('The big short');
$movie->setDesc('Capitalism');
$movie->setRating(3);
$movie->setTags(['tc', 'wtf']);
print '<p>' . ($movie->save() ? "Saving successful" : "Saving unsuccessful") . '</p>';

$music = new Music();
$music->setTitle('Bravo Hits 666');
$music->setDesc('Diabolic Bullshit');
$music->setRating(1);
$music->setTags(['dnt']);
print '<p>' . ($music->save() ? "Saving successful" : "Saving unsuccessful") . '</p>';