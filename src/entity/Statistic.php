<?php

namespace Barya\Dashboard\Entity;

/**
 * Class Statistic
 * @package Barya\Dashboard\Entity
 */
class Statistic
{
    /**
     * @var int
     */
    private $numberOfOrders;

    /**
     * @var int
     */
    private $numberOfRevenue;

    /**
     * @var int
     */
    private $numberOfCustomers;

    /**
     * @var []
     */
    private $dailyStat;

    /**
     * Statistic constructor.
     * @param int $numberOfOrders
     * @param int $numberOfRevenue
     * @param int $numberOfCustomers
     * @param array $dailyStat
     */
    public function __construct(
        int $numberOfOrders = 0,
        int $numberOfRevenue = 0,
        int $numberOfCustomers = 0,
        array $dailyStat = []
    ) {
        $this->numberOfOrders = $numberOfOrders;
        $this->numberOfCustomers = $numberOfCustomers;
        $this->numberOfRevenue = $numberOfRevenue;
        $this->dailyStat = $dailyStat;
    }

    /**
     * @return int
     */
    public function getNumberOfOrders(): int {
        return $this->numberOfOrders;
    }

    /**
     * @return int
     */
    public function getNumberOfRevenue(): int {
        return $this->numberOfRevenue;
    }

    /**
     * @return int
     */
    public function getNumberOfCustomers(): int {
        return $this->numberOfCustomers;
    }

    /**
     * @return array
     */
    public function getDaily(): array {
        return $this->dailyStat;
    }
}
