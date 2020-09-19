<?php

namespace App\Controller\Admin;

use App\Utils\Utils;
use App\Entity\Sampana;
use App\Form\SampanaType;
use App\Repository\SampanaRepository;
use App\Repository\ToeranaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/fikambanana")
 */
class FikambananaController extends AbstractController
{

  protected $breadcrumbs;

  public function __construct(Utils $utils)
  {
    $this->breadcrumbs = $utils->breadcrumbs;
  }

  /**
   * @Route("/lisitra", name="fikambanana.lisitra.index")
   *
   * @return void
   */
  public function fikambanana(){

    $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
    $this->breadcrumbs->addItem("Fikambanana");
    $this->breadcrumbs->addItem("Lisitra");

    return $this->render('admin/fikambanana/lisitra.html.twig', [
      "title" => "Lisitry ny sampana"
    ]);
  }

  /**
  * @Route("/lisitra-fikambanana", name="fikambanana.lisitra", options={"expose":true})
  */
  public function lisitra(SampanaRepository $repo, Request $request){
    $sampanas = $repo->findBy(["sokajy" => "fikambanana"]);
    $data['data'] = [];

    foreach ($sampanas as $key => $sampana) {

        $action = $this->renderView('admin/fikambanana/common/button.html.twig', [
            'fikambanana' => $sampana
        ]);

        $data['data'][] = [
            'id' => $key + 1,
            'anarana' => $sampana->getAnarana(),
            'fanafohizana' => $sampana->getFanafohizana(),
            'action' => $action
        ];
    }

    return new JsonResponse($data, Response::HTTP_OK);
  }

  /**
 * @Route("/vaovao", name="fikambanana.vaovao")
 * @Route("/hanavao/{id}", name="fikambanana.hanavao")
 *
 * @return void
 */
  public function action(Sampana $sampana = null, Request $request, EntityManagerInterface $manager, ToeranaRepository $repo){
    
    if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
        return $this->redirectToRoute('app.login');
    }

    $this->breadcrumbs->prependRouteItem("Fandraisana", "admin.index");
    $this->breadcrumbs->addRouteItem("Fikambanana","fikambanana.lisitra");
    $this->breadcrumbs->addItem("Fikambanana vaovao");

    $editMode = true;

    if (!$sampana) {
        $editMode = false;
        $sampana = new Sampana();
    }

    $form = $this->createForm(SampanaType::class,$sampana);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){

        if (!$editMode) {
          $toeranas = $repo->findAll();

          foreach ($toeranas as $key => $toerana) {
            $sampana->addToerana($toerana);
          }
        }

        $sampana->setSokajy("fikambanana");

        $manager->persist($sampana);
        $manager->flush();


        if ($editMode) {
            $this->addFlash("success","Fikambanana voahitsy soa aman-tsara!");
        }else{
            $this->addFlash("success","Fikambanana tafiditra soa aman-tsara!");
        }

        return $this->redirectToRoute("fikambanana.lisitra.index");
    }

    return $this->render("admin/fikambanana/_action.html.twig", [
        'title' => "Hanampy fikambanana",
        "form" => $form->createView(),
        'editMode' => $editMode,
        'sampana' => $sampana
    ]);
  }

  /**
  * @Route("/fafaina/{id}", name="fikambanana.fafaina", options={"expose" = true})
  */
  public function delete(Sampana $sampana, EntityManagerInterface $manager){
    if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
        return $this->redirectToRoute('app.login');
    }else{

        $manager->remove($sampana);
        $manager->flush();

        return new JsonResponse(array('message' => 'success'), Response::HTTP_OK);      
    }
  }
}