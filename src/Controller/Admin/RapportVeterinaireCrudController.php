<?php

namespace App\Controller\Admin;

use App\Entity\RapportVeterinaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class RapportVeterinaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportVeterinaire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield DateField::new('date');
        AssociationField::new('user');
        AssociationField::new('animal');
        yield TextEditorField::new('etat');
        yield TextEditorField::new('repasConseille');
        yield TextEditorField::new('grammageConseille');
        yield TextEditorField::new('detail');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->disable(Action::DELETE, Action::NEW, Action::EDIT);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setDefaultSort(['date' => 'DESC']);
    }
}
