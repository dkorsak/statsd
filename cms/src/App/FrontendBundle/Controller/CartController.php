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

class CartController extends Controller {


    protected $products = array();


    public function __construct() {
        parent::__construct();

        // key is a product ID

        $this->products[0] = array('name' => 'ITEM1', 22.12);
        $this->products[1] = array('name' => 'ITEM2', 10.05);
        $this->products[2] = array('name' => 'ITEM3', 50.02);
        $this->products[3] = array('name' => 'ITEM4', 102.12);
        $this->products[5] = array('name' => 'ITEM4', 122.12);
    }

    public function putAction($productID) {

//        if() {

        }

    }


    public function removeAction() {

    }


}