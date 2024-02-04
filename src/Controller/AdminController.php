<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
   
    #[Route('/form-admin', name: 'admin_auth')]
    public function loginAdmin(Request $req, ManagerRegistry $d): Response
    {
        $admin = new Admin();
        $em = $d->getManager();
        $form = $this->createForm(AdminType::class, $admin);
    
        $form->handleRequest($req);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer le login et le mot de passe soumis
            $submittedLogin = $admin->getLogin();
            $submittedPassword = $admin->getPwd();
    
            // Rechercher l'administrateur dans la base de données par le login
            $adminRepository = $em->getRepository(Admin::class);
            $existingAdmin = $adminRepository->findOneBy(['login' => $submittedLogin]);
    
            if (!$existingAdmin) {
                // L'administrateur avec le login fourni n'existe pas
                // Ajoutez ici la logique nécessaire, comme rediriger vers une page d'erreur
                return $this->render('admin/index.html.twig', [
                    'form' => $form->createView(),
                    'error' => 'Login ou mot de passe incorrect',
                ]);
            }
    
            // Vérifier si le mot de passe soumis correspond au mot de passe stocké dans la base de données
            if ($submittedPassword === $existingAdmin->getPwd()) {
                // Le mot de passe est valide, rediriger vers la nouvelle page
                return $this->redirectToRoute('victime_aut');
            } else {
                // Le mot de passe n'est pas valide
                // Ajoutez ici la logique nécessaire, comme rediriger vers une page d'erreur
                return $this->render('admin/index.html.twig', [
                    'form' => $form->createView(),
                    'error' => 'Login ou mot de passe incorrect',
                ]);
            }
        }
    
        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    


   
}    



