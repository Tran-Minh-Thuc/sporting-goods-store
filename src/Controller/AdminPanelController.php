<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Admin panel Controller.
 */
class AdminPanelController extends AbstractController {

  /**
 * Route for admin panel.
 */
  #[Route('/admin-panel', name: 'app_admin_panel')]
    public function index(): Response {
    return $this->render('admin_panel/index.html.twig', [
      'controller_name' => 'AdminPanelController',
    ]);
    }

}
