<?php

namespace LotteryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LotteryBundle:Default:index.html.twig');
    }
}
