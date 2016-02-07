<?php
use ReceiptValidator\iTunes\Response;

/**
 * @group library
 */
class ResponseTest extends PHPUnit_Framework_TestCase
{
    // @TODO: Add tests for JMS centric functionality

    public function testValidReceipt()
    {
        $response = new Response(array('status' => 0, 'receipt' => array()));
    
        $this->assertTrue($response->isValid(), 'receipt must be valid');
        $this->assertEquals(0, $response->getStatus(), 'receipt result code must match');
    }
    
}
