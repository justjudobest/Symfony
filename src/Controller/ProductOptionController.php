<?php

namespace App\Controller;

use App\Entity\ProductOption;
use App\Form\ProductOptionType;
use App\Repository\ProductOptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product/option")
 */
class ProductOptionController extends AbstractController
{
    /**
     * @Route("/", name="product_option_index", methods={"GET"})
     */
    public function index(ProductOptionRepository $productOptionRepository): Response
    {
        return $this->render('product_option/index.html.twig', [
            'product_options' => $productOptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="product_option_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $productOption = new ProductOption();
        $form = $this->createForm(ProductOptionType::class, $productOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($productOption);
            $entityManager->flush();

            return $this->redirectToRoute('product_option_index');
        }

        return $this->render('product_option/new.html.twig', [
            'product_option' => $productOption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_option_show", methods={"GET"})
     */
    public function show(ProductOption $productOption): Response
    {
        return $this->render('product_option/show.html.twig', [
            'product_option' => $productOption,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="product_option_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProductOption $productOption): Response
    {
        $form = $this->createForm(ProductOptionType::class, $productOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_option_index');
        }

        return $this->render('product_option/edit.html.twig', [
            'product_option' => $productOption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_option_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProductOption $productOption): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productOption->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($productOption);
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_option_index');
    }
}
