<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;
use App\Service\Contrat;

class PdfController extends AbstractController
{
    /**
     * @Route("/pdf", name="pdf")
     */
    public function index(Contrat $contrat)
    {
        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML($contrat::get(null));
        $html2pdf->output();
        return $this->render('pdf/index.html.twig', [
            'controller_name' => 'PdfController',
        ]);
    }
}
