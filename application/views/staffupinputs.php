<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <form action="./app/upstaff" id="upstaff">
                    <input type="hidden" value="<?=$staff->id?>" name="id" />
                    <div class="row" style="border-bottom: 1px solid #CCCCCC; padding-bottom: 5px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <input value="<?=$staff->photo?>" name="photo" type="hidden" id="upphoto" />
                            <center>
                                <div class="updropzone" style=" background-size: cover; background-repeat: no-repeat; background-image: url('./assets/uploads/<?=$staff->photo ? 'photos/'.$staff->photo:'photo.jpg'?>');width:180px; height: 200px; cursor: pointer; border: 1px dashed deepskyblue; font-size: 18px; color: #fff;"> Click to change photo or drop photo to change</div>
                            </center>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="hidden" value="<?=$staff->stfid?>" name="oldid"/>
                                    <label for="fname" class="control-label">First Name <i class="fa fa-asterisk text-danger"></i> </label>
                                    <input value="<?=$staff->fname?>" id="fname" name="fname" type="text" class="form-control" required placeholder="enter staff's first name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="lname" class="control-label">Last Name <i class="fa fa-asterisk text-danger"></i></label>
                                    <input value="<?=$staff->lname?>" id="lname" type="text" name="lname" class="form-control" required placeholder="enter staff's last name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="stfid" class="control-label">Staff ID No. <i class="fa fa-asterisk text-danger"></i> </label>
                                    <input value="<?=$staff->stfid?>" id="upstfid" name="stfid" type="text" class="form-control" required placeholder="enter staff's identification number">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="sex" class="control-label">Sex <i class="fa fa-asterisk text-danger"></i></label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option <?=($staff->sex=='Female')?'selected':''?> value="Female">Female</option>
                                        <option <?=($staff->sex=='Male')?'selected':''?> value="Male">Male</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <label for="dob" class="control-label">Date Of Birth <i class="fa fa-asterisk text-danger"></i> </label>
                                    <input value="<?=$staff->dob?>" id="<?=($this->agent->browser=='Firefox')?'updpicker4':'dob'?>" <?=($this->agent->browser=='Chrome')?'':'readonly'?>  name="dob" type="date" class="form-control" required placeholder="enter staff's date of birth">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="selrank" class="control-label">Rank <i class="fa fa-asterisk text-danger"></i> </label>
                                    <select name="rank" id="selrank" class="form-control">
                                        <?php
                                        foreach($ranks as $rank){
                                            ?>
                                        <option value="<?=$rank->id?>" <?=($staff->rank==$rank->id)?'selected':''?>><?=$rank->rank_name?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="selpost" class="control-label">Post <i class="fa fa-asterisk text-danger"></i> </label>
                                    <select name="post" id="selpost" class="form-control">

                                        <?php
                                        foreach($posts as $post){
                                            ?>
                                            <option value="<?=$post->id?>" <?=($staff->post==$post->id)?'selected':''?>><?=$post->post_name?></option>
                                            <?php
                                        }

                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="aqual" class="control-label">Academic Qualification</label>
                            <input value="<?=$staff->aqual?>" id="aqual" name="aqual" type="text" class="form-control" placeholder="enter staff's academic qualification">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="pqual" class="control-label">Professional Qualification</label>
                            <input value="<?=$staff->pqual?>" id="pqual" name="pqual" type="text" class="form-control" placeholder="enter staff's professional qualification">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="apdate" class="control-label">Date Of 1st Appointment <i class="fa fa-asterisk text-danger"></i></label>
                            <input value="<?=$staff->apdate?>" placeholder="select date of first appointment" id="<?=($this->agent->browser=='Firefox')?'updpicker3':'apdate'?>" <?=($this->agent->browser=='Firefox')?'readonly':''?>  id="apdate" name="apdate" type="date" required class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="cont" class="control-label">Phone Number</label>
                            <input value="<?=$staff->phone?>" type="tel" class="form-control" id="cont" name="cont" placeholder="Enter staff's phone number"/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label for="ssnitno" class="control-label">SSNIT Number</label>
                            <input value="<?=$staff->ssnit?>" type="tel" class="form-control" id="ssnitno" name="ssnitno" placeholder="Enter staff's social security no."/>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label for="regstat" class="control-label">Reg. Status</label>
                            <select class="form-control" name="regstat" id="upregstat">
                                <option value="1">Registered</option>
                                <option <?=($staff->regno=='N/A')?'selected':''?> value="0">Not Registered</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="regno" class="control-label">Registered Number</label>
                            <input <?=($staff->regno=='N/A')?'readonly':''?> value="<?=$staff->regno?>" type="text" class="form-control" id="upregno" name="regno" placeholder="Enter staff's Registered number"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="cshs" class="control-label">Course Studied At SHS</label>
                            <input value="<?=$staff->cshs?>"  type="text" class="form-control" id="cshs" name="cshs" placeholder="Enter course studied at shs"/>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="ccol" class="control-label">Course Studied At Tertiary/college</label>
                            <input value="<?=$staff->ccol?>" type="text" class="form-control" id="ccol" name="ccol" placeholder="Enter course studied at college or tertiary"/>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="datepro" class="control-label">Date Promoted to current Rank</label>
                            <input value="<?=$staff->datepro?>" placeholder="Select date promoted to current rank" type="date" id="<?=($this->agent->browser=='Firefox')?'updpicker2':'datepro'?>" <?=($this->agent->browser=='Firefox')?'readonly':''?> class="form-control" id="datepro" name="datepro" />
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 1px solid #CCCCCC; padding-bottom: 5px;">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="trdate" class="control-label">Transfer Date</label>
                            <input value="<?=$staff->trdate?>" required type="date" class="form-control" id="<?=($this->agent->browser=='Firefox')?'updpicker1':'trdate'?>" <?=($this->agent->browser=='Firefox')?'readonly':''?> name="trdate" placeholder="Select date staff was sent to current post"/>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="bank" class="control-label">Associated Bank</label>
                            <input value="<?=$staff->bank?>" type="text" class="form-control" id="bank" name="bank" placeholder="Enter Staff's associated bank name"/>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="acno" class="control-label">Account number</label>
                            <input value="<?=$staff->acno?>" type="text" class="form-control" id="acno" name="acno" placeholder="Enter staff's bank account number"/>
                        </div>
                    </div>

                    <?php

                    if(count($oinfo)>0){
                        ?>
                        <center><p><h3 class="text-muted">OTHER INFORMATION</h3></p></center>
                        <?php
                    foreach($oinfo as $info){

                        ?>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 ccol-sm-12 col-xs-12">
                                <input name="oid[]" type="hidden" value="<?=$info->id?>">
                                <label class="control-label">Input Label</label>
                                <input name="olabe[]" required style="background-color: #c0c0c0;" class="form-control" type="text" value="<?=$info->olabel?>"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <label class="control-label">Input Value</label>
                                <input name="ovalue[]" class="form-control" type="text" value="<?=$info->ovalue?>"/>
                            </div>
                        </div>
                        <?php

                    }}



                    ?>


                </form>


    </div>
</div>


<script>

    $(document).ready(function(){
        $("#upstaff").submit(function(){
            var progress = Snarl.addNotification({
                title:"Please Wait...",
                text:"Updating Staff info.",
                icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                timeout:null
            });
            $(".snarl-notification").addClass('snarl-info');

           var data = $("#upstaff :input").serializeArray();
            var url = $("#upstaff").attr('action');
$
    .post(url,data,function(){})
    .error(function(){
        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"ERROR",
            text:"Something went wrong, could not update staff",
            icon:"<i class='fa fa-bug'></i>",
            timeout:8000
        });
        $(".snarl-notification").addClass('snarl-error');
    })

    .done(function(){

        $("#filter_rank").change();
        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"UPDATED",
            text:"Staff Updated successfully",
            icon:"<i class='fa fa-check-circle-o'></i>",
            timeout:5000
        });
        $(".snarl-notification").addClass('snarl-success');






    });
            return false;
        });




        var oldstfid = $("#upstfid").val();
        var oldphoto = $("#upphoto").val();
        Waves.init();
        Waves.attach('.tile',['waves-button', 'waves-float']);
        Waves.attach('a',['waves-button']);
        Waves.attach('button',['waves-button']);

        $("#updpicker1,#updpicker2,#updpicker3,#updpicker4,#updpicker5").datepicker({
            changeMonth:true,
            changeYear:true,
            showAnim:"slideDown",
            dateFormat:"yy-m-d",
            currentDate:true
        });


        $("#upregstat").change(function(){
            if($(this).val()==1){

                $("#upregno").attr('readonly',false).val("");


            }else{
                $("#upregno").attr('readonly',true).val("N/A");

            }
        });

        $("div.updropzone").dropzone(
            { url: "./app/dropphoto",
                acceptedFiles: "image/*",
                addRemoveLinks:true,
                dictDefaultMessage:"drop photo here or click to upload",
                dictRemoveFile:"Remove photo",
                resizeWidth:"180",
                resizeHeight:"200",
                resizeMethod:"crop",
                capture:null,
                removedfile:function(file){
                    $.get("./app/rmphoto/?file=" +file.name,function(){}).done(function(){
                        $("#upphoto").val(oldphoto);
                        var previewElement;
                        return (previewElement = file.previewElement)!= null ?
                            (previewElement.parentNode.removeChild(file.previewElement)) :(void 0);});
                },
                maxFiles:1,
                accept:function(file,done){
                    $("#upphoto").val(file.name);
                    done();
                }
            });



        $("#upstfid").focusout(function(){

            var stfid_value = $("#upstfid").val();
            if(stfid_value.length>0){
                $.getJSON("./app/getstfbyid/"+stfid_value,function(data){
                    if(data.length>0 && data[0].stfid!=oldstfid){

                        Snarl.addNotification({
                            title:"STAFF ID EXIST",
                            text:"This staff id was entered for "+data[0].fname+" "+data[0].lname,
                            icon:"<i class='fa fa-bug'></i>",
                            timeout:8000
                        });
                        $(".snarl-notification").addClass('snarl-error');
                        $("#upstfid").focus();

                    }

                });
            }

        });



    });
</script>











