<div class="content-wrapper">
    <section class="content-header">
        <h1>Food Items Onhand</h1>
        <small>Total Items: <span class="badge btn-success"><?= $foodTotal; ?></span></small>
        <a href="<?= base_url(); ?>reports/view_food_items_onhand" target="_blank" class="btn btn-primary pull-right">
            Download All
        </a>
    </section>
    <section class="content">
        <form action="<?= $onhandBaseUrl; ?>" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="search" value="<?= html_escape($query); ?>" class="form-control" placeholder="Search by food name...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Food No</th>
                            <th>Category</th>
                            <th>Food Name</th>
                            <th>Initial Quantity</th>
                            <th>Remaining Quantity</th>
                            <th>Sold Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($foods as $food) : ?>
                        <tr>
                            <td><?= html_escape($food->food_no); ?></td>
                            <td><?= html_escape($food->category); ?></td>
                            <td><?= html_escape($food->food_name); ?></td>
                            <td><?= html_escape($food->initial_quantity); ?></td>
                            <td><?= html_escape($food->remaining_quantity); ?></td>
                            <td><?= html_escape($food->sold_quantity); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($foods)) : ?>
                        <tr>
                            <td colspan="6" class="text-center">No food items found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <li class="<?php if ($pageNo <= 1) { echo 'disabled'; } ?>">
                        <a href="<?= $pageNo <= 1 ? '#' : $onhandBaseUrl . '1' . ($query === '' ? '' : '?search=' . urlencode($query)); ?>">First</a>
                    </li>
                    <li class="<?php if ($pageNo <= 1) { echo 'disabled'; } ?>">
                        <a href="<?= $pageNo <= 1 ? '#' : $onhandBaseUrl . ($pageNo - 1) . ($query === '' ? '' : '?search=' . urlencode($query)); ?>">Prev</a>
                    </li>
                    <li class="<?php if ($pageNo >= $totalPages) { echo 'disabled'; } ?>">
                        <a href="<?= $pageNo >= $totalPages ? '#' : $onhandBaseUrl . ($pageNo + 1) . ($query === '' ? '' : '?search=' . urlencode($query)); ?>">Next</a>
                    </li>
                    <li class="<?php if ($pageNo >= $totalPages) { echo 'disabled'; } ?>">
                        <a href="<?= $pageNo >= $totalPages ? '#' : $onhandBaseUrl . $totalPages . ($query === '' ? '' : '?search=' . urlencode($query)); ?>">Last</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
