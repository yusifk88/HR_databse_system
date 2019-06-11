<?php
if(count($staff_list)>0){
    $status=['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];
    $stat_style=['','leavewpa','leavewop','vpost','diseased','embargo','mleave','ExamLeave','CasualLeave','AnnualLeave','SickLeave','Bereavement'];
    foreach($staff_list as $staff){
$ydob = substr($staff->dob,0,4);
        $ryear = $ydob+60;
        $tyear = date("Y-m-d");
        $nowy = substr($tyear,0,4);
        $appy = substr($staff->apdate,0,4);
        $dur = $nowy - $appy;
        $try = substr($staff->trdate,0,4);
        $sdur = $nowy - $try;

        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default <?=$stat_style[$staff->status]?>" style="padding:0 !important; margin: 1px !important; box-shadow: 0 0 2px;">
                    <div class="panel-body" style="padding:0 !important; margin: 0 !important;">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-condensed" style="transition 0.3s ease-in-out; margin: 0 !important; font-size: 12px;">
                    <tr>
                        <td rowspan="6" style="padding: 0 !important;">
                            <img style="max-height: 150px !important; max-width: 120px !important; min-width: 90px !important; min-height: 100px;" class="img-thumbnail" src="./assets/uploads/<?=($staff->photo)? 'photos/'.$staff->photo: 'photo.jpg'?>"/>
                        </td>
                        <th>Name:</th>
                        <td colspan="3"><?=highlight_phrase($staff->fname." ".$staff->lname,$q,'<span style="color:#FFFFFF; background-color: magenta;">', '</span>')?></td>
                        <th>Staff ID No.:</th>
                        <td><?=highlight_phrase($staff->stfid,$q,'<span style="color:#FFFFFF; background-color: magenta;">', '</span>')?></td>
                        <th>D.O.B:</th>
                        <td><?=$staff->dob?></td>
                        <th>Rank:</th>
                        <td><?=$staff->rank_name?></td>
                    </tr>
                    <tr>
                        <th>App. Date:</th>
                        <td><?=$staff->apdate?></td>
                        <th>Course stud.(SHS):</th>
                        <td><?=$staff->cshs?></td>
                        <th>Course Stud(Tert./Coll.):</th>
                        <td><?=$staff->ccol?></td>
                        <th>Sex:</th>
                        <td><?=$staff->sex?></td>
                        <th>Aca. Qual.:</th>
                        <td><?=$staff->aqual?></td>
                    </tr>
                    <tr>
                        <th>Prom. Date:</th>
                        <td><?=$staff->datepro?></td>
                        <th>Reg. Status:</th>
                        <td><?=($staff->regno=='N/A'?'Not Registered':'Registered')?></td>
                        <th>Reg. No.:</th>
                        <td><?=$staff->regno?></td>
                        <th>SSNIT No.:</th>
                        <td><?=$staff->ssnit?></td>
                        <th>Prof. Qual.:</th>
                        <td><?=$staff->pqual?></td>
                    </tr>
                    <tr>
                        <th>Post:</th>
                        <td><?=$staff->post_name?></td>
                        <th>Contact No.:</th>
                        <td><?=$staff->phone?></td>
                        <th>Asso.Bank:</th>
                        <td><?=$staff->bank?></td>
                        <th>Account No.:</th>
                        <td><?=$staff->acno?></td>
                        <th>Duration @ Post:</th>
                        <td><?=$sdur?> Year(s)</td>
                    </tr>
                </table>
            </div>
            <div class="row" id="<?=$staff->stfid?>" style="display: none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
              <table class="table table-bordered table-hover table-condensed" style="transition 0.3s ease-in-out; margin: 0 !important; font-size: 12px;">
                  <tr>
                      <th style="text-align: right">Date Transferred To current Post:</th><td><?=$staff->trdate?></td>
                      <th>Retirement Year:</th><td><?=$ryear?></td>
                      <th>Current Status</th><td><?=$status[$staff->status]?></td>
                      <th>Duration In Service:</th><td><?=$dur?>Year(s)</td>
                  </tr>

                  <?php
                  $oinfo = $this->db->query("select * from oinfo where stfid = '$staff->stfid'")->result();
                 if(count($oinfo)>0){?>
                     <tr>
                         <th colspan="8" style="text-align: center;">
                             OTHER INFORMATION
                         </th>
                     </tr>
    <?php
foreach($oinfo as $info){
  ?>
    <tr>
        <th colspan="3" style="text-align: right"><?=$info->olabel?></th>
        <td colspan="5"><?=$info->ovalue?></td>
    </tr>
    <?php
}}
?>
              </table>
                        </div>
            </div>
                </div>
        </div>
        <div class="panel-footer" style="margin: 0 !important; padding: 0 !important;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="#" onclick="printstaff('<?=$staff->stfid;?>');return false;" class="btn btn-link btn-good">Print <i class="fa fa-print"></i> </a>
                    <a href="#" onclick="updatestaff(<?=$staff->id;?>);return false;"  class="btn btn-link btn-good">Edit <i class="fa fa-edit"></i> </a>
                    <a href="#" onclick="promstaff('<?=$staff->stfid;?>','<?=$staff->rid?>','<?=$staff->fname." ".$staff->lname?>','<?=$staff->photo?>');return false;"  class="btn btn-link btn-good">Promote <i class="fa fa-star-half-o"></i> </a>
                    <a href="#" onclick="transstaff('<?=$staff->stfid?>','<?=$staff->pid?>','<?=$staff->fname." ".$staff->lname?>','<?=$staff->photo?>');return false;"class="btn btn-link btn-good">Transfer <i class="fa fa-arrow-right"></i> </a>
                    <a href="#" onclick="attachfile('<?=$staff->stfid;?>');return false;"class="btn btn-link btn-good">Attachment <i class="fa fa-paperclip"></i> </a>
                    <a href="#" onclick="com('<?=$staff->stfid;?>');return false;"class="btn btn-link btn-good">Comments <i class="fa fa-comments-o"></i> </a>
                    <a href="#" onclick="change_stat('<?=$staff->stfid;?>',<?=$staff->status?>,'<?=$status[$staff->status]?>');return false;"class="btn btn-link btn-good">Change Status <i class="fa fa-user-circle-o"></i> </a>
                    <a href="#" onclick="addpro('<?=$staff->stfid;?>');return false;"class="btn btn-link btn-good">New Input <i class="fa fa-plus-circle"></i> </a>
                    <a href="#" onclick="delstaff('<?=$staff->id;?>');return false;"class="btn btn-link btn-bad">Delete <i class="fa fa-remove"></i> </a>
                    <a href="#" onclick="showdet('#<?=$staff->stfid;?>');return false;" id="detshow" class="btn btn-link btn-good pull-right">Details <i class="fa fa-caret-down"></i> </a>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>



        <?php
    }
}


?>



<div class="row">
    <div class="col-lg-offset-5 col-md-offset-5 col-lg-2 col-md-2 col-sm-4 col-xs-12">


        <?php
        if($pages > 1){
        $next = $page + 1;
        $prev = $page - 1;
        if($page > 1){?>



        <nav>
            <br />
            <ul class="pager">
                <li><a class="btn btn-good btn-link"  href="./app#/managstaff/1">First page</a></li>
                <li><a class="btn btn-good btn-link" href="./app#/managstaff/<?= $prev;?>">&LessLess;Prev.</a></li>

                <?php
                }


                ?>
                <nav>
                    <ul class="pager">

                        <li>
                            <label for="" class="control-label">Select Page:</label>  <select id="cbopage-list" class="form-control">

                                <?php
                                for($x =1; $x <= $pages; $x++){
                                    ?>

                                    <?php
                                    if($x === $page){
                                        ?>
                                        <option value="<?php echo $x;?>" selected="selected"><?php echo"Page ".$x?></option>

                                        <?php
                                    }else{
                                        ?>

                                        <option value="<?php echo $x;?>" ><?php echo"Page ".$x?></option>


                                        <?php
                                    }


                                    ?>
                                    <?php
                                }
                                ?>

                            </select></li>
                        <?php

                        if(($page < $pages)){
                            ?>
                            <li><a class="btn btn-good btn-link" href="./app#/managstaff/<?= $next;?>">Next &GreaterGreater;</a></li>
                            <li><a class="btn btn-good btn-link" href="./app#/managstaff/<?= $pages;?>">Last Page</a></li>
                            <?php
                        }
                        }

                        ?>



                    </ul>
                </nav>







    </div>
</div>


<script>

  $(document).ready(function(){

      Waves.init();
      Waves.attach('.tile',['waves-button', 'waves-float']);
      Waves.attach('a',['waves-button']);
      Waves.attach('button',['waves-button']);

$("#cbopage-list").change(function(){

    window.location = "./app#/managstaff/"+$(this).val();
});



  });


  function attachfile(stfid){
      $.get("./app/getstffiles/"+stfid,function(files){
          BootstrapDialog.show({
              title:"View & attache files for this staff",
              message:files,
              size:'size-wide',
              closable:false,
              buttons:[{label:'DONE',cssClass:'btn-good',action:function(d){
                  d.close();
              }}]

          });


          $(".modal-backdrop").addClass('backdrop-light');




      });


  }



  function printstaff(id){

      window.open("./printer/staffprofile/"+id,"Staff profile-"+id,"outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");

  }

    function updatestaff(id){
        $.get("./app/getstaff_upinput/"+id,function(data){
 BootstrapDialog.show({
  title:"Edit This Staff's information",
    message:data,
    size:'size-wide',
     buttons:[{label:'UPDATE',cssClass:'btn-good',action:function(d){
       $("#upstaff").submit();

         d.close();
         refresh();
     }}]



});

       });

    }



    function change_stat(stfid,cstat,stattext){
        $.get("./app/getstats/"+stfid,function(stats){



        var stat_array = ['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];
        var stfrm = "<div class='row'><div class='col-xs-12 col-md-12 col-lg-12 col-sm-12'>";
        stfrm+="<label class='control-label'>Select Status</label>";
        stfrm+="<select class='form-control' id='stat'>";
            for(var i =0;i<stat_array.length;i++){
                var sel = (i==Number(cstat))?" selected":"";
        stfrm+="<option "+sel+"  value='"+i+"'>"+stat_array[i]+"</option>"
            }
        stfrm+="</select></div></div>";
        stfrm += "<div class='row'><div class='col-xs-12 col-md-12 col-lg-12 col-sm-12'>";
        stfrm+="<label class='control-label'>Date</label>";
        stfrm+="<input class='form-control' type='date' placeholder='Select date of status change' id='stdate'>";
        stfrm+="</div></div>";
        stfrm += "<div class='row'><div class='col-xs-12 col-md-12 col-lg-12 col-sm-12'>";
            stfrm+=stats;
        stfrm+="</div></div>";

        BootstrapDialog.show({
            title:"Change Staff's Status",
            message:stfrm,
            buttons:[{label:"SAVE",cssClass:'btn-good',action:function(d){

                if(!$("#stdate").val()){
                    $("#stdate").focus();
                }else{

                    var progress = Snarl.addNotification({
                        title:"Please Wait...",
                        text:"Changing Staff's Status",
                        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                        timeout:null
                    });
                    $(".snarl-notification").addClass('snarl-info');



                    d.close();
        var data={ stfid:stfid, stat:$("#stat").val(),stdate:$("#stdate").val(),stattext:stattext};

            $
                .post("./app/changestat/",data,function(){


                })
                .error(function(){

                    Snarl.removeNotification(progress);
                    Snarl.addNotification({
                        title:"ERROR",
                        text:"Something went wrong, could not change status",
                        icon:"<i class='fa fa-bug'></i>",
                        timeout:8000
                    });
                    $(".snarl-notification").addClass('snarl-error');


                })
                .done(function(){


                    Snarl.removeNotification(progress);
                    Snarl.addNotification({
                        title:"SAVED",
                        text:"Staff's Status Changed successfully",
                        icon:"<i class='fa fa-check-circle-o'>",
                        timeout:5000
                    });
                    $(".snarl-notification").addClass('snarl-success');
                    refresh();
                });

            }


            }}]

        });});


    }
    function transstaff(stfid,pid,name,ph){
        var photo = '/photos/'+ph;
        if(!ph){
            photo='/photo.jpg';
        }
        $.getJSON('./app/getpjson',function(pst) {
            var trans ="";
            $.get("./app/gettrans/"+stfid,function(data){
                trans=data;
            var frm = "<div class='row'><div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>";
            frm += "<img src='./assets/uploads" + photo + "' class='img-responsive img-thumbnail'/> <br/> <span class='text-muted'>" + name + "</span>";
            frm += "</div>";
            frm += "<div class='col-lg-8 col-md-8 col-sm-6 col-xs-12'>";
            frm += "<label class='control-label'>New Post</label>";
            frm += "<select class='form-control' id='post'>";
            if (pst.length > 0) {
                for (var i = 0; i < pst.length; i++) {
                    frm += (pst[i].id != pid) ? "<option value='" + pst[i].id + "'>" + pst[i].post_name + "</option>" : "";
                }
            }
            frm += "</select>";
            frm += "<label class='control-label'>Date</label>";
            frm += "<input id='<?=$this->agent->browser()=='Firefox'?'dpicker6':''?>'class='form-control datetr' type='date' placeholder='select date of promotion (mm/dd/yyyy)'>";
            frm += "</div></div>";
            frm+="<div class='row'>";
            frm+="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
            frm+=trans;
            frm+="</div></div>";
            BootstrapDialog.show({
                title:"Transfer This staff",
                message:frm,
                buttons:[{label:'TRANSFER',cssClass:'btn-good',action:function(d){
                if(!$(".datetr").val()){
                    $(".datetr").focus();
                }else{
                    d.close();
                    var progress = Snarl.addNotification({
                        title:"Please Wait...",
                        text:"Transferring Staff",
                        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                        timeout:null
                    });
                    $(".snarl-notification").addClass('snarl-info');

var data ={
    stfid:stfid,
    newpost:$("#post").val(),
    datetr:$(".datetr").val()
};

$
    .post("./app/transtaff/",data,function(){})
    .error(function(){

        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"ERROR",
            text:"Something went wrong, could not transfer staff",
            icon:"<i class='fa fa-bug'></i>",
            timeout:8000
        });
        $(".snarl-notification").addClass('snarl-error');


    })
    .done(function(){
        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"PROMOTED",
            text:"Staff Transferred successfully",
            icon:"<img src='./assets/uploads"+photo+"' class='img-responsive img-circle'/>",
            timeout:5000
        });
        $(".snarl-notification").addClass('snarl-success');
        refresh();
    });
                }
                }}]
            });


        });

        });

    }
    function promstaff(id,rid,name,ph){
        var photo = '/photos/'+ph;
        if(!ph){
            photo='/photo.jpg';
        }
$.getJSON('./app/getrjson',function(data){
    $.get("./app/getprhist/"+id,function(prhist){

        var frm = "<div class='row'><div class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>";
        frm += "<img src='./assets/uploads" + photo + "' class='img-responsive img-thumbnail'/> <br/> <span class='text-muted'>" + name + "</span>"
        frm += "</div>";
        frm += "<div class='col-lg-8 col-md-8 col-sm-6 col-xs-12'>";
        frm += "<label class='control-label'>New Rank</label>";
        frm += "<select class='form-control' id='rank'>";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                frm += (data[i].id != rid) ? "<option value='" + data[i].id + "'>" + data[i].rank_name + "</option>" : "";
            }
        }
        frm += "</select>";
        frm += "<label class='control-label'>Date</label>";
        frm += "<input id='<?=$this->agent->browser()=='Firefox'?'dpicker6':''?>'class='form-control datepro' type='date' placeholder='select date of promotion (mm/dd/yyyy)'>"
        frm += "</div></div>";
        frm += "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
        frm += prhist;
        frm += "</div></div>";

        BootstrapDialog.show({
            title: "Promote This staff",
            message: frm,
            buttons: [{
                label: 'PROMOTE', cssClass: 'btn-good', action: function (d) {
                    if (!$(".datepro").val()) {
                        $(".datepro").focus();
                    } else {
                        d.close();
                        var progress = Snarl.addNotification({
                            title: "Please Wait...",
                            text: "Promoting Staff",
                            icon: "<i class='fa fa-circle-o-notch fa-spin'></i>",
                            timeout: null
                        });
                        $(".snarl-notification").addClass('snarl-info');

                        var data = {
                            id: id,
                            newrank: $("#rank").val(),
                            datepro: $(".datepro").val()
                        };
                        $
                            .post("./app/promstaff/", data, function () {
                            })
                            .error(function () {
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title: "ERROR",
                                    text: "Something went wrong, could not promote staff",
                                    icon: "<i class='fa fa-bug'></i>",
                                    timeout: 8000
                                });
                                $(".snarl-notification").addClass('snarl-error');
                            })
                            .done(function () {
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title: "PROMOTED",
                                    text: "Staff promoted successfully",
                                    icon: "<img src='./assets/uploads" + photo + "' class='img-responsive img-circle'/>",
                                    timeout: 5000
                                });
                                $(".snarl-notification").addClass('snarl-success');
                                refresh();

                            });


                    }

                }

            }]
        });


    });});
}
    function delstaff(id){
BootstrapDialog.show({
    title:"Confirm Delete",
    message:"This will remove this staff together with all associated records, proceed?",
buttons:[
    {label:'DELETE',cssClass:'btn-bad',action:function(d){
        d.close();
        var progress = Snarl.addNotification({
            title:"Please Wait...",
            text:"Deleting Staff info.",
            icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
            timeout:null
        });
        $(".snarl-notification").addClass('snarl-info');
        $
    .get("./app/delstaff/"+id,function(){})
        .error(function(){

                Snarl.removeNotification(progress);
                Snarl.addNotification({
                    title:"ERROR",
                    text:"Something went wrong, could not delete staff",
                    icon:"<i class='fa fa-bug'></i>",
                    timeout:8000
                });
                $(".snarl-notification").addClass('snarl-error');



            })
        .done(function(){
        $("#filter_rank").change();
                Snarl.removeNotification(progress);
                Snarl.addNotification({
                    title:"DELETED",
                    text:"Staff Deleted successfully",
                    icon:"<i class='fa fa-check-circle-o'></i>",
                    timeout:5000
                });
                $(".snarl-notification").addClass('snarl-success');

            })

    }}
]

});
        $(".modal-backdrop").addClass('backdrop-light');


    }
    function addpro(id){
        var oinputs = "<div class='row'>";
        oinputs+="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
        oinputs+="<input id='instfid' type='hidden' value='"+id+"' />";
        oinputs+="<label class='control-label'>Input Label</label>";
        oinputs+="<input id='input-label' class='form-control' type='text' placeholder='Enter your input label' style='background-color: #CCCCCC' /></div></div>";
        oinputs += "<div class='row'>";
        oinputs+="<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
        oinputs+="<label class='control-label'>Input Value</label>";
        oinputs+="<input id='input-value' class='form-control' type='text' placeholder='Enter your input Value'/></div></div>";
        BootstrapDialog.show({
            title:"Add A New Input",
            message:oinputs,
            buttons:[{label:'SAVE',cssClass:'btn-good',action:function(d){
                if(!$("#input-label").val()){
                    $("#input-label").focus();
                }else if(!$("#input-value").val()){
                    $("#input-value").focus();
                }else{

                    var progress = Snarl.addNotification({
                        title:"Please Wait...",
                        text:"Adding new input",
                        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                        timeout:null
                    });
                    $(".snarl-notification").addClass('snarl-info');

                    var data ={
                        instfid:$("#instfid").val(),
                        inlabel:$("#input-label").val(),
                        invalue:$("#input-value").val()

                    };


                    $
                        .post("./app/addinput",data,function(){})
                        .error(function(){
                            Snarl.removeNotification(progress);
                            Snarl.addNotification({
                                title:"ERROR",
                                text:"Something went wrong, could not save input",
                                icon:"<i class='fa fa-bug'></i>",
                                timeout:8000
                            });
                            $(".snarl-notification").addClass('snarl-error');

                        })
                        .done(function(){
                            d.close();
                            $("#filter_rank").change();
                            Snarl.removeNotification(progress);
                            Snarl.addNotification({
                                title:"SAVED",
                                text:"Input added successfully",
                                icon:"<i class='fa fa-check-circle-o'></i>",
                                timeout:5000
                            });
                            $(".snarl-notification").addClass('snarl-success');


                        });




                }


            }}]


        });

    }
    function com(id){
        $
            .get("./app/staffcomm/"+id,function(comform){

                BootstrapDialog.show({
                    title:"Manage comments under this staff",
                    message:comform,
                    size:'size-wide',
                    closable:false,
                    buttons:[{label:'DONE',cssClass:'btn-good',action:function(d){d.close();}}]
                });
            });

    }
</script>

