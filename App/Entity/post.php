<?php


namespace App\Entity;

use DateTime;

class Post
{

    private int $id;
    private string $title;
    private string $chapo;
    private string $content;
    private string $dateCreation;
    private ?string $dateUpdate;
    private int $userId;

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
     * @return int
     */
    public function getId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return Post
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     * @return Post
     */
    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;
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
     * @return Post
     */
    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getdateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param string $dateCreation
     * @return Post
     */
    public function setdateCreation(string $dateCreation = null)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    /**
     * @return string
     */
    public function getdateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param string $dateUpdate
     * @return Post
     */
    public function setdateUpdate(string $dateUpdate = null)
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $username
     * @return Post
     */
    public function setUserId(string $userId): Post
    {
        $this->userId = $userId;
        return $this;
    }


}
