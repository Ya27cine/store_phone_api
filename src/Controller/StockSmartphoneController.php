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

/**
 * @Route("/admin/stock/smartphone")
 */
class StockSmartphoneController extends AbstractController
{
    /**
     * @Route("/{marque}/{id}", name="stock_smartphone_index", methods={"GET"})
     */
    public function index($marque, $id, StockSmartphoneRepository $stockSmartphoneRepository): Response
    {
        /**
         * @var StockSmartphone
         */
        $_variants = $stockSmartphoneRepository->findBy([
            'smartphone' => $id
        ]);

       // dd("d;lf");

        return $this->render('stock_smartphone/index.html.twig', [
            'stock_smartphones' => $_variants,
            'marque' => $marque,
            'id_smartphone' => $id

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
            $entityManager->persist($stockSmartphone);
            $entityManager->flush();

            return $this->redirectToRoute('stock_smartphone_index', [], Response::HTTP_SEE_OTHER);
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
    public function edit(Request $request,$id_smartphone, StockSmartphone $stockSmartphone): Response
    {
        $form = $this->createForm(StockSmartphoneType::class, $stockSmartphone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stock_smartphone_index', [], Response::HTTP_SEE_OTHER);
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
