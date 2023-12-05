<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- IF STATEMENT IF THE USER DIDN'T LOG IN PROPERLY-->
<?php
if($_SESSION["email"]) {
?>
<div class="wrapper">

<div class="wrapper">
  

  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ticketing System</span>
    </a>

     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Welcome</a> 
        <a href="#" class="d-block"><?php echo $_SESSION["ufname"] . ' ' . $_SESSION["ulname"]; ?></a>

          
        </div>
     
      </div>

  


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
               <a href="/DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
    
              

      <!---------------------------------            TESTING LOG IN              -------------------------------------------->
              


              <li class="nav-item menu-open">
                <a href="/DENR-Support-Ticketing-System/pages/register/includes/logout.inc.php" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                  Welcome <?php echo $_SESSION["email"]; ?>.<br>
                   Click here to Logout.


                
                  </p>
                </a>
              </li>
              
                  
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    Mailbox
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/DENR-Support-Ticketing-System/pages/mailbox/TestMailbox.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Inbox</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/DENR-Support-Ticketing-System/pages/mailbox/TestCompose.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Compose</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/DENR-Support-Ticketing-System/pages/mailbox/TestReadMail.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Read</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/DENR-Support-Ticketing-System/pages/TestingGround/Test1.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>TestPage1</p>
                    </a>
                  </li>
                </ul>  
                
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Login & Register
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="pages/register/login.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Login</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/register/register.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/register/forgotpass.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Forgot Password</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/register/recovery.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Recover Password</p>
                        </a>
                      </li>
                    </ul>
                  </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- YOUR PROFILE CARD -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Your Profile</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
               
          <form action="includes/UserDetails.inc.php" method="POST">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name</label>
                                                                                  <!-- to add here the Data From database dynamically-->
                          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="<?php echo $_SESSION["ufname"]; ?>">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="middleName" id="middleName" placeholder="<?php echo $_SESSION["umname"]; ?>">
                        </div>
                      
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Company</label>
                            <select id="CompanyChoices" class="form-control select2" style="width: 100%;"></select>
                        </div>
                        <!-- /.form-group -->
                              
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                    
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" class="form-control" name="lastName" id="lastName" placeholder="<?php echo $_SESSION["ulname"]; ?>">
                        </div>
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="phoneNum" id="phoneNum" placeholder="<?php echo $_SESSION["phonenum"]; ?>">
                        </div>
                        
                      </div>
                      <!-- /.col -->
                    
                    </div>
                    <!-- /.row -->

          
                      
                      <button type="submit" name="save_changes" class="btn btn-primary"  >Save</button>
                            
                      <!-- /.col -->
                    
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    
                  </div>
                  <!-- /.card-body -->
                      <div class="card-footer">
                        Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                        the plugin.
                      </div>
                  </form>

        <!-- YOUR PROFILE CARD -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Register Your Company</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="includes/signup.inc.php" method="POST" onsubmit="return validateForm()">
         

            <h5>Company</h5>
            <div class="row">
              <div class="col-12 col-sm-6">
              <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail122" placeholder="Enter Company Name">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                  <div class="form-group">
                  <label>Company Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter Company Address">
              </div>
                
                <!-- /.form-group -->
              </div>
              
              <button class="btn btn-primary" >Save</button>
                    
              <!-- /.col -->
            
              <!-- /.col -->
            </div>
            <!-- /.row -->
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
      
        
      
        <!-- /.card -->

        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Logins</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Various information</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                        <label ">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword3">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword5">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword5" placeholder="Confirm Password">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        <!-- /.row -->
       
          
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
    $(document).ready(function () {
    CompanyChoices();
    UserCompany();
});

function CompanyChoices() {
    $.ajax({
        type: 'get',
        url: "/DENR-Support-Ticketing-System/pages/UserDetails/includes/CompanyChoices.inc.php",
        success: function (data) {
            // No need to parse JSON, as the response is already expected to be JSON
            var response = JSON.parse(data);
            console.log(response);
            
            var options = response.map(function (item) {
                return $('<option>', { text: item.compname });
            });
            
            $('#CompanyChoices').html(options);
        },
        error: function (xhr, status, error) {
            // Handle AJAX request errors
            alert('AJAX Error: ' + error);
        }
    });
}

function UserCompany() {
    $.ajax({
        type: 'get',
        url: "/DENR-Support-Ticketing-System/pages/UserDetails/includes/CheckCompany.inc.php",
        success: function (data) {
            var response = JSON.parse(data);
            console.log(response);

            if ('compname' in response) {
                // Create an option with the company name and set it as selected
                var option = $('<option>', { text: response.compname, selected: 'selected' });
                $('#CompanyChoices').html(option);
            } else if ('error' in response) {
                // Handle the case where an error occurred
                alert('Error: ' + response.error);
            } else {
                // Handle other unexpected cases
                alert('Unexpected response format');
            }
        },
        error: function (xhr, status, error) {
            // Handle AJAX request errors
            alert('AJAX Error: ' + error);
        }
    });
}

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<!-- ELSE STATEMENT IF DOES NOT LOG IN -->
<?php
}else echo "<h1>Please login first .</h1>";
?>

</body>
</html>
