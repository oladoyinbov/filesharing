<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use FastVolt\Core\Http\HttpRequest as Request;


class RequestTest extends TestCase
{

    protected object $request;
    protected ?string $testvar;


    public function testGetItemRequest(): void
    {

        $request = new Request();
        $testvar = $request->getItem('test');

        $this->assertNull($testvar);
    }



    public function testPostItemRequest()
    {

        $request = new Request();
        $testvar = $request->postItems('test');

        $this->assertNull($testvar);
    }



    public function testHasRequest()
    {

        $request = new Request();
        $testvar = $request->has('test');

        $this->assertIsBool($testvar);
    }




    public function testHasFileRequest()
    {

        $request = new Request();
        $testvar = $request->hasFile('test');

        $this->assertIsBool($testvar);
    }



}