<?php

namespace App\Repository;

use App\Entity\CoeffTwo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CoeffTwo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoeffTwo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoeffTwo[]    findAll()
 * @method CoeffTwo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeffTwoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoeffTwo::class);
    }

    public function findAllCoeff()
    {
        return $this->createQueryBuilder('c')//генерируем запрос что выбираем синтаксисом доктрины
            ->select('c.id', 'c.company_name', 'c.period', 'c.coeff_value')
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return CoeffTwo[] Returns an array of CoeffTwo objects
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
    public function findOneBySomeField($value): ?CoeffTwo
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
