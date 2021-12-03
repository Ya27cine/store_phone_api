<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserTest extends TestCase
{

    public function testEmail(): void
    {
        $user = new User();
        $user->setEmail("example@email.fr");
        $this->assertEquals("example@email.fr", $user->getEmail() );
    }

    public function testPassword(): void
    {
        $user = new User();
        $user->setPassword("0000");
        $this->assertEquals("0000", $user->getPassword() );
    }
}
