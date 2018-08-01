
<form class="col-xs-5" id="add-form" action="add.php" method="post">
        <div class="col-xs-12 parameter">
            <div class="col-xs-2 input-label">Name</div>
            <input class="col-xs-6 input-box" type="text" id="name" name="name" value="">
        </div>

        <div class="col-xs-12 parameter">
            <div class="col-xs-2 input-label">Type</div>
            <input class="col-xs-6 input-box" type="text" id="type" name="type" value="">
        </div>

        <div class="col-xs-6 col-xs-offset-3">
            <input id="update-button" type="submit" value="Add">
        </div>
</form>
    <div class="col-xs-7">
        <div class="col-xs-12 parameter"> 
            <div class="col-xs-2 input-label">Bio</div>
            <textarea class="col-xs-10" id="bio" name="bio" form="add-form"></textarea>
        </div>
    </div>