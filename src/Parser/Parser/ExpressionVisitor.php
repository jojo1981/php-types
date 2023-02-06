<?php

/*
 * Generated from ./resources/Expression.g4 by ANTLR 4.11.1
 */

namespace Jojo1981\PhpTypes\Parser\Parser;

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see ExpressionParser}.
 */
interface ExpressionVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see ExpressionParser::expression()}.
	 *
	 * @param Context\ExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpression(Context\ExpressionContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::type()}.
	 *
	 * @param Context\TypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitType(Context\TypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::arrayType()}.
	 *
	 * @param Context\ArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayType(Context\ArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::indexedArrayType()}.
	 *
	 * @param Context\IndexedArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIndexedArrayType(Context\IndexedArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::typedArrayType()}.
	 *
	 * @param Context\TypedArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypedArrayType(Context\TypedArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::basicArrayType()}.
	 *
	 * @param Context\BasicArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBasicArrayType(Context\BasicArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::tupleArrayType()}.
	 *
	 * @param Context\TupleArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTupleArrayType(Context\TupleArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::tupleArrayTypeElements()}.
	 *
	 * @param Context\TupleArrayTypeElementsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTupleArrayTypeElements(Context\TupleArrayTypeElementsContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::arrayKeyType()}.
	 *
	 * @param Context\ArrayKeyTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayKeyType(Context\ArrayKeyTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::arrayValueType()}.
	 *
	 * @param Context\ArrayValueTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayValueType(Context\ArrayValueTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::listType()}.
	 *
	 * @param Context\ListTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitListType(Context\ListTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::multiType()}.
	 *
	 * @param Context\MultiTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMultiType(Context\MultiTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::classType()}.
	 *
	 * @param Context\ClassTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitClassType(Context\ClassTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::basicType()}.
	 *
	 * @param Context\BasicTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBasicType(Context\BasicTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::integerType()}.
	 *
	 * @param Context\IntegerTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIntegerType(Context\IntegerTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::stringType()}.
	 *
	 * @param Context\StringTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStringType(Context\StringTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::booleanType()}.
	 *
	 * @param Context\BooleanTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBooleanType(Context\BooleanTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::floatType()}.
	 *
	 * @param Context\FloatTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFloatType(Context\FloatTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::resourceType()}.
	 *
	 * @param Context\ResourceTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitResourceType(Context\ResourceTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::mixedType()}.
	 *
	 * @param Context\MixedTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMixedType(Context\MixedTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::voidType()}.
	 *
	 * @param Context\VoidTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVoidType(Context\VoidTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::callableType()}.
	 *
	 * @param Context\CallableTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCallableType(Context\CallableTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::objectType()}.
	 *
	 * @param Context\ObjectTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitObjectType(Context\ObjectTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::iterableType()}.
	 *
	 * @param Context\IterableTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIterableType(Context\IterableTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see ExpressionParser::nullType()}.
	 *
	 * @param Context\NullTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNullType(Context\NullTypeContext $context);
}