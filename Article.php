<?php
class Article implements JsonSerializable {
	private $id;
    private $userId;
    private $title;
    private $content;
    public function __construct($id, $userId,$title,$content){
    	$this->id=$id;
        $this->userId=$userId;
        $this->title=$title;
        $this->content=$content;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     *
     * @return self
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
    
    public function jsonSerialize() {
    	return [
    		'id'=>$this->id,
    		'useid'=>$this->userId,
    		'title'=>$this->title,
    		'content'=>$this->content
    	];
    }
}

