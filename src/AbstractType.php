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
use Jojo1981\PhpTypes\Value\ClassName;

/**
 * Abstract factory pattern implemented here.
 *
 * @package Jojo1981\PhpTypes
 */
abstract class AbstractType implements TypeInterface
{
    /** @var string[] */
    private const VALID_TYPE_NAMES = [
        'bool',
        'boolean',
        'int',
        'integer',
        'number',
        'real',
        'double',
        'float',
        'string',
        'text',
        'array',
        'object',
        'callable',
        'callback',
        'iterable',
        'resource',
        'null',
        'void',
        'mixed'
    ];

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
     * @param TypeInterface $type
     * @return bool
     */
    public function isEqual(TypeInterface $type): bool
    {
        return \get_class($this) === \get_class($type);
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool
    {
        return \is_a($type, \get_class($this));
    }

    /**
     * @param string $typeName
     * @throws TypeException
     * @return TypeInterface
     */
    final public static function createFromTypeName(string $typeName): TypeInterface
    {
        switch (\strtolower($typeName)) {
            case 'bool':
            case 'boolean':
                return new BooleanType();
            case 'int':
            case 'integer':
                return new IntegerType();
            case 'number':
            case 'real':
            case 'double':
            case 'float':
                return new FloatType();
            case 'string':
            case 'text':
                return new StringType();
            case 'array':
                return new ArrayType();
            case 'object':
                return new ObjectType();
            case 'callable':
            case 'callback':
                return new CallableType();
            case 'iterable':
                return new IterableType();
            case 'resource':
                return new ResourceType();
            case 'null':
                return new NullType();
            case 'void':
                return new VoidType();
            case 'mixed':
                return new MixedType();
        }

        if (\class_exists($typeName) || \interface_exists($typeName)) {
            return new ClassType(new ClassName($typeName));
        }

        throw new TypeException(\sprintf(
            'Invalid type: `%s` given. Valid types are [%s]',
            $typeName,
            \implode(', ', self::VALID_TYPE_NAMES)
        ));
    }

    /**
     * @param mixed $value
     * @throws TypeException
     * @return TypeInterface
     */
    final public static function createFromValue($value): TypeInterface
    {
        if (\is_object($value)) {
            if (\is_iterable($value)) {
                return self::createFromTypeName('iterable');
            }
            if (\is_callable($value)) {
                return self::createFromTypeName('callable');
            }

            return new ClassType(new ClassName(\get_class($value)));
        }

        return self::createFromTypeName(\gettype($value));
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
}