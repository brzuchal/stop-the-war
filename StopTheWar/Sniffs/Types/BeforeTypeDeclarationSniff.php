<?php declare(strict_types=1);

namespace StopTheWar\Sniffs\Types;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * @internal
 */
final class BeforeTypeDeclarationSniff implements Sniff
{
    public const CODE_MISSING_COMMENT = 'MissingStopWarComment';
    public const CODE_MISSING_EXTENDED_COMMENT = 'MissingExtendedStopWarComment';
    public const INITIAL_TEXT = '// Do not be silent! #StopWar';

    public string $commentExtension = '';

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        $token = $tokens[$stackPtr];
        $noOfSpaces = 0;
        $fix = false;
        $commentString = \trim(self::INITIAL_TEXT . ' ' . $this->commentExtension);
        while ($stackPtr > 0) {
            if ($token['code'] === \T_WHITESPACE) {
                $noOfSpaces++;
            }

            if ($noOfSpaces === 2) {
                $fix = $this->addError($phpcsFile, $stackPtr);
                break;
            }

            if ($token['code'] === \T_COMMENT && $commentString === \trim($token['content'])) {
                print("\e[0;32mContent match!\e[0m\n");
                break;
            }

            $token = $tokens[--$stackPtr];
        }

        if (!$fix) {
            return;
        }

        $phpcsFile->fixer->beginChangeset();
        $phpcsFile->fixer->addNewline($stackPtr);
        $phpcsFile->fixer->addContentBefore($stackPtr + 1, $commentString);
        $phpcsFile->fixer->endChangeset();
    }

    protected function addError(File $phpcsFile, int $startPointer): bool
    {
        if (empty($this->commentExtension)) {
            return $phpcsFile->addFixableError(
                'Missing #StopWar comment',
                $startPointer,
                self::CODE_MISSING_COMMENT
            );
        }

        return $phpcsFile->addFixableError(
            'Missing #StopWar comment with extension ' . $this->commentExtension,
            $startPointer,
            self::CODE_MISSING_EXTENDED_COMMENT,
        );
    }

    /**
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [\T_CLASS, \T_INTERFACE, \T_TRAIT, 366]; // T_ENUM: 366
    }
}
