<?php

namespace App\Controller;

use App\Entity\AttributeProduct;
use App\Entity\Categories;
use App\Entity\Images;
use App\Entity\Product;
use App\Repository\AttributeProductRepository;
use App\Repository\CategoriesRepository;
use App\Repository\ImagesRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\NonUniqueResultException;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('product/product.html.twig', [

        ]);
    }

    /**
     * @Route("/product/{product}", name="product_detail")
     * @param Product $product
     * @param ProductRepository $productRepository
     * @return Response
     * @throws NonUniqueResultException
     */
    public function productView(Product $product, ProductRepository $productRepository): Response
    {
        $attribute = $productRepository->ProductСommodity($product->getId());
        $children = $productRepository->findChildren($product->getId());
        $categories = $productRepository->findCategory($product->getId());



        return $this->render('product/product.html.twig', [
            'product' => $product,
            'attributes' => $attribute,
            'children' => $children,
            'categories' =>$categories,

        ]);
    }

    /**
     * @Route("/product/{product}/{childProduct}", name="product_detail_children")
     * @param Product $product
     * @param Product $childProduct
     * @param ProductRepository $productRepository
     * @return Response
     * @throws NonUniqueResultException
     */
    public function productViewChildren(Product $product, Product $childProduct, ProductRepository $productRepository): Response
    {
        $attribute = $productRepository->ProductСommodity($product->getId());
        $children = $productRepository->findChildren($product->getId());

        return $this->render('product/product.html.twig', [
            'children' => $children,
            'childProduct' => $childProduct,
            'product' => $product,
            'attributes' => $attribute,
        ]);
    }





/*    public function apshow ($id){
        $ap = $this->getDoctrine()
            ->getRepository('ap:AttributeProduct')
            ->find($id);
        if (!$ap) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

    }*/

}
