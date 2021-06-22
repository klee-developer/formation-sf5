<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler= $client->request('GET', 'movie/22');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Incepion');

        $this->assertEquals(0, $crawler->filter('.row.p-sm-5')->count());
    }
}
