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
                                <li class="breadcrumb-item active">Manage Media</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xxl-6">
                        <h5 class="mb-3">Manage Media</h5>
                        <div class="card">
                            <div class="card-body">
                                <!-- <form class="all-form" method="post" action=""> -->
                                <div class="col-md-12">
                                    <div class="row mb-5">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="hidden" class="college_id" value="<?= @$college_id; ?>">
                                                <select class="form-control get-media-data" name="media_data">
                                                    <option value="">Select Gallery Head</option>
                                                    <?php
                                                    $galleryHeads = get_master_data('tbl_gallery_heads',[]);
                                                    if(!empty($galleryHeads)){
                                                        foreach($galleryHeads as $head){

                                                            ?>
                                                            <option value="<?= $head['id']; ?>"><?= $head['head_name']; ?></option>
                                                        <?php } } ?>
                                                    <option value="college_logo">College Logo</option>
                                                    <option value="college_banner">College Banner</option>
                                                    <option value="prospectus_file">Prospectus File</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-auto">
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-success add-btn save-button submit-button" > Save Data</a>
                                            </div>
                                        </div> -->
                                       <!--  <div class="col-sm-auto">
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-success add-btn delete-media-button" > Delete Media</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="media_data"></div>
                               
                                <!-- </form> -->

                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
<?php $this->load->view('admin/footer'); ?>
<script src="<?=base_url('/')?>assets/site/js/CommonLib.js"></script>
<script>
    $("body").on("change",'.get-media-data',function(e){
        e.preventDefault();
        e.preventDefault();
        var url = "<?= base_url('admin/get-college-media'); ?>";
        var method = 'POST';
        var college_id = "<?= $college_id; ?>";
        var head_id = $(this).val();
        formData = new FormData();
        formData.append('head_id',head_id);
        formData.append('college_id',college_id);
        CommonLib.ajaxForm(formData,method,url).then(d=>{
            if(d.status === 200){
                $('.media_data').html(d.html)
            }
        }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
        });
    });
    $("body").on("click",'.delete-media',function(e){
        e.preventDefault();
        e.preventDefault();
        var url = "<?= base_url('admin/delete-college-media'); ?>";
        var method = 'POST';
        var media_id = $(this).data('id');
        formData = new FormData();
        var college_id = "<?= $college_id; ?>";
        formData.append('media_id',media_id);
        formData.append('college_id',college_id);
        CommonLib.ajaxForm(formData,method,url).then(d=>{
            if(d.status === 200){
                CommonLib.notification.success(d.message);
                setTimeout(function(){
                    location.reload();
                },2000);
            }
        }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>