<?php

namespace App\Controller;

use App\Entity\StockSmartphone;
use App\Form\StockSmartphoneType;
use App\Repository\StockSmartphoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SmartphoneRepository;
use App\Entity\Smartphone;

/**
 * @Route("/admin/stock/smartphone")
 */
class StockSmartphoneController extends AbstractController
{
    /**
     * @Route("/{marque}/{id}", name="stock_smartphone_index", methods={"GET"})
     */
    public function index($marque, $id, StockSmartphoneRepository $stockSmartphoneRepository, SmartphoneRepository $smartphoneRepository): Response
    {
        /**
         * @var StockSmartphone
         */
        $_variants = $stockSmartphoneRepository->findBy([
            'smartphone' => $id
        ]);

        // if  $_variants  is NULL ???


        /**
         * @var Smartphone
         */
        $smartphone = $smartphoneRepository->find($id);


        return $this->render('stock_smartphone/index.html.twig', [
            'stock_smartphones' => $_variants,
            'smartphone' => $smartphone,
        ]);
    }

    /**
     * @Route("/{marque}/{id_smartphone}/new", name="stock_smartphone_new", methods={"GET","POST"})
     */
    public function new($marque, $id_smartphone,Request $request,SmartphoneRepository $smartphoneRepository): Response
    {

        // get smartphone
        $smartphone = $smartphoneRepository->find($id_smartphone);

        $stockSmartphone = new StockSmartphone();
        $form = $this->createForm(StockSmartphoneType::class, $stockSmartphone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            // connt vitant with smartphone
            $stockSmartphone->setSmartphone( $smartphone );

            $entityManager->persist($stockSmartphone);
            $entityManager->flush();

            return $this->redirectToRoute('stock_smartphone_index', [
                'marque' => $smartphone->getMarque()->getName(),
                'id' => $smartphone->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stock_smartphone/new.html.twig', [
            'stock_smartphone' => $stockSmartphone,
            'form' => $form->createView(),
            'smartphone' => $smartphone,
        ]);
    }

    /**
     * @Route("/{id}", name="stock_smartphone_show", methods={"GET"})
     */
    public function show(StockSmartphone $stockSmartphone): Response
    {
        return $this->render('stock_smartphone/show.html.twig', [
            'stock_smartphone' => $stockSmartphone,
        ]);
    }

    /**
     * @Route("/{id_smartphone}/{id}/edit", name="stock_smartphone_edit", methods={"GET","POST"})
     */
    public function edit(Request $request,$id_smartphone, StockSmartphone $stockSmartphone,SmartphoneRepository $smartphoneRepository): Response
    {
        // get smartphone
        /**
         * @var Smartphone
         */
        $smartphone = $smartphoneRepository->find($id_smartphone);

        $form = $this->createForm(StockSmartphoneType::class, $stockSmartphone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stock_smartphone_index', [
                'id' => $smartphone->getId(),
                'marque' => $smartphone->getMarque()->getName()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stock_smartphone/edit.html.twig', [
            'stock_smartphone' => $stockSmartphone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stock_smartphone_delete", methods={"POST"})
     */
    public function delete(Request $request, StockSmartphone $stockSmartphone): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stockSmartphone->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stockSmartphone);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stock_smartphone_index', [], Response::HTTP_SEE_OTHER);
    }
}
