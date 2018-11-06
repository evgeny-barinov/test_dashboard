<?php

namespace Barya\Dashboard\Repository;

use Barya\Dashboard\Entity\Statistic;

/**
 * Interface StatisticRepositoryInterface
 * @package Barya\Dashboard\Repository
 * We can use any implementation of this, independently of place where it is stored, mysql, mongo, files, etc
 */
interface StatisticRepositoryInterface extends RepositoryInterface
{
    /**
     * @param int $to unix timestamp
     * @param int $from unix timestamp
     * @return Statistic
     */
    public function getByDateRange(int $from, int $to): Statistic;
}
