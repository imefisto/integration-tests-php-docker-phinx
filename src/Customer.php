<?php declare(strict_types=1);

namespace ExampleApp;

class Customer
{
    public readonly string $name;
    public readonly string $email;

    public function __construct(public readonly ?int $id = null)
    {
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
