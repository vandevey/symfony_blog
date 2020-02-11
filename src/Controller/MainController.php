<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $latestPosts = $entityManager->getRepository(Post::class)->findLatestPublished();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'latestPosts' => $latestPosts
        ]);
    }
}
