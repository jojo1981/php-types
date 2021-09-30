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
use Jojo1981\PhpTypes\TestSuite\Fixture\AbstractTestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\InterfaceTestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntityBase;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use Jojo1981\PhpTypes\VoidType;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use stdClass;
use function fopen;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests
 */
final class ClassTypeTest extends TestCase
{
    /** @var ClassType */
    private ClassType $type;

    /**
     * @throws ValueException
     * @throws TypeException
     * @return void
     */
    protected function setUp(): void
    {
        $this->type = $this->createClassType(__CLASS__);
    }

    /**
     * @throws ValueException
     * @throws TypeException
     * @return void
     */
    public function testWithNotExistingClass(): void
    {
        $this->expectExceptionObject(new TypeException('Class: `NotExistingClass` doesn\'t exists'));
        $this->createClassType('NotExistingClass');
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @return void
     */
    public function testGetName(): void
    {
        self::assertSame(__CLASS__, $this->type->getName());
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testIsScalar(): void
    {
        self::assertFalse($this->type->isScalar());
        self::assertNotInstanceOf(AbstractScalarType::class, $this->type);
    }

    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public function testIsCompound(): void
    {
        self::assertTrue($this->type->isCompound());
        self::assertInstanceOf(AbstractCompoundType::class, $this->type);
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
        self::assertFalse($this->type->isString());
        self::assertTrue($this->type->isObject());
        self::assertTrue($this->type->isClass());
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
     * @throws InvalidArgumentException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testIsEqual(): void
    {
        self::assertTrue($this->type->isEqual($this->type));
        self::assertTrue($this->type->isEqual($this->createClassType((__CLASS__))));

        self::assertFalse($this->type->isEqual(new ArrayType()));
        self::assertFalse($this->type->isEqual(new BooleanType()));
        self::assertFalse($this->type->isEqual(new CallableType()));
        self::assertFalse($this->type->isEqual($this->createClassType(TestEntity::class)));
        self::assertFalse($this->type->isEqual(new FloatType()));
        self::assertFalse($this->type->isEqual(new IntegerType()));
        self::assertFalse($this->type->isEqual(new IterableType()));
        self::assertFalse($this->type->isEqual(new MixedType()));
        self::assertFalse($this->type->isEqual(new MultiType([new NullType(), new StringType()])));
        self::assertFalse($this->type->isEqual(new NullType()));
        self::assertFalse($this->type->isEqual(new ObjectType()));
        self::assertFalse($this->type->isEqual(new ResourceType()));
        self::assertFalse($this->type->isEqual(new StringType()));
        self::assertFalse($this->type->isEqual(new VoidType()));
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
        self::assertTrue($this->type->isAssignableType($this->type));
        self::assertTrue($this->type->isAssignableType($this->createClassType(__CLASS__)));

        self::assertFalse($this->type->isAssignableType(new ArrayType()));
        self::assertFalse($this->type->isAssignableType(new BooleanType()));
        self::assertFalse($this->type->isAssignableType(new CallableType()));
        self::assertFalse($this->type->isAssignableType($this->createClassType(TestEntity::class)));
        self::assertFalse($this->type->isAssignableType(new FloatType()));
        self::assertFalse($this->type->isAssignableType(new IntegerType()));
        self::assertFalse($this->type->isAssignableType(new IterableType()));
        self::assertFalse($this->type->isAssignableType(new MixedType()));
        self::assertFalse($this->type->isAssignableType(new MultiType([new NullType(), new StringType()])));
        self::assertFalse($this->type->isAssignableType(new NullType()));
        self::assertFalse($this->type->isAssignableType(new ObjectType()));
        self::assertFalse($this->type->isAssignableType(new ResourceType()));
        self::assertFalse($this->type->isAssignableType(new StringType()));
        self::assertFalse($this->type->isAssignableType(new VoidType()));

        $typeTestEntityInterface = $this->createClassType(InterfaceTestEntity::class);
        self::assertTrue($typeTestEntityInterface->isAssignableType($this->createClassType(InterfaceTestEntity::class)));
        self::assertTrue($typeTestEntityInterface->isAssignableType($this->createClassType(AbstractTestEntity::class)));
        self::assertTrue($typeTestEntityInterface->isAssignableType($this->createClassType(TestEntityBase::class)));
        self::assertTrue($typeTestEntityInterface->isAssignableType($this->createClassType(TestEntity::class)));

        $typeAbstractTestEntity = $this->createClassType(AbstractTestEntity::class);
        self::assertFalse($typeAbstractTestEntity->isAssignableType($this->createClassType(InterfaceTestEntity::class)));
        self::assertTrue($typeAbstractTestEntity->isAssignableType($this->createClassType(AbstractTestEntity::class)));
        self::assertTrue($typeAbstractTestEntity->isAssignableType($this->createClassType(TestEntityBase::class)));
        self::assertTrue($typeAbstractTestEntity->isAssignableType($this->createClassType(TestEntity::class)));

        $typeTestEntityBase = $this->createClassType(TestEntityBase::class);
        self::assertFalse($typeTestEntityBase->isAssignableType($this->createClassType(InterfaceTestEntity::class)));
        self::assertFalse($typeTestEntityBase->isAssignableType($this->createClassType(AbstractTestEntity::class)));
        self::assertTrue($typeTestEntityBase->isAssignableType($this->createClassType(TestEntityBase::class)));
        self::assertTrue($typeTestEntityBase->isAssignableType($this->createClassType(TestEntity::class)));

        $typeTestEntity = $this->createClassType(TestEntity::class);
        self::assertFalse($typeTestEntity->isAssignableType($this->createClassType(InterfaceTestEntity::class)));
        self::assertFalse($typeTestEntity->isAssignableType($this->createClassType(AbstractTestEntity::class)));
        self::assertFalse($typeTestEntity->isAssignableType($this->createClassType(TestEntityBase::class)));
        self::assertTrue($typeTestEntity->isAssignableType($this->createClassType(TestEntity::class)));
    }

    /**
     * @throws InvalidArgumentException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testIsAssignableValue(): void
    {
        $testEntityClassType = new ClassType(new ClassName(TestEntity::class));
        self::assertTrue($testEntityClassType->isAssignableValue(new TestEntity()));
        self::assertFalse($testEntityClassType->isAssignableValue(new TestEntityBase()));

        $testEntityBaseClassType = new ClassType(new ClassName(TestEntityBase::class));
        self::assertTrue($testEntityBaseClassType->isAssignableValue(new TestEntity()));
        self::assertTrue($testEntityBaseClassType->isAssignableValue(new TestEntityBase()));

        $testAbstractTestEntityClassType = new ClassType(new ClassName(AbstractTestEntity::class));
        self::assertTrue($testAbstractTestEntityClassType->isAssignableValue(new TestEntity()));
        self::assertTrue($testAbstractTestEntityClassType->isAssignableValue(new TestEntityBase()));

        $testInterfaceTestEntityClassType = new ClassType(new ClassName(InterfaceTestEntity::class));
        self::assertTrue($testInterfaceTestEntityClassType->isAssignableValue(new TestEntity()));
        self::assertTrue($testInterfaceTestEntityClassType->isAssignableValue(new TestEntityBase()));

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
        self::assertFalse($this->type->isAssignableValue(''));
        self::assertFalse($this->type->isAssignableValue('text'));
    }

    /**
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testGetReflectionClass(): void
    {
        self::assertEquals(new ReflectionClass(__CLASS__), $this->type->getReflectionClass());
    }

    /**
     * @param string $className
     * @throws ValueException
     * @throws TypeException
     * @return ClassType
     */
    private function createClassType(string $className): ClassType
    {
        return new ClassType(new ClassName($className));
    }
}
