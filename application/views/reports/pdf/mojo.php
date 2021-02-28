<!DOCTYPE html>
<html>

<body>
<style type="text/css">
	html {
		background-color: #ffffff;
	}
	body {
		font-family: "trebuchet ms";
		overflow: hidden;
		margin: 0 auto;
		padding: 5px;
	}

	.details {
		position: relative;
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.left {
		width: 100%;
		float: left;
	}

	.right {
		width: 100%;
		float: left;
		margin-top: 3em;
	}

	small{
		font-size: 11px;
	}

	table {
		width: 100%;
		border-collapse: collapse;
	}

	th {
		padding: 10px 16px;
		border-color: rgba(120, 130, 140, 0.045);
		vertical-align: bottom;
		border-bottom: 2px solid #eceeef;
		text-align: left;
	}

	tbody > tr:nth-child(odd) {
		background-color: rgba(0, 0, 0, 0.025);
		background-clip: padding-box;
	}

	td {
		padding-left: 16px;
		padding-right: 16px;
		border-color: rgba(120, 130, 140, 0.045);
		padding: .75rem;
		vertical-align: top;
		border-top: 1px solid #eceeef;
	}

	svg {
		font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
		font-size:12px;
	}

	.reportImage{
		float: right;
		width: 100%;
	}

	.reportImage img{
		float: right;
	}

	.reportDetails{
		float: left;
	}
	.footer{
		font-size: 12px;
		clear: both;
		border-top: 1px solid;
		text-align: center;
	}
	* {
		box-sizing: border-box;
	}

	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	/* Float four columns side by side */
	.column {
		float: left;
		width: 25%;
		padding: 0 10px;
	}

	/* Remove extra left and right margins, due to padding in columns */
	.row {margin: 0 -5px;}

	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* Style the counter cards */
	.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
		padding: 16px;
		text-align: center;
		background-color: #f1f1f1;
	}

	/* Responsive columns - one column layout (vertical) on small screens */
	@media screen and (max-width: 600px) {
		.column {
			width: 100%;
			display: block;
			margin-bottom: 20px;
		}
	}
</style>
<div class="details">
	<div class="details-body">
		<div class="reportImage" style="float:right" >
			<!--			<img  src="https://www.ccbagroup.com/wp-content/themes/CSI/style/images/logo.png'" height="83px" width="370px" alt=""><br>-->
			<img  src="http://www.callmetron.com/assets/banner.jpg" height="112px" width="806px" alt="Mojo Banner"><br>
		</div>

		<div class="row">
			<div class="column">
				<div class="card">
					<p>QT009</p>
					Thursday 18th Feb 2021<br>
					JB209<br>
					DKW929<br>
					</div>
			</div>
			<div class="column">
				<div class="card">
					Safaricom Limited <br>
					Safaricom House, Waiyaki Way <br>
					info@safaricom.com<br>
					+254 722 4524/4260
					</div>
			</div>
			<div class="column">
				<div class="card">
					Safaricom Limited <br>
					Safaricom House, Waiyaki Way <br>
					info@safaricom.com<br>
					+254 722 4524/4260
				</div>			</div>
			<div class="column">
				<div class="card">..</div>
			</div>
		</div>
		<div class="reportDetails">




		</div>
	</div>
</div>

<br>
<br>
<br>
<br>


<div>
	<div class="left">

	</div>
	<div class="right">
		<div id="canvas">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 400"><?php echo $svg; ?></svg>
		</div>
	</div>
</div>

<div class="footer">

	<div class="footer-inner"> <?php echo date('Y'); ?> &copy; U70XDN.
		<p class="">Powered By Naya Solutions	</p>
		<!--		<img src="--><?php //echo base_url(); ?><!--assets/assets/img/nayalogo.png" class="img-fluid mr-2" alt="avatar" style="float: right">-->

	</div>
</div>
</body>

</html>


