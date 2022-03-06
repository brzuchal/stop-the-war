<?php declare(strict_types=1);

namespace StopTheWar\Sniffs\Types;

use SlevomatCodingStandard\Sniffs\TestCase;

class BeforeTypeDeclarationSniffTest extends TestCase
{
    public function testPureStopWarCommentMissing(): void
    {
        $report = self::checkFile(__DIR__ . '/data/BeforeTypeDeclarationMissingStopWarComment.php');

        self::assertEquals(10, $report->getErrorCount());
        self::assertEquals(10, $report->getFixableCount());
        self::assertSniffError($report, 3, BeforeTypeDeclarationSniff::CODE_MISSING_COMMENT);

        self::assertAllFixedInFile($report);
        self::assertEquals(20, $report->getFixedCount());
    }

    public function testExtendedStopWarCommentMissing(): void
    {
        $report = self::checkFile(__DIR__ . '/data/BeforeTypeDeclarationMissingExtendedStopWarComment.php', [
            'commentExtension' => '🇺🇦 #StandWithUkraine #StopPutin',
        ]);

        self::assertEquals(10, $report->getErrorCount());
        self::assertEquals(10, $report->getFixableCount());
        self::assertSniffError($report, 3, BeforeTypeDeclarationSniff::CODE_MISSING_EXTENDED_COMMENT);

        self::assertAllFixedInFile($report);
        self::assertEquals(20, $report->getFixedCount());
    }
}
