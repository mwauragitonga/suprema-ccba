<!DOCTYPE html>
<html>
<body>
<style type="text/css">
	html {
		background-color: #ffffff;
	}

	body {
		font-family: "trebuchet ms";
		overflow: auto;
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

	small {
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
		text: bold;
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
		font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
		font-size: 12px;
	}

	.reportImage {
		float: right;
	}

	.reportImage img {
		float: right;
	}

	.reportDetails {
		float: left;
	}

	.footer {
		font-size: 12px;
		clear: both;
		border-top: 1px solid;
		text-align: center;
	}
</style>
<div class="details">
	<div class="details-body">

		<div class="reportDetails">
			<p>
				<b><?php echo configureLanguage::language('Organization Name:', 'R4026', $this->session->userdata('language')); ?></b><?php echo 'Call Metron Company' ?>
			</p>
			<p>
				<b><?php echo configureLanguage::language('Title:', 'R4027', $this->session->userdata('language')); ?></b><?php echo $title ?>
			</p>
		</div>
	</div>
</div>
<?php $this->load->view($main);
?>
<div class="footer">
	<div class="footer-inner"> <?php echo date('Y'); ?> &copy; CallMetron.
	</div>
</div>
</body>

</html>
