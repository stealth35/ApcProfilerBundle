# ApcProfilerBundle

## Installation and configuration:

    [ApcProfilerBundle]
        git=http://github.com/stealth35/ApcProfilerBundle.git
        target=bundles/Stealth35/ApcProfilerBundle

Install via Symfony2:

    php bin/vendors install

### Add the namespaces to your autoloader

``` php
<?php
// File: app/autoload.php
$loader->registerNamespaces(array(
    'Stealth35'         => __DIR__.'/../vendor/bundles',
    // ...
));
```

### Add ApcProfilerBundle to your application kernel

``` php
<?php
    // File: app/AppKernel.php
    public function registerBundles()
    {
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            // ...
            $bundles[] = new Stealth35\ApcProfilerBundle\ApcProfilerBundle(),
            // ...
        }
    }
```