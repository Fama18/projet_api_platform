<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use App\Repository\CompteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CompteController extends AbstractController
{
    /**
    * @Route("/compte", name="addCompte")
    */
    public function new(Request $request): Response
    {
        $Compte = new Compte();
        $form = $this->createForm(CompteType::class, $Compte);
        // traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Compte);
            $em->flush();
            return $this->redirectToRoute('addCompte');
        }
        return $this->render('compte/compte.html.twig', [
            "form" => $form->createView()
        ]);
    }
     /**
     * @Route("/listCompte", name="listComptes")
     */
     public function ListCompte(CompteRepository $repository)
    {
        $Comptes = $repository->findAll();

        return $this->render('compte/listCompte.html.twig', [
            "Comptes" => $Comptes,
        ]);
    } 

}
