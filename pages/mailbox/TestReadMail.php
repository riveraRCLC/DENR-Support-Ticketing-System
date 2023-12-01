<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="style.css">-->
  <title> Read Mail</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php
if($_SESSION["email"]) {
?>

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
        <a href="/DENR-Support-Ticketing-System/pages/UserDetails/UserDetails.php" class="d-block"><?php echo $_SESSION["ufname"] . ' ' . $_SESSION["ulname"]; ?></a> 

          
        </div>
     
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                  <a href="/DENR-Support-Ticketing-System/pages/Dashboard/dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard      
                    </p>
                   </a>      
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Department Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="users/workingscholars.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Working Scholars</p>
                    </a>
                  </li>
                </ul>
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
                    <a href="pages/TestingGround/Test1.html" class="nav-link">
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
                        <a href="../examples/login.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Login</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../examples/register.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../examples/forgot-password.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Forgot Password</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="../examples/recover-password.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Recover Password</p>
                        </a>
                      </li>
                    </ul>
                  </li>
            

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
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="/DENR-Support-Ticketing-System/pages/mailbox/TestMailbox.php" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
                      <span class="badge bg-primary float-right">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-filter"></i> Junk
                      <span class="badge bg-warning float-right">65</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> Trash
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Labels</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
           
           
            </div>
            <!-- /.card -->
          
          
          </div>
          <!-- /.col -->

        <!-- ------------------------------------------------------------------------------------------------------------------------->
        
        <!-- to add accordion here id="accordion"-->
        
        <div class="col-md-9" id="ReadMail_Data">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5 id="TestSubb">Message Subject Is Placed Here</h5> 
                <h6 id="TESTINGidREAD" >
                  </h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" title="Print">
                  <i class="fas fa-print"></i>
                </button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message" id="letterBody">
                
                <!-- /.MESSAGE BODY POPULATE STARTS HEREEEE!!!! -->


              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
           
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default" onclick="ReplyAccordion()"><i class="fas fa-reply" ></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

<!--START HERE TO PUT ALL THE AUTOMATED ACCORDIONS-----------------------------------------------------------------089089089089089080890-->

          <!--LAST DIV-->
        </div>

        

        <!-- ------------------------------------------------------------------------------------------------------------------------->
         
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->

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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script>
var tempUserID = localStorage.getItem("getSenderUserID");
var tempUserID2 = tempUserID;
var tempMergeFrom = "From: " + tempUserID;
var tempSub = localStorage.getItem("getSub");
var tempBody = localStorage.getItem("getBody");
var tempDate = localStorage.getItem("getDate");
var tempConvoid = localStorage.getItem("getConvoid");
var tempTicketID = localStorage.getItem("getTicketID");
var tempconSenderID = localStorage.getItem("getconSenderID");


// Set the text content using pure JavaScript
document.getElementById("TESTINGidREAD").textContent = tempMergeFrom;                                                                                              


              $(document).ready(function () {
               
                  // Additional content using jQuery
                  var tr = '<span class="mailbox-read-time float-right">'+tempDate+'</span>';
                  $('#TESTINGidREAD').append(tr);
                  $('#TestSubb').html(tempSub);
                  $('#letterBody').html(tempBody);
                  ReadMailList(tempConvoid, tempTicketID);
              });
              
            function ReadMailList(tempConvoid, tempTicketID) {
              $.ajax({
                  type: 'post', // Change to 'post' if you want to use POST method
                  data: {
                      tempConvoid: tempConvoid,
                      tempTicketID: tempTicketID
                      
                  },
                  url: "/DENR-Support-Ticketing-System/pages/mailbox/includes/read-mail.inc.php",
                  success: function (data) {
                      var response = JSON.parse(data);
                      console.log(response);
                      console.log(tempConvoid + " ConvoID");
                      console.log(tempTicketID+ " TicketID");

                      console.log(tempUserID+ " UserID");
                      console.log(tempconSenderID+ " ConSenderID");
                      var tr = '';
                          for (var i = 0; i < response.length; i++) {
                                      var convoid = response[i].convoid;
                                      var ticketnum = response[i].ticketnum;
                                      var senderFirstName = response[i].ufname;
                                      var senderLastName = response[i].ulname;
                                      var subject = response[i].conSub;
                                      var body = response[i].conbody;
                                      var date = response[i].condate;
                                      var tempMergeSender = "From: " + senderFirstName+ " " + senderLastName;
                                  // to change all the variables and the construction of the HTML Write
                                  


                                    tr +=   '<div class="accordion" id="accordionExample">';
                                    tr +=   '<div class="card">';
                                    tr +=   '<div class="card-header" id="headingOne">';
                                    tr +=   '<h5 class="mb-0">';
                                    tr +=   '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">';
                                    // put here the SUBJECT HERE
                                    tr +=   '' + subject + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp' + date + '';
                                    tr +=   '</button>';
                                    tr +=   '</h5>';
                                    tr +=   '</div>';

                                    tr +=   '<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">';
                                    tr +=   '<div class="card card-primary card-outline">';
                                    tr +=   '<div class="card-header">';
                                    tr +=   '<h3 class="card-title">' + tempMergeSender + '</h3>';

                                    tr +=   '<div class="card-tools">';
                                    tr +=   '<a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>';
                                    tr +=   '<a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>';
                                    tr +=   '</div>';
                                    tr +=   '</div>';

                                                    // <!-- /.card-header -->
                                    tr +=   '<div class="card-body p-0">';
                                                      //  <!-- Your content goes here -->
                                    tr +=   '<div class="mailbox-read-info">';
                                    tr +=   '<h5 id="TestSubb">' + body + '</h5>';
                                    tr +=   '<h6 id="TESTINGidREAD"></h6>';
                                    tr +=   '</div>';
                                                        //    <!-- /.mailbox-read-info -->
                                    tr +=   '<div class="mailbox-controls with-border text-center">';
                                                        //    <!-- Your controls go here -->
                                    tr +=   '</div>';
                                                        // <!-- /.mailbox-controls -->
                                    tr +=   '<div class="mailbox-read-message" id="letterBody">';
                                                          //   <!-- /.MESSAGE BODY POPULATE STARTS HEREEEE!!!! -->
                                    tr +=   '</div>';
                                                        //   <!-- /.mailbox-read-message -->
                                    tr +=   '</div>';
                                                        //     <!-- /.card-body -->

                                                        // <!-- /.card-footer -->
                                    tr +=   '<div class="card-footer">';
                                    tr +=   '<div class="float-right">';
                                    tr +=   '<button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>';
                                    tr +=   '<button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>';
                                    tr +=   '</div>';
                                    tr +=   '<button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>';
                                    tr +=   '<button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>';
                                    tr +=   '</div>';
                                                        // <!-- /.card-footer -->
                                    tr +=   '</div>';
                                    tr +=   '</div>';
                                    tr +=   '</div>';
                                    tr +=   '</div>';

                                  }

                                  $('#ReadMail_Data').append(tr);
                    },
                error: function (xhr, status, error) {
                      // Handle AJAX request errors
                      alert('AJAX Error: ' + error);
                      console.log(tempConvoid);
                        console.log(tempTicketNum);
                  }
            });   
          }

          function ReplyAccordion() {
                      var tr = '';
                      tr += '<div class="card-body id="ReplyAccordionID"">';
                      tr += '<div class="form-group">';
                      tr += '<input type="email" id="to_input" class="form-control" placeholder="To: ' + tempUserID2 + ' "> ';
                      tr += '</div>';
                      tr += '<div class="form-group">';
                      tr += '<input type="text" id="subject_input" class="form-control" placeholder="Subject:">';
                      tr += '</div>';
                      tr += '<div class="form-group">';
                      tr += '<textarea id="compose_textarea" class="form-control" style="height: 150px"></textarea>';
                      tr += '</div>';
                      tr += '<div class="form-group">';
                      tr += '<div class="btn btn-default btn-file">';
                      tr += '<i class="fas fa-paperclip"></i> Attachment';
                      tr += '<input type="file" name="attachment">';
                      tr += '</div>';
                      tr += '<p class="help-block">Max. 32MB</p>';
                      tr += '</div>';
                      tr += '</div>';
                      tr += '<!-- /.card-body -->';
                      tr += '<div class="card-footer">';
                      tr += '<div class="float-right">';
                      tr += '<button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>';
                      tr += '<button type="submit" class="btn btn-primary" onclick="SendConversation(tempTicketID,tempconSenderID)"><i class="far fa-envelope"></i> Send</button>';
                      tr += '</div>';
                      tr += '<button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>';
                      tr += '</div>';  // This div closes the card-footer
                      tr += '</div>';  // This div closes the card-outline
                      tr += '</div>';  // This div closes the card

                          $('#ReadMail_Data').append(tr);  // Append the content

                        
                      }

          function SendConversation(tempTicketID,tempconSenderID) {
                var currentTicketID = tempTicketID;
                // The Sender Will be the Receiver since you gonna Reply to him so your a Sender right now
                var currentconReceiverID = tempconSenderID;
                var conSub = $('#subject_input').val();
                var conSenderID = <?php echo json_encode($_SESSION["id"]); ?>;
               // var conReceiverID = $('#to_input').val();
                var conbody = $('#compose_textarea').val();
                
                $('#ReplyAccordionID').hide();
                $.ajax({
                        type: 'post',
                        data: {
                            conSub: conSub,
                            conSenderID: conSenderID,
                            conReceiverID: currentconReceiverID,
                            conbody: conbody,
                            currentTicketID: currentTicketID,
                        },
                        url: "/DENR-Support-Ticketing-System/pages/mailbox/includes/replyConvo.inc.php",
                        success: function (data) {
                          console.log(data);
                            var response = JSON.parse(data);
                            if (response.success) {
                                // Conversation added successfully, you can clear the form or show a success message
                                alert(response.message);
                            } else {
                                // Conversation submission failed, show an error message
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle AJAX request errors
                            alert('AJAX Error: ' + error);
                            console.log(currentTicketID);
                            console.log(currentconReceiverID);
                            console.log(conSub);
                            console.log(conSenderID);
                        }
                    });
                }

</script>
<?php
}else echo "<h1>Please login first .</h1>";
?>
</body>
</html>
