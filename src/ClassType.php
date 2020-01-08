<?php
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
 * @package Jojo1981\PhpTypes
 */
final class ClassType extends ObjectType
{
    /** @var ClassName */
    private $className;

    /**
     * @param ClassName $className
     * @throws TypeException
     */
    public function __construct(ClassName $className)
    {
        $this->assertClassName($className);
        $this->className = $className;
    }

    /**
     * @return ClassName
     */
    public function getClassName(): ClassName
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->className->getFqcn();
    }

    /**
     * @throws \ReflectionException
     * @return \ReflectionClass
     */
    public function getReflectionClass(): \ReflectionClass
    {
        return new \ReflectionClass($this->className->getFqcn());
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool
    {
        return $type instanceof self && $this->isClassTypeAssignableToThisClassType($type);
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue($value): bool
    {
        if (!parent::isAssignableValue($value)) {
            return false;
        }

        return \is_a($value, $this->className->getFqcn());
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isEqual(TypeInterface $type): bool
    {
        if ($type instanceof self) {
            return $this->className->isEqual($type->getClassName());
        }

        return false;
    }

    /**
     * @param ClassName $className
     * @throws TypeException
     * @return void
     */
    private function assertClassName(ClassName $className): void
    {
        if (!$className->exists()) {
            throw new TypeException(\sprintf('Class: `%s` doesn\'t exists', $className->getFqcn()));
        }
    }

    /**
     * @param ClassType $type
     * @return bool
     */
    private function isClassTypeAssignableToThisClassType(ClassType $type): bool
    {
        return $this->className->isEqual($type->getClassName())
            || \is_subclass_of($type->getClassName()->getFqcn(), $this->className->getFqcn())
            || \is_a($type->getClassName()->getFqcn(), $this->className->getFqcn());

//        return $this->className->isEqual($type->getClassName())
//            || \is_a($type->getClassName()->getFqcn(), $this->className->getFqcn());
    }
}