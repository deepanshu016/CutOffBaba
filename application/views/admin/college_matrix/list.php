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
                            <li class="breadcrumb-item active">College Seat Matrix</li>
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
                    <h4 class="card-title mb-0">College Seat Matrix</h4>
                    <div class="col-sm-auto">
                       <div>
                             <a href="<?= base_url('admin/import-college-seat-matrix'); ?>" class="btn btn-success add-btn" ><i class="ri-upload-2-line"></i> Import</a>
                             <a href="<?= base_url('admin/export-college-seat-matrix'); ?>" class="btn btn-primary add-btn"><i class="ri-download-2-line"></i> Export</a>
                        </div>
                     </div>
                 </div>

                 <!-- end card header -->
                 <div class="card-body">
                     <div class="col-md-12">
                        <form action="<?= base_url('admin/get-colleges-data') ?>" method="POST" class="generate-seat-matrix">
                            <div class="row">
                                <div class="col-md-3">
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
                                <div class="col-md-3">
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
                                <div class="col-md-3 course-wrapper"></div>
                                <div class="col-md-3">
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
                        <table class="table align-middle table-nowrap table-bordered college_seat_matrix_data_ajax">
                       
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
        var sub_category_ids=$('#sub_category_ids').val();
        if(!head_id || !year || !sub_category_ids){
            showNotify('Please select all fields','error','');
            return false;
        }
        //alert(''+headid+year);
        window.location.href='<?= base_url('admin/export-cutoff-entry-data'); ?>/'+headid+'/'+year+'/'+sub_category_ids
    }
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
    $("body").on("submit",".generate-seat-matrix",function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $('.generate-seat-matrix')[0]; 
        formData = new FormData(formData);
        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'success'){
                    $(".college_seat_matrix_data_ajax").html(data.html);
                }else{
                    showNotify('Course not found','error','');
                }
            }
        }); 
    });
    $("body").on("click",".save-seat-matrix-data",function(e){
        e.preventDefault();
        var stream_ids = $(this).closest('tbody').find('.stream_id').val();
        var college_id = $(this).closest('tr').find('.college_id').val();
        var degree_type_id = $(this).closest('tbody').find('.degree_type_id').val();
        var course_id = $(this).closest('tbody').find('.course_id').val();
        var branch_ids = $(this).closest('tr').find('input[name="branch_id[]"]').map(function() {
            return $(this).val();
        }).get();
        var seats = $(this).closest('tr').find('input[name="seat[]"]').map(function() {
            return $(this).val();
        }).get();
        if(branch_ids.length !== seats.length){
            showNotify('Please fill seats for all branches','error','');
            return;
        }
        const formData = {
            stream_id:stream_ids,
            college_id:college_id,
            degree_type_id:degree_type_id,
            course_id:course_id,
            branch_id:branch_ids,
            seats:seats
        }
        $.ajax({
            type: "POST",
            url: "<?=base_url('admin/save-colleges-seat-matrix');?>",
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function(data){
                data = JSON.parse(data);
                if(data.status == 'success'){
                    showNotify(data.message,data.status,'');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }else{
                    showNotify('Course not found','error','');
                }
            }
        }); 
    });
</script>