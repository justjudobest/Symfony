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
     * @Route("/product/{product}", name="test")
     * @param Product $product
     * @param ProductRepository $productRepository
     * @return Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function productView(Product $product, ProductRepository $productRepository): Response
    {
        $attribute = $productRepository->ProductСommodity($product->getId());
        $image = $productRepository->ProductImages($product->getId());

        return $this->render('product/product.html.twig', [
            'product' => $product,
            'attributes' => $attribute,
            'images' => $image
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
