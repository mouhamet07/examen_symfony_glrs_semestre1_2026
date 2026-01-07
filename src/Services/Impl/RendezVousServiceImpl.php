<?php
namespace App\Services\Impl;

use App\Entity\RendezVous;
use App\Services\RendezVousService;
use Doctrine\ORM\EntityManagerInterface;

class RendezVousServiceImpl implements RendezVousService {
    public function __construct(
        private readonly EntityManagerInterface $manager
    ){}
    function saveDemande(RendezVous $rv):bool{
        $this->manager->persist($rv);
        $this->manager->flush();
        return true;
    }
}