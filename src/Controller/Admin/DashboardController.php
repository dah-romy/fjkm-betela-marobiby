<?php

namespace App\Controller\Admin;

use App\Utils\Utils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin")
 */
class DashboardController extends AbstractController
{
    protected $breadcrumbs;
    public function __construct(Utils $utils)
    {
        $this->breadcrumbs = $utils->breadcrumbs;
    }

    /**
     * @Route("/", name="admin.index")
     */
    public function dashboard(){
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app.login');
        }

        $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
        $this->breadcrumbs->addItem("Statistika");
        
        return $this->render("admin/dashboard/index.html.twig", [
            "title" => "Statistika"
        ]);
    }
}