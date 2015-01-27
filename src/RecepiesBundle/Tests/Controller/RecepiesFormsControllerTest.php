<?php
namespace RecepiesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecepiesFormsControllerTest extends WebTestCase
{
    public function testCreateInvalidTitleRedirect()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/recepies/forms/create');

        $invalidForm = $crawler->selectButton('Create Recepie')->form();

        $invalidForm['form[title]'] = 'too sshrt';
        $invalidForm['form[body]'] = 'lorem ipsum something something dark side';
        //echo 'ECHO \n' . $invalidForm['form[title]']->getValue();

        $errorCrawler = $client->submit($invalidForm);
        echo '_____ECHO______ ' . $client->getResponse()->getContent();
        //I guess there's no redirect, maybe it just reloads the page with the error msg
        //$errorCrawler = $client->followRedirect();

        //$errorCrawler = $client->getCrawler();

        $this->assertGreaterThan(
        0,
        $errorCrawler->filter('html:contains("This value is too short. It should have 10 characters or more.")')
            ->count()
        );


    }


}