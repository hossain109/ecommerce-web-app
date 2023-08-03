<?php
namespace App\DataFixtures;

use App\Entity\Souscategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SouscategorieFixtures extends Fixture implements OrderedFixtureInterface{

      public function load(ObjectManager $manager)
      {
            $souscategorie1 = new Souscategorie();
            $souscategorie1->setNom("Agrume");
            $souscategorie1->setCategorie($this->getReference("categorie1"));
            $manager->persist($souscategorie1);

            $souscategorie2 = new Souscategorie();
            $souscategorie2->setNom("Fruits à noyaux");
            $souscategorie2->setCategorie($this->getReference("categorie1"));
            $manager->persist($souscategorie2);

            $souscategorie3 = new Souscategorie();
            $souscategorie3->setNom("Fruits exotiques");
            $souscategorie3->setCategorie($this->getReference("categorie1"));
            $manager->persist($souscategorie3);

            $souscategorie4 = new Souscategorie();
            $souscategorie4->setNom("Fruits rouges");
            $souscategorie4->setCategorie($this->getReference("categorie1"));
            $manager->persist($souscategorie4);

            $souscategorie5 = new Souscategorie();
            $souscategorie5->setNom("Melon");
            $souscategorie5->setCategorie($this->getReference("categorie1"));
            $manager->persist($souscategorie5);

            $souscategorie6 = new Souscategorie();
            $souscategorie6->setNom("Pastèque ");
            $souscategorie6->setCategorie($this->getReference("categorie1"));
            $manager->persist($souscategorie6);

            $souscategorie7 = new Souscategorie();
            $souscategorie7->setNom("Fruits1 ");
            $souscategorie7->setCategorie($this->getReference("categorie2"));
            $manager->persist($souscategorie7);

            $souscategorie8 = new Souscategorie();
            $souscategorie8->setNom("Fruits2 ");
            $souscategorie8->setCategorie($this->getReference("categorie2"));
            $manager->persist($souscategorie8);

            $souscategorie9= new Souscategorie();
            $souscategorie9->setNom("Fruits3 ");
            $souscategorie9->setCategorie($this->getReference("categorie2"));
            $manager->persist($souscategorie9);

            $souscategorie10 = new Souscategorie();
            $souscategorie10->setNom("Fruits4 ");
            $souscategorie10->setCategorie($this->getReference("categorie2"));
            $manager->persist($souscategorie10);

            $this->addReference('Agrume',$souscategorie1);
            $this->addReference('Fruitsànoyaux',$souscategorie2);
            $this->addReference('Fruitsexotiques',$souscategorie3);
            $this->addReference('Fruitsrouges',$souscategorie4);
            $this->addReference('Melon',$souscategorie5);
            $this->addReference('Pastèque',$souscategorie6);
            $this->addReference('fruit1',$souscategorie7);
            $this->addReference('fruit2',$souscategorie8);
            $this->addReference('fruit3',$souscategorie9);
            $this->addReference('fruit4',$souscategorie10);

            
            $manager->flush();
      } public function getOrder()
      {
            return 4;
      }

}