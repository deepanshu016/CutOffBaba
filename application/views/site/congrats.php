<?php include_once('header.php') ?>
<style type="text/css">
	i{font-size: 24px !important}
	.form-control{border:1px solid #ccc !important;}
	.br-danger{border: 1px solid red !important}
	.v-100{height: 100vh}
	label.br-danger{border: none !important;text-align: left !important;margin: 0 !important;float: left;clear: both}
	i{font-size: 24px !important}
	.form-control{border:1px solid #ccc !important;}
	.br-danger{border: 1px solid red !important}
	.v-100{height: 100vh}
	label.br-danger{border: none !important;text-align: left !important;margin: 0 !important;float: left;clear: both}
	@property --p{
  syntax: '<number>';
  inherits: true;
  initial-value: 0;
}

.pie {
  --p:20;
  --b:22px;
  --c:darkred;
  --w:250px;
  
  width:var(--w);
  aspect-ratio:1;
  position:relative;
  display:inline-grid;
  margin:5px;
  place-content:center;
  font-size:25px;
  font-weight:bold;
  font-family:sans-serif;
  border-radius: 50%;
  background-image: conic-gradient( 
                pink 70deg,  
                orange 0); 
}
.animate {
  animation:p 1s .5s both;
}
.no-round:before {
  background-size:0 0,auto;
}
.no-round:after {
  content:none;
}
@keyframes p {
  from{--p:0}
}
</style>
<div class="container" style="background:#fff">
	<div class="row">	
	<div class="col-md-4 col-12 v-100 mx-auto">
		    <div class="text-center">

<div class="pie animate round" style="--p:<?=10*100/$correct;?>;--c:orange;background-image: conic-gradient(green <?=($correct*100/10)*3.6;?>deg,yellow 0 <?=((10-$correct-$noattempt)*100/10)*3.6;?>deg,  
                red 0);"> <?=$correct*100/10;?>%</div>
                <div class="d-flex justify-content-between">
		        <span class="badge bg-primary m-2">Total Question : 10</span>
		        <span class="badge bg-warning m-2">Total Attempted : <?=10-$noattempt;?></span>
		        <span class="badge bg-success m-2">Total Correct : <?=$correct;?></span>
		        <span class="badge bg-danger m-2">Total Wrong : <?=$wrong;?></span>
		        </div>
		    </div>
		</div>	
		<div class="col-md-6 col-12">
		    <div class="text-center">
		        <img src="<?=base_url('assets/front/images/congrats.png');?>">
		    </div>
		</div>
	</div>
</div>
<?php include_once('footer.php') ?>