<?php

/*
 * Generated from ./resources/Expression.g4 by ANTLR 4.11.1
 */

namespace Jojo1981\PhpTypes\Parser\Parser {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class ExpressionParser extends Parser
	{
		public const T__0 = 1, TYPE_ARRAY = 2, TYPE_INTEGER = 3, TYPE_INT = 4, 
               TYPE_STRING = 5, TYPE_TEXT = 6, TYPE_BOOLEAN = 7, TYPE_BOOL = 8, 
               TYPE_NUMBER = 9, TYPE_REAL = 10, TYPE_DOUBLE = 11, TYPE_FLOAT = 12, 
               TYPE_RESOURCE = 13, TYPE_MIXED = 14, TYPE_VOID = 15, TYPE_CALLABLE = 16, 
               TYPE_CALLBACK = 17, TYPE_OBJECT = 18, TYPE_ITERABLE = 19, 
               TYPE_NULL = 20, PIPE = 21, COMMA = 22, CURLY_BRACKET_OPEN = 23, 
               CURLY_BRACKET_CLOSE = 24, SQUARE_BRACKET_OPEN = 25, SQUARE_BRACKET_CLOSE = 26, 
               ANGLE_BRACKET_OPEN = 27, ANGLE_BRACKET_CLOSE = 28, IDENTIFIER = 29, 
               WS = 30;

		public const RULE_expression = 0, RULE_type = 1, RULE_arrayType = 2, RULE_indexedArrayType = 3, 
               RULE_typedArrayType = 4, RULE_basicArrayType = 5, RULE_tupleArrayType = 6, 
               RULE_tupleArrayTypeElements = 7, RULE_arrayKeyType = 8, RULE_arrayValueType = 9, 
               RULE_listType = 10, RULE_multiType = 11, RULE_classType = 12, 
               RULE_basicType = 13, RULE_integerType = 14, RULE_stringType = 15, 
               RULE_booleanType = 16, RULE_floatType = 17, RULE_resourceType = 18, 
               RULE_mixedType = 19, RULE_voidType = 20, RULE_callableType = 21, 
               RULE_objectType = 22, RULE_iterableType = 23, RULE_nullType = 24;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'expression', 'type', 'arrayType', 'indexedArrayType', 'typedArrayType', 
			'basicArrayType', 'tupleArrayType', 'tupleArrayTypeElements', 'arrayKeyType', 
			'arrayValueType', 'listType', 'multiType', 'classType', 'basicType', 
			'integerType', 'stringType', 'booleanType', 'floatType', 'resourceType', 
			'mixedType', 'voidType', 'callableType', 'objectType', 'iterableType', 
			'nullType'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'\\'", null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, "'|'", 
		    "','", "'{'", "'}'", "'['", "']'", "'<'", "'>'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, "TYPE_ARRAY", "TYPE_INTEGER", "TYPE_INT", "TYPE_STRING", 
		    "TYPE_TEXT", "TYPE_BOOLEAN", "TYPE_BOOL", "TYPE_NUMBER", "TYPE_REAL", 
		    "TYPE_DOUBLE", "TYPE_FLOAT", "TYPE_RESOURCE", "TYPE_MIXED", "TYPE_VOID", 
		    "TYPE_CALLABLE", "TYPE_CALLBACK", "TYPE_OBJECT", "TYPE_ITERABLE", 
		    "TYPE_NULL", "PIPE", "COMMA", "CURLY_BRACKET_OPEN", "CURLY_BRACKET_CLOSE", 
		    "SQUARE_BRACKET_OPEN", "SQUARE_BRACKET_CLOSE", "ANGLE_BRACKET_OPEN", 
		    "ANGLE_BRACKET_CLOSE", "IDENTIFIER", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 30, 164, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 1, 0, 1, 0, 3, 0, 53, 8, 0, 1, 1, 1, 1, 1, 1, 1, 1, 3, 
		    1, 59, 8, 1, 1, 2, 1, 2, 1, 2, 1, 2, 3, 2, 65, 8, 2, 1, 3, 1, 3, 1, 
		    3, 1, 3, 1, 3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 5, 1, 
		    5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 5, 
		    7, 91, 8, 7, 10, 7, 12, 7, 94, 9, 7, 1, 8, 1, 8, 1, 9, 1, 9, 1, 10, 
		    1, 10, 1, 10, 3, 10, 103, 8, 10, 1, 10, 1, 10, 1, 10, 1, 11, 1, 11, 
		    1, 11, 1, 11, 1, 11, 5, 11, 113, 8, 11, 10, 11, 12, 11, 116, 9, 11, 
		    1, 12, 3, 12, 119, 8, 12, 1, 12, 1, 12, 1, 12, 5, 12, 124, 8, 12, 
		    10, 12, 12, 12, 127, 9, 12, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 
		    13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 3, 13, 140, 8, 13, 1, 14, 1, 
		    14, 1, 15, 1, 15, 1, 16, 1, 16, 1, 17, 1, 17, 1, 18, 1, 18, 1, 19, 
		    1, 19, 1, 20, 1, 20, 1, 21, 1, 21, 1, 22, 1, 22, 1, 23, 1, 23, 1, 
		    24, 1, 24, 1, 24, 0, 0, 25, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 
		    22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 0, 5, 1, 0, 
		    3, 4, 1, 0, 5, 6, 1, 0, 7, 8, 1, 0, 9, 12, 1, 0, 16, 17, 161, 0, 52, 
		    1, 0, 0, 0, 2, 58, 1, 0, 0, 0, 4, 64, 1, 0, 0, 0, 6, 66, 1, 0, 0, 
		    0, 8, 71, 1, 0, 0, 0, 10, 78, 1, 0, 0, 0, 12, 80, 1, 0, 0, 0, 14, 
		    85, 1, 0, 0, 0, 16, 95, 1, 0, 0, 0, 18, 97, 1, 0, 0, 0, 20, 102, 1, 
		    0, 0, 0, 22, 107, 1, 0, 0, 0, 24, 118, 1, 0, 0, 0, 26, 139, 1, 0, 
		    0, 0, 28, 141, 1, 0, 0, 0, 30, 143, 1, 0, 0, 0, 32, 145, 1, 0, 0, 
		    0, 34, 147, 1, 0, 0, 0, 36, 149, 1, 0, 0, 0, 38, 151, 1, 0, 0, 0, 
		    40, 153, 1, 0, 0, 0, 42, 155, 1, 0, 0, 0, 44, 157, 1, 0, 0, 0, 46, 
		    159, 1, 0, 0, 0, 48, 161, 1, 0, 0, 0, 50, 53, 3, 22, 11, 0, 51, 53, 
		    3, 2, 1, 0, 52, 50, 1, 0, 0, 0, 52, 51, 1, 0, 0, 0, 53, 1, 1, 0, 0, 
		    0, 54, 59, 3, 4, 2, 0, 55, 59, 3, 20, 10, 0, 56, 59, 3, 26, 13, 0, 
		    57, 59, 3, 24, 12, 0, 58, 54, 1, 0, 0, 0, 58, 55, 1, 0, 0, 0, 58, 
		    56, 1, 0, 0, 0, 58, 57, 1, 0, 0, 0, 59, 3, 1, 0, 0, 0, 60, 65, 3, 
		    6, 3, 0, 61, 65, 3, 8, 4, 0, 62, 65, 3, 12, 6, 0, 63, 65, 3, 10, 5, 
		    0, 64, 60, 1, 0, 0, 0, 64, 61, 1, 0, 0, 0, 64, 62, 1, 0, 0, 0, 64, 
		    63, 1, 0, 0, 0, 65, 5, 1, 0, 0, 0, 66, 67, 5, 2, 0, 0, 67, 68, 5, 
		    27, 0, 0, 68, 69, 3, 18, 9, 0, 69, 70, 5, 28, 0, 0, 70, 7, 1, 0, 0, 
		    0, 71, 72, 5, 2, 0, 0, 72, 73, 5, 27, 0, 0, 73, 74, 3, 16, 8, 0, 74, 
		    75, 5, 22, 0, 0, 75, 76, 3, 18, 9, 0, 76, 77, 5, 28, 0, 0, 77, 9, 
		    1, 0, 0, 0, 78, 79, 5, 2, 0, 0, 79, 11, 1, 0, 0, 0, 80, 81, 5, 2, 
		    0, 0, 81, 82, 5, 23, 0, 0, 82, 83, 3, 14, 7, 0, 83, 84, 5, 24, 0, 
		    0, 84, 13, 1, 0, 0, 0, 85, 86, 3, 0, 0, 0, 86, 87, 5, 22, 0, 0, 87, 
		    92, 3, 0, 0, 0, 88, 89, 5, 22, 0, 0, 89, 91, 3, 0, 0, 0, 90, 88, 1, 
		    0, 0, 0, 91, 94, 1, 0, 0, 0, 92, 90, 1, 0, 0, 0, 92, 93, 1, 0, 0, 
		    0, 93, 15, 1, 0, 0, 0, 94, 92, 1, 0, 0, 0, 95, 96, 3, 0, 0, 0, 96, 
		    17, 1, 0, 0, 0, 97, 98, 3, 0, 0, 0, 98, 19, 1, 0, 0, 0, 99, 103, 3, 
		    26, 13, 0, 100, 103, 3, 24, 12, 0, 101, 103, 3, 10, 5, 0, 102, 99, 
		    1, 0, 0, 0, 102, 100, 1, 0, 0, 0, 102, 101, 1, 0, 0, 0, 103, 104, 
		    1, 0, 0, 0, 104, 105, 5, 25, 0, 0, 105, 106, 5, 26, 0, 0, 106, 21, 
		    1, 0, 0, 0, 107, 108, 3, 2, 1, 0, 108, 109, 5, 21, 0, 0, 109, 114, 
		    3, 2, 1, 0, 110, 111, 5, 21, 0, 0, 111, 113, 3, 2, 1, 0, 112, 110, 
		    1, 0, 0, 0, 113, 116, 1, 0, 0, 0, 114, 112, 1, 0, 0, 0, 114, 115, 
		    1, 0, 0, 0, 115, 23, 1, 0, 0, 0, 116, 114, 1, 0, 0, 0, 117, 119, 5, 
		    1, 0, 0, 118, 117, 1, 0, 0, 0, 118, 119, 1, 0, 0, 0, 119, 120, 1, 
		    0, 0, 0, 120, 125, 5, 29, 0, 0, 121, 122, 5, 1, 0, 0, 122, 124, 5, 
		    29, 0, 0, 123, 121, 1, 0, 0, 0, 124, 127, 1, 0, 0, 0, 125, 123, 1, 
		    0, 0, 0, 125, 126, 1, 0, 0, 0, 126, 25, 1, 0, 0, 0, 127, 125, 1, 0, 
		    0, 0, 128, 140, 3, 28, 14, 0, 129, 140, 3, 30, 15, 0, 130, 140, 3, 
		    32, 16, 0, 131, 140, 3, 34, 17, 0, 132, 140, 3, 36, 18, 0, 133, 140, 
		    3, 38, 19, 0, 134, 140, 3, 40, 20, 0, 135, 140, 3, 42, 21, 0, 136, 
		    140, 3, 44, 22, 0, 137, 140, 3, 46, 23, 0, 138, 140, 3, 48, 24, 0, 
		    139, 128, 1, 0, 0, 0, 139, 129, 1, 0, 0, 0, 139, 130, 1, 0, 0, 0, 
		    139, 131, 1, 0, 0, 0, 139, 132, 1, 0, 0, 0, 139, 133, 1, 0, 0, 0, 
		    139, 134, 1, 0, 0, 0, 139, 135, 1, 0, 0, 0, 139, 136, 1, 0, 0, 0, 
		    139, 137, 1, 0, 0, 0, 139, 138, 1, 0, 0, 0, 140, 27, 1, 0, 0, 0, 141, 
		    142, 7, 0, 0, 0, 142, 29, 1, 0, 0, 0, 143, 144, 7, 1, 0, 0, 144, 31, 
		    1, 0, 0, 0, 145, 146, 7, 2, 0, 0, 146, 33, 1, 0, 0, 0, 147, 148, 7, 
		    3, 0, 0, 148, 35, 1, 0, 0, 0, 149, 150, 5, 13, 0, 0, 150, 37, 1, 0, 
		    0, 0, 151, 152, 5, 14, 0, 0, 152, 39, 1, 0, 0, 0, 153, 154, 5, 15, 
		    0, 0, 154, 41, 1, 0, 0, 0, 155, 156, 7, 4, 0, 0, 156, 43, 1, 0, 0, 
		    0, 157, 158, 5, 18, 0, 0, 158, 45, 1, 0, 0, 0, 159, 160, 5, 19, 0, 
		    0, 160, 47, 1, 0, 0, 0, 161, 162, 5, 20, 0, 0, 162, 49, 1, 0, 0, 0, 
		    9, 52, 58, 64, 92, 102, 114, 118, 125, 139];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.11.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Expression.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function expression(): Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_expression);

		    try {
		        $this->setState(52);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(50);
		        	    $this->multiType();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(51);
		        	    $this->type();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function type(): Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_type);

		    try {
		        $this->setState(58);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(54);
		        	    $this->arrayType();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(55);
		        	    $this->listType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(56);
		        	    $this->basicType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(57);
		        	    $this->classType();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayType(): Context\ArrayTypeContext
		{
		    $localContext = new Context\ArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_arrayType);

		    try {
		        $this->setState(64);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(60);
		        	    $this->indexedArrayType();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(61);
		        	    $this->typedArrayType();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(62);
		        	    $this->tupleArrayType();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(63);
		        	    $this->basicArrayType();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function indexedArrayType(): Context\IndexedArrayTypeContext
		{
		    $localContext = new Context\IndexedArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_indexedArrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(66);
		        $this->match(self::TYPE_ARRAY);
		        $this->setState(67);
		        $this->match(self::ANGLE_BRACKET_OPEN);
		        $this->setState(68);
		        $this->arrayValueType();
		        $this->setState(69);
		        $this->match(self::ANGLE_BRACKET_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function typedArrayType(): Context\TypedArrayTypeContext
		{
		    $localContext = new Context\TypedArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_typedArrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(71);
		        $this->match(self::TYPE_ARRAY);
		        $this->setState(72);
		        $this->match(self::ANGLE_BRACKET_OPEN);
		        $this->setState(73);
		        $this->arrayKeyType();
		        $this->setState(74);
		        $this->match(self::COMMA);
		        $this->setState(75);
		        $this->arrayValueType();
		        $this->setState(76);
		        $this->match(self::ANGLE_BRACKET_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function basicArrayType(): Context\BasicArrayTypeContext
		{
		    $localContext = new Context\BasicArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_basicArrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(78);
		        $this->match(self::TYPE_ARRAY);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function tupleArrayType(): Context\TupleArrayTypeContext
		{
		    $localContext = new Context\TupleArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_tupleArrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(80);
		        $this->match(self::TYPE_ARRAY);
		        $this->setState(81);
		        $this->match(self::CURLY_BRACKET_OPEN);
		        $this->setState(82);
		        $this->tupleArrayTypeElements();
		        $this->setState(83);
		        $this->match(self::CURLY_BRACKET_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function tupleArrayTypeElements(): Context\TupleArrayTypeElementsContext
		{
		    $localContext = new Context\TupleArrayTypeElementsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_tupleArrayTypeElements);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(85);
		        $this->expression();
		        $this->setState(86);
		        $this->match(self::COMMA);
		        $this->setState(87);
		        $this->expression();
		        $this->setState(92);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(88);
		        	$this->match(self::COMMA);
		        	$this->setState(89);
		        	$this->expression();
		        	$this->setState(94);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayKeyType(): Context\ArrayKeyTypeContext
		{
		    $localContext = new Context\ArrayKeyTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_arrayKeyType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(95);
		        $this->expression();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayValueType(): Context\ArrayValueTypeContext
		{
		    $localContext = new Context\ArrayValueTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_arrayValueType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(97);
		        $this->expression();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function listType(): Context\ListTypeContext
		{
		    $localContext = new Context\ListTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_listType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(102);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::TYPE_INTEGER:
		            case self::TYPE_INT:
		            case self::TYPE_STRING:
		            case self::TYPE_TEXT:
		            case self::TYPE_BOOLEAN:
		            case self::TYPE_BOOL:
		            case self::TYPE_NUMBER:
		            case self::TYPE_REAL:
		            case self::TYPE_DOUBLE:
		            case self::TYPE_FLOAT:
		            case self::TYPE_RESOURCE:
		            case self::TYPE_MIXED:
		            case self::TYPE_VOID:
		            case self::TYPE_CALLABLE:
		            case self::TYPE_CALLBACK:
		            case self::TYPE_OBJECT:
		            case self::TYPE_ITERABLE:
		            case self::TYPE_NULL:
		            	$this->setState(99);
		            	$this->basicType();
		            	break;

		            case self::T__0:
		            case self::IDENTIFIER:
		            	$this->setState(100);
		            	$this->classType();
		            	break;

		            case self::TYPE_ARRAY:
		            	$this->setState(101);
		            	$this->basicArrayType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		        $this->setState(104);
		        $this->match(self::SQUARE_BRACKET_OPEN);
		        $this->setState(105);
		        $this->match(self::SQUARE_BRACKET_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function multiType(): Context\MultiTypeContext
		{
		    $localContext = new Context\MultiTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_multiType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(107);
		        $this->type();
		        $this->setState(108);
		        $this->match(self::PIPE);
		        $this->setState(109);
		        $this->type();
		        $this->setState(114);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::PIPE) {
		        	$this->setState(110);
		        	$this->match(self::PIPE);
		        	$this->setState(111);
		        	$this->type();
		        	$this->setState(116);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function classType(): Context\ClassTypeContext
		{
		    $localContext = new Context\ClassTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_classType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(118);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(117);
		        	$this->match(self::T__0);
		        }
		        $this->setState(120);
		        $this->match(self::IDENTIFIER);
		        $this->setState(125);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__0) {
		        	$this->setState(121);
		        	$this->match(self::T__0);
		        	$this->setState(122);
		        	$this->match(self::IDENTIFIER);
		        	$this->setState(127);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function basicType(): Context\BasicTypeContext
		{
		    $localContext = new Context\BasicTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_basicType);

		    try {
		        $this->setState(139);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::TYPE_INTEGER:
		            case self::TYPE_INT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(128);
		            	$this->integerType();
		            	break;

		            case self::TYPE_STRING:
		            case self::TYPE_TEXT:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(129);
		            	$this->stringType();
		            	break;

		            case self::TYPE_BOOLEAN:
		            case self::TYPE_BOOL:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(130);
		            	$this->booleanType();
		            	break;

		            case self::TYPE_NUMBER:
		            case self::TYPE_REAL:
		            case self::TYPE_DOUBLE:
		            case self::TYPE_FLOAT:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(131);
		            	$this->floatType();
		            	break;

		            case self::TYPE_RESOURCE:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(132);
		            	$this->resourceType();
		            	break;

		            case self::TYPE_MIXED:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(133);
		            	$this->mixedType();
		            	break;

		            case self::TYPE_VOID:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(134);
		            	$this->voidType();
		            	break;

		            case self::TYPE_CALLABLE:
		            case self::TYPE_CALLBACK:
		            	$this->enterOuterAlt($localContext, 8);
		            	$this->setState(135);
		            	$this->callableType();
		            	break;

		            case self::TYPE_OBJECT:
		            	$this->enterOuterAlt($localContext, 9);
		            	$this->setState(136);
		            	$this->objectType();
		            	break;

		            case self::TYPE_ITERABLE:
		            	$this->enterOuterAlt($localContext, 10);
		            	$this->setState(137);
		            	$this->iterableType();
		            	break;

		            case self::TYPE_NULL:
		            	$this->enterOuterAlt($localContext, 11);
		            	$this->setState(138);
		            	$this->nullType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function integerType(): Context\IntegerTypeContext
		{
		    $localContext = new Context\IntegerTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_integerType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(141);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::TYPE_INTEGER || $_la === self::TYPE_INT)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function stringType(): Context\StringTypeContext
		{
		    $localContext = new Context\StringTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_stringType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(143);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::TYPE_STRING || $_la === self::TYPE_TEXT)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function booleanType(): Context\BooleanTypeContext
		{
		    $localContext = new Context\BooleanTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_booleanType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(145);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::TYPE_BOOLEAN || $_la === self::TYPE_BOOL)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function floatType(): Context\FloatTypeContext
		{
		    $localContext = new Context\FloatTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_floatType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(147);

		        $_la = $this->input->LA(1);

		        if (!((($_la) & ~0x3f) === 0 && ((1 << $_la) & 7680) !== 0)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function resourceType(): Context\ResourceTypeContext
		{
		    $localContext = new Context\ResourceTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_resourceType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(149);
		        $this->match(self::TYPE_RESOURCE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function mixedType(): Context\MixedTypeContext
		{
		    $localContext = new Context\MixedTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_mixedType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(151);
		        $this->match(self::TYPE_MIXED);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function voidType(): Context\VoidTypeContext
		{
		    $localContext = new Context\VoidTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_voidType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(153);
		        $this->match(self::TYPE_VOID);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function callableType(): Context\CallableTypeContext
		{
		    $localContext = new Context\CallableTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_callableType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(155);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::TYPE_CALLABLE || $_la === self::TYPE_CALLBACK)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function objectType(): Context\ObjectTypeContext
		{
		    $localContext = new Context\ObjectTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_objectType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(157);
		        $this->match(self::TYPE_OBJECT);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function iterableType(): Context\IterableTypeContext
		{
		    $localContext = new Context\IterableTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_iterableType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(159);
		        $this->match(self::TYPE_ITERABLE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function nullType(): Context\NullTypeContext
		{
		    $localContext = new Context\NullTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_nullType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(161);
		        $this->match(self::TYPE_NULL);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}
	}
}

namespace Jojo1981\PhpTypes\Parser\Parser\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use Jojo1981\PhpTypes\Parser\Parser\ExpressionParser;
	use Jojo1981\PhpTypes\Parser\Parser\ExpressionVisitor;
	use Jojo1981\PhpTypes\Parser\Parser\ExpressionListener;

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_expression;
	    }

	    public function multiType(): ?MultiTypeContext
	    {
	    	return $this->getTypedRuleContext(MultiTypeContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_type;
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function listType(): ?ListTypeContext
	    {
	    	return $this->getTypedRuleContext(ListTypeContext::class, 0);
	    }

	    public function basicType(): ?BasicTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicTypeContext::class, 0);
	    }

	    public function classType(): ?ClassTypeContext
	    {
	    	return $this->getTypedRuleContext(ClassTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_arrayType;
	    }

	    public function indexedArrayType(): ?IndexedArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(IndexedArrayTypeContext::class, 0);
	    }

	    public function typedArrayType(): ?TypedArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(TypedArrayTypeContext::class, 0);
	    }

	    public function tupleArrayType(): ?TupleArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(TupleArrayTypeContext::class, 0);
	    }

	    public function basicArrayType(): ?BasicArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IndexedArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_indexedArrayType;
	    }

	    public function TYPE_ARRAY(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

	    public function ANGLE_BRACKET_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_OPEN, 0);
	    }

	    public function arrayValueType(): ?ArrayValueTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayValueTypeContext::class, 0);
	    }

	    public function ANGLE_BRACKET_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterIndexedArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitIndexedArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitIndexedArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypedArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_typedArrayType;
	    }

	    public function TYPE_ARRAY(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

	    public function ANGLE_BRACKET_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_OPEN, 0);
	    }

	    public function arrayKeyType(): ?ArrayKeyTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayKeyTypeContext::class, 0);
	    }

	    public function COMMA(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::COMMA, 0);
	    }

	    public function arrayValueType(): ?ArrayValueTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayValueTypeContext::class, 0);
	    }

	    public function ANGLE_BRACKET_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterTypedArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitTypedArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitTypedArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BasicArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_basicArrayType;
	    }

	    public function TYPE_ARRAY(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterBasicArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitBasicArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitBasicArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TupleArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_tupleArrayType;
	    }

	    public function TYPE_ARRAY(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

	    public function CURLY_BRACKET_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::CURLY_BRACKET_OPEN, 0);
	    }

	    public function tupleArrayTypeElements(): ?TupleArrayTypeElementsContext
	    {
	    	return $this->getTypedRuleContext(TupleArrayTypeElementsContext::class, 0);
	    }

	    public function CURLY_BRACKET_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::CURLY_BRACKET_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterTupleArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitTupleArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitTupleArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TupleArrayTypeElementsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_tupleArrayTypeElements;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(ExpressionParser::COMMA);
	    	}

	        return $this->getToken(ExpressionParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterTupleArrayTypeElements($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitTupleArrayTypeElements($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitTupleArrayTypeElements($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayKeyTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_arrayKeyType;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterArrayKeyType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitArrayKeyType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitArrayKeyType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayValueTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_arrayValueType;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterArrayValueType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitArrayValueType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitArrayValueType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ListTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_listType;
	    }

	    public function SQUARE_BRACKET_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::SQUARE_BRACKET_OPEN, 0);
	    }

	    public function SQUARE_BRACKET_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::SQUARE_BRACKET_CLOSE, 0);
	    }

	    public function basicType(): ?BasicTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicTypeContext::class, 0);
	    }

	    public function classType(): ?ClassTypeContext
	    {
	    	return $this->getTypedRuleContext(ClassTypeContext::class, 0);
	    }

	    public function basicArrayType(): ?BasicArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterListType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitListType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitListType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MultiTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_multiType;
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function PIPE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(ExpressionParser::PIPE);
	    	}

	        return $this->getToken(ExpressionParser::PIPE, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterMultiType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitMultiType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitMultiType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ClassTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_classType;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function IDENTIFIER(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(ExpressionParser::IDENTIFIER);
	    	}

	        return $this->getToken(ExpressionParser::IDENTIFIER, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterClassType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitClassType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitClassType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BasicTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_basicType;
	    }

	    public function integerType(): ?IntegerTypeContext
	    {
	    	return $this->getTypedRuleContext(IntegerTypeContext::class, 0);
	    }

	    public function stringType(): ?StringTypeContext
	    {
	    	return $this->getTypedRuleContext(StringTypeContext::class, 0);
	    }

	    public function booleanType(): ?BooleanTypeContext
	    {
	    	return $this->getTypedRuleContext(BooleanTypeContext::class, 0);
	    }

	    public function floatType(): ?FloatTypeContext
	    {
	    	return $this->getTypedRuleContext(FloatTypeContext::class, 0);
	    }

	    public function resourceType(): ?ResourceTypeContext
	    {
	    	return $this->getTypedRuleContext(ResourceTypeContext::class, 0);
	    }

	    public function mixedType(): ?MixedTypeContext
	    {
	    	return $this->getTypedRuleContext(MixedTypeContext::class, 0);
	    }

	    public function voidType(): ?VoidTypeContext
	    {
	    	return $this->getTypedRuleContext(VoidTypeContext::class, 0);
	    }

	    public function callableType(): ?CallableTypeContext
	    {
	    	return $this->getTypedRuleContext(CallableTypeContext::class, 0);
	    }

	    public function objectType(): ?ObjectTypeContext
	    {
	    	return $this->getTypedRuleContext(ObjectTypeContext::class, 0);
	    }

	    public function iterableType(): ?IterableTypeContext
	    {
	    	return $this->getTypedRuleContext(IterableTypeContext::class, 0);
	    }

	    public function nullType(): ?NullTypeContext
	    {
	    	return $this->getTypedRuleContext(NullTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterBasicType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitBasicType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitBasicType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IntegerTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_integerType;
	    }

	    public function TYPE_INTEGER(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_INTEGER, 0);
	    }

	    public function TYPE_INT(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_INT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterIntegerType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitIntegerType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitIntegerType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StringTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_stringType;
	    }

	    public function TYPE_STRING(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_STRING, 0);
	    }

	    public function TYPE_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_TEXT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterStringType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitStringType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitStringType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BooleanTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_booleanType;
	    }

	    public function TYPE_BOOLEAN(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_BOOLEAN, 0);
	    }

	    public function TYPE_BOOL(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_BOOL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterBooleanType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitBooleanType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitBooleanType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FloatTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_floatType;
	    }

	    public function TYPE_FLOAT(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_FLOAT, 0);
	    }

	    public function TYPE_NUMBER(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_NUMBER, 0);
	    }

	    public function TYPE_REAL(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_REAL, 0);
	    }

	    public function TYPE_DOUBLE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_DOUBLE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterFloatType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitFloatType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitFloatType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ResourceTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_resourceType;
	    }

	    public function TYPE_RESOURCE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_RESOURCE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterResourceType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitResourceType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitResourceType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MixedTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_mixedType;
	    }

	    public function TYPE_MIXED(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_MIXED, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterMixedType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitMixedType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitMixedType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VoidTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_voidType;
	    }

	    public function TYPE_VOID(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_VOID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterVoidType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitVoidType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitVoidType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CallableTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_callableType;
	    }

	    public function TYPE_CALLABLE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_CALLABLE, 0);
	    }

	    public function TYPE_CALLBACK(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_CALLBACK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterCallableType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitCallableType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitCallableType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ObjectTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_objectType;
	    }

	    public function TYPE_OBJECT(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_OBJECT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterObjectType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitObjectType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitObjectType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IterableTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_iterableType;
	    }

	    public function TYPE_ITERABLE(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ITERABLE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterIterableType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitIterableType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitIterableType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class NullTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return ExpressionParser::RULE_nullType;
	    }

	    public function TYPE_NULL(): ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_NULL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterNullType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitNullType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitNullType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}