<?php

namespace Tests\FluentHandlerBundle\Service;

use FluentHandlerBundle\Service\FluentHandlerService;

class FluentHandlerServiceTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockFluentLogger = $this->getMockBuilder('Fluent\Logger\FluentLogger')
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();
    }

    /**
     * @dataProvider providerWrite
     */
    public function testWrite($record, $expectedTag, $expectedData)
    {
        $this->mockFluentLogger->expects($this->once())
            ->method('post')
            ->with($expectedTag, $expectedData);

        $fluentHandlerService = new FluentHandlerService($this->mockFluentLogger);
        $fluentHandlerService->write($record);
    }

    public function providerWrite()
    {
        return [
            [
                [
                    'message' => 'Log message',
                    'level' => 200,
                    'channel' => 'request',
                ],
                'request',
                [
                    'message' => 'Log message',
                    'level' => 200,
                    'channel' => 'request',
                    'severity' => 'INFO',
                ],
            ]
        ];
    }
}
