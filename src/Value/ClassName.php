<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2020 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\Value;

use Jojo1981\PhpTypes\Value\Exception\ValueException;

/**
 * @package Jojo1981\PhpTypes\Value
 */
final class ClassName
{
    /** @var string */
    public const NAMESPACE__SEPARATOR = '\\';

    /** @var string  */
    private const PATTERN = '/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/';

    /** @var string[] */
    private $parts;

    /**
     * @param string $value
     * @throws ValueException
     */
    public function __construct(string $value)
    {
        $this->assertValue($value);
        $value = \ltrim($value, self::NAMESPACE__SEPARATOR);
        $this->parts = \explode(self::NAMESPACE__SEPARATOR, $value);
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return \end($this->parts);
    }

    /**
     * @return string
     */
    public function getFqcn(): string
    {
        return self::NAMESPACE__SEPARATOR . \implode(self::NAMESPACE__SEPARATOR, $this->parts);
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        $parts = $this->parts;
        \array_pop($parts);

        return self::NAMESPACE__SEPARATOR . \implode(self::NAMESPACE__SEPARATOR, $parts);
    }

    /**
     * @return bool
     */
    public function isInGlobalNameSpace(): bool
    {
        return 1 === \count($this->parts);
    }

    /**
     * @return bool
     */
    public function exists(): bool
    {
        return \class_exists($this->getFqcn()) || \interface_exists($this->getFqcn());
    }

    /**
     * @param ClassName $className
     * @return bool
     */
    public function isEqual(ClassName $className): bool
    {
        return $className->getFqcn() === $this->getFqcn();
    }

    /**
     * @param string $value
     * @throws ValueException
     * @return void
     */
    private function assertValue(string $value): void
    {
        if (empty($value)) {
            throw new ValueException('Class name can not be an empty string');
        }

        foreach (\explode(self::NAMESPACE__SEPARATOR, ltrim($value, self::NAMESPACE__SEPARATOR)) as $part) {
            if (1 !== \preg_match(self::PATTERN, $part)) {
                throw new ValueException(\sprintf('Class name: `%s` is not valid.', $value));
            }
        }
    }
}