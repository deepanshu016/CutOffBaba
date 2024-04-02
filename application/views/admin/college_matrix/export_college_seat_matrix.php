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
                                <li class="breadcrumb-item active">Export College Seats</li>
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
                            <h4 class="card-title mb-0">Export College Seats</h4>
                            <a href="<?= base_url('admin/college-seat-matrix'); ?>" class="btn btn-success add-btn" ><i class="ri-list-check"></i> List</a>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <form action="<?= base_url('admin/export-college-seat-matrix-data') ?>" method="POST" enctype="multipart/form-data" class="export-form">
                                        <div class="live-preview">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Streams</label>
                                                        <select class="form-control form-select get-courses" name="stream_id"  id="stream_ids">
                                                            <option value="">Select</option>
                                                            <?php
                                                            if(!empty($streamList)){
                                                                foreach($streamList as $stream){ ?>
                                                                    <option value="<?= $stream['id']; ?>"><?= $stream['stream']; ?></option>
                                                                <?php } } ?>
                                                        </select>
                                                        <span class="text-danger" id="stream_id"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Degree Type</label>
                                                        <select class="form-control form-select get-courses" name="degree_type_id"  id="degree_type_ids">
                                                            <option value="">Select</option>
                                                            <?php
                                                            if(!empty($degreeTypeList)){
                                                                foreach($degreeTypeList as $degree){ ?>
                                                                    <option value="<?= $degree['id']; ?>"><?= $degree['degreetype']; ?></option>
                                                                <?php } } ?>
                                                        </select>
                                                        <span class="text-danger" id="degree_type_id"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 course-wrapper"></div>
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
    $("body").on("submit",".export-form",function(e){
        e.preventDefault();
        var stream_ids=$('#stream_ids').val();
        var degree_type_id=$('#degree_type_ids').val();
        var course_id=$('#course_ids').val();
        if(!stream_ids || !degree_type_id || !course_id){
            showNotify('Please select all fields','error','');
            return false;
        }
        //alert(''+headid+year);
        window.location.href='<?= base_url('admin/export-college-seat-matrix-data'); ?>/'+stream_ids+'/'+degree_type_id+'/'+course_id
    });
    $("body").on("change",".get-courses",function(){
        var stream_id = $("#stream_ids").val();
        var degree_type_id = $("#degree_type_ids").val();
        if(!degree_type_id || !stream_id){
            showNotify('Please select all fields','error','');
            return;
        }
        $.ajax({
            type: 'POST',
            url: "<?=base_url('admin/get-courses');?>",
            data:{'stream_id':stream_id,'degree_type_id':degree_type_id},
            dataType: 'json',
            success: function(data){
                if(data.status == 'success'){
                    $(".course-wrapper").html(data.html);
                }else{
                    showNotify('Course not found','error','');
                }
            }
        }); 
    });
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