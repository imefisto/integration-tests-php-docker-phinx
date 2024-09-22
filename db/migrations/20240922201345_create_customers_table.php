<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCustomersTable extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('customers');
        $table->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->create();
    }

    public function down(): void
    {
        throw new \RuntimeException('No way to go back!');
    }
}
