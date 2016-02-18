<?php
    // Include the Header for correct HTML Output
$title = 'Lesson 01';
include('html_header.php');
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
                    <li class="list-group-item">Gladiator</li>
                    <li class="list-group-item">Das Boot</li>
                    <li class="list-group-item">Big Fish</li>
					<?php
					if(array_key_exists('type', $_POST) && $_POST['type'] == 'movie'){
						print '<li class="list-group-item">' . $_POST['name'] . '</li>';
					}
					?>
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <h3>
                Musik
            </h3>
                <ul class="list-group">
                    <li class="list-group-item">Tubular Bells</li>
                    <li class="list-group-item">Nectar I</li>
					<?php
					if(array_key_exists('type', $_POST) && $_POST['type'] == 'music'){
						print '<li class="list-group-item">' . $_POST['name'] . '</li>';
					}
					?>
                </ul>
        </div>
        <div class="col-lg-4">
            <h3>
                Bücher
            </h3>
                <ul class="list-group">
                    <li class="list-group-item">Der Club Dumas</li>
                    <li class="list-group-item">Also Sprach Zarathustra</li>
                    <li class="list-group-item">Gödel - Escher - Bach</li>
                    <li class="list-group-item">ES</li>
					<?php
					if(array_key_exists('type', $_POST) && $_POST['type'] == 'book'){
						print '<li class="list-group-item">' . $_POST['name'] . '</li>';
					}
					?>
                </ul>
        </div>
    </div>
</div>

<?php
    // Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>
