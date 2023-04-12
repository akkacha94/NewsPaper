<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/Admin')]
class CategoryController extends AbstractController
{
    #[Route('/ajouter-une-categorie', name: 'add_category', methods:['GET', 'POST'])]
    public function addCat(Request $request,CategoryRepository $repository, SluggerInterface $slugger): Response
    {

        $category = new Category();

        $form = $this->createForm('')

        return $this->render('category/add-category.html.twig', [
            
        ]);
    }
}
