<?php
$item = getMediaItemById();
?>

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
            <input type="text" name="title" class="form-control">
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
            <?php foreach($ratings as $r_index => $rating){ ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="rating" value="<?php print $r_index; ?>"><?php print $rating; ?>
                    </label>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Checkboxes -->
    <div class="form-group">
        <label class="col-sm-4 control-label">Tags</label>
        <div class="col-sm-8">
            <?php foreach($tags as $short => $long){ ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="<?php print $short; ?>"><?php print $long; ?>
                    </label>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-right">
            <input type="submit" value="speichern" class="btn btn-success">
        </div>
    </div>
</form>