<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Help\FileUploader;

class EditController extends AbstractController
{
    #[Route('/article/edit/{id}', name: 'article_edit')]
    public function edit(Article $article, Request $request, EntityManagerInterface $em, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(ArticleFormType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('image')->getData();

            $article->setImage($file);
            $article->setUpdatedAt(new \DateTime());
            $em->persist($article);
            $em->flush();
            $this->addFlash('success', 'Article Updated!');
            return $this->redirectToRoute('home');

        }

        return $this->render('pages/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}


