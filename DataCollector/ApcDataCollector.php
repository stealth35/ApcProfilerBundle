<?php

namespace Stealth35\ApcProfilerBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApcDataCollector extends DataCollector
{
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $reflector = new \ReflectionExtension('apc');

        $fileinfo = apc_cache_info();
        $userinfo = apc_cache_info('user');

        $filelist = array_merge($fileinfo['cache_list'], $fileinfo['deleted_list']);
        $userlist = array_merge($userinfo['cache_list'], $userinfo['deleted_list']);

        $this->data = array(
            'version'  => phpversion('apc'),
            'ini'      => $reflector->getINIEntries(),
            'smainfo'  => apc_sma_info(),
            'fileinfo' => $fileinfo,
            'userinfo' => $userinfo,
            'filelist' => $filelist,
            'userlist' => $userlist,
            'filehitslist' => apc_cache_info('filehits')
        );
    }

    public function getVersion()
    {
        return $this->data['version'];
    }

    public function getIni()
    {
        return $this->data['ini'];
    }

    public function getSmaInfo()
    {
        return $this->data['smainfo'];
    }

    public function getFileInfo()
    {
        return $this->data['fileinfo'];
    }

    public function getUserInfo()
    {
        return $this->data['userinfo'];
    }

    public function getFileList()
    {
        return $this->data['filelist'];
    }

    public function getUserList()
    {
        return $this->data['userlist'];
    }

    public function getFileHitsList()
    {
        return $this->data['filehitslist'];
    }

    public function getName()
    {
        return 'apc';
    }
}
