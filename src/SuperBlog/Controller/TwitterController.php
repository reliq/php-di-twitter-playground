<?php

declare(strict_types=1);

namespace SuperBlog\Controller;

use Atymic\Twitter\Contract\Twitter as TwitterV2;
use Atymic\Twitter\Twitter;
use Exception;

class TwitterController
{
    /**
     * @var Twitter|TwitterV2
     */
    private Twitter $twitter;

    public function __construct(Twitter $twitter)
    {
        $consumerKey = '';
        $consumerSecret = '';
        $accessToken = '';
        $accessTokenSecret = '';

        $this->twitter = $twitter->usingCredentials($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
    }

    /**
     * @throws Exception
     */
    public function check(): void
    {
        $result = $this->twitter->getUserByUsername('iamreliq');

        $this->out($result);
    }

    /**
     * @noinspection ForgottenDebugOutputInspection
     */
    public function out($value): void
    {
        echo "<pre>";
        var_dump($value);
        die;
    }
}
