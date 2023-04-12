<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/amdin')]
class AdminController extends AbstractController
{
    #[Route('/tableau-de-bord', name: 'show_dashboard', methods: ['GET'])]
    public function showDashboard(EntityManagerInterface $entityManager): Response
    # Désactiver access_control dans config/packages/security.yaml !! (sinon cela ne fonctionne pas.)
    {

        try {
            $this->denyAccessUnlessGranted("ROLE_ADMIN");

        } catch (AccessDeniedException $exeption ) {
            $this->addFlash('danger', "cette partie du site est réservée");
            return $this->redirectToRoute(('app_login'));
            
        }

        $categories = $entityManager->getRepository(Category::class)->findBy(['deletedAt'=> null]);

        
        return $this->render('admin/show_dasboard.html.twig', [
            'categories' => $categories
        ]);

    }
}
