<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Facility</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
    <?php 
         if(!empty($facilitiesList)) {
        foreach($facilitiesList as $key=>$facility){ 
            if(!empty($singleHospital)) {
                $facilities = json_decode($singleHospital['facilities'],true);
                $desired_value = null;
                foreach ($facilities as $item) {
                    // echo "fdgdg";
                    // echo $item['facility_id'];
                    // echo "ggg";
                    // echo $facility['id'];
                    if ($item['facility_id'] == $facility['id']) {
                        $desired_value = $item['value'];
                        break;
                    }
                }
                 
            }    
    ?>
        <tr>
            <th scope="row"><?= $key+1; ?></th>
            <td><?= $facility['facility']; ?><input type="hidden" name="facility_ids[]" value="<?= $facility['id']; ?> "></td>
            <td><input type="text" placeholder="Value" class="form-control" name="facility_value[]" value="<?= (!empty($singleHospital)) ? $desired_value : ''; ?>"><br/><span class="text-danger" id="facility_value"></span></td>
        </tr>
    <?php } }  ?>
    
    
  </tbody>
</table>