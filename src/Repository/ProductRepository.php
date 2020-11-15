<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
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
        $qb =  $this->createQueryBuilder('p')
            ->select('ap.value', 'a.name')
            ->join('p.attributeProduct','ap')
            ->join('ap.attributes','a')
            ->andWhere('p.id = :value')
            ->setParameter('value', $value)
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param $value
     * @return array
     * @throws \Doctrine\ORM\NonUniqueResultException
     */


    public function findChildren(int $productId): array
    {
       $qb =  $this->createQueryBuilder('p')
            ->join('p.productOption', 'po')
            ->andWhere('po.parent_id = :productId')
            ->setParameter('productId', $productId)
            ->getQuery();
       return $qb->getResult();

    }

    public function findCategory(int $productId): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.categories', 'c')
            ->andWhere('p.id = :value')
            ->setParameter('value', $productId)
            ->getQuery()
            ->getResult();
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
