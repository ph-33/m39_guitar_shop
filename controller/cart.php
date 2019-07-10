<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller;

use Model\ProductDB;

class Cart
{
    public static function add($product_id, $quantity)
    {
        if ($quantity <= 0) {
            display_error('Quantity one or more than one');
        }
        $_SESSION['cart'][$product_id] = $quantity;
    }

    public static function update($product_id, $quantity)
    {
        if ($quantity == 0) {
            self::remove($product_id);
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }

    public static function remove($product_id)
    {
        unset($_SESSION['cart'][$product_id]);
    }

    public static function destroy()
    {
        unset($_SESSION['cart']);
    }

    public static function get($product_id)
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $product = array();
        if (isset($cart[$product_id])) {
            $product = ProductDB::get_product($product_id);
        }
        return $product;
    }

    public static function content()
    {
        $products = array();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach ($cart as $product_id => $quantity) {
            $product = ProductDB::get_product($product_id);
            $products[$product_id]['productID'] = $product['productID'];
            $products[$product_id]['productName'] = $product['productName'];
            $products[$product_id]['description'] = $product['description'];
            $products[$product_id]['listPrice'] = $product['listPrice'];
            $products[$product_id]['discountPercent'] = $product['discountPercent'];
            $products[$product_id]['productCode'] = $product['productCode'];
        }
        return $products;
    }

    public static function total()
    {
        $total = 0;
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach ($cart as $product_id => $quantity) {
            $product = ProductDB::get_product($product_id);
            $discount_amount = round($product['listPrice'] * ($product['discountPercent'] / 100), 2);
            $unit_price = $product['listPrice'] - $discount_amount;
            $total += $quantity * $unit_price;
        }
        return $total;
    }

    public static function count()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        return count($cart);
    }
}
