<?php

namespace App\Repository;

use App\Entity\Workflow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Workflow>
 *
 * @method Workflow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Workflow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Workflow[]    findAll()
 * @method Workflow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkflowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workflow::class);
    }

    public function add(Workflow $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Workflow $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Workflow[] Returns an array of Workflow objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Workflow
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function filterActiveNceNotActiveOnWorkflowOrNotFound():array
{
    $conn=$this->getEntityManager()->getConnection();
    $sql="SELECT * FROM nce JOIN workflow on nce.fixe = workflow.n_Appel where (workflow.etat !="."'En service' or workflow.etat is null) "." and nce.etat ="."'Activated'";
    $stat=$conn->prepare($sql);
 $result= $stat->executeQuery();
 return $result->fetchAllAssociative();

}
    public function filterFoundOnWorkflowNotFoundOnNce():array
    {
        $conn=$this->getEntityManager()->getConnection();
        $sql="select * from workflow LEFT JOIN nce on workflow.n_Appel=nce.fixe WHERE nce.fixe is null";
        $stat=$conn->prepare($sql);
        $result= $stat->executeQuery();
        return $result->fetchAllAssociative();

    }
    public function filterActiveWorkflowNotFoundIms():array
    {
        $conn=$this->getEntityManager()->getConnection();
        $sql="select * from workflow LEFT JOIN ims on workflow.n_Appel=ims.fixe WHERE ims.fixe is null and workflow.etat ='En service'";
        $stat=$conn->prepare($sql);
        $result= $stat->executeQuery();
        return $result->fetchAllAssociative();

    }
    public function deleteAllNce()
    {
        $conn=$this->getEntityManager()->getConnection();
        $sql="delete from Nce";
        $stat=$conn->prepare($sql);
        $result= $stat->executeQuery();

    }
    public function deleteAllWorkFlow()
    {
        $conn=$this->getEntityManager()->getConnection();
        $sql="delete from workflow";
        $stat=$conn->prepare($sql);
        $result= $stat->executeQuery();

    }
    public function deleteAllIms()
    {
        $conn=$this->getEntityManager()->getConnection();
        $sql="delete from ims";
        $stat=$conn->prepare($sql);
        $result= $stat->executeQuery();

    }



}
