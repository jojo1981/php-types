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

/**
 * @package Jojo1981\PhpTypes
 */
final class MixedType extends AbstractPseudoType
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'mixed';
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool
    {
        return !($type instanceof VoidType);
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue($value): bool
    {
        return true;
    }
}
