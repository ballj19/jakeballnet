<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="style.css" rel="stylesheet">
        <script src="javascript.js"></script>
</head>
<body>
                <div class="input-label-block">
                        <div class="input-label">Frame</div>
                        <div class="input-label">Level</div>
                        <div class="input-label">Steel Fiber Max</div>
                        <div class="input-label">Vitality Max</div>
                        <div class="input-label">Redirection Max</div>
                        <div class="input-label"># of Vazarin Slots</div>
                </div>

                <form action="javascript:PerLevelTable(frame.value, level.value, sf.value, v.value, r.value, vazarin.value)">
                        <input type="text" id="frame" name="frame" value="Ash">
                        <br>
                        <input type="text" id="level" name="level" value="30">
                        <br>
                        <input type="text" id="sf" name="sf" value="5">
                        <br>
                        <input type="text" id="v" name="v" value="5">
                        <br>
                        <input type="text" id="r" name="r" value="5">
                        <br>
                        <input type="text" id="vazarin" name="vazarin" value="0">
                        <br><br>
                        <input id="submit-button" type="submit" value="Submit">
                </form>
                <div>
                <div class="col-xs-6" id="base_stats">
                
                </div>
        <div class="col-xs-8 col-xs-offset-2" id="perLevelTable">
        
        </div>
</body>
</html>