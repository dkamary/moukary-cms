<?php

namespace App\Controller;

use App\Helper\Paginator;
use App\Repository\PostRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route({
     *      "fr": "/tous-les-produits/{page}/{perPage}/{field}/{order}/{priceMin}/{priceMax}",
     *      "en": "/en/all-products/{page}/{perPage}/{field}/{order}/{priceMin}/{priceMax}"
     * }, name="all_products")
     */
    public function all(
        int $page = ProductRepository::DEFAULT_PAGE,
        int $perPage = ProductRepository::DEFAULT_PERPAGE,
        string $field = ProductRepository::DEFAULT_FIELD,
        string $order = ProductRepository::DEFAULT_ORDER,
        float $priceMin = ProductRepository::MIN_PRICE,
        float $priceMax = ProductRepository::MAX_PRICE,
        Request $request,
        ProductRepository $productRepository,
        UrlGeneratorInterface $urlGeneratorInterface
    ) {
        $lang = $request->getLocale();
        $products = $productRepository->getProducts($lang, '', 0, $page, $perPage, $field, $order, $priceMin, $priceMax);
        $paginator = new Paginator($urlGeneratorInterface, $productRepository->getProductsCount($lang, '', 0, $priceMin, $priceMax), 'all_products', $page, $perPage, [
            'field' => $field,
            'order' => $order,
            'priceMin' => $priceMin,
            'priceMax' => $priceMax,
        ]);

        return $this->render('product/all.html.twig', [
            'products' => $products,
            'paginator' => $paginator,
        ]);
    }

    /**
     * @Route({
     *      "fr": "/_partials/produits/mis-en-avant",
     *      "en": "/_partials/products/featured"
     * }, name="featured_products")
     */
    public function featured(ProductRepository $productRepository)
    {
        $products = [];

        return $this->render('product/featured.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route({
     *      "fr": "/_partials/produits/populaire",
     *      "en": "/_partials/products/popular"
     * }, name="popular_products")
     */
    public function popular(ProductRepository $productRepository)
    {
        $products = [];

        return $this->render('product/popular.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route({
     *      "fr": "/_partials/produits/marques",
     *      "en": "/_partials/products/brands"
     * }, name="brands")
     */
    public function brands(PostRepository $postRepository)
    {
        $brands = [];

        return $this->render('product/brands.html.twig', [
            'brands' => $brands,
        ]);
    }
}
