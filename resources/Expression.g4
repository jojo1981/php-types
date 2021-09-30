grammar Expression;

expression
  : multiType
  | type
  ;

type
  : arrayType
  | listType
  | basicType
  | classType
  ;

arrayType
  : indexedArrayType
  | typedArrayType
  | tupleArrayType
  | basicArrayType
  ;

indexedArrayType
  : TYPE_ARRAY ANGLE_BRACKET_OPEN arrayValueType ANGLE_BRACKET_CLOSE
  ;

typedArrayType
  : TYPE_ARRAY ANGLE_BRACKET_OPEN arrayKeyType COMMA arrayValueType ANGLE_BRACKET_CLOSE
  ;

basicArrayType
  : TYPE_ARRAY
  ;

tupleArrayType
  : TYPE_ARRAY CURLY_BRACKET_OPEN tupleArrayTypeElements CURLY_BRACKET_CLOSE
  ;

tupleArrayTypeElements
  : expression COMMA expression (COMMA expression)*
  ;

arrayKeyType
  : expression
  ;

arrayValueType
  : expression
  ;

listType
  : (basicType | classType | basicArrayType) SQUARE_BRACKET_OPEN SQUARE_BRACKET_CLOSE
  ;

multiType
  : type PIPE type (PIPE type)*
  ;

classType
  : '\\'? IDENTIFIER ('\\' IDENTIFIER)*
  ;

basicType
  : integerType
  | stringType
  | booleanType
  | floatType
  | resourceType
  | mixedType
  | voidType
  | callableType
  | objectType
  | iterableType
  | nullType
  ;

integerType
  : TYPE_INTEGER
  | TYPE_INT
  ;

stringType
  : TYPE_STRING
  | TYPE_TEXT
  ;

booleanType
  : TYPE_BOOLEAN
  | TYPE_BOOL
  ;


floatType
  : TYPE_FLOAT
  | TYPE_NUMBER
  | TYPE_REAL
  | TYPE_DOUBLE
  ;

resourceType
  : TYPE_RESOURCE
  ;

mixedType
  : TYPE_MIXED
  ;

voidType
  : TYPE_VOID
  ;

callableType
  : TYPE_CALLABLE
  | TYPE_CALLBACK
  ;

objectType
  : TYPE_OBJECT
  ;

iterableType
  : TYPE_ITERABLE
  ;

nullType
  : TYPE_NULL
  ;

TYPE_ARRAY: A R R A Y;
TYPE_INTEGER: I N T E G E R;
TYPE_INT: I N T;
TYPE_STRING: S T R I N G;
TYPE_TEXT: T E X T ;
TYPE_BOOLEAN: B O O L E A N;
TYPE_BOOL: B O O L;
TYPE_NUMBER: N U M B E R;
TYPE_REAL: R E A L;
TYPE_DOUBLE: D O U B L E;
TYPE_FLOAT: F L O A T;
TYPE_RESOURCE: R E S O U R C E;
TYPE_MIXED: M I X E D;
TYPE_VOID: V O I D;
TYPE_CALLABLE: C A L L A B L E;
TYPE_CALLBACK: C A L L B A C K;
TYPE_OBJECT: O B J E C T;
TYPE_ITERABLE: I T E R A B L E;
TYPE_NULL: N U L L;

PIPE: '|';
COMMA: ',';
CURLY_BRACKET_OPEN: '{';
CURLY_BRACKET_CLOSE: '}';
SQUARE_BRACKET_OPEN: '[';
SQUARE_BRACKET_CLOSE: ']';
ANGLE_BRACKET_OPEN: '<';
ANGLE_BRACKET_CLOSE: '>';

IDENTIFIER: [a-zA-Z_\u0080-\ufffe][a-zA-Z0-9_\u0080-\ufffe]*;

fragment A : [aA]; // match either an 'a' or 'A'
fragment B : [bB];
fragment C : [cC];
fragment D : [dD];
fragment E : [eE];
fragment F : [fF];
fragment G : [gG];
fragment H : [hH];
fragment I : [iI];
fragment J : [jJ];
fragment K : [kK];
fragment L : [lL];
fragment M : [mM];
fragment N : [nN];
fragment O : [oO];
fragment P : [pP];
fragment Q : [qQ];
fragment R : [rR];
fragment S : [sS];
fragment T : [tT];
fragment U : [uU];
fragment V : [vV];
fragment W : [wW];
fragment X : [xX];
fragment Y : [yY];
fragment Z : [zZ];

WS: [ \t\n\r] + -> skip;
