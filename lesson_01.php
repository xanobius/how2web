<?php
    // Include the Header for correct HTML Output
$title = 'Lesson 01';
include('html_header.php');

$categories = [
    'movies' => 'Filme',
    'music' => 'Musik',
    'books' => 'Bücher'
];

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
		return getMediaItem($_POST['name']);
	}
}

function getCategory($key, $name){
    global $media;
    if(array_key_exists($key, $media)){
        $content = '<div class="col-lg-4"><h3>' . $name . '</h3>';
        $content .= '<div><ul class="list-group">';

        foreach($media[$key] as $element){
            $content .= getMediaItem($element);
        }

        $content .= getNewItem($key);
        $content .= '</ul></div></div>';
        return $content;
    }
}

?>

<form action="" method="post">
    <select name="type">
        <option>Bitte wählen</option>
        <?php
        foreach($categories as $category_key => $category_name){
            echo '<option value="' . $category_key. '">' . $category_name . '</option>';
        }
        ?>
    </select>
    <input type="text" name="name">
    <input type="submit" value="speichern">
</form>

<div class="container newclass">
    <div class="row">
        <?php
        foreach($categories as $category_key => $category_name){
            echo getCategory($category_key, $category_name);
        }
        ?>
    </div>
</div>

<?php
    // Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>
