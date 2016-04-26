<?php

class Game extends MediaItem{

    public function __construct()
    {
        parent::__construct();
        $this->mediatype = 'games';
    }

}