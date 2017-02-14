<?php

namespace LotteryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Default action
     */
    public function indexAction()
    {
        return $this->render('LotteryBundle:Default:index.html.twig');
    }
}
