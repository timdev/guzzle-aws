<?php
/**
 * @package Guzzle PHP <http://www.guzzlephp.org>
 * @license See the LICENSE file that was distributed with this source code.
 */

namespace Guzzle\Aws\Tests\S3\Command\Bucket;

/**
 * @author Michael Dowling <michael@guzzlephp.org>
 */
class GetBucketVersioningTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Guzzle\Aws\S3\Command\Bucket\GetBucketVersioning
     */
    public function testGetBucketVersioning()
    {
        $command = new \Guzzle\Aws\S3\Command\Bucket\GetBucketVersioning();
        $command->setBucket('test');

        $client = $this->getServiceBuilder()->get('test.s3');
        $this->setMockResponse($client, 's3/GetBucketVersioningResponse');
        $client->execute($command);

        $this->assertEquals('http://test.s3.amazonaws.com/?versioning', $command->getRequest()->getUrl());
        $this->assertEquals('GET', $command->getRequest()->getMethod());
        $this->assertEquals('Enabled', (string)$command->getResult()->Status);
    }
}