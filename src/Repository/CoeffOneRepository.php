<?php

namespace App\Repository;

use App\Entity\CoeffOne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CoeffOne|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoeffOne|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoeffOne[]    findAll()
 * @method CoeffOne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeffOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoeffOne::class);
    }

    public function findAllCoeff()//генерируем запрос что выбираем синтаксисом доктрины
    {
        return $this->createQueryBuilder('c')
            ->select('c.id', 'c.company_name', 'c.period', 'c.coeff_value')
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return CoeffOne[] Returns an array of CoeffOne objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoeffOne
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
