<?php
/*
 * This file is part of the jojo1981/type-checker package
 *
 * Copyright (c) 2020 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\TestSuite\Tests;

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
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests
 */
class MultiTypeTest extends TestCase
{
    /** @var MultiType */
    private $type;

    /**
     * @throws TypeException
     * @return void
     */
    protected function setUp(): void
    {
        $this->type = new MultiType([new NullType(), new IntegerType()]);
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testGetName(): void
    {
        $this->assertSame('multi', $this->type->getName());
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsScalar(): void
    {
        $this->assertFalse($this->type->isScalar());
        $this->assertNotInstanceOf(AbstractScalarType::class, $this->type);
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsCompound(): void
    {
        $this->assertFalse($this->type->isCompound());
        $this->assertNotInstanceOf(AbstractCompoundType::class, $this->type);
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsNumber(): void
    {
        $this->assertFalse($this->type->isNumber());
        $this->assertNotInstanceOf(AbstractNumberType::class, $this->type);
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testIsPseudoType(): void
    {
        $this->assertTrue($this->type->isPseudoType());
        $this->assertInstanceOf(AbstractPseudoType::class, $this->type);
    }

    /**
     * @throws InvalidArgumentException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testIsEqual(): void
    {
        $this->assertTrue($this->type->isEqual($this->type));
        $this->assertTrue($this->type->isEqual(new MultiType([new NullType(), new IntegerType()])));
        $this->assertTrue($this->type->isEqual(new MultiType([new IntegerType(), new NullType()])));
        $this->assertTrue(
            (new MultiType([new CallableType(), new ObjectType()]))
                ->isEqual(new MultiType([new ObjectType(), new CallableType()]))
        );
        $this->assertTrue(
            (new MultiType([new MultiType([new StringType(), new IntegerType()]), new CallableType(), new ObjectType()]))
                ->isEqual(new MultiType([new StringType(), new IntegerType(), new MultiType([new ObjectType(), new CallableType()])]))
        );
        $this->assertTrue(
            (new MultiType([new MultiType([new StringType(), new MultiType([new StringType(), new ObjectType(), new NullType()]), new IntegerType()]), new CallableType(), new ObjectType()]))
                ->isEqual(new MultiType([new StringType(), new IntegerType(), new NullType(), new MultiType([new ObjectType(), new CallableType()])]))
        );

        $this->assertFalse(
            (new MultiType([new CallableType(), new ObjectType()]))
                ->isEqual(new MultiType([new NullType(), new ObjectType(), new CallableType()]))
        );
        $this->assertFalse($this->type->isEqual(new MultiType([new NullType(), new StringType()])));
        $this->assertFalse($this->type->isEqual(new MultiType([new IntegerType(), new StringType()])));
        $this->assertFalse($this->type->isEqual(new BooleanType()));
        $this->assertFalse($this->type->isEqual(new CallableType()));
        $this->assertFalse($this->type->isEqual(new ClassType(new ClassName(__CLASS__))));
        $this->assertFalse($this->type->isEqual(new FloatType()));
        $this->assertFalse($this->type->isEqual(new IntegerType()));
        $this->assertFalse($this->type->isEqual(new IterableType()));
        $this->assertFalse($this->type->isEqual(new MixedType()));
        $this->assertFalse($this->type->isEqual(new NullType()));
        $this->assertFalse($this->type->isEqual(new ObjectType()));
        $this->assertFalse($this->type->isEqual(new ResourceType()));
        $this->assertFalse($this->type->isEqual(new StringType()));
    }

    /**
     * @throws InvalidArgumentException
     * @throws TypeException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testGetTypes(): void
    {
        $this->assertEquals([new NullType(), new IntegerType()], $this->type->getTypes());
        $this->assertEquals(
            [new CallableType(), new ObjectType()],
            (new MultiType([new CallableType(), new ObjectType()]))->getTypes()
        );
        $this->assertEquals(
            [new StringType(), new IntegerType(), new ObjectType(), new CallableType()],
            (new MultiType([new MultiType([new StringType(), new IntegerType()]), new ObjectType(), new CallableType()]))->getTypes()
        );
        $this->assertEquals(
            [new StringType(), new ObjectType(), new NullType(), new IntegerType(), new CallableType()],
            (new MultiType([new MultiType([new StringType(), new MultiType([new StringType(), new ObjectType(), new NullType()]), new IntegerType()]), new CallableType(), new ObjectType()]))->getTypes()
        );
        $this->assertNotEquals(
            [new NullType(), new ObjectType(), new CallableType()],
            (new MultiType([new CallableType(), new ObjectType()]))->getTypes()
        );
    }

    /**
     * @throws InvalidArgumentException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testIsAssignableType(): void
    {
        $this->assertTrue($this->type->isAssignableType($this->type));
        $this->assertTrue($this->type->isAssignableType(new MultiType([new IntegerType(), new NullType()])));
        $this->assertTrue($this->type->isAssignableType(new IntegerType()));
        $this->assertTrue($this->type->isAssignableType(new NullType()));

        $this->assertFalse($this->type->isAssignableType(new ArrayType()));
        $this->assertFalse($this->type->isAssignableType(new BooleanType()));
        $this->assertFalse($this->type->isAssignableType(new CallableType()));
        $this->assertFalse($this->type->isAssignableType(new ClassType(new ClassName(__CLASS__))));
        $this->assertFalse($this->type->isAssignableType(new FloatType()));
        $this->assertFalse($this->type->isAssignableType(new IterableType()));
        $this->assertFalse($this->type->isAssignableType(new MixedType()));
        $this->assertFalse($this->type->isAssignableType(new MultiType([new NullType(), new StringType()])));
        $this->assertFalse($this->type->isAssignableType(new ObjectType()));
        $this->assertFalse($this->type->isAssignableType(new ResourceType()));
        $this->assertFalse($this->type->isAssignableType(new StringType()));
        $this->assertFalse($this->type->isAssignableType(new VoidType()));
    }

    /**
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testIsAssignableValue(): void
    {
        $this->assertTrue($this->type->isAssignableValue(-1));
        $this->assertTrue($this->type->isAssignableValue(0));
        $this->assertTrue($this->type->isAssignableValue(1));
        $this->assertTrue($this->type->isAssignableValue(null));

        $this->assertFalse($this->type->isAssignableValue([]));
        $this->assertFalse($this->type->isAssignableValue(['item1', 'item2', 'item3']));
        $this->assertFalse($this->type->isAssignableValue(['key1' => 'item1', 'key2' => 'item2', 'key3' => 'item3']));
        $this->assertFalse($this->type->isAssignableValue(true));
        $this->assertFalse($this->type->isAssignableValue(false));
        $this->assertFalse($this->type->isAssignableValue(static function () {}));
        $this->assertFalse($this->type->isAssignableValue(new TestEntity()));
        $this->assertFalse($this->type->isAssignableValue(new \stdClass()));
        $this->assertFalse($this->type->isAssignableValue(-1.0));
        $this->assertFalse($this->type->isAssignableValue(0.0));
        $this->assertFalse($this->type->isAssignableValue(1.0));
        $this->assertFalse($this->type->isAssignableValue(new \ArrayIterator()));
        $this->assertFalse($this->type->isAssignableValue(\fopen(__FILE__, 'rb')));
        $this->assertFalse($this->type->isAssignableValue(''));
        $this->assertFalse($this->type->isAssignableValue('text'));
    }
}