<?php
namespace App\DataFixtures;

use App\Entity\Produits;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProduitsFixtures extends Fixture implements OrderedFixtureInterface{

    public function load(ObjectManager $manager)
    {
        $produit1 = new Produits();
        $produit1->setNom("ouvergine");
        $produit1->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit1->setPrix(2);
        $produit1->setDisponible(1);
        $produit1->setCategorie($this->getReference("categorie1"));
        $produit1->setSouscategorie($this->getReference("Agrume"));
        $produit1->setImage($this->getReference("media11"));
        $produit1->setTva($this->getReference("tva1"));

        $manager->persist($produit1);

        $produit2 = new Produits();
        $produit2->setNom("ouvergine");
        $produit2->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit2->setPrix(2);
        $produit2->setDisponible(1);
        $produit2->setCategorie($this->getReference("categorie1"));
        $produit2->setSouscategorie($this->getReference("Agrume"));
        $produit2->setImage($this->getReference("media12"));
        $produit2->setTva($this->getReference("tva1"));

        $manager->persist($produit2);

        $produit3 = new Produits();
        $produit3->setNom("ouvergine");
        $produit3->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit3->setPrix(2);
        $produit3->setDisponible(1);
        $produit3->setCategorie($this->getReference("categorie1"));
        $produit3->setSouscategorie($this->getReference("Agrume"));
        $produit3->setImage($this->getReference("media13"));
        $produit3->setTva($this->getReference("tva1"));

        $manager->persist($produit3);

        $produit4 = new Produits();
        $produit4->setNom("ouvergine");
        $produit4->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit4->setPrix(2);
        $produit4->setDisponible(1);
        $produit4->setCategorie($this->getReference("categorie1"));
        $produit4->setImage($this->getReference("media14"));
        $produit4->setSouscategorie($this->getReference("Agrume"));
        $produit4->setTva($this->getReference("tva1"));

        $manager->persist($produit4);

        $produit5 = new Produits();
        $produit5->setNom("ouvergine");
        $produit5->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit5->setPrix(2);
        $produit5->setDisponible(1);
        $produit5->setCategorie($this->getReference("categorie1"));
        $produit5->setSouscategorie($this->getReference("Fruitsànoyaux"));
        $produit5->setImage($this->getReference("media15"));
        $produit5->setTva($this->getReference("tva1"));

        $manager->persist($produit5);

        $produit6 = new Produits();
        $produit6->setNom("ouvergine");
        $produit6->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit6->setPrix(2);
        $produit6->setDisponible(1);
        $produit6->setCategorie($this->getReference("categorie1"));
        $produit6->setSouscategorie($this->getReference("Fruitsànoyaux"));
        $produit6->setImage($this->getReference("media16"));
        $produit6->setTva($this->getReference("tva1"));

        $manager->persist($produit6);

        $produit7 = new Produits();
        $produit7->setNom("ouvergine");
        $produit7->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit7->setPrix(2);
        $produit7->setDisponible(1);
        $produit7->setCategorie($this->getReference("categorie1"));
        $produit7->setSouscategorie($this->getReference("Fruitsànoyaux"));
        $produit7->setImage($this->getReference("media17"));
        $produit7->setTva($this->getReference("tva1"));

        $manager->persist($produit7);

        $produit8 = new Produits();
        $produit8->setNom("ouvergine");
        $produit8->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit8->setPrix(2);
        $produit8->setDisponible(1);
        $produit8->setCategorie($this->getReference("categorie1"));
        $produit8->setSouscategorie($this->getReference("Fruitsexotiques"));
        $produit8->setImage($this->getReference("media18"));
        $produit8->setTva($this->getReference("tva1"));

        $manager->persist($produit8);

        $produit9 = new Produits();
        $produit9->setNom("ouvergine");
        $produit9->setDescription("ouvergine ouvergineouvergine ouvergine ouvergine");
        $produit9->setPrix(2);
        $produit9->setDisponible(1);
        $produit9->setCategorie($this->getReference("categorie1"));
        $produit9->setSouscategorie($this->getReference("Fruitsrouges"));
        $produit9->setImage($this->getReference("media19"));
        $produit9->setTva($this->getReference("tva1"));

        $manager->persist($produit9);

        $produit10 = new Produits();
        $produit10->setNom("chou fleur");
        $produit10->setDescription("chou fleur chou fleurchou fleurchou fleur");
        $produit10->setPrix(3);
        $produit10->setDisponible(0);
        $produit10->setCategorie($this->getReference("categorie1"));
        $produit10->setSouscategorie($this->getReference("Fruitsrouges"));
        $produit10->setImage($this->getReference("media20"));
        $produit10->setTva($this->getReference("tva2"));

        $manager->persist($produit10);

        $produit11 = new Produits();
        $produit11->setNom("harico vert");
        $produit11->setDescription("harico vertharico vert harico vert harico vert");
        $produit11->setPrix(1.5);
        $produit11->setDisponible(1);
        $produit11->setCategorie($this->getReference("categorie2"));
        $produit11->setSouscategorie($this->getReference("Fruitsrouges"));
        $produit11->setImage($this->getReference("media1"));
        $produit11->setTva($this->getReference("tva1"));

        $manager->persist($produit11);

        $produit12 = new Produits();
        $produit12->setNom("cherise");
        $produit12->setDescription("cherise cherise cherise cherise cherise");
        $produit12->setPrix(4);
        $produit12->setDisponible(0);
        $produit12->setCategorie($this->getReference("categorie2"));
        $produit12->setSouscategorie($this->getReference("Melon"));
        $produit12->setImage($this->getReference("media2"));
        $produit12->setTva($this->getReference("tva3"));

        $manager->persist($produit12);

        $produit13 = new Produits();
        $produit13->setNom("fruits");
        $produit13->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit13->setPrix(2.6);
        $produit13->setDisponible(0);
        $produit13->setCategorie($this->getReference("categorie2"));
        $produit13->setSouscategorie($this->getReference("Melon"));
        $produit13->setImage($this->getReference("media3"));
        $produit13->setTva($this->getReference("tva2"));

        $manager->persist($produit13);

        $produit14 = new Produits();
        $produit14->setNom("fruits");
        $produit14->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit14->setPrix(2.6);
        $produit14->setDisponible(0);
        $produit14->setCategorie($this->getReference("categorie2"));
        $produit14->setSouscategorie($this->getReference("Melon"));
        $produit14->setImage($this->getReference("media4"));
        $produit14->setTva($this->getReference("tva3"));

        $manager->persist($produit14);
         
        $produit15 = new Produits();
        $produit15->setNom("fruits");
        $produit15->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit15->setPrix(2.6);
        $produit15->setDisponible(0);
        $produit15->setCategorie($this->getReference("categorie2"));
        $produit15->setSouscategorie($this->getReference("Melon"));
        $produit15->setImage($this->getReference("media5"));
        $produit15->setTva($this->getReference("tva2"));

        $manager->persist($produit15);

        $produit16 = new Produits();
        $produit16->setNom("fruits");
        $produit16->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit16->setPrix(2.6);
        $produit16->setDisponible(0);
        $produit16->setCategorie($this->getReference("categorie2"));
        $produit16->setSouscategorie($this->getReference("Pastèque"));
        $produit16->setImage($this->getReference("media6"));
        $produit16->setTva($this->getReference("tva3"));

        $manager->persist($produit16);

        $produit17 = new Produits();
        $produit17->setNom("fruits");
        $produit17->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit17->setPrix(2.6);
        $produit17->setDisponible(0);
        $produit17->setCategorie($this->getReference("categorie2"));
        $produit17->setSouscategorie($this->getReference("Pastèque"));
        $produit17->setImage($this->getReference("media7"));
        $produit17->setTva($this->getReference("tva2"));

        $manager->persist($produit17);

        $produit18 = new Produits();
        $produit18->setNom("fruits");
        $produit18->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit18->setPrix(2.6);
        $produit18->setDisponible(0);
        $produit18->setCategorie($this->getReference("categorie2"));
        $produit18->setSouscategorie($this->getReference("Pastèque"));
        $produit18->setImage($this->getReference("media8"));
        $produit18->setTva($this->getReference("tva1"));

        $manager->persist($produit18);

        $produit19 = new Produits();
        $produit19->setNom("fruits");
        $produit19->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit19->setPrix(2.6);
        $produit19->setDisponible(0);
        $produit19->setCategorie($this->getReference("categorie2"));
        $produit19->setSouscategorie($this->getReference("Pastèque"));
        $produit19->setImage($this->getReference("media9"));
        $produit19->setTva($this->getReference("tva2"));

        $manager->persist($produit19);

        $produit20 = new Produits();
        $produit20->setNom("fruits");
        $produit20->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit20->setPrix(2.6);
        $produit20->setDisponible(0);
        $produit20->setCategorie($this->getReference("categorie2"));
        $produit20->setSouscategorie($this->getReference("Pastèque"));
        $produit20->setImage($this->getReference("media10"));
        $produit20->setTva($this->getReference("tva2"));

        $manager->persist($produit20);

        $produit21 = new Produits();
        $produit21->setNom("Fruits1 sub");
        $produit21->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit21->setPrix(2.6);
        $produit21->setDisponible(1);
        $produit21->setCategorie($this->getReference("categorie2"));
        $produit21->setSouscategorie($this->getReference("fruit1"));
        $produit21->setImage($this->getReference("media26"));
        $produit21->setTva($this->getReference("tva2"));

        $manager->persist($produit21);

        $produit22 = new Produits();
        $produit22->setNom("Fruits1 sub");
        $produit22->setDescription("fruitsfruitsfruits fruits fruits fruits");
        $produit22->setPrix(2.6);
        $produit22->setDisponible(1);
        $produit22->setCategorie($this->getReference("categorie2"));
        $produit22->setSouscategorie($this->getReference("fruit1"));
        $produit22->setImage($this->getReference("media27"));
        $produit22->setTva($this->getReference("tva2"));

        $manager->persist($produit22);



        $manager->flush();
        
    }

    public function getOrder(){
        return 5;
    }

}
?>