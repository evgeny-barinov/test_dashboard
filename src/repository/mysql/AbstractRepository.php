<?php

namespace Barya\Dashboard\Repository\MySql;


use Barya\Dashboard\Repository\RepositoryInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var \PDO
     */
    protected $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }
}
