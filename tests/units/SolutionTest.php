<?php

declare(strict_types=1);

namespace WebAndCow\ChallengeBootstrap\tests\units;

use PHPUnit\Framework\TestCase;
use WebAndCow\Challenge\Response;

class SolutionTest extends TestCase
{
    /** @dataProvider noShiftDataProvider */
    public function test_no_shift(array $input)
    {
        $solution = new \WebAndCow\ChallengeBootstrap\Solution();
        $response = new Response(0);

        $this->assertEquals($response, $solution->apply($input));
    }

    public function noShiftDataProvider(): array
    {
        return [
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1986-08-25"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1984-10-27"],
                ]
            ],
        ];
    }


    /** @dataProvider oneShiftInTheFurureDataProvider */
    public function test_one_shift_in_the_future(array $input)
    {
        $solution = new \WebAndCow\ChallengeBootstrap\Solution();
        $response = new Response(1);

        $this->assertEquals($response, $solution->apply($input));
    }

    public function oneShiftInTheFurureDataProvider(): array
    {
        return [
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1986-09-27"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1986-10-27"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1986-10-25"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1987-09-25"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1987-08-28"],
                ]
            ],
        ];
    }

    /** @dataProvider oneShiftInThePastDataProvider */
    public function test_one_shift_in_the_past(array $input)
    {
        $solution = new \WebAndCow\ChallengeBootstrap\Solution();
        $response = new Response(1);

        $this->assertEquals($response, $solution->apply($input));
    }

    public function oneShiftInThePastDataProvider(): array
    {
        return [
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1984-09-25"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1984-08-29"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1984-08-25"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1983-10-25"],
                ]
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-26",
                    'sauts' => ["1983-10-28"],
                ]
            ],
        ];
    }

    /** @dataProvider examplesDataProvider */
    public function test_examples(array $input, int $result)
    {
        $solution = new \WebAndCow\ChallengeBootstrap\Solution();
        $response = new Response($result);

        $this->assertEquals($response, $solution->apply($input));
    }

    public function examplesDataProvider(): array
    {
        return [
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "06-06",
                    'sauts' => ["1990-07-12", "1995-03-03", "1980-07-12", "1975-03-03"],
                ],
                0
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "06-23",
                    'sauts' => ["1976-05-02", "1972-02-14", "1996-12-10", "1986-05-07", "2008-08-22"],
                ],
                12
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "06-18",
                    'sauts' => ["2009-07-29", "2010-08-14", "2013-10-20", "1997-01-13", "1979-04-14", "1989-08-14", "1992-08-30", "1971-08-07", "1995-01-18"],
                ],
                89
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "01-17",
                    'sauts' => ["1994-05-22", "1978-01-29", "2010-03-18", "2008-08-16", "1990-12-10", "1981-06-24", "1983-03-05", "1976-05-25", "2008-11-04", "2002-09-23", "1977-04-02", "1976-06-16", "2002-05-19"],
                ],
                86
            ],
            [
                [
                    'depart' => 1985,
                    'anniversaire' => "09-25",
                    'sauts' => ["1991-05-19","1988-08-27","1988-08-21","2002-09-06","1994-03-07","2013-11-13","1974-06-09","1976-09-23","1970-04-29","1974-05-25","1999-10-21","2015-02-24","2008-01-07","2013-04-19","1989-10-30","2004-03-27","1991-04-25"],
                ],
                134
            ],
        ];
    }
}