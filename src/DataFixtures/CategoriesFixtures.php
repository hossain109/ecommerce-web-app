<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class CategoriesFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

           $categories1 = new Categories();
           $categories1->setNom("Legume");
           $manager->persist($categories1);

           $categories2 = new Categories();
           $categories2->setNom("Fruits");
           $manager->persist($categories2);

           $categories3 = new Categories();
           $categories3->setNom("Fruits secs");
           $manager->persist($categories3);

        
          
           $this->addReference("categorie1",$categories1);
           $this->addReference("categorie2",$categories2);
           $this->addReference("categorie3",$categories3);

        $manager->flush();
    }
    public function getOrder(){
        return 3;
    }
}
