<thead class="table-light">
                                    <tr>
                                        <th scope="col">College</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Branch</th>
                                        <?php if(!empty($subCategoryData)) { 
                                            foreach($subCategoryData as $sub) {    
                                        ?>

                                        <th scope="col" class="text-center"><?= $sub['sub_category_name']; ?>
                                            <table class="table align-middle table-bordered">
                                                <tr>
                                                    <th scope="col">R1</th>
                                                    <th scope="col">R2</th>
                                                    <th scope="col">R3</th>
                                                    <th scope="col">R4</th>
                                                    <th scope="col">R5</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">
                                                        <table class="table align-middle table-bordered">
                                                            <tr>
                                                                <th scope="col">AIR</th>
                                                                <th scope="col">SR</th>
                                                                <th scope="col">MARKS</th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                    <th scope="col">
                                                        <table class="table align-middle table-bordered">
                                                            <tr>
                                                                <th scope="col">AIR</th>
                                                                <th scope="col">SR</th>
                                                                <th scope="col">MARKS</th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                    <th scope="col">
                                                        <table class="table align-middle table-bordered">
                                                            <tr>
                                                                <th scope="col">AIR</th>
                                                                <th scope="col">SR</th>
                                                                <th scope="col">MARKS</th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                    <th scope="col">
                                                        <table class="table align-middle table-bordered">
                                                            <tr>
                                                                <th scope="col">AIR</th>
                                                                <th scope="col">SR</th>
                                                                <th scope="col">MARKS</th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                    <th scope="col">
                                                        <table class="table align-middle table-bordered">
                                                            <tr>
                                                                <th scope="col">AIR</th>
                                                                <th scope="col">SR</th>
                                                                <th scope="col">MARKS</th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </table>
                                        </th>
                                        <?php } } ?>
                                        
                                    </tr>
                                    <?php
                                        $i = 0;
                                        
                                                if($counsellingHead){
                                                    foreach($counsellingHead as $head) { 
                                                        $collegeIds = ($head['college']) ? explode('|',$head['college']) : [];
                                                        if(!empty($collegeIds)){
                                                        $collegeData = $this->db->select('*')->where_in('id',$collegeIds)->get('tbl_college')->result_array();
                                    if(!empty($collegeData)){
                                        foreach($collegeData as $college) { 
                                            $courseList = ($college['course_offered']) ? explode('|',$college['course_offered']) : [];
                                            if(!empty($courseList)){
                                                $courseData = $this->db->select('*')->where_in('id',$courseList)->get('tbl_course')->result_array();
                                            }
                                            $j = 0;
                                            if(!empty($courseData)){
                                                foreach($courseData as $course) { 

                                                    $branchData = $this->db->select('*')->like('courses',$course['id'])->get('tbl_branch')->result_array();
                                                    if(!empty($branchData)){
                                                        foreach($branchData as $branch) { 
                                                            $courses=($branch['courses']) ? explode('|',$branch['courses']) : [];
                                                            if(in_array($course['id'],$courses)){
                                                                
                                    ?>
                                        <tr>
                                            <th scope="col"><?= ($i === 0) ? $college['full_name'] : ''; ?></th>
                                            <th scope="col"><?= ($j === 0) ? $course['course'] : ''; ?></th>
                                            <th scope="col"><?= $branch['branch']; ?></th>
                                            <?php if(!empty($subCategoryData)) { 
                                            foreach($subCategoryData as $subs) {    

                                                $cutoffMarksRounOne = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_one'=>1,'year'=>$year,'cutoff_head'=>$head['id']))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounTwo = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_two'=>1,'year'=>$year,'cutoff_head'=>$head['id']))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounThree = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_three'=>1,'year'=>$year,'cutoff_head'=>$head['id']))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounFour = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_four'=>1,'year'=>$year,'cutoff_head'=>$head['id']))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounFive = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_five'=>1,'year'=>$year,'cutoff_head'=>$head['id']))->get('tbl_cutfoff_marks_data')->row_array();
                                            //    echo $this->db->last_query();

                                        ?>
                                            <th scope="col" class="text-center">
                                                <table class="table align-middle table-bordered">
                                                    <tr>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounOne)) ? $cutoffMarksRounOne['air'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounOne)) ? $cutoffMarksRounOne['sr'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounOne)) ? $cutoffMarksRounOne['marks'] : 0; ?></th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounTwo)) ? $cutoffMarksRounTwo['air'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounTwo)) ? $cutoffMarksRounTwo['sr'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounTwo)) ? $cutoffMarksRounTwo['marks'] : 0; ?></th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounThree)) ? $cutoffMarksRounThree['air'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounThree)) ? $cutoffMarksRounThree['sr'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounThree)) ? $cutoffMarksRounThree['marks'] : 0; ?></th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounFour)) ? $cutoffMarksRounFour['air'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounFour)) ? $cutoffMarksRounFour['sr'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounFour)) ? $cutoffMarksRounFour['marks'] : 0; ?></th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounFive)) ? $cutoffMarksRounFive['air'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounFive)) ? $cutoffMarksRounFive['sr'] : 0; ?></th>
                                                                    <th scope="col"><?= (!empty($cutoffMarksRounFive)) ? $cutoffMarksRounFive['marks'] : 0; ?></th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th> 
                                            <?php }}?>
                                        </tr>
                                    <?php $j++;$i++; } } 
                                         $j = 0;
                                                            
                                    }
                                    
                                    } 
                                       
                                       
                                    }
                                    $i = 0; 
                                }
                                        
                                    }
                                }
                                }}?>
                                     
                                </thead>