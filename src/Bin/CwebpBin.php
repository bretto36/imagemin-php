<?php
namespace Itgalaxy\Imagemin\Bin;

use Itgalaxy\BinWrapper\BinWrapper;

class CwebpBin extends AbstractBin
{
    protected $url = 'https://raw.githubusercontent.com/imagemin/cwebp-bin/v3.2.0/vendor/';

    protected function getBinWrapper()
    {
        $url = $this->url;
        $platform = strtolower(PHP_OS);
        $binWrapper = new BinWrapper();

        return $binWrapper
            ->src($url . 'osx/cwebp', 'darwin')
            ->src($url . 'linux/x86/cwebp', 'linux', 'x86')
            ->src($url . 'linux/x64/cwebp', 'linux', 'x64')
            ->src($url . 'win/x86/cwebp.exe', 'win32', 'x86')
            ->src($url . 'win/x64/cwebp.exe', 'win32', 'x64')
            ->dest($this->binDir . '/' . $this->name)
            ->using(substr($platform, 0, 3) === 'win' ? 'cwebp.exe' : 'cwebp');
    }

    public function install($args = [])
    {
        parent::install(!empty($args) ? $args : ['-version']);
    }
}