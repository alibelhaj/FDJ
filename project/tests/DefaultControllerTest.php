<?php


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * verify page is found
     */
    public function testPageFound()
    {
        $client = static::createClient();
        $client->request('GET', getenv("TEST_BASE_URL"));
        $this->assertResponseIsSuccessful();
    }

    /**
     * verify 5 Ball blue
     */
    public function testNumberBlueBall()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', getenv("TEST_BASE_URL"));
        $this->assertTrue($crawler->filter('span.btn-number')->count() === 5);

    }

    /**
     * verify 2 ball yellow
     */
    public function testNumberYellowBall()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', getenv("TEST_BASE_URL"));
        $this->assertTrue($crawler->filter('span.btn-star-number')->count() === 2);

    }
}
