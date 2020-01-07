<?php
/*
 * This file is part of the jojo1981/type-checker package
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
class ClassNameTest extends TestCase
{
    /**
     * @throws ValueException
     * @return void
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
        $this->assertSame('Test', $className->getShortName());
        $this->assertSame('\Test', $className->getFqcn());
        $this->assertSame('\\', $className->getNamespace());
        $this->assertTrue($className->isInGlobalNameSpace());
        $this->assertTrue($className->isEqual($className));
        $this->assertTrue($className->isEqual(new ClassName('Test')));
        $this->assertFalse($className->isEqual(new ClassName('OtherTest')));
        $this->assertFalse($className->exists());
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
        $this->assertSame('TestClass', $className->getShortName());
        $this->assertSame('\Test\TestClass', $className->getFqcn());
        $this->assertSame('\Test', $className->getNamespace());
        $this->assertFalse($className->isInGlobalNameSpace());
        $this->assertTrue($className->isEqual($className));
        $this->assertTrue($className->isEqual(new ClassName('Test\TestClass')));
        $this->assertFalse($className->isEqual(new ClassName('OtherTest')));
        $this->assertFalse($className->exists());
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
        $this->assertTrue($className->exists());

        $className = new ClassName(InterfaceTestEntity::class);
        $this->assertTrue($className->exists());

        $className = new ClassName(AbstractTestEntity::class);
        $this->assertTrue($className->exists());

        $className = new ClassName(TestEntity::class);
        $this->assertTrue($className->exists());

        $className = new ClassName(TestEntityBase::class);
        $this->assertTrue($className->exists());
    }
}