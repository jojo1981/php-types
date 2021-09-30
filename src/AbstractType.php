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

use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\Parser\Parser;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use RuntimeException;
use function get_class;
use function gettype;
use function is_a;
use function is_callable;
use function is_iterable;
use function is_object;

/**
 * Abstract factory pattern implemented here.
 *
 * @package Jojo1981\PhpTypes
 */
abstract class AbstractType implements TypeInterface
{
    /**
     * @return bool
     */
    public function isScalar(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isCompound(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isNumber(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isPseudoType(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isBoolean(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isString(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isObject(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isClass(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isInteger(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isFloat(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isArray(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isIterable(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isCallable(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isResource(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isVoid(): bool
    {
        return false;
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isEqual(TypeInterface $type): bool
    {
        return get_class($this) === get_class($type);
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool
    {
        return is_a($type, get_class($this));
    }

    /**
     * @param string $typeName
     * @return TypeInterface
     * @throws RecognitionException
     * @throws RuntimeException
     */
    final public static function createFromTypeName(string $typeName): TypeInterface
    {
        return (new Parser())->parse($typeName);
    }

    /**
     * @param mixed $value
     * @return TypeInterface
     * @throws TypeException
     * @throws ValueException
     * @throws RuntimeException
     */
    final public static function createFromValue($value): TypeInterface
    {
        if (is_object($value)) {
            if (is_iterable($value)) {
                return self::createFromTypeName('iterable');
            }
            if (is_callable($value)) {
                return self::createFromTypeName('callable');
            }

            return new ClassType(new ClassName(get_class($value)));
        }

        return self::createFromTypeName(gettype($value));
    }

    /**
     * @param TypeInterface[] $types
     * @throws TypeException
     * @return MultiType
     */
    final public static function createFromTypes(array $types): MultiType
    {
        return new MultiType($types);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
