<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetterCommentsOfUserController extends AbstractController
{
    public function __invoke($id, EntityManagerInterface $entityManager): array
    {
        $user = $entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
        return $entityManager->getRepository(Comment::class)->findBy(['user' => $user]);
    }
}
