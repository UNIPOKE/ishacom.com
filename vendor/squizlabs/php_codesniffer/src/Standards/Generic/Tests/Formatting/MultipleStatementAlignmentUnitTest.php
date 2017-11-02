<?php
/**
 * Unit test class for the MultipleStatementAlignment sniff.
 *
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2015 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

namespace PHP_CodeSniffer\Standards\Generic\Tests\Formatting;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class MultipleStatementAlignmentUnitTest extends AbstractSniffUnitTest
{


    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getErrorList()
    {
        return array();

    }//end getErrorList()


    /**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @param string $testFile The name of the file being tested.
     *
     * @return array<int, int>
     */
    public function getWarningList($testFile='MultipleStatementAlignmentUnitTest.inc')
    {
        switch ($testFile) {
        case 'MultipleStatementAlignmentUnitTest.inc':
            return array(
                    11  => 1,
                    12  => 1,
                    23  => 1,
                    24  => 1,
                    26  => 1,
                    27  => 1,
                    37  => 1,
                    38  => 1,
                    48  => 1,
                    50  => 1,
                    51  => 1,
                    61  => 1,
                    62  => 1,
                    64  => 1,
                    65  => 1,
                    71  => 1,
                    78  => 1,
                    79  => 1,
                    86  => 1,
                    92  => 1,
                    93  => 1,
                    94  => 1,
                    95  => 1,
                    123 => 1,
                    124 => 1,
                    126 => 1,
                    129 => 1,
                    154 => 1,
                    161 => 1,
                    178 => 1,
                    179 => 1,
                    182 => 1,
                    206 => 1,
                    207 => 1,
                   );
        break;
        case 'MultipleStatementAlignmentUnitTest.js':
            return array(
                    11  => 1,
                    12  => 1,
                    23  => 1,
                    24  => 1,
                    26  => 1,
                    27  => 1,
                    37  => 1,
                    38  => 1,
                    48  => 1,
                    50  => 1,
                    51  => 1,
                    61  => 1,
                    62  => 1,
                    64  => 1,
                    65  => 1,
                    71  => 1,
                    78  => 1,
                    79  => 1,
                    81  => 1,
                    82  => 1,
                    83  => 1,
                    85  => 1,
                    86  => 1,
                    100 => 1,
                   );
            break;
        default:
            return array();
            break;
        }//end switch

    }//end getWarningList()


}//end class
