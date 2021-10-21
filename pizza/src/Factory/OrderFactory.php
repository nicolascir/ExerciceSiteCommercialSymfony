<?php


namespace App\Factory;


use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Pizza;

/**
 * Class OrderFactory
 * @package App\Factory
 */
class OrderFactory
{
    /**
     * Creates an order.
     *
     * @return Order
     */
    public function create(): Order
    {
        $order = new Order();
        $order
            ->setStatus(Order::STATUS_PANIER)
            ->setCreateAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

        return $order;
    }

    /**
     * Creates an item for a pizza.
     *
     * @param Pizza $pizza
     *
     * @return OrderItem
     */
    public function createItem(Pizza $pizza): OrderItem
    {
        $item = new OrderItem();
        $item->setPizza($pizza);
        $item->setQuantity(1);

        return $item;
    }
} 
