<?php

namespace App\Repository\Book;

use App\Entity\Book;
use App\Repository\AbstractRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends AbstractRepository implements BookRepositoryInterface
{
    protected string $entityClass = Book::class;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry);
    }

    public function filterByAllFields($search): QueryBuilder
    {
        $queryBuilder = $this->createQueryBuilder('b');

        if (isset($search->author)) {
            $queryBuilder->where($queryBuilder->expr()->like('b.author', ':author'))
                ->setParameter('author', '%' . $search->author . '%');
        }

        if (isset($search->title)) {
            $queryBuilder->orWhere($queryBuilder->expr()->like('b.title', ':title'))
                ->setParameter('title', '%' . $search->title . '%');
        }

        if (isset($search->description)) {
            $queryBuilder->orWhere($queryBuilder->expr()->like('b.description', ':description'))
                ->setParameter('description', '%' . $search->description . '%');
        }

        return $queryBuilder->orderBy('b.id', Criteria::DESC);
    }
}
