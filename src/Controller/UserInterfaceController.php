<?php

namespace App\Controller;

use App\Entity\Permissions;
use App\Entity\Roles;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * User interface Controlle.
 */
class UserInterfaceController extends AbstractController {
  private $em;

  public function __construct(EntityManagerInterface $em){
    $this->em = $em;
  }
  /**
 * Route for User Interface.
 */


  #[Route('/', name: 'app_user_interface')]
    public function index(): Response {
    return $this->render('user_interface/index.html.twig', [
      'controller_name' => 'UserInterfaceController',
    ]);
    }
  #[Route('/test', name: 'test')]
  public function test() {
    $permission = $this->em->getRepository(Permissions::class)->findAll();
    return new Response(sprintf('id new permission is %d', $permission->getId()));
    }
}
