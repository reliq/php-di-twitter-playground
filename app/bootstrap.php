<?php
/**
 * The bootstrap file creates and returns the container.
 */

use Atymic\Twitter\ServiceProvider\PhpDiServiceProvider;

require __DIR__ . '/../vendor/autoload.php';

$twitterServiceProvider = new PhpDiServiceProvider();
$twitterServiceProvider->initContainer(__DIR__ . '/config.php');

return $twitterServiceProvider->getContainer();

/*  --------    OR
$containerBuilder = new ContainerBuilder;
$twitterServiceProvider = new PhpDiServiceProvider();
$twitterServiceProvider->initContainer();
$containerBuilder->addDefinitions(__DIR__ . '/config.php', $twitterServiceProvider->getDefinitions());
$container = $containerBuilder->build();

return $container;
*/
