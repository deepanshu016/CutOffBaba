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
                            <li class="breadcrumb-item active">Cutoff Entry Data</li>
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
                    <h4 class="card-title mb-0">Cutoff Entry Data</h4>
                    <div class="col-sm-auto">
                       <div>
                             <a href="<?= base_url('admin/import-cutoffdata'); ?>" class="btn btn-success add-btn" ><i class="ri-upload-2-line"></i> Import</a>
                             <a href="#" class="btn btn-primary add-btn" onclick="downloaddata();" ><i class="ri-download-2-line"></i> Export</a>
                        </div>
                     </div>
                 </div>

                 <!-- end card header -->
                 <div class="card-body">
                     <div class="col-md-12">
                        <form action="<?= base_url('admin/filter-cutoff-data') ?>" method="POST" class="all-form-server">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Head Name</label>
                                        <select class="form-control form-select" name="head_id" id="head_id">
                                            <option value="">Select</option>
                                            <?php
                                            $headList = get_master_data('tbl_counselling_head',[]);
                                            if(!empty($headList)){
                                                foreach($headList as $head){ ?>
                                                    <option value="<?= $head['id']; ?>"><?= $head['head_name']; ?></option>
                                                <?php } } ?>
                                        </select>
                                        <span class="text-danger" id="head_id"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year</label>
                                            <select name="year" class="form-control" id="year">
                                            <?php
                                            // Get the current year
                                            $currentYear = date("Y");

                                            // Loop to display the last 4 years
                                            for ($i = $currentYear; $i >= $currentYear - 3; $i--) {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger" id="year"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="margin-top: 26px;">
                                        <label>  </label>
                                        <button type="submit" class="btn btn-success add-btn"> Generate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="customerList">
                       <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap table-bordered cutoff_entry_data_ajax">
                       
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
 
                 
                 <script type="text/javascript">
                    function downloaddata(){
                        var headid=$('#head_id').val();
                        var year=$('#year').val();
                        //alert(''+headid+year);
                        window.location.href='<?= base_url('admin/export-cutoff-entry-data'); ?>/'+headid+'/'+year
                    }
                </script>