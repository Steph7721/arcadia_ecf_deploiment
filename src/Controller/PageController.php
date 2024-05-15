<?php

namespace App\Controller;

use App\Repository\ArcadiaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArcadiaRepository $arcadiaRepository,): Response
    {
        //Nom du site
        $websiteName = 'Arcadia';

        //Récuperation de l'entité Arcadia
         $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);
 
         return $this->render('page/index.html.twig', [
             'websiteName' =>$websiteName,
             'arcadia' => $arcadia,
         ]);
     }
 }