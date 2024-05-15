<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\ArcadiaRepository;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArcadiaRepository $arcadiaRepository,
    Request $request, AvisRepository $avisRepository, EntityManagerInterface $em): Response
    {
        //Nom du site
        $websiteName = 'Arcadia';
        //Récuperation de l'entité Arcadia
        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);
        $slider = $avisRepository->findBy(['arcadia' => $arcadia, 'active' => true]);
        


        //Partie Avis
        //Création d'un nouvel avis
        $avis = new Avis();
       
        //création du formulaire
        $avisForm = $this->createForm(AvisType::class , $avis);
        
        $avisForm->handleRequest($request);
       
        //Traitement du formulaire
        if ($avisForm->isSubmitted() && $avisForm->isValid()) {
            $avis->setCreatedAt(new \DateTimeImmutable());
            $avis->setArcadia($arcadia);

            $em->persist($avis);
            $em->flush();

            $this->addFlash('success', 'Votre avis a bien été pris en compte il sera publié après validation de l\'administrateur.');
            
            //Redirection vers la page d'accueil
            return $this->redirectToRoute('app_home');
        }

        return $this->render('page/index.html.twig', [
            'websiteName' =>$websiteName,
            'arcadia' => $arcadia,
            'avisform' => $avisForm->createView(),
            'slider' => $slider,
        ]);
    }
}