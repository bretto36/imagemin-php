<?php
namespace Itgalaxy\Imagemin\Bin;

use Itgalaxy\BinWrapper\BinWrapper;

class OptipngBin extends AbstractBin
{
    protected $url = 'https://raw.githubusercontent.com/imagemin/optipng-bin/v3.1.2/vendor/';

    protected function getBinWrapper()
    {
        $url = $this->url;
        $platform = strtolower(PHP_OS);
        $binWrapper = new BinWrapper();

        return $binWrapper
            ->src($url . 'osx/optipng', 'darwin')
            ->src($url . 'linux/x86/optipng', 'linux', 'x86')
            ->src($url . 'linux/x64/optipng', 'linux', 'x64')
            ->src($url . 'freebsd/x86/optipng', 'freebsd', 'x86')
            ->src($url . 'freebsd/x64/optipng', 'freebsd', 'x64')
            ->src($url . 'sunos/x86/optipng', 'sunos', 'x86')
            ->src($url . 'sunos/x64/optipng', 'sunos', 'x64')
            ->src($url . 'win/optipng.exe', 'win32')
            ->dest($this->binDir . '/' . $this->name)
            ->using(substr($platform, 0, 3) === 'win' ? 'optipng.exe' : 'optipng');
    }
}
