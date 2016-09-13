<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Form</title>
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
<div class="bs-example">
    <h1>Subscription Page</h1>
    <?php
    $attributes = array("id" => "signupform", "name" => "signupform");
    echo form_open("login/subscribe_validation", $attributes);?>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Phone No:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Enter Your Phone No" value="<?php echo set_value('phoneNo'); ?>">
                <br>
                <span class="text-danger"><?php echo form_error('phoneNo'); ?></span>
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

        <br>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" name="btn_submit" class="btn btn-primary" value="Subscribe">

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