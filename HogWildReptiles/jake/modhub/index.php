<!DOCTYPE html>
<html>
<head>
<title>ModHub</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../nav.css">
        <link rel="stylesheet" href="modhub.css">
        <script src="../javascript.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include '../functions.php';
Nav_Bar('../');
?>
        <div class="col-xs-12 section">
                <div class="section-title col-xs-12">ModHub</div>
                <div class="section-subtitle col-xs-6 col-xs-offset-3 col-xxl-4 col-xxl-offset-4">
                        A powerful elevator custom software tool. ModHub does the hard work for you.  It will read in an assembly
                        configuration file, and translate it into a human-readable experience. View, compare, and edit custom software configurations with this simple, easy-to-use interface.
                </div>
                <div id="translate-pic" class="col-xs-12 section-pic">
                        <img src="Translate.png" class="section-pic"/>
                </div>
        </div>
        <div id="view-section" class="col-xs-12 section">
                <div class="col-xs-12 col-xxl-4 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1">View</div>
                        <div class="section-subtitle col-xxl-10 col-xxl-offset-1 col-xs-6 col-xs-offset-3">
                                ModHub reads in the target configuration file and presents the most relevant information for each elevator.  Get graphical representations of
                                the landing configuration, spare inputs and outputs, call boards, and extra options.
                        </div>
                </div>
                <div id="view-gif" class="section-pic">
                        <img src="view.gif" class="section-pic"/>
                </div>
        </div>
        <div id="compare-section" class="col-xs-12 section">
                <div class="col-xs-12 col-xxl-4 section-text">
                        <div class="section-title col-xxl-offset-none col-xs-10 col-xs-offset-1">Compare</div>
                        <div class="section-subtitle col-xxl-10 col-xxl-offset-none col-xs-6 col-xs-offset-3">
                                Easily jump from file to file and compare configurations of different elevators on the same job with ModHub's list-style view.
                        </div>
                </div>
                <div id="compare-gif" class="section-pic">
                        <img src="compare.gif" class="section-pic"/>
                </div>
        </div>
        <div id="edit-section" class="col-xs-12 section">
                <div class="col-xs-12 col-xxl-4 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1">Edit</div>
                        <div class="section-subtitle col-xxl-10 col-xxl-offset-1 col-xs-6 col-xs-offset-3">
                                Upgrade file version, search, enable, and disable options, and manage features such as security and fire codes.
                        </div>
                </div>
                <div id="edit-gif" class="section-pic">
                        <img src="edit.gif" class="section-pic"/>
                </div>
        </div>
</body>
</html>