<?php
namespace Mage2\Framework\Foundation;

use Illuminate\Foundation\Application as LaravelApplication;

class Application  extends LaravelApplication{

    /**
     * Get the path to the bootstrap directory.
     *
     * @return string
     */
    public function baseModulePath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'modules';
    }


    /**
     * Get the path to the resources directory.
     *
     * @param  string  $path
     * @return string
     */
    public function resourcePath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'themes' . DIRECTORY_SEPARATOR . "mage2" . DIRECTORY_SEPARATOR . "default";
    }



    /**
     * Bind all of the application paths in the container.
     *
     * @return void
     */
    protected function bindPathsInContainer()
    {
        $this->instance('path', $this->path());
        $this->instance('path.module', $this->baseModulePath());
        $this->instance('path.base', $this->basePath());
        $this->instance('path.lang', $this->langPath());
        $this->instance('path.config', $this->configPath());
        $this->instance('path.public', $this->publicPath());
        $this->instance('path.storage', $this->storagePath());
        $this->instance('path.database', $this->databasePath());
        $this->instance('path.resources', $this->resourcePath());
        $this->instance('path.bootstrap', $this->bootstrapPath());
    }
}