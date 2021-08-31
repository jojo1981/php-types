<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2020 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\TestSuite\Tests\Value;

use Jojo1981\PhpTypes\TestSuite\Fixture\AbstractTestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\InterfaceTestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntityBase;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests\Value
 */
final class ClassNameTest extends TestCase
{
    /**
     * @return void
     * @throws ValueException
     */
    public function testEmptyValue(): void
    {
        $this->expectExceptionObject(new ValueException('Class name can not be an empty string'));
        new ClassName('');
    }

    /**
     * @throws ValueException
     * @return void
     */
    public function testOnlyNamespaceSeparators(): void
    {
        $this->expectExceptionObject(new ValueException('Class name: `\` is not valid.'));
        new ClassName('\\');
    }

    /**
     * @throws ValueException
     * @return void
     */
    public function testInvalidClassName(): void
    {
        $this->expectExceptionObject(new ValueException('Class name: `//` is not valid.'));
        new ClassName('//');
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws ValueException
     * @return void
     */
    public function testClassInGlobalNamespace(): void
    {
        $className = new ClassName('Test');
        self::assertSame('Test', $className->getShortName());
        self::assertSame('\Test', $className->getFqcn());
        self::assertSame('\\', $className->getNamespace());
        self::assertTrue($className->isInGlobalNameSpace());
        self::assertTrue($className->isEqual($className));
        self::assertTrue($className->isEqual(new ClassName('Test')));
        self::assertFalse($className->isEqual(new ClassName('OtherTest')));
        self::assertFalse($className->exists());
    }

    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws ValueException
     * @return void
     */
    public function testClassInSubNamespace(): void
    {
        $className = new ClassName('\Test\TestClass');
        self::assertSame('TestClass', $className->getShortName());
        self::assertSame('\Test\TestClass', $className->getFqcn());
        self::assertSame('\Test', $className->getNamespace());
        self::assertFalse($className->isInGlobalNameSpace());
        self::assertTrue($className->isEqual($className));
        self::assertTrue($className->isEqual(new ClassName('Test\TestClass')));
        self::assertFalse($className->isEqual(new ClassName('OtherTest')));
        self::assertFalse($className->exists());
    }

    /**
     * @throws InvalidArgumentException
     * @throws ValueException
     * @throws ExpectationFailedException
     * @return void
     */
    public function testExists(): void
    {
        $className = new ClassName(__CLASS__);
        self::assertTrue($className->exists());

        $className = new ClassName(InterfaceTestEntity::class);
        self::assertTrue($className->exists());

        $className = new ClassName(AbstractTestEntity::class);
        self::assertTrue($className->exists());

        $className = new ClassName(TestEntity::class);
        self::assertTrue($className->exists());

        $className = new ClassName(TestEntityBase::class);
        self::assertTrue($className->exists());
    }
}
