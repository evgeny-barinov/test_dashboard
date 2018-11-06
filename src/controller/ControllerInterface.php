<?php

namespace Barya\Dashboard\Controller;


use Barya\Dashboard\Http\RequestInterface;

/**
 * Interface ControllerInterface
 * @package Barya\Dashboard\Controller
 *
 * Each controller depends on incoming Request
 */
interface ControllerInterface
{
    public function setRequest(RequestInterface $request);
}
