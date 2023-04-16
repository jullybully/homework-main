<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function list(ArticleRepository $articleRepository, EntityManagerInterface $entityManager): Response
    {
        $articles = $articleRepository->findAllSortedByUpdatedAt();

        return $this->render('pages/index.html.twig', [
            'articles' => $articles,
        ]);
            //'articles' => $articleRepository->findAll(),
    }
}
