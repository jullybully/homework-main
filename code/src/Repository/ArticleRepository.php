<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Article[] Returns an array of Article objects sorted by updated at field in descending order
     */
    public function findAllSortedByUpdatedAt(): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.updatedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
