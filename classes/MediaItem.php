<?php

class MediaItem{

    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $mediatype;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $desc;

    /**
     * @var int
     */
    protected $rating;

    /**
     * @var array
     */
    protected $tags;

    /**
     * @var mysqli|null
     */
    private $mysql_connection = null;

    public function __construct(){
        global $conn;
        $this->mysql_connection = $conn;
    }

    public function save(){
        if($this->id == 0){
            return $this->addNew();
        }else{
            return $this->update();
        }
    }

    private function addNew(){
        $sql = 'INSERT INTO media_items (`mediatype`, `title`, `desc`, `rating`, `tags`) VALUES (' .
            '"' . $this->mediatype . '",' .
            '"' . $this->title . '",' .
            '"' . $this->desc . '",' .
            '"' . $this->rating . '",' .
            '"' . implode(',', $this->tags) . '");';
        return $this->mysql_connection->query($sql);
    }

    private function update(){
        // TODO: replace with prepared statement
        $qry = 'UPDATE `media_items` SET
            `mediatype` = "' . $this->mediatype . '",
            `title` = "'. $this->title . '",
            `desc` = "'. $this->desc . '",
            `rating` = '. $this->rating . ',
            `tags` = "'. implode(",", $this->tags) . '"
            WHERE `id`=' . $this->id . ';';
        return $this->mysql_connection->query($qry);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return MediaItem
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     * @return MediaItem
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     * @return MediaItem
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return MediaItem
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }


}