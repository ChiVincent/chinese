<?php

namespace Chivincent\Chinese;

class Opencc
{
    protected $opencc;

    public function __construct(string $configure = 's2t.json')
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
