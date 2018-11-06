<?php

namespace Barya\Dashboard\Controller;

use Barya\Dashboard\Http\RequestInterface;
use Barya\Dashboard\View\ViewInterface;

/**
 * Class AbstractController
 * @package Barya\Dashboard\Controller
 * Controller for our application must have indexAction
 */
abstract class AbstractController implements ControllerInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @return ViewInterface
     */
    abstract public function indexAction();

    public function setRequest(RequestInterface $request) {
        $this->request = $request;
    }
}
