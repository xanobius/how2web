<?php
    // Include the Header for correct HTML Output
$title = 'Lesson 01';
include('html_header.php');

$media = [
	'movies' => [
		'Gladiator',
		'Das Boot',
		'Big Fish'
	],
	'music' => [
		'Tubular Bells',
		'Nectar I'
	],
	'books' => [
		'Der Club Dumas',
		'Also Sprach Zarathustra',
		'Gödel - Escher - Bach',
		'ES'
	]
];

function getMediaItem($name){
	return '<li class="list-group-item">' . $name . '</li>';
}

function getNewItem($type){
	if(array_key_exists('type', $_POST) && $_POST['type'] == $type){
		echo getMediaItem($_POST['name']);
	}
}

?>

    <form action="" method="post">
        <select name="type">
            <option>Bitte wählen</option>
            <option value="movie">Film</option>
            <option value="music">Musik</option>
            <option value="book">Buch</option>
        </select>
        <input type="text" name="name">
        <input type="submit" value="speichern">
    </form>

<div class="container newclass">
    <div class="row">
        <div class="col-lg-4">
            <h3>
                Filme
            </h3>
            <div>
                <ul class="list-group">
					<?php
					foreach($media['movies'] as $movie){
						echo getMediaItem($movie);
					}
					getNewItem('movie');
					?>
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <h3>
                Musik
            </h3>
                <ul class="list-group">
					<?php
					foreach($media['music'] as $music){
						echo getMediaItem($music);
					}
					getNewItem('music');
					?>
                </ul>
        </div>
        <div class="col-lg-4">
            <h3>
                Bücher
            </h3>
                <ul class="list-group">
					<?php
					foreach($media['books'] as $book){
						echo getMediaItem($book);
					}
					getNewItem('book');
					?>
                </ul>
        </div>
    </div>
</div>

<?php
    // Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>
