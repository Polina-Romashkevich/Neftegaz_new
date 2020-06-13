<?php

namespace App\Repository;

use App\Entity\CoeffFour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CoeffFour|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoeffFour|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoeffFour[]    findAll()
 * @method CoeffFour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeffFourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoeffFour::class);
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
//     * @return CoeffFour[] Returns an array of CoeffFour objects
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
    public function findOneBySomeField($value): ?CoeffFour
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
