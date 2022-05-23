<?php

namespace App\Components;

use App\Repository\BlogRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('all_blogpost')]
class AllBlogpostComponent
{
    public function __construct(
        private BlogRepository $blogRepository
    ) {
    }

    public function getAllBlogpost(): array
    {
        return $this->blogRepository->findAll();
    }
}