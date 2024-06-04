<?php include('header.php'); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Payments</li>
    </ol>
  <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-3">
        <div class="card dashboard text-white o-hidden h-100">
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Txn ID</th>
                    <th>Amount</th> 
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Txn ID</th>
                    <th>Amount</th> 
                  </tr>
                </tfoot>
                <tbody>
                    <?php if(!empty($paymentList)) {
                        foreach($paymentList as $payment) { ?>
                        <tr> 
                           <td><?= date('d M Y',strtotime($payment['purchased_date'])); ?></td>
                           <td><?= $payment['txn_id']; ?></td>
                           <td>₹ <?= $payment['amount']; ?></td>
                        </tr>
                    <?php } } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
	</div>
	
  </div>
</div>
<?php include('footer.php'); ?>