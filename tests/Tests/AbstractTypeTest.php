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
use Jojo1981\PhpTypes\AbstractType;
use Jojo1981\PhpTypes\ArrayType;
use Jojo1981\PhpTypes\BooleanType;
use Jojo1981\PhpTypes\CallableType;
use Jojo1981\PhpTypes\ClassType;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\FloatType;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\IterableType;
use Jojo1981\PhpTypes\MixedType;
use Jojo1981\PhpTypes\NullType;
use Jojo1981\PhpTypes\ObjectType;
use Jojo1981\PhpTypes\ResourceType;
use Jojo1981\PhpTypes\StringType;
use Jojo1981\PhpTypes\TestSuite\Fixture\AbstractTestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\InterfaceTestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\CallableTestClass;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntityBase;
use Jojo1981\PhpTypes\TypeInterface;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use Jojo1981\PhpTypes\VoidType;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use stdClass;
use function fopen;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests
 */
final class AbstractTypeTest extends TestCase
{
    /**
     * @return void
     * @throws ValueException
     * @throws RuntimeException
     * @throws TypeException
     */
    public function testCreateFromNameWithInvalidName(): void
    {
        $this->expectExceptionObject(new TypeException(
            'Invalid type: `InvalidName` given. Valid types are [bool, boolean, int, integer, number, real, double, ' .
            'float, string, text, array, object, callable, callback, iterable, resource, null, void, mixed]'
        ));
        AbstractType::createFromTypeName('InvalidName');
    }

    /**
     * @dataProvider getTestDataForCreateFromName
     *
     * @param string $typeName
     * @param TypeInterface $expectedType
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     */
    public function testCreateFromName(string $typeName, TypeInterface $expectedType): void
    {
        self::assertEquals($expectedType, AbstractType::createFromTypeName($typeName));
    }

    /**
     * @dataProvider getTestDataForCreateFromValue
     *
     * @param mixed $value
     * @param TypeInterface $expectedType
     * @return void
     * @throws InvalidArgumentException
     * @throws RuntimeException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     */
    public function testCreateFromValue($value, TypeInterface $expectedType): void
    {
        self::assertEquals($expectedType, AbstractType::createFromValue($value));
    }

    /**
     * @throws TypeException
     * @return void
     */
    public function testCreateFromTypesWithEmptyTypes(): void
    {
        $this->expectExceptionObject(new TypeException('Invalid type values given, types can not be empty'));
        AbstractType::createFromTypes([]);
    }

    /**
     * @throws TypeException
     * @return void
     */
    public function testCreateFromTypesWithOneType(): void
    {
        $this->expectExceptionObject(new TypeException('Invalid type values given, types must contain at least 2 types'));
        AbstractType::createFromTypes([new StringType()]);
    }

    /**
     * @throws TypeException
     * @return void
     */
    public function testCreateFromTypesWithDuplicates(): void
    {
        $this->expectExceptionObject(new TypeException('Invalid type values given, types must contain at least 2 types'));
        AbstractType::createFromTypes([new StringType(), new StringType()]);
    }

    /**
     * @throws TypeException
     * @return void
     */
    public function testCreateFromTypesWithMultipleTypesContainingInvalidElement(): void
    {
        $this->expectExceptionObject(new TypeException(
            'Invalid types value given. Every element must be an instance of: Jojo1981\PhpTypes\TypeInterface.'
        ));
        AbstractType::createFromTypes([new NullType(), new IntegerType(), 'text']);
    }

    /**
     * @throws TypeException
     * @return void
     */
    public function testCreateFromTypesWithMultipleTypesContainingVoid(): void
    {
        $this->expectExceptionObject(new TypeException(
            'Invalid types value given. Element of void type found, a multi type can not contain a Jojo1981\PhpTypes\VoidType.'
        ));
        AbstractType::createFromTypes([new NullType(), new VoidType()]);
    }

    /**
     * @throws InvalidArgumentException
     * @throws TypeException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testCreateFromTypes(): void
    {
        $multiType1 = AbstractType::createFromTypes([new ObjectType(), new StringType()]);
        self::assertEquals([new ObjectType(), new StringType()], $multiType1->getTypes());

        $multiType2 = AbstractType::createFromTypes([$multiType1]);
        self::assertEquals([new ObjectType(), new StringType()], $multiType2->getTypes());

        $multiType3 = AbstractType::createFromTypes([$multiType1, new StringType()]);
        self::assertEquals([new ObjectType(), new StringType()], $multiType3->getTypes());

        $multiType4 = AbstractType::createFromTypes([$multiType1, new IntegerType()]);
        self::assertEquals([new ObjectType(), new StringType(), new IntegerType()], $multiType4->getTypes());
    }

    /**
     * @throws ValueException
     * @throws TypeException
     * @return array
     */
    public function getTestDataForCreateFromName(): array
    {
        return [
            ['bool', new BooleanType()],
            ['boolean', new BooleanType()],
            ['int', new IntegerType()],
            ['integer', new IntegerType()],
            ['number', new FloatType()],
            ['real', new FloatType()],
            ['double', new FloatType()],
            ['float', new FloatType()],
            ['text', new StringType()],
            ['string', new StringType()],
            ['array', new ArrayType()],
            ['object', new ObjectType()],
            ['callable', new CallableType()],
            ['callback', new CallableType()],
            ['iterable', new IterableType()],
            ['resource', new ResourceType()],
            ['null', new NullType()],
            ['void', new VoidType()],
            ['mixed', new MixedType()],
            ['Bool', new BooleanType()],
            ['booLean', new BooleanType()],
            ['Int', new IntegerType()],
            ['inTeger', new IntegerType()],
            ['Number', new FloatType()],
            ['reaL', new FloatType()],
            ['dOuBlE', new FloatType()],
            ['FlOaT', new FloatType()],
            ['teXt', new StringType()],
            ['stRing', new StringType()],
            ['arrAy', new ArrayType()],
            ['objEct', new ObjectType()],
            ['calLable', new CallableType()],
            ['callBack', new CallableType()],
            ['iteRable', new IterableType()],
            ['ResOurCe', new ResourceType()],
            ['null', new NullType()],
            ['VoiD', new VoidType()],
            ['MiXeD', new MixedType()],
            ['\\' . InterfaceTestEntity::class, new ClassType(new ClassName(InterfaceTestEntity::class))],
            ['\\' . AbstractTestEntity::class, new ClassType(new ClassName(AbstractTestEntity::class))],
            ['\\' . TestEntityBase::class, new ClassType(new ClassName(TestEntityBase::class))],
            ['\\' . TestEntity::class, new ClassType(new ClassName(TestEntity::class))],
            [TestEntity::class . '[]', new ArrayType(new ClassType(new ClassName(TestEntity::class)))],
            ['array<string, ' . TestEntity::class . '>', new ArrayType(new ClassType(new ClassName(TestEntity::class)), new StringType())]
        ];
    }

    /**
     * @throws ValueException
     * @throws TypeException
     * @return array
     */
    public function getTestDataForCreateFromValue(): array
    {
        return [
            [true, new BooleanType()],
            [false, new BooleanType()],
            [-1, new IntegerType()],
            [0, new IntegerType()],
            [1, new IntegerType()],
            [-1.0, new FloatType()],
            [0.0, new FloatType()],
            [1.0, new FloatType()],
            ['', new StringType()],
            ['text', new StringType()],
            [[], new ArrayType()],
            [['item1', 'item3', 'item3'], new ArrayType()],
            [['key1' => 'item1', 'key2' => 'item3', 'key3' => 'item3'], new ArrayType()],
            [new stdClass(), new ClassType(new ClassName(stdClass::class))],
            [new TestEntity(), new ClassType(new ClassName(TestEntity::class))],
            [static function () {}, new CallableType()],
            [new ArrayIterator(), new IterableType()],
            [fopen(__FILE__, 'rb'), new ResourceType()],
            [null, new NullType()],
            [new CallableTestClass(), new CallableType()]
        ];
    }
}
