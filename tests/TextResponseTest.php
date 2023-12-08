<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use FastVolt\Core\Http\HttpResponse as Response;
use FastVolt\Helper\Text;


class TextResponseTest extends TestCase
{

    protected $text;
    protected object $req;


    public function testTextResponse()
    {

        $text = Text::e('Hello World!');

        $this->assertSame('Hello World!', $text);
    }




}