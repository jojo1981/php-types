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
     * @return bool
     */
    public function isBoolean(): bool;

    /**
     * @return bool
     */
    public function isString(): bool;

    /**
     * @return bool
     */
    public function isObject(): bool;

    /**
     * @return bool
     */
    public function isClass(): bool;

    /**
     * @return bool
     */
    public function isInteger(): bool;

    /**
     * @return bool
     */
    public function isFloat(): bool;

    /**
     * @return bool
     */
    public function isArray(): bool;

    /**
     * @return bool
     */
    public function isIterable(): bool;

    /**
     * @return bool
     */
    public function isCallable(): bool;

    /**
     * @return bool
     */
    public function isResource(): bool;

    /**
     * @return bool
     */
    public function isNull(): bool;

    /**
     * @return bool
     */
    public function isVoid(): bool;

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool;

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue(mixed $value): bool;

    /**
     * @return bool
     */
    public function isPseudoType(): bool;

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isEqual(TypeInterface $type): bool;

    /**
     * @return string
     */
    public function __toString(): string;
}
