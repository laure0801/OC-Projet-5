<?php


namespace App\Repository;

use App\Entity\Post;
use Security\database;
use PDO;

class PostRepository extends database
{
    /**
     * @return array|null
     */
    public function getPosts(): ?array
    {
        $db = $this->dbConnect();
        $query =  $db->prepare('SELECT * FROM post ORDER BY dateCreation DESC');
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Post($data);
        }
        return $var ?? null;
    }

    /**
     * @param $id
     * @return Post
     */
    public function getPost($id): Post
    {
        $db = $this->dbConnect();
        $query =  $db->prepare('SELECT * FROM post WHERE id = ?');
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return new Post($data);
    }

    /**
     * @param $id
     * @param null $title
     * @param $chapo
     * @param $userId
     * @param $content
     * @return bool
     */
    public function updatePost($id, $title, $chapo, $userId, $content): bool
    {
        $db = $this->dbConnect();
        $query =  $db->prepare('UPDATE post SET title = :title, chapo = :chapo, userId = :userId, content = :content, dateUpdate = NOW() WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute([
            'id' => $id,
            'title' => $title,
            'chapo' => $chapo,
            'userId' => $userId,
            'content' => $content,
        ]);
    }

    /**
     * @param $id
     * @return bool
     */
    public function deletePost($id): bool
    {
        $req = $this->dbConnect()->prepare('DELETE FROM post WHERE id = ?');
        return $req->execute([$id]);
    }

    /**
     * @param string $title
     * @param string $chapo
     * @param integer $userId
     * @param string $content
     * @return void
     */
    public function createPost(string $title, string $chapo, integer $userId, string $content): void
    {
        $sql = "INSERT INTO post(title, chapo, userId, content, createdAt) VALUES (:title, :chapo, :userId, :content, NOW())";
        $fields =[
            'title' => $title,
            'chapo' => $chapo,
            'userId' => $userId,
            'content' => $content
        ];
        $this->create($sql, $fields);
    }
}
