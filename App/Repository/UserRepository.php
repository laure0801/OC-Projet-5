<?php


namespace App\Repository;

use App\Entity\User;
use Security\database;
use PDO;
use Symfony\Component\HttpFoundation\Request;

class UserRepository extends database
{

    /**
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     */
    public function createUser($email, $password)
    {
        $sql = 'INSERT INTO user(email, password) VALUES(:email, :password)';
        $fields = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password,
        ];

        $this->create($sql, $fields);
    }

    /**
     * @param $id
     * @return User
     */
    public function getUser($id): User
    {
        $db = $this->dbConnect();
        $query =  $db->prepare('SELECT id, email, password FROM user WHERE id = ?');
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return new User($data);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function findEmail(string $email)
    {
        $query = self::dbConnect()->prepare('SELECT * FROM user WHERE email = :email');
        $query->execute(['email' => $email]);
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $query->fetch();
    }

}
