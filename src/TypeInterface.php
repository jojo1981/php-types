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
interface TypeInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function isScalar(): bool;

    /**
     * @return bool
     */
    public function isCompound(): bool;

    /**
     * @return bool
     */
    public function isNumber(): bool;

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool;

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue($value): bool;

    /**
     * @return bool
     */
    public function isPseudoType(): bool;

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isEqual(TypeInterface $type): bool;
}