<?php

namespace Barya\Dashboard\Repository;

use Barya\Dashboard\Entity\Statistic;
use Barya\Dashboard\Repository\MySql\AbstractRepository;

class StatisticRepository
    extends AbstractRepository
    implements StatisticRepositoryInterface
{
    public function getByDateRange(int $to, int $from): Statistic {
        // TODO: Implement getByDateRange() method.
    }
}
