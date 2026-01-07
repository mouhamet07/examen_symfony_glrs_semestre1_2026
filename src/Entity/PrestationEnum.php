<?php
namespace App\Entity;
enum PrestationEnum:string {
    case FIBROSCOPIE = "FIBROSCOPIE";
    case ANALYSE = "ANALYSE";
    case ECHOGRAPHIE = "ECHOGRAPHIE";
}