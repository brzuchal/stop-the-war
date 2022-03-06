<?php declare(strict_types=1);

namespace StopTheWar\Sniffs\Types;

use SlevomatCodingStandard\Sniffs\TestCase;

class BeforeTypeDeclarationSniffTest extends TestCase
{
    public function testPureStopWarCommentMissing(): void
    {
        $report = self::checkFile(__DIR__ . '/data/BeforeTypeDeclarationMissingStopWarComment.php');

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 3, BeforeTypeDeclarationSniff::CODE_MISSING_COMMENT);

        self::assertAllFixedInFile($report);
    }

    public function testExtendedStopWarCommentMissing(): void
    {
        $report = self::checkFile(__DIR__ . '/data/BeforeTypeDeclarationMissingExtendedStopWarComment.php', [
            'commentExtension' => '🇺🇦 #StandWithUkraine #StopPutin',
        ]);

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 3, BeforeTypeDeclarationSniff::CODE_MISSING_EXTENDED_COMMENT);

        self::assertAllFixedInFile($report);
    }

//    public function testModifiedSettingsNoErrors(): void
//    {
//        $report = self::checkFile(__DIR__ . '/data/docCommentSpacingModifiedSettingsNoErrors.php', [
//            'linesCountBeforeFirstContent' => 1,
//            'linesCountBetweenDescriptionAndAnnotations' => 0,
//            'linesCountBetweenDifferentAnnotationsTypes' => 1,
//            'linesCountAfterLastContent' => 1,
//        ]);
//        self::assertNoSniffErrorInFile($report);
//    }
}
