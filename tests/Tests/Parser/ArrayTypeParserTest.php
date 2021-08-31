<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2021 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\TestSuite\Tests\Parser;

use Jojo1981\PhpTypes\ArrayType;
use Jojo1981\PhpTypes\ClassType;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\Parser\ArrayTypeParser;
use Jojo1981\PhpTypes\StringType;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use stdClass;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests\Parser
 */
final class ArrayTypeParserTest extends TestCase
{
    /**
     * @dataProvider getParseFailedTestData
     *
     * @param string $text
     * @return void
     * @throws TypeException
     * @throws RuntimeException
     */
    public function testParseFailed(string $text): void
    {
        $this->expectExceptionObject(new RuntimeException('Invalid array string'));
        ArrayTypeParser::parse($text);
    }

    /**
     * @dataProvider getParseSuccessfullyTestData
     *
     * @param string $text
     * @param ArrayType $expectedType
     * @return void
     * @throws ExpectationFailedException
     * @throws RuntimeException
     * @throws InvalidArgumentException
     * @throws TypeException
     */
    public function testParseSuccessfully(string $text, ArrayType $expectedType): void
    {
        self::assertEquals($expectedType, ArrayTypeParser::parse($text));
    }

    /**
     * @return array[]
     */
    public function getParseFailedTestData(): array
    {
        return [
            [''],
            ['array'],
            ['array<'],
            ['array<>'],
            ['array<int>'],
            ['array<string>']
        ];
    }

    /**
     * @return array[]
     * @throws ValueException
     * @throws TypeException
     */
    public function getParseSuccessfullyTestData(): array
    {
        return [
            ['array<string,int>', new ArrayType(new IntegerType(), new StringType())],
            ["  \narray\n   \t <string , \t" . TestEntity::class . "\t\n \n\r>", new ArrayType(new ClassType(new ClassName(TestEntity::class)), new StringType())],
            ['array<string, string>', new ArrayType(new StringType(), new StringType())],
            ['array<int, stdClass>', new ArrayType(new ClassType(new ClassName(stdClass::class)), new IntegerType())]
        ];
    }
}
