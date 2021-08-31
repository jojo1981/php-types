<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2021 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\Parser;

use Jojo1981\PhpTypes\AbstractType;
use Jojo1981\PhpTypes\ArrayType;
use Jojo1981\PhpTypes\Exception\TypeException;
use RuntimeException;
use function array_map;
use function count;
use function explode;
use function mb_strlen;
use function preg_replace;
use function stripos;
use function substr;

/**
 * @internal
 * @package Jojo1981\PhpTypes\Parser
 */
final class ArrayTypeParser
{
    /**
     * @param string $text
     * @return ArrayType
     * @throws TypeException
     * @throws RuntimeException
     */
    public static function parse(string $text): ArrayType
    {
        $exception = new RuntimeException('Invalid array string');
        $text = preg_replace('/\s+/', '', $text);
        if (0 !== stripos($text, 'array<') || '>' !== $text[mb_strlen($text) - 1]) {
            throw $exception;
        }

        $parts = array_map('trim', explode(',', substr($text, 6, -1), 2));
        if (2 !== count($parts)) {
            throw $exception;
        }

        return new ArrayType(AbstractType::createFromTypeName($parts[1]), AbstractType::createFromTypeName($parts[0]));
    }
}
