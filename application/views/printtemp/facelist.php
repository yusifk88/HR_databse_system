<html>
<head>

    <link href="<?=base_url()?>assets/css/bootstrap-print.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <style type="text/css">
        table th,table td{
            border:1px solid #000 !important;
            vertical-align: middle !important;
            font-size: 12px;;

        }


        @media print{

            table, th, tr, td{
                border:1px solid #000 !important; }

            *{-webkik-print-color-adjust:exact;}
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <button onclick="window.print();" type="button" class="btn btn-primary btn-link hidden-print">PRINT</button>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="border-bottom: 1px solid black; margin: 5px;">
            <h2><u><strong>GHANA EDUCATION SERVICE</strong></u></h2>
            <h5>P.O. BOX 15,WA MUNICIPAL, WA, UPPER WEST REGION</h5>
            <h4><strong><?=strtoupper($title)?></strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-condensed table-striped table-hover">
                <thead>
                <tr>
                    <th class="hidden-print"></th>

                    <th id="col1" style="text-align: center;">S/N</th>
                    <th id="col2" >PHOTO</th>
                    <th id="col2" >NAME</th>
                    <th id="col3" >SEX.</th>
                    <th id="col4" style="text-align: center;" >STAFF ID NO.</th>
                    <th id="col5" style="text-align: center;" >D.O.B</th>
                    <th id="col6" style="text-align: center;" >CONTACT NO.</th>
                    <th id="col7" >RANK/GRADE</th>
                    <th id="col7" >POST</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if(count($stafflist)>0){
                    $status=['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];
                    $i=1;
                    foreach($stafflist as $staff){
                        ?>
                        <tr>
                            <td class="hidden-print"><button id="rmrow" class="btn btn-xs btn-danger">X</button></td>
                            <td class="indexcol" id="col1" style="text-align: center;"><?=$i?></td>
                            <td id="col2" style="text-align: center;" ><img style="height: 100px; width:90px;" src="../../assets/uploads/<?=$staff->photo?'photos/'.$staff->photo:'photo.jpg'?>"/> </td>
                            <td id="col2" ><?=strtoupper($staff->fname." ".$staff->lname)?></td>
                            <td id="col3" ><?=strtoupper($staff->sex)?></td>
                            <td id="col4" style="text-align: center;"  ><?=$staff->stfid?></td>
                            <td id="col5" style="text-align: center;" ><?=$staff->dob?></td>
                            <td id="col6" style="text-align: center;" ><?=$staff->phone?></td>
                            <td id="col7" style="text-align: center;" ><?=$staff->rank_name?></td>
                            <td id="col7" ><?=$staff->post_name?></td>

                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <button onclick="window.print();" type="button" class="btn btn-primary btn-link hidden-print">PRINT</button>

</div>

<script>
    $(document).ready(function(){
        $("button#rmrow").click(function(){
            $(this).parent().parent().remove();

            for(var i=0;i<$(".indexcol").length;i++){

                var el = $(".indexcol")[i];
                el.innerHTML=(i+1);
            }
        });
    });
    function rmcol(colid){

        var tdid ='td#'+colid;
        var thid ='th#'+colid;
        $(tdid).remove();
        $(thid).remove();
    }

</script>
</body>
</html>