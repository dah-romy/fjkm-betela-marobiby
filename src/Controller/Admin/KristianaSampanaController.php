<?php

namespace App\Controller\Admin;

use App\Entity\Kristiana;
use App\Form\KristianaType;
use App\Entity\SampanaKristiana;
use App\Form\KristianaSampanaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

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
  public function hanampy(Kristiana $kristiana, Request $request, EntityManagerInterface $manager){

    $ss = $request->query->get("sampana");

    if ($ss) {
      $sampana = $manager->getRepository(SampanaKristiana::class)->findOneBy(["id" => $ss]);
      $editMode = true;
    }else{
      $sampana = new SampanaKristiana();
      $editMode = false;
    }

    $form = $this->createForm(KristianaSampanaType::class,$sampana);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $sampana->setKristiana($kristiana);

        $manager->persist($sampana);
        $manager->flush();

        if ($editMode) {
          return new JsonResponse(array('message' => 'Voahitsy soa aman-tsara'), Response::HTTP_OK);
        } else {
          return new JsonResponse(array('message' => 'Tafiditra soa aman-tsara'), Response::HTTP_OK);
        }
        
    }

    return $this->render("admin/kristiana/mombamomba/sampana_action.html.twig", [
      'form' => $form->createView(),
      'editMode' => $editMode,
      'sampana' => $sampana
    ]);
  }

  /**
   * @Route("/sampana/hamafa/{id}", name="kristiana.sampana.hamafa", options={"expose":true})
   *
   * @return void
   */
  public function hamafa(SampanaKristiana $sampana, EntityManagerInterface $manager){
    $manager->remove($sampana);
    $manager->flush();

    return new JsonResponse(['message' => "Voafafa soa aman-tsara"], Response::HTTP_OK);
  }
}