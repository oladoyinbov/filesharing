<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use FastVolt\Core\Http\HttpResponse as Response;



class ResponseTest extends TestCase
{

    protected object $response;
    protected $test;



    public function testRedirectResponse(): void
    {

        $response = new Response();
        $test = $response->redirect('/', 301);

        $this->expectException(InvalidArgumentException::class);

        throw new InvalidArgumentException();
    }



    public function testOutResponse()
    {

        $req = new Response();

        $text = $req->out('Hello World!');

        $this->assertNotNull($text);
    }




}