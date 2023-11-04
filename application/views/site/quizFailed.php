<?php include_once('header.php') ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
<style type="text/css">
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
/*.pie:before,
.pie:after {
  content:"";
  position:absolute;
  border-radius:50%;
}
.pie:before {
  inset:0;
  background:
    radial-gradient(farthest-side,var(--c) 98%,#0000) top/var(--b) var(--b) no-repeat,
    conic-gradient(var(--c) calc(var(--p)*1%),#0000 0);
  -webkit-mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
          mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
}
.pie:after {
  inset:calc(50% - var(--b)/2);
  background:var(--c);
  transform:rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
}*/
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
<div class="container">
	<div class="row">
		<div class="col-md-6 col-12 v-100 mx-auto">
		    <div class="text-center">
		        <img src="<?=base_url('assets/front/images/sorry.png');?>" style="max-width:70%">
		    </div>
		</div>
	</div>
</div>
<?php include_once('footer.php') ?>