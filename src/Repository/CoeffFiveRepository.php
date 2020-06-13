<?php

namespace App\Repository;

use App\Entity\CoeffFive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CoeffFive|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoeffFive|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoeffFive[]    findAll()
 * @method CoeffFive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeffFiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoeffFive::class);
    }

    public function findAllCoeff() //генерируем запрос что выбираем синтаксисом доктрины
    {
        return $this->createQueryBuilder('c')
            ->select('c.id', 'c.company_name', 'c.period', 'c.coeff_value')
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return CoeffFive[] Returns an array of CoeffFive objects
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
    public function findOneBySomeField($value): ?CoeffFive
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
