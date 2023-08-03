<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class MediaFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
            //media one
            $media1 = new Media();
            $media1->setPath("prod_fruits_1.jpg");
            $media1->setAlt("imagea");
            $manager->persist($media1);
            //media two
            $media2 = new Media();
            $media2->setPath("prod_fruits_2.jpg");
            $media2->setAlt("imageb");
            $manager->persist($media2);
            //media three
            $media3 = new Media();
            $media3->setPath("prod_fruits_3.jpg");
            $media3->setAlt("imagec");
            $manager->persist($media3);
            //media four
            $media4 = new Media();
            $media4->setPath("prod_fruits_4.jpg");
            $media4->setAlt("imaged");
            $manager->persist($media4);
            //media five
            $media5 = new Media();
            $media5->setPath("prod_fruits_5.jpg");
            $media5->setAlt("imaged");
            $manager->persist($media5);

            $media6 = new Media();
            $media6->setPath("prod_fruits_6.png");
            $media6->setAlt("imaged");
            $manager->persist($media6);

            $media7 = new Media();
            $media7->setPath("prod_fruits_7.jpg");
            $media7->setAlt("imaged");
            $manager->persist($media7);

            $media8 = new Media();
            $media8->setPath("prod_fruits_8.jpg");
            $media8->setAlt("imaged");
            $manager->persist($media8);

            $media9 = new Media();
            $media9->setPath("prod_fruits_9.jpg");
            $media9->setAlt("imaged");
            $manager->persist($media9);

            $media10 = new Media();
            $media10->setPath("prod_fruits_10.jpg");
            $media10->setAlt("imaged");
            $manager->persist($media10);
            
            $this->addReference("media1",$media1);
            $this->addReference("media2",$media2);
            $this->addReference("media3",$media3);
            $this->addReference("media4",$media4);
            $this->addReference("media5",$media5);
            $this->addReference("media6",$media6);
            $this->addReference("media7",$media7);
            $this->addReference("media8",$media8);
            $this->addReference("media9",$media9);
            $this->addReference("media10",$media10);

        //media legume
        $media11 = new Media();
        $media11->setPath("prod_legume_1.jpg");
        $media11->setAlt("vegetable");
        $manager->persist($media11);

        $media12 = new Media();
        $media12->setPath("prod_legume_2.jpg");
        $media12->setAlt("fruits");
        $manager->persist($media12);

        $media13 = new Media();
        $media13->setPath("prod_legume_3.jpg");
        $media13->setAlt("vegetable");
        $manager->persist($media13);

        $media14 = new Media();
        $media14->setPath("prod_legume_4.jpg");
        $media14->setAlt("fruits");
        $manager->persist($media14);

        $media15 = new Media();
        $media15->setPath("prod_legume_5.jpg");
        $media15->setAlt("fruits");
        $manager->persist($media15);

        $media16 = new Media();
        $media16->setPath("prod_legume_6.jpg");
        $media16->setAlt("fruits");
        $manager->persist($media16);

        $media17 = new Media();
        $media17->setPath("prod_legume_7.jpg");
        $media17->setAlt("fruits");
        $manager->persist($media17);

        $media18 = new Media();
        $media18->setPath("prod_legume_8.jpg");
        $media18->setAlt("fruits");
        $manager->persist($media18);

        $media19 = new Media();
        $media19->setPath("prod_legume_9.jpg");
        $media19->setAlt("fruits");
        $manager->persist($media19);

        $media20 = new Media();
        $media20->setPath("prod_legume_10.jpg");
        $media20->setAlt("fruits");
        $manager->persist($media20);

        $this->addReference("media11",$media11);
        $this->addReference("media12",$media12);
        $this->addReference("media13",$media13);
        $this->addReference("media14",$media14);
        $this->addReference("media15",$media15);
        $this->addReference("media16",$media16);
        $this->addReference("media17",$media17);
        $this->addReference("media18",$media18);
        $this->addReference("media19",$media19);
        $this->addReference("media20",$media20);

        //categorie media
        $media21 = new Media();
        $media21->setPath("categorie1.jpg");
        $media21->setAlt("legumes");
        $manager->persist($media21);

        $media22 = new Media();
        $media22->setPath("categorie2.jpg");
        $media22->setAlt("legumes");
        $manager->persist($media22);

        $media23 = new Media();
        $media23->setPath("categorie3.jpg");
        $media23->setAlt("fruits");
        $manager->persist($media23);

        $media24 = new Media();
        $media24->setPath("categorie4.jpg");
        $media24->setAlt("fruits");
        $manager->persist($media24);

        $media25 = new Media();
        $media25->setPath("categorie5.jpg");
        $media25->setAlt("fruits");
        $manager->persist($media25);
  
        $this->addReference("media21",$media21);
        $this->addReference("media22",$media22);
        $this->addReference("media23",$media23);
        $this->addReference("media24",$media24);
        $this->addReference("media25",$media25);

        //media pour sous menu produit
        $media26 = new Media();
        $media26->setPath("sous1.jpg");
        $media26->setAlt("fruits");
        $manager->persist($media26);

        $media27 = new Media();
        $media27->setPath("sous2.jpg");
        $media27->setAlt("fruits");
        $manager->persist($media27);

        $this->addReference("media26",$media26);
        $this->addReference("media27",$media27);

        $manager->flush();
    }

    public function getOrder(){
        return 1;
    }
}
