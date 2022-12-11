<?php

namespace Kamran\Phptest\Service;

class ValidationService
{
    public function validateGender(string $gender): bool
    {
        return in_array($gender, ['male', 'female', '']);
    }

    public function validateStatus(string $status): bool
    {
        return in_array($status, ['active', 'inactive', '']);
    }
}