<?php

namespace App\Controller\Admin;

use App\Entity\Kristiana;
use App\Form\KristianaType;
use App\Entity\SampanaKristiana;
use App\Form\KristianaSampanaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/kristiana")
 */
class KristianaSampanaController extends AbstractController
{

  /**
   * @Route("/sampana/hanampy/{id}", name="kristiana.sampana.hanampy", options={ "expose" : true})
   *
   * @return void
   */
  public function hanampy(Kristiana $kristiana, Request $request){
    $sampana = new SampanaKristiana();

    $form = $this->createForm(KristianaSampanaType::class,$sampana);
    $form->handleRequest($request);

    return $this->render("admin/kristiana/mombamomba/sampana_action.html.twig", [
      'form' => $form->createView()
    ]);
  }
}