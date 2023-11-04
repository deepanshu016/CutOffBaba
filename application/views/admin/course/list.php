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
                            <li class="breadcrumb-item active">Courses List</li>
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
                    <h4 class="card-title mb-0">Courses List</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/add-course'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</a>
                                <!-- <a href="<?= base_url('admin/import-course'); ?>" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i> Import</a> -->
                             </div>
                          </div>
                          <div class="col-sm">
                             <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                   <input type="text" class="form-control search" placeholder="Search...">
                                   <i class="ri-search-line search-icon"></i>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="table-responsive table-card mt-3 mb-1">
                          <table class="table align-middle table-nowrap" id="customerTable">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="s_no">S.No.</th>
                                   <th class="sort" data-sort="banner_title">Course Title</th>
                                   <th class="sort" data-sort="banner_title">Course Thumbnail</th>
                                   <th class="sort" data-sort="banner_title">Course Description</th>
                                   <th class="sort" data-sort="banner_image">Price</th>
                                   <th class="sort" data-sort="description">Discount</th>
                                   <th class="sort" data-sort="status">Status</th>
                                   <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($courseList)) { 
                                    foreach($courseList as $key=>$course){
                                ?>
                                    <tr>
                                        <td class="s_no"><?= $key+1; ?></td>
                                        <td class="banner_title"><?= $course['course_title']; ?></td>
                                        <?php if(file_exists(FCPATH.'assets/uploads/courses'.'/'.$course['course_thumbnail'])){ ?>
                                          <td class="banner_image"><img src="<?= base_url('assets/uploads/course'.'/'.$course['course_thumbnail']) ?>" height="100" width="100" class="rounded-circle"></td>
                                        <?php } else{ ?>
                                          <td class="logo">No Uploaded</td>
                                        <?php } ?>
                                        <td class="banner_title"><?= $course['short_description']; ?></td>
                                        <td class="description"><?= $course['course_price']; ?></td>
                                         <?php if(isset($course['discount_price'])) { ?>
                                            <td class="status"><?= $course['discount_price']; ?></td>
                                        <?php } else { ?>
                                            <td class="status"><span class="badge bg-success">No Discount</span></td>
                                        <?php } ?>
                                        <?php if($course['status'] == 0) { ?>
                                            <td class="status"><span class="badge bg-danger">Inactive</span></td>
                                        <?php } else { ?>
                                            <td class="status"><span class="badge bg-success">Active</span></td>
                                        <?php } ?>
                                        <td class="action">
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-course'.'/'.$course['id'].'/'.$course['slug']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $course['id']; ?>" url="<?= base_url('admin/delete-course'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
                                           </div>
                                        </td>
                                    </tr>
                                <?php } } ?>
                             </tbody>
                          </table>
                       </div>
                       <div class="d-flex justify-content-end">
                          <div class="pagination-wrap hstack gap-2">
                             <a class="page-item pagination-prev disabled" href="#">
                             Previous
                             </a>
                             <ul class="pagination listjs-pagination mb-0">
                                <li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li>
                             </ul>
                             <a class="page-item pagination-next" href="#">
                             Next
                             </a>
                          </div>
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