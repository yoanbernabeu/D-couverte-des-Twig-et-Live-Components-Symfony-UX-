<?php

namespace App\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(): Response
    {
        return $this->render('blog/search.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/edit/{id}', name: 'app_edit')]
    public function edit(Blog $blogpost): Response
    {
        return $this->render('blog/edit.html.twig', [
            'controller_name' => 'BlogController',
            'blogpost' => $blogpost,
        ]);
    }

    #[Route('/generate', name: 'app_generate')]
    public function generate(EntityManagerInterface $entityManagerInterface): Response
    {
        $faker = Factory::create('fr_FR');

        $blogpost = new Blog();

        $blogpost->setTitle($faker->sentence())
            ->setContent($faker->paragraph());

        $entityManagerInterface->persist($blogpost);
        $entityManagerInterface->flush();
        
        dd('Blog post created');
    }
}
