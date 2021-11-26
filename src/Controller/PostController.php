<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(PostRepository $repository): Response
    {
        $posts = $repository->findBy([],['createAt' => 'DESC'], self::MAX_POSTS_PER_PAGE);

        return $this->render('post/index.html.twig', [
            'title' => 'Bienvenue sur mon blog !',
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id": "\d+"})
     */
    public function show(int $id, PostRepository $repository): Response
    {
        $post = $repository->find($id);

        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
}
