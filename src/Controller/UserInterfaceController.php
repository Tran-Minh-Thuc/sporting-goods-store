<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * User interface Controlle.
 */
class UserInterfaceController extends AbstractController {

  /**
 * Route for User Interface.
 */
  #[Route('/', name: 'app_user_interface')]
    public function index(): Response {
    return $this->render('user_interface/index.html.twig', [
      'controller_name' => 'UserInterfaceController',
    ]);
    }

}
