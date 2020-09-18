<?php

namespace App\DataFixtures;

use App\Entity\Toerana;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToeranaFixtures extends Fixture
{
    const DEFAULT_TOERANA = [
        "Filoha",
        "Filoha lefitra",
        "Mpitan-tsoratry ny vola",
        "Mpitan-tsoratry ny fivoriana",
        "Mpitam-bola",
        "Mpanolontsaina",
        "Mpievi-draharaha",
        "Mpikambana tsotra"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::DEFAULT_TOERANA as $key => $toerana) {
            $t = new Toerana();

            $t->setAnarana($toerana);
            $manager->persist($t);
        }

        $manager->flush();
    }
}
