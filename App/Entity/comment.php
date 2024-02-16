<?php


namespace Entity;


class Comment
{

    private int $id;
    private int $postId;
    private int $userId;
    private string $status;
    private string $content;
    private string $dateCreation;
    private ?string $dateUpdate='';
    private bool $disabled;

    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas)
    {
        foreach ($datas as $key => $value) {
            $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param int $commentId
     * @return Comment
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $author
     * @return Comment
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Comment
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param string $postId
     * @return Comment
     */
    public function setPostId(int $postId)
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param string $dateCreation
     * @return Comment
     */
    public function setDateCreation(string $dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

     /**
     * @return string
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param string $dateUpdate
     * @return Comment
     */
    public function setDateUpdate(string $dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param mixed $disabled
     * @return Comment
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

}
