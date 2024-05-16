<?php

namespace App\Controller;

use App\Entity\RapportVeterinaire;
use App\Form\RapportVetType;
use App\Repository\ArcadiaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VeterinaireController extends AbstractController
{
    #[Route('/veterinaire', name: 'app_veterinaire')]
    public function index(ArcadiaRepository $arcadiaRepository, Request $request,EntityManagerInterface $em): Response
    {
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);

        $rapportVet = new RapportVeterinaire();

        $rapportform = $this->createForm(RapportVetType::class, $rapportVet);

        $rapportform->handleRequest($request);

        if ($rapportform->isSubmitted() && $rapportform->isValid()) {
            $rapportVet = $rapportform->getData();

            

            $em->persist($rapportVet);
            $em->flush();
            $this->addFlash('success', 'Votre rapport a bien été envoyé');

            //Redirection vers la page de contact
            return $this->redirectToRoute('app_veterinaire');

        }

        return $this->render('veterinaire/index.html.twig', [
            'arcadia' => $arcadia,
            'rapportform' => $rapportform->createView(),
        ]);
    }
}
