<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($post->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product Title') ?></th>
                    <td><?= h($post->product_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Description') ?></th>
                    <td><?= h($post->product_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Image') ?></th>
                    <td><?= h($post->product_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Tags') ?></th>
                    <td><?= h($post->product_tags) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($post->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($post->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Category') ?></th>
                    <td><?= $post->product_category === null ? '' : $this->Number->format($post->product_category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($post->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($post->modified_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Product Comments') ?></h4>
                <?php if (!empty($post->product_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Comments') ?></th>
                            <th><?= __('Created Date') ?></th>
                            <th><?= __('Modified Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->product_comments as $productComments) : ?>
                        <tr>
                            <td><?= h($productComments->id) ?></td>
                            <td><?= h($productComments->product_id) ?></td>
                            <td><?= h($productComments->user_id) ?></td>
                            <td><?= h($productComments->comments) ?></td>
                            <td><?= h($productComments->created_date) ?></td>
                            <td><?= h($productComments->modified_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ProductComments', 'action' => 'view', $productComments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ProductComments', 'action' => 'edit', $productComments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductComments', 'action' => 'delete', $productComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productComments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div> -->









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
        <?= $this->Html->link(__('Back'), ['controller'=>'Products','action' => 'index'], ['class' => 'button float-right']) ?>

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
                        <th><?= __('Product image') ?></th>
                    </tr>

                </div>
                <div>
                    
                    <td><?= $this->Html->image('/'.'upload/'.$post->product_image) ?></td>
                </div>
               
            </table>
            <table>
            <tr>
                <th>User Id</th>
                <th>Comment</th>
                <th>Comment Time</th>
                <th>Action</th>


                
            </tr>
            <?php foreach ($post->product_comments as $posts): ?>
            <tr>                
                    <td><?= h($posts->user_id) ?></td>
                    <td><?= h($posts->comments) ?></td>
                    <td><?= h($posts->created_date) ?></td>


                  <td>  <?= $this->Form->postLink(_('Delete'), [ 'action' => 'commentdelete',$posts->id, $posts->product_id], ['confirm' => _('Are you sure you want to delete # {0}?')]) ?>
            </td>
                </tr>

                <?php endforeach; ?>
            </table>

          
            </div>

</div>
</div>
