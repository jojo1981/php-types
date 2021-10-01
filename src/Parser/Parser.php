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

use Antlr\Antlr4\Runtime\CharStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\BailErrorStrategy;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\TokenStream;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\Parser\Listener\ThrowingErrorListener;
use Jojo1981\PhpTypes\Parser\Parser\ExpressionLexer;
use Jojo1981\PhpTypes\Parser\Parser\ExpressionParser;
use Jojo1981\PhpTypes\Parser\Visitor\CreateTypeVisitor;
use Jojo1981\PhpTypes\TypeInterface;
use RuntimeException;
use Throwable;
use function sprintf;

/**
 * @internal
 * @package Jojo1981\PhpTypes\Parser
 */
final class Parser
{
    /** @var ExpressionLexer|null */
    private ?ExpressionLexer $lexer = null;

    /** @var ExpressionParser|null */
    private ?ExpressionParser $parser = null;

    /**
     * @param string $expression
     * @return TypeInterface
     * @throws TypeException
     */
    public function parse(string $expression): TypeInterface
    {
        try {
            $lexer = $this->getLexer(InputStream::fromString($expression));
            $parser = $this->getParser(new CommonTokenStream($lexer));
            $cst = $parser->expression();

            return $cst->accept(new CreateTypeVisitor());
        } catch (Throwable $exception) {
            throw new TypeException(sprintf('Could not parse expression: `%s`. %s', $expression, $exception->getMessage()));
        }
    }

    /**
     * @param CharStream $inputStream
     * @return ExpressionLexer
     * @throws RuntimeException
     */
    private function getLexer(CharStream $inputStream): ExpressionLexer
    {
        if (null === $this->lexer) {
            $this->lexer = new ExpressionLexer($inputStream);
            $this->lexer->removeErrorListeners();
            $this->lexer->addErrorListener(new ThrowingErrorListener());
        } else {
            $this->lexer->setInputStream($inputStream);
        }

        return $this->lexer;
    }

    /**
     * @param TokenStream $stream
     * @return ExpressionParser
     * @throws RuntimeException
     */
    private function getParser(TokenStream $stream): ExpressionParser
    {
        if (null === $this->parser) {
            $this->parser = new ExpressionParser($stream);
            $this->parser->setErrorHandler(new BailErrorStrategy());
            $this->parser->removeErrorListeners();
            $this->parser->addErrorListener(new ThrowingErrorListener());
        } else {
            $this->parser->setInputStream($stream);
        }

        return $this->parser;
    }
}
