<?php
namespace App\Entity;
enum ConsultationEnum:string {
    case OPHTALMOLOGUE = "OPHTALMOLOGUE";
    case CARDIOLOGUE = "CARDIOLOGUE";
    case GENERALISTE = "GENERALISTE";
    case DENTISTE = "DENTISTE";
}