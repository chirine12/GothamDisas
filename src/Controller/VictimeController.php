<?php

namespace App\Controller;

use App\Entity\Victime;
use App\Form\VictimeType;
use App\Repository\VictimeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VictimeController extends AbstractController
{
    #[Route('/victime', name: 'app_victime')]
    public function index(): Response
    {
        return $this->render('victime/index.html.twig', [
            'controller_name' => 'VictimeController',
        ]);
    }
    // src/Controller/TenteController.php


    #[Route('/victimes', name: 'list_victime')]
    public function list(VictimeRepository $victimeRepository): Response
    {
        $victimes = $victimeRepository->findAll();

        return $this->render('victime/list.html.twig', [
            'victimes' => $victimes,
        ]);
    }


    #[Route('/form-victime', name: 'victime_aut')]
    public function addvictimeForm(Request $req, ManagerRegistry $d): Response
    {
        $victime = new Victime();
        
    
        $em = $d->getManager();
        $form = $this->createForm(VictimeType::class, $victime);
    
        $form->handleRequest($req);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($victime);
            $em->flush();
    
            return $this->redirectToRoute('list_victime');
        }
    
        return $this->render('victime/add_victime_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
    

