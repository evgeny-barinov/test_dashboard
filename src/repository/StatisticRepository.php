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

    /**
     * @param int $to
     * @param int $from
     * @return Statistic
     * @throws Exception
     */
    public function getByDateRange(int $from, int $to): Statistic {
        $this->from = date('Y-m-d H:i:s', $from);
        $this->to = date('Y-m-d H:i:s', $to);

        $orders = $this->getNumberOfOrders();
        $revenue = $this->getNumberOfRevenue();
        $customers = $this->getNumberOfCustomers();
        $daily = $this->getDaily();

        return new Statistic($orders, $revenue, $customers, $daily);
    }

    protected function getNumberOfOrders(): int {
        $sth = $this->db->prepare(implode(' ', [
            'SELECT count(id) as cnt',
            'FROM orders',
            'WHERE purchase_date BETWEEN',
            "STR_TO_DATE(:from, '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(:to, '%Y-%m-%d %H:%i:%s')"
        ]));

        $sth->execute([':from' => $this->from, ':to' => $this->to]);
        $res = $sth->fetch();
        if ($res === false) {
            throw new Exception($this->db->errorCode());
        }

        return (int) $res['cnt'];
    }

    protected function getNumberOfRevenue(): float {
        $sth = $this->db->prepare(implode(' ', [
            'SELECT SUM(oi.price) as total',
            'FROM orders o',
            'INNER JOIN order_items oi ON o.id=oi.order_id',
            'WHERE o.purchase_date BETWEEN',
            "STR_TO_DATE(:from, '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(:to, '%Y-%m-%d %H:%i:%s')"
        ]));

        $sth->execute([':from' => $this->from, ':to' => $this->to]);

        $res = $sth->fetch();
        if ($res === false) {
            throw new Exception($this->db->errorInfo());
        }

        return (float) $res['total'];
    }

    protected function getNumberOfCustomers(): int {
        $sth = $this->db->prepare(implode(' ', [
            'SELECT count(DISTINCT customer_id) as cnt',
            'FROM orders',
            'WHERE purchase_date BETWEEN',
            "STR_TO_DATE(:from, '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(:to, '%Y-%m-%d %H:%i:%s')"
        ]));

        $sth->execute([':from' => $this->from, ':to' => $this->to]);
        $res = $sth->fetch();
        if ($res === false) {
            throw new Exception($this->db->errorInfo());
        }

        return (int) $res['cnt'];
    }

    protected function getDaily(): array {
        $sth = $this->db->prepare(implode(' ', [
            "SELECT count(o.id) as orders, count(DISTINCT o.customer_id) as customers, DATE_FORMAT( o.purchase_date , '%Y.%m.%d') as day",
            "FROM `orders` o",
            "WHERE o.purchase_date BETWEEN",
            "STR_TO_DATE(:from, '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(:to, '%Y-%m-%d %H:%i:%s')",
            "GROUP BY day ORDER BY day"
        ]));

        $sth->execute([':from' => $this->from, ':to' => $this->to]);
        $res = $sth->fetchAll();
        if ($res === false) {
            throw new Exception($this->db->errorInfo());
        }

        return (array) $res;
    }
}
