<thead class="table-light">
    <tr>
        <th scope="col">College ID</th>
        <th scope="col">College Name</th>
        <th scope="col">State</th>
        <?php if(!empty($branchList)) { 
            foreach($branchList as $branch) {    
        ?>
            <th scope="col"><?= $branch['branch'];?></th>
        <?php } } ?>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    <input type="hidden" name="stream_id" class="form-control stream_id" value="<?= $stream_id; ?>">
    <input type="hidden" name="degree_type_id" class="form-control degree_type_id" value="<?= $degree_type_id; ?>">
    <input type="hidden" name="course_id" class="form-control course_id" value="<?= $course_id; ?>">
    <?php
        $i = 1;
        if($collegeList){
            foreach($collegeList as $college) { ?>
                <tr>
                    <input type="hidden" name="college_id" class="form-control college_id" value="<?= $college['college_id']; ?>">
                    <td><?= $i; ?></td>
                    <td><?= $college['full_name']; ?></td>
                    <td><?= $college['state_name']; ?></td>
                    <?php if(!empty($branchList)) { 
                        foreach($branchList as $branch) {    
                            $SeatMatrixData = $this->db->select('*')->from('tbl_college_seat_matrix_data')->where(['college_id'=>$college['college_id'],'stream_id'=>$stream_id,'degree_type_id'=>$degree_type_id,'course_id'=>$course_id,'branch_id'=>$branch['id']])->get()->row_array();
                    ?>
                        <td><input type="hidden" name="branch_id[]" class="form-control branch_id" value="<?= $branch['id']; ?>"><input type="text" placeholder="Seat" name="seat[]" class="form-control" value="<?= empty($SeatMatrixData)?0:$SeatMatrixData['seats']; ?>"></th>
                    <?php } } ?>
                    <td><a href="#" class="btn btn-primary save-seat-matrix-data">Save</a></td>
                </tr>
    <?php $i++;} } ?>
</tbody>