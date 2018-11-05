<?php

namespace Barya\Dashboard\Controller;


use Barya\Dashboard\App;
use Barya\Dashboard\Repository\StatisticRepositoryInterface;

class DashboardController extends AbstractController
{
    /**
     * @var StatisticRepositoryInterface
     */
    private $statisticRepository;

    public function __construct(StatisticRepositoryInterface $repository) {
        $this->statisticRepository = $repository;
    }

    /**
     * @return \Barya\Dashboard\View\ViewInterface
     */
    public function indexAction() {
        if ($this->request->getType() == 'POST') {
            $from = strtotime($this->request->get('from'));
            $to = strtotime($this->request->get('to'));
        } else {
            $from = strtotime('first day of previous month midnight');
            $to = strtotime('first day of this month midnight') - 1;
        }

        $stat = $this->statisticRepository->getByDateRange($from, $to);

        return App::view('index', [
            'orders' => $stat->getNumberOfOrders(),
            'revenue' => $stat->getNumberOfRevenue(),
            'customers' => $stat->getNumberOfCustomers(),
            'daily' => $stat->getDaily()
        ]);
    }
}
