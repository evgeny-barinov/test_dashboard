<?php

namespace Barya\Dashboard\Controller;


use Barya\Dashboard\Http\RequestInterface;

interface ControllerInterface
{
    public function setRequest(RequestInterface $request);
}
