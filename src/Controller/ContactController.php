<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ArcadiaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ArcadiaRepository $arcadiaRepository, Request $request,EntityManagerInterface $em): Response
    {

        $arcadia = $arcadiaRepository->findOneBy(['id' => '1']);

        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $contact->setCreatedAt(new \DateTimeImmutable());

            

            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', 'Votre message a bien été envoyé');

            //Redirection vers la page de contact
            return $this->redirectToRoute('app_contact');

        }

        return $this->render('contact/index.html.twig', [
            'arcadia' => $arcadia,
            'form' => $form->createView(),
        ]);
    }
}
