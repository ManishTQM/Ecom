<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReactionFixture
 */
class ReactionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reaction';
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
                'upvote' => 1,
                'downvote' => 1,
            ],
        ];
        parent::init();
    }
}
