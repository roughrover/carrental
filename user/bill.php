<?php

session_start();

include '../connection.php';

$uid=$_SESSION['uid'];
$id = $_GET['id'];
$qry="SELECT * FROM vehicle v,bookcar b,register r, payment p WHERE v.id=b.cid AND b.uid=r.id AND b.id='$id' AND p.bid=b.id";
// echo $qry;
$res = mysqli_query($con,$qry);
$row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link rel="stylesheet" href="../assets/css/BillCss.css" />
	</head>

	<body>
		<table class="body-wrap">
			<tbody>
				<tr>
					<td></td>
					<td class="container" width="900">
						<div class="content">
							<table class="main" width="110%">
								<tbody>
									<tr>
										<td class="content-wrap aligncenter">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tbody>
													<tr>
														<td class="content-block">
															<h1 style="text-align: center">Car Rental System</h1>
														</td>
													</tr>
													<tr>
														<td class="content-block">
															<h2 style="text-align: center">Invoice</h2>
														</td>
													</tr>
													<tr>
														<td class="content-block">
															<table class="invoice">
																<tbody>
																	<tr>
																		<td><strong>Invoice ID:</strong> <?php echo $row['11'] ?><br /></td>
																		<td><strong>Payment Date:</strong> <?php echo $row['dt'] ?><br /></td>
																	</tr>
																	<tr>
																		<td><strong>Name: </strong><?php echo $row['name'] ?><br /></td>
																	</tr>
																	<tr>
																		<td><strong>Email: </strong><?php echo $row['email'] ?><br /></td>
																	</tr>
																	<tr>
																		<td><strong>Phone: </strong><?php echo $row['phone'] ?><br /></td>
																	</tr>
																	<tr>
																		<td><strong>Address: </strong><?php echo $row['address'] ?><br /></td>
																	</tr>
																	<tr>
																		<td>
																			<table
																				class="invoice-items"
																				cellpadding="0"
																				cellspacing="0"
																				style="width: 150%;"
																			>
																				
																					<tr>
																						<td
																							style="border-right: 1px dotted black; padding: 10px"
																						>
																							<strong>Car</strong><br />
																						</td>
																						<td
																							style="border-right: 1px dotted black; padding: 10px"
																						>
																							<strong>Rate</strong><br />
																						</td>
																						<td
																							style="border-right: 1px dotted black; padding: 10px"
																						>
																							<strong>Days</strong><br />
																						</td>
																						<td
																							style="border-right: 1px dotted black; padding: 10px"
																						>
																							<strong>Total</strong><br />
																						</td>
																					</tr>
																					
																					<tr>
																						<td style="border-right: 1px dotted black; padding: 10px"><strong><?php echo $row['model'] ?></strong></td>
																						<td style="border-right: 1px dotted black; padding: 10px"><?php echo $row['rate'] ?></td>
																						<td style="border-right: 1px dotted black; padding: 10px"><?php echo $row['days'] ?></td>
																						<td style="border-right: 1px dotted black; padding: 10px"><?php echo $row['total'] ?></td>
																					</tr>
																					
																				</tbody>
																				<tfoot>
																					<tr>
																						<td class="aligncenter" colspan=""> <strong>Days</strong></td>
																						<td class="aligncenter"><?php echo "$row[fdt] - $row[tdt]" ?></td>
																						<td class="aligncenter"><b>Extra Driven Cost:</b> Rs.<?php echo $row['forkm'] ?>/-</td>
																					</tr>
																				</tfoot>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td class="content-block">
															<input
																type="button"
																value="Print"
																onclick="myFun()"
																id="pt"
																style="padding: 10px"
															/>
														</td>
													</tr>
													<tr>
														<td class="content-block"></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="footer">
								<table width="100%">
									<tbody>
										<tr></tr>
									</tbody>
								</table>
							</div>
						</div>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<script>
			function myFun() {
				document.getElementById('pt').style.display = 'none';
				window.print();
				window.location = 'mybookings.php';
			}
		</script>
	</body>
</html>
