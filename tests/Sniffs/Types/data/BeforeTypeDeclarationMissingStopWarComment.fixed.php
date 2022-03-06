<?php declare(strict_types=1);

namespace Tests\Fixtures;

// Do not be silent! #StopWar
interface BeforeInterface
{
}

// Do not be silent! #StopWar
/**
 * Some comment
 */
interface BeforeInterfaceWithComment
{
}

// Do not be silent! #StopWar
class BeforeClass
{
}

// Do not be silent! #StopWar
abstract class BeforeAbstractClass
{
}

// Do not be silent! #StopWar
final class BeforeFinalClass
{
}

// Do not be silent! #StopWar
/**
 * Some comment
 */
#[\Attribute()]
class BeforeClassWithComment
{
}

// Do not be silent! #StopWar
/**
 * Some comment
 */
#[\Attribute()]
abstract class BeforeAbstractClassWithComment
{
}

// Do not be silent! #StopWar
/**
 * Some comment
 */
#[\Attribute()]
final class BeforeFinalClassWithComment
{
}

// Do not be silent! #StopWar
trait BeforeTrait
{
}

// Do not be silent! #StopWar
/**
 * Some comment
 */
#[\Attribute()]
trait BeforeTraitWithComment
{
}
