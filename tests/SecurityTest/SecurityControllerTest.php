<?php namespace App\tests\SecurityTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;

class SecurityControllerTest extends WebTestCase {

    public function setUp() :void {
    }

    /**
     * @test login success
     */
    public function testLoginSuccess() {

        $client = static::createClient();
        $userRepository = static::$container->get(UserRepository::class);
        //$testUser = $userRepository->findOneByEmail('admin@3wa.fr');
        //$client->loginUser($testUser);

        

        
//$client->request('GET', '/login');
        //$this->assertResponseIsSuccessful();
/*
        $crawler = $client->request('GET', '/login');
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