<?php

namespace App\Controller;

use App\Entity\RapportEmploye;
use App\Form\RapportEmType;
use App\Repository\ArcadiaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(ArcadiaRepository $arcadiaRepository, Request $request,EntityManagerInterface $em): Response
    {
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);

        $emform = new RapportEmploye();

        $emform = $this->createForm(RapportEmType::class, $emform);

        $emform->handleRequest($request);

        if ($emform->isSubmitted() && $emform->isValid()) {
            $rapportVet = $emform->getData();

            

            $em->persist($rapportVet);
            $em->flush();
            $this->addFlash('success', 'Votre rapport a bien été envoyé');

            //Redirection vers la page de contact
            return $this->redirectToRoute('app_employe');

        }
        return $this->render('employe/index.html.twig', [
            'arcadia' => $arcadia,
            'emform' => $emform->createView(),
        ]);
    }
}
