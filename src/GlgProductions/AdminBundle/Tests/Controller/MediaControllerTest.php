<?php

namespace GlgProductions\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MediaControllerTest extends WebTestCase
{
    public function testUploadmedia()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/eme');
    }

}
