<?php declare(strict_types=1);

namespace ExampleApp\Testing\Integration;

use ExampleApp\Customer;
use ExampleApp\CustomerRepository;
use ExampleApp\Testing\Integration\IntegrationTestCase;

class CustomerRepositoryTest extends IntegrationTestCase
{
    private CustomerRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new CustomerRepository(
            getenv('DB_HOST'),
            getenv('DB_NAME'),
            getenv('DB_USER'),
            getenv('DB_PASS'),
            getenv('DB_PORT'),
            getenv('DB_CHARSET')
        );
    }
    
    public function testInsertAndRetrieveCustomer(): void
    {
        $customer = new Customer();
        $customer->setName('Juan Pérez');
        $customer->setEmail('juan@example.com');

        $insertedId = $this->repository->insert($customer);
        $retrievedCustomer = $this->repository->findById($insertedId);

        $this->assertNotNull($retrievedCustomer);
        $this->assertEquals('Juan Pérez', $retrievedCustomer->name);
        $this->assertEquals('juan@example.com', $retrievedCustomer->email);
    }
}
