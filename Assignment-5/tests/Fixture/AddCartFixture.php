<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddCartFixture
 */
class AddCartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'add_cart';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
