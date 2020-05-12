<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\Product;
use App\Entity\ProductPrice;
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
    const DEFAULT_FIELD = 'id';
    const DEFAULT_ORDER = 'asc';
    const DEFAULT_PAGE = 1;
    const DEFAULT_PERPAGE = 20;
    const DEFAULT_CATEGORY = 0;
    const MIN_PRICE = 0.0;
    const MAX_PRICE = 9999999.99;

    private $languageRepository;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
        $this->languageRepository = new LanguageRepository($registry);
    }

    /**
     * Recuperation des produits
     *
     * @param string $lang
     * @param string $search
     * @param int $cat
     * @param integer $page
     * @param integer $perPage
     * @param string $field
     * @param string $order
     * @param float $priceMin
     * @param float $priceMax
     * @return Product[]
     */
    public function getProducts(
        string $lang = LanguageRepository::DEFAULT_LANGUAGE,
        string $search = '',
        int $cat = self::DEFAULT_PAGE,
        int $page = self::DEFAULT_PAGE,
        int $perPage = self::DEFAULT_PERPAGE,
        string $field = self::DEFAULT_FIELD,
        string $order = self::DEFAULT_ORDER,
        float $priceMin = self::MIN_PRICE,
        float $priceMax = self::MAX_PRICE
    ): array {
        $language = $this->languageRepository->getLanguageByAlpha2($lang);
        $qb = $this->createQueryBuilder('p');
        $qb
            ->join(Post::class, 'post', 'WITH', 'p.post = post.id')
            ->join(ProductPrice::class, 'price', 'WITH', 'p.id = price.product AND price.language = :language')
            ->where('p.isActive = :isActive')
            ->andWhere($qb->expr()->between('price.vatInc', $priceMin, $priceMax))
            ->orderBy($field, $order)
            ->setParameters('isActive', true)
            ->setParameters('language', $language->getId())
            ->setFirstResult(($page - 1) > 0 ? ($page - 1) * $perPage : 0)
            ->setMaxResults($perPage);
        if ($cat > 0) {
            $qb
                ->andWhere('p.category = :category')
                ->setParameters('category', $cat);
        }
        $search = trim($search);
        if ($search != '') {
            $qb
                ->andWhere($qb->expr()->like('post.title', ':title'))
                ->setParameters('title', '%' . $search . '%');
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Recuperation du nombre d'enregistrement
     *
     * @param string $lang
     * @param string $search
     * @param integer $cat
     * @param float $priceMin
     * @param float $priceMax
     * @return integer
     */
    public function getProductsCount(
        string $lang = LanguageRepository::DEFAULT_LANGUAGE,
        string $search = '',
        int $cat = self::DEFAULT_PAGE,
        float $priceMin = self::MIN_PRICE,
        float $priceMax = self::MAX_PRICE
    ): int {
        $language = $this->languageRepository->getLanguageByAlpha2($lang);
        $qb = $this->createQueryBuilder('p');
        $qb
            ->join(Post::class, 'post', 'WITH', 'p.post = post.id')
            ->join(ProductPrice::class, 'price', 'WITH', 'p.id = price.product AND price.language = :language')
            ->where('p.isActive = :isActive')
            ->andWhere($qb->expr()->between('price.vatInc', $priceMin, $priceMax))
            ->setParameters('isActive', true)
            ->setParameters('language', $language->getId());
        if ($cat > 0) {
            $qb
                ->andWhere('p.category = :category')
                ->setParameters('category', $cat);
        }
        $search = trim($search);
        if ($search != '') {
            $qb
                ->andWhere($qb->expr()->like('post.title', ':title'))
                ->setParameters('title', '%' . $search . '%');
        }

        return (int) $qb
            ->select($qb->expr()->count('p.id'))
            ->getQuery()
            ->getSingleScalarResult();
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
