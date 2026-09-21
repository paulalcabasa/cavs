<div class="content-wrapper">
    <section class="content-header">
        <h1>Food Sales Inventory</h1>
        <small>Total Items: <span class="badge btn-success"><?= $totalItems; ?></span></small>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="get" action="<?= $baseUrl; ?>" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="expense_status">Status</label>
                            <select id="expense_status" name="status" class="form-control">
                                <option value="0" <?= $statusId === 0 ? 'selected' : ''; ?>>All</option>
                                <option value="5" <?= $statusId === 5 ? 'selected' : ''; ?>>New</option>
                                <option value="6" <?= $statusId === 6 ? 'selected' : ''; ?>>Finalized</option>
                                <option value="2" <?= $statusId === 2 ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="expense_search">Food name</label>
                            <input id="expense_search" type="text" name="search" value="<?= html_escape($search); ?>" class="form-control" placeholder="Search food name">
                        </div>
                        <div class="col-md-2">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary form-control">Search</button>
                        </div>
                    </div>
                </form>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Expense No</th>
                            <th>Category</th>
                            <th>Food Name</th>
                            <th>Total Expense</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($expenses as $expense) : ?>
                        <tr>
                            <td><?= html_escape($expense->expense_no); ?></td>
                            <td><?= html_escape($expense->category); ?></td>
                            <td><?= html_escape($expense->description); ?></td>
                            <td><?= html_escape($expense->total_expense); ?></td>
                            <td><?= html_escape($expense->status); ?></td>
                            <td><?= html_escape($expense->date_created); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="view_details/<?= encode_string($expense->food_id); ?>">View Details</a></li>
                                        <?php if ($expense->status === 'New') : ?>
                                            <li><a href="#" class="btn_update_status" data-id="<?= $expense->food_id; ?>" data-state_id="6">Finalize</a></li>
                                            <li><a href="cancel_expense_item/<?= encode_string($expense->food_id); ?>">Cancel</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($expenses)) : ?>
                        <tr><td colspan="7" class="text-center">No expenses found.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <?php
                        $query = '&status=' . $statusId . '&search=' . urlencode($search);
                    ?>
                    <li class="<?= $pageNo <= 1 ? 'disabled' : ''; ?>">
                        <a href="<?= $pageNo <= 1 ? '#' : $baseUrl . '1?' . ltrim($query, '&'); ?>">First</a>
                    </li>
                    <li class="<?= $pageNo <= 1 ? 'disabled' : ''; ?>">
                        <a href="<?= $pageNo <= 1 ? '#' : $baseUrl . ($pageNo - 1) . '?' . ltrim($query, '&'); ?>">Prev</a>
                    </li>
                    <li class="<?= $pageNo >= $totalPages ? 'disabled' : ''; ?>">
                        <a href="<?= $pageNo >= $totalPages ? '#' : $baseUrl . ($pageNo + 1) . '?' . ltrim($query, '&'); ?>">Next</a>
                    </li>
                    <li class="<?= $pageNo >= $totalPages ? 'disabled' : ''; ?>">
                        <a href="<?= $pageNo >= $totalPages ? '#' : $baseUrl . $totalPages . '?' . ltrim($query, '&'); ?>">Last</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
<script>
$(document).on('click', '.btn_update_status', function(event) {
    event.preventDefault();
    $.post('<?= base_url(); ?>Inventory_Expense/update_food_state', {
        food_id: $(this).data('id'),
        transaction_state_id: $(this).data('state_id')
    }).done(function() {
        window.location.reload();
    });
});
</script>
