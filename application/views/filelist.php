<?php
if(count($files)>0){

    for($i=0;$i<count($files);$i++){

        $ext = substr($files[$i],-4);
        ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <?php
            if($ext=='.jpg'|| $ext=='.png'||$ext=='.gif' || $ext=='bmp.' || $ext=='.JPG' || $ext=='.PNG' || $ext=='.BMP'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue; height: 200px;">
                    <img style="height: 180px;" class="img-responsive img-rounded" src="<?=base_url()?>assets/uploads/<?=$stfid?>/<?=$files[$i]?>"/>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }elseif($ext=='.pdf'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue; height: 200px;">
                    <i class="fa fa-file-pdf-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }            elseif($ext=='.doc' || $ext=='docx'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue; height: 200px;">
                    <i class="fa fa-file-word-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }elseif($ext=='xlsx'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue; height: 200px;">
                    <i class="fa fa-file-excel-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }elseif($ext=='.zip' || $ext=='.rar'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue;">
                    <i class="fa fa-file-archive-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }elseif($ext=='.mp3' || $ext=='.wav'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue;">
                    <i class="fa fa-file-audio-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }elseif($ext=='.mp4' || $ext=='.mvw' || $ext=='.avi'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue;">
                    <i class="fa fa-file-video-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }elseif($ext=='pptx'){

                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue;">
                    <i class="fa fa-file-powerpoint-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php
            }else{



                ?>

                <a onclick="showfile('<?=$files[$i]?>','<?=$ext?>'); return false;" href="#" style="padding: 5px; color: blue;">
                    <i class="fa fa-file-o fa-4x"></i>
                    <br><?=$files[$i]?>
                </a><br><button onclick="delfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-bad">Delete</button> <button onclick="downloadfile('<?=$stfid?>','<?=$files[$i]?>')" class="btn btn-link btn-good">Download</button>

                <?php



            }






            ?>




        </div>
        <?php
    }

}
?>

<script>

    function delfile(stfid,file){

        var dpath = "./assets/uploads/<?=$stfid?>/"+file;
BootstrapDialog.show({
    title:"Confirm Delete",
    message:"This will remove this file from this staff's attachment, proceed?",
    buttons:[{label:'DELETE',cssClass:'btn-bad',action:function(d){
        d.close();
        $.get("./app/delfile/?path="+dpath,function(){

            getstaff_files(stfid);
        });

    }}]
})





    }

    function downloadfile(stfid,file){
        var dpath = "./assets/uploads/<?=$stfid?>/"+file;
        window.location = "./app/downloadfile/?path="+dpath;
    }

    function showfile(file,ext){
    if(ext=='.jpg' || ext=='.png' || ext=='.gif' || ext=='.pdf' || ext=='.bmp' || ext=='.JPG' || ext=='.PNG' || ext=='.mp3' || ext=='.mp4'||ext==".mp4" || ext=='.avi'||ext=='.mvw'){

        window.open("./assets/uploads/<?=$stfid?>/"+file,"attachment<?=$stfid?>","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");

    }else{
        window.location = "./assets/uploads/<?=$stfid?>/"+file;
    }

    }


</script>
