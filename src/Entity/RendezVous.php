<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateRv = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVous')]
    private ?Patient $patient = null;

    #[ORM\Column(enumType: EtatRv::class)]
    private ?EtatRv $etatRv = null;

    #[ORM\Column(enumType: TypeRv::class)]
    private ?TypeRv $type = null;

    #[ORM\Column(nullable: true, enumType: PrestationEnum::class)]
    private ?PrestationEnum $prestation = null;

    #[ORM\Column(nullable: true, enumType: ConsultationEnum::class)]
    private ?ConsultationEnum $consultation = null;

    public function __construct(){
        $this->etatRv = EtatRv::EN_ATTENTE;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRv(): ?\DateTimeImmutable
    {
        return $this->dateRv;
    }

    public function setDateRv(\DateTimeImmutable $dateRv): static
    {
        $this->dateRv = $dateRv;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getEtatRv(): ?EtatRv
    {
        return $this->etatRv;
    }

    public function setEtatRv(EtatRv $etatRv): static
    {
        $this->etatRv = $etatRv;

        return $this;
    }

    public function getType(): ?TypeRv
    {
        return $this->type;
    }

    public function setType(TypeRv $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrestation(): ?PrestationEnum
    {
        return $this->prestation;
    }

    public function setPrestation(?PrestationEnum $prestation): static
    {
        $this->prestation = $prestation;

        return $this;
    }

    public function getConsultation(): ?ConsultationEnum
    {
        return $this->consultation;
    }

    public function setConsultation(?ConsultationEnum $consultation): static
    {
        $this->consultation = $consultation;

        return $this;
    }
}
