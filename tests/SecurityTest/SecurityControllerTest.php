<?php namespace App\tests\SecurityTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase {

    private $client1;

    public function setUp() :void {
        $this->client = static::createClient();
    }

    /**
     * @test login success
     */
    public function testLoginSuccess() {

        $client = static::createClient();

        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();

        /*
        $form = $crawler->selectButton('Connexion')->form([
            'email' => 'admin@3wa.fr',
            'password' => 'admin',
        ]);

        $this->client->submit($form);
        $this->assertResponseRedirects('/');
        */
    }



}
/*
    public function testLoginFormSuccess()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Connexion')->form([
            'username' => 'camile',
            'password' => 'camile',
        ]);

        $client->submit($form);

        $this->assertResponseRedirects('/');
    }

    public function testLoginFormFailure()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Connexion')->form([
            'username' => 'camile',
            'password' => 'wrong password',
        ]);

        $client->submit($form);

        $this->assertResponseRedirects('/login');
    }
}
*/