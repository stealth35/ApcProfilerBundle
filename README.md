# ApcProfilerBundle

### Add the package to your dependencies

``` json
{
    "require": {
        "stealth35/apc-profiler-bundle": "dev-master"
        ...
    }
}
```


### Update the vendors

    php composer.phar update


### Add ApcProfilerBundle to your application kernel

``` php
<?php
    // File: app/AppKernel.php
    public function registerBundles()
    {
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            // ...
            $bundles[] = new Stealth35\ApcProfilerBundle\ApcProfilerBundle();
            // ...
        }
    }
```