<?php
$item = getMediaItemById();

if($item['id'] != 0){
    $id_field = '<input type="hidden" name="media_item_id" value="' . $item['id'] . '" />';
    $title = 'Vorhandenen Titel editieren';
}else{
    $id_field = '';
    $title = 'Neuen Titel hinzufügen';
}
?>

<!-- Form to add a new medium -->
<form action="submit.php" method="post" class="form-horizontal">
    <?php echo $id_field; ?>
    <h2><?php echo $title; ?></h2>
    <!-- Dropdown -->
    <div class="form-group">
        <label for="type" class="col-sm-4 control-label">Medium</label>
        <div class="col-sm-8">
            <select name="type" class="form-control">
                <option>Bitte wählen</option>
                <?php
                foreach($categories as $category_key => $category_name){
                    if($item['mediatype'] == $category_key){
                        echo '<option selected value="' . $category_key. '">' . $category_name . '</option>';
                    }else{
                        echo '<option value="' . $category_key. '">' . $category_name . '</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <!-- Text Input -->
    <div class="form-group">
        <label for="name" class="col-sm-4 control-label">Titel</label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" value="<?php echo $item['title']; ?>">
        </div>
    </div>
    <!-- Textarea  -->
    <div class="form-group">
        <label for="description" class="col-sm-4 control-label">Beschreibung</label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control"><?php echo $item['desc']; ?></textarea>
        </div>
    </div>

    <!-- Radio Buttons -->
    <div class="form-group">
        <label class="col-sm-4 control-label">Bewertung</label>
        <div class="col-sm-8">
            <?php foreach($ratings as $r_index => $rating){ ?>
                <div class="radio">
                    <label>
                        <input type="radio"
                            name="rating"
                            value="<?php print $r_index; ?>"
                            <?php if($item['rating'] == $r_index){
                                echo 'checked';
                            } ?>
                        ><?php print $rating; ?>
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
                        <input type="checkbox"
                               name="tags[]"
                               value="<?php print $short; ?>"
                               <?php if(in_array($short, explode(',', $item['tags']))){
                                   echo 'checked';
                               } ?>
                        ><?php print $long; ?>
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