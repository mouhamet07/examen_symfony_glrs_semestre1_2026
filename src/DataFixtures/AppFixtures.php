<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1; $i<=10; $i++){
            $patient = new Patient();
            $patient->setNom("nom".$i);
            $patient->setPrenom("prenom".$i);
            $patient->setAdresse("adresse".$i);
            $patient->setTelephone("77123002".$i);
            $patient->setLogin("patient".$i);
            $patient->setPassword("passer123");
            $manager->persist($patient);
        }

        $manager->flush();
    }
}
