<div class="row">
  <div class="container mx-5">
    <div class="column-responsive column-80">
        <div class="productCategories view content">
            <h3><?= h($productCategory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($productCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($productCategory->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Users Id') ?></th>
                    <td><?= $productCategory->users_id === null ? '' : $this->Number->format($productCategory->users_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($productCategory->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified Date') ?></th>
                    <td><?= h($productCategory->modified_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
