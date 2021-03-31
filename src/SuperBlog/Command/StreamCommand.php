<?php

declare(strict_types=1);

namespace SuperBlog\Command;

use Atymic\Twitter\Contract\Twitter as TwitterV2;
use Atymic\Twitter\Twitter;
use Exception;
use Symfony\Component\Console\Output\OutputInterface;

class StreamCommand
{
    /**
     * @var Twitter|TwitterV2
     */
    private Twitter $twitter;
    private OutputInterface $output;

    /**
     * @throws Exception
     */
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
    public function __invoke(OutputInterface $output)
    {
        $this->output = $output;

        $this->twitter->getStream(
        // or $this->twitter->getSampledStream(
            function (string $data) {
                $this->out('Sweet sweet tweet: ' . $data);
            },
            [
                'expansions' => 'attachments.poll_ids,attachments.media_keys,author_id,entities.mentions.username,geo.place_id',
                Twitter::KEY_STREAM_STOP_AFTER_COUNT => 3,
            ]
        );
    }

    public function out($value): void
    {
        $this->output->writeln($value);
    }
}
