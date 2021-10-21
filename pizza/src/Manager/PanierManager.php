<?php

namespace App\Manager;

use App\Entity\Order;
use App\Factory\OrderFactory;
use App\Storage\PanierSessionStorage;
use Doctrine\ORM\EntityManagerInterface;

class PanierManager
    {
        /**
         * @var PanierSessionStorage
         */
        private $panierSessionStorage;
    
        /**
         * @var OrderFactory
         */
        private $panierFactory;
    
        /**
         * @var EntityManagerInterface
         */
        private $entityManager;
    
        /**
         * PanierManager constructor.
         *
         * @param PanierSessionStorage $panierStorage
         * @param OrderFactory $orderFactory
         * @param EntityManagerInterface $entityManager
         */
        public function __construct(
            PanierSessionStorage $panierStorage,
            OrderFactory $orderFactory,
            EntityManagerInterface $entityManager
        ) {
            $this->panierSessionStorage = $panierStorage;
            $this->panierFactory = $orderFactory;
            $this->entityManager = $entityManager;
        }
    
        /**
         * recup le panier
         *
         * @return Order
         */
        public function getCurrentPanier(): Order
        {
            $panier = $this->panierSessionStorage->getPanier();
    
            if (!$panier) {
                $panier = $this->panierFactory->create();
            }
    
            return $panier;
        }

        /**
        * Persists the panier in database and session.
        *
        * @param Order $panier
        */
        public function save(Order $panier): void
        {
            // Persist in database
            $this->entityManager->persist($panier);
            $this->entityManager->flush();
            // Persist in session
            $this->panierSessionStorage->setPanier($panier);
        }
    }
