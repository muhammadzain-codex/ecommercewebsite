
<?php

include('include/header.php');
?>

<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Categories List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="addcategorie.php">Add Categories</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Categories List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xl-12">
							<div class="card-box">
								<div class="card-head">
									<header>Categories List</header>
									 
								</div>
								  
										 
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th>#</th>
													<th>categorie Name</th>
													 
													<th>Picture</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

                                    $cte= mysqli_query($con,"SELECT * from categories ");
									while($row=mysqli_fetch_array($cte)){
										$cid=$row['id'];
									?>
												<tr class="odd">
													<td><?php echo $cid ?></td>
													<td> <?php echo $row['cname']?></td>
													<td><a href="<?php echo $row['img']?>" target="_main"><img src="<?php echo $row['img']?>" alt="" style="width:50px;height:50px; border-radius: 50%;"></a></td>
													<td><a href="updatecategorie.php?cid=<?php echo $cid?>&cname=<?php echo $row['cname']?>" class="" data-toggle="tooltip"
															title="Edit">
															<i class="fa fa-edit"></i>
														</a> 
															
															<a href="delcate.php?cid=<?php echo $cid?>"
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

