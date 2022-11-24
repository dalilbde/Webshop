<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
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


    public function configureFields(string $pageName): iterable
    {


             yield ImageField::new('picture')
            ->setUploadDir('public/picture/uploads');

    }

}
