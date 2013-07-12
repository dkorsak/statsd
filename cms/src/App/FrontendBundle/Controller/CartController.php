<?php
/**
 * Created by JetBrains PhpStorm.
 * User: biera
 * Date: 7/12/13
 * Time: 12:47 PM
 * To change this template use File | Settings | File Templates.
 */

namespace App\FrontendBundle\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller {

    // puts one product to cart with $productID
    public function putAction() 
    {
        $factory = $this->get('liuggio_stats_d_client.factory');
        $statsdClient = $this->get('liuggio_stats_d_client.service');

        $data = $factory->increment('aplikacja.demo.cart.put');
        $statsdClient->send($data);

        return new RedirectResponse($this->generateUrl('homepage'));
    }

    // removes all products from cart with $productID
    public function removeAction() 
    {
        $factory = $this->get('liuggio_stats_d_client.factory');
        $statsdClient = $this->get('liuggio_stats_d_client.service');

        $data = $factory->increment('aplikacja.demo.cart.remove');
        $statsdClient->send($data);

        return new RedirectResponse($this->generateUrl('homepage'));
    }

    //remove all products
    public function clearAction() 
    {
        $factory = $this->get('liuggio_stats_d_client.factory');
        $statsdClient = $this->get('liuggio_stats_d_client.service');

        $data = $factory->increment('aplikacja.demo.cart.clear');
        $statsdClient->send($data);

        return new RedirectResponse($this->generateUrl('homepage'));
    }


}