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

use Jojo1981\PhpTypes\BooleanType;
use Jojo1981\PhpTypes\ClassType;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\MultiType;
use Jojo1981\PhpTypes\Parser\MultiTypeParser;
use Jojo1981\PhpTypes\StringType;
use Jojo1981\PhpTypes\TestSuite\Fixture\InterfaceTestEntity;
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
final class MultiTypeParserTest extends TestCase
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
        $this->expectExceptionObject(new RuntimeException('Invalid multi type string'));
        MultiTypeParser::parse($text);
    }

    /**
     * @dataProvider getParseSuccessfullyTestData
     *
     * @param string $text
     * @param MultiType $expectedType
     * @return void
     * @throws ExpectationFailedException
     * @throws RuntimeException
     * @throws InvalidArgumentException
     * @throws TypeException
     */
    public function testParseSuccessfully(string $text, MultiType $expectedType): void
    {
        self::assertEquals($expectedType, MultiTypeParser::parse($text));
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
            ['array<string>'],
            ['string'],
            ['int'],
            ['integer']
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
            ['string | int', new MultiType([new StringType(), new IntegerType()])],
            ["int\n|| string \t| bool\n", new MultiType([new IntegerType(), new StringType(), new BooleanType()])],
            ['int|string|stdClass', new MultiType([new IntegerType(), new StringType(), new ClassType(new ClassName(stdClass::class))])],
            ['Jojo1981\PhpTypes\TestSuite\Fixture\InterfaceTestEntity|bool', new MultiType([new ClassType(new ClassName(InterfaceTestEntity::class)), new BooleanType()])]
        ];
    }
}
