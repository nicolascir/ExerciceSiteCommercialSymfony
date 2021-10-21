<?php

namespace App\Controller\Admin;


use App\Entity\Pizza;
use App\Entity\User;
use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */


    public function index(): Response
    {
        
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(PizzaCrudController::class)->generateUrl();
        // $test = $this->is_granted('ROLE_ADMIN');
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // $test = $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            return $this->redirect($url);
        
    }

    // public function adminDashboard(): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');
    
    //     // or add an optional message - seen by developers
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
    // }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pizza');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Pizza', 'fas fa-pizza-slice', Pizza::class);
        // yield MenuItem::linkToCrud('Commande', 'fas fa-cart-arrow-down', Commande::class);
    }
}
