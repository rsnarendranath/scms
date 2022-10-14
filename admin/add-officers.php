<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $pw = $_POST['password'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $category = $_POST['category'];
        $query = mysqli_query($bd, "insert into officers(fullName,userEmail,password,contactNo,address,city,pincode,category) values('$fullname','$email','$password','$contactno',
		'$address','$city','$zipcode','$category')");
        $msg = "Officer Added successfully..";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Add Officers</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script>
            function userAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'email=' + $("#email").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status1").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
        <script>
            function usernic() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_nic.php",
                    data: 'nic=' + $("#nic").val(),
                    type: "POST",
                    success: function(data) {
                        $("#error2").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>

        <script>
            function userPhone() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_phone.php",
                    data: 'contactno=' + $("#contactno").val(),
                    type: "POST",
                    success: function(data) {
                        $("#messge2").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
        <script>
            function getState(val) {
                //alert('val');

                $.ajax({
                    type: "POST",
                    url: "getstate.php",
                    data: 'stateid=' + val,
                    success: function(data) {
                        $("#state").html(data);

                    }
                });
            }
        </script>

        <script>
            function getCity(val) {
                //  alert('val');

                $.ajax({
                    type: "POST",
                    url: "getcity.php",
                    data: 'cityid=' + val,
                    success: function(data) {
                        $("#city").html(data);

                    }
                });
            }
        </script>
        <script>
            function phoneno() {
                var a = document.getElementById("contactno").value;
                if (a == "") {
                    document.getElementById("messge").innerHTML = "";
                    return false;
                    document.getElementById("submit").disabled = true;
                }
                if (isNaN(a)) {
                    document.getElementById("messge").innerHTML = "Numbers Only";
                    return false;
                    document.getElementById("submit").disabled = true;
                } else if (isNaN(a)) {
                    document.getElementById("messge").innerHTML = "Numbers Only Please Check Your Phone No";
                    return false;
                    document.getElementById("submit").disabled = true;
                } else if (a.length < 10) {
                    document.getElementById("messge").innerHTML = "Phone No is Wrong Please Check Your Phone No";
                    return false;
                    document.getElementById("submit").disabled = true;
                } else if (a.length > 10) {
                    document.getElementById("messge").innerHTML = "Phone No is Wrong Please Check Your Phone No";
                    return false;
                    document.getElementById("submit").disabled = true;
                } else {
                    document.getElementById("messge").innerHTML = "";
                    return true;
                    document.getElementById("submit").disabled = false;
                }

            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


        <script>
            function valid() {
                var passowrd = document.getElementById("find").value;
                var confirmpassword = document.getElementById("confirmpassword").value;

                if (passowrd != confirmpassword) {
                    document.getElementById("passerror").innerHTML = "Password and Confirm Password Field do not match  !!";
                    document.getElementById("submit").disabled = true;
                } else {
                    document.getElementById("passerror").innerHTML = "";
                    document.getElementById("submit").disabled = false;
                }

            }
        </script>

    </head>

    <body>
        <?php include('include/header.php'); ?>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php include('include/sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">




                            <div class="module">
                                <div class="module-head">
                                    <h3>Add officers</h3>
                                </div>
                                <div class="module-body">
                                    <div class="panel panel-default">

                                        <div class="panel-body">
                                            <form name="state" method="post" class="form-horizontal" onsubmit="return phoneno()">
                                                <p style="padding-left: 1%; color: green">
                                                    <?php if (isset($msg)) {
                                                        echo htmlentities($msg);
                                                    } ?>
                                                </p>
                                                <p style="padding-left: 1%; color: green">
                                                    <?php if (isset($successmsg)) {
                                                        echo htmlentities($successmsg);
                                                    } ?>
                                                </p>
                                                <p style="padding-left: 1%; color: red">
                                                    <?php if (isset($errormsg)) {
                                                        echo htmlentities($errormsg);
                                                    } ?>
                                                </p>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Full Name<span style="color:red">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="fullname" required="required" placeholder="Full Name" autofocus class="form-control">
                                                    </div><br>
                                                    <label class="col-sm-2 control-label">Mobile No<span style="color:red">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" maxlength="10" name="contactno" onBlur="userPhone();phoneno()" id="contactno" placeholder="Contact No" required="required" class="form-control">
                                                        <span id="messge" style="font-size:12px; color: red;"></span>
                                                        <span id="messge2" style="font-size:12px; color: red;"></span><br>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email id<span style="color:red">* </label>
                                                    <div class="col-sm-4">
                                                        <input type="email" id="email" onBlur="userAvailability()" onclick="phoneno()" name="email" placeholder="E-mail" required="required" class="form-control">
                                                        <span id="user-availability-status1" style="font-size:12px;"></span>
                                                    </div><br>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Password<span style="color:red">* </label>
                                                    <div class="col-sm-4">
                                                        <input type="password" name="password" placeholder="Password" id="find" required="required" class="form-control">
                                                    </div><br>
                                                    <label class="col-sm-2 control-label">Confirm Password<span style="color:red">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="password" name="confirmPassword" class="form-control" id="confirmpassword" onmouseout="valid()" placeholder="Confirm Password" required>
                                                        <span id="passerror" style="font-size:12px; color: red;"></span>
                                                    </div>
                                                </div><br>



                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="address" placeholder="Address"></textarea>
                                                    </div>
                                                </div><br>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Zip Code </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="zipcode" class="form-control" maxlength="5" placeholder="Zip Code">
                                                    </div>
                                                    <div class="col-sm-4">
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">City <span style="color:red">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="city" required="" placeholder="city" autofocus class="form-control">
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                                    <div class="col-sm-4">
                                                        <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
                                                            <option value="">Select Category</option>
                                                            <?php $sql = mysqli_query($bd, "select id,categoryName from category ");
                                                            while ($rw = mysqli_fetch_array($sql)) {
                                                            ?>
                                                                <option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="col-sm-8 col-sm-offset-2">
                                                            <pre><button class="btn btn-default" type="reset">Cancel</button>         <button class="btn btn-primary" name="submit" id="submit" type="submit">Save changes</button></pre>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->


        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            });
        </script>
    </body>
<?php } ?>