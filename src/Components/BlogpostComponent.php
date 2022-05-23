<?php

namespace App\Components;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('blogpost')]
class BlogpostComponent
{
    public int $id;

    public function __construct(
        private BlogRepository $blogRepository
    ) {
    }

    public function getBlogpost(): Blog
    {
        return $this->blogRepository->find($this->id);
    }
}