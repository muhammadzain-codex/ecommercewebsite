
<?php

include('include/header.php');
?>

<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Products List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="addproduct.php">Add Products</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Products List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xl-12">
							<div class="card-box">
								<div class="card-head">
									<header>Products List</header>
									 
								</div>
								  
										 
									<div class="table-scrollable">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
											id="example4">
											<thead>
												<tr>
													<th>#</th>
													<th>Category</th>
                                                    <th>title</th>
                                                    <th>Size</th>
                                                    <th>Colors</th>
													<th>Price</th>
													<th>Discount Price</th>
                                                    <th>Discription</th>
                                                    <th>img1</th>
                                                    <th>img2</th>
                                                    <th>img3</th>
                                                    <th>img4</th>
                                                    <th>action</th>
												</tr>
											</thead>
											<tbody>
											<?php

                                    $cte= mysqli_query($con,"SELECT * from products ");
									while($row=mysqli_fetch_array($cte)){
										$cid=$row['cid'];
                                        $cte2= mysqli_query($con,"SELECT * from categories where id='$cid' ");
                                        $cte3=mysqli_fetch_array($cte2);

									?>
												<tr class="odd">
													<td><?php echo $row['id']?></td>
													<td> <?php echo $cte3['cname']?></td>
                                                    <td><?php echo $row['title']?></td>
                                                    <td><?php echo $row['psize']?></td>
                                                    <td><?php echo $row['color']?></td>
                                                    <td><?php echo $row['price']?></td>
                                                    <td><?php echo $row['discountprice']?></td>
                                                    <td><?php echo $row['discription']?></td>
													<td><a href="<?php echo $row['img1']?>" target="_main"><img src="<?php echo $row['img1']?>" alt="" style="width:50px;height:50px; border-radius: 50%;"></a></td>
                                                    <td><a href="<?php echo $row['img2']?>" target="_main"><img src="<?php echo $row['img2']?>" alt="" style="width:50px;height:50px; border-radius: 50%;"></a></td>
                                                    <td><a href="<?php echo $row['img3']?>" target="_main"><img src="<?php echo $row['img3']?>" alt="" style="width:50px;height:50px; border-radius: 50%;"></a></td>
                                                    <td><a href="<?php echo $row['img4']?>" target="_main"><img src="<?php echo $row['img4']?>" alt="" style="width:50px;height:50px; border-radius: 50%;"></a></td>

													<td><a href="updateproducts.php?pid=<?php echo $row['id']?>" class="" data-toggle="tooltip"
															title="Edit">
															<i class="fa fa-edit"></i>
														</a> 
															
															<a href="delproduct.php?pid=<?php echo $row ['id']?>"
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

