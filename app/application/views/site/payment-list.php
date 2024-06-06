<?php $this->load->view('site/header'); ?>
      <style>
         .card-horizontal {
         display: flex;
         flex: 1 1 auto;
         }
      </style>
      <main class="snnxbgs">
         <section class="paymentList">  
         <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Payment History</h4>
                    <div> 
                    <table class="table table-bordered">
                    <thead class="bgCutTbale">
                        <tr>

                        <th scope="col">Date</th>
                        <th scope="col">Txn ID</th>
                        <th scope="col">Amount</th> 
                        </tr>
                    </thead>
                    <tbody class="text-center">
                     <?php if(!empty($paymentsData)) {
                        foreach($paymentsData as $payment) { ?>
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
         <?php $this->load->view('site/footer'); ?>
      </main>