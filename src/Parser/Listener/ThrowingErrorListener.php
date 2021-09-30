<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2021 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\Parser\Listener;

use Antlr\Antlr4\Runtime\Error\Exceptions\ParseCancellationException;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;

/**
 * @internal
 * @package Jojo1981\PhpTypes\Parser\Listener
 */
class ThrowingErrorListener extends BaseErrorListener
{
    /**
     * @param Recognizer $recognizer
     * @param object|null $offendingSymbol
     * @param int $line
     * @param int $charPositionInLine
     * @param string $msg
     * @param RecognitionException|null $e
     * @return void
     * @throws ParseCancellationException
     */
    public function syntaxError(
        Recognizer $recognizer,
        ?object $offendingSymbol,
        int $line,
        int $charPositionInLine,
        string $msg,
        ?RecognitionException $e
    ): void {
        throw new ParseCancellationException('line ' . $line . ':' . $charPositionInLine . ' ' . $msg);
    }
}
