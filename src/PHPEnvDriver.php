<?php

namespace Envy;

class PHPEnvDriver {

    protected $rootDirecotry;

    public function __construct()
    {
        $this->rootDirectory   = getenv("PHPENV_ROOT");
        $this->versionFilename = '.php-version';
    }

    public function getVersionFilePath($path)
    {
        while($path !== '') {

            if( file_exists("$path/{$this->versionFilename}") ) 
            {
                return "$path/{$this->versionFilename}";
            }

            $pos = strrpos($path, '/');

            if($pos !== false) {
                $path = substr($path, 0, $pos);
            }

        }

        return false;
    }

    public function getVersionForPath($path)
    {
        $versionFile = $this->getVersionFilePath($path);
        
        if($versionFile) {
            return trim(file_get_contents($versionFile));
        }

        return $this->getVersion();
    }

    public function setVersionForPath($path, $version)
    {
        file_put_contents($path, $version);
        return $this->getVersionForPath($path) === $version;
    }

    public function getVersion()
    {
        return trim(file_get_contents("{$this->rootDirectory}/version"));
    }

    public function setVersion($version)
    {
        file_put_contents("{$this->rootDirectory}/version", $version);
        return $this->getVersion() === $version;
    }

    public function getVersions()
    {
        return array_diff(
            scandir("{$this->rootDirectory}/versions"), ['.', '..']
        );
    }

}