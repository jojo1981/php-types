<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2020 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes;

use Closure;
use function is_object;

/**
 * @package Jojo1981\PhpTypes
 */
class ObjectType extends AbstractCompoundType
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'object';
    }

    /**
     * @return bool
     */
    public function isObject(): bool
    {
        return true;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue(mixed $value): bool
    {
        if ($value instanceof Closure) {
            return false;
        }

        return is_object($value);
    }
}
