<?= $this->Html->css([
        // 'vendor/aos/aos',
        // 'vendor/bootstrap/css/bootstrap.min',
        // 'vendor/bootstrap-icons/bootstrap-icons',
        // 'vendor/boxicons/css/boxicons.min',
        // 'vendor/glightbox/css/glightbox.min',
        // 'vendor/remixicon/remixicon',
        // 'vendor/swiper/swiper-bundle.min',
        'normalize.min',
        'milligram.min',
        'cake',
        'style'
          
        ]) ?>
                 <?php echo $this->Flash->render() ?>

<div class="column-responsive column-80">
<div class="container">

        <div class="users view content">
        <?= $this->Html->link(__('Back'), ['controller'=>'Products','action' => 'list'], ['class' => 'button float-right']) ?>

        <!-- <?= $this->Html->link('Back', ['controller'=>'Products','action' => 'list']) ?> -->

            <h3><?= h($post->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                </tr>
                <div>

                    <td><?= h($post->product_title) ?></td>
                </div>
                <tr>
                    <th><?= __('Product Description') ?></th>
                </tr>
                <div>

                    <td><?= h($post->product_description) ?></td>
                </div>
                <div>
                
                    <tr>
                        <th><?= __('Post image') ?></th>
                    </tr>

                </div>
                <div>
                    
                    <td><?= $this->Html->image('/'.'upload/'.$post->product_image) ?></td>
                </div>
               
            </table>
            <table>
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Comment Time</th>

                
            </tr>
            <?php foreach ($post->product_comments as $posts): ?>
            <tr>                
                    <td><?= h($posts->user_id) ?></td>
                    <td><?= h($posts->name) ?></td>

                    <td><?= h($posts->comments) ?></td>
                    <td><?= h($posts->created_date) ?></td>


                    
                </tr>

                <?php endforeach; ?>
            </table>

            <?= $this->Form->create($comment) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('comments');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            </div>

</div>
</div>
