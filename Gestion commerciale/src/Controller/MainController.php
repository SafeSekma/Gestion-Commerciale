<?php

namespace App\Controller;
use src\Controller\ClientController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MainController extends AbstractController
{
    /**
     * @Route("\xx", name="main")
     */
    public function index()
    {
    return $this->redirectToRoute('client');
}
}
