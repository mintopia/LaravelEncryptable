<?php

namespace Cheezykins\LaravelEncryptable\Test\Mocks;

use Cheezykins\LaravelEncryptable\Traits\Encryptable;

class EncryptableModel extends MockModel
{
    use Encryptable;

    protected $encrypted = [
        'securedata',
    ];
}
