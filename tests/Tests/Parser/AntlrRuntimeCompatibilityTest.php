<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2026 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\TestSuite\Tests\Parser;

use Antlr\Antlr4\Runtime\RuntimeMetaData;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\MultiType;
use Jojo1981\PhpTypes\Parser\Parser;
use Jojo1981\PhpTypes\StringType;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use function explode;
use function implode;
use function array_slice;
use function restore_error_handler;
use function set_error_handler;
use const E_USER_WARNING;

/**
 * Guards the compatibility between the installed antlr/antlr4-php-runtime version (^0.9 || ^0.10) and the
 * parser code in src/Parser/Parser which has been generated with ANTLR 4.13.1.
 *
 * @package Jojo1981\PhpTypes\TestSuite\Tests\Parser
 */
final class AntlrRuntimeCompatibilityTest extends TestCase
{
    /**
     * The ANTLR tool version which has been used to generate the parser code in src/Parser/Parser.
     */
    private const GENERATED_WITH_ANTLR_VERSION = '4.13.1';

    /**
     * The installed runtime must have the same major.minor version as the ANTLR tool which has been used to
     * generate the parser code, otherwise RuntimeMetaData::checkVersion will trigger an E_USER_WARNING.
     * When this test fails the parser code needs to be regenerated from resources/Expression.g4.
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testInstalledRuntimeVersionMatchesGeneratedParserCode(): void
    {
        self::assertSame(
            $this->getMajorMinorVersion(self::GENERATED_WITH_ANTLR_VERSION),
            $this->getMajorMinorVersion(RuntimeMetaData::getRuntimeVersion()),
            'The installed antlr/antlr4-php-runtime version is not compatible with the generated parser code.'
            . ' Regenerate the parser code in src/Parser/Parser from resources/Expression.g4.'
        );
    }

    /**
     * @return void
     * @throws TypeException
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testParsingDoesNotTriggerRuntimeVersionWarnings(): void
    {
        $triggeredWarnings = [];
        set_error_handler(
            static function (int $errorNumber, string $errorMessage) use (&$triggeredWarnings): bool {
                $triggeredWarnings[] = $errorMessage;

                return true;
            },
            E_USER_WARNING
        );

        try {
            $type = (new Parser())->parse('int|string');
        } finally {
            restore_error_handler();
        }

        self::assertEquals(new MultiType([new IntegerType(), new StringType()]), $type);
        self::assertSame([], $triggeredWarnings);
    }

    /**
     * @param string $version
     * @return string
     */
    private function getMajorMinorVersion(string $version): string
    {
        return implode('.', array_slice(explode('.', $version), 0, 2));
    }
}
