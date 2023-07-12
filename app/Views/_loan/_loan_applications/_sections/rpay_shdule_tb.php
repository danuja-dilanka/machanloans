<div class="table-responsive">
    <table class="table table-bordered custom_dt_table no-footer dtr-inline">
        <thead>
            <tr>
                <th class="">Date</th>
                <th class="text-right ">Amount to Pay</th>
                <th class="text-right ">Late Penalty</th>
                <th class="text-right ">Principal Amount</th>
                <th class="text-right ">Interest</th>
                <th class="text-right ">Balance</th>
                <th class="text-center ">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $last_amount = $data->last_amount + ($data->last_amount * ($data->lp_int_rate / 100));
            $due_dates = $pay_periods["due_dates"];
            for ($i = 0; $i < count($due_dates); $i++) {
                $pay_det = model('Loan_model')->get_loan_pay_all_data_by("pay_date='" . $due_dates[$i] . "'");
                ?>
                <tr>
                    <td><?= $due_dates[$i] ?></td>
                    <td><?= number_format($pay_periods["charge"], 2, ".", ","); ?></td>
                    <td><?= isset($pay_det->pen_amount) ? number_format($pay_det->pen_amount, 2, ".", ",") : "-" ?></td>
                    <td><?= number_format($data->last_amount, 2, ".", ",") ?></td>
                    <td><?= $data->lp_int_rate ?></td>
                    <td><?= isset($pay_det->total) ? number_format($last_amount - $pay_det->total, 2, ".", ",") : "" ?></td>
                    <td><?= $data->loan_period == $data->paid_period ? "Paid" : "Unpaid" ?></td>
                </tr>
                <?php
                $last_amount -= (isset($pay_det->total) ? $pay_det->total : 0);
            }
            ?>
        </tbody>
    </table>
</div>