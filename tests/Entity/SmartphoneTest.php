<?php 
namespace App\Test\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Smartphone;


class SmartphoneTest extends TestCase{

        public function testMarque(){
            $phone = new Smartphone();
            $phone->setMarque('Samsung');
            $this->assertEquals("Samsung", $phone->getMarque() );
        }

        public function testModel(){
            $phone = new Smartphone();
            $phone->setModel('A077');
            $this->assertEquals("A077", $phone->getModel() );
        }

        public function testName(){
            $phone = new Smartphone();
            $phone->setName('A11');
            $this->assertEquals("A11", $phone->getName() );
        }

        public function testtostring(){
            $phone = new Smartphone();
            $phone->setMarque('Samsung');
            $phone->setName('A11');
            $phone->setModel('A011');
                // Marque - Name 
            $this->assertEquals("Samsung - A11", $phone);
        }
}
?>