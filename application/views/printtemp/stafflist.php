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
            <h4><strong><?=$title ? strtoupper($title):"LIST OF STAFF"?></strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-condensed table-striped table-hover">
                <thead>

                <tr class="hidden-print">
                    <th></th>
                    <th id="col1" ><button  class="btn btn-xs btn-danger">X</button></th>
                    <th id="col2" ><button onclick="rmcol('col2');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col3" ><button onclick="rmcol('col3');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col4" ><button onclick="rmcol('col4');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col5" ><button onclick="rmcol('col5');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col6" ><button onclick="rmcol('col6');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col7" ><button onclick="rmcol('col7');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col8" ><button onclick="rmcol('col8');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col9" ><button onclick="rmcol('col9');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col10"><button onclick="rmcol('col10');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col22"><button onclick="rmcol('col22');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col11"><button onclick="rmcol('col11');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col12"><button onclick="rmcol('col12');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col13"><button onclick="rmcol('col13');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col14"><button onclick="rmcol('col14');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col15"><button onclick="rmcol('col15');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col16"><button onclick="rmcol('col16');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col17"><button onclick="rmcol('col17');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col18"><button onclick="rmcol('col18');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col19"><button onclick="rmcol('col19');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col20"><button onclick="rmcol('col20');" class="btn btn-xs btn-danger">X</button></th>
                    <th id="col21"><button onclick="rmcol('col21');" class="btn btn-xs btn-danger">X</button></th>

                </tr>



                <tr>

                    <th class="hidden-print"></th>
                    <th id="col1" style="text-align: center;">S/N</th>
                    <th id="col2" >NAME</th>
                    <th id="col3" >SEX.</th>
                    <th id="col4" style="text-align: center;" >STAFF ID NO.</th>
                    <th id="col5" style="text-align: center;" >D.O.B</th>
                    <th id="col6" style="text-align: center;" >CONTACT NO.</th>
                    <th id="col7" >RANK/GRADE</th>
                    <th id="col8"  style="text-align: center;" >FIRST APP. DATE</th>
                    <th id="col9" style="text-align: center;" >PROM. DATE</th>
                    <th id="col10" style="text-align: center;">SSNIT NO.</th>
                    <th id="col22" style="text-align: center;">POST</th>
                    <th id="col11">REG. STATUS</th>
                    <th id="col12" style="text-align: center;">REGISTERED NUMBER</th>
                    <th id="col13">ACADEMIC QUALIFICATION</th>
                    <th id="col14">PROFESSIONAL QUALIFICATION</th>
                    <th id="col15" style="text-align: center;">TRANSFER DATE </th>
                    <th id="col16" style="text-align: center;">DURATION IN SERVICE</th>
                    <th id="col17" style="text-align: center;">DURATION AT POST</th>
                    <th id="col18" style="text-align: center;">RETIREMENT YEAR</th>
                    <th id="col19">CURRENT STATUS</th>
                    <th id="col20">ASSOCIATED BANK </th>
                    <th id="col21" style="text-align: center;">BANK ACCOUNT NO.</th>
                </tr>
                </thead>

<tbody>

    <?php

if(count($stafflist)>0){
    $status=['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];

    $i=1;
    foreach($stafflist as $staff){
        $ydob = substr($staff->dob,0,4);
        $ryear = $ydob+60;
        $tyear = date("Y-m-d");
        $nowy = substr($tyear,0,4);
        $appy = substr($staff->apdate,0,4);
        $dur = $nowy - $appy;
        $try = substr($staff->trdate,0,4);
        $sdur = $nowy - $try;
     ?>

        <tr>
            <td class="hidden-print"><button id="rmrow" class="btn btn-xs btn-danger">X</button></td>
            <td class="indexcol" id="col1" style="text-align: center;"><?=$i?></td>
            <td id="col2" ><?=strtoupper($staff->fname." ".$staff->lname)?></td>
            <td id="col3" ><?=strtoupper($staff->sex)?></td>
            <td id="col4" style="text-align: center;"  ><?=$staff->stfid?></td>
            <td id="col5" style="text-align: center;" ><?=$staff->dob?></td>
            <td id="col6" style="text-align: center;" ><?=$staff->phone?></td>
            <td id="col7" style="text-align: center;" ><?=$staff->rank_name?></td>
            <td id="col8" style="text-align: center;" ><?=$staff->apdate?></td>
            <td id="col9" style="text-align: center;" ><?=$staff->datepro?></td>
            <td id="col10" style="text-align: center;" ><?=$staff->ssnit?></td>
            <td id="col22"><?=$staff->post_name?></td>
            <td id="col11"  ><?=($staff->regno=='N/A')?'NOT REGISTERED':'REGISTERED'?></td>
            <td id="col12" style="text-align: center;" ><?=$staff->regno?></td>
            <td id="col13"  ><?=$staff->aqual?></td>
            <td id="col14"  ><?=$staff->pqual?></td>
            <td id="col15" style="text-align: center;" ><?=$staff->trdate?></td>
            <td id="col16" style="text-align: center;" ><?=$dur?>Year(s)</td>
            <td id="col17" style="text-align: center;" ><?=$sdur?>Year(s)</td>
            <td id="col18" style="text-align: center;" ><?=$ryear?></td>
            <td id="col19" ><?=$status[$staff->status]?></td>
            <td id="col20" ><?=$staff->bank?></td>
            <td id="col21" style="text-align: center;" ><?=$staff->acno?></td>
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