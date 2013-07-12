<?php
/**
 * Created by JetBrains PhpStorm.
 * User: biera
 * Date: 7/12/13
 * Time: 12:47 PM
 * To change this template use File | Settings | File Templates.
 */

namespace App\FrontendBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller {

    protected $products = array();

    public function __construct() {
        // load some products
        // key is a product ID
        $this->products[0] = array('name' => 'ITEM1', 'price' => 22.12);
        $this->products[1] = array('name' => 'ITEM2', 'price' => 10.05);
        $this->products[2] = array('name' => 'ITEM3', 'price' => 50.02);
        $this->products[3] = array('name' => 'ITEM4', 'price' => 102.12);
        $this->products[5] = array('name' => 'ITEM4', 'price' => 2.12);
    }


    // puts one product to cart with $productID
    public function putAction($productID) {
        $data = $this->get('liuggio_stats_d_client.factory')->produceStatsdData('cart.put');
        $this->get('liuggio_stats_d_client.service')->send($data);

        return new Response(json_encode(array('id' => $productID, $this->products[$productID]['name'], 'price' => $this->products[$productID]['price'])));
    }

    // removes all products from cart with $productID
    public function removeAction($productID) {
        $data = $this->get('liuggio_stats_d_client.factory')->produceStatsdData('cart.remove');
        $this->get('liuggio_stats_d_client.service')->send($data);

        return new Response(json_encode(array($productID)));
    }

    //remove all products
    public function clearAction() {
        return new Response(json_encode(array(true)));
    }


}