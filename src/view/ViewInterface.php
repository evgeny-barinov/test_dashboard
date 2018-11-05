<?php

namespace Barya\Dashboard\View;


interface ViewInterface extends \ArrayAccess
{
    /*
     * @return string
     */
    public function render(): string;

    /**
     * @return ViewInterface
     */
    public function setLayout(): ViewInterface;
}
