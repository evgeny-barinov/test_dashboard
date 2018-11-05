<?php

use Barya\Dashboard\View\View;
use PHPUnit\Framework\TestCase;
use \org\bovigo\vfs\vfsStream;

class ViewTest extends TestCase
{
    public function setUp() {
        $structure = array(
            'views' => array(
                'index.php' => "<html><body><?= \$this['text']?></body></html>"
            )
        );

        vfsStream::setup('root', null, $structure);
    }

    public function testRender() {
        $view = new View(vfsStream::url('root/views/'), 'index');
        $view['text'] = 'Hello Template';

        $this->assertEquals('<html><body>Hello Template</body></html>', $view->render());
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Template file vfs://root/views/no_file.php not exists
     */
    public function testExceptionIfTemplateNotExists() {
        $view = new View(vfsStream::url('root/views/'), 'no_file');
        $view['text'] = 'Hello Template';

        $view->render();
    }

    public function testSetLayout() {
        $this->markTestSkipped();
    }
}
