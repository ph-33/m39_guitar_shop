<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller;

class Cart
{
    public function index()
    {
        include 'view/cart.php';
    }

    public function add()
    {
        $product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        \Cart::add($product_id, $quantity);
        redirect('index.php?action=cart');
    }

    public function update()
    {
        // $items = $_POST['items'];
        // https://php.net/manual/en/filter.filters.flags.php
        $items = filter_input(INPUT_POST, 'items', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach ($items as $product_id => $quantity) {
            \Cart::update($product_id, $quantity);
        }
        redirect('index.php?action=cart');
    }

    public function remove()
    {
        $product_id = filter_input(INPUT_POST, 'product_id');
        \Cart::remove($product_id);
        redirect('index.php?action=cart');
    }

    public function destroy()
    {
        \Cart::destroy();
        redirect('index.php?action=cart');
    }
}
