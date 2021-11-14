<?php

namespace App\DataFixtures;

use App\Entity\Smartphone;
use App\Entity\StockSmartphone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        for ($i=1; $i < 12; $i++) { 
            $smrtphone = new Smartphone();

            $smrtphone->setMarque("Samsung");
            $smrtphone->setModel("A0".$i."FM");
            $smrtphone->setName("A".$i);

            $manager->persist($smrtphone);

            for ($j=0; $j < rand(1, 5); $j++) { 
                $v = new StockSmartphone();

                if($j%3) $v->setColor("Black"); else $v->setColor("White");
                $v->setSmartphone( $smrtphone );
                $v->setROM(rand(32,128));
                $v->setRam(rand(1,4));
                $v->setYear( rand(2017, 2021));
                $v->setPrice( rand(90, 220));
                $v->setQuantity( rand(0, 6) );
                if($j%2) $v->setStatus("New"); else $v->setStatus("Used");
                $v->setImei( "363509485763" );
                $v->setSn( "FR837467" );

                $manager->persist($v);
            }
        }

        for ($i=4; $i < 9; $i++) { 
            $smrtphone = new Smartphone();

            $smrtphone->setMarque("iPhone");
            $smrtphone->setModel("A1".$i."");
            if($i!=6) 
                $smrtphone->setName($i);
            else
                 $smrtphone->setName($i."S");

            $manager->persist($smrtphone);

            for ($j=0; $j < rand(1, 5); $j++) { 
                $v = new StockSmartphone();

                $v->setSmartphone( $smrtphone );

                if($j%3) $v->setColor("Black"); else $v->setColor("Red");
                $v->setROM(rand(32,128));
                $v->setRam(rand(1,4));
                $v->setYear( rand(2012, 2019));
                $v->setPrice(90, 220);
                $v->setQuantity( rand(0, 6) );
                if($j%2) $v->setStatus("New"); else $v->setStatus("Used");
                $v->setImei( "863509485763" );
                $v->setSn( "FR837467" );

                $manager->persist($v);
            }
        }


        $manager->flush();
    }
}
