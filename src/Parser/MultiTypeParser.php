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
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\MultiType;
use Jojo1981\PhpTypes\TypeInterface;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use RuntimeException;
use function array_filter;
use function array_map;
use function explode;
use function preg_replace;
use function strpos;

/**
 * @internal
 * @package Jojo1981\PhpTypes\Parser
 */
final class MultiTypeParser
{
    /**
     * @param string $text
     * @return MultiType
     * @throws TypeException
     * @throws ValueException
     * @throws RuntimeException
     */
    public static function parse(string $text): MultiType
    {
        $text = preg_replace('/\s+/', '', $text);
        if (empty($text) || false === strpos($text, '|')) {
            throw new RuntimeException('Invalid multi type string');
        }

        return new MultiType(array_map(
            static function (string $text): TypeInterface {
                return AbstractType::createFromTypeName($text);
            },
            array_filter(explode('|', $text))
        ));
    }
}
