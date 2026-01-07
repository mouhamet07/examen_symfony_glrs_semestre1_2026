<?php
namespace App\Services;

use App\Entity\RendezVous;

interface RendezVousService {
    function saveDemande(RendezVous $rv):bool;
}