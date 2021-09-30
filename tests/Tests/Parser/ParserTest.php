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

use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Jojo1981\PhpTypes\ArrayType;
use Jojo1981\PhpTypes\BooleanType;
use Jojo1981\PhpTypes\CallableType;
use Jojo1981\PhpTypes\ClassType;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\Parser\Parser;
use Jojo1981\PhpTypes\FloatType;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\IterableType;
use Jojo1981\PhpTypes\MixedType;
use Jojo1981\PhpTypes\MultiType;
use Jojo1981\PhpTypes\NullType;
use Jojo1981\PhpTypes\ObjectType;
use Jojo1981\PhpTypes\ResourceType;
use Jojo1981\PhpTypes\StringType;
use Jojo1981\PhpTypes\TestSuite\Fixture\TestEntity;
use Jojo1981\PhpTypes\TypeInterface;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use Jojo1981\PhpTypes\VoidType;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
 * @package Jojo1981\PhpTypes\TestSuite\Tests\Parser
 */
final class ParserTest extends TestCase
{
    /**
     * @return void
     * @throws InvalidArgumentException
     * @throws RecognitionException
     * @throws RuntimeException
     * @throws TypeException
     * @throws ValueException
     * @throws ExpectationFailedException
     */
    public function testParserCanNotHaveLeakingState(): void
    {
        $parser = new Parser();
        self::assertEquals(new ArrayType(), $parser->parse('array'));
        self::assertEquals(new ArrayType(new ClassType(new ClassName(TestEntity::class))), $parser->parse('array<\\' . TestEntity::class . '>'));
    }

    /**
     * @dataProvider getTestParseTestData
     *
     * @param string $expression
     * @param TypeInterface $expectedType
     * @return void
     * @throws InvalidArgumentException
     * @throws RecognitionException
     * @throws RuntimeException
     * @throws ExpectationFailedException
     */
    public function testParse(string $expression, TypeInterface $expectedType): void
    {
        self::assertEquals($expectedType, (new Parser())->parse($expression));
    }

    /**
     * @return array[]
     * @throws ValueException
     * @throws TypeException
     */
    public function getTestParseTestData(): array
    {
        return [
            ['array', new ArrayType()],
            ['integer', new IntegerType()],
            ['int', new IntegerType()],
            ['string', new StringType()],
            ['boolean', new BooleanType()],
            ['bool', new BooleanType()],
            ['float', new FloatType()],
            ['resource', new ResourceType()],
            ['mixed', new MixedType()],
            ['void', new VoidType()],
            ['callable', new CallableType()],
            ['object', new ObjectType()],
            ['iterable', new IterableType()],
            ['null', new NullType()],
            ['array[]', new ArrayType(new ArrayType())],
            ['integer[]', new ArrayType(new IntegerType())],
            ['int[]', new ArrayType(new IntegerType())],
            ['string[]', new ArrayType(new StringType())],
            ['boolean[]', new ArrayType(new BooleanType())],
            ['bool[]', new ArrayType(new BooleanType())],
            ['float[]', new ArrayType(new FloatType())],
            ['resource[]', new ArrayType(new ResourceType())],
            ['mixed[]', new ArrayType(new MixedType())],
            ['callable[]', new ArrayType(new CallableType())],
            ['object[]', new ArrayType(new ObjectType())],
            ['iterable[]', new ArrayType(new IterableType())],
            ['null[]', new ArrayType(new NullType())],
            [TestEntity::class, new ClassType(new ClassName(TestEntity::class))],
            ['int|string', new MultiType([new IntegerType(), new StringType()])],
            ['string|string[]', new MultiType([new StringType(), new ArrayType(new StringType())])],
            ['array<int, string>', new ArrayType(new StringType(), new IntegerType())],
            ['array<string,int>', new ArrayType(new IntegerType(), new StringType())],
            ['array<\\' . TestEntity::class . '>', new ArrayType(new ClassType(new ClassName(TestEntity::class)))]
        ];
    }
}
