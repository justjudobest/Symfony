<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**

 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param $value
     * @return int|mixed|string|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */


    public function ProductСommodity($value) :array
    {
        return $this->createQueryBuilder('p')
            ->select('ap.value', 'a.name')
            ->join('p.attributeProduct','ap')
            ->join('ap.attributes','a')
            ->andWhere('p.id = :value')
            ->setParameter('value', $value)
            ->getQuery()
            ->getResult($value);
    }

    /**
     * @param $value
     * @return array
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function ProductImages($value) :array
    {
        return $this->createQueryBuilder('p')
            ->select('i.url','i.name','i.id')
            ->join('p.imagesProduct','i')
            ->andWhere('p.id = :value')
            ->setParameter('value', $value)
            ->getQuery()
            ->getResult($value);
    }


    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
