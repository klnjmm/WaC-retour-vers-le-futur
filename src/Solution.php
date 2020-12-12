<?php

declare(strict_types=1);

namespace WebAndCow\ChallengeBootstrap;

use WebAndCow\Challenge\Response;
use WebAndCow\Challenge\SolutionInterface;

class Solution implements SolutionInterface
{
    /**
     * @param array $data : $data retrieve from the API to resolve the challenge
     * @return Response
     */
    public function apply(array $data): Response
    {
        $start = new \DateTimeImmutable($data['depart'] . '-' . $data['anniversaire']);

        $shift  = collect($data['sauts'])
            ->map(fn ($jump) => new \DateTimeImmutable($jump))
            ->map(fn ($jump) => $start->diff($jump)->format('%r%y'))
            ->sum()
        ;

        return new Response(abs($shift));
    }
}
