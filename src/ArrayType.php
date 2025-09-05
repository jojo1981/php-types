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

use Jojo1981\PhpTypes\Exception\TypeException;
use function is_array;

/**
 * @package Jojo1981\PhpTypes
 */
class ArrayType extends AbstractCompoundType
{
    /** @var TypeInterface|null */
    private ?TypeInterface $valueType;

    /** @var TypeInterface|null */
    private ?TypeInterface $keyType;

    /**
     * @param TypeInterface|null $valueType
     * @param TypeInterface|null $keyType
     * @throws TypeException
     */
    public function __construct(?TypeInterface $valueType = null, ?TypeInterface $keyType = null)
    {
        $this->valueType = $this->assertValueType($valueType);
        $this->keyType = $this->assertKeyType($keyType);
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
    public function isArray(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isIterable(): bool
    {
        return true;
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
    public function isAssignableValue(mixed $value): bool
    {
        return is_array($value);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if (null !== $this->valueType && null !== $this->keyType && !$this->keyType->isInteger()) {
            return $this->getName() . '<' . $this->keyType . ',' . $this->valueType . '>';
        }
        if (null !== $this->valueType) {
            return $this->valueType->getName() . '[]';
        }

        return $this->getName();
    }

    /**
     * @param TypeInterface|null $keyType
     * @return TypeInterface|null
     * @throws TypeException
     */
    private function assertKeyType(?TypeInterface $keyType): ?TypeInterface
    {
        if (null !== $keyType && $keyType->isVoid()) {
            throw new TypeException('Array key type can not be of type void');
        }

        return $keyType;
    }

    /**
     * @param TypeInterface|null $valueType
     * @return TypeInterface|null
     * @throws TypeException
     */
    private function assertValueType(?TypeInterface $valueType): ?TypeInterface
    {
        if (null !== $valueType && $valueType->isVoid()) {
            throw new TypeException('Array value type can not be of type void');
        }

        return $valueType;
    }
}
