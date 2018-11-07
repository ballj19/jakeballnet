<!DOCTYPE html>
<html>
<head>
<title>About Me</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../nav.css">
        <link rel="stylesheet" href="about.css">
        <script src="../javascript.js"></script>
        <script src="about.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include '../functions.php';
Nav_Bar('../');
?>
        <div id="education-section" class="col-xs-12 section">
                <div id="education-text" class="col-xs-5 col-xxl-4 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1">Cal Poly San Luis Obispo</div>
                        <div class="section-subtitle col-xs-12 col-xxl-10 col-xxl-offset-1">
                                I graduated from Cal Poly San Luis Obispo in 2016 with a Bachelors Degree in Electrical Engineering with a focus on Embedded Systems and Analog Circuit Design.
                        </div>
                </div>
                <div id="education-pic" class="section-pic col-xs-7 col-xxl-8">
                        <img src="education.JPG" class="section-pic"/>
                </div>
        </div>
        <div id="mce-section" class="col-xs-12 section">
                <div id="mce-pic" class="section-pic col-xs-7">
                        <img src="mce.jpg" class="section-pic"/>
                </div>
                <div id="mce-text" class="col-xs-5 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1">Motion Control Engineering</div>
                        <div class="section-subtitle col-xs-12 col-xxl-10 col-xxl-offset-1">
                                I am currently employed at MCE as an Embedded Software Engineer since October 2017.  Here I develop, maintain, and test
                                features for elevator controllers using C and Assembly.  I also develop internal applications such as ModHub with C# and the .NET framework.
                        </div>
                </div>
        </div>
        <div id="glumac-section" class="col-xs-12 section">
                <div id="glumac-text" class="col-xs-5 col-xxl-4 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1">Glumac</div>
                        <div class="section-subtitle col-xs-12 col-xxl-10 col-xxl-offset-1">
                                I worked at Glumac from August 2016 to October 2017 as an Electrical Designer.
                                At Glumac I worked daily with drafting programs such as AutoCAD and Revit to design the electrical systems of various commerical buildings
                                such as Apple's databases in Reno, Nevada. I was also responsible for working with Autodesk Revit's API in C# to build plug-ins
                                to increase the design team's efficiency.
                        </div>
                </div>
                <div id="glumac-pic" class="section-pic col-xs-7 col-xxl-8">
                        <img src="glumac.jpg" class="section-pic"/>
                </div>
        </div>
        <div id="hiking-section" class="col-xs-12 section">
                <div id="hiking-pic" class="section-pic col-xs-6 col-xxl-5">
                        <img src="half-dome.jpeg" class="section-pic"/>
                </div>
                <div id="hiking-text" class="col-xs-6  col-xxl-7 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1 col-xxl-6 col-xxl-offset-3">Hiking</div>
                        <div class="section-subtitle col-xs-10 col-xs-offset-1 col-xxl-6 col-xxl-offset-3">
                                Hiking is one of my favorite hobbies and Yosemite one of my favorite places to visit.  My family and I have made it to the top of Half Dome in 2012, 2013, and 2018.
                        </div>
                </div>
        </div>
        <div id="boating-section" class="col-xs-12 section">
                <div id="boating-text" class="col-xs-6 col-xxl-7 section-text">
                        <div class="section-title col-xs-10 col-xs-offset-1 col-xxl-6 col-xxl-offset-3">Boating</div>
                        <div class="section-subtitle col-xs-10 col-xs-offset-1 col-xxl-6 col-xxl-offset-3">
                                Boating is my family's longest standing activity. We spend most summer weekends on Folsom lake enjoying wakeboarding and tubing with family and friends.
                        </div>
                </div>
                <div id="boating-pic" class="section-pic col-xs-6 col-xxl-5">
                        <img src="boating.jpg" class="section-pic"/>
                </div>
        </div>
</body>
</html>