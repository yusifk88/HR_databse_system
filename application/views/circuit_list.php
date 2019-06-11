<div class="row">

    <div class=" col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-default" style="box-shadow: 0 0 2px;">




            <div class="panel-body">

                <?php

                if(count($circuits)>0){


                    ?>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="text-primary">
                       <th>S/N</th>
                        <th>Name Of Circuit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach($circuits as $circuit){

                        ?>
<tr>
    <td><?=$i?></td>
<td><?=$circuit->circuit_name?></td>
<td>
<a onclick=" editcircuit(<?=$circuit->id?>); return false;" class="btn btn-link " title="Edit this circuit's info." href="#">
<i class="fa fa-edit text-info"></i></a>
<a onclick=" delcircuit(<?=$circuit->id?>);return false;" class="btn btn-link" title="Delete this circuit" href="#">
<i class="fa fa-remove text-danger"></i></a>
</td>

</tr>

                        <?php
                        $i++;
                    }

                    ?>

                    </tbody>


                </table>

<?php
                }else{

    ?>

    <center><h3 class="text-muted"><i class="fa fa-flask"></i> NO RECORD FOUND</h3></center>


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
        Waves.attach('button',['waves-button']);

    });

    function delcircuit(id){

     BootstrapDialog.show({
         title:"Confirm Delete",
         message:"This will remove this circuit together with all staff under it, proceed?",
         buttons:[{label:'DELETE',cssClass:'btn-good',action:function(d){
             d.close();

             var progress = Snarl.addNotification({
                 title:"Please Wait...",
                 text:"Deleting Circuit",
                 icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                 timeout:null
             });
             $(".snarl-notification").addClass('snarl-info');

$
    .get("./app/delcircuit/"+id,function(){})
    .error(function(){

        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"ERROR",
            text:"Something went wrong, could not delete circuit",
            icon:"<i class='fa fa-bug'></i>",
            timeout:8000
        });
        $(".snarl-notification").addClass('snarl-error');
    })
    .done(function(){
refresh();
        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"DELETED",
            text:"Circuit deleted",
            icon:"<i class='fa fa-check-circle-o'></i>",
            timeout:5000
        });
        $(".snarl-notification").addClass('snarl-success');

    });
         }}]

     });

        $(".modal-backdrop").addClass('backdrop-light');

    }


    function editcircuit(id){

        $
            .getJSON("./app/getcircjson/"+id, function (data) {

        var elemnt = '<div class="row">';
elemnt += '<form id="svcircuit">';
elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
elemnt += '<input id="circuit_id" value="'+data[0].id+'" type="hidden" placeholder="Name of circuit" required class="form-control"/>'
elemnt += '<label class="control-label">Circuit Name</label>';
elemnt += '<input id="circuit_name" type="text" value="'+data[0].circuit_name+'" placeholder="Name of circuit" required class="form-control"/>'
elemnt += '</div>';
elemnt += '</form>';
elemnt += '</div>';
                BootstrapDialog.show({
                    title:"Edit This Circuit",
                    message:elemnt,
                    buttons:[{label:'UPDATE',cssClass:'btn-good',id:'svcbtn',action:function(d){
                        if($("#circuit_name").val().length<1){
                            $("#circuit_name").focus();
                        }else{

                            var circuit = $("#circuit_name").val();
                            var c_id = $("#circuit_id").val();
                            d.close();

                            var progress = Snarl.addNotification({
                                title:"Please Wait...",
                                text:"Updating Circuit",
                                icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                                timeout:null
                            });
                            $(".snarl-notification").addClass('snarl-info');

                            var data={name:circuit,id:c_id};

                            $
                                .post('./app/upcircuit/',data,function(){})
                                .error(function(){
                                    Snarl.removeNotification(progress);
                                    Snarl.addNotification({
                                        title:"ERROR",
                                        text:"Something went wrong, could not update circuit",
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
                                        text:"Circuit updated successfully",
                                        icon:"<i class='fa fa-check-circle-o'></i>",
                                        timeout:2000
                                    });
                                    $(".snarl-notification").addClass('snarl-success');
                                });

                        }
                    }}]});});

    }

</script>