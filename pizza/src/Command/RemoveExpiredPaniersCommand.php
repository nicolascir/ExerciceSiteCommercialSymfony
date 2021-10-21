<?php

namespace App\Command;

use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RemoveExpiredPaniersCommand extends Command
{
    /**
     * @var EntityManagerInterface 
     */
    private $entityManager;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    protected static $defaultName = 'app:remove-expired-paniers';

    /**
     * RemoveExpiredPaniersCommand constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param OrderRepository $orderRepository
     */
    public function __construct(EntityManagerInterface $entityManager, OrderRepository $orderRepository)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->orderRepository = $orderRepository;
    }

    protected function configure()
    {
        $this
            ->setDescription('Removes paniers that have been inactive for a defined period')
            ->addArgument(
                'days',
                InputArgument::OPTIONAL,
                'The number of days a panier can remain inactive',
                2
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $days = $input->getArgument('days');

        if ($days <= 0) {
            $io->error('The number of days should be greater than 0.');
            return Command::FAILURE;
        }

        // Subtracts the number of days from the current date.
        $limitDate = new \DateTime("- $days days");
        $expiredPaniersCount = 0;

        while($paniers = $this->orderRepository->findPaniersNotModifiedSince($limitDate)) {
            foreach ($paniers as $panier) {
                // Items will be deleted on cascade
                $this->entityManager->remove($panier);
            }

            $this->entityManager->flush(); // Executes all deletions
            $this->entityManager->clear(); // Detaches all object from Doctrine

            $expiredpaniersCount += count($paniers);
        };

        if ($expiredPaniersCount) {
            $io->success("$expiredPaniersCount panier(s) have been deleted.");
        } else {
            $io->info('No expired paniers.');
        }

        return Command::SUCCESS;
    }
}
