<ul class="nav nav-pills nav-justified mb-3" role="tablist">
    <li class="nav-item">
        <a class="nav-link waves-effect waves-light active" data-bs-toggle="tab" href="#images" role="tab">
            Images
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link waves-effect waves-light" data-bs-toggle="tab" href="#video" role="tab">
            Video
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link waves-effect waves-light" data-bs-toggle="tab" href="#document" role="tab">
            Documents
        </a>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content text-muted">
    <div class="tab-pane active" id="images" role="tabpanel">
        <div class="d-flex">
            <div class="flex-grow-1 ms-2">
                <div class="col-md-12">
                    <div class="row media-data-with-checkbox">
                        <?php if(!empty($mediaData)) {
                            foreach($mediaData as $image){
                                $mediasss = $this->db->select('*')->from('tbl_uploaded_files')->where(['file_data'=>$image['college_id'],'file_type'=>'image','id'=>$image['media_id']])->get()->row_array();
                                if(!empty($mediasss)){
                        ?>
                            <div class="col-md-2">
                                <a href="javascript:void(0);" data-id="<?= $mediasss['id']; ?>" class="delete-media" data-file="<?= $mediasss['file_name']; ?>"><i class="ri-delete-bin-6-fill"></i></a>
                                <img src="<?= base_url('assets/uploads/media/image'.'/'.$mediasss['file_name']) ?>" height="100" width="100">
                            </div>
                        <?php } } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="video" role="tabpanel">
        <div class="d-flex">
            <div class="flex-grow-1 ms-2">
                <div class="col-md-12">
                    <div class="row media-data-with-checkbox">
                        <?php if(!empty($videoData)) {
                            foreach($videoData as $video){
                                $mediasVideo = $this->db->select('*')->from('tbl_uploaded_files')->where(['file_data'=>$video['college_id'],'file_type'=>'video','id'=>$video['media_id']])->get()->row_array();
                                if(!empty($mediasVideo)){
                        ?>
                                <div class="col-md-2">
                                    <input type="checkbox" name="photo_id[]" value="<?= $mediasVideo['id']; ?>" class="checkbox" data-file="<?= $mediasVideo['file_name']; ?>">
                                    <img src="<?= base_url('assets/uploads/media/video'.'/'.$mediasVideo['file_name']) ?>" height="100" width="100">
                                </div>
                        <?php } } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="document" role="tabpanel">
        <div class="d-flex">
            <div class="flex-grow-1 ms-2">
                <div class="col-md-12">
                    <div class="row media-data-with-checkbox">
                        <?php if(!empty($docData)) {
                            foreach($docData as $doc){
                                $mediasDoc = $this->db->select('*')->from('tbl_uploaded_files')->where(['file_data'=>$doc['college_id'],'college_id'=>'image','id'=>$doc['media_id']])->get()->row_array();
                                if(!empty($mediasDoc)){
                            ?>
                                <div class="col-md-2">
                                    <input type="checkbox" name="photo_id[]" value="<?= $mediasDoc['id']; ?>" class="checkbox" data-file="<?= $mediasDoc['file_name']; ?>">
                                    <img src="<?= base_url('assets/uploads/media/doc'.'/'.$mediasDoc['file_name']) ?>" height="100" width="100">
                                </div>
                            <?php } } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>