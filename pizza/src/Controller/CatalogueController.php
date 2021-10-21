<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Form\AddToPanierType;
use App\Manager\PanierManager;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{
    /**
     * @Route("/catalogue", name="catalogue")
     */

    public function index(): Response {
        // on stock dans une variable toute les pizza de la base de donnée 
        $pizza = $this->getDoctrine()->getRepository(Pizza::class)->findAll();  

        // on affiche la page "nos_pizzas.html.yaml" et on envoie la variable qu'on a créer
            return $this->render('nos_pizzas.html.twig', [
                'pizza' => $pizza,
            ]);
            
    }

}
