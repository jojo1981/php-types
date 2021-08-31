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

use function is_array;

/**
 * @package Jojo1981\PhpTypes
 */
final class ArrayType extends AbstractCompoundType
{
    /** @var TypeInterface|null */
    private ?TypeInterface $valueType;

    /** @var TypeInterface|null */
    private ?TypeInterface $keyType;

    /**
     * @param TypeInterface|null $valueType
     * @param TypeInterface|null $keyType
     */
    public function __construct(?TypeInterface $valueType = null, ?TypeInterface $keyType = null)
    {
        $this->valueType = $valueType;
        $this->keyType = $keyType;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'array';
    }

    /**
     * @return TypeInterface|null
     */
    public function getValueType(): ?TypeInterface
    {
        return $this->valueType;
    }

    /**
     * @return TypeInterface|null
     */
    public function getKeyType(): ?TypeInterface
    {
        return $this->keyType;
    }

    /**
     * @return bool
     */
    public function isPseudoType(): bool
    {
        return null !== $this->valueType || null !== $this->keyType;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue($value): bool
    {
        return is_array($value);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if (null !== $this->valueType && null !== $this->keyType) {
            return $this->getName() . '<' . $this->keyType . ', ' . $this->valueType;
        }
        if (null !== $this->valueType) {
            return $this->valueType->getName() . '[]';
        }

        return $this->getName();
    }
}
