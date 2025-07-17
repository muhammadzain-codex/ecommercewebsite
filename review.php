<?php

include('include/header.php');
?>			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Reviews</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item Active" href="#">Reviews</a>&nbsp;<i class="fa fa-angle-right"></i>
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
																		  
																		<th>P NAME</th>
                                                                        <th>CATEGORIES</th>
              <th>SIZE</th>
              <th>COLORS</th>
              <th>QUANTITY</th>
              <th>TOTAL PRICE</th>
               <th>B_TYPE</th>
               
              <th>B_DATE</th>
              <th>Review</th>
              <th>Rating</th>
               
              
																	</tr>
																</thead>
																<tbody>
																<?php 
             
             $cart=mysqli_query($con,"SELECT * from review  ");
            
            while ($row=mysqli_fetch_array($cart)) {

           $bid= $row['bid'];
            $cart2=mysqli_query($con,"SELECT * from bookings where id='$bid' ");
               $crow3=mysqli_fetch_array($cart2);
           $pid=$crow3['pid'];
          
           $product=mysqli_query($con,"SELECT * from products where id='$pid' ");
           $prow=mysqli_fetch_array($product);
           $cid=$prow['cid'];
           $categorie=mysqli_query($con,"SELECT * from categories where id='$cid' ");
           $crow=mysqli_fetch_array($categorie);
            
           

              
             

            ?>
												 <tr class="odd">
             
               
              <td><?php echo $prow['title']?></td>
              <td><?php echo $crow['cname']?></td>
              <th scope="row"><?php echo $prow['psize']?></th>
              <th scope="row"><?php echo $prow['color']?></th>
              <th scope="row"><?php echo $crow3['quantity']?></th>
              <th scope="row"><?php echo $crow3['tprice']?></th>
               <th scope="row"><?php echo $crow3['ptype']?></th>
                
             
              <th scope="row"><?php echo $crow3['bdate']?></th>
               <th scope="row"><?php echo $row['review']?></th>
                <th scope="row"><?php echo $row['stars']?> Stars</th>
              
             
              
               
            
                 
            </tr>
            <?php }?> 
																</tbody>
					 
 
<div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="get" action="insertrating.php">
          <div class="form-group">
             
            <input type="hidden" class="form-control" id="recipient-name" name="bid" value="<?php echo  $bid?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Review</label>
            <textarea class="form-control" id="message-text" name="review" required></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Rating</label>
            <br>
             <input type="radio" name="rating" value="1" checked >1
             <input type="radio" name="rating" value="2">2
             <input type="radio" name="rating" value="3">3
             <input type="radio" name="rating" value="4" >4
             <input type="radio" name="rating" value="5" >5
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Review</button>
      </div>
    </div>
  </div>
</div>	
</form>									</table>
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


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/all_students.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2019 12:43:16 GMT -->
</html>