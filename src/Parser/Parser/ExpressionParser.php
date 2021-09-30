<?php

/*
 * Generated from ./resources/Expression.g4 by ANTLR 4.9.2
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

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{20}\u{A6}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{4}\u{7}\u{9}" .
		    "\u{7}\u{4}\u{8}\u{9}\u{8}\u{4}\u{9}\u{9}\u{9}\u{4}\u{A}\u{9}\u{A}" .
		    "\u{4}\u{B}\u{9}\u{B}\u{4}\u{C}\u{9}\u{C}\u{4}\u{D}\u{9}\u{D}\u{4}" .
		    "\u{E}\u{9}\u{E}\u{4}\u{F}\u{9}\u{F}\u{4}\u{10}\u{9}\u{10}\u{4}\u{11}" .
		    "\u{9}\u{11}\u{4}\u{12}\u{9}\u{12}\u{4}\u{13}\u{9}\u{13}\u{4}\u{14}" .
		    "\u{9}\u{14}\u{4}\u{15}\u{9}\u{15}\u{4}\u{16}\u{9}\u{16}\u{4}\u{17}" .
		    "\u{9}\u{17}\u{4}\u{18}\u{9}\u{18}\u{4}\u{19}\u{9}\u{19}\u{4}\u{1A}" .
		    "\u{9}\u{1A}\u{3}\u{2}\u{3}\u{2}\u{5}\u{2}\u{37}\u{A}\u{2}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{5}\u{3}\u{3D}\u{A}\u{3}\u{3}\u{4}" .
		    "\u{3}\u{4}\u{3}\u{4}\u{3}\u{4}\u{5}\u{4}\u{43}\u{A}\u{4}\u{3}\u{5}" .
		    "\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{6}\u{3}\u{6}\u{3}" .
		    "\u{6}\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{3}\u{7}\u{3}\u{7}" .
		    "\u{3}\u{8}\u{3}\u{8}\u{3}\u{8}\u{3}\u{8}\u{3}\u{8}\u{3}\u{9}\u{3}" .
		    "\u{9}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}\u{7}\u{9}\u{5D}\u{A}\u{9}\u{C}" .
		    "\u{9}\u{E}\u{9}\u{60}\u{B}\u{9}\u{3}\u{A}\u{3}\u{A}\u{3}\u{B}\u{3}" .
		    "\u{B}\u{3}\u{C}\u{3}\u{C}\u{3}\u{C}\u{5}\u{C}\u{69}\u{A}\u{C}\u{3}" .
		    "\u{C}\u{3}\u{C}\u{3}\u{C}\u{3}\u{D}\u{3}\u{D}\u{3}\u{D}\u{3}\u{D}" .
		    "\u{3}\u{D}\u{7}\u{D}\u{73}\u{A}\u{D}\u{C}\u{D}\u{E}\u{D}\u{76}\u{B}" .
		    "\u{D}\u{3}\u{E}\u{5}\u{E}\u{79}\u{A}\u{E}\u{3}\u{E}\u{3}\u{E}\u{3}" .
		    "\u{E}\u{7}\u{E}\u{7E}\u{A}\u{E}\u{C}\u{E}\u{E}\u{E}\u{81}\u{B}\u{E}" .
		    "\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}" .
		    "\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{3}\u{F}\u{5}\u{F}\u{8E}\u{A}" .
		    "\u{F}\u{3}\u{10}\u{3}\u{10}\u{3}\u{11}\u{3}\u{11}\u{3}\u{12}\u{3}" .
		    "\u{12}\u{3}\u{13}\u{3}\u{13}\u{3}\u{14}\u{3}\u{14}\u{3}\u{15}\u{3}" .
		    "\u{15}\u{3}\u{16}\u{3}\u{16}\u{3}\u{17}\u{3}\u{17}\u{3}\u{18}\u{3}" .
		    "\u{18}\u{3}\u{19}\u{3}\u{19}\u{3}\u{1A}\u{3}\u{1A}\u{3}\u{1A}\u{2}" .
		    "\u{2}\u{1B}\u{2}\u{4}\u{6}\u{8}\u{A}\u{C}\u{E}\u{10}\u{12}\u{14}\u{16}" .
		    "\u{18}\u{1A}\u{1C}\u{1E}\u{20}\u{22}\u{24}\u{26}\u{28}\u{2A}\u{2C}" .
		    "\u{2E}\u{30}\u{32}\u{2}\u{7}\u{3}\u{2}\u{5}\u{6}\u{3}\u{2}\u{7}\u{8}" .
		    "\u{3}\u{2}\u{9}\u{A}\u{3}\u{2}\u{B}\u{E}\u{3}\u{2}\u{12}\u{13}\u{2}" .
		    "\u{A3}\u{2}\u{36}\u{3}\u{2}\u{2}\u{2}\u{4}\u{3C}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{6}\u{42}\u{3}\u{2}\u{2}\u{2}\u{8}\u{44}\u{3}\u{2}\u{2}\u{2}\u{A}" .
		    "\u{49}\u{3}\u{2}\u{2}\u{2}\u{C}\u{50}\u{3}\u{2}\u{2}\u{2}\u{E}\u{52}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{10}\u{57}\u{3}\u{2}\u{2}\u{2}\u{12}\u{61}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{14}\u{63}\u{3}\u{2}\u{2}\u{2}\u{16}\u{68}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{18}\u{6D}\u{3}\u{2}\u{2}\u{2}\u{1A}\u{78}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{1C}\u{8D}\u{3}\u{2}\u{2}\u{2}\u{1E}\u{8F}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{20}\u{91}\u{3}\u{2}\u{2}\u{2}\u{22}\u{93}\u{3}\u{2}\u{2}\u{2}\u{24}" .
		    "\u{95}\u{3}\u{2}\u{2}\u{2}\u{26}\u{97}\u{3}\u{2}\u{2}\u{2}\u{28}\u{99}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{2A}\u{9B}\u{3}\u{2}\u{2}\u{2}\u{2C}\u{9D}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{2E}\u{9F}\u{3}\u{2}\u{2}\u{2}\u{30}\u{A1}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{32}\u{A3}\u{3}\u{2}\u{2}\u{2}\u{34}\u{37}\u{5}\u{18}" .
		    "\u{D}\u{2}\u{35}\u{37}\u{5}\u{4}\u{3}\u{2}\u{36}\u{34}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{36}\u{35}\u{3}\u{2}\u{2}\u{2}\u{37}\u{3}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{38}\u{3D}\u{5}\u{6}\u{4}\u{2}\u{39}\u{3D}\u{5}\u{16}\u{C}\u{2}" .
		    "\u{3A}\u{3D}\u{5}\u{1C}\u{F}\u{2}\u{3B}\u{3D}\u{5}\u{1A}\u{E}\u{2}" .
		    "\u{3C}\u{38}\u{3}\u{2}\u{2}\u{2}\u{3C}\u{39}\u{3}\u{2}\u{2}\u{2}\u{3C}" .
		    "\u{3A}\u{3}\u{2}\u{2}\u{2}\u{3C}\u{3B}\u{3}\u{2}\u{2}\u{2}\u{3D}\u{5}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{3E}\u{43}\u{5}\u{8}\u{5}\u{2}\u{3F}\u{43}\u{5}" .
		    "\u{A}\u{6}\u{2}\u{40}\u{43}\u{5}\u{E}\u{8}\u{2}\u{41}\u{43}\u{5}\u{C}" .
		    "\u{7}\u{2}\u{42}\u{3E}\u{3}\u{2}\u{2}\u{2}\u{42}\u{3F}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{42}\u{40}\u{3}\u{2}\u{2}\u{2}\u{42}\u{41}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{43}\u{7}\u{3}\u{2}\u{2}\u{2}\u{44}\u{45}\u{7}\u{4}\u{2}\u{2}\u{45}" .
		    "\u{46}\u{7}\u{1D}\u{2}\u{2}\u{46}\u{47}\u{5}\u{14}\u{B}\u{2}\u{47}" .
		    "\u{48}\u{7}\u{1E}\u{2}\u{2}\u{48}\u{9}\u{3}\u{2}\u{2}\u{2}\u{49}\u{4A}" .
		    "\u{7}\u{4}\u{2}\u{2}\u{4A}\u{4B}\u{7}\u{1D}\u{2}\u{2}\u{4B}\u{4C}" .
		    "\u{5}\u{12}\u{A}\u{2}\u{4C}\u{4D}\u{7}\u{18}\u{2}\u{2}\u{4D}\u{4E}" .
		    "\u{5}\u{14}\u{B}\u{2}\u{4E}\u{4F}\u{7}\u{1E}\u{2}\u{2}\u{4F}\u{B}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{50}\u{51}\u{7}\u{4}\u{2}\u{2}\u{51}\u{D}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{52}\u{53}\u{7}\u{4}\u{2}\u{2}\u{53}\u{54}\u{7}\u{19}" .
		    "\u{2}\u{2}\u{54}\u{55}\u{5}\u{10}\u{9}\u{2}\u{55}\u{56}\u{7}\u{1A}" .
		    "\u{2}\u{2}\u{56}\u{F}\u{3}\u{2}\u{2}\u{2}\u{57}\u{58}\u{5}\u{2}\u{2}" .
		    "\u{2}\u{58}\u{59}\u{7}\u{18}\u{2}\u{2}\u{59}\u{5E}\u{5}\u{2}\u{2}" .
		    "\u{2}\u{5A}\u{5B}\u{7}\u{18}\u{2}\u{2}\u{5B}\u{5D}\u{5}\u{2}\u{2}" .
		    "\u{2}\u{5C}\u{5A}\u{3}\u{2}\u{2}\u{2}\u{5D}\u{60}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{5E}\u{5C}\u{3}\u{2}\u{2}\u{2}\u{5E}\u{5F}\u{3}\u{2}\u{2}\u{2}\u{5F}" .
		    "\u{11}\u{3}\u{2}\u{2}\u{2}\u{60}\u{5E}\u{3}\u{2}\u{2}\u{2}\u{61}\u{62}" .
		    "\u{5}\u{2}\u{2}\u{2}\u{62}\u{13}\u{3}\u{2}\u{2}\u{2}\u{63}\u{64}\u{5}" .
		    "\u{2}\u{2}\u{2}\u{64}\u{15}\u{3}\u{2}\u{2}\u{2}\u{65}\u{69}\u{5}\u{1C}" .
		    "\u{F}\u{2}\u{66}\u{69}\u{5}\u{1A}\u{E}\u{2}\u{67}\u{69}\u{5}\u{C}" .
		    "\u{7}\u{2}\u{68}\u{65}\u{3}\u{2}\u{2}\u{2}\u{68}\u{66}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{68}\u{67}\u{3}\u{2}\u{2}\u{2}\u{69}\u{6A}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{6A}\u{6B}\u{7}\u{1B}\u{2}\u{2}\u{6B}\u{6C}\u{7}\u{1C}\u{2}\u{2}" .
		    "\u{6C}\u{17}\u{3}\u{2}\u{2}\u{2}\u{6D}\u{6E}\u{5}\u{4}\u{3}\u{2}\u{6E}" .
		    "\u{6F}\u{7}\u{17}\u{2}\u{2}\u{6F}\u{74}\u{5}\u{4}\u{3}\u{2}\u{70}" .
		    "\u{71}\u{7}\u{17}\u{2}\u{2}\u{71}\u{73}\u{5}\u{4}\u{3}\u{2}\u{72}" .
		    "\u{70}\u{3}\u{2}\u{2}\u{2}\u{73}\u{76}\u{3}\u{2}\u{2}\u{2}\u{74}\u{72}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{74}\u{75}\u{3}\u{2}\u{2}\u{2}\u{75}\u{19}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{76}\u{74}\u{3}\u{2}\u{2}\u{2}\u{77}\u{79}\u{7}\u{3}" .
		    "\u{2}\u{2}\u{78}\u{77}\u{3}\u{2}\u{2}\u{2}\u{78}\u{79}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{79}\u{7A}\u{3}\u{2}\u{2}\u{2}\u{7A}\u{7F}\u{7}\u{1F}\u{2}" .
		    "\u{2}\u{7B}\u{7C}\u{7}\u{3}\u{2}\u{2}\u{7C}\u{7E}\u{7}\u{1F}\u{2}" .
		    "\u{2}\u{7D}\u{7B}\u{3}\u{2}\u{2}\u{2}\u{7E}\u{81}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{7F}\u{7D}\u{3}\u{2}\u{2}\u{2}\u{7F}\u{80}\u{3}\u{2}\u{2}\u{2}\u{80}" .
		    "\u{1B}\u{3}\u{2}\u{2}\u{2}\u{81}\u{7F}\u{3}\u{2}\u{2}\u{2}\u{82}\u{8E}" .
		    "\u{5}\u{1E}\u{10}\u{2}\u{83}\u{8E}\u{5}\u{20}\u{11}\u{2}\u{84}\u{8E}" .
		    "\u{5}\u{22}\u{12}\u{2}\u{85}\u{8E}\u{5}\u{24}\u{13}\u{2}\u{86}\u{8E}" .
		    "\u{5}\u{26}\u{14}\u{2}\u{87}\u{8E}\u{5}\u{28}\u{15}\u{2}\u{88}\u{8E}" .
		    "\u{5}\u{2A}\u{16}\u{2}\u{89}\u{8E}\u{5}\u{2C}\u{17}\u{2}\u{8A}\u{8E}" .
		    "\u{5}\u{2E}\u{18}\u{2}\u{8B}\u{8E}\u{5}\u{30}\u{19}\u{2}\u{8C}\u{8E}" .
		    "\u{5}\u{32}\u{1A}\u{2}\u{8D}\u{82}\u{3}\u{2}\u{2}\u{2}\u{8D}\u{83}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{8D}\u{84}\u{3}\u{2}\u{2}\u{2}\u{8D}\u{85}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{8D}\u{86}\u{3}\u{2}\u{2}\u{2}\u{8D}\u{87}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{8D}\u{88}\u{3}\u{2}\u{2}\u{2}\u{8D}\u{89}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{8D}\u{8A}\u{3}\u{2}\u{2}\u{2}\u{8D}\u{8B}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{8D}\u{8C}\u{3}\u{2}\u{2}\u{2}\u{8E}\u{1D}\u{3}\u{2}\u{2}\u{2}\u{8F}" .
		    "\u{90}\u{9}\u{2}\u{2}\u{2}\u{90}\u{1F}\u{3}\u{2}\u{2}\u{2}\u{91}\u{92}" .
		    "\u{9}\u{3}\u{2}\u{2}\u{92}\u{21}\u{3}\u{2}\u{2}\u{2}\u{93}\u{94}\u{9}" .
		    "\u{4}\u{2}\u{2}\u{94}\u{23}\u{3}\u{2}\u{2}\u{2}\u{95}\u{96}\u{9}\u{5}" .
		    "\u{2}\u{2}\u{96}\u{25}\u{3}\u{2}\u{2}\u{2}\u{97}\u{98}\u{7}\u{F}\u{2}" .
		    "\u{2}\u{98}\u{27}\u{3}\u{2}\u{2}\u{2}\u{99}\u{9A}\u{7}\u{10}\u{2}" .
		    "\u{2}\u{9A}\u{29}\u{3}\u{2}\u{2}\u{2}\u{9B}\u{9C}\u{7}\u{11}\u{2}" .
		    "\u{2}\u{9C}\u{2B}\u{3}\u{2}\u{2}\u{2}\u{9D}\u{9E}\u{9}\u{6}\u{2}\u{2}" .
		    "\u{9E}\u{2D}\u{3}\u{2}\u{2}\u{2}\u{9F}\u{A0}\u{7}\u{14}\u{2}\u{2}" .
		    "\u{A0}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{A1}\u{A2}\u{7}\u{15}\u{2}\u{2}" .
		    "\u{A2}\u{31}\u{3}\u{2}\u{2}\u{2}\u{A3}\u{A4}\u{7}\u{16}\u{2}\u{2}" .
		    "\u{A4}\u{33}\u{3}\u{2}\u{2}\u{2}\u{B}\u{36}\u{3C}\u{42}\u{5E}\u{68}" .
		    "\u{74}\u{78}\u{7F}\u{8D}";

		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize() : void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.9.2', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName() : string
		{
			return "Expression.g4";
		}

		public function getRuleNames() : array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN() : string
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN() : ATN
		{
			return self::$atn;
		}

		public function getVocabulary() : Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function expression() : Context\ExpressionContext
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
		public function type() : Context\TypeContext
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
		public function arrayType() : Context\ArrayTypeContext
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
		public function indexedArrayType() : Context\IndexedArrayTypeContext
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
		public function typedArrayType() : Context\TypedArrayTypeContext
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
		public function basicArrayType() : Context\BasicArrayTypeContext
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
		public function tupleArrayType() : Context\TupleArrayTypeContext
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
		public function tupleArrayTypeElements() : Context\TupleArrayTypeElementsContext
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
		public function arrayKeyType() : Context\ArrayKeyTypeContext
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
		public function arrayValueType() : Context\ArrayValueTypeContext
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
		public function listType() : Context\ListTypeContext
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
		public function multiType() : Context\MultiTypeContext
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
		public function classType() : Context\ClassTypeContext
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
		public function basicType() : Context\BasicTypeContext
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
		public function integerType() : Context\IntegerTypeContext
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
		public function stringType() : Context\StringTypeContext
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
		public function booleanType() : Context\BooleanTypeContext
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
		public function floatType() : Context\FloatTypeContext
		{
		    $localContext = new Context\FloatTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_floatType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(147);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::TYPE_NUMBER) | (1 << self::TYPE_REAL) | (1 << self::TYPE_DOUBLE) | (1 << self::TYPE_FLOAT))) !== 0))) {
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
		public function resourceType() : Context\ResourceTypeContext
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
		public function mixedType() : Context\MixedTypeContext
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
		public function voidType() : Context\VoidTypeContext
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
		public function callableType() : Context\CallableTypeContext
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
		public function objectType() : Context\ObjectTypeContext
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
		public function iterableType() : Context\IterableTypeContext
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
		public function nullType() : Context\NullTypeContext
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_expression;
	    }

	    public function multiType() : ?MultiTypeContext
	    {
	    	return $this->getTypedRuleContext(MultiTypeContext::class, 0);
	    }

	    public function type() : ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_type;
	    }

	    public function arrayType() : ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function listType() : ?ListTypeContext
	    {
	    	return $this->getTypedRuleContext(ListTypeContext::class, 0);
	    }

	    public function basicType() : ?BasicTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicTypeContext::class, 0);
	    }

	    public function classType() : ?ClassTypeContext
	    {
	    	return $this->getTypedRuleContext(ClassTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_arrayType;
	    }

	    public function indexedArrayType() : ?IndexedArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(IndexedArrayTypeContext::class, 0);
	    }

	    public function typedArrayType() : ?TypedArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(TypedArrayTypeContext::class, 0);
	    }

	    public function tupleArrayType() : ?TupleArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(TupleArrayTypeContext::class, 0);
	    }

	    public function basicArrayType() : ?BasicArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_indexedArrayType;
	    }

	    public function TYPE_ARRAY() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

	    public function ANGLE_BRACKET_OPEN() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_OPEN, 0);
	    }

	    public function arrayValueType() : ?ArrayValueTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayValueTypeContext::class, 0);
	    }

	    public function ANGLE_BRACKET_CLOSE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterIndexedArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitIndexedArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_typedArrayType;
	    }

	    public function TYPE_ARRAY() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

	    public function ANGLE_BRACKET_OPEN() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_OPEN, 0);
	    }

	    public function arrayKeyType() : ?ArrayKeyTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayKeyTypeContext::class, 0);
	    }

	    public function COMMA() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::COMMA, 0);
	    }

	    public function arrayValueType() : ?ArrayValueTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayValueTypeContext::class, 0);
	    }

	    public function ANGLE_BRACKET_CLOSE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::ANGLE_BRACKET_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterTypedArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitTypedArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_basicArrayType;
	    }

	    public function TYPE_ARRAY() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterBasicArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitBasicArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_tupleArrayType;
	    }

	    public function TYPE_ARRAY() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ARRAY, 0);
	    }

	    public function CURLY_BRACKET_OPEN() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::CURLY_BRACKET_OPEN, 0);
	    }

	    public function tupleArrayTypeElements() : ?TupleArrayTypeElementsContext
	    {
	    	return $this->getTypedRuleContext(TupleArrayTypeElementsContext::class, 0);
	    }

	    public function CURLY_BRACKET_CLOSE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::CURLY_BRACKET_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterTupleArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitTupleArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
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

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterTupleArrayTypeElements($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitTupleArrayTypeElements($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_arrayKeyType;
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterArrayKeyType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitArrayKeyType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_arrayValueType;
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterArrayValueType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitArrayValueType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_listType;
	    }

	    public function SQUARE_BRACKET_OPEN() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::SQUARE_BRACKET_OPEN, 0);
	    }

	    public function SQUARE_BRACKET_CLOSE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::SQUARE_BRACKET_CLOSE, 0);
	    }

	    public function basicType() : ?BasicTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicTypeContext::class, 0);
	    }

	    public function classType() : ?ClassTypeContext
	    {
	    	return $this->getTypedRuleContext(ClassTypeContext::class, 0);
	    }

	    public function basicArrayType() : ?BasicArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(BasicArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterListType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitListType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
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

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterMultiType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitMultiType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
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

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterClassType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitClassType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_basicType;
	    }

	    public function integerType() : ?IntegerTypeContext
	    {
	    	return $this->getTypedRuleContext(IntegerTypeContext::class, 0);
	    }

	    public function stringType() : ?StringTypeContext
	    {
	    	return $this->getTypedRuleContext(StringTypeContext::class, 0);
	    }

	    public function booleanType() : ?BooleanTypeContext
	    {
	    	return $this->getTypedRuleContext(BooleanTypeContext::class, 0);
	    }

	    public function floatType() : ?FloatTypeContext
	    {
	    	return $this->getTypedRuleContext(FloatTypeContext::class, 0);
	    }

	    public function resourceType() : ?ResourceTypeContext
	    {
	    	return $this->getTypedRuleContext(ResourceTypeContext::class, 0);
	    }

	    public function mixedType() : ?MixedTypeContext
	    {
	    	return $this->getTypedRuleContext(MixedTypeContext::class, 0);
	    }

	    public function voidType() : ?VoidTypeContext
	    {
	    	return $this->getTypedRuleContext(VoidTypeContext::class, 0);
	    }

	    public function callableType() : ?CallableTypeContext
	    {
	    	return $this->getTypedRuleContext(CallableTypeContext::class, 0);
	    }

	    public function objectType() : ?ObjectTypeContext
	    {
	    	return $this->getTypedRuleContext(ObjectTypeContext::class, 0);
	    }

	    public function iterableType() : ?IterableTypeContext
	    {
	    	return $this->getTypedRuleContext(IterableTypeContext::class, 0);
	    }

	    public function nullType() : ?NullTypeContext
	    {
	    	return $this->getTypedRuleContext(NullTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterBasicType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitBasicType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_integerType;
	    }

	    public function TYPE_INTEGER() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_INTEGER, 0);
	    }

	    public function TYPE_INT() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_INT, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterIntegerType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitIntegerType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_stringType;
	    }

	    public function TYPE_STRING() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_STRING, 0);
	    }

	    public function TYPE_TEXT() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_TEXT, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterStringType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitStringType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_booleanType;
	    }

	    public function TYPE_BOOLEAN() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_BOOLEAN, 0);
	    }

	    public function TYPE_BOOL() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_BOOL, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterBooleanType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitBooleanType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_floatType;
	    }

	    public function TYPE_FLOAT() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_FLOAT, 0);
	    }

	    public function TYPE_NUMBER() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_NUMBER, 0);
	    }

	    public function TYPE_REAL() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_REAL, 0);
	    }

	    public function TYPE_DOUBLE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_DOUBLE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterFloatType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitFloatType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_resourceType;
	    }

	    public function TYPE_RESOURCE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_RESOURCE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterResourceType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitResourceType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_mixedType;
	    }

	    public function TYPE_MIXED() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_MIXED, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterMixedType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitMixedType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_voidType;
	    }

	    public function TYPE_VOID() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_VOID, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterVoidType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitVoidType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_callableType;
	    }

	    public function TYPE_CALLABLE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_CALLABLE, 0);
	    }

	    public function TYPE_CALLBACK() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_CALLBACK, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterCallableType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitCallableType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_objectType;
	    }

	    public function TYPE_OBJECT() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_OBJECT, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterObjectType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitObjectType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_iterableType;
	    }

	    public function TYPE_ITERABLE() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_ITERABLE, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterIterableType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitIterableType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
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

		public function getRuleIndex() : int
		{
		    return ExpressionParser::RULE_nullType;
	    }

	    public function TYPE_NULL() : ?TerminalNode
	    {
	        return $this->getToken(ExpressionParser::TYPE_NULL, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->enterNullType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof ExpressionListener) {
			    $listener->exitNullType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof ExpressionVisitor) {
			    return $visitor->visitNullType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}