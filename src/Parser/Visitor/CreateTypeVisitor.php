<?php declare(strict_types=1);
/*
 * This file is part of the jojo1981/php-types package
 *
 * Copyright (c) 2021 Joost Nijhuis <jnijhuis81@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed in the root of the source code
 */
namespace Jojo1981\PhpTypes\Parser\Visitor;

use Antlr\Antlr4\Runtime\Tree\AbstractParseTreeVisitor;
use Jojo1981\PhpTypes\ArrayType;
use Jojo1981\PhpTypes\BooleanType;
use Jojo1981\PhpTypes\CallableType;
use Jojo1981\PhpTypes\ClassType;
use Jojo1981\PhpTypes\Exception\TypeException;
use Jojo1981\PhpTypes\Parser\Exception\LogicException;
use Jojo1981\PhpTypes\Parser\Parser\Context\ArrayKeyTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ArrayTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ArrayValueTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\BasicArrayTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\BasicTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\BooleanTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\CallableTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ClassTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ExpressionContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\FloatTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\IndexedArrayTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\IntegerTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\IterableTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ListTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\MixedTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\MultiTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\NullTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ObjectTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\ResourceTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\StringTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\TupleArrayTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\TupleArrayTypeElementsContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\TypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\TypedArrayTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\Context\VoidTypeContext;
use Jojo1981\PhpTypes\Parser\Parser\ExpressionVisitor;
use Jojo1981\PhpTypes\FloatType;
use Jojo1981\PhpTypes\IntegerType;
use Jojo1981\PhpTypes\IterableType;
use Jojo1981\PhpTypes\MixedType;
use Jojo1981\PhpTypes\MultiType;
use Jojo1981\PhpTypes\NullType;
use Jojo1981\PhpTypes\ObjectType;
use Jojo1981\PhpTypes\ResourceType;
use Jojo1981\PhpTypes\StringType;
use Jojo1981\PhpTypes\TypeInterface;
use Jojo1981\PhpTypes\Value\ClassName;
use Jojo1981\PhpTypes\Value\Exception\ValueException;
use Jojo1981\PhpTypes\VoidType;
use function implode;
use function sprintf;

/**
 * @internal
 * @package Jojo1981\PhpTypes\Parser\Visitor
 */
final class CreateTypeVisitor extends AbstractParseTreeVisitor implements ExpressionVisitor
{
    /**
     * @param ExpressionContext $context
     * @return TypeInterface
     * @throws LogicException
     */
    public function visitExpression(ExpressionContext $context): TypeInterface
    {
        if (null !== $multiTypeContext = $context->multiType()) {
            return $multiTypeContext->accept($this);
        }
        if (null !== $typeContent = $context->type()) {
            return $typeContent->accept($this);
        }

        throw new LogicException('Expect one of: multiType or type.');
    }

    /**
     * @param TypeContext $context
     * @return TypeInterface
     * @throws TypeException
     * @throws LogicException
     */
    public function visitType(TypeContext $context): TypeInterface
    {
        if (null !== $arrayTypeContext = $context->arrayType()) {
             return $arrayTypeContext->accept($this);
        }

        if (null !== $listTypeContext = $context->listType()) {
             return $listTypeContext->accept($this);
        }

        if (null !== $basicTypeContext = $context->basicType()) {
             return $basicTypeContext->accept($this);
        }

        if (null !== $classTypeContext = $context->classType()) {
             return $classTypeContext->accept($this);
        }

        throw new LogicException('Expect one of: arrayType, listType, basicType or classType.');
    }

    /**
     * @param ArrayTypeContext $context
     * @return TypeInterface
     * @throws LogicException
     */
    public function visitArrayType(ArrayTypeContext $context): TypeInterface
    {
        if (null !== $indexedArrayTypeContext = $context->indexedArrayType()) {
            return $indexedArrayTypeContext->accept($this);
        }
        if (null !== $typedArrayTypeContext = $context->typedArrayType()) {
            return $typedArrayTypeContext->accept($this);
        }
        if (null !== $tupleArrayTypeContext = $context->tupleArrayType()) {
            return $tupleArrayTypeContext->accept($this);
        }
        if (null !== $basicArrayTypeContext = $context->basicArrayType()) {
            return $basicArrayTypeContext->accept($this);
        }

        throw new LogicException('Expect one of: indexedArrayType, typedArrayType, tupleArrayType or basicArrayType.');
    }

    /**
     * @param IndexedArrayTypeContext $context
     * @return ArrayType
     * @throws TypeException
     * @throws LogicException
     */
    public function visitIndexedArrayType(IndexedArrayTypeContext $context): ArrayType
    {
        if (null !== $arrayValueTypeContext = $context->arrayValueType()) {
            return new ArrayType($arrayValueTypeContext->accept($this));
        }

        throw new LogicException('Expect: arrayValueType.');
    }

    /**
     * @param TypedArrayTypeContext $context
     * @throws LogicException
     * @throws TypeException
     * @return ArrayType
     */
    public function visitTypedArrayType(TypedArrayTypeContext $context): ArrayType
    {
        if (null !== ($arrayKeyTypeContext = $context->arrayKeyType())
            && null !== $arrayValueTypeContext = $context->arrayValueType()
        ) {
            return new ArrayType(
                $arrayValueTypeContext->accept($this),
                $arrayKeyTypeContext->accept($this)
            );
        }

        throw new LogicException('Expect both: arrayKeyType and arrayValueType.');
    }

    /**
     * @param BasicArrayTypeContext $context
     * @throws TypeException
     * @return ArrayType
     */
    public function visitBasicArrayType(BasicArrayTypeContext $context): ArrayType
    {
        return new ArrayType();
    }

    /**
     * TODO: Add Tuple type (array like type) which is a finite ordered list (sequence) of elements which can be of different types.
     *
     * @param TupleArrayTypeContext $context
     * @return ArrayType
     * @throws TypeException
     * @throws LogicException
     */
    public function visitTupleArrayType(TupleArrayTypeContext $context): ArrayType
    {
        if (null  === $context->tupleArrayTypeElements()) {
            return new ArrayType();
        }

        throw new LogicException('Expect tupleArrayTypeElements.');
    }

    /**
     * @param TupleArrayTypeElementsContext $context
     * @return TypeInterface[]
     */
    public function visitTupleArrayTypeElements(TupleArrayTypeElementsContext $context): array
    {
        $types = [];
        foreach ($context->expression() as $expressionContext) {
            $types[] = $expressionContext->accept($this);
        }

        return $types;
    }

    /**
     * @param ArrayKeyTypeContext $context
     * @return TypeInterface
     * @throws LogicException
     */
    public function visitArrayKeyType(ArrayKeyTypeContext $context): TypeInterface
    {
        if (null !== $expressionContext = $context->expression()) {
            return $expressionContext->accept($this);
        }

        throw new LogicException('Expect expression.');
    }

    /**
     * @param ArrayValueTypeContext $context
     * @return TypeInterface
     * @throws LogicException
     */
    public function visitArrayValueType(ArrayValueTypeContext $context): TypeInterface
    {
        if (null !== $expressionContext = $context->expression()) {
            return $expressionContext->accept($this);
        }

        throw new LogicException('Expect expression.');
    }

    /**
     * @param ListTypeContext $context
     * @throws LogicException
     * @throws TypeException
     * @return ArrayType
     */
    public function visitListType(ListTypeContext $context): ArrayType
    {
        if (null !== $basicTypeContext = $context->basicType()) {
            return new ArrayType($basicTypeContext->accept($this));
        }
        if (null !== $classTypeContext = $context->classType()) {
            return new ArrayType($classTypeContext->accept($this));
        }
        if (null !== $basicArrayTypeContext = $context->basicArrayType()) {
            return new ArrayType($basicArrayTypeContext->accept($this));
        }

        throw new LogicException('Expect one of: basicType, classType or basicArrayType.');
    }

    /**
     * @param MultiTypeContext $context
     * @return MultiType
     * @throws TypeException
     */
    public function visitMultiType(MultiTypeContext $context): MultiType
    {
        $types = [];
        foreach ($context->type() as $typeContext) {
            $types[] = $typeContext->accept($this);
        }

        return new MultiType($types);
    }

    /**
     * @param ClassTypeContext $context
     * @return ClassType
     * @throws ValueException
     * @throws TypeException
     */
    public function visitClassType(ClassTypeContext $context): ClassType
    {
        return new ClassType(new ClassName($context->getText()));
    }

    /**
     * @param BasicTypeContext $context
     * @return TypeInterface
     * @throws LogicException
     */
    public function visitBasicType(BasicTypeContext $context): TypeInterface
    {
        if (null !== $integerTypeContext = $context->integerType()) {
            return $integerTypeContext->accept($this);
        }
        if (null !== $stringTypeContext = $context->stringType()) {
            return $stringTypeContext->accept($this);
        }
        if (null !== $booleanTypeContext = $context->booleanType()) {
            return $booleanTypeContext->accept($this);
        }
        if (null !== $floatTypeContext = $context->floatType()) {
            return $floatTypeContext->accept($this);
        }
        if (null !== $resourceTypeContext = $context->resourceType()) {
            return $resourceTypeContext->accept($this);
        }
        if (null !== $mixedTypeContext = $context->mixedType()) {
            return $mixedTypeContext->accept($this);
        }
        if (null !== $voidTypeContext = $context->voidType()) {
            return $voidTypeContext->accept($this);
        }
        if (null !== $callableTypeContext = $context->callableType()) {
            return $callableTypeContext->accept($this);
        }
        if (null !== $objectTypeContext = $context->objectType()) {
            return $objectTypeContext->accept($this);
        }
        if (null !== $iterableTypeContext = $context->iterableType()) {
            return $iterableTypeContext->accept($this);
        }
        if (null !== $nullTypeContext = $context->nullType()) {
            return $nullTypeContext->accept($this);
        }

        throw new LogicException(sprintf(
            'Expect one of: %s or %s.',
            implode(
                ', ',
                [
                    'integerType',
                    'stringType',
                    'booleanType',
                    'floatType',
                    'resourceType',
                    'mixedType',
                    'voidType',
                    'callableType',
                    'objectType',
                    'iterableType',
                ]
            ),
            'nullType'
        ));
    }

    /**
     * @param IntegerTypeContext $context
     * @return IntegerType
     */
    public function visitIntegerType(IntegerTypeContext $context): IntegerType
    {
        return new IntegerType();
    }

    /**]
     * @param StringTypeContext $context
     * @return StringType
     */
    public function visitStringType(StringTypeContext $context): StringType
    {
        return new StringType();
    }

    /**
     * @param BooleanTypeContext $context
     * @return BooleanType
     */
    public function visitBooleanType(BooleanTypeContext $context): BooleanType
    {
        return new BooleanType();
    }

    /**
     * @param FloatTypeContext $context
     * @return FloatType
     */
    public function visitFloatType(FloatTypeContext $context): FloatType
    {
        return new FloatType();
    }

    /**
     * @param ResourceTypeContext $context
     * @return ResourceType
     */
    public function visitResourceType(ResourceTypeContext $context): ResourceType
    {
        return new ResourceType();
    }

    /**
     * @param MixedTypeContext $context
     * @return MixedType
     */
    public function visitMixedType(MixedTypeContext $context): MixedType
    {
        return new MixedType();
    }

    /**
     * @param VoidTypeContext $context
     * @return VoidType
     */
    public function visitVoidType(VoidTypeContext $context): VoidType
    {
        return new VoidType();
    }

    /**
     * @param CallableTypeContext $context
     * @return CallableType
     */
    public function visitCallableType(CallableTypeContext $context): CallableType
    {
        return new CallableType();
    }

    /**
     * @param ObjectTypeContext $context
     * @return ObjectType
     */
    public function visitObjectType(ObjectTypeContext $context): ObjectType
    {
        return new ObjectType();
    }

    /**
     * @param IterableTypeContext $context
     * @return IterableType
     */
    public function visitIterableType(IterableTypeContext $context): IterableType
    {
        return new IterableType();
    }

    /**
     * @param NullTypeContext $context
     * @return NullType
     */
    public function visitNullType(NullTypeContext $context): NullType
    {
        return new NullType();
    }
}
