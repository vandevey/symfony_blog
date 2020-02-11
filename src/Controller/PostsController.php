<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class  PostsController extends AbstractController
{
    /**
     * @Route("/posts", name="posts")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $postList = $entityManager->getRepository(Post::class)->findPublished();
        return $this->render('posts/index.html.twig', [
            'controller_name' => 'PostsController',
            'posts' => $postList
        ]);
    }


    /**
     * @Route("/posts/{id}", name="single")
     */
    public function article(Post $post, EntityManagerInterface $entityManager, int $id)
    {
        $postList = $entityManager->getRepository(Post::class)->findPublished();
        return $this->render('posts/single.html.twig', ['post' => $post]);

    }
}
