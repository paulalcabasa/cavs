<style type="text/css">
    .transaction-pagination .pagination-first a,
    .transaction-pagination .pagination-last a {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
        margin-left: 5px;
        border-radius: 3px;
    }

    .transaction-pagination .pagination-first a:hover,
    .transaction-pagination .pagination-last a:hover,
    .transaction-pagination .pagination-first a:focus,
    .transaction-pagination .pagination-last a:focus {
        color: #fff;
        background-color: #286090;
        border-color: #204d74;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Transactions <small>Recent transaction history</small></h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Transaction List</h3>
            </div>
            <div class="box-body">
                <form method="get" action="<?php echo site_url('transactions'); ?>" class="form-inline" role="search">
                    <div class="form-group">
                        <label for="transaction_date">Date</label>
                        <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="<?php echo html_escape($transaction_date); ?>">
                    </div>
                    <div class="form-group" style="margin-left:10px;">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo html_escape($customer_name); ?>" maxlength="150">
                    </div>
                    <div class="form-group" style="margin-left:10px;">
                        <label for="customer_type">Customer Type</label>
                        <select class="form-control" id="customer_type" name="customer_type">
                            <option value="">All</option>
                            <?php foreach ($customer_types as $type): ?>
                                <option value="<?php echo (int) $type->id; ?>"<?php echo $customer_type == $type->id ? ' selected' : ''; ?>><?php echo html_escape($type->person_type_name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group" style="margin-left:10px;">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">All</option>
                            <option value="Completed"<?php echo $status === 'Completed' ? ' selected' : ''; ?>>Completed</option>
                            <option value="Cancelled"<?php echo $status === 'Cancelled' ? ' selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-search"></i> Search</button>
                    <a href="<?php echo site_url('transactions'); ?>" class="btn btn-default">Reset</a>
                </form>

                <div class="clearfix" style="margin-bottom:15px;"></div>
                <?php if ($total_rows > 0): ?>
                    <p class="text-muted">Showing <?php echo count($transactions); ?> of <?php echo (int) $total_rows; ?> transactions</p>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="tbl_all_transactions">
                        <thead>
                            <tr>
                                <th>Transaction No</th>
                                <th>Customer</th>
                                <th>Customer Type</th>
                                <th>Total Amount</th>
                                <th>Amount Tendered</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($transactions)): ?>
                                <tr><td colspan="8" class="text-center">No transactions found.</td></tr>
                            <?php else: ?>
                                <?php foreach ($transactions as $transaction): ?>
                                    <tr>
                                        <td><?php echo html_escape($transaction->transaction_no); ?></td>
                                        <td>
                                            <?php if ($transaction->person_type_name == 'Guest') { ?>
                                                <?php echo html_escape($transaction->customer_name); ?>
                                            <?php } else { ?>
                                                <?php echo html_escape($transaction->employee_no); ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo html_escape($transaction->person_type_name); ?></td>
                                        <td class="text-right"><?php echo number_format((float) $transaction->total_amount, 2); ?></td>
                                        <td class="text-right"><?php echo number_format((float) $transaction->amount_tendered, 2); ?></td>
                                        <td><?php echo html_escape(date('m/d/Y h:i A', strtotime($transaction->date_created))); ?></td>
                                        <td><?php echo html_escape($transaction->status); ?></td>
                                        <td><a class="btn btn-xs btn-default" href="<?php echo site_url('transaction/view/' . encode_string($transaction->id)); ?>"><i class="fa fa-eye"></i> View</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="transaction-pagination">
                    <?php echo $pagination_links; ?>
                </div>
            </div>
        </div>
    </section>
</div>

