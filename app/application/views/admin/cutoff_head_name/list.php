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
                            <li class="breadcrumb-item active">Cutoff Head Name</li>
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
                    <h4 class="card-title mb-0">Cutoff Head Name</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4">
                          <div class="col-sm-auto">
                             <div>
                                 <a href="<?= base_url('admin/add-cutoff-head-name'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</a>
                                 <a href="<?= base_url('admin/import-cutoff-head-name'); ?>" class="btn btn-primary add-btn" ><i class="ri-upload-2-line"></i> Import </a>
                                 <a href="<?= base_url('admin/export-cutoff-head-name'); ?>" class="btn btn-primary add-btn" ><i class="ri-download-2-line"></i> Export </a>
                              </div>
                          </div>
                       </div>

                       <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap datatables">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="s_no">S.No.</th>
                                   <th class="sort" data-sort="id">ID</th>
                                   <th class="sort" data-sort="head_name">Head Name</th>
                                   <th class="sort" data-sort="state">State</th>
                                   <th class="sort" data-sort="course">Course</th>
                                    <th class="sort" data-sort="level">Level</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($counsellingHeadList)) {
                                      foreach($counsellingHeadList as $key=>$head){
                                        $stateData = $this->db->get_where('tbl_state',array('id'=>$head['state_id']))->row_array();
                                        $courseid=explode('|',$head['course_id']);
                                        $courses=$this->db->select('*')->where_in('id',$courseid)->get('tbl_course')->result_array();
                                        $coursename="";
                                        foreach($courses as $course){
                                            $coursename.=$course['course'].",";
                                        }
                                        $courseData = $this->db->get_where('tbl_course',array('id'=>$head['course_id']))->row_array();
                                        $levelData = $this->db->get_where('tbl_counselling_level',array('id'=>$head['level_id']))->row_array();
                                ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= $head['id']; ?></td>
                                        <td><?= $head['head_name']; ?></td>
                                        <td><?= ($stateData) ? $stateData['name'] : 'All State'; ?></td>
                                        <td><?= ($coursename) ? $coursename : ''; ?></td>
                                        <td><?= ($levelData) ? $levelData['level'] : ''; ?></td>
                                        <td>
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-cutoff-head-name'.'/'.$head['id']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $head['id']; ?>" url="<?= base_url('admin/delete-cutoff-head-name'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
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