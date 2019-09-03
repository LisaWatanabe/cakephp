<?php
/**
<<<<<<< HEAD
 * PHP Version 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
=======
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
>>>>>>> master
 *
 * This file is originally written by Greg Sherwood and Marc McIntyre, but
 * modified for CakePHP.
 *
 * @copyright     2006 Squiz Pty Ltd (ABN 77 084 670 600)
<<<<<<< HEAD
 * @link          http://pear.php.net/package/PHP_CodeSniffer_CakePHP
=======
 * @link          https://github.com/cakephp/cakephp-codesniffer
>>>>>>> master
 * @since         CakePHP CodeSniffer 0.1.1
 * @license       https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

/**
 * Checks the separation between methods in a class or interface.
<<<<<<< HEAD
 *
=======
>>>>>>> master
 */
namespace CakePHP\Sniffs\WhiteSpace;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
<<<<<<< HEAD

=======
use PHP_CodeSniffer\Util\Tokens;

/**
 * There should always be newlines around functions/methods.
 */
>>>>>>> master
class FunctionSpacingSniff implements Sniff
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        return [T_FUNCTION];
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        /*
            Check the number of blank lines
            after the function.
        */
        if (isset($tokens[$stackPtr]['scope_closer']) === false) {
            // Must be an interface method, so the closer is the semi-colon.
            $closer = $phpcsFile->findNext(T_SEMICOLON, $stackPtr);
        } else {
            $closer = $tokens[$stackPtr]['scope_closer'];
        }

        // There needs to be 1 blank lines after the closer.
        $nextLineToken = null;
        for ($i = $closer; $i < $phpcsFile->numTokens; $i++) {
            if (strpos($tokens[$i]['content'], $phpcsFile->eolChar) === false) {
                continue;
            } else {
                $nextLineToken = ($i + 1);
                break;
            }
        }

        if ($nextLineToken === null) {
            // Never found the next line, which means
            // there are 0 blank lines after the function.
            $foundLines = 0;
        } else {
            $nextContent = $phpcsFile->findNext([T_WHITESPACE], ($nextLineToken + 1), null, true);
            if ($nextContent === false) {
                // We are at the end of the file. That is acceptable as well.
                $foundLines = 1;
            } else {
                $foundLines = ($tokens[$nextContent]['line'] - $tokens[$nextLineToken]['line']);
            }
        }

        /*
            Check the number of blank lines
            before the function.
        */

        $prevLineToken = null;
        for ($i = $stackPtr; $i > 0; $i--) {
            if (strpos($tokens[$i]['content'], $phpcsFile->eolChar) === false) {
                continue;
            } else {
                $prevLineToken = $i;
                break;
            }
        }

        if ($prevLineToken === null) {
            // Never found the previous line, which means
            // there are 0 blank lines before the function.
            $foundLines = 0;
        } else {
            $prevContent = $phpcsFile->findPrevious([T_WHITESPACE, T_DOC_COMMENT], $prevLineToken, null, true);

            // Before we throw an error, check that we are not throwing an error
            // for another function. We don't want to error for no blank lines after
            // the previous function and no blank lines before this one as well.
            $currentLine = $tokens[$stackPtr]['line'];
            $prevLine = ($tokens[$prevContent]['line'] - 1);
            $i = ($stackPtr - 1);
            $foundLines = 0;
            while ($currentLine !== $prevLine && $currentLine > 1 && $i > 0) {
                if (isset($tokens[$i]['scope_condition']) === true) {
                    $scopeCondition = $tokens[$i]['scope_condition'];
                    if ($tokens[$scopeCondition]['code'] === T_FUNCTION) {
                        // Found a previous function.
                        return;
                    }
                } elseif ($tokens[$i]['code'] === T_FUNCTION) {
                    // Found another interface function.
                    return;
                }

                $currentLine = $tokens[$i]['line'];
                if ($currentLine === $prevLine) {
                    break;
                }

                if ($tokens[($i - 1)]['line'] < $currentLine && $tokens[($i + 1)]['line'] > $currentLine) {
                    // This token is on a line by itself. If it is whitespace, the line is empty.
                    if ($tokens[$i]['code'] === T_WHITESPACE) {
                        $foundLines++;
                    }
                }
                $i--;
            }
        }
=======
    public function process(File $phpCsFile, $stackPointer)
    {
        $tokens = $phpCsFile->getTokens();

        $level = $tokens[$stackPointer]['level'];
        if ($level < 1) {
            return;
        }

        $openingBraceIndex = $phpCsFile->findNext(T_OPEN_CURLY_BRACKET, $stackPointer + 1);
        // Fix interface methods
        if (!$openingBraceIndex) {
            $openingParenthesisIndex = $phpCsFile->findNext(T_OPEN_PARENTHESIS, $stackPointer + 1);
            $closingParenthesisIndex = $tokens[$openingParenthesisIndex]['parenthesis_closer'];

            $semicolonIndex = $phpCsFile->findNext(T_SEMICOLON, $closingParenthesisIndex + 1);

            $nextContentIndex = $phpCsFile->findNext(T_WHITESPACE, $semicolonIndex + 1, null, true);

            // Do not mess with the end of the class
            if ($tokens[$nextContentIndex]['type'] === 'T_CLOSE_CURLY_BRACKET') {
                return;
            }

            if ($tokens[$nextContentIndex]['line'] - $tokens[$semicolonIndex]['line'] <= 1) {
                $fix = $phpCsFile->addFixableError('Every function/method needs a newline afterwards', $closingParenthesisIndex, 'Abstract');
                if ($fix) {
                    $phpCsFile->fixer->addNewline($semicolonIndex);
                }
            }

            return;
        }

        $closingBraceIndex = $tokens[$openingBraceIndex]['scope_closer'];

        // Ignore closures
        $nextIndex = $phpCsFile->findNext(Tokens::$emptyTokens, $closingBraceIndex + 1, null, true);
        if (in_array($tokens[$nextIndex]['content'], [';', ',', ')'])) {
            return;
        }

        $nextContentIndex = $phpCsFile->findNext(T_WHITESPACE, $closingBraceIndex + 1, null, true);

        // Do not mess with the end of the class
        if ($tokens[$nextContentIndex]['type'] === 'T_CLOSE_CURLY_BRACKET') {
            return;
        }

        $this->assertNewLineAtTheEnd($phpCsFile, $closingBraceIndex, $nextContentIndex);
        $this->assertNewLineAtTheBeginning($phpCsFile, $stackPointer);
    }

    /**
     * @param \PHP_CodeSniffer\Files\File $phpCsFile File
     * @param int $closingBraceIndex Index
     * @param int|null $nextContentIndex Index
     *
     * @return void
     */
    protected function assertNewLineAtTheEnd(File $phpCsFile, $closingBraceIndex, $nextContentIndex)
    {
        $tokens = $phpCsFile->getTokens();

        if (!$nextContentIndex || $tokens[$nextContentIndex]['line'] - $tokens[$closingBraceIndex]['line'] <= 1) {
            $fix = $phpCsFile->addFixableError('Every function/method needs a newline afterwards', $closingBraceIndex, 'Concrete');
            if ($fix) {
                $phpCsFile->fixer->addNewline($closingBraceIndex);
            }
        }
    }

    /**
     * Asserts newline at the beginning, including the doc block.
     *
     * @param \PHP_CodeSniffer\Files\File $phpCsFile File
     * @param int $stackPointer Stack pointer
     *
     * @return void
     */
    protected function assertNewLineAtTheBeginning(File $phpCsFile, $stackPointer)
    {
        $tokens = $phpCsFile->getTokens();

        $line = $tokens[$stackPointer]['line'];
        $firstTokenInLineIndex = $stackPointer;
        while ($tokens[$firstTokenInLineIndex - 1]['line'] === $line) {
            $firstTokenInLineIndex--;
        }

        $prevContentIndex = $phpCsFile->findPrevious(T_WHITESPACE, $firstTokenInLineIndex - 1, null, true);
        if ($tokens[$prevContentIndex]['type'] === 'T_DOC_COMMENT_CLOSE_TAG') {
            $firstTokenInLineIndex = $tokens[$prevContentIndex]['comment_opener'];
            while ($tokens[$firstTokenInLineIndex - 1]['line'] === $line) {
                $firstTokenInLineIndex--;
            }
        }

        $prevContentIndex = $phpCsFile->findPrevious(T_WHITESPACE, $firstTokenInLineIndex - 1, null, true);

        // Do not mess with the start of the class
        if ($tokens[$prevContentIndex]['type'] === 'T_OPEN_CURLY_BRACKET') {
            return;
        }

        if ($tokens[$prevContentIndex]['line'] < $tokens[$firstTokenInLineIndex]['line'] - 1) {
            return;
        }

        $fix = $phpCsFile->addFixableError('Every function/method needs a newline before', $firstTokenInLineIndex, 'Concrete');
        if ($fix) {
            $phpCsFile->fixer->addNewline($prevContentIndex);
        }
>>>>>>> master
    }
}
