<?php

use Barya\Dashboard\Controller\DashboardController;
use Barya\Dashboard\Repository\StatisticRepositoryInterface;
use Barya\Dashboard\Entity\Statistic;
use PHPUnit\Framework\TestCase;

class DashboardControllerTest extends TestCase
{
    /**
     * @var StatisticRepositoryInterface
     */
    private $statRepository;

    /**
     * @var Statistic
     */
    private $stat;

    public function setUp() {
        $this->stat = new Statistic(
            4,
            500.00,
            400,
            ['customers' => [3], 'orders' => [5], 'days' => ['2018-10-01']]
        );

        $this->statRepository = $this->getMockBuilder(StatisticRepositoryInterface::class)
            ->setMethods(['getByDateRange'])
            ->getMock();

        $this->statRepository
            ->method('getByDateRange')
            ->willReturn($this->stat);
    }

    public function testIndexActionGet() {
        $request = $this->getMockBuilder(\Barya\Dashboard\Http\RequestInterface::class)->getMock();
        $request->method('getType')->willReturn('GET');

        $controller = new DashboardController($this->statRepository);
        $controller->setRequest($request);
        $view = $controller->indexAction();

        $from = date('Y-m-d', strtotime('first day of previous month midnight'));
        $to = date('Y-m-d', strtotime('first day of this month midnight') - 1);

        $this->assertInstanceOf(\Barya\Dashboard\View\ViewInterface::class, $view);
        $this->assertEquals($from, $view['from']);
        $this->assertEquals($to, $view['to']);
        $this->assertEquals($this->stat->getNumberOfOrders(), $view['orders']);
        $this->assertEquals($this->stat->getNumberOfCustomers(), $view['customers']);
        $this->assertEquals($this->stat->getNumberOfRevenue(), $view['revenue']);
        $this->assertEquals($this->stat->getDaily(), $view['daily']);
    }


    public function testIndexActionPost() {
        $from = '2018-10-01';
        $to = '2018-10-31';
        $request = new \Barya\Dashboard\Http\Request(
            [], ['from' => $from, 'to' => $to], ['REQUEST_METHOD' => 'POST']
        );

        $controller = new DashboardController($this->statRepository);
        $controller->setRequest($request);
        $view = $controller->indexAction();

        $this->assertInstanceOf(\Barya\Dashboard\View\ViewInterface::class, $view);
        $this->assertEquals($from, $view['from']);
        $this->assertEquals($to, $view['to']);
        $this->assertEquals($this->stat->getNumberOfOrders(), $view['orders']);
        $this->assertEquals($this->stat->getNumberOfCustomers(), $view['customers']);
        $this->assertEquals($this->stat->getNumberOfRevenue(), $view['revenue']);
        $this->assertEquals($this->stat->getDaily(), $view['daily']);
    }
}
