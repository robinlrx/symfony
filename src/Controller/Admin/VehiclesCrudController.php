<?php

namespace App\Controller\Admin;

use App\Entity\Vehicles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehiclesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicles::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
