<?php

function getItemsFromDatabase($media_array){
    global $conn;

    $sql = "SELECT * FROM media_items";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $item = [];

                $item['title'] = $row['title'];
                $item['description'] = $row['desc'];
                $item['rating'] = $row['rating'];
                $item['tags'] = explode(',', $row['tags']);

                $media_array[$row['mediatype']][] = $item;
            }
        }
        return $media_array;
    }else{
        die ('query couldnt executed');
        return [];
    }


}

function getTags(array $ts){
    global $tags;
    $total = '';
    foreach($ts as $t){
        if(array_key_exists($t, $tags)){
            $total .= '<span class="label label-info">' . $tags[$t] . '</span> ';
        }
    }
    return $total;
}

function getRating($rating){
    global $ratings;
    if(array_key_exists($rating,$ratings)){
        return '<span class="badge">' . $ratings[$rating] . '</span>';
    }
}

function getMediaItem($item){
    $content = '<li class="list-group-item">';
    $content .= getRating($item['rating']);
    $content .= $item['title'] . '<br>';
    $content .= '<small>' . $item['description'] . '</small><br>';
    $content .= getTags($item['tags']);
    $content .= '</li>';
    return $content;
}

function saveNewItem(){
    global $conn;
    if(array_key_exists('type', $_POST)){
        $sql = 'INSERT INTO media_items (`mediatype`, `title`, `desc`, `rating`, `tags`) VALUES ('.
            '"' . $_POST['type'] . '",' .
            '"' . $_POST['title'] . '",' .
            '"' . $_POST['description'] . '",' .
            '"' . $_POST['rating'] . '",' .
            '"' . implode(',', $_POST['tags']) . '");';

        if($conn->query($sql)){
            print "Eintrag erfolgreich gespeichert";
        }else{
            print "Eintrag konnte nicht gespeichert werden :(";
        }
    }
}

function getCategory($key, $name){
    global $media;
    if(array_key_exists($key, $media)){
        $content = '<div class="col-lg-3"><h3>' . $name . '</h3>';
        $content .= '<div><ul class="list-group">';

        foreach($media[$key] as $element){
            $content .= getMediaItem($element);
        }

        $content .= '</ul></div></div>';
        return $content;
    }
}

function getMediaItemById(){
    global $conn;
    // ID in url, so it's an edit attempt
    if(isset($_GET['media_item_id'])){
        // Is there a media item with this id?
        $qry = "SELECT * FROM media_items WHERE id=" . $_GET['media_item_id'] . ";";
        $result = mysqli_query($conn, $qry);
        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }
    }
    return [
        'mediatype' => '',
        'title' => '',
        'desc' => '',
        'rating' => '',
        'tags' => ''
    ];
}