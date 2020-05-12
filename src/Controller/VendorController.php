<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VendorController extends AbstractController
{
    /**
     * @Route({
     *      "fr": "/espace-revendeur",
     *      "en": "/en/vendor-area"
     * }, name="vendor_dashboard")
     */
    public function index()
    {
        return $this->render('vendor/index.html.twig', [
            'controller_name' => 'VendorController',
        ]);
    }
}
