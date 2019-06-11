<div class="row">

    <div class=" col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-default" style="box-shadow: 0 0 2px;">
            <div class="panel-body">
                <?php
                if(count($users)>0){
                    ?>
<div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="text-primary">
                            <th>S/N</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Last Login Timestamp</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        foreach($users as $user){
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$user->uname?></td>
                                <td><?=$user->upass?></td>
                                <td><?=$user->logtime?></td>
                                <td>
                                    <a onclick="edituser(<?=$user->id?>,'<?=$user->uname?>','<?=$user->upass?>');return false;" class="btn btn-link"
                                       title="Edit this circuit's info." href="#">
                                        <i class="fa fa-edit text-primary"></i></a>
                                    <a onclick=" deluser(<?=$user->id?>);return false;" class="btn btn-link btn-default" title="Delete this circuit" href="#">
                                        <i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table></div>
                    <?php
                }else{
                    ?>
                    <center><h3 class="text-muted"><i class="fa fa-flask"></i> NO USER ACCOUNTS FOUND</h3></center>
                    <?php
                }?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('a').tooltip();
        Waves.init();
        Waves.attach('a',['waves-button']);
    });
    function deluser(id){
        BootstrapDialog.show({
            title:"Confirm Delete",
            message:"This will remove this user account so the owner can't login again, proceed?",
            buttons:[{label:'DELETE',cssClass:'btn-bad',action:function(d){
                var progress = Snarl.addNotification({
                    title:"Please Wait...",
                    text:"Deleting Login Account",
                    icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                    timeout:null
                });
                $(".snarl-notification").addClass('snarl-info');
                $
                    .get("./app/deluser/"+id,function(){})
                    .error(function(){

                        Snarl.removeNotification(progress);
                        Snarl.addNotification({
                            title:"ERROR",
                            text:"Something went wrong, could delete account",
                            icon:"<i class='fa fa-bug'></i>",
                            timeout:8000
                        });
                        $(".snarl-notification").addClass('snarl-error');
                    })
                    .done(function(){
                        Snarl.removeNotification(progress);
                        Snarl.addNotification({
                            title:"DELETED",
                            text:"Account deleted",
                            icon:"<i class='fa fa-check-circle-o'></i>",
                            timeout:5000
                        });
                        $(".snarl-notification").addClass('snarl-success');

                        d.close();

                     refresh();
                    });
            }}]
        });
        $(".modal-backdrop").addClass('backdrop-light');
    }

    function edituser(id,uname,upass){
                var elemnt = '<div class="row">';
                elemnt += '<form id="svpost">';
                elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
                elemnt += '<input value="'+id+'" id="id" type="hidden"/>';
                elemnt += '<label class="control-label">Login Name</label>';
                elemnt += '<input value="'+uname+'" id="uname" type="text" placeholder="Name of post" required class="form-control"/>'
                elemnt += '</div>';
                elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
                elemnt += '<label class="control-label">New Password</label>';
                elemnt += '<input id="upass" type="password" placeholder="Enter a new password" required class="form-control"/>'
                elemnt += '</div>';
                elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
                elemnt += '<label class="control-label">Confirm New Password</label>';
                elemnt += '<input id="cpass" type="password" placeholder="Confrim new password" required class="form-control"/>'
                elemnt += '</div>';
                elemnt += '</form>';
                elemnt += '</div>';
                BootstrapDialog.show({
                    title:"Edit Login Account",
                    message:elemnt,
                    buttons:[{label:'UPDATE',cssClass:'btn-good',action:function(d){
                        if($("#uname").val().length<1){
                            $("#uname").focus();

                        }else if(!(!$("#upass").val() && !$("#cpass").val()) && ($("#upass").val() != $("#cpass").val())){
                                Snarl.addNotification({
                                title:"PASSWORDS MISMATCH",
                                text:"The passwords you entered do not match",
                                icon:"<i class='fa fa-bug'></i>",
                                timeout:5000
                            });
                            $(".snarl-notification").addClass('snarl-error');
                        }else{
                            var upname = $("#uname").val();
                            var uppass = $("#upass").val();
                            var uid = $("#id").val();
                            d.close();
                            var progress = Snarl.addNotification({
                                title:"Please Wait...",
                                text:"Updating Post",
                                icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                                timeout:null
                            });
                            $(".snarl-notification").addClass('snarl-info');

                            var data={uname:upname,upass:uppass,uid:uid};


                            $
                                .post('./app/upuser/',data,function(){})
                                .error(function(){
                                    Snarl.removeNotification(progress);
                                    Snarl.addNotification({
                                        title:"ERROR",
                                        text:"Something went wrong, could not update Login Account",
                                        icon:"<i class='fa fa-bug'></i>",
                                        timeout:8000
                                    });
                                    $(".snarl-notification").addClass('snarl-error');
                                })
                                .done(function(){
                                    refresh();
                                    Snarl.removeNotification(progress);
                                    Snarl.addNotification({
                                        title:"UPDATED",
                                        text:"Login account update successfully",
                                        icon:"<i class='fa fa-check-circle-o'></i>",
                                        timeout:2000
                                    });
                                    $(".snarl-notification").addClass('snarl-success');
                                });
                        }
                    }}]});

    }
</script>