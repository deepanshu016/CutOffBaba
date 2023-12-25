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
                            <li class="breadcrumb-item active">Exams</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Exams</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/add-exams'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</a>
                                 <a href="<?= base_url('admin/import-exams'); ?>" class="btn btn-primary add-btn" ><i class="ri-upload-2-line"></i> Import </a>
                              </div>
                          </div>
                       </div>

                       <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap datatables">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="customer_name">S.No.</th>
                                   <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="email">Exam</th>
                                    <th class="sort" data-sort="exam_full_name">Exam Full Name</th>
                                    <th class="sort" data-sort="exam_short_name">Exam Short Name</th>
                                    <th class="sort" data-sort="degree_type">Degree Type</th>
                                    <th class="sort" data-sort="eligibility">Eligibility</th>
                                    <th class="sort" data-sort="exam_duration">Exam Duration</th>
                                    <th class="sort" data-sort="maximum_marks">Maximum Marks</th>
                                    <th class="sort" data-sort="passing_marks">Passing Marks</th>
                                    <th class="sort" data-sort="qualifying_marks">Qualifying Marks</th>
                                   <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($examList)) {
                                      foreach($examList as $key=>$exam){
                                          $degreeData = $this->db->get_where('tbl_degree_type',array('id'=>$exam['degree_type']))->row_array();
                              ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= $exam['id']; ?></td>
                                        <td><?= $exam['exam']; ?></td>
                                        <td><?= $exam['exam_full_name']; ?></td>
                                        <td><?= $exam['exam_short_name']; ?></td>
                                        <td><?= @$degreeData['degreetype']; ?></td>
                                        <td><?= $exam['eligibility']; ?></td>
                                        <td><?= $exam['exam_duration']; ?></td>
                                        <td><?= $exam['maximum_marks']; ?></td>
                                        <td><?= $exam['passing_marks']; ?></td>
                                        <td><?= $exam['qualifying_marks']; ?></td>
                                        <td>
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-exams'.'/'.$exam['id']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $exam['id']; ?>" url="<?= base_url('admin/delete-exams'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
                                           </div>
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