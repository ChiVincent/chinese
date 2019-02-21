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
            Opencc::SIMPLIFIED_TO_TRADITIONAL,
            Opencc::TRADITIONAL_TO_SIMPLIFIED,
            Opencc::SIMPLIFIED_TO_TW_TRADITIONAL,
            Opencc::TW_TRADITIONAL_TO_SIMPLIFIED,
            Opencc::SIMPLIFIED_TO_HK_TRADITIONAL,
            Opencc::HK_TRADITIONAL_TO_SIMPLIFIED,
            Opencc::SIMPLIFIED_TO_TW_IDIOM_TRADITIONAL,
            Opencc::TW_IDIOM_TRADITIONAL_TO_SIMPLIFIED,
            Opencc::OPENCC_TRADITIONAL_TO_TW_TRADITIONAL,
            Opencc::OPENCC_TRADITIONAL_TO_HK_TRADITIONAL,
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
