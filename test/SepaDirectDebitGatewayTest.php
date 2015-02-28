<?php

namespace Omnipay\Curopayments;

use Omnipay\Tests\GatewayTestCase;

class SepaDirectDebitGatewayTest extends GatewayTestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->gateway = new BanktransferGateway($this->getHttpClient(), $this->getHttpRequest());
	}

	public function testPurchase()
	{
		$request = $this->gateway->purchase(array('amount' => '10.00'));

		$this->assertInstanceOf('Omnipay\Curopayments\Message\SepaDirectDebitPurchaseRequest', $request);
		$this->assertSame('10.00', $request->getAmount());
	}
}
