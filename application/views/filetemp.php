<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="filezone dropzone" style="border: 1px dashed deepskyblue !important;">

        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <center><h4 class="text-muted">UPLOADED FILES</h4></center>
    </div>
</div>
<div class="row" id="filarea"  style="max-height: 400px; overflow-x: auto; padding: 10px; background-color: lightgray;">
</div>
<script>
    function getstaff_files(stfid){
    var spinner = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' +
    '<center> <i style="margin-top: 15%;" class="fa fa-spinner fa-spin fa-4x btn-good"></i></center></div>';
        $("#filarea").html(spinner);

        $
            .get("./app/getfilelist/"+stfid,function(){

            })
            .error(function(){
var msg = "<center><h3><span class='text-danger'>Something went wrong, could not get staff's files</span></h3></center>";
                $("#filarea").html(msg);
            })
            .done(function(files){
                $("#filarea").html(files);
            });
    }


    $(document).ready(function(){
        $("a#filelink").click(function(){});
        getstaff_files('<?=$stfid?>');
        $(".filezone").dropzone(
            { url: "./app/dropfile/<?=$stfid?>",
                addRemoveLinks:true,
                dictDefaultMessage:"drop FILES here or click to upload",
                dictRemoveFile:"Remove photo",
                removedfile:function(file){
                    $.get("./app/rmfile/?file=" +file.name+"&stfid=<?=$stfid?>",function(){}).done(function(){
                    $("#photo").val("");
                    var previewElement;
                    return (previewElement = file.previewElement)!= null ?
                    (previewElement.parentNode.removeChild(file.previewElement)) :(void 0);});
            },
                accept:function(file,done){
                    done(getstaff_files('<?=$stfid?>'));

                }
            });

        Waves.init();
        Waves.attach('button',['waves-button']);
    });
</script>