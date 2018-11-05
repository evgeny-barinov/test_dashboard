<?php

namespace Barya\Dashboard\View;


class View implements ViewInterface
{
    private $values = [];

    private $layout;

    private $path;

    private $view;

    public function __construct($templatePath, $view) {
        $this->path = $templatePath;
        $this->view = $templatePath . $view . '.php';
    }

    public function render(): string {
        if (!file_exists($this->view)) {
            throw new \Exception("Template file {$this->view} not exists");
        }

        $layout = '';
        if ($this->layout && file_exists($this->layout)) {
            ob_start();
            require($this->layout);
            $layout = ob_get_clean();
        }

        ob_start();
        require ($this->view);
        $template = ob_get_clean();

        return $template;
    }

    public function setLayout(string $layout): ViewInterface {
        $this->layout = $this->path . $layout;
        return $this;
    }

    public function offsetExists($offset) {
        return isset($this->values[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->values[$offset]) ? $this->values[$offset] : null;
    }

    public function offsetSet($offset, $value) {
        $this->values[$offset] = $value;
    }

    public function offsetUnset($offset) {
        unset($this->values[$offset]);
    }


}
