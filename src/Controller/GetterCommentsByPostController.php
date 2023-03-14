<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Posts;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetterCommentsByPostController extends AbstractController
{
    public function __invoke($id, EntityManagerInterface $entityManager): array
    {
        $post = $entityManager->getRepository(Posts::class)->findOneBy(['id' => $id]);
        return $entityManager->getRepository(Comment::class)->findBy(['post' => $post]);
    }
}
