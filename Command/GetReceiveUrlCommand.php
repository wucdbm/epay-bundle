<?php

namespace Wucdbm\Bundle\EpayBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class GetReceiveUrlCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
            ->setName('wucdbm_epay:dump_receive_address')
            ->setDescription('Get the current receive address');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $container = $this->getContainer();

        $router = $container->get('router');

        $url = $router->generate('wucdbm_epay_receive');

        $output->writeln(sprintf('<info>%s</info>', $url));
    }

}