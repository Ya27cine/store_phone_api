<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\StockSmartphone;

class StockSmartphoneTest extends TestCase
{
    public function testRam(): void
    {
        $variant = new StockSmartphone();
        $variant->setRam(6);
        $this->assertEquals(6, $variant->getRam() );
    }

    public function testRom(): void
    {
        $variant = new StockSmartphone();
        $variant->setRom(64);
        $this->assertEquals(64, $variant->getRom() );
    }

    public function testSn(): void
    {
        $variant = new StockSmartphone();
        $variant->setSn("94875675");
        $this->assertEquals("94875675", $variant->getSn());
    }

    public function testImei(): void
    {
        $variant = new StockSmartphone();
        $variant->setImei("865243019347");
        $this->assertEquals("865243019347", $variant->getImei() );
    }


    

}
