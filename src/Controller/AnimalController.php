<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use App\Repository\ArcadiaRepository;
use App\Repository\RapportEmployeRepository;
use App\Repository\RapportVeterinaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'app_animal')]
    public function index(AnimalRepository $animalRepository, ArcadiaRepository $arcadiaRepository): Response
    {
        $animals = $animalRepository->findBy([], ['habitat'=>'DESC']);
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);

        return $this->render('animal/index.html.twig', [
            'animals' => $animals,
            'arcadia' => $arcadia,
        ]);
    }

    #[Route('/animal/{id}', name: 'app_animal_show')]
    public function show(Animal $animal, ArcadiaRepository $arcadiaRepository, RapportVeterinaireRepository $rapportVeterinaireRepository, RapportEmployeRepository $rapportEmployeRepository): Response
    {
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);
        $rapportVeterinaires = $rapportVeterinaireRepository->findOneBy(['animal' => $animal->getId()], ['date' => 'DESC']);
        $rapportEmployes = $rapportEmployeRepository->findOneBy(['animal' => $animal->getId()], ['date' => 'DESC']);
        return $this->render('animal/show.html.twig', [
            'animal' => $animal,
            'arcadia' => $arcadia,
            'rapportVeterinaires' => $rapportVeterinaires,
            'rapportEmployes' => $rapportEmployes,
        ]);
    }
}

