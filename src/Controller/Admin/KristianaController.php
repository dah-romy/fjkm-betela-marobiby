<?php

namespace App\Controller\Admin;

use App\Utils\Utils;
use App\Entity\Kristiana;
use App\Form\KristianaType;
use App\Repository\KristianaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/kristiana")
 */
class KristianaController extends AbstractController
{
    protected $breadcrumbs;
    public function __construct(Utils $utils)
    {
        $this->breadcrumbs = $utils->breadcrumbs;
    }

    /**
     * @Route("/mpandray", name="kristiana.mpandray")
     *
     * @return void
     */
    public function mpandray(){
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app.login');
        }

        $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
        $this->breadcrumbs->addItem("Kristiana");
        $this->breadcrumbs->addItem("Lisitra");

        return $this->render("admin/kristiana/mpandray.html.twig", [
            "title" => "Lisitry ny mpandray"
        ]);
    }

    /**
     * @Route("/tsy-mpandray", name="kristiana.tsy-mpandray")
     *
     * @return void
     */
    public function tsy_mpandray(){
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app.login');
        }

        $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
        $this->breadcrumbs->addItem("Kristiana");
        $this->breadcrumbs->addItem("Lisitra");

        return $this->render("admin/kristiana/tsy-mpandray.html.twig", [
            "title" => "Lisitry ny tsy mpandray"
        ]);
    }

    /**
     * @Route("/mpandray/lisitra", name="kristiana.lisitra", options={"expose":true})
     */
    public function tsy_mpandray_list(KristianaRepository $repo, Request $request){
        
        $type = $request->query->get("type");

        if ($type == "mpandray") {
            $kristianas = $repo->findBy(["mpandray" => true]);
            $type = "mpandray";
        }else{
            $kristianas = $repo->findBy(["mpandray" => false]);
            $type = "tsy-mpandray";
        }
        
        $data['data'] = [];

        foreach ($kristianas as $key => $kristiana) {

            $action = $this->renderView('admin/kristiana/common/button.html.twig', [
                'kristiana' => $kristiana,
                'type' => $type
            ]);

            if ($kristiana->getSokajy() == "L") {
                $sokajy = "Lahy";
            }else{
                $sokajy = "Vavy";
            }

            $data['data'][] = [
                'kaody' => $kristiana->getKaody(),
                'anarana' => $kristiana->getAnarana(),
                'fanampiny' => $kristiana->getFanampiny(),
                'sokajy' => $sokajy,
                'action' => $action
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/vaovao", name="kristiana.vaovao")
     * @Route("/hanavao/{id}", name="kristiana.hanavao")
     *
     * @return void
     */
    public function action(Kristiana $kristiana = null,Request $request, EntityManagerInterface $manager){
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app.login');
        }

        $page = $request->query->get("page");

        $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
        $this->breadcrumbs->addItem("Kristiana");
        if ($page == "tsy-mpandray") {    
            $this->breadcrumbs->addRouteItem("Lisitry ny tsy mpandray","kristiana.tsy-mpandray");
        }else{
            $this->breadcrumbs->addRouteItem("Lisitry ny mpandray","kristiana.mpandray");
        }
        if (!$kristiana) {
            $this->breadcrumbs->addItem("Kristiana vaovao");
        }else{
            $this->breadcrumbs->addItem("Hanavao kristiana");
        }

        $editMode = true;

        if (!$kristiana) {
            $editMode = false;
            $kristiana = new Kristiana();
        }

        $form = $this->createForm(KristianaType::class,$kristiana);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $datyNandraisana = $_POST['daty-nandraisana'];
            if(!empty($datyNandraisana)){
                $date = date_create_from_format('m/d/Y', $datyNandraisana);
                $kristiana->setDatyNandraisana($date);
            }else{
                $kristiana->setDatyNandraisana(null);
            }

            $manager->persist($kristiana);
            $manager->flush();

            $kristiana->setKaody($form->get("sokajy")->getData()."-".$kristiana->getId());

            $manager->persist($kristiana);
            $manager->flush();

            if ($editMode) {
                $this->addFlash("success","Kristiana voahitsy soa aman-tsara!");
            }else{
                $this->addFlash("success","Kristiana tafiditra soa aman-tsara!");
            }

            if (!empty($datyNandraisana)) {
                return $this->redirectToRoute("kristiana.mpandray");
            }else{
                return $this->redirectToRoute("kristiana.tsy-mpandray");
            }

        }

        return $this->render("admin/kristiana/_action.html.twig", [
            'title' => "Hanampy kristiana",
            "form" => $form->createView(),
            'editMode' => $editMode,
            'kristiana' => $kristiana
        ]);
    }

    /**
     * @Route("/fafaina/{id}", name="kristiana.fafaina", options={"expose" = true})
     */
    public function delete(Kristiana $kristiana, EntityManagerInterface $manager){
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app.login');
        }else{

            $manager->remove($kristiana);
            $manager->flush();

            return new JsonResponse(array('message' => 'success'), Response::HTTP_OK);      
        }
    }

    /**
     * @Route("/{id}", name="kristiana.mombamomba")
     *
     * @return void
     */
    public function kristiana(Kristiana $kristiana, Request $request){

        $page = $request->query->get("page");

        $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
        $this->breadcrumbs->addItem("Kristiana");
        if ($page == "tsy-mpandray") {    
            $this->breadcrumbs->addRouteItem("Lisitry ny tsy mpandray","kristiana.tsy-mpandray");
        }else{
            $this->breadcrumbs->addRouteItem("Lisitry ny mpandray","kristiana.mpandray");
        }
        $this->breadcrumbs->addItem("Momba ny kristiana");

        return $this->render('admin/kristiana/mombamomba.html.twig',[
            'title' => 'Momba ny kristiana',
            'kristiana' => $kristiana
        ]);
    }
}