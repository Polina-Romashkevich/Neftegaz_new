<?php

namespace App\Repository;

use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use \Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    public function findAllCompanies()//генерируем запрос что выбираем синтаксисом доктрины
    {
        return $this->createQueryBuilder('c')
            ->select(
                 'c.id',
                'c.name',
                'c.location',
                'c.taxpayer_num',
                'c.unit_num',
                'c.employees_num',
                'c.sort_activity',
                'c.investment',
                'c.patent_num',
                'c.patent_application_num',
                'c.quote_num',
                'c.research_num',
                'c.publication_num',
                'c.net_profit',
                'c.intangible_asset',
                'c.cost_oil_production',
                'c.oil_production',
                'c.period')
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
