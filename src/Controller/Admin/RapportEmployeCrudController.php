<?php

namespace App\Controller\Admin;

use App\Entity\RapportEmploye;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class RapportEmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportEmploye::class;
    }
    public function configureFields(string $pageName): iterable
    {
        yield DateField::new('date');
        yield AssociationField::new('user');
        yield AssociationField::new('animal');
        yield TextEditorField::new('repasDonne');
        yield TextEditorField::new('grammageDonne');
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
