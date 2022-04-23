<?php

namespace App\Repository;

use App\Entity\TasksAssignedForUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TasksAssignedForUser>
 *
 * @method TasksAssignedForUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method TasksAssignedForUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method TasksAssignedForUser[]    findAll()
 * @method TasksAssignedForUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TasksAssignedForUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TasksAssignedForUser::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TasksAssignedForUser $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TasksAssignedForUser $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return TasksAssignedForUser[] Returns an array of TasksAssignedForUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TasksAssignedForUser
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
