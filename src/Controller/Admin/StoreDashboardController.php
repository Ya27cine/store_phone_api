<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Smartphone;
use App\Entity\User;
use App\Entity\StockSmartphone;

class StoreDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Store Samphone');
    }

    public function configureMenuItems(): iterable
    {
       // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
      //  yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Smartphones', 'fas fa-phone', Smartphone::class);
        yield MenuItem::linkToCrud('Stock', 'fas fa-list', StockSmartphone::class);

    }
}
