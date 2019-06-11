<div class="row">

    <div class=" col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-default" style="box-shadow: 0 0 2px;">
            <div class="panel-body">
                <?php
                if(count($posts)>0){
                    ?>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr class="text-primary">
                            <th>S/N</th>
                            <th>Name Of Post</th>
                            <th>Circuit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$i=1;
foreach($posts as $post){
    ?>
    <tr>
    <td><?=$i?></td>
    <td><?=$post->post_name?></td>
    <td><?=$post->circuit_name?></td>
    <td>
<a onclick='editpost(<?=$post->id?>,<?=$post->c_id?>,"<?=str_replace("'","",$post->post_name)?>"); return false;' class="btn btn-link"
title="Edit this circuit's info." href="#">
<i class="fa fa-edit text-primary"></i></a>
<a onclick=" delpost(<?=$post->id?>);return false;" class="btn btn-link btn-default" title="Delete this circuit" href="#">
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
    function delpost(id){
        BootstrapDialog.show({
            title:"Confirm Delete",
            message:"This will remove this post together with all staff under it, proceed?",
            buttons:[{label:'DELETE',cssClass:'btn-good',action:function(d){
                var progress = Snarl.addNotification({
                    title:"Please Wait...",
                    text:"Deleting Post",
                    icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                    timeout:null
                });
                $(".snarl-notification").addClass('snarl-info');
                $
                    .get("./app/delpost/"+id,function(){})
                    .error(function(){

                        Snarl.removeNotification(progress);
                        Snarl.addNotification({
                            title:"ERROR",
                            text:"Something went wrong, could delete post",
                            icon:"<i class='fa fa-bug'></i>",
                            timeout:8000
                        });
                        $(".snarl-notification").addClass('snarl-error');
                    })
                    .done(function(){
                        Snarl.removeNotification(progress);
                        Snarl.addNotification({
                            title:"DELETED",
                            text:"Post deleted",
                            icon:"<i class='fa fa-check-circle-o'></i>",
                            timeout:5000
                        });
                        $(".snarl-notification").addClass('snarl-success');

                        d.close();

                        var tag ={
                            name:window.location.hash.replace('#/','')
                        };
                        window[tag.name]('#'+tag.name);
                    });
            }}]
        });
        $(".modal-backdrop").addClass('backdrop-light');
    }

    function editpost(id,c_id,pname){
        $
            .getJSON('./app/getcircuitjson',function(data){
        circuits = data;
        var elemnt = '<div class="row">';
        elemnt += '<form id="svpost">';
        elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
        elemnt += '<input value="'+id+'" id="id" type="hidden"/>';
        elemnt += '<label class="control-label">Post Name</label>';
        elemnt += '<input value="'+pname+'" id="post_name" type="text" placeholder="Name of post" required class="form-control"/>'
        elemnt += '</div>';
        elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
        elemnt += '<label class="control-label">Current Circuit</label>';
        elemnt += '<select id="circuit" required class="form-control">';
        for(var i =0;i<circuits.length;i++){
        if(circuits[i].id==c_id){
            elemnt += '<option selected value="'+ circuits[i].id +'">'+circuits[i].circuit_name+'</option>';
        }else{
        elemnt += '<option value="'+ circuits[i].id +'">'+circuits[i].circuit_name+'</option>';
         }}
        elemnt += '</select>';
        elemnt += '</div>';
        elemnt += '</form>';
        elemnt += '</div>';
        BootstrapDialog.show({
        title:"Edit this post",
        message:elemnt,
        buttons:[{label:'Update',cssClass:'btn-good',id:'svpbtn',action:function(d){
            if($("#post_name").val().length<1){
                $("#post_name").focus();
            }else{
                var post = $("#post_name").val();
                var circuit = $("#circuit").val();
                var pid = $("#id").val();
                d.close();
                var progress = Snarl.addNotification({
                    title:"Please Wait...",
                    text:"Updating Post",
                    icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                    timeout:null
                });
                $(".snarl-notification").addClass('snarl-info');
                var data={name:post,circuit_id:circuit,pid:pid};
                $
                    .post('./app/uppost/',data,function(){})
                    .error(function(){
                        Snarl.removeNotification(progress);
                        Snarl.addNotification({
                            title:"ERROR",
                            text:"Something went wrong, could not update Post",
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
                            text:"Post update successfully",
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