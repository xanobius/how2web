<?php

function getMediaItem($item){
        // TODO display all the attributes
    return '<li class="list-group-item">' . $item['title'] . '</li>';
}

function getNewItem($type){
        // TODO save all attributes and not only the name
    if(array_key_exists('type', $_POST) && $_POST['type'] == $type){
        $item = [
            'title' => $_POST['title']?:''
        ];


        return getMediaItem($item);
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
