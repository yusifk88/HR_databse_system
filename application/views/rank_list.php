<div class="row">

    <div class=" col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-default" style="box-shadow: 0 0 2px;">
            <div class="panel-body">
                <?php
                if(count($ranks)>0){
                    ?>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="text-primary">
                            <th>S/N</th>
                            <th>Rank</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        foreach($ranks as $rank){

                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$rank->rank_name?></td>
                                <td>
                                    <a onclick='editrank(<?=$rank->id?>);return false;' class="btn btn-link btn-default" title="Edit this circuit's info." href="#">
                                        <i class="fa fa-edit text-primary"></i></a>
                                    <a onclick=" delrank(<?=$rank->id?>);return false;" class="btn btn-link btn-default" title="Delete this circuit" href="#">
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

    });

    function delrank(id){
        BootstrapDialog.show({
            title:"Confirm Delete",
            message:"This will remove this rank together with all staff under it, proceed?",
            buttons:[{label:'DELETE',cssClass:'btn-good',action:function(d){
                d.close();
                var progress = Snarl.addNotification({
                    title:"Please Wait...",
                    text:"Deleting Rank",
                    icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                    timeout:null
                });
                $(".snarl-notification").addClass('snarl-info');
                $
                    .get("./app/delrank/"+id,function(){})
                    .error(function(){
                        Snarl.removeNotification(progress);
                        Snarl.addNotification({
                            title:"ERROR",
                            text:"Something went wrong, could not delete Rank",
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
                            text:"Rank deleted",
                            icon:"<i class='fa fa-check-circle-o'></i>",
                            timeout:5000
                        });
                        $(".snarl-notification").addClass('snarl-success');
                    });
            }}]

        });

        $(".modal-backdrop").addClass('backdrop-light');
    }

    function editrank(id){

        $
            .getJSON("./app/getrankjson/"+id,function(data){
            var elemnt = '<div class="row">';
            elemnt += '<form id="svrank">';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
            elemnt += '<input value="'+id+'" id="id" type="hidden" />'
            elemnt += '<label class="control-label">Rank Description</label>';
            elemnt += '<input value="'+data[0].rank_name+'" id="rank_name" type="text" placeholder="Enter rank" required class="form-control"/>';
            elemnt += '</div>';
            elemnt += '</form>';
            elemnt += '</div>';

        BootstrapDialog.show({
            title:"Edit This Rank",
            message:elemnt,
            buttons:[{label:'UPDATE',cssClass:'btn-good',id:'svcbtn',action:function(d){
                if($("#rank_name").val().length<1){
                    $("#rank_name").focus();
                }else{
                    var rank = $("#rank_name").val();
                    d.close();
                    var progress = Snarl.addNotification({
                        title:"Please Wait...",
                        text:"Updating Rank",
                        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                        timeout:null
                    });
                    $(".snarl-notification").addClass('snarl-info');
                    var data={name:rank, id:$("#id").val()};
                    $
                        .post('./app/uprank/',data,function(){})
                        .error(function(){
                            Snarl.removeNotification(progress);
                            Snarl.addNotification({
                                title:"ERROR",
                                text:"Something went wrong, could not Update Rank",
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
                                text:"Rank updated successfully",
                                icon:"<i class='fa fa-check-circle-o'></i>",
                                timeout:2000
                            });
                            $(".snarl-notification").addClass('snarl-success');
                        });
                }


            }}]});


            });



    }


</script>