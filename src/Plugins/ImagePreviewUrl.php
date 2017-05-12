<?php

namespace JellyBool\Flysystem\Upyun\Plugins;

use League\Flysystem\Plugin\AbstractPlugin;

/**
 * Class ImagePreviewUrl
 * 
 * @package JellyBool\Flysystem\Upyun\Plugins
 */
class ImagePreviewUrl extends AbstractPlugin
{
    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'getUrl';
    }

    public function handle($path = null)
    {
        return $this->filesystem->getAdapter()->getUrl($path);
    }
}