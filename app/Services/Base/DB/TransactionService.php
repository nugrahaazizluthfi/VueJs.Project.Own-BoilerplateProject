<?php

namespace App\Services\Base\DB;
use DB;

class TransactionService
{
    protected $connectionName;
    private $connection;

    public function __construct($connection = "mysql")
    {
        $this->connectionName = $connection;
        $this->connection = DB::connection($connection);
    }

    // START TRANSACTION
    protected function transactionStart() {
        return $this->connection->beginTransaction();
    }

    // COMMIT TRANSACTION
    protected function transactionCommit() {
        return $this->connection->commit();
    }

    // ROLLBACK TARANSACTION
    protected function transactionRollback() {
        return $this->connection->rollback();
    }
}
