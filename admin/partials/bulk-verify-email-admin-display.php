<?php

$title = 'Bulk_verify_email';

$credits = 0;
$user_name = '';
$user_image = '';
$user_token = '';
$user_email = '';

$isEx = false;

if(isset($_COOKIE['wp_plugin_email_verify_user_name'])) {
    $user_name = sanitize_user($_COOKIE["wp_plugin_email_verify_user_name"]);
}
if(isset($_COOKIE['wp_plugin_email_verify_user_image'])) {
    $user_image = sanitize_text_field($_COOKIE["wp_plugin_email_verify_user_image"]);
}
if(isset($_COOKIE['wp_plugin_email_verify_user_token'])) {
    $user_token = sanitize_key($_COOKIE["wp_plugin_email_verify_user_token"]);
}
if(isset($_COOKIE['wp_plugin_email_verify_user_token'])) {
    $user_email = sanitize_email($_COOKIE["wp_plugin_email_verify_user_email"]);
}
if(isset($_COOKIE['wp_plugin_email_verify_user_credits'])) {
    $credits = $_COOKIE["wp_plugin_email_verify_user_credits"];
}

if(empty($user_email) || $user_email === ''){
    $user_email = '835468954@qq.com';
    $isEx = true;
}

if(empty($user_token) || $user_token === ''){
    $user_token = 'G2RNeNBtW16qnLoHJaaI';
    $isEx = true;
}


$delete_csv_file_func = 'plugin_delete_csv_file.php';
$download_email_func = 'plugin_download_csv_email.php';
$download_file_func = 'plugin_download_csv_file.php';
$emails_verify_func = 'plugin_email_verify.php';
$get_running_task_status = 'plugin_get_running_tasks.php';
$get_order = 'plugin_get_order.php';
$percent_count_func = 'plugin_verify_per_count.php';

$scan_mail = $user_email;

$domain = 'https://emailverifier.online/bulk-verify-email/';
$login = 'plugin_login.php';

global $wpdb;

//$wpdb->insert(
//    $wpdb->options,
//    array(
//        'option_name' => 'bulk_verify_email_user_email',
//        'option_value' => '835468954@qq.com',
//    ),
//    array(
//        '%s',
//        '%s',
//    )
//);

//$email = $wpdb->get_row( "SELECT * FROM $wpdb->options WHERE option_name = 'bulk_verify_email_user_id'" );
//echo $email->option_value; // prints "10"
?>

<?php if( empty($user_token) || empty($user_name) || empty($user_email)) { ?>

<style >
    .container{
        padding: 20px 10%;
        background-color: rgb(230,230,230);
    }
    .title{
        font-weight: bold;
        font-size: 18px;
        color: black;
        margin-top: 40px;
        margin-bottom: 20px
    }
    .content{
        background-color: white;
        padding: 10px 20px;
    }
    .content-header{
        height: 50px;
        border-bottom: 1px solid grey;
    }
    .name{
        display: inline-block !important;
        width: 30%;
        font-size: 16px;
    }
    .form-control{
        display: inline-block !important;
        width: 65%;
    }
    .register-form{
        margin-bottom: 10px
    }
</style>

<div class="container">
    <div class="header">
        <img src="https://emailverifier.online/bulk-verify-email/assets/app-img/logo.png" style="height: 34px;margin-right: 30px;" alt="">
        <button id="show_signin2" type="button" class="btn btn-primary" style="margin-right: 10px">Account</button>
        <a type="button" class="btn btn-default" href="https://emailverifier.online/faqs" target="_blank">FAQS</a>
    </div>
    <div class="title">Real-Time Verification</div>
    <div>
        <input id="email" name="email" type="text" class="form-control" style="width: 60%;display: inline-block;">
        <button id="verifyBtn" type="button" class="btn btn-primary" style="margin-left: 10px; margin-bottom: 5px;">Verify</button>
    </div>
    <div class="title">Bulk Email List Verification</div>
    <div class="content">
        <div class="content-header">
            <div style="display: inline-block;font-size: 18px;">REGISTER WITH BULK VERIFY EMAIL</div>
            <button id="show_signup" type="button" class="btn btn-primary" style="float: right;">Sign Up</button>
            <button id="show_signin" type="button" class="btn btn-primary" style="float: right;">Already Have an Account?Sign In</button>
        </div>
        <p style="margin-top: 15px;font-size: 15px;margin-bottom: 20px;">
            Do you have a large number of email addresses need to clean? If so, our plugin can help you to verify your bulk email list in a short time. Now, only need to create an account, you can get an unlimited email verification service!
            No Credit Card! No Verification Limit! High Accuracy! Free to use!
            All you need is what we have. Register Now!.
        </p>
        <div id="reg_form" >
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>Email:</div>
                <input id="remail" type="text" class="form-control" placeholder="support@emailverify.online">
            </div>
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>Website/Company Name:</div>
                <input id="rcname" type="text" class="form-control" placeholder="emailverify.online">
            </div>
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>FirstName:</div>
                <input id="rfname" type="text" class="form-control" placeholder="Enter your First Name">
            </div>
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>LastName:</div>
                <input id="rlname" type="text" class="form-control" placeholder="Enter your Last Name">
            </div>
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>Password:</div>
                <input id="pass" type="password" class="form-control" id="pwd" placeholder="Choose your password(Min length 6)">
            </div>
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>Confirm Password:</div>
                <input id="cpass" type="password" class="form-control" id="new-pwd" placeholder="Confirm your password">
            </div>
            <button id="register" type="button" class="btn btn-primary" style="display:block;margin:0 auto">Register</button>
        </div>
        <div id="signin_form">
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>Email:</div>
                <input id="semail" type="text" class="form-control" placeholder="support@emailverify.online">
            </div>
            <div class="register-form">
                <div class="name"><span style="color:red">*</span>Password:</div>
                <input id="spass" type="password" class="form-control" id="pwd" placeholder="Choose your password(Min length 6)">
            </div>
            <button id="signin" type="button" class="btn btn-primary" style="display:block;margin:0 auto">Sign in</button>
        </div>
    </div>
</div>

<script>
    jQuery("#signin_form").hide()

    jQuery("#verifyBtn").click(function(){
        var my_email = document.getElementById('email').value;
        var myreg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
        if (!myreg.test(my_email)) {
            alert('Please enter the correct email format.')
            return
        } else {
            var params = 'email='+my_email+'&index=0&token=12345&frommail=835468954@qq.com&timeout=10&scan_port=25'.trim()
            jQuery.ajax({
                type: "post",
                url: "<?php echo $domain; ?>functions/quick_mail_verify_no_session.php",
                data: params,
                async: false,
//                 contentType : "application/json",
                dataType : "json",
                success:function(msg) {
                    console.log(msg)
                    alert('Verify'+' '+msg.status,{time:2000});
                }
            });
        }
    })

    jQuery("#register").click(function(){
        var email = document.getElementById('remail').value;
        var cname = document.getElementById('rcname').value;
        var fname = document.getElementById('rfname').value;
        var lname = document.getElementById('rlname').value;
        var pass = document.getElementById('pass').value;
        var con_pass = document.getElementById('cpass').value;

        if (!email || !cname || !fname || !lname || !pass || !con_pass) {
            alert('Please enter required fields.')
            return
        }

        var myreg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
        if (!myreg.test(email)) {
            alert('Please enter the correct email format.')
            return
        } else {
            // var params = 'email='+email+'&cname='+ cname +'&fname=' + fname + '&lname='+ lname +'&pass='+ pass +'&con_pass=' + con_pass +''.trim()
            var params = {
                email: email,
                cname: cname,
                fname: fname,
                lname: lname,
                pass: pass,
                con_pass: con_pass,
            }
            jQuery.ajax({
                type: "post",
                url: "<?php echo $domain; ?>functions/register.php",
                data: params,
                async: false,
//                 contentType : "application/json",
//                 dataType : "json",
                success:function(msg) {
                    alert(msg.err_msg)
                    if (msg.status === 0) {
                        jQuery("#signin_form").show()
                        jQuery("#reg_form").hide()
                    }
                }
            });
        }
    })

    jQuery("#signin").click(function(){
        var email = document.getElementById('semail').value;
        var pass = document.getElementById('spass').value;

        if (!email || !pass) {
            alert('Email and password cannot be empty.');
            return
        }

        var myreg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
        if (!myreg.test(email)) {
            alert('Please enter the correct email format.')
            return
        }

        var password_pattern = /^(\w){5,20}$/;
        if (!password_pattern.test(pass)) {
            alert('Please enter the correct format password.');
            return;
        }

        jQuery.ajax({

            url: "<?php echo $domain;?>functions/<?php echo $login;?>",

            type: "post",

            data: {email: email, password: pass, login_action: ''},

            async: false,

            success: function (response) {
                console.log(response)
                response = JSON.parse(response)
                var status = response.status
                if (status === 'ok') {
                    jQuery.cookie('wp_plugin_email_verify_user_image', response.image, { expires: 7 });
                    jQuery.cookie('wp_plugin_email_verify_user_name', response.fname, { expires: 7 });
                    jQuery.cookie('wp_plugin_email_verify_user_token', response.token, { expires: 7 });
                    jQuery.cookie('wp_plugin_email_verify_user_email', email, { expires: 7 });
                    jQuery.cookie('wp_plugin_email_verify_user_credits', response.credits, { expires: 7 });
                    alert('Login success.');
                    window.location.reload(false);
                }
                else {
                    alert(response.msg)
                }
            },

            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Please contact us for server failure.");
                return false;
            }
        });
    })

    jQuery("#show_signin").click(function(){
        jQuery("#signin_form").show()
        jQuery("#reg_form").hide()
    })

    jQuery("#show_signup").click(function(){
        jQuery("#signin_form").hide()
        jQuery("#reg_form").show()
    })

    jQuery("#show_signin2").click(function(){
        jQuery("#signin_form").show()
        jQuery("#reg_form").hide()
    })
</script>

<?php } ?>


<?php if( (!empty($user_token) && $user_token != '') && (!empty($user_name) && $user_name != '') && (!empty($user_email) && $user_email != '') ) { ?>

<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" style="overflow-x: inherit;" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-lg-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Email Enter -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <?php if( empty($user_token) || $user_token == '' || empty($user_name) || $user_name == '' || empty($user_email) || $user_email == ''){ ?>
                            <div style="float:left;">
                                <input id="email" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                <input id="password" type="password" name="password" placeholder="Password">
                                <button id="login" type="submit" name = "login_action">Login</button>
                                <a href="<?php echo $domain; ?>app/login.php" role="button" aria-haspopup="true" aria-expanded="false" target="_blank">
                                    Register
                                </a>
                            </div>
                        <?php }?>
                    </li>
                </ul>


                <!-- Topbar Navbar -->
                <?php if( (!empty($user_token) && $user_token != '') && (!empty($user_name) && $user_name != '') && (!empty($user_email) && $user_email != '') ){ ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle">
                                <span id="credits" class="mr-2 d-none d-lg-inline text-gray-600">Credits: <?php echo $credits; ?></span>
                            </a>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $user_name; ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo $domain; ?>uploads/<?php echo (!empty($user_image) && $user_image != '' && !isset($user_image) ) ? $user_image : 'thumb.png'; ?>">
                            </a>

                            <div id="logoutPanel" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="#" id="openLogoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                <?php }?>
            </nav>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <?php if( (!empty($user_token) && $user_token != '') && (!empty($user_name) && $user_name != '') && (!empty($user_email) && $user_email != '') ){ ?>
                        <h1 class="h3 mb-0 text-gray-800">My Listing</h1>
                    <?php } else { ?>
                        <h1 class="h3 mb-0 text-gray-800">Example Listing</h1>
                    <?php }?>
                    <div class="pull-right">
                        <?php if( (!empty($user_token) && $user_token != '') && (!empty($user_name) && $user_name != '') && (!empty($user_email) && $user_email != '') ){ ?>
                            <a href="#" id="add_list" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add List</a>
                            <a href="#" id="show-pay-modal" style="display:none;" data-toggle="modal" data-target="#verify">verify</a>
<!--                            <a data-toggle="modal" data-target="#addList" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add List</a>-->
<!--                            <a style="display:none;" data-toggle="modal" data-target="#verify">verify</a>-->
                        <?php } else { ?>
                            <a href="<?php echo $domain; ?>app/login.php" target="_blank" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">Register</a>
                        <?php }?>
                    </div>
                </div>
            </div>

            <?php
//                if( (!empty($user_token) && $user_token != '') && (!empty($user_name) && $user_name != '') && (!empty($user_email) && $user_email != '') ) {
                    // create curl resource

//                    $ch = curl_init();
//
//                    // set url
//                    curl_setopt($ch, CURLOPT_URL, $domain . "functions/plugin_get_email_list.php?email=" . $user_email . "&token=" . $user_token);
//
//                    //return the transfer as a string
//                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//                    // $output contains the output string
//                    $output = curl_exec($ch);
//
//                    $emails = json_decode($output, true);

                    $response = wp_remote_get( $domain . "functions/plugin_get_email_list.php?email=" . $user_email . "&token=" . $user_token );
                    $body     = wp_remote_retrieve_body( $response );
                    $emails = json_decode($body, true);

                    if(isset($emails['status'])){
                        echo $emails['msg'];
                        $emails = [];
                    }
                    else {
                        $credits = $emails[0]['credits'];
                        $i = $c = 0;
                    }

                    foreach($emails as $k=>$val){

                        $csv_file_name = $val['csv_file_name'];

                        $task_check_status = $val['task_check_status'];

                        if($task_check_status) $c++;

                        $t_email = $val['t_email'];

                        $create_time = $val['create_time'];

                        $count_valid = $val['count_valid'];

                        $count_invalid = $val['count_invalid'];

                        $count_catchall = $val['count_catchall'];

                        $count_unknown = $val['count_unknown'];

                        $count_not_verify = $val['count_not_verify'];

                        $count_free = $val['count_free'];

                        $count_role = $val['count_role'];

                        $count_disposable = $val['count_disposable'];

                        $count_syntax = $val['count_syntax'];

                        $total_verify = $count_valid + $count_invalid + $count_catchall + $count_unknown;

                        $csv_name_ex = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $csv_file_name );

                        $verify_per_status = ceil( ( ( $count_valid + $count_invalid + $count_catchall + $count_unknown ) / $t_email ) * 100 );

            ?>

                        <div class="row scan_list" id="mega_bar_<?php echo $csv_name_ex; ?>">

                            <!-- File - First Column -->
                            <div class="col-md-12 col-lg-3">
                              <!-- Custom Text Color Utilities -->
                              <div class="card shadow mt-4 mb-4">
                                <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">File Name : <span id="filename"><?php echo $csv_file_name; ?></span></h6>
                                </div>
                                <div class="card-body">
                                  <p class="text-gray-800 p-3 m-0">Created : <?php echo $create_time ?></p>
                                  <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#model_<?php echo $csv_name_ex; ?>">
                                   Download
                                </button>
                                <?php if( !$isEx ){ ?>
                                    <button class="file_delete_btn btn btn-warning" data-target = '<?php echo $csv_file_name; ?>'>
                                     <i class="fas fa-trash"></i>
                                    </button>
                                <?php } ?>
                                </div>
                              </div>
                            </div>

                            <!-- Result - Second Column -->
                            <div class="col-lg-5">
                              <!-- Background Gradient Utilities -->
                              <div class="card shadow mt-4 mb-4">
                                  <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                          <th align="center" colspan="2">Verified Result
                                            <?php if( $verify_per_status < 100 && $verify_per_status != 0 ){ ?>
                                              <h6 class="d-inline-block float-right text-primary" id="per_count_<?php echo $csv_name_ex; ?>" ><?php echo $verify_per_status.'% ('.$total_verify.')';?></h6>
                                            <?php }?>
                                          </th>
                                        </tr>
                                        <tr>
                                          <td>
                                            <p>Total : <?php echo $val['t_email'] ?></p>
                                            <p>Valid : <span id="valid_<?php echo $csv_name_ex;?>"><?php echo $count_valid;?></span></p>
                                            <p>Invalid: <span id="invalid_<?php echo $csv_name_ex;?>"><?php echo $count_invalid;?></span></p>
                                            <p>Catch All : <span id="catchall_<?php echo $csv_name_ex;?>"><?php echo $count_catchall;?></span></p>
                                            <p>Unknown: <span id="unknown_<?php echo $csv_name_ex;?>"><?php echo $count_unknown;?></span></p>
                                          </td>
                                          <td>
                                            <p>Syntax Error :  <span id="syntax_<?php echo $csv_name_ex;?>"><?php echo $count_syntax;?></span></p>
                                            <p>Disposable :  <span id="disposable_<?php echo $csv_name_ex;?>"><?php echo $count_disposable;?></span></p>
                                            <p>Free Account :  <span id="free_account_<?php echo $csv_name_ex;?>"><?php echo $count_free;?></span></p>
                                            <p>Role Account :  <span id="role_account_<?php echo $csv_name_ex;?>"><?php echo $count_role;?></span></p>
                                          </td>
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>
                                </div>
                            </div>

                            <!-- Chart - Third Column -->
                            <div class="col-lg-4">

                            <!-- Grayscale -->
                            <?php
                                if( $count_not_verify != 0 ){

                                  if( $task_check_status ){ ?>

                                    <div class="preloader" style="display:block" id="preloader_<?php echo $csv_name_ex; ?>">
                                      <div class="spinner-border text-info" role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                    </div>
                                    <button style="display:none;" id="cancel_<?php echo $csv_name_ex; ?>" class="btn btn-warning btn-icon-split verify_email sss">
                                      <span class="text verify-btn" id="" data-target='<?php echo $csv_file_name; ?>'>Verify</span>
                                    </button>

                                  <?php } else { ?>

                                    <button class="btn btn-warning btn-icon-split verify_email sss" id="cancel_<?php echo $csv_name_ex; ?>">
                                      <span class="text verify-btn" id="" data-target='<?php echo $csv_file_name; ?>'>Verify</span>
                                    </button>
                                    <div class="preloader" id="preloader_<?php echo $csv_name_ex; ?>">
                                      <div class="spinner-border text-info" role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                    </div>

                                  <?php } ?>
                                    <div class="card-body verify-chart" id='chart_<?php echo $csv_name_ex; ?>'>
                                        <div class="chart-pie pt-4 pb-2">
                                          <canvas id='myChart_<?php echo $csv_name_ex; ?>'></canvas>
                                          <canvas id='new_myChart_<?php echo $csv_name_ex; ?>'></canvas>
                                        </div>
                                    </div>

                                <?php }else{  ?>

                                <!-- Card Header - Dropdown -->

                                <!-- Card Body -->
                                <div style="display:block" class="card-body verify-chart" id='chart_<?php echo $csv_name_ex; ?>'>
                                  <div class="chart-pie pt-4 pb-2">
                                    <canvas class="cart_sizing" id='myChart_<?php echo $csv_name_ex; ?>'></canvas>
                                    <canvas class="cart_sizing" id='new_myChart_<?php echo $csv_name_ex; ?>' style="display:none;"></canvas>
                                  </div>
                                </div>
                                <?php } ?>

<!--                                <script src="/wp-content/plugins/bulk-verify-email/admin/assets/js/chart.js"></script>-->

                                <script>

                                    var ctx = document.getElementById('myChart_<?php echo $csv_name_ex; ?>').getContext('2d');

                                    var myChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Valid', 'Invalid', 'Catch All', 'Unknown'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [<?php echo $count_valid; ?>, <?php echo $count_invalid; ?>, <?php echo $count_catchall; ?>, <?php echo $count_unknown; ?>],
                                                backgroundColor: ['#C6E377','#F16F6F','#75CAC3','#C0C0C0'],
                                                borderColor: ['#C6E377','#F16F6F','#75CAC3','#C0C0C0'],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                          responsive: true,
                                          legend:{
                                            display:true,
                                            position: 'bottom'
                                          }
                                        }
                                    });
                                </script>

                            </div>

                        </div>

                        <?php if( $verify_per_status < 100 && $verify_per_status != 0 ){

                            // check if user verifying status is running...
                            $running = 'stop';

                            $response = wp_remote_get( $domain . "functions/plugin_get_running_tasks.php?csv_file_name=" . $csv_file_name );
                            $body     = wp_remote_retrieve_body( $response );
                            $results = json_decode($body, true);
                            $running = $results['status'];

                            if ( $running == 'running' ){ ?>

                        <script>

                            jQuery(document).ready(function(){

                                var interval_<?php echo $c; ?> = null;

                                interval_<?php echo $c; ?> = setInterval( updatepercent<?php echo $c; ?>, 5000 );

                                function updatepercent<?php echo $c; ?>(){

                                    var csvfile_name_<?php echo $c; ?> = '<?php echo sanitize_file_name($csv_file_name); ?>';

                                    var csv_name_ex_<?php echo $c; ?> = '<?php echo $csv_name_ex; ?>';

                                    var token = "<?php echo sanitize_key($user_token); ?>";

                                    jQuery.ajax({

                                        url: "<?php echo $domain; ?>functions/<?php echo $percent_count_func; ?>",

                                        type: "post",

                                        data: { filename:csvfile_name_<?php echo $c; ?>, token:token },

                                        success: function ( response_<?php echo $c; ?> ) {

                                            var obj_<?php echo $c;?> = jQuery.parseJSON( response_<?php echo $c; ?> );

                                            if( obj_<?php echo $c; ?>.percent == '100' ){

                                                clearInterval( interval_<?php echo $c; ?> );

                                                jQuery('#per_count_<?php echo $csv_name_ex;?>').html('<h6 class="d-inline-block float-right text-success">Complete <a href = "" class="text-primary">Refresh</a> </h6>');
                                            }else{

                                                jQuery('#per_count_<?php echo $csv_name_ex;?>').html( obj_<?php echo $c; ?>.percent+'% (' + obj_<?php echo $c; ?>.total_verify + ') ' );

                                                if( obj_<?php echo $c; ?>.details !== 'undefined' ){

                                                    jQuery.each( obj_<?php echo $c; ?>.details, function() {

                                                        var key = Object.keys(this)[0];
                                                        var value = this[key];

                                                        try { jQuery( '#' + key ).text( value ); } catch(e) { console.log( e ); }
                                                    });
                                                }
                                            }
                                        }
                                    });
                                }
                            });

                        </script>

                        <?php }

                        } ?>

                        <!-- CSV Download Modal -->
                        <div class="csv_download modal fade" id="model_<?php echo $csv_name_ex; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CSV Download</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo $domain; ?>functions/<?php echo $download_file_func;?>" method="post">
                                        <input type="text" name="filename" hidden value="<?php echo sanitize_file_name($csv_file_name); ?>">
                                        <input type="text" name="token" hidden value="<?php echo sanitize_key($user_token); ?>">
                                        <div class="modal-body row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="all" class="form-check-input check_all_<?php echo $i?>" value="all" checked onchange="allChange<?php echo $i; ?>(this)" id="checkbox_<?php echo $c;?>" <?php if( $t_email == 0 ){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">ALL <span class="badge badge-primary"><?php echo $t_email; ?></span></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="valid" value="valid" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i; ?>(this)" id="checkbox_<?php echo ++$c;?>" <?php if( $count_valid == 0 ){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Deliverables <span class="badge badge-success"><?php echo $count_valid; ?></span></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="invalid" value="invalid" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i; ?>(this)" id="checkbox_<?php echo ++$c;?>" <?php if( $count_invalid == 0 ){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Non Deliverables <span class="badge badge-danger"><?php echo $count_invalid; ?></span></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="catchall" value="catchall" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i; ?>(this)" id="checkbox_<?php echo ++$c;?>" <?php if( $count_catchall == 0 ){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Deliverables with Risk <span class="badge badge-info"><?php echo $count_catchall; ?></span></label>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="free" value="free" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i; ?>(this)" id="checkbox_<?php echo ++$c; ?>" <?php if($count_free == 0){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Free Account <span class="badge badge-dark"><?php echo $count_free; ?></span></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="role" value="role" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i; ?>(this)" id="checkbox_<?php echo ++$c; ?>" <?php if( $count_role == 0 ){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Role Account <span class="badge badge-light"><?php echo $count_role; ?></span></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="disposable" value="disposable" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i; ?>(this)" id="checkbox_<?php echo ++$c; ?>" <?php if( $count_disposable == 0 ){ echo 'disabled'; } ?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Disposable Account <span class="badge badge-secondary"><?php echo $count_disposable; ?></span></label>
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" name="syntax" value="syntax" class="form-check-input check_sub_<?php echo $i?>" onchange="cbChange<?php echo $i ; ?>(this)" id="checkbox_<?php echo ++$c; ?>" <?php if( $count_syntax == 0 ){ echo 'disabled' ;}?>>
                                                    <label class="form-check-label" for="checkbox_<?php echo $c; ?>">Syntex Error <span class="badge badge-warning"><?php echo $count_syntax; ?></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function cbChange<?php echo $i?>(obj){
                                                var cbs = document.getElementsByClassName("check_all_<?php echo $i?>");
                                                cbs[0].checked = false;
                                            }
                                            function allChange<?php echo $i?>(obj){
                                                var cbs = document.getElementsByClassName("check_sub_<?php echo $i?>");
                                                for (var i = 0; i < cbs.length; i++) {
                                                    cbs[i].checked = false;
                                                }
                                            }
                                        </script>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Download</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php $i++; } ?>


                <script>
                    jQuery(document).ready(function(){
                        jQuery("#credits").text("Credits: <?php echo $credits; ?>");

                        jQuery(".file_delete_btn").click(function(){

                            var csvfile_name_d = jQuery(this).attr("data-target");

                            var token = "<?php echo sanitize_key($user_token); ?>";

                            var delete_confirm = confirm("Are you sure?");

                            if ( delete_confirm ) {

                                jQuery.ajax({

                                    url: "<?php echo $domain; ?>functions/<?php echo $delete_csv_file_func;?>",

                                    type: "post",

                                    data: { filename:csvfile_name_d, token:token } ,

                                    success: function (response) {

                                        jQuery( '#mega_bar_'+csvfile_name_d ).hide();
                                    }
                                });
                            }
                        });
                    });
                </script>
        </div>
    </div>
</div>

<script>

    jQuery(document).ready(function(){

        //jQuery(".task-cancel-btn").click(function(){
        //
        //	var csvfile_name_t = jQuery(this).attr("data-target");
        //
        //	var user_id = "<?php //echo $user_id?>//";
        //
        //	jQuery.ajax({
        //
        //		url: "../functions/<?php //echo $task_cancel_func;?>//",
        //
        //		type: "post",
        //
        //		data: { filename:csvfile_name_t, uid:user_id } ,
        //
        //		success: function (response) {
        //
        //			jQuery( '#preloader_'+csvfile_name_t ).css('display','none');
        //
        //			jQuery( '#cancel_'+csvfile_name_t ).css('display','block');
        //		}
        //	});
        //});


        jQuery(".sss").click(function() {

            // pay
            var csvfile_name = jQuery(this).children(".verify-btn").attr("data-target");

            var token = "<?php echo sanitize_key($user_token); ?>";

             var verify_confirm;
             var result;

            jQuery.ajax({

                url: "<?php echo $domain;?>functions/<?php echo $get_order;?>",

                type: "post",

                data: {filename: csvfile_name, token: token},

                async: false,

                success: function (response) {
                    console.log(response);
                    verify_confirm = confirm("Total: " + response.verify_total + ", Credits: " + response.free_count + ", Credits left: " + response.free_count_left + ", Exceeded credits: " + response.pay_verify_count + ". \nAre you sure?");
                    result = response;
                },

                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Please contact us for server failure.");
                    return false;
                }
            });

            if (verify_confirm && result.need_pay) {
                window.open("<?php echo $domain;?>",'_blank');
            }

             if (!result.need_pay) {

            var from_mail = '<?php echo $scan_mail;?>';

            var time_out = '<?php echo(!empty($scan_timeout) ? $scan_timeout : 10);?>';

            var scan_port = '<?php echo(!empty($scan_port) ? $scan_port : 25);?>';

            if (from_mail.length === 0) {

                alert('Please set time out and a from mail in settings page for continue scan');

                return false;
            }

            jQuery('.preloader').each(function (index, node) {

                if (jQuery(node).attr('id') !== '#preloader_' + csvfile_name) {

                    jQuery('#' + jQuery(node).attr('id')).css('display', 'none');

                    jQuery('#cancel_' + jQuery(node).attr('id').replace('preloader_', '')).css('display', 'block');
                }

            });

            var csv_name_ex = csvfile_name.replace(/\.[^/.]+$/, "");

            jQuery(this).hide();

            jQuery('#preloader_' + csv_name_ex).css('display', 'block');

            var count_valid = parseInt(jQuery('#valid_' + csv_name_ex).html());

            var count_invalid = parseInt(jQuery('#invalid_' + csv_name_ex).html());

            var count_catchall = parseInt(jQuery('#catchall_' + csv_name_ex).html());

            var count_unknown = parseInt(jQuery('#unknown_' + csv_name_ex).html());

            var count_syntex = parseInt(jQuery('#syntax_' + csv_name_ex).html());

            var count_free = parseInt(jQuery('#free_account_' + csv_name_ex).html());

            var count_role = parseInt(jQuery('#role_account_' + csv_name_ex).html());

            var count_disponsable = parseInt(jQuery('#disposable_' + csv_name_ex).html());

            jQuery.ajax({

                url: "<?php echo $domain;?>functions/<?php echo $emails_verify_func;?>",

                type: "post",

                data: {filename: csvfile_name, token: token, frommail: from_mail, timeout: time_out, scan_port: scan_port},

                success: function (response) {

                    window.location.reload(false);
                }
            });
            }
        });
    });

</script>

<!-- Add List Modal-->
<div class="modal" id="addList"  role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5>Only csv file can add</h5>
                <button type="button" class="close" id="closeUploadModal">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" style="border-bottom: 0px;" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-file-upload"></i> Upload</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div style="height: 300px;border: 1px solid #dddfeb;">
                            <input type="file" name="filename" id="csv_filename">
                        </div>
                        <p class="uplogin_file"><i class="start fas fa-circle-notch fa-spin"></i> &nbsp; File Uploading  total- <span class="ml-2 text-primary" id="count_total_export"></span> </p>
                        <div style="margin-top: 20px; " class="uploading_succes">
                            <h3>Thank you - Your list has been uploaded successfully.</h3>
                            <p class="" id="store-status"> </p>
                            <p><a href="<?php echo $my_list_page;?>">Refresh page</a></p>
                        </div>
                        <br>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Logout Modal-->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" id="closeLogoutModal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" id="cancelLogoutModal">Cancel</button>
                <button id="logout" class="btn btn-primary">Logout</button>
            </div>
        </div>
    </div>
</div>

<!--<script src="https://www.paypal.com/sdk/js?client-id=Afzq8WhCmAeaYCUSc3JeYLBGKjkAjPuIvpW9HHHt6KswnhdOlWd0qBvodVN8t4S1ZWoGYaDqKJ_en69E&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>-->
<!--<script src="https://www.paypal.com/sdk/js?client-id=AUxVs2hjPWc_DRu7JAUIzoMKmaRpN4C5URecg9-_2GEI4M5S-xu2mEBdH9BNO7m1UWLyFAQSr5OQkfvf&currency=USD" data-sdk-integration-source="button-factory"></script>-->
<!-- add list script -->
<script>
    jQuery("#add_list").click(function (e){
        jQuery("#addList").show()
    });

    jQuery("#userDropdown").click(function (e){
        jQuery("#logoutPanel").show()
    });

    jQuery("#userDropdown").blur(function (e){
        if (!jQuery('#logoutPanel').is(":hover")) {
            jQuery("#logoutPanel").hide()
        }
    });

    jQuery("#openLogoutModal").click(function (e){
        jQuery("#logoutModal").show()
    });


    jQuery("#closeUploadModal").click(function (e){
        jQuery("#addList").hide()
    });

    jQuery("#closeLogoutModal").click(function (e){
        jQuery("#logoutModal").hide()
    });

    jQuery("#cancelLogoutModal").click(function (e){
        jQuery("#logoutModal").hide()
    });

    jQuery("#logout").click(function (e){
        jQuery.cookie('wp_plugin_email_verify_user_image', '', { expires: -1 });
        jQuery.cookie('wp_plugin_email_verify_user_name', '', { expires: -1 });
        jQuery.cookie('wp_plugin_email_verify_user_token', '', { expires: -1 });
        jQuery.cookie('wp_plugin_email_verify_user_email', '', { expires: -1 });
        jQuery.cookie('wp_plugin_email_verify_user_credits', '', { expires: -1 });
        window.location.reload(false);
    });
    // loadOneTimePayPalButton();
    //
    // jQuery("#pay5000-tab").click(function (e){
    //     loadSubcribePayPalButton();
    // });
    //
    // jQuery("#pay1000-tab").click(function (e){
    //     loadOneTimePayPalButton();
    // });

    // Array.prototype.remove = function () {
    //     for (var i = 0; i < arguments.length; i++) {
    //         var ele = arguments[i];
    //         var index = this.indexOf(ele);
    //         if (index > -1) {
    //             this.splice(index, 1);
    //         }
    //     }
    // };

    // function changePaypalSubcribeOption(value) {
    //     var values = value.split('@')
    //     var plan_id = values[1];
    //     var render_id = 'paypal-button-container' + values[2];
    //     var price = values[0];
    //
    //     var ids = ['paypal-button-container2', 'paypal-button-container3', 'paypal-button-container4', 'paypal-button-container5', 'paypal-button-container6', 'paypal-button-container7']
    //     for(var i=0;i<ids.length;i++){
    //         jQuery("#" + ids[i]).remove();
    //     }
    //     initPayPalSubcribeButton(plan_id, render_id, price);
    // }
    //
    // function loadOneTimePayPalButton() {
    //     LazyLoad.js('https://www.paypal.com/sdk/js?client-id=AckPq_-FvtFxD1qmxyTzUMdbVBNnw55wS6hd-DdVrTWWQ2vWnJ3X37gnnN7MinVqGs90GfEh_cxIwdvL&currency=USD', function () {
    //         initPayPalButton();
    //     });
    // }
    //
    // function loadSubcribePayPalButton() {
    //     LazyLoad.js('https://www.paypal.com/sdk/js?client-id=Afzq8WhCmAeaYCUSc3JeYLBGKjkAjPuIvpW9HHHt6KswnhdOlWd0qBvodVN8t4S1ZWoGYaDqKJ_en69E&vault=true&intent=subscription', function () {
    //         initPayPalSubcribeButton('P-3P854467YT3385413MBKBJAA', 'paypal-button-container2', '2');
    //     });
    // }

    // // one time pay
    // function initPayPalButton() {
    //     var shipping = 0;
    //     var itemOptions = document.querySelector("#smart-button-container #item-options");
    //     var quantity = parseInt();
    //     var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
    //     if (!isNaN(quantity)) {
    //         quantitySelect.style.visibility = "visible";
    //     }
    //     var orderDescription = '';
    //     if (orderDescription === '') {
    //         orderDescription = 'Item';
    //     }
    //     paypal.Buttons({
    //         style: {
    //             shape: 'pill',
    //             color: 'silver',
    //             layout: 'vertical',
    //             label: 'pay',
    //
    //         },
    //         createOrder: function(data, actions) {
    //             var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
    //             var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
    //             var tax = (0 === 0) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
    //             if(quantitySelect.options.length > 0) {
    //                 quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
    //             } else {
    //                 quantity = 1;
    //             }
    //
    //             tax *= quantity;
    //             tax = Math.round(tax * 100) / 100;
    //             var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
    //             priceTotal = Math.round(priceTotal * 100) / 100;
    //             var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;
    //
    //             create_paypal_order(selectedItemPrice, 0);
    //             return actions.order.create({
    //                 purchase_units: [{
    //                     description: orderDescription,
    //                     amount: {
    //                         currency_code: 'USD',
    //                         value: priceTotal,
    //                         breakdown: {
    //                             item_total: {
    //                                 currency_code: 'USD',
    //                                 value: itemTotalValue,
    //                             },
    //                             shipping: {
    //                                 currency_code: 'USD',
    //                                 value: shipping,
    //                             },
    //                             tax_total: {
    //                                 currency_code: 'USD',
    //                                 value: tax,
    //                             }
    //                         }
    //                     },
    //                     items: [{
    //                         name: selectedItemDescription,
    //                         unit_amount: {
    //                             currency_code: 'USD',
    //                             value: selectedItemPrice,
    //                         },
    //                         quantity: quantity
    //                     }]
    //                 }]
    //             });
    //         },
    //         onApprove: function(data, actions) {
    //             console.log(data);
    //             complete_paypal_order();
    //             jQuery("#closePayDialog").click();
    //             window.location.reload(true);
    //             // return actions.order.capture().then(function(details) {
    //             //     console.log(details);
    //             //     alert('Transaction completed by ' + details.payer.name.given_name + '!');
    //             // });
    //         },
    //         onError: function(err) {
    //             alert(err);
    //         },
    //     }).render('#paypal-button-container1');
    // }
    //
    // // subscribe
    // function initPayPalSubcribeButton(plan_id, render_id, amount) {
    //     if(jQuery("#"+ render_id).length <= 0) {
    //         jQuery("#paypal-button-containers").append("<div id='"+ render_id +"'></div>")
    //     }
    //     paypal.Buttons({
    //         style: {
    //             shape: 'pill',
    //             color: 'silver',
    //             layout: 'vertical',
    //             label: 'subscribe'
    //         },
    //         onClick: function(){
    //             create_paypal_order(amount, 1)
    //         },
    //         createSubscription: function(data, actions) {
    //             return actions.subscription.create({
    //                 'plan_id': plan_id
    //             });
    //         },
    //         onApprove: function(data, actions) {
    //             console.log(data);
    //             complete_paypal_order();
    //             jQuery("#closePayDialog").click();
    //             window.location.reload(true);
    //         }
    //     }).render("#" + render_id);
    // }

    //function create_paypal_order(amount, type) {
    //    var payment_method = 'paypal';
    //    var order_id = random_No();
    //
    //    jQuery.ajax({
    //
    //        url: "<?php //echo $domain;?>//functions/<?php //echo $create_order;?>//",
    //
    //        type: "post",
    //
    //        data: {uid: '<?php //echo $user_id;?>//', payment_method: payment_method, type: type, order_id: order_id, amount: amount},
    //
    //        success: function (response) {
    //            console.log(response);
    //            window.order_id = order_id;
    //        },
    //
    //        error: function (XMLHttpRequest, textStatus, errorThrown) {
    //            alert("Order number generation failed, please contact us for server failure.");
    //            return false;
    //        }
    //    });
    //}

    //function complete_paypal_order() {
    //    jQuery.ajax({
    //
    //        url: "<?php //echo $domain;?>//functions/<?php //echo $complete_order;?>//",
    //
    //        type: "post",
    //
    //        data: {uid: '<?php //echo $user_id;?>//', order_id: window.order_id},
    //
    //        success: function (response) {
    //            alert(response.msg)
    //        },
    //
    //        error: function (XMLHttpRequest, textStatus, errorThrown) {
    //            alert("Your order is abnormal, please order again after refund or contact us for server failure.");
    //            return false;
    //        }
    //    });
    //}

    // function random_No(j) {
    //     var random_no = "";
    //     for (var i = 0; i < j; i++) //j位随机数，用以加在时间戳后面。
    //     {
    //         random_no += Math.floor(Math.random() * 10);
    //     }
    //     random_no = new Date().getTime() + random_no;
    //     return random_no;
    // }

    jQuery(".uplogin_file").hide();

    jQuery(".uploading_succes").hide();

    jQuery(document).ready(function(){

        jQuery("#csv_filename").change(function(e) {

            jQuery('#store-status').html('');

            var ext = jQuery("input#csv_filename").val().split(".").pop().toLowerCase();

            function randomNumberFromRange(min,max)
            {
                return Math.floor(Math.random()*(max-min+1)+min);
            }

            var fname = '<?php echo esc_html(time()) ;?>' +randomNumberFromRange(10,99)+'<?php echo esc_html($_SESSION['id']); ?>'+ '_csv_file';

            fname = fname.replace(/\s/g, "_");

            if( jQuery.inArray( ext, ["csv"] ) == -1 ) {

                alert('Upload CSV');

                return false;
            }

            jQuery(".uplogin_file").show();

            if ( e.target.files != undefined ) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    jQuery(".uploading_succes").hide();

                    jQuery('#count_total_export').text('');

                    var lines = e.target.result.split('\r\n');

                    if ( lines.length == 1 ) {

                        lines = e.target.result.split('\n');
                    }

                    var c = 0;

                    var t = 0;

                    var title_row = lines[0].split(',');

                    var email_row_check = false;

                    for ( r = 0; r < title_row.length; r++ )
                    {
                        var column_name = title_row[r].trim();

                        column_name = title_row[r].toLowerCase();

                        if( column_name == 'email' || column_name == 'mail' || column_name == 'gmail' ){

                            email_row_check = true;

                            var target_column_index = r;

                            break;
                        }
                    }

                    var data_array = '';

                    if( email_row_check ){

                        for ( i = 1; i < lines.length; ++i )
                        {
                            var email_column = lines[i].split(',');

                            var email = email_column[target_column_index];

                            if( email.length > 100 ){

                                continue;

                            }

                            if( email != '' ){

                                email = jQuery.trim(email);
                            }

                            if( email != '' ){

                                t++;

                                data_array  += email+',';

                                jQuery('#count_total_export').text(t);

                            }
                        }

                        if( data_array.length !== 0 ){
                            var token = "<?php echo sanitize_key($user_token); ?>";

                            jQuery.ajax({

                                url: "<?php echo $domain;?>functions/<?php echo 'plugin_save_email.php';?>",

                                type: "post",

                                data: { email:data_array, filename:fname, token:token },

                                success: function (response) {

                                    var obj = jQuery.parseJSON (response);

                                    jQuery('#store-status').html('Total: <span class="text-primary">'+obj.total+'</span>  Save: <span class="text-success">'+obj.save+'</span>  Duplicate: <span class="text-danger">'+obj.duplicate+'</span> (duplicate emails has been removed from scan queue)');

                                    jQuery('#count_total_export').text('');

                                    jQuery(".uplogin_file").hide();

                                    jQuery(".uploading_succes").show();

                                    jQuery("#filename").empty(" ");
                                }
                            });

                        }else{

                            jQuery(".uplogin_file").hide();

                            jQuery("#filename").empty(" ");

                            alert('No email column found');
                        }

                    }else{

                        jQuery(".uplogin_file").hide();

                        jQuery("#filename").empty(" ");

                        alert('No email column found');
                    }
                };

                reader.readAsText( e.target.files.item(0) );
            }

            return false;
        });

    });

</script>

<?php } ?>