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
    </tr>
</thead>
<tbody>
    <?php
        $i = 0;
        if($collegeList){
            foreach($collegeList as $college) { ?>
                <tr>
                    <td><?= $college['college_id']; ?></td>
                    <td><?= $college['full_name']; ?></td>
                    <td><?= $college['state_name']; ?></td>
                    <?php if(!empty($branchList)) { 
                        foreach($branchList as $branch) {    
                    ?>
                        <td><input type="text" placeholder="Seat" name="seat" class="form-control"></th>
                    <?php } } ?>
                </tr>
    <?php } } ?>
</tbody>