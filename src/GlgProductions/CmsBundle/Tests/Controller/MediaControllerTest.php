<?php

namespace GlgProductions\CmsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MediaControllerTest extends WebTestCase
{
    public function testGallery()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/gallery');
    }

    public function testUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/media/upload');
    }

}
