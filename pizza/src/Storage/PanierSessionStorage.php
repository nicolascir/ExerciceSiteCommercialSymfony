<?php


namespace App\Storage;


use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierSessionStorage
{
        /**
     * The request stack.
     *
     * @var RequestStack
     */
    private $requestStack;

    /**
     * The panier repository.
     *
     * @var OrderRepository
     */
    private $panierRepository;

    /**
     * @var string
     */
    const PANIER_KEY_NAME = 'panier_id';

    /**
     * PanierSessionStorage constructor.
     *
     * @param RequestStack $requestStack
     * @param OrderRepository $panierRepository
     */
    public function __construct(RequestStack $requestStack, OrderRepository $panierRepository) 
    {
        $this->requestStack = $requestStack;
        $this->panierRepository = $panierRepository;
    }

    /**
     * Gets the panier in session.
     *
     * @return Order|null
     */
    public function getPanier(): ?Order
    {
        return $this->panierRepository->findOneBy([
            'id' => $this->getPanierId(),
            'status' => Order::STATUS_PANIER
        ]);
    }

    /**
     * Sets the panier in session.
     *
     * @param Order $panier
     */
    public function setPanier(Order $panier): void
    {
        $this->getSession()->set(self::PANIER_KEY_NAME, $panier->getId());
    }

    /**
     * Returns the panier id.
     *
     * @return int|null
     */
    private function getPanierId(): ?int
    {
        return $this->getSession()->get(self::PANIER_KEY_NAME);
    }

        private function getSession(): SessionInterface
        {
            return $this->requestStack->getSession();
    }
}
