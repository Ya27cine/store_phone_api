<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Smartphone;
use App\Form\SmartphoneType;
use App\Repository\SmartphoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/smartphone")
 */
class SmartphoneController extends AbstractController
{
    /**
     * @Route("/", name="smartphone_index", methods={"GET"})
     */
    public function index(Request $request, SmartphoneRepository $smartphoneRepository): Response
    {
        $filtre_marque  = $request->query->get('marque');

        if($filtre_marque){
            $smartphones = $smartphoneRepository->findBy([
                'Marque' => $filtre_marque
            ]);
        }else{
            $smartphones = $smartphoneRepository->findAll();
        }

        return $this->render('smartphone/index.html.twig', [
            'smartphones' => $smartphones,
            'choice_marque' => $filtre_marque
        ]);
    }

    /**
     * @Route("/new", name="smartphone_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $smartphone = new Smartphone();
        $form = $this->createForm(SmartphoneType::class, $smartphone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère les images transmises
            $images = $form->get('images')->getData();
             // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
                
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('upload_image_smartphone_directory'),
                    $fichier
                );
                
                // On crée l'image dans la base de données
                $img = new Image();
                $img->setImageName($fichier);
                $smartphone->addImage($img);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($smartphone);
            $entityManager->flush();

            return $this->redirectToRoute('smartphone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('smartphone/new.html.twig', [
            'smartphone' => $smartphone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="smartphone_show", methods={"GET"})
     */
    public function show(Smartphone $smartphone): Response
    {
        return $this->render('smartphone/show.html.twig', [
            'smartphone' => $smartphone,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="smartphone_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Smartphone $smartphone): Response
    {
        $form = $this->createForm(SmartphoneType::class, $smartphone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère les images transmises
            $images = $form->get('images')->getData();
             // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
                
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('upload_image_smartphone_directory'),
                    $fichier
                );
                
                // On crée l'image dans la base de données
                $img = new Image();
                $img->setImageName($fichier);
                $smartphone->addImage($img);
            }
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('smartphone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('smartphone/edit.html.twig', [
            'smartphone' => $smartphone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="smartphone_delete", methods={"POST"})
     */
    public function delete(Request $request, Smartphone $smartphone): Response
    {
        if ($this->isCsrfTokenValid('delete'.$smartphone->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($smartphone);
            $entityManager->flush();
        }

        return $this->redirectToRoute('smartphone_index', [], Response::HTTP_SEE_OTHER);
    }
}
