<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Fastvolt\Core\Http\HttpResponse as Response;
use Fastvolt\Helper\Text;


class HtmlResponseTest extends TestCase{

    protected $html;
    protected $html2;


    public function testHtmlResponse(){

        $html = Text::Html('<b>Hello World!</b>');

        $this->assertSame('<b>Hello World!</b>', $html);
    }


    public function testHtmlAdvancedResponse(){

        $html = Text::HTML()->createElement('h1')->setContent('Hello World!')->out();
        $html2 = Text::HTML()->createElement('h1')->setClass('test')->setId('test')->setContent('Hello World!')->out();

        $this->assertSame('<h1>Hello World!</h1>', $html);

        $this->assertSame('<h1 class="test" id="test">Hello World!</h1>', $html2);
    }



}