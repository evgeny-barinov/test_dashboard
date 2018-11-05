<?php

namespace Barya\Dashboard\View;


interface ViewInterface extends \ArrayAccess
{
    /*
     * @return string
     */
    public function render(): string;

    /**
     * @var string $layout
     * @return ViewInterface
     */
    public function setLayout(string $layout): ViewInterface;
}
