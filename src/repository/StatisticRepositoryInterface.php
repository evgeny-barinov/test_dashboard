<?php

namespace Barya\Dashboard\Repository;

use Barya\Dashboard\Entity\Statistic;


interface StatisticRepositoryInterface extends RepositoryInterface
{
    /**
     * @param int $to unix timestamp
     * @param int $from unix timestamp
     * @return Statistic
     */
    public function getByDateRange(int $to, int $from): Statistic;
}
