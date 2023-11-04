<?php include_once('header.php') ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
<style type="text/css">
input[type="radio"]{
	position: absolute;
	opacity: 0;
}
label {
    display: inline-block;
    padding: 10px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    border-radius: 30px;
    width: 100%;
    background: #E5E5E5;

}

label:hover {
  background-color: #FF8031;
   color: #fff;
}

input[type="radio"]:focus + label {
    border: 2px dashed #FF8031;
    width: 100%;
}
input[type="radio"] + label:before {
	 font-family: 'Font Awesome 5 Free';
    content: '\f111';
    margin-right: 10px;
}
input[type="radio"]:checked + label:before {
	 font-family: 'Font Awesome 5 Free';
    content: '\f058';
    margin-right: 10px;
}

input[type="radio"]:checked + label {
    width: 100%;
    border: 2px dashed #FF8031;
    border-color: #FF8031;
    background: #FF8031;
    color: #fff;
}


.question{
background: #1773EA;
margin: -15px -15px 20px;
padding: 30px;
border-radius: 0 0 20px 20px;
}
.question p{font-size: 18px!important;color: #fff;line-height: 32px;font-weight: 700;}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-12">
			<div class="row d-flex">
				<div class="col-md-6 col-12  mx-auto">
<form method="post" action="<?=base_url('quizsubmit');?>">	

		     <div class="card">
      <div class="card-body">
       
      	
      	<?php $questions=$this->db->select('*')->get('tbl_quiz_question')->result_array(); $i=1;
      	foreach ($questions as $question) {?>

      	<div class="step" style="<?=$i>1?'display:none':'';?>">
           <div class="question text-center text-light">
          <h3 class="text-light">Quiz</h3>
          <div style="font-size:24px;"><?=$question['q'];?></div>
        </div>
      		<div class="progress mb-5" style="height: 20px;border-radius: 20px;"><div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;background: #FF8031;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div></div>
      		<div class="form-group mb-3">
      			<input type="radio" name="q<?=$question['id'];?>" id="q<?=$question['id'];?>1" value="1"><label for="q<?=$question['id'];?>1"><?=$question['a1'];?></label>
      		</div>
      		<div class="form-group  mb-3">
      			<input type="radio" name="q<?=$question['id'];?>" id="q<?=$question['id'];?>2" value="2"><label for="q<?=$question['id'];?>2"><?=$question['a2'];?></label>
      		</div>
      		<div class="form-group  mb-3">
      			<input type="radio" name="q<?=$question['id'];?>" id="q<?=$question['id'];?>3" value="3"><label for="q<?=$question['id'];?>3"><?=$question['a3'];?></label>
      		</div>
      		<div class="form-group  mb-3">
      			<input type="radio" name="q<?=$question['id'];?>" id="q<?=$question['id'];?>4" value="4"><label for="q<?=$question['id'];?>4"><?=$question['a4'];?></label>
      		</div>
      </div>
  <?php $i++;} ?>
  </div>
      <div class="card-footer">
        <button class="action back btn btn-sm btn-outline-warning" style="display: none">Back</button>
        <button class="action next btn  float-end btn btn-primary">Next >> </button>
        <button class="action submit btn btn-sm btn-outline-success float-end" style="display: none">Submit</button>
      </div>
    </div>
</form>


		</div>
	</div>
</div>
</div>
</div>
<?php include_once('footer.php') ?>
<script >


var step = 1;
$(document).ready(function () { stepProgress(step); });

$(".next").on("click", function () {
  var nextstep = false;
  nextstep = true;
  if (nextstep == true) {
    if (step < $(".step").length) {
      $(".step").show();
      $(".step")
        .not(":eq(" + step++ + ")")
        .hide();
      stepProgress(step);
    }
    hideButtons(step);
  }
  return false;
});

// ON CLICK BACK BUTTON
$(".back").on("click", function () {
  if (step > 1) {
    step = step - 2;
    $(".next").trigger("click");
  }
  hideButtons(step);
  return false;
});

// CALCULATE PROGRESS BAR
stepProgress = function (currstep) {
  var percent = parseFloat(100 / $(".step").length) * currstep;
  percent = percent.toFixed();
  $(".progress-bar")
    .css("width", percent + "%")
    .html(percent + "%");
};

// DISPLAY AND HIDE "NEXT", "BACK" AND "SUMBIT" BUTTONS
hideButtons = function (step) {
  var limit = parseInt($(".step").length);
  $(".action").hide();
  if (step < limit) {
    $(".next").show();
  }
  if (step > 1) {
    $(".back").show();
  }
  if (step == limit) {
    $(".next").hide();
    $(".submit").show();
  }
};

</script>