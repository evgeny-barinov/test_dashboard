<?php

use Barya\Dashboard\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{

    /**
     * @var Request
     */
    private $requestPost, $requestGet;

    public function setUp() {
        $get = ['field1' => 'value3', 'field2' => 'value4'];
        $post = ['field1' => 'value1', 'field2' => 'value2'];
        $this->requestGet = new Request($get, $post, ['REQUEST_METHOD' => 'GET']);
        $this->requestPost = new Request($get, $post, ['REQUEST_METHOD' => 'POST']);
    }

    public function testGetType() {
        $this->assertEquals('GET', $this->requestGet->getType());
        $this->assertEquals('POST', $this->requestPost->getType());
    }

    public function testGet() {
        $this->assertEquals('value3', $this->requestGet->get('field1'));
        $this->assertEquals('value1', $this->requestPost->get('field1'));
        $this->assertEquals('value4', $this->requestGet->get('field2'));
        $this->assertEquals('value2', $this->requestPost->get('field2'));
        $this->assertFalse($this->requestGet->get('unknown'));
        $this->assertFalse($this->requestPost->get('unknown'));
    }
}
