<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Arcadia;
use App\Entity\Avis;
use App\Entity\Contact;
use App\Entity\Habitat;
use App\Entity\Race;
use App\Entity\RapportEmploye;
use App\Entity\RapportVeterinaire;
use App\Entity\Service;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Seul un administrateur peut accerder à cette page!');
        return $this->render('admin/dashboard.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Arcadia');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-chart-line');
        yield MenuItem::linkToCrud('Arcadia', 'fa fa-home', Arcadia::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Animaux', 'fas fa-hippo', Animal::class);
        yield MenuItem::linkToCrud('Habitats', 'fas fa-house-chimney-window', Habitat::class);
        yield MenuItem::linkToCrud('Races', 'fas fa-otter', Race::class);
        yield MenuItem::linkToCrud('Rapports vétérinaire', 'fas fa-file', RapportVeterinaire::class);
        yield MenuItem::linkToCrud('Rapports émployé', 'fas fa-file', RapportEmploye::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-briefcase', Service::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-star', Avis::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-envelope', Contact::class);
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_home');
    }
}
