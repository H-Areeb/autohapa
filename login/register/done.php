<?php  header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	

include_once('../../includes/header.php');

		$http_referer =$_SERVER['HTTP_REFERER'];
		$description = '../../description/';
?>

<style>
    #section-register .col-form-label {
    color: #161717a3;
    font-weight: 700;
    font-size: 0.9rem;
    padding-top: calc(.475rem + 1px);
}
#section-register .btn {
    width: auto;
    font-size: 0.9rem;
}
#section-register .bg-card{
    background-color: #6c757d2;
}

#section-register .form-group {
    position: relative;
}
#section-register .form-control {
    padding: .75rem .75rem;
    font-size: 0.9rem;
   
}

#section-register .error {
    color: red;
    position: absolute;
    border: 1px solid red;
    padding: 7px;
    border-radius: 5px;
    background-color: #fff;
    left: 100.6%;
    font-size: 12px;
    width: 300px;
    top: 0;
    z-index: 5;
    display: none;
}
#section-register .error::before {
    width: 10px;
    height: 10px;
    top: 9px;
    border-top: 1px solid #ff4436;
    border-left: 1px solid #ff4436;
    background-color: #fff;
    content: '';
    position: absolute;
    left: -6px;
    transform: rotate(-45deg);
}

ul.steps {
    box-shadow: inset 0 0 0 2px #e1e1e1;
    height: 44px;
    margin: 0 0 25px 0;
    padding: 0;
    list-style: none;
    white-space: nowrap;
    overflow: hidden;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
}
ul.steps>li {
    display: inline-block;
    height: 44px;
    line-height: 44px;
    text-align: center;
    position: relative;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
}


ul.steps>li.past, ul.steps>li.current {
    background: #e1e1e1;
}
ul.steps>li a {
    cursor: default;
    padding: 0 0 0 15px;
}
ul.steps > li:not(.past) a {
    color: #5c5c5c;
}
ul.steps > li:not(:last-child):not(.past):after, ul.steps > li:not(:last-child):not(.past):before {
    left: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
ul.steps > li:not(:last-child):not(.past):before {
    border-color: transparent;
    border-left-color: #e1e1e1;
    border-width: 24px 0 24px 13px;
    margin-top: -24px;
}
</style>


<?php
	 $regnum= '';
	if (isset($_POST['regnum']))
		{
			$regnum = $_POST['regnum'];
			//echo $regnum;
		}
	
	if(isset($_POST['customer_id'])){
	$_SESSION['customer_id'] = $_POST['customer_id'];
	//echo $_SESSION['customer_id'];
	}
	if(isset($_SESSION['customer_id']))
	{
		$_SESSION['customer_id'];
	}
		
	?>
	

	<section class="main mt-5 mb-5">
		<div class="container">
		    <ul class="steps mobile">
                <li id="step_profile" >
                    <a href="javascript:void(0)" title="Profile"><span>Step</span> 1</a>
                </li>
                <li id="step_done" class="current"><a href="javascript:void(0)" title="Done!">Done!</a>
                </li>
            </ul>
    	    <div class="row justify-content-center">
    			<div class="col-lg-6">
					<p>Registration completed!</p>
					<p>You've successfully created an account; an activation link has been sent to your email address.</p>
					<p>Please check your email box to verify your email address.</p>
					
    			 </div>
            </div>
        </div>
    </section>
	
<?php include_once('../../includes/footer.php'); ?>