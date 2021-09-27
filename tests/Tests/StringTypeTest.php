<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2020 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\TestSuite\Tests;

use ArrayIterator;
use Jojo1981\PhpTypes\AbstractCompoundType;
use Jojo1981\PhpTypes\AbstractNumberType;
use Jojo1981\PhpTypes\AbstractPseudoType;
use Jojo1981\PhpTypes\AbstractScalarType;
use Jojo1981\PhpTypes\ArrayType;
use Jojo1981\PhpTypes\BooleanType;
use Jojo1981\PhpTypes\CallableType;
use Jojo1981\PhpTypes\ClassType;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\FloatType;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\IterableType;
use Jojo1981\PhpTypes\MixedType;
use Jojo1981\PhpTypes\MultiType;
use Jojo1981\PhpTypes\NullType;
use Jojo1981\PhpTypes\ObjectType;
use Jojo1981\PhpTypes\ResourceType;
use Jojo1981\PhpTypes\StringType;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use Jojo1981\PhpTypes\VoidType;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use stdClass;
use function fopen;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests
 */
final class StringTypeTest extends TestCase
{
    /** @var StringType */
    private StringType $type;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->type = new StringType();
    }

    /**
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testGetName(): void
    {
        self::assertSame('string', $this->type->getName());
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testIsScalar(): void
    {
        self::assertTrue($this->type->isScalar());
        self::assertInstanceOf(AbstractScalarType::class, $this->type);
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testIsCompound(): void
    {
        self::assertFalse($this->type->isCompound());
        self::assertNotInstanceOf(AbstractCompoundType::class, $this->type);
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testIsNumber(): void
    {
        self::assertFalse($this->type->isNumber());
        self::assertNotInstanceOf(AbstractNumberType::class, $this->type);
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testIsPseudoType(): void
    {
        self::assertFalse($this->type->isPseudoType());
        self::assertNotInstanceOf(AbstractPseudoType::class, $this->type);
    }
    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testIsOfCertainType(): void
    {
        self::assertFalse($this->type->isBoolean());
        self::assertTrue($this->type->isString());
        self::assertFalse($this->type->isObject());
        self::assertFalse($this->type->isClass());
        self::assertFalse($this->type->isInteger());
        self::assertFalse($this->type->isFloat());
        self::assertFalse($this->type->isArray());
        self::assertFalse($this->type->isIterable());
        self::assertFalse($this->type->isCallable());
        self::assertFalse($this->type->isResource());
        self::assertFalse($this->type->isNull());
        self::assertFalse($this->type->isVoid());
    }

    /**
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsEqual(): void
    {
        self::assertTrue($this->type->isEqual($this->type));
        self::assertTrue($this->type->isEqual(new StringType()));

        self::assertFalse($this->type->isEqual(new ArrayType()));
        self::assertFalse($this->type->isEqual(new BooleanType()));
        self::assertFalse($this->type->isEqual(new CallableType()));
        self::assertFalse($this->type->isEqual(new ClassType(new ClassName(__CLASS__))));
        self::assertFalse($this->type->isEqual(new FloatType()));
        self::assertFalse($this->type->isEqual(new IntegerType()));
        self::assertFalse($this->type->isEqual(new IterableType()));
        self::assertFalse($this->type->isEqual(new MixedType()));
        self::assertFalse($this->type->isEqual(new MultiType([new NullType(), new StringType()])));
        self::assertFalse($this->type->isEqual(new NullType()));
        self::assertFalse($this->type->isEqual(new ObjectType()));
        self::assertFalse($this->type->isEqual(new ResourceType()));
        self::assertFalse($this->type->isEqual(new VoidType()));
    }

    /**
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsAssignableType(): void
    {
        self::assertTrue($this->type->isAssignableType($this->type));
        self::assertTrue($this->type->isAssignableType(new StringType()));

        self::assertFalse($this->type->isAssignableType(new ArrayType()));
        self::assertFalse($this->type->isAssignableType(new BooleanType()));
        self::assertFalse($this->type->isAssignableType(new CallableType()));
        self::assertFalse($this->type->isAssignableType(new ClassType(new ClassName(__CLASS__))));
        self::assertFalse($this->type->isAssignableType(new FloatType()));
        self::assertFalse($this->type->isAssignableType(new IntegerType()));
        self::assertFalse($this->type->isAssignableType(new IterableType()));
        self::assertFalse($this->type->isAssignableType(new MixedType()));
        self::assertFalse($this->type->isAssignableType(new MultiType([new NullType(), new StringType()])));
        self::assertFalse($this->type->isAssignableType(new NullType()));
        self::assertFalse($this->type->isAssignableType(new ObjectType()));
        self::assertFalse($this->type->isAssignableType(new ResourceType()));
        self::assertFalse($this->type->isAssignableType(new VoidType()));
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsAssignableValue(): void
    {
        self::assertTrue($this->type->isAssignableValue(''));
        self::assertTrue($this->type->isAssignableValue('text'));

        self::assertFalse($this->type->isAssignableValue([]));
        self::assertFalse($this->type->isAssignableValue(['item1', 'item2', 'item3']));
        self::assertFalse($this->type->isAssignableValue(['key1' => 'item1', 'key2' => 'item2', 'key3' => 'item3']));
        self::assertFalse($this->type->isAssignableValue(true));
        self::assertFalse($this->type->isAssignableValue(false));
        self::assertFalse($this->type->isAssignableValue(static function () {}));
        self::assertFalse($this->type->isAssignableValue(new TestEntity()));
        self::assertFalse($this->type->isAssignableValue(new stdClass()));
        self::assertFalse($this->type->isAssignableValue(-1.0));
        self::assertFalse($this->type->isAssignableValue(0.0));
        self::assertFalse($this->type->isAssignableValue(1.0));
        self::assertFalse($this->type->isAssignableValue(-1));
        self::assertFalse($this->type->isAssignableValue(0));
        self::assertFalse($this->type->isAssignableValue(1));
        self::assertFalse($this->type->isAssignableValue(new ArrayIterator()));
        self::assertFalse($this->type->isAssignableValue(null));
        self::assertFalse($this->type->isAssignableValue(fopen(__FILE__, 'rb')));
    }
}
