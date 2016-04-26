<?php

class Music extends MediaItem{

    public function __construct()
    {
        parent::__construct();
        $this->mediatype = 'music';
    }

}