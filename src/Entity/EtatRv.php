<?php
namespace App\Entity;
enum EtatRv:string {
    case EN_ATTENTE = "EN_ATTENTE";
    case VALIDE = "VALIDE";
    case ANNULE = "ANNULE";
}