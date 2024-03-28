<?php $this->load->view('admin/header'); ?>
<?php $this->load->view('admin/sidebar'); ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Candidates</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">Candidates</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">

                       <div class="table-responsive table-card mt-3 mb-1">
                          <table class="table align-middle table-nowrap datatables">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="customer_name">S.No.</th>
                                   <th class="sort" data-sort="customer_name">ID</th>
                                    <th class="sort" data-sort="Branch">Name</th>
                                    <th class="sort" data-sort="Branch">Email</th>
                                    <th class="sort" data-sort="Branch">Mobile</th>
                                    <th class="sort" data-sort="Branch">Registered at</th>
                                    <th class="sort" data-sort="Branch">Exam</th>
                                    <th class="sort" data-sort="Branch">Marks</th>
                                   <!-- <th class="sort" data-sort="action">Action</th> -->
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($candidateList)) {
                                      foreach($candidateList as $key=>$candidate){
                                        $examData = $this->db->select('*')->from('tbl_exam')->where('id',$candidate['selected_exam'])->get()->row();
                                ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= $candidate['id']; ?></td>
                                        <td><?= $candidate['name']; ?></td>
                                        <td><?= $candidate['email']; ?></td>
                                        <td><?= $candidate['mobile']; ?></td>
                                        <td><?= date('d M Y',strtotime($candidate['mobile'])); ?></td>
                                        <td><?= @$examData->exam; ?></td>
                                        <td>
                                            <p>AIR:- <?= ($candidate['air']) ? $candidate['air'] : 'Not added'; ?></p>
                                            <p>SR:- <?= ($candidate['sr']) ? $candidate['sr'] : 'Not added'; ?></p>
                                            <p>Marks:- <?= ($candidate['marks']) ? $candidate['marks'] : 'Not added'; ?></p>
                                        </td>
                                    </tr>
                                <?php } } ?>
                             </tbody>
                          </table>

                       </div>

                    </div>
                 </div>
                 <!-- end card -->
              </div>
              <!-- end col -->
           </div>
           <!-- end col -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<?php $this->load->view('admin/footer'); ?>