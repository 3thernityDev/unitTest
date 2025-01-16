<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Books;
use PHPUnit\Framework\TestCase;

final class EntityTest extends TestCase
{
    public function testEntity(): void
    {
        $user = new User();
        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setEmail('JohnDoe@gmail.com');

        $book1 = new Books();
        $book1->setTitle('Book1');

        $book2 = new Books();
        $book2->setTitle('Book2');

        $user->addBook($book1);
        $user->addBook($book2);

        $this->assertCount(2, $user->getBooks());
        $this->assertTrue($user->getBooks()->contains($book1));
        $this->assertTrue($user->getBooks()->contains($book2));

        $user->removeBook($book1);
        $this->assertFalse($user->getBooks()->contains($book1));
    }
}
