<?php

namespace App\Service;

class Contrat
{
    static public function get($contrat)
    {
        $html = '<style>
                page {font-family: Times, serif;}
                ul li {display: block; float: left; height: 27px; list-style: none; margin-right: 20px;}
                h2 {text-align: center;}
                h5 {font-size: 16px; margin-top: 35px;}
                h2, h5 {text-transform: uppercase; color: #62B4F5;}
                div.content {font-size: 14px; text-align: justify;line-height: 1.6; margin-top: 20px;}
                div.date {text-align: right;margin-top: 20px;}
                div.footer {text-align: right;font-size: 10px; margin-right: 80px;}
                div.signature {margin-top: 50px;}
                div.locataire, div.loueur {text-align: center;width: 50%; display: inline; border: 1px; padding: 10px;line-height: 1; position: relative;}
                a {color: #62B4F5;}
                </style>';
        $html .= self::getPage();
        return $html;
    }

    static public function getPage()
    {
        $html = '<page backtop="7mm" backbottom="7mm" backleft="20mm" backright="20mm">';
        $html .= self::header();
        $html .= self::footer();
        $html .= self::title();
        $html .= self::contentPage1();
        $html .= self::contentPage2();
        $html .= self::contentDate();
        $html .= self::contentSignature();
        $html .= '</page>';
        return $html;
    }

    static public function header() 
    {
        return '<page_header>&nbsp;</page_header>';
    }
    
    static public function footer() 
    {
        return '<page_footer><div class="footer"><b>CONTRAT DE LOCATION – CTP</b> – LOCATAIRE</div></page_footer>';
    }
    
    static function title() 
    {
        return '<h2>Contrat de location</h2>';
    }
    
    static public function contentPage1()
    {
        $content = '
            <div class="content">
                <p>ENTRE,</p> 
                <p>Le Cabinet Topographie Prestige (<b>CTP</b>), siège social : hersent derrière la station SGF, villa N°542, Thiès; 
                email : <a href="mailto:contact@topographie–prestige.com">contact@topographie–prestige.com</a>; Tel : 77 335 02 02 – BP 553 RP Thies; ci-après dénommée sous le vocable de : 
                Loueur</p>
                <p>Et</p> 
                <p>
                L’entreprise ……………………………………………………………………………….., siège social : ……………………………………., ville …………………… ; email : …………………………………………. ; Tel : …………………………. – BP ……………; ci-après dénommée sous le vocable de : 
                Locataire</p>

                <p>IL A ETE CONVENU CE QUI SUIT :</p>
                
                <h5>1 - Nature et date d\'effet du contrat</h5>
                Le loueur met à disposition du locataire, un ……………………. de marque ……………., modèle ………………, à titre onéreux et à compter du ………………………..
                
                <h5>2 - Etat de l\'appaeil</h5>
                Lors de la remise de l’appareil et lors de sa restitution, un procès-verbal de l\'état sera établi entre le locataire et le loueur. 
                L’appareil devra être restitué le même état que lors de sa remise. Toutes les détériorations sur l’appareil constatées sur le PV de sortie seront à la charge du locataire. 
                
                <h5>3 - Prix de la location de l\'appareil</h5>
                Les parties s\'entendent sur un prix de location de …………….. (……………..) frs CFA par jour (calendaires). Ce prix comprend un forfait de l’utilisation de l’appareil et de la rémunération de l’operateur topographe.   
                Le locataire prendra en charge l\'ensemble des charges afférentes à l\'exécution des travaux sur le terrain :    
                <ul>
                    <li>Frais de transport,</li>
                    <li>Restauration,</li>
                    <li>Logement en dehors de la région de Thiès et Dakar.</li>
                </ul>
            </div>';
        
        return $content;
    }

    static public function contentPage2()
    {
        $content = '
            <div class="content">                
                <h5>4 - Durée et restitution de l\'appareil</h5>
                Le contrat est pour une durée de ……….… (………….) et la restitution de l’appareil devra se faire au plus tard 24 h de la fin du présent contrat.
                
                <h5>5 - Clause en cas de litige</h5> 
                Tout différend relatif à l’interprétation et à l’application du présent contrat devra être résolu à l’amiable.
                <p>Au cas où tel règlement ne pourrait être obtenu à propos du différend, compétence est donnée aux juridictions compétentes.</p>
                <p>Fait en deux exemplaires originaux remis à chacune des parties, </p>
            </div>';

        return $content;
    }

    static public function contentDate()
    {
        $content = '
            <div class="content date">                
                A Dakar, le 30 – 08 – 2018
            </div>';

        return $content;
    }

    static public function contentSignature()
    {
        $content = '
            <div class="content signature">                
                <div class="locataire">Le <b>loueur</b><br/>signature précédée de la mention manuscrite bon pour accord</div>
                <div class="loueur">Le <b>locataire</b><br/>signature précédée de la mention manuscrite bon pour accord</div>
            </div>';

        return $content;
    }
}