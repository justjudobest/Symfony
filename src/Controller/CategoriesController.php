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
     * @throws NonUniqueResultException
     */

    public function categoriesView(Categories $categories, CategoriesRepository $categoriesRepository ): Response
    {
        $children = $categoriesRepository->findChildren($categories->getId());
        // select c.* from categories c where parent_id = id

        $subCategories = $categoriesRepository->findBy(['parent_id' => $categories->getId()]);
        return $this->render('categories/categories.html.twig', [
            'categories' => $categories,
            'children' => $children,
            'subcategories' => $subCategories
        ]);
    }

    /**
     * @Route("/{categories}/{childCategories}", name="categories_children")
     * @param Categories $categories
     * @param Categories $childCategories
     * @param CategoriesRepository $categoriesRepository
     * @return Response
     * @throws NonUniqueResultException
     */

    public function productViewChildren(Categories $categories, Categories $childCategories, CategoriesRepository $categoriesRepository ): Response
    {

        $subCategories = $categoriesRepository->subСategory($categories->getId());
        $children = $categoriesRepository->findChildren($categories->getId());

        return $this->render('categories/categories.html.twig', [
            'children' => $children,
            'categories' => $categories,
            'subcategories' => $subCategories,
            'childCategories' => $childCategories
        ]);
    }


}

