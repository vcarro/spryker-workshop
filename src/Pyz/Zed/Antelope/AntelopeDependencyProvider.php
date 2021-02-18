<?php

class AntelopeDependencyProvider extends \Spryker\Zed\Kernel\AbstractBundleDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(\Spryker\Zed\Kernel\Container $container)
    {
        return parent::provideCommunicationLayerDependencies($container);
    }
}
