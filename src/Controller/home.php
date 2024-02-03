<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class home extends AbstractController
{
    #[Route('/home', name: 'indexe')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
}


?>