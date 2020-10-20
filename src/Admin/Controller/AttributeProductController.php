<?php

namespace App\Admin\Controller;

use App\Entity\AttributeProduct;
use App\Form\AttributeProductType;
use App\Repository\AttributeProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/attribute/product", name="AttributeProductController")
 */
class AttributeProductController extends AbstractController
{
    /**
     * @Route("/", name="attribute_product_index", methods={"GET"})
     * @param AttributeProductRepository $attributeProductRepository
     * @return Response
     */
    public function index(AttributeProductRepository $attributeProductRepository): Response
    {
        return $this->render('admin/attribute_product/index.html.twig', [
            'attribute_products' => $attributeProductRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="attribute_product_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $attributeProduct = new AttributeProduct();
        $form = $this->createForm(AttributeProductType::class, $attributeProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($attributeProduct);
            $entityManager->flush();

            return $this->redirectToRoute('attribute_product_index');
        }

        return $this->render('admin/attribute_product/new.html.twig', [
            'attribute_product' => $attributeProduct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attribute_product_show", methods={"GET"})
     * @param AttributeProduct $attributeProduct
     * @return Response
     */
    public function show(AttributeProduct $attributeProduct): Response
    {
        return $this->render('admin/attribute_product/show.html.twig', [
            'attribute_product' => $attributeProduct,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="attribute_product_edit", methods={"GET","POST"})
     * @param Request $request
     * @param AttributeProduct $attributeProduct
     * @return Response
     */
    public function edit(Request $request, AttributeProduct $attributeProduct): Response
    {
        $form = $this->createForm(AttributeProductType::class, $attributeProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attribute_product_index');
        }

        return $this->render('admin/attribute_product/edit.html.twig', [
            'attribute_product' => $attributeProduct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attribute_product_delete", methods={"DELETE"})
     * @param Request $request
     * @param AttributeProduct $attributeProduct
     * @return Response
     */
    public function delete(Request $request, AttributeProduct $attributeProduct): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attributeProduct->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($attributeProduct);
            $entityManager->flush();
        }

        return $this->redirectToRoute('attribute_product_index');
    }
}
