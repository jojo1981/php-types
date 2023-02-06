<?php

/*
 * Generated from ./resources/Expression.g4 by ANTLR 4.11.1
 */

namespace Jojo1981\PhpTypes\Parser\Parser;
use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see ExpressionParser}.
 */
interface ExpressionListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterExpression(Context\ExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitExpression(Context\ExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterType(Context\TypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitType(Context\TypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::indexedArrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterIndexedArrayType(Context\IndexedArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::indexedArrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitIndexedArrayType(Context\IndexedArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::typedArrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterTypedArrayType(Context\TypedArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::typedArrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitTypedArrayType(Context\TypedArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::basicArrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterBasicArrayType(Context\BasicArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::basicArrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitBasicArrayType(Context\BasicArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::tupleArrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterTupleArrayType(Context\TupleArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::tupleArrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitTupleArrayType(Context\TupleArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::tupleArrayTypeElements()}.
	 * @param $context The parse tree.
	 */
	public function enterTupleArrayTypeElements(Context\TupleArrayTypeElementsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::tupleArrayTypeElements()}.
	 * @param $context The parse tree.
	 */
	public function exitTupleArrayTypeElements(Context\TupleArrayTypeElementsContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::arrayKeyType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayKeyType(Context\ArrayKeyTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::arrayKeyType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayKeyType(Context\ArrayKeyTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::arrayValueType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayValueType(Context\ArrayValueTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::arrayValueType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayValueType(Context\ArrayValueTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::listType()}.
	 * @param $context The parse tree.
	 */
	public function enterListType(Context\ListTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::listType()}.
	 * @param $context The parse tree.
	 */
	public function exitListType(Context\ListTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::multiType()}.
	 * @param $context The parse tree.
	 */
	public function enterMultiType(Context\MultiTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::multiType()}.
	 * @param $context The parse tree.
	 */
	public function exitMultiType(Context\MultiTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::classType()}.
	 * @param $context The parse tree.
	 */
	public function enterClassType(Context\ClassTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::classType()}.
	 * @param $context The parse tree.
	 */
	public function exitClassType(Context\ClassTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::basicType()}.
	 * @param $context The parse tree.
	 */
	public function enterBasicType(Context\BasicTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::basicType()}.
	 * @param $context The parse tree.
	 */
	public function exitBasicType(Context\BasicTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::integerType()}.
	 * @param $context The parse tree.
	 */
	public function enterIntegerType(Context\IntegerTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::integerType()}.
	 * @param $context The parse tree.
	 */
	public function exitIntegerType(Context\IntegerTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::stringType()}.
	 * @param $context The parse tree.
	 */
	public function enterStringType(Context\StringTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::stringType()}.
	 * @param $context The parse tree.
	 */
	public function exitStringType(Context\StringTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::booleanType()}.
	 * @param $context The parse tree.
	 */
	public function enterBooleanType(Context\BooleanTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::booleanType()}.
	 * @param $context The parse tree.
	 */
	public function exitBooleanType(Context\BooleanTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::floatType()}.
	 * @param $context The parse tree.
	 */
	public function enterFloatType(Context\FloatTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::floatType()}.
	 * @param $context The parse tree.
	 */
	public function exitFloatType(Context\FloatTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::resourceType()}.
	 * @param $context The parse tree.
	 */
	public function enterResourceType(Context\ResourceTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::resourceType()}.
	 * @param $context The parse tree.
	 */
	public function exitResourceType(Context\ResourceTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::mixedType()}.
	 * @param $context The parse tree.
	 */
	public function enterMixedType(Context\MixedTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::mixedType()}.
	 * @param $context The parse tree.
	 */
	public function exitMixedType(Context\MixedTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::voidType()}.
	 * @param $context The parse tree.
	 */
	public function enterVoidType(Context\VoidTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::voidType()}.
	 * @param $context The parse tree.
	 */
	public function exitVoidType(Context\VoidTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::callableType()}.
	 * @param $context The parse tree.
	 */
	public function enterCallableType(Context\CallableTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::callableType()}.
	 * @param $context The parse tree.
	 */
	public function exitCallableType(Context\CallableTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::objectType()}.
	 * @param $context The parse tree.
	 */
	public function enterObjectType(Context\ObjectTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::objectType()}.
	 * @param $context The parse tree.
	 */
	public function exitObjectType(Context\ObjectTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::iterableType()}.
	 * @param $context The parse tree.
	 */
	public function enterIterableType(Context\IterableTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::iterableType()}.
	 * @param $context The parse tree.
	 */
	public function exitIterableType(Context\IterableTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see ExpressionParser::nullType()}.
	 * @param $context The parse tree.
	 */
	public function enterNullType(Context\NullTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see ExpressionParser::nullType()}.
	 * @param $context The parse tree.
	 */
	public function exitNullType(Context\NullTypeContext $context): void;
}