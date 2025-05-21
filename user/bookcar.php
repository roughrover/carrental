<?php

session_start();

include 'userheader.php';

include '../connection.php';

$uid = $_SESSION['uid'];


$id = $_GET['id'];

$qry = "SELECT * FROM `vehicle` WHERE `id`='$id'";
$res = mysqli_query($con,$qry);
$row = mysqli_fetch_array($res);

?>


<section class="w3l-contact-11">
	<div class="form-41-mian py-5">
		<div class="container py-lg-4">
			<div class="row align-form-map">

				<div class="col-lg-6 form-inner-cont">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4" style="color:white">Book Car</h3>
					</div>
					<form method="POST" class="signin-form">
						<div class="form-input">
							<p class="text-light">From Date:</p>
							<input type="date" name="fdt" id="dateInput" placeholder="From Date"
								onchange="validateDate(this.value)" />
						</div>
						<div class="form-input">
							<p class="text-light">To Date:</p>
							<input type="date" name="tdt" id="w3lName" placeholder="To Date"
								onchange="validateDate2(this.value)" />
						</div>
						<div class="form-input">
							<p class="text-light">Rate:</p>
							<input type="number" name="rate" id="rate" value="<?php echo $row['rate'] ?>" readonly></input>
						</div>
							<input type="hidden" name="days" id="days" readonly></input>
						<div class="form-input">
							<p class="text-light">Total Rate:</p>
							<input type="number" name="total" id="total" placeholder="Total Rate" readonly></input>
						</div>
						<div class="form-input">
							<p class="text-light">Travel Description:</p>
							<textarea name="des" id="w3lName"
								placeholder="Please provide the description about the Travel"></textarea>
						</div>

						<div class="submit-button text-lg-right">
							<button type="submit" name="submit" value="submit" id="subBtn"
								class="btn btn-style">Submit</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<br>

<script>
	function validateDate(inputDate) {
		// var inputDate = document.getElementById("dateInput").value;
		var currentDate = new Date();
		var enteredDate = new Date(inputDate);

		if (enteredDate < currentDate) {
			alert("Please enter a valid date");
			document.getElementById("subBtn").disabled = true;
		} else {
			document.getElementById("subBtn").disabled = false;

		}
	}
	function validateDate2(inputDate) {
		var currentDate = new Date();
		var enteredDate = new Date(inputDate);
		
		if (enteredDate < currentDate) {
			alert("Please enter a valid date");
			document.getElementById("subBtn").disabled = true;
		} else {
			document.getElementById("subBtn").disabled = false;
			
		}
		var inputDate1 = document.getElementById("dateInput").value;
		var rate = document.getElementById("rate").value;
		var date1 = new Date(inputDate1);
		var date2 = new Date(inputDate);
		var timeDifference = date2.getTime() - date1.getTime();
		var differenceInDays = Math.floor(timeDifference / (1000 * 3600 * 24));
		document.getElementById("days").value = differenceInDays;
		document.getElementById("total").value = rate * differenceInDays;
	}
</script>

<?php

if (isset($_POST['submit'])) {




	$fdt = $_POST['fdt'];
	$tdt = $_POST['tdt'];
	$des = $_POST['des'];
	$days = $_POST['days'];
	$total = $_POST['total'];



	$qr = "insert into bookcar(uid,cid,fdt,tdt,des,days,total)values('$uid','$id','$fdt','$tdt','$des','$days','$total')";
	echo $qr;
	$sr = mysqli_query($con, $qr);
	if ($sr) {

		echo '<script>alert(" Requested Successfully ");</script>';
		echo '<script>location.href="search.php"</script>';

	} else {

		echo '<script>alert(" Something went wrong ");</script>';
		echo '<script>location.href="search.php"</script>';

	}





}



?>


<?php

include 'footer.php';

?>