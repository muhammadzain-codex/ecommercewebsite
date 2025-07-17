  <?php

include('include/header.php');
?>			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Decline Booking List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item Active" href="#">bookings</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								 
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								 
								 						<div class="table-scrollable">
															<table
																class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
																id="example4">
																<thead>
																	<tr>
																		<th>B_ID</th>
																		 
																		 <th>USER_ID</th>
																		 <th>USERNAME</th>
																		 <th>EMAIL</th>
																		 <th>PHONENUMBER</th>
																		 <th> P_ID </th>
																		<th>P NAME</th>
                                                                        <th>CATEGORIES</th>
              <th>SIZE</th>
              <th>COLORS</th>
              <th>QUANTITY</th>
              <th>TOTAL PRICE</th>
              <th>ZIP CODE</th>
              <th>STREET NO</th>
              <th>CITY</th>
              <th>ADDRESS</th>
              <th>B_TYPE</th>
              <th>RECEPIT</th>
              <th>B_DATE</th>
              <th>STATUS</th>
																	</tr>
																</thead>
																<tbody>
																<?php 
          
            $cart=mysqli_query($con,"SELECT * from bookings where status='2' ");
            while ($row=mysqli_fetch_array($cart)) {
           $pid=$row['pid'];
            $uid=$row['uid'];
            $udata=mysqli_query($con,"SELECT * from signin where id='$uid' ");
           $urow=mysqli_fetch_array($udata);
           $product=mysqli_query($con,"SELECT * from products where id='$pid' ");
           $prow=mysqli_fetch_array($product);
           $cid=$prow['cid'];
           $categorie=mysqli_query($con,"SELECT * from categories where id='$cid' ");
           $crow=mysqli_fetch_array($categorie);
            
           

              
             

            ?>
												 <tr class="odd">
              <td scope="row"><?php echo $row['id']?></td>
 <td scope="row"><?php echo $urow['id']?></td>
  <td scope="row"><?php echo $urow['fname']. $urow['lname'] ?></td>
  <td scope="row"><?php echo $urow['email']?></td>
  <td scope="row"><?php echo $urow['phone']?></td>
              <td><?php echo $pid?></td>
              <td><?php echo $prow['title']?></td>
              <td><?php echo $crow['cname']?></td>
              <td scope="row"><?php echo $row['psize']?></td>
              <td scope="row"><?php echo $row['color']?></td>
              <td scope="row"><?php echo $row['quantity']?></td>
              <td scope="row"><?php echo $row['tprice']?></td>
              <td scope="row"><?php echo $row['zipcode']?></td>
              <td scope="row"><?php echo $row['snumber']?></td>
              <td scope="row"><?php echo $row['city']?></td>
              <td scope="row"><?php echo $row['addresss']?></td>
              <td scope="row"><?php echo $row['ptype']?></td>
              <td><a href=" ../../admin/dark/<?php echo $row['img']?>" target="blank">  <img src="../../admin/dark/<?php echo $row['img']?>" alt="" class="pn2" width="100px"></a></td>
              <td scope="row"><?php echo $row['bdate']?></td>
              <td class="text-danger">DECLINE</td>
              
            
               
                 
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			<?php

include('include/footer.php');
?>		 
</body>

 
</html>