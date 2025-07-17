
<?php

include('include/header.php');
?>

<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">User List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								 
								<li class="active">User List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xl-12">
							<div class="card-box">
								<div class="card-head">
									<header>User List</header>
									 
								</div>
								  
										 
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th>#</th>
													<th>fname</th>
                                                    <th>lname</th>
                                                    <th>email</th>
                                                    <th>phone</th>
													<th>img</th>
													<th>Address</th>
                                                     <th>action</th>
												</tr>
											</thead>
											<tbody>
											<?php

                                    $cte= mysqli_query($con,"SELECT * from signin ");
									while($row=mysqli_fetch_array($cte)){
										 
                                        
									?>
												<tr class="odd">
													<td><?php echo $row['id']?></td>
													<td> <?php echo $row['fname']?></td>
                                                    <td><?php echo $row['lname']?></td>
                                                    <td><?php echo $row['email']?></td>
                                                    <td><?php echo $row['phone']?></td>
                                                    <td><a href="../../<?php echo $row['img']?>" target="_main"><img src="../../<?php echo $row['img']?>" alt="" style="width:50px;height:50px; border-radius: 50%;"></a></td>
                                                     
                                                    <td><?php echo $row['addresss']?></td>
															
															<td><a href="deluser.php?uid=<?php echo $row ['id']?>"
															class="text-inverse" title="Delete" data-toggle="tooltip">
															<i class="fa fa-trash"></i></a>
													</td>
																									 
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php

include('include/footer.php');
?>		 
</body>



</html>

