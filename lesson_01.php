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


<div class="container">
    <!-- In case there is some Request data - display it here -->
    <?php if($_POST){
        print '<div><pre>' . print_r($_POST, true) . '</pre></div>';
    } ?>

    <!-- Display all Medias stored  -->
    <div class="row">
        <?php
        foreach($categories as $category_key => $category_name){
            echo getCategory($category_key, $category_name);
        }
        ?>
    </div>

    <!-- Form to add a new medium -->
    <form action="" method="post" class="form-horizontal">
        <h2>Neuen Titel hinzufügen</h2>
        <!-- Dropdown -->
        <div class="form-group">
            <label for="type" class="col-sm-4 control-label">Medium</label>
            <div class="col-sm-8">
                <select name="type" class="form-control">
                    <option>Bitte wählen</option>
                    <?php
                    foreach($categories as $category_key => $category_name){
                        echo '<option value="' . $category_key. '">' . $category_name . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <!-- Text Input -->
        <div class="form-group">
            <label for="name" class="col-sm-4 control-label">Titel</label>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <!-- Textarea  -->
        <div class="form-group">
            <label for="description" class="col-sm-4 control-label">Beschreibung</label>
            <div class="col-sm-8">
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
        <!-- Radio Buttons -->
        <div class="form-group">
            <label class="col-sm-4 control-label">Bewertung</label>
            <div class="col-sm-8">
                <div class="radio">
                    <label>
                        <input type="radio" name="rating" value="1">lame
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="rating" value="2">mediocre
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="rating" value="3">pretty cool
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="rating" value="4">awesome as a shark high-fiving a bear during an explosion in space
                    </label>
                </div>
            </div>
        </div>
        <!-- Checkboxes -->
        <div class="form-group">
            <label class="col-sm-4 control-label">Tags</label>
            <div class="col-sm-8">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="fav">favorite
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="tclist">to-consume list
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="dont">don't!
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-right">
                <input type="submit" value="speichern" class="btn btn-success">
            </div>
        </div>
    </form>
</div>

<?php
// Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>
