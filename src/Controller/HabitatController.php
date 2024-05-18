<?php

namespace App\Controller;

use App\Repository\ArcadiaRepository;
use App\Repository\HabitatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitat', name: 'app_habitat')]
    public function index(HabitatRepository $habitatRepository, ArcadiaRepository $arcadiaRepository): Response
    {
        $habitat = $habitatRepository->findBy([], ['id'=>'DESC']);
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);

        return $this->render('habitat/index.html.twig', [
            'habitat' => $habitat,
            'arcadia' => $arcadia,
        ]);
    }
}
