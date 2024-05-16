<?php

namespace App\Controller;

use App\Repository\ArcadiaRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(ServiceRepository $serviceRepository , ArcadiaRepository $arcadiaRepository): Response
    {
        $service = $serviceRepository->findBy([], ['id'=>'DESC']);
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);

        return $this->render('service/index.html.twig', [
            'service' => $service,
            'arcadia' => $arcadia,
        ]);
    }
}
