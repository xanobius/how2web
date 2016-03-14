<?php

function getItemsFromDatabase($media_array)
{
    global $conn;

    $sql = "SELECT * FROM media_items";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = [];

                $item['id'] = $row['id'];
                $item['title'] = $row['title'];
                $item['description'] = $row['desc'];
                $item['rating'] = $row['rating'];
                $item['tags'] = explode(',', $row['tags']);

                $media_array[$row['mediatype']][] = $item;
            }
        }
        return $media_array;
    } else {
        die ('query couldnt executed');
        return [];
    }
}

function getTags(array $ts)
{
    global $tags;
    $total = '';
    foreach ($ts as $t) {
        if (array_key_exists($t, $tags)) {
            $total .= '<span class="label label-info">' . $tags[$t] . '</span> ';
        }
    }
    return $total;
}

function getRating($rating)
{
    global $ratings;
    if (array_key_exists($rating, $ratings)) {
        return '<span class="badge">' . $ratings[$rating] . '</span>';
    }
}

function getMediaItem($item)
{
    $content = '<li class="list-group-item">';
    $content .= getRating($item['rating']);
    $content .= $item['title'] . '<br>';
    $content .= '<small>' . $item['description'] . '</small><br>';
    $content .= getTags($item['tags']);

    // Buttonrow
    $content .= '<div class="text-right">';

    // Edit Button
    $content .= '<a href="index.php?media_item_id=' . $item['id'] . '">';
    $content .= '<button type="button" class="btn btn-xs" aria-label="Editieren">';
    $content .= '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
    $content .= '</button>';
    $content .= '</a>';
    // Delete Button
    $content .= '<a href="index.php?delete_id=' . $item['id'] . '">';
    $content .= '<button type="button" class="btn btn-xs" aria-label="Editieren">';
    $content .= '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>';
    $content .= '</button>';
    $content .= '</a>';

    $content .= '</div>';
    // END buttonrow

    $content .= '</li>';


    return $content;
}

function processSavings()
{
    if (array_key_exists('media_item_id', $_POST)) {
        updateItem($_POST['media_item_id']);
    } else {
        if (array_key_exists('type', $_POST)) {
            saveNewItem();
        }else{
            if(array_key_exists('delete_id', $_GET)){
                deleteItem($_GET['delete_id']);
            }
        }
    }
}

function saveNewItem()
{
    global $conn;

    $sql = 'INSERT INTO media_items (`mediatype`, `title`, `desc`, `rating`, `tags`) VALUES (' .
        '"' . $_POST['type'] . '",' .
        '"' . $_POST['title'] . '",' .
        '"' . $_POST['description'] . '",' .
        '"' . $_POST['rating'] . '",' .
        '"' . implode(',', $_POST['tags']) . '");';

    if ($conn->query($sql)) {
        print "Eintrag erfolgreich gespeichert";
    } else {
        print "Eintrag konnte nicht gespeichert werden :(";
    }
}

function updateItem($id)
{
    // does this item exists?
    global $conn;
    $qry = "SELECT COUNT(id) as 'amount' FROM media_items WHERE id=" . $id;
    $res = mysqli_query($conn, $qry);
    $cnt = $res->fetch_assoc();
    if($cnt['amount'] == 1){
        $qry = 'UPDATE `media_items` SET 
            `mediatype` = "' . $_POST["type"] . '", 
            `title` = "'. $_POST["title"] . '", 
            `desc` = "'. $_POST["description"] . '", 
            `rating` = '. $_POST["rating"] . ', 
            `tags` = "'. implode(",", $_POST["tags"]) . '" 
            WHERE `id`=' . $id . ';';
        mysqli_query($conn, $qry);
    }else{
        die('ungültige ID');
    }
}

function deleteItem($id)
{
    global $conn;
    $qry = 'DELETE FROM media_items WHERE id=' .$id;
    mysqli_query($conn, $qry);
}

function getCategory($key, $name)
{
    global $media;
    if (array_key_exists($key, $media)) {
        $content = '<div class="col-lg-3"><h3>' . $name . '</h3>';
        $content .= '<div><ul class="list-group">';

        foreach ($media[$key] as $element) {
            $content .= getMediaItem($element);
        }

        $content .= '</ul></div></div>';
        return $content;
    }
}

function getMediaItemById()
{
    global $conn;
    // ID in url, so it's an edit attempt
    if (isset($_GET['media_item_id'])) {
        // Is there a media item with this id?
        $qry = "SELECT * FROM media_items WHERE id=" . $_GET['media_item_id'] . ";";
        $result = mysqli_query($conn, $qry);
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        }
    }
    return [
        'id' => 0,
        'mediatype' => '',
        'title' => '',
        'desc' => '',
        'rating' => '',
        'tags' => ''
    ];
}

