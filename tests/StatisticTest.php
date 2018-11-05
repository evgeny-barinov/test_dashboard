<?php
use PHPUnit\Framework\TestCase;

class StatisticTest extends TestCase
{

    public function testStatisticInit() {
        $stat = new \Barya\Dashboard\Entity\Statistic(
            2,
            4,
            5,
            array(
                array(3, 5),
                array(5, 6)
            )
        );

        $this->assertEquals(2, $stat->getNumberOfOrders());
        $this->assertEquals(4, $stat->getNumberOfRevenue());
        $this->assertEquals(5, $stat->getNumberOfCustomers());
        $this->assertEquals(array(array(3, 5), array(5, 6)), $stat->getDaily());
    }
}
