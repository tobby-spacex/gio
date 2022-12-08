<?php

namespace App\Model;

use App\Model;

class User extends Model
{
    public function create(string $email, string $name, $isActive): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (email, full_name, is_active, created_at)
             VALUES (?, ?, ?, NOW())'
        );

        $stmt->execute([$email, $name, $isActive]);

        return (int) $this->db->lastInsertId();
    }

    public function find()
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM users'
        );

        $stmt->execute();

        $users = $stmt->fetch();
        var_dump($users);

        return $users ? $users : [];
    }
}
