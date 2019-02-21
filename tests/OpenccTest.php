<?php

namespace Tests;

use Chivincent\Chinese\Opencc;
use PHPUnit\Framework\TestCase;

class OpenccTest extends TestCase
{
    public function testOpencc()
    {
        $opencc = new Opencc();

        $this->assertInstanceOf(Opencc::class, $opencc);
    }

    public function testOpenccWithConfigure()
    {
        $configures = [
            's2t.json', 't2s.json', 's2tw.json', 'tw2s.json', 's2hk.json', 'hk2s.json', 's2twp.json', 'tw2sp.json',
            't2tw.json', 't2hk.json',
        ];

        foreach ($configures as $configure) {
            $opencc = new Opencc($configure);
            $this->assertInstanceOf(Opencc::class, $opencc);
        }
    }

    public function testOpenccWithInvalidConfigure()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Cannot create opencc resource, please check config name is valid.');

        new Opencc('invalid.json');
    }

    public function testConvert()
    {
        $opencc = new Opencc('s2twp.json');

        $this->assertSame('我滑鼠哪兒去了', $opencc->convert('我鼠标哪儿去了'));
    }
}
