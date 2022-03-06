<?php declare(strict_types=1);

namespace Tests\Fixtures;

interface BeforeInterface
{
}

/**
 * Some comment
 */
interface BeforeInterfaceWithComment
{
}

class BeforeClass
{
}

abstract class BeforeAbstractClass
{
}

final class BeforeFinalClass
{
}

/**
 * Some comment
 */
#[\Attribute()]
class BeforeClassWithComment
{
}

/**
 * Some comment
 */
#[\Attribute()]
abstract class BeforeAbstractClassWithComment
{
}

/**
 * Some comment
 */
#[\Attribute()]
final class BeforeFinalClassWithComment
{
}

trait BeforeTrait
{
}

/**
 * Some comment
 */
#[\Attribute()]
trait BeforeTraitWithComment
{
}
