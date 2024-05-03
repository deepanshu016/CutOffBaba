<tbody>
                                    <?php
                                       $courseStream = $this->db->select('*')->from('tbl_stream')->where('id',$singleCourse['stream'])->get()->row_array();
                                       $courseDegreeType = $this->db->select('*')->from('tbl_degree_type')->where('id',$singleCourse['degree_type'])->get()->row_array();
                                       $branchList = $this->db->select('*')->from('tbl_branch')->where('branch_type',$singleCourse['branch_type'])->get()->result_array();
                                    ?>
                                    <tr>
                                       <td><?= $courseStream['stream']; ?></td>
                                       <td><?= $courseDegreeType['degreetype']; ?></td>
                                       <td><?= $singleCourse['course']; ?></td>
                                       <?php
                                       if(!empty($branchList)){ 
                                          foreach($branchList as $keys=>$branchs){
                                          if($keys  == 0){         
                                       ?>
                                          <td><?= $branchs['branch']; ?></td>
                                          <td>0</td>
                                          <td>0</td>
                                       <?php } } }?>
                                    </tr>
                                    <?php
                                       if(!empty($branchList)){ 
                                          foreach($branchList as $key=>$branch){
                                          if($key >0){         
                                    ?>
                                          <tr>
                                             <td class="bgColosmn" colspan="3"> </td>
                                             <td><?= $branch['branch']; ?></td>
                                             <td>0</td>
                                             <td> 0</td>
                                          </tr>
                                    <?php } } }?>
                                    <?php
                                     if(!empty($courseList)){
                                       foreach($courseList as $key => $value){ 
                                          $courseStreamData = $this->db->select('*')->from('tbl_stream')->where('id',$value['stream'])->get()->row_array();
                                          $courseDegreeTypeData = $this->db->select('*')->from('tbl_degree_type')->where('id',$value['degree_type'])->get()->row_array();
                                          $branchListData = $this->db->select('*')->from('tbl_branch')->where('branch_type',$singleCourse['branch_type'])->get()->result_array();
                                    ?>
                                       <tr>
                                          <td><?= $courseStreamData['stream']; ?></td>
                                          <td><?= $courseDegreeTypeData['degreetype']; ?></td>
                                          <td><?= $value['course']; ?></td>
                                          <?php
                                             if(!empty($branchListData)){ 
                                                foreach($branchListData as $keys1=>$branchs1){
                                                if($keys1  == 0){         
                                             ?>
                                                <td><?= $branchs1['branch']; ?></td>
                                                <td>0</td>
                                                <td>0 </td>
                                          <?php } } }?>
                                       </tr>
                                       <?php
                                          if(!empty($branchListData)){ 
                                             foreach($branchListData as $keys2=>$branches){
                                                if($keys2 > 0){            
                                       ?>
                                             <tr>
                                                <td class="bgColosmn" colspan="3"> </td>
                                                <td><?= $branches['branch']; ?></td>
                                                <td>0</td>
                                                <td> 0</td>
                                             </tr>
                                       <?php } } }?>
                                    <?php }  } ?>
                                    <!-- <tr>
                                       <td>Stream3</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>111</td>
                                       <td>2000</td>
                                    </tr> -->
                                 </tbody>