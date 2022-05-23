<?php

namespace App\Components;

use App\Repository\BlogRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('count_blogpost')]
class CountBlogpostComponent
{
    use DefaultActionTrait;

    public function __construct(
        private BlogRepository $blogRepository
    ) {
    }

    public function getCountBlogpost(): int
    {
        return $this->blogRepository->count([]);
    }
}