<?php

class Movie extends MediaItem{

    public function __construct()
    {
        parent::__construct();
        $this->mediatype = 'movies';
    }

}