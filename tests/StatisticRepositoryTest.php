<?php

use Barya\Dashboard\Repository\StatisticRepository;
use PHPUnit\Framework\TestCase;

class StatisticRepositoryTest extends TestCase
{

    public function testGetByDateRange() {
        /**
         * @var StatisticRepository $repository
         */
        $repository = $this->getMockBuilder(StatisticRepository::class)
            ->setMethods(['getNumberOfOrders', 'getNumberOfRevenue', 'getNumberOfCustomers', 'getDaily'])
            ->disableOriginalConstructor()
            ->getMock();

        $repository->method('getNumberOfOrders')->willReturn(5);
        $repository->method('getNumberOfRevenue')->willReturn(4);
        $repository->method('getNumberOfCustomers')->willReturn(3);
        $repository->method('getDaily')->willReturn([[3,4], [5,6]]);

        $stat = $repository->getByDateRange(0,0);

        $this->assertInstanceOf(\Barya\Dashboard\Entity\Statistic::class, $stat);
    }
}
