<?php

namespace App\Repository;

use App\Entity\Employees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Employees|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employees|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employees[]    findAll()
 * @method Employees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employees::class);
    }

    public function findAllEmployees()//генерируем запрос что выбираем синтаксисом доктрины
    {
        return $this->createQueryBuilder('em')
            ->select(
                'em.id',
                'em.name',
                'em.post',
                'em.financing',
                'em.patent_num',
                'em.patent_application_num',
                'em.research_num',
                'em.publication_num',
                'em.period')
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return Company[] Returns an array of Company objects
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
    public function findOneBySomeField($value): ?Company
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
