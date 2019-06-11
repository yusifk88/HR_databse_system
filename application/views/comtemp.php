<div class="row" style="border-bottom: 1px solid #CCCCCC;">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <img src="./assets/uploads/<?=($staff[0]->photo)? 'photos/'.$staff[0]->photo:'photo.jpg'?>" class="img-responsive img-thumbnail">
        <br>
        <span class="text-muted"><?=strtoupper($staff[0]->fname." ".$staff[0]->lname)?></span>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="dentry" class="control-label">Date</label>
                <input id="<?=$this->agent->browser()=='Firefox'?'dpicker5':'dentry'?>" <?=$this->agent->browser()=='Firefox'?'readonly':''?> type="date" class="form-control comm-date" placeholder="Select date of comment or incident" />
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="comm" class="control-label">Comment/Achievement</label>
                <textarea  name="comm" id="comm" rows="6" class="form-control"></textarea>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br>
                <button id="svcomm" class="btn btn-link btn-good pull-right" type="button">SAVE</button>
            </div>
        </div>

    </div>
</div>
<div  id="com-cont" style="width:100%; max-height: 430px; overflow-x: auto; padding: 15px; transition: .3s ease-in-out">
<?php
if(count($comms)>0){
    foreach($comms as $comm){

    ?>
    <div class="row" style="border-bottom: 1px solid #CCCCCC;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <strong class="text-info"><?=$comm->dentry?></strong> <br>
            <?=$comm->coment?> <br>
            <a onclick="rmcom(<?=$comm->id?>);return false;" class="btn btn-bad btn-link"><i class="fa fa-remove"></i> Remove </a>
        </div>

    </div>


    <?php
}}


?>
</div>

<script>
    function getstfcomms(stfid){
        $.getJSON("./app/getcmjson/"+stfid,function(comms){
                var c = "";
                for(var i = 0;i < comms.length;i++){
                    c +='<div class="row" style="border-bottom: 1px solid #CCCCCC;">';
                    c+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                    c+='<strong class="text-info">'+comms[i].dentry+'</strong> <br>'+comms[i].coment+' <br>';
                    c+='<a onclick="rmcom('+comms[i].id+',)"  class="btn btn-bad btn-link"><i class="fa fa-remove"></i> Remove </a></div></div>';
                }

                $("#com-cont").html(c);
        });
    }
    function rmcom(id){
        $.get("./app/delcom/"+id,function(){

            getstfcomms('<?=$stfid?>');
        });

    }
    $(document).ready(function(){
        $("#dpicker5").datepicker({
            changeMonth:true,
            changeYear:true,
            showAnim:"slideDown",
            dateFormat:"yy-m-d",
            currentDate:true
        });

        $("#svcomm").click(function(){
            var commdate = $(".comm-date").val();
            var comm = $("#comm").val();
            if(!(commdate)){
                $(".comm-date").focus();
            }else if(!comm){
                $("#comm").focus();
            }else{
                var progress = Snarl.addNotification({
                    title:"Please Wait...",
                    text:"Saving Comment",
                    icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                    timeout:null
                });
                $(".snarl-notification").addClass('snarl-info');
var data = {
    sid:'<?=$stfid?>',
    commdate:commdate,
    comm:comm
};
$
    .post("./app/svcomm/",data,function(){})

    .error(function(){
        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"ERROR",
            text:"Something went wrong, could not save comment",
            icon:"<i class='fa fa-bug'></i>",
            timeout:8000
        });
        $(".snarl-notification").addClass('snarl-error');
    })
    .done(function(){
        Snarl.removeNotification(progress);
        Snarl.addNotification({
            title:"SAVED",
            text:"Comment Saved successfully",
            icon:"<i class='fa fa-check-circle-o'></i>",
            timeout:5000
        });
        $(".snarl-notification").addClass('snarl-success');
        $(".comm-date").val("");
        $("#comm").val("");

getstfcomms('<?=$stfid?>');

    });
            }
        });


    });
</script>