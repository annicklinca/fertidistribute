<?php
      include "navbar.php";
      if (isset($_POST['send'])){
    
        $budget_year=$_POST['budget_year'];
        $budget=$_POST['budget'];
        $fertilizerid=$_POST['fertilizerid'];
      
    
        $sql=mysqli_query($conn,"INSERT INTO budget(
            budget_year,budget, ferti_type) VALUES (
                '$budget_year','$budget',' $fertilizerid'
                )");
    
            if ($sql) {

                $successmessage .='Add Budget, Successfully';  
             
            }
            else {
                $errormessage .='Add Budget failed!'.$conn->error;     
            } 
    } 
      ?>

        <div class="page-wrapper">
 
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Budget</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Table Basic</li>
                        </ol>
                    </div>
                
                </div>
                 <div class="row">
          <div class="col-sm-12">
                                    <h5 class="mt-4"></h5>
                                    <hr>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Add Budget</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">All </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                           <form action="" method="POST" enctype="multipart/form-data">
                                                    
                                           <?php
                                                            if ( isset($successmessage)) {
                                                                echo '
                                                                                
                                                                    <div class="card-body">
                                                                    <ul class="list-group">
                                                                    <li class="list-group-item list-group-item-success">'.$successmessage.'</li>
                                                                    </ul>
                                                                    </div>
                                                                ';
                                                            }
                                                            ?>
                                                            <?php
                                                            if ( isset($errormessage)) {
                                                            echo '
                                                            <div class="card-body">
                                                            <ul class="list-group">
                                                            <li class="list-group-item list-group-item-success">'.$errormessage.'</li>
                                                            </ul>
                                                            </div>
                                                            ';
                                                            }
                                                            ?>
                                            
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Budget Year</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="budget_year" class="form-control form-control-normal"
                                                        placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Budget Amount</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="budget" class="form-control form-control-normal"
                                                        placeholder="">
                                                    </div>
                                                </div>
                                             
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Fertilizer Name</label>
                                                    <div class="col-sm-10">
                                                    <select name="fertilizerid" class="form-control form-control-normal">
                                              <?php
                                                    $quer=mysqli_query($conn,"SELECT * FROM fertilizer ");
                                                      while ($row=mysqli_fetch_array($quer)){
                                               ?>
                                                <option value="<?php echo $row['ferti_type'] ; ?>"><?php echo $row['ferti_type'] ; ?></option>
                                                  <?php
                                                    }
                                                  ?>
                                               </select>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="submit" name="send" value="Save"
                                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table  table-bordered no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Budget Year</th>
                                                    <th>Budget Amount</th>
                                           
                                                    <th>Delete</th>
                                                    <th>Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $quer=mysqli_query($conn,"SELECT * FROM budget");
                                                while ($row=mysqli_fetch_array($quer)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['budget_id'] ; ?></td>
                                                    <td><?php echo $row['budget_year'] ; ?></td>
                                                    <td><?php echo $row['budget'] ; ?></td>
                                                    <td><a class="btn btn-danger"  href="delete.php?delrequest=<?php echo $row['request_id']; ?> " onclick="return confirm('are you sure! you want to delete')" id="red">Delete</a></td>
                                                    <td><a class="btn btn-primary"  href="requestupdate.php?updaterequest=<?php echo $row['request_id']; ?>"  id="red">Update</a></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
       
          </div>
            </div>
            <footer class="footer">
                ?? Elie.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- jQuery peity -->
    <script src="assets/node_modules/peity/jquery.peity.min.js"></script>
    <script src="assets/node_modules/peity/jquery.peity.init.js"></script>
</body>

</html>