<?php declare(strict_types=1);

namespace ExampleApp;

use PDO;

class CustomerRepository
{
    private PDO $pdo;

    public function __construct(
        string $host,
        string $db,
        string $user,
        string $pass,
        string $port,
        string $charset
    ) {
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
        
        $this->pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    public function insert(Customer $customer): int
    {
        $sql = 'INSERT INTO customers (name, email) VALUES (:name, :email)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':name' => $customer->name,
            ':email' => $customer->email,
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function findById(int $id): ?Customer
    {
        $sql = 'SELECT id, name, email FROM customers WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $customer = new Customer($id);
        $customer->setName($data['name']);
        $customer->setEmail($data['email']);

        return $customer;
    }
}
