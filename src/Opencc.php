<?php

namespace Chivincent\Chinese;

class Opencc
{
    const SIMPLIFIED_TO_TRADITIONAL = 's2t.json';
    const TRADITIONAL_TO_SIMPLIFIED = 't2s.json';
    const SIMPLIFIED_TO_TW_TRADITIONAL = 's2tw.json';
    const TW_TRADITIONAL_TO_SIMPLIFIED = 'tw2s.json';
    const SIMPLIFIED_TO_HK_TRADITIONAL = 's2hk.json';
    const HK_TRADITIONAL_TO_SIMPLIFIED = 'hk2s.json';
    const SIMPLIFIED_TO_TW_IDIOM_TRADITIONAL = 's2twp.json';
    const TW_IDIOM_TRADITIONAL_TO_SIMPLIFIED = 'tw2sp.json';
    const OPENCC_TRADITIONAL_TO_TW_TRADITIONAL = 't2tw.json';
    const OPENCC_TRADITIONAL_TO_HK_TRADITIONAL = 't2hk.json';

    protected $opencc;

    public function __construct(string $configure = self::SIMPLIFIED_TO_TRADITIONAL)
    {
        $this->opencc = opencc_open($configure);

        if (!$this->opencc) {
            throw new \Exception('Cannot create opencc resource, please check config name is valid.');
        }
    }

    public function convert(string $input): string
    {
        return opencc_convert($input, $this->opencc);
    }

    public function error(): ?string
    {
        return ($error = opencc_error()) ? $error : null;
    }

    public function __destruct()
    {
        opencc_close($this->opencc);
    }
}
