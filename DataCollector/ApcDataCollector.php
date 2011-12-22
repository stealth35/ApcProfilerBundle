<?php

namespace Stealth35\ApcProfilerBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApcDataCollector extends DataCollector
{
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data['version'] = phpversion('apc');
        $this->data['fileinfo'] = apc_cache_info('file');
        $this->data['userinfo'] = apc_cache_info('user');
    }

    public function getVersion()
    {
        return $this->data['version'];
    }

    public function getFileInfo()
    {
        return $this->data['fileinfo'];
    }

    public function getUserInfo()
    {
        return $this->data['userinfo'];
    }

    public function getName()
    {
        return 'apc';
    }
}