<?php

declare(strict_types=1);

namespace App\Model;

use App\Model;
use App\Model\User;;
use App\Model\Invoice;

class SignUp extends Model
{
    public function __construct(protected User $userModel, protected Invoice $invoiceModel)
    {
        parent::__construct();
    }

    public function register(array $userInfo, array $invoiceInfo): int
    {
        try {

        //    $this->db->beginTransaction();

           $userId = $this->userModel->create($userInfo['email'], $userInfo['name'], $userInfo['is_active']);
        //    $invoiceId = $this->invoiceModel->create($invoiceInfo['amount'], $userId);
        } catch (\Throwable $e) {
            if($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }

        return $userId;
    }
}