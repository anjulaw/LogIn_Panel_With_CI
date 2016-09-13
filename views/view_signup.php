<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>
    <!--link the bootstrap css file-->
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!--<style type="text/css">
        .colbox {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>-->
    <style type="text/css">
        h1{
            margin: 30px 0;
            padding: 0 200px 15px 0;
            border-bottom: 1px solid #E5E5E5;
        }
        .bs-example{
            margin: 20px;
        }
    </style>
</head>
<body>
<!--<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <h1>Registration Page</h1>
        </div>
        <!--<div class="col-lg-6 col-sm-6">

            <ul class="nav nav-pills pull-right" style="margin-top:20px">
                <li class="active"><a href="#">Login</a></li>
                <li><a href="#">Signup</a></li>
            </ul>

        </div>
    </div>
</div>
<hr/>-->



<div class="bs-example">
    <h1>Registration Page</h1>
    <?php
    $attributes = array("id" => "signupform", "name" => "signupform");
    echo form_open("login/signup_validation", $attributes);?>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo set_value('inputEmail'); ?>">
                <br>
                <span class="text-danger"><?php echo form_error('inputEmail'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputPassword">Password:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" value="<?php echo set_value('inputPassword'); ?>">
                <br>
                <span class="text-danger"><?php echo form_error('inputPassword'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="confirmPassword">Confirm Password:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" value="<?php echo set_value('confirmPassword'); ?>">
                <br>
                <span class="text-danger"><?php echo form_error('confirmPassword'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Full Name:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" value="<?php echo set_value('fullName'); ?>">
                <br>
                <span class="text-danger"><?php echo form_error('fullName'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="lastName">User Name:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" value="<?php echo set_value('userName'); ?>">
                <br>
                <span class="text-danger"><?php echo form_error('userName'); ?></span>
            </div>
        </div>
        <!--<div>
            <?php /*echo $image; */?>
        </div>-->

        <!--<div class="form-group">
            <label class="control-label col-xs-3" for="lastName">Captcha:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Please retype the code above" value="<?php /*echo set_value('captcha'); */?>">
                <br>
                <span class="text-danger"><?php /*echo form_error('captcha'); */?></span>
            </div>
        </div>-->
        <!--<div class="form-group">
            <label class="control-label col-xs-3" for="phoneNumber">Phone:</label>
            <div class="col-xs-9">
                <input type="tel" class="form-control" id="phoneNumber" placeholder="Phone Number">
            </div>
        </div>-->
        <!--<div class="form-group">
            <label class="control-label col-xs-3">Date of Birth:</label>
            <div class="col-xs-3">
                <select class="form-control">
                    <option>Date</option>
                </select>
            </div>
            <div class="col-xs-3">
                <select class="form-control">
                    <option>Month</option>
                </select>
            </div>
            <div class="col-xs-3">
                <select class="form-control">
                    <option>Year</option>
                </select>
            </div>
        </div>-->
        <!--<div class="form-group">
            <label class="control-label col-xs-3" for="postalAddress">Address:</label>
            <div class="col-xs-9">
                <textarea rows="3" class="form-control" id="postalAddress" placeholder="Postal Address"></textarea>
            </div>
        </div>-->
        <!--<div class="form-group">
            <label class="control-label col-xs-3" for="ZipCode">Zip Code:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="ZipCode" placeholder="Zip Code">
            </div>
        </div>-->
        <!--<div class="form-group">
            <label class="control-label col-xs-3">Gender:</label>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" name="genderRadios" value="male"> Male
                </label>
            </div>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" name="genderRadios" value="female"> Female
                </label>
            </div>
        </div>-->
       <!-- <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <label class="checkbox-inline">
                    <input type="checkbox" value="news"> Send me latest news and updates.
                </label>
            </div>
        </div>-->
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <label class="checkbox-inline">
                    <input type="checkbox" value="agree">  I agree to the <a href="#">Terms and Conditions</a>.
                </label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit">
                <input type="reset" name="btn_reset" class="btn btn-default" value="Reset">
            </div>
        </div>
    </form>
    <?php echo form_close(); ?>
</div>

<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>