<?php

namespace App\Controller;

use App\Entity\Tente;
use App\Form\TenteType;
use App\Repository\TenteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TenteController extends AbstractController
{
    #[Route('/tente', name: 'app_tente')]
    public function index(): Response
    {
        return $this->render('tente/index.html.twig', [
            'controller_name' => 'TenteController',
        ]);
    }
    #[Route('/tentes', name: 'list_tente')]
    public function list(TenteRepository $TenteRepository): Response
    {
        $tentes = $TenteRepository->findAll();

        return $this->render('tente/list.html.twig', [
            'tentes' => $tentes,
        ]);
    }
    
    #[Route('/form-tente', name: 'tente_aut')]
    public function addtenteForm(Request $req, ManagerRegistry $d): Response
    {
        $tente = new Tente();
         $tente->setNbrperso(0);
         $tente->setDisponibilite(false);
    
        $em = $d->getManager();
        $form = $this->createForm(TenteType::class, $tente);
    
        $form->handleRequest($req);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($tente);
            $em->flush();
    
            return $this->redirectToRoute('list_tente');
        }
    
        return $this->render('tente/add_tente_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
    
