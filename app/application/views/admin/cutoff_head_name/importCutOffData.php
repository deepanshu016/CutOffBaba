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
                                <li class="breadcrumb-item active">Import Cutoff Data</li>
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
                            <h4 class="card-title mb-0">Import Cutoff Data</h4>
                            <a href="<?= base_url('admin/cutoff-entry-data'); ?>" class="btn btn-success add-btn" ><i class="ri-list-check"></i> List</a>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <form action="<?= base_url('admin/import-cutoffdata-by-excel') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <div class="live-preview">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basiInput" class="form-label">Head</label>
                                                        <select class="form-control get-category" name="head_id">
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
                                                <div class="col-lg-12 category-wrapper"></div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Year</label>
                                                            <select name="year" class="form-control">
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
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basiInput" class="form-label">Excel File</label>
                                                        <input type="file" class="form-control" name="excel_file">
                                                        <span class="text-danger" id="excel_file"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6" style="margin-top: 15px;">
                                                    <button type="submit" class="btn rounded-pill w-100 btn-success waves-effect waves-light">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    $("body").on("change",".get-category",function(){
        var head_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "<?=base_url('admin/get-category');?>",
            data:{'head_id':head_id},
            dataType: 'json',
            success: function(data){
                if(data.status == 'success'){
                    $(".category-wrapper").html(data.html);
                }
            }
        }); 
    });
</script>