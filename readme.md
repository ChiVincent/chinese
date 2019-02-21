# Chinese

## Requirement

- php >= 7.1
- [opencc](https://github.com/BYVoid/opencc)
- [opencc4php](https://github.com/ChiVincent/opencc4php)

## Usage

```php
<?php

use Chivincent\Chinese\Opencc;

$opencc = new Opencc(Opencc::SIMPLIFIED_TO_TW_TRADITIONAL);
$opencc->convert('我鼠标哪儿去了'); // 我滑鼠哪兒去了
```