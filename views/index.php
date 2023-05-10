<?php

  require_once("../controller/database.php");
  session_start();

  // $emp_id = $_SESSION['emp_id'];

?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <?php include'components/head.php';?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include'components/sidebar.php'; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include'components/navbar.php'; ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                      Add Contact
                    </button>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                <div class="card shadow">
                <h5 class="card-header">Contacts</h5>
                      <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table">
                          <thead class="text-center">
                            <tr class="text-nowrap">                      
                              <th>Name</th>
                              <th>Contact Number</th>
                              <th>Date Added</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                          <?php
                              $sql = "SELECT * FROM contacts";
                              $query = mysqli_query($connection, $sql);

                              while($row = mysqli_fetch_assoc($query)){

                                  $contact_id = $row['contact_id'];
                                  $contact_name = $row['contact_name'];
                                  $contact_number = $row['contact_number'];
                                  $date_added = $row['date_added'];
                                  
                            ?>
                            <tr class="text-center">
                              <td hidden><?php echo $contact_id;?></td>
                              <td><?php echo $contact_name;?></td>
                              <td><?php echo $contact_number;?></td>
                              <td><?php echo $date_added;?></td> 
                              <td>
                              <div class="dropdown">
                                  <button class="btn" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                          <a id="editbtn" class="dropdown-item text-danger" style="cursor: pointer;"  data-bs-toggle="modal" data-bs-target="#edit"
                                              data-contact_id="<?php echo	$contact_id; ?>"
                                              data-contact_name="<?php echo $contact_name; ?>"
                                              data-contact_number="<?php echo $contact_number; ?>"
                                              >Edit

                                          </a>   
                                          <a id="delbtn" class="dropdown-item text-danger" style="cursor: pointer;"
                                              data-contact_id="<?php echo	$contact_id; ?>"
                                              data-contact_name="<?php echo $contact_name; ?>"
                                              >Delete
                                          </a>     
                                  </div>
                              </div>
                              </td>
                            </tr>
                          </tbody>
                          <?php
                            }
                          ?>
                        </table>
                      </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                    
                    <div class="card shadow"> 
                      <h5 class="card-header">Weather Forecast</h5>
                          <div class="card-body">
                            <div class="row justify-content-center">
                                  <h2><strong><i class='bx bx-current-location bx-tada' style="font-size: 42px;"></i>Davao City</strong></h2>
                                    <img  src="images/thermometer.png" style="width:50%;heigth:50%" >
                          
                                <h3 class="text-center mt-4" id="temperature"></h3>
                                <h5 class="text-center" id="description" ></h5>
                            </div>
                            <div class="row justify-content-around mt-3">
                                <div class="col">
                                <i class='bx bx-water bx-tada bx-flip-horizontal' ></i>
                                  <h3 class="">Humidty</h3>
                                  <h5 class="" id="humidity"></h5>
                                </div>
                                <div class="col">
                                  <div class="row">
                                  <i class='bx bx-wind bx-fade-right bx-flip-horizontal' ></i>
                                  <h3 class="">Wind</h3>
                                  <h5 class="" id="wind"></h5>
                                  </div>
                                </div>
                            </div>

                          </div> 
                          

                    </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <?php include'components/footer.php'; ?>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- script -->
    <?php include'components/script.php'; ?>
    <!-- script -->
  </body>

  <!-- modal start -->
  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Name</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-control"
                  placeholder="Enter Name"
                />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">Email</label>
                <input
                  type="number"
                  id="contact_number"
                  name="contact_number"
                  class="form-control"
                  placeholder="+63999######"
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" id="submit_contact" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="layout-overlay layout-menu-toggle"></div>
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit Contact</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <input type="number" id="e_contact_id" readonly hidden>
                            <div class="row mb-3">
                                    <div class=" mb-3">
                                        <input type="text" class="form-control" id="e_contact_name" placeholder="Name">
                                        <label for="prodname">Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class=" ">
                                        <input type="number" class="form-control" id="e_contact_number" placeholder="Contact Number">
                                        <label for="e_contact_number">Contact Number <span class="text-danger">*</span></label>
                                    </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="reset" id="cancel" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel <i class="bx bx-x"></i></button>
                            <button type="button" id="e_emp" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Save <i class="bx bx-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  <!-- modal end -->
<script src="https://kit.fontawesome.com/7c8801c017.js" crossorigin="anonymous"></script>
<script src="index.js"></script>

</html>
