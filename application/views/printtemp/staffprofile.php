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
				table{
					background-image:url("<?=base_url()?>assets/img/wmark.jpg") !important;			
					
				}

                table, th, tr, td{
                    border:1px solid #000 !important; }

            }
        </style>
    </head>
<body>
<?php
$status=['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];

$ydob = substr($staff->dob,0,4);
$ryear = $ydob+60;
$tyear = date("Y-m-d");
$nowy = substr($tyear,0,4);
$appy = substr($staff->apdate,0,4);
$dur = $nowy - $appy;
$try = substr($staff->trdate,0,4);
$sdur = $nowy - $try;
?>
<div class="container" >
    <button onclick="window.print();" type="button" class="btn btn-primary btn-link hidden-print">PRINT</button>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="border-bottom: 1px solid black; margin: 5px;">
            <h2><u><strong>GHANA EDUCATION SERVICE</strong></u></h2>
            <h5>P.O. BOX 15,WA MUNICIPAL, WA, UPPER WEST REGION</h5>
            <h4><strong>STAFF PROFILE</strong></h4>
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <table  class="table table-responsive table-condensed" style="background-image:url('../../assets/img/wmark.jpg') !important;    background-repeat: no-repeat !important; background-position: center !important; background-size: 25% !important; 
">
                <tr><th>  <center>DEMOGRAPHY</center></th></tr>
                    <th rowspan="7">
                        <center>
                        <img class="img-thumbnail img-responsive" src="../../assets/uploads/<?=($staff->photo)?'photos/'.$staff->photo:'photo.jpg'?>"/>
                        </center>
                    </th>
                </tr>
                <tr>
                    <th>NAME:</th> <td colspan="5"><?=strtoupper($staff->fname." ".$staff->lname)?></td>
                </tr>
                <tr>
                    <th>STAFF ID NO.:</th> <td><?=$staff->stfid?></td>
                    <th>DATE OF BIRTH.:</th> <td><?=$staff->dob?></td>
                    <th>1st. APP. DATE:</th> <td><?=$staff->apdate?></td>
                </tr>
                <tr>
                    <th>LAST PROMOTION DATE:</th> <td><?=$staff->datepro?></td>
                    <th>CURRENT RANK:</th> <td><?=$staff->rank_name?></td>
                    <th>SSNIT NO.:</th> <td><?=$staff->ssnit?></td>
                </tr>
                <tr>
                    <th>SEX:</th> <td><?=$staff->sex?></td>
                    <th>REG. STATUS:</th> <td><?=$staff->regno=='N/A'?'NOT REGISTERED':"REGISTERED"?></td>
                    <th>REGISTERED NO.:</th> <td><?=$staff->regno?></td>
                </tr>
                <tr>
                    <th>ACADEMIC QUALIFICATION:</th> <td><?=strtoupper($staff->aqual)?></td>
                    <th>PROFESSIONAL QUALIFICATION:</th> <td><?=strtoupper($staff->pqual)?></td>
                    <th>LAST TRANS. DATE</th> <td><?=$staff->trdate?></td>
                </tr>
                <tr>
                    <th>DURATION IN SERVICE:</th> <td><?=$dur?>Year(s)</td>
                    <th>DURATION AT CURRENT POST:</th> <td><?=$sdur?>Year(s)</td>
                    <th>RETIREMENT YEAR:</th> <td><?=$ryear?></td>
                </tr>
                <tr>
                    <th>CONTACT NUMBER:</th> <td COLSPAN="2"><?=$staff->phone?></td>
                    <th>ASSOCIATED BANK</th> <td><?=$staff->bank?></td>
                    <th>BANK ACCOUNT NO.:</th> <td><?=$staff->acno?></td>
                </tr>
                <tr>
                    <th>CURRENT STATUS:</th> <td COLSPAN="7"><?=$status[$staff->status]?></td>
                </tr>
            </table>


        </div>
    </div>




<?php

if(count($oinfo)>0){

?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <table class="table table-responsive table-condensed">
                <tr><th>  <center>OTHER INFORMATION</center></th></tr>

                <?php

                foreach($oinfo as $info){
                    ?>
                    <tr>
                        <th>
                            <?=strtoupper($info->olabel)?>:
                        </th>
                        <td>
                            <?=strtoupper($info->ovalue)?>
                        </td>

                    </tr>

                <?php

                }

                ?>




            </table>


        </div>
    </div>
    <?php
}


    if(count($promo)>0) {

        ?>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <table class="table table-responsive table-condensed">
                    <tr>
                        <th>
                            <center>PROMOTION HISTORY</center>
                        </th>
                    </tr>
                    <tr>
                        <th>DATE</th>
                        <th>RANK/GRADE</th>
                    </tr>

                    <?php

                    foreach ($promo as $p) {
                        ?>
                        <tr>
                            <td>
                                <?= $p->dentry ?>
                            </td>
                            <td>
                                <?= strtoupper(str_replace('Promoted to the grade of', '', $p->coment)) ?>
                            </td>

                        </tr>

                        <?php

                    }

                    ?>


                </table>


            </div>
        </div>
        <?php
    }
        if(count($trans)>0){

            ?>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <table class="table table-responsive table-condensed">
                        <tr><th>  <center>TRANSFER HISTORY</center></th></tr>
                        <tr><th>DATE</th><th>POST</th></tr>

                        <?php

                        foreach($trans as  $tran){
                            ?>
                            <tr>
                                <td>
                                    <?=$tran->dentry?>
                                </td>
                                <td>
                                    <?=strtoupper(str_replace('Transferred to','',$tran->coment))?>
                                </td>

                            </tr>

                            <?php

                        }

                        ?>




                    </table>


                </div>
            </div>
            <?php
        }
if(count($statuses)>0){

    ?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <table class="table table-responsive table-condensed">
                <tr><th>  <center>STATUS HISTORY</center></th></tr>
                <tr><th>DATE</th><th>STATUS</th></tr>

                <?php

                foreach($statuses as  $st){
                    ?>
                    <tr>
                        <td>
                            <?=$st->dentry?>
                        </td>
                        <td>
                            <?=strtoupper(str_replace('Status changed to','',$st->coment))?>
                        </td>

                    </tr>

                    <?php

                }

                ?>




            </table>


        </div>
    </div>
    <?php
}
if(count($gcom)>0){

    ?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <table class="table table-responsive table-condensed">
                <tr><th>  <center>GENERAL COMMENTS/ACHIEVEMENTS</center></th></tr>
                <tr><th>DATE</th><th>COMMENT</th></tr>

                <?php

                foreach($gcom as  $com){
                    ?>
                    <tr>
                        <td>
                            <?=$com->dentry?>
                        </td>
                        <td>
                            <?=strtoupper($com->coment)?> <button id="rmcom" class="btn btn-danger pull-right btn-sm hidden-print">Remove</button>
                        </td>

                    </tr>

                    <?php
                }

                ?>

            </table>


        </div>
    </div>

    <div class="row hidden-print">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
    <div class="alert alert-info">
        <strong>NOTE</strong> <br>
        For the sake of the security of your staff, you can remove sensitive information about this staff before printing this document by clicking on the red button on the right side of the general comments/achievements depending on the recipient of this document. This section of the document mostly contain reports about the staff (either good or bad).

    </div>
        </div>
    </div>

    <?php
}
?>






<button onclick="window.print();" type="button" class="btn btn-primary btn-link hidden-print">PRINT</button>


</div>

<script>
    $(document).ready(function(){
        console.log($("th"));
        $("button#rmcom").click(function(){
            $(this).parent().parent().remove();

        });
    });
</script>


</body>
</html>