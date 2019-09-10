<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Ingeschrevenpersoon;
use App\Entity\Verblijfplaats;
use App\Entity\NaamPersoon;
use App\Entity\Geboorte;
use App\Entity\Waardetabel;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	// Basis waarde tabel
    	$nederland = New Waardetabel();
    	$nederland->setCode('NL');
    	$nederland->setOmschrijving('Nederland');
    	$amsterdam = New Waardetabel();
    	$amsterdam->setCode('301');
    	$amsterdam->setOmschrijving('Amsterdam');
    	// Lets set up our person
    	$persoon = new Ingeschrevenpersoon();
    	$persoon->setVerblijfplaats(new Verblijfplaats());
    	$persoon->setNaam(new NaamPersoon());
    	$persoon->setGeboorte(new Geboorte());

    	// Dan de persoons data 
    	$persoon->setBurgerservicenummer('900003509');
    	$persoon->setGeheimhoudingPersoonsgegevens(false);
    	$persoon->setGeslachtsaanduiding('Man');
    	$persoon->setLeeftijd(22);
    	
    	// Adres gegevens
    	$persoon->getVerblijfplaats()->setPostcode('1000AA');
    	$persoon->getVerblijfplaats()->setWoonplaatsnaam('Amsterdam');
    	$persoon->getVerblijfplaats()->setStraatnaam('Dam');
    	$persoon->getVerblijfplaats()->setHuisnummer('1');
    	$persoon->getVerblijfplaats()->setHuisnummertoevoeging('boven');
    	$persoon->getVerblijfplaats()->setIngeschrevenpersoon($persoon);
    	
    	// Naamgeving
    	$persoon->getNaam()->setGeslachtsnaam('de Kieft');
    	$persoon->getNaam()->setVoorvoegsel('de');
    	$persoon->getNaam()->setVoorletters('J.W.');
    	$persoon->getNaam()->setVoornamen('Jan Willem');
    	$persoon->getNaam()->setaanhef('Dhr.'); 
    	$persoon->getNaam()->setAanschrijfwijze('Dhr. de Kieft, Jan Willem');
    	$persoon->getNaam()->setGebuikInLopendeTekst('Dhr. de Kieft, Jan Willem');
    	$persoon->getNaam()->setIngeschrevenpersoon($persoon);
    	
    	// Geboorte
    	$persoon->getGeboorte()->setIngeschrevenpersoon($persoon);
    	$persoon->getGeboorte()->setLand($nederland);
    	$persoon->getGeboorte()->setPlaats($amsterdam);
    	
    	$manager->persist($nederland);
    	$manager->persist($amsterdam);
    	$manager->persist($persoon);
        $manager->flush();
    }
}
