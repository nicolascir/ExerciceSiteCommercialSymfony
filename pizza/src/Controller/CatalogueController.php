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

    // public function index(): Response
    // {
    //     return $this->render('nos_pizzas.html.twig', [
    //         'controller_name' => 'CatalogueController',
    //     ]);
    // }

    public function index(): Response {
        // on appelle  la liste des pizzas :
        $pizza = $this->getDoctrine()->getRepository(Pizza::class)->findAll();  

            return $this->render('nos_pizzas.html.twig', [
                // 'controller_name' => 'CatalogueController',
                'pizza' => $pizza,
            ]);
            
    }

}
