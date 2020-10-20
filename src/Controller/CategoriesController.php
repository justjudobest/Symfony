<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Product;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categories")
 */
class CategoriesController extends AbstractController
{
    /**
     * @Route("/{categories}", name="categories")
     * @param Categories $categories
     * @param CategoriesRepository $categoriesRepository
     * @return Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     */

    public function categoriesView(Categories $categories, CategoriesRepository $categoriesRepository ): Response
    {
        return $this->render('categories/categories.html.twig', [
            'categories' => $categories,
        ]);
    }
}
