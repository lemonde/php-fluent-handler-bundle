<?php declare(strict_types=1);

namespace FluentHandlerBundle\Service;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\Formatter\JsonFormatter;
use Fluent\Logger\FluentLogger;

class FluentHandlerService extends AbstractProcessingHandler
{
    /**
     * @var FluentLogger
     */
    private $logger;

    /**
     * @var string
     */
    private $channel;

    /**
     * @param FluentLogger $logger
     * @param string $level
     * @param bool $bubble
     */
    public function __construct(FluentLogger $logger, string $level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function write(array $record)
    {
        $record['severity'] = Logger::getLevelName($record['level']);
        $this->logger->post($this->channel, $record);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultFormatter(): JsonFormatter
    {
        return new JsonFormatter();
    }

    /**
     * @param string $channel
     */
    public function setChannel(string $channel)
    {
        $this->channel = $channel;
    }
}
