<?php

namespace App\Controller\Admin;

use App\Entity\Arcadia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ArcadiaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Arcadia::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextEditorField::new('description');
        yield TimeField::new('openHoraire');
        yield TimeField::new('closeHoraire');
        yield TextField::new('email');
        yield TextField::new('telephone');
        yield TextField::new('adresse');
        yield TextField::new('ville');
    }
}
