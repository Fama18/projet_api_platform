<?php

namespace App\Controller;

use App\Entity\ClientPhysique;
use App\Form\ClientPhysiqueType;
use App\Repository\ClientPhysiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PhysiqueController extends AbstractController
{
    /**
    * @Route("/clientPhysique", name="addPhysique")
    */
    public function new(Request $request): Response
    {
        $ClientPhysique = new ClientPhysique();
        $form = $this->createForm(ClientPhysiqueType::class, $ClientPhysique);
        // traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ClientPhysique);
            $em->flush();
            return $this->redirectToRoute('addPhysique');
        }
        return $this->render('physique/clientPhysique.html.twig', [
            "form" => $form->createView()
        ]);
    }
    /**
     * @Route("/ListPhysique", name="ListPhysiques")
     */
    public function ListPhysique(ClientPhysiqueRepository $repository)
    {
        $ClientPhysiques = $repository->findAll();

        return $this->render('physique/listPhysique.html.twig', [
            "ClientPhysiques" => $ClientPhysiques,
        ]);
    }

}