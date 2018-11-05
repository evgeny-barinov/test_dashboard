<?php

namespace Barya\Dashboard\Repository;

use Barya\Dashboard\Entity\Statistic;
use Barya\Dashboard\Repository\MySql\AbstractRepository;

class StatisticRepository
    extends AbstractRepository
    implements StatisticRepositoryInterface
{
    /**
     * @var int
     */
    protected $to;

    /**
     * @var int
     */
    protected $from;

    public function getByDateRange(int $to, int $from): Statistic {
        $this->to = $to;
        $this->from = $from;

        $orders = $this->getNumberOfOrders();
        $revenue = $this->getNumberOfRevenue();
        $customers = $this->getNumberOfCustomers();
        $daily = $this->getDaily();

        return new Statistic($orders, $revenue, $customers, $daily);
    }

    protected function getNumberOfOrders(): int {

    }

    protected function getNumberOfRevenue(): int {

    }

    protected function getNumberOfCustomers(): int {

    }

    protected function getDaily(): array {

    }
}
