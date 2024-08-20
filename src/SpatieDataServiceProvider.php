<?php

namespace Anodio\SpatieDataAdapter;

use Anodio\Core\AttributeInterfaces\ServiceProviderInterface;
use Anodio\Core\Attributes\ServiceProvider;
use Spatie\LaravelData\Support\DataContainer;

#[ServiceProvider]
class SpatieDataServiceProvider implements ServiceProviderInterface
{

    public function register(\DI\ContainerBuilder $containerBuilder): void
    {
        $containerBuilder->addDefinitions([
            DataContainer::class
        ]);
    }
}