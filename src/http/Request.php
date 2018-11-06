<?php

namespace Barya\Dashboard\Http;

/**
 * Class Request
 * @package Barya\Dashboard\Http
 */
class Request implements RequestInterface
{
    /**
     * @var
     */
    private $get;

    /**
     * @var
     */
    private $post;

    /**
     * @var
     */
    private $server;

    /**
     * Request constructor.
     * @param array $get
     * @param array $post
     * @param array $server
     */
    public function __construct(array $get = [], array $post = [], array $server = []) {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getType() {
        return strtoupper($this->server['REQUEST_METHOD']);
    }

    /**
     * @param $param
     * @return bool|mixed
     */
    public function get($param) {
        switch ($this->getType()) {
            case 'POST':
                return $this->post[$param] ?: false;
            case 'GET':
                return $this->get[$param] ?: false;
        }

        return false;
    }
}
