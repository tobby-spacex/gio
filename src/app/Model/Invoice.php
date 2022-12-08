<?php

namespace App\Model;

use App\Model;

class Invoice extends Model
{
    public function create(float $amount, int $userNumber): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO invoices (amount, user_number)
             VALUES (?, ?)'
        );

        $stmt->execute([$amount, $userNumber]);

        return (int) $this->db->lastInsertId();
    }
}
