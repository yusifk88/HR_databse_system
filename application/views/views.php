<div class="container-fluid">

    <div id="mngcircuit" class="we-view" data-title="MANAGE CIRCUITS IN THE DISTRICT">

    </div>
    <div id="managepost" class="we-view" data-title="MANAGE POST IN THE DISTRICT">

    </div>
    <div id="managerank" class="we-view" data-title="MANAGE RANKS">

    </div>
    <div id="manageacc" class="we-view" data-title="MANAGE LOGIN ACCOUNTS">


    </div>
    <div id="restorebak" class="we-view" data-title="RESTORE BACKUP">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4">
                        <div class="row">
                            <div class="redrop" style="height: 200px; width:100%; border: 1px dashed deepskyblue; cursor: pointer; text-align: center; vertical-align: middle;">
                                <h5 class="text-muted" style="margin-top: 50px;"><strong>DROP BACKUP FILE HERE <br/>OR CLICK TO UPLOAD</strong></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label for="" class="control-label">Selected File Name</label>
                                <input id="backupfile" type="text" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <p class="text-muted">It might take some time to upload the backup file</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button id="runres" class="btn btn-good pull-right">Run Restore</button>
                            </div>
                        </div>

            </div>
        </div>
    </div>

    <div id="managstaff" class="we-view" data-title="VIEW & MANAGE STAFF INFO.">
        <div class="row staff-filter">

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <label class="control-label">Current Status</label>
<select class="form-control" id="filter-status">

    <option value="">All</option>
    <option value="0">Active</option>
    <option value="1">Study Leave With Pay</option>
    <option value="2">Study Leave Without Pay</option>
    <option value="3">Vacation Of Post</option>
    <option value="4">Diseased</option>
    <option value="5">Embargo</option>
    <option value="6">Maternity Leave</option>


</select>

        </div>
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <label for="filter_rank" class="control-label">Rank</label>
        <select id="filter_rank" class="form-control"></select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <label for="filter_post" class="control-label">POST</label>
        <select id="filter_post" class="form-control"></select>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <label for="filter_sex" class="control-label">SEX</label>
        <select id="filter_sex" class="form-control">
            <option selected value="">All</option>
            <option>Male</option>
            <option>Female</option>
        </select>
        </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
        <a href="#" onclick="print_list(); return false;" class="btn btn-link btn-good">PRINT<i class="fa fa-print"></i> </a>
    </div>
    </div>
        <div class="staff-cont" style="padding-top: 10px;">
        </div>
    </div>


    <div id="regisstaff" class="we-view" data-title="REGISTER A STAFF">
        <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="panel panel-default" style="box-shadow: 0 0 2px;">
                        <div class="panel-body">
                            <form action="<?=base_url()?>/regstaff" id="regstaff">
<div class="row" style="border-bottom: 1px solid #CCCCCC; padding-bottom: 5px;">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input name="photo" type="hidden" id="photo" />
        <center>
            <div class="dropzone" style="width:180px; height: 200px; border: 1px dashed deepskyblue; font-size: 18px; color: lightgray;"></div>
        </center>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <label for="fname" class="control-label">First Name <i class="fa fa-asterisk text-danger"></i> </label>
        <input id="fname" name="fname" type="text" class="form-control" required placeholder="enter staff's first name">
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <label for="lname" class="control-label">Last Name <i class="fa fa-asterisk text-danger"></i></label>
        <input id="lname" type="text" name="lname" class="form-control" required placeholder="enter staff's last name">
    </div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-124">
<label for="stfid" class="control-label">Staff ID No. <i class="fa fa-asterisk text-danger"></i> </label>
<input id="stfid" name="stfid" type="text" class="form-control" required placeholder="enter staff's identification number">
</div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <label for="sex" class="control-label">Sex <i class="fa fa-asterisk text-danger"></i></label>
        <select name="sex" id="sex" class="form-control">
            <option value="Female">Female</option>
            <option value="Male">Male</option>
        </select>
    </div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <label for="dob" class="control-label">Date Of Birth <i class="fa fa-asterisk text-danger"></i> </label>
    <input id="<?=($this->agent->browser=='Firefox')?'dpicker4':'dob'?>" <?=($this->agent->browser=='Chrome')?'':'readonly'?>  name="dob" type="date" class="form-control" required placeholder="enter staff's date of birth">
</div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <label for="selrank" class="control-label">Rank <i class="fa fa-asterisk text-danger"></i> </label>
        <select name="rank" id="selrank" class="form-control"></select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <label for="selcircuit" class="control-label">Circuit <i class="fa fa-asterisk text-danger"></i></label>
        <select name="circuit" id="selcircuit" class="form-control"></select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <label for="selpost" class="control-label">Post <i class="fa fa-asterisk text-danger"></i> </label>
        <select name="post" id="selpost" class="form-control"></select>

    </div>
</div>
</div>

    </div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <label for="aqual" class="control-label">Academic Qualification</label>
    <input id="aqual" name="aqual" type="text" class="form-control" placeholder="enter staff's academic qualification">
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <label for="pqual" class="control-label">Professional Qualification</label>
    <input id="pqual" name="pqual" type="text" class="form-control" placeholder="enter staff's professional qualification">
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <label for="apdate" class="control-label">Date Of 1st Appointment <i class="fa fa-asterisk text-danger"></i></label>
    <input placeholder="select date of first appointment" id="<?=($this->agent->browser=='Firefox')?'dpicker3':'apdate'?>" <?=($this->agent->browser=='Firefox')?'readonly':''?>  id="apdate" name="apdate" type="date" required class="form-control">
</div>
    </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="cont" class="control-label">Phone Number</label>
                <input type="tel" class="form-control" id="cont" name="cont" placeholder="Enter staff's phone number"/>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <label for="ssnitno" class="control-label">SSNIT Number</label>
                <input type="tel" class="form-control" id="ssnitno" name="ssnitno" placeholder="Enter staff's social security no."/>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <label for="regstat" class="control-label">Reg. Status</label>
                <select class="form-control" name="regstat" id="regstat">
                    <option value="1">Registered</option>
                    <option value="0">Not Registered</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="regno" class="control-label">Registered Number</label>
                <input type="tel" class="form-control" id="regno" name="regno" placeholder="Enter staff's Registered number"/>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="cshs" class="control-label">Course Studied At SHS</label>
                    <input type="text" class="form-control" id="cshs" name="cshs" placeholder="Enter course studied at shs"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="ccol" class="control-label">Course Studied At Tertiary/college</label>
                    <input type="text" class="form-control" id="ccol" name="ccol" placeholder="Enter course studied at college or tertiary"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="datepro" class="control-label">Date Promoted to current Rank</label>
                    <input placeholder="Select date promoted to current rank" type="date" id="<?=($this->agent->browser=='Firefox')?'dpicker2':'datepro'?>" <?=($this->agent->browser=='Firefox')?'readonly':''?> class="form-control" id="datepro" name="datepro" />
                </div>
            </div>
            <div class="row" style="border-bottom: 1px solid #CCCCCC; padding-bottom: 5px;">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="trdate" class="control-label">Transfer Date</label>
                    <input required type="date" class="form-control" id="<?=($this->agent->browser=='Firefox')?'dpicker1':'trdate'?>" <?=($this->agent->browser=='Firefox')?'readonly':''?> name="trdate" placeholder="Select date staff was sent to current post"/>
                </div>



                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="bank" class="control-label">Associated Bank</label>
                    <input type="text" class="form-control" id="bank" name="bank" placeholder="Enter Staff's associated bank name"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="acno" class="control-label">Account number</label>
                    <input type="text" class="form-control" id="acno" name="acno" placeholder="Enter staff's bank account number"/>
                </div>

            </div>
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-info">
        <h4><i class="fa fa-info"></i> OTHER INFO.</h4>
        This part of the registration form is optional as it helps you to capture information that is specific to a particular staff.
        To used this part of the form you are expected to create your own labels with corresponding values. <strong>To add a field, please click the plus button below.
        To remove an input row, click the the corresponding minus button</strong>
        </div>
        </div>
        </div>
        <div class="orow">

        </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-right">
            <br><br>
            <a title="Add your own input row" data-toggle="tooltip" href="#" onclick="addfields();return false;" class="btn btn-good"><i class="fa fa-plus-square-o fa-2x"></i> </a>
        </div>

    </div>

        <div class="row" style="border-top: 1px solid lightgray;">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right">
                <button id="resetbtn" type="reset" class="btn btn-bad pull-right">CLEAR</button>
                <button id="svstaff" class="btn btn-good pull-right" type="submit">SAVE</button>

            </div>
        </div>
        </form>

            </div>
        </div>
                </div>
        </div>

    </div>

</div>