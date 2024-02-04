<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tente;
use Symfony\Component\HttpFoundation\Response; // Ajout de l'importation

class TentesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/tentesNonDispo', name: 'tentesNonDispo')]
    // Exemple dans le contrôleur
public function tentesNonDisponiblesAction()
{
    $tentesNonDisponibles = $this->entityManager->getRepository(Tente::class)->findBy(['disponibilite' => false]);

    dump($tentesNonDisponibles); // Vérifiez les données ici

    return $this->render('carte/tentes_non_disponibles.html.twig', [
        'tentesNonDisponibles' => $tentesNonDisponibles,
    ]);
}

}
