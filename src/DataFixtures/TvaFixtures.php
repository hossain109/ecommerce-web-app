<?php

namespace App\DataFixtures;

use App\Entity\Tva;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TvaFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

            $tva1 = new Tva();
            $tva1->setMultiplicate(1.2);
            $tva1->setNom("1");
            $tva1->setValeur(20);

            $manager->persist($tva1);

            $tva2 = new Tva();
            $tva2->setMultiplicate(1.3);
            $tva2->setNom("1");
            $tva2->setValeur(30);

            $manager->persist($tva2);

            $tva3 = new Tva();
            $tva3->setMultiplicate(1.4);
            $tva3->setNom("1");
            $tva3->setValeur(40);

            $manager->persist($tva3);

            $this->addReference('tva1', $tva1);
            $this->addReference("tva2", $tva2);
            $this->addReference("tva3", $tva3);

        $manager->flush();
    }
    public function getOrder(){
        return 2;
    }
}
