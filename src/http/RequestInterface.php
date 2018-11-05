<?php

namespace Barya\Dashboard\Http;


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
