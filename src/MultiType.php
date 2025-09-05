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
use function array_values;
use function count;
use function implode;
use function in_array;
use function sprintf;

/**
 * A multi type (union type) can hold any type except a multi type.
 *  It must have at least 2 types and can not have duplicated types.
 *
 * @package Jojo1981\PhpTypes
 */
final class MultiType extends AbstractPseudoType
{
    /** @var TypeInterface[] */
    private array $types;

    /**
     * @param TypeInterface[] $types
     * @throws TypeException
     */
    public function __construct(array $types)
    {
        $this->types = $this->assertTypes($types);
    }

    /**
     * @return TypeInterface[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'multi';
    }

    /**
     * @return bool
     */
    public function isCompound(): bool
    {
        return true;
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isAssignableType(TypeInterface $type): bool
    {
        if ($type instanceof self) {
            return $this->isEqual($type);
        }

        foreach ($this->types as $currentType) {
            if ($currentType->isAssignableType($type)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function isAssignableValue(mixed $value): bool
    {
        foreach ($this->types as $type) {
            if ($type->isAssignableValue($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param TypeInterface $type
     * @return bool
     */
    public function isEqual(TypeInterface $type): bool
    {
        if ($type instanceof self) {
            if (count($this->types) !== count($type->getTypes())) {
                return false;
            }

            foreach ($this->types as $lhsType) {
                $found = false;
                foreach ($type->getTypes() as $rhsType) {
                    if ($lhsType->isEqual($rhsType)) {
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    return false;
                }
            }

            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return implode('|', $this->types);
    }

    /**
     * @param TypeInterface[] $types
     * @return TypeInterface[]
     * @throws TypeException
     */
    private function assertTypes(array $types): array
    {
        if (empty($types)) {
            throw new TypeException('Invalid type values given, types can not be empty.');
        }
        if (count($types) < 2) {
            throw new TypeException('Invalid type values given, types must contain at least 2 types.');
        }

        $seenTypes = [];
        foreach ($types as $type) {
            if (!($type instanceof TypeInterface)) {
                throw new TypeException(sprintf(
                    'Invalid types value given. Every element must be an instance of: %s.',
                    TypeInterface::class
                ));
            }
            if ($type instanceof self) {
                throw new TypeException(sprintf(
                    'Invalid types value given. Element of  multi type found, a multi type can not contain an instance of %s.',
                    self::class
                ));
            }
            if (in_array($type->getName(), $seenTypes, true)) {
                throw new TypeException(sprintf(
                    'Invalid type values given, value: %s is already included. Types must be unique no duplicates are allowed.',
                    $type->getName()
                ));
            }
            $seenTypes[] = $type->getName();
        }

        return array_values($types);
    }
}
