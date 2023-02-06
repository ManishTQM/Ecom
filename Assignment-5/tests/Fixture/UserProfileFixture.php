<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProfileFixture
 */
class UserProfileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_profile';
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
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'contact' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'profile_image' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-30 09:16:53',
                'modified_date' => '',
            ],
        ];
        parent::init();
    }
}
