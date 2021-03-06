<?php
namespace Itgalaxy\Imagemin\Bin;

use Itgalaxy\BinWrapper\BinWrapper;

class PngoutBin extends AbstractBin
{
    protected $url = 'https://raw.github.com/itgalaxy/imagemin-php/master/bin/pngout/';

    protected function getBinWrapper()
    {
        $url = $this->url;
        $platform = strtolower(PHP_OS);
        $binWrapper = new BinWrapper();

        return $binWrapper
            ->src($url . 'macos/pngout', 'darwin')
            ->src($url . 'linux/x86/pngout', 'linux', 'x86')
            ->src($url . 'linux/x64/pngout', 'linux', 'x64')
            ->src($url . 'freebsd/x86/pngout', 'freebsd', 'x86')
            ->src($url . 'freebsd/x64/pngout', 'freebsd', 'x64')
            ->src($url . 'win32/pngout.exe', 'windows')
            ->dest($this->binDir . '/' . $this->name)
            ->using(substr($platform, 0, 3) == 'win' ? 'pngout.exe' : 'pngout');
    }

    public function install($args = [])
    {
        $fixtureTest = __DIR__ . '/pretest-fixtures/' . $this->name . '/test.png';
        $fixtureOptimizedTest = __DIR__ . '/pretest-fixtures/' . $this->name . '/test-optimized.png';

        parent::install(!empty($args) ? $args : [$fixtureTest, $fixtureOptimizedTest, '-s4', '-c6', '-y']);
    }
}
