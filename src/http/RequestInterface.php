<?php

namespace Barya\Dashboard\Http;

/**
 * Interface RequestInterface
 * @package Barya\Dashboard\Http
 * Http Request used by our Application
 * It can be an adapter for another implementations, according to PSR-7 for instance
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @param $param
     * @return mixed
     */
    public function get($param);
}
