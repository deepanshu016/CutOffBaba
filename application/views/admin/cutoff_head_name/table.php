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
                            <li class="breadcrumb-item active">Cutoff Head Name</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header">
                    <h4 class="card-title mb-0">Cutoff Head Name</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                        <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/import-cutoffdata'); ?>" class="btn btn-success add-btn" > Import</a>
                             </div>
                        </div>
                    <div id="customerList">
                       <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap table-bordered">
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
                                        <!-- <th scope="col" class="text-center">UR PH
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
                                        </th> -->
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

                                                    //$sql = "SELECT * FROM tbl_branch  WHERE FIND_IN_SET('courses', ".$course['id'].")";
                                                    $branchData = $this->db->select('*')->like('courses',$course['id'])->get('tbl_branch')->result_array();
                                                    // echo $this->db->last_query();
                                                    // echo "<pre>";
                                                    // print
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

                                                $cutoffMarksRounOne = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_one'=>1))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounTwo = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_two'=>1))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounThree = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_three'=>1))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounFour = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_four'=>1))->get('tbl_cutfoff_marks_data')->row_array();
                                                $cutoffMarksRounFive = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_five'=>1))->get('tbl_cutfoff_marks_data')->row_array();
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
                                        <!-- <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">EC</th>
                                            <th scope="col" class="text-center">
                                                <table class="table align-middle table-bordered">
                                                    <tr>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th> 
                                            <th scope="col" class="text-center">
                                                <table class="table align-middle table-bordered">
                                                    <tr>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th> 
                                        </tr>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">BCA</th>
                                            <th scope="col">CS</th>
                                            <th scope="col" class="text-center">
                                                <table class="table align-middle table-bordered">
                                                    <tr>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <tr>
                                                                    <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                                </tr>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th> 
                                            <th scope="col" class="text-center">
                                                <table class="table align-middle table-bordered">
                                                    <tr>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                        <th scope="col">
                                                            <table class="table align-middle table-bordered">
                                                                <th scope="col">34</th>
                                                                    <th scope="col">56</th>
                                                                    <th scope="col">90</th>
                                                            </table>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th> 
                                        </tr> -->
                                </thead>
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