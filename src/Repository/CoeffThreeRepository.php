<?php

namespace App\Repository;

use App\Entity\CoeffThree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CoeffThree|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoeffThree|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoeffThree[]    findAll()
 * @method CoeffThree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoeffThreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoeffThree::class);
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
//     * @return CoeffThree[] Returns an array of CoeffThree objects
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
    public function findOneBySomeField($value): ?CoeffThree
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
