<?php

namespace App\Controller;

use App\Entity\EtatRv;
use App\Entity\RendezVous;
use App\Form\DemandeType;
use App\Services\RendezVousService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RendezVousController extends AbstractController
{
    #[Route('/', name: 'app_rendez_vous')]
    public function index(Request $request,RendezVousService $rvService): Response
    {
        $rendezVous = new RendezVous();
        $form = $this->createForm(DemandeType::class, $rendezVous);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rvService->saveDemande($rendezVous);
            $this->addFlash('success', 'Rendez-vous enregistré avec succès');
            return $this->redirectToRoute('app_gestion',[
                'id' => $rendezVous->getId()
            ]);
        }
        return $this->render('rendez_vous/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/rendez-vous/gestion/{id}', name: 'app_gestion')]
public function gestion(Request $request, RendezVous $rendezVous, RendezVousService $rvService): Response
{
    $action = $request->query->get('action');
    if ($action) {
        if ($action === 'valider') {
            $rendezVous->setEtatRv(EtatRv::VALIDE);
        } elseif ($action === 'annuler') {
            $rendezVous->setEtatRv(EtatRv::ANNULE);
        }
        $rvService->saveDemande($rendezVous);
        $this->addFlash('success', 'Le rendez-vous a été mis à jour avec succès.');
        return $this->redirectToRoute('app_rendez_vous', ['id' => $rendezVous->getId()]);
    }
    return $this->render('rendez_vous/secretaire.html.twig', [
        'rendezVous' => $rendezVous
    ]);
}

}
