<?php

namespace App\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
        $factory = $this->get('liuggio_stats_d_client.factory');
        $statsdClient = $this->get('liuggio_stats_d_client.service');

        $data = $factory->increment('aplikacja.demo.visit.homepage');
        $statsdClient->send($data);

        return $this->render('AppFrontendBundle:Homepage:index.html.twig');
    }
}
