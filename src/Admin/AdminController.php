<?php


namespace App\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("")
     */
    public function admin(){
        return $this->render('admin/admin.html.twig');
    }
}