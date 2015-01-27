<?php

namespace RecepiesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecepiesDbControllerTest extends WebTestCase
{
    public function testShowByIdInvalid()
    {
        $client = static::createClient();
        $testId = 'kufte';
        $crawler = $client->request('GET', '/recepies/show/' . $testId);

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("No recepie found for kufte")')->count()
        );

        //ToDo: fix this: it should assert that the specific exception is thrown, 404 means nothing
    }

    public function testShowByIdNotInDb()
    {
        //ToDo: When the Id is a valid number, but such an Id is not in the database

    }

    public function testShowByIdCorrect()
    {
        $client = static::createClient();
        $testId = '6';
        $crawler = $client->request('GET', '/recepies/show/' . $testId);

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Recepie found")')->count()
        );
    }

}