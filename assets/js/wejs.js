

$(document).ready(function(){
    Waves.init();
    Waves.attach('.tile',['waves-button', 'waves-float']);
    Waves.attach('a',['waves-button']);
    Waves.attach('button',['waves-button']);
    $(".we-search").keyup(function(){
        getstaffinfo(1);

    });

    $("#runres").click(function(){
    if(!$("input#backupfile").val()){
    $("input#backupfile").focus();
    }else{
        var progress = Snarl.addNotification({
            title:"Please Wait...",
            text:"Restoring your backup data",
            icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
            timeout:null
        });
        $(".snarl-notification").addClass('snarl-info');
        $
            .get("./app/restoredb/?file="+$("#backupfile").val(),function(){})
.error(function(){

                Snarl.removeNotification(progress);
                Snarl.addNotification({
                    title:"ERROR",
                    text:"Something went wrong, could not Restore backup",
                    icon:"<i class='fa fa-bug'></i>",
                    timeout:8000
                });
                $(".snarl-notification").addClass('snarl-error');

            })
        .done(function(){
                Snarl.removeNotification(progress);
                Snarl.addNotification({
                    title:"DONE",
                    text:"Backup Data restored successful",
                    icon:"<i class='fa fa-check-circle-o'></i>",
                    timeout:8000
                });
                $(".snarl-notification").addClass('snarl-success');
                window.location="./app#";
            });

    }
 });


    $("div.redrop").dropzone({
        url: "./app/dropbak",
        acceptedFiles: ".zip",
        addRemoveLinks:true,
        dictRemoveFile:"Remove File",
        resizeWidth:"180",
        resizeHeight:"200",
        resizeMethod:"crop",
        removedfile:function(file){
            $.get("./app/rmbak/?file=" +file.name,function(){}).done(function(){
                $("#backupfile").val("");
                var previewElement;
                return (previewElement = file.previewElement)!= null ?
                    (previewElement.parentNode.removeChild(file.previewElement)) :(void 0);});
        },
        maxFiles:1,
        accept:function(file,done){
            $("#backupfile").val(file.name);
            done();
        }
    });

$("#filter_rank").change(function(){

window.location="./app#/managstaff/1";
    getstaffinfo(1);

});
    $("#filter_post").change(function(){$("#filter_rank").change();});
    $("#filter_sex").change(function(){$("#filter_rank").change();});
    $("#filter-status").change(function(){$("#filter_rank").change();});


    $("#dpicker1,#dpicker2,#dpicker3,#dpicker4,#dpicker5").datepicker({
        changeMonth:true,
        changeYear:true,
        showAnim:"slideDown",
        dateFormat:"yy-m-d",
        currentDate:true,

    });


    $(".filter-btn").click(function(){
$(".staff-filter").fadeToggle(200);

    });
    $("a").tooltip();
        $("div.dropzone").dropzone(
            { url: "./app/dropphoto",
                acceptedFiles: "image/*",
                addRemoveLinks:true,
                dictDefaultMessage:"drop photo here or click to upload",
                dictRemoveFile:"Remove photo",
                resizeWidth:"180",
                resizeHeight:"200",
                resizeMethod:"crop",
                capture:null,
                removedfile:function(file){
                    $.get("./app/rmphoto/?file=" +file.name,function(){}).done(function(){
                        $("#photo").val("");
                        var previewElement;
                        return (previewElement = file.previewElement)!= null ?
                            (previewElement.parentNode.removeChild(file.previewElement)) :(void 0);});
                },
                maxFiles:1,
                accept:function(file,done){
                    $("#photo").val(file.name);
                    done();
                }
            });


    $("#stfid").focusout(function(){
        var stfid_value = $("#stfid").val();
        if(stfid_value.length>0){
            $.getJSON("./app/getstfbyid/"+stfid_value,function(data){
         if(data.length>0){
             $("#svstaff").disable = true;

             var mg = data[0].photo?'photos/'+data[0].photo:'photo.jpg';
             Snarl.addNotification({
                 title:"STAFF ID EXIST",
                 text:"This staff id was entered for "+data[0].fname+" "+data[0].lname,
                 icon:"<img class='img-circle img-responsive' src='./assets/uploads/" + mg +"' >",
                 timeout:8000
             });
             $(".snarl-notification").addClass('snarl-error');
             $("#stfid").focus();

        }

            });
        }

    });

    $("#regstaff").submit(function(){

var stfid_value=$("#stfid").val();
        $.getJSON("./app/getstfbyid/"+stfid_value,function(data){
            if(data.length>0){
                $("#svstaff").disable = true;

                var mg = data[0].photo?'photos/'+data[0].photo:'photo.jpg';
                Snarl.addNotification({
                    title:"STAFF ID EXIST",
                    text:"This staff id was entered for "+data[0].fname+" "+data[0].lname,
                    icon:"<img class='img-circle img-responsive' src='./assets/uploads/" + mg +"' >",
                    timeout:8000
                });
                $(".snarl-notification").addClass('snarl-error');
                $("#stfid").focus();

              return false;

            }

        });



        var progress = Snarl.addNotification({
            title:"Please Wait...",
            text:"Saving Staff info.",
            icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
            timeout:null
        });
        $(".snarl-notification").addClass('snarl-info');

        var data = $("#regstaff :input").serializeArray();

        $
            .post('./app/regstaff',data,function(){})
            .error(function(){
                Snarl.removeNotification(progress);
                Snarl.addNotification({
                    title:"ERROR",
                    text:"Something went wrong, could not save staff",
                    icon:"<i class='fa fa-bug'></i>",
                    timeout:8000
                });
                $(".snarl-notification").addClass('snarl-error');
            })
            .done(function(){
                $("#resetbtn").click();
                $(".tmprow").remove();
                Snarl.removeNotification(progress);
                Snarl.addNotification({
                    title:"SAVED",
                    text:"Staff Saved successfully",
                    icon:"<i class='fa fa-check-circle-o'></i>",
                    timeout:5000
                });
                $(".snarl-notification").addClass('snarl-success');
            });
        return false;
    });
//-----------------------------start of ui router-----------------------------------------------
    $(window).on('hashchange',function(e){
        var temptag = window.location.hash;
        var claentag = temptag.replace('#/','');
        var parameter;
        if(claentag.length>10){
         parameter = claentag.replace('managstaff/','');
          var realtag = claentag.substr(0,10);
            var tag = {
                name: realtag
            };
        }else {
            var tag = {
                name: window.location.hash.replace('#/', '')
            };
        }


        if(tag.name.length>0){
            localStorage.viewid = '#'+tag.name;
            if(tag.name=='managstaff'){
                window[tag.name](localStorage.viewid = '#' + tag.name,parameter);
            }else {
                window[tag.name](localStorage.viewid = '#' + tag.name);
            }
            $(".start-menu").effect('drop',{mode:'hide',direction:'up'},500,function(){
                var navtitle = $(localStorage.viewid).attr('data-title');
                $('.title-area').html(navtitle);
                $(localStorage.viewid).effect('drop',{mode:'show',direction:'down'},500);
            });
            $(".cntrl-btn-area").fadeIn(100);
            if(tag.name!='regisstaff'){
                $(".add-btn").fadeIn(100);
            }

            if(tag.name=="managstaff"){
                $(".add-btn").fadeOut(100);
                $(".filter-btn").fadeIn(100);
                $(".search-cont").fadeIn(100);
            }

        }else{

            $(".title-area").html("MAIN MENU");
                $('.we-view').effect('drop', {mode: 'hide', direction: 'down'}, 500, function () {
                    $(".start-menu").effect('drop', {mode: 'show', direction: 'up'}, 500);

                    $(".cntrl-btn-area").fadeOut(100);
                    $(".add-btn").fadeOut(100);
                    $(".filter-btn").fadeOut(100);
                    $(".search-cont").fadeOut(100);
                });



        }
    }).trigger('hashchange');

    //--------------------------------------------end of router-----------------------------------------------


$("#regstat").change(function(){
    if($(this).val()==1){

        $("#regno").attr('readonly',false).val("");


    }else{
        $("#regno").attr('readonly',true).val("N/A");

    }
});

    //-----------start of add function-----------------------------------------------------------------------

    $('.add-btn').click(function(){
        var tag ={
            name:window.location.hash.replace('#/','')
        };

        if(tag.name == 'mngcircuit') {

        var elemnt = '<div class="row">';
        elemnt += '<form id="svcircuit">';
        elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">'
        elemnt += '<label class="control-label">Circuit Name</label>';
        elemnt += '<input id="circuit_name" type="text" placeholder="Name of circuit" required class="form-control"/>'
        elemnt += '</div>';
        elemnt += '</form>';
        elemnt += '</div>';
            BootstrapDialog.show({
                title:"Add A new Circuit",
                message:elemnt,
                buttons:[{label:'SAVE',cssClass:'btn-good',id:'svcbtn',action:function(d){
                    if($("#circuit_name").val().length<1){
                        $("#circuit_name").focus();
                    }else{

                        var circuit = $("#circuit_name").val();
                        d.close();

                        var progress = Snarl.addNotification({
                            title:"Please Wait...",
                            text:"Saving Circuit",
                            icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                            timeout:null
                        });
                        $(".snarl-notification").addClass('snarl-info');

                        var data={name:circuit};

                        $
                            .post('./app/svcircuit/',data,function(){})
                            .error(function(){

                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title:"ERROR",
                                    text:"Something went wrong, could not save circuit",
                                    icon:"<i class='fa fa-bug'></i>",
                                    timeout:8000
                                });
                                $(".snarl-notification").addClass('snarl-error');

                            })
                            .done(function(){

                                        refresh();
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title:"SAVED",
                                    text:"Circuit saved successfully",
                                    icon:"<i class='fa fa-check-circle-o'></i>",
                                    timeout:2000
                                });
                                $(".snarl-notification").addClass('snarl-success');
                            });




                    }


                }}]});

            $("#svcircuit").submit(function(){
            $("button#svcbtn").click();

                return false;
            });

        }else if(tag.name == 'managepost'){
            var circuits;
            $
                .getJSON("./app/getcircuitjson",function(data){
                    circuits = data;
            var elemnt = '<div class="row">';
            elemnt += '<form id="svpost">';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">'
            elemnt += '<label class="control-label">Post Name</label>';
            elemnt += '<input id="post_name" type="text" placeholder="Name of post" required class="form-control"/>'
            elemnt += '</div>';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
            elemnt += '<label class="control-label">Circuit</label>';
            elemnt += '<select id="circuit" required class="form-control">';
                    for(var i =0;i<circuits.length;i++){
                        elemnt += '<option value="'+ circuits[i].id +'">'+circuits[i].circuit_name+'</option>';
                    }
            elemnt += '</select>';
            elemnt += '</div>';
            elemnt += '</form>';
            elemnt += '</div>';
            BootstrapDialog.show({
                title:"Add A new Post",
                message:elemnt,
                buttons:[{label:'SAVE',cssClass:'btn-good',id:'svpbtn',action:function(d){
                    if($("#post_name").val().length<1){
                        $("#post_name").focus();
                    }else{
                        var post = $("#post_name").val();
                        var circuit = $("#circuit").val();
                        d.close();
                        var progress = Snarl.addNotification({
                            title:"Please Wait...",
                            text:"Saving Post",
                            icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                            timeout:null
                        });
                        $(".snarl-notification").addClass('snarl-info');

                        var data={name:post,circuit_id:circuit};

                        $
                            .post('./app/svpost/',data,function(){})
                            .error(function(){
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title:"ERROR",
                                    text:"Something went wrong, could save Post",
                                    icon:"<i class='fa fa-bug'></i>",
                                    timeout:8000
                                });
                                $(".snarl-notification").addClass('snarl-error');
                            })
                            .done(function(){
                                refresh();
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title:"SAVED",
                                    text:"Post saved successfully",
                                    icon:"<i class='fa fa-check-circle-o'></i>",
                                    timeout:2000
                                });
                                $(".snarl-notification").addClass('snarl-success');
                            });
                    }
                }}]});

                });

            $("#svpost").submit(function(){
                $("button#svpbtn").click();
                return false;
            });
        }else if(tag.name=='managerank'){
            var elemnt = '<div class="row">';
            elemnt += '<form id="svrank">';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">'
            elemnt += '<label class="control-label">Rank Description</label>';
            elemnt += '<input id="rank_name" type="text" placeholder="Enter rank" required class="form-control"/>'
            elemnt += '</div>';
            elemnt += '</form>';
            elemnt += '</div>';
            BootstrapDialog.show({
                title:"Add A new Rank",
                message:elemnt,
                buttons:[{label:'SAVE',cssClass:'btn-good',id:'svcbtn',action:function(d){
                    if($("#rank_name").val().length<1){
                        $("#rank_name").focus();
                    }else{
                        var rank = $("#rank_name").val();
                        d.close();
                        var progress = Snarl.addNotification({
                            title:"Please Wait...",
                            text:"Saving Rank",
                            icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
                            timeout:null
                        });
                        $(".snarl-notification").addClass('snarl-info');

                        var data={name:rank};

                        $
                            .post('./app/svrank/',data,function(){})
                            .error(function(){
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title:"ERROR",
                                    text:"Something went wrong, could save Rank",
                                    icon:"<i class='fa fa-bug'></i>",
                                    timeout:8000
                                });
                                $(".snarl-notification").addClass('snarl-error');

                            })
                            .done(function(){
                                refresh();
                                Snarl.removeNotification(progress);
                                Snarl.addNotification({
                                    title:"SAVED",
                                    text:"Rank saved successfully",
                                    icon:"<i class='fa fa-check-circle-o'></i>",
                                    timeout:2000
                                });
                                $(".snarl-notification").addClass('snarl-success');
                            });
                    }
                }}]});
            $("#svrank").submit(function(){
                $("button#svrbtn").click();
                return false;
            });




    }else if(tag.name=='manageacc'){
            var elemnt = '<div class="row">';
            elemnt += '<form id="cracc">';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">'
            elemnt += '<label class="control-label">Login Name</label>';
            elemnt += '<input id="uname" name="uname" type="text" placeholder="Enter new user login name" required class="form-control"/>';
            elemnt += '</div>';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">';
            elemnt += '<label class="control-label">Password</label>';
            elemnt += '<input id="upass" name="upass" type="password" placeholder="Enter new user password" required class="form-control"/>';
            elemnt += '</div>';
            elemnt += '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">'
            elemnt += '<label class="control-label">Confirm Password</label>';
            elemnt += '<input id="cpass" name="cpass" type="password" placeholder="Confirm new user password" required class="form-control"/>';
            elemnt += '</div>';
            elemnt += '</form>';
            elemnt += '</div>';
            BootstrapDialog.show({
                title:"Add A new Login Account",
                message:elemnt,
                buttons:[{label:'CREATE ACCOUNT',cssClass:'btn-good',id:'svcbtn',action:function(d){
                    if(!$("#uname").val()){
                        $("#uname").focus();
                    }else if(!$("#upass").val()){
                        $("#upass").focus();
                    }else if(!$("#cpass").val()){
                        $("#cpass").focus();
                    }else if($("#upass").val() != $("#cpass").val()){
                              Snarl.addNotification({
                                    title: "PASSWORDS MISMATCH",
                                    text: "The passwords you entered do not match",
                                    icon: "<i class='fa fa-bug'></i>",
                                    timeout: 5000
                                });
                                $(".snarl-notification").addClass('snarl-error');
                            }else {
                            d.close();
                            var progress = Snarl.addNotification({
                                title: "Please Wait...",
                                text: "Creating user account",
                                icon: "<i class='fa fa-circle-o-notch fa-spin'></i>",
                                timeout: null
                            });
                            $(".snarl-notification").addClass('snarl-info');


                        var data = {
                            uname:$("#uname").val(),upass:$("#upass").val()};


                            $
                                .post('./app/craccount/', data, function(){
                                })
                                .error(function () {
                                    Snarl.removeNotification(progress);
                                    Snarl.addNotification({
                                        title: "ERROR",
                                        text: "Something went wrong, could create user account",
                                        icon: "<i class='fa fa-bug'></i>",
                                        timeout: 8000
                                    });
                                    $(".snarl-notification").addClass('snarl-error');
                                })
                                .done(function () {
                                    refresh();
                                    Snarl.removeNotification(progress);
                                    Snarl.addNotification({
                                        title: "SAVED",
                                        text: "User account created successfully",
                                        icon: "<i class='fa fa-check-circle-o'></i>",
                                        timeout: 2000
                                    });
                                    $(".snarl-notification").addClass('snarl-success');
                                });
                        }



                }}]});




        }





    });
    //--------------------------------------------------end of add function--------------------------------------








});

//----------------------------------------content functions---------------------------------------------------------
function showhelp(){
    BootstrapDialog.show({
        title:"Tech. Assistance",
        message:"For help on anything concernig this system please call:<strong>0242044493/0503712979</strong> or Email:<strong>wideempire2016@gmail.com"
    });
}

function showinfo(){
    BootstrapDialog.show({
        title:"Tech. Assistance",
        message:"<h4>POWERED BY WIDE EMPIRE SOFTWARES</h4><U>SYSTEM FEATUERS</U><ol><li>Accept Staff Details/Info</li><li>Track staff promotions</li><li>Track staff transfers</li><li>Track staff Status</li><li>Accept Staff's Files as attachment</li><li>Accept general comments about staff. eg. Awards,complaints , etc</li><li>Generate and print staff's detail profile</li><li>Filter and print staff list</li><li>And More...</li></ol>"
    });
}
function backup(){
    BootstrapDialog.show({
       title:'Backup',
        message:'This will gather all current staff records that include staff info,photos,and attached files. <strong>NOTE: THIS PROCESS MIGHT TAKE SOME TIME DEPENDING ON THE VOLUME OF YOUR CURRENT STAFF DATA</strong>',
        buttons:[{label:'Run Backup',cssClass:'btn-good',action:function(d){d.close();window.location="./app/backupdb";}}]


    });

}


function restorebak(viewid){

$("#backupfile").val("");

}

function printglist(){

    var inp = "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Document heading</label>"
    inp+="<textarea id='doctitle' placeholder='define a custom title for this document' class='form-control'></textarea>"
    inp+="</div></div>";

    BootstrapDialog.show({
        title:"Print General Staff List",
        message:inp,
        buttons:[{label:"View & Print",cssClass:"btn-good",action:function(d){
            d.close();
            window.open("./printer/genlist/?title="+$("#doctitle").val(),"General Staff List","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");
        }}]
    });
}


function printstatlist(){
    var stat_array = ['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];
    $.getJSON("./app/getstatdatejson/",function(dt){
        var inp = "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
        inp+="<label class='control-label'>Year</label>";
        inp+="<select class='form-control' id='year'>";
        var j =0;
        for(var x =0;x<dt.length;x++) {
           j++;
            if(j<dt.length){
                var ls = dt[x].dentry.substr(0,4);
                var gr = dt[j].dentry.substr(0,4);
           if (!(ls == gr)) {

            inp += "<option value='"+ ls +"'>" +ls+ "</option>";

            }
            }else{

                inp += "<option value='"+ dt[x].dentry.substr(0,4) +"'>" +dt[x].dentry.substr(0,4)+ "</option>";

            }
        }
        inp+="</select></div></div>";
    inp += "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Select Status</label>";
    inp+="<select class='form-control' id='stat'>";
    for(var i =0;i<stat_array.length;i++){
        inp+="<option   value='"+i+"'>"+stat_array[i]+"</option>"
    }
    inp+="</select></div></div>";
    inp += "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Document heading</label>"
    inp+="<textarea id='doctitle' placeholder='define a custom title for this document' class='form-control'></textarea>"
    inp+="</div></div>";
    BootstrapDialog.show({
        title:"Print General Staff List",
        message:inp,
        buttons:[{label:"View & Print",cssClass:"btn-good",action:function(d){
            d.close();
            window.open("./printer/statlist/?title="+$("#doctitle").val()+"&status="+$("#stat").val()+"&year="+$("#year").val(),"General Staff List","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");
        }}]
    });
    });
}

function print_list(){
    var inp = "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Document heading</label>"
    inp+="<textarea id='doctitle' placeholder='define a custom title for this document' class='form-control'></textarea>"
    inp+="</div></div>";
    BootstrapDialog.show({
        title:"Print Filtered List",
        message:inp,
        buttons:[{label:"View & Print",cssClass:"btn-good",action:function(d){
            d.close();
            window.open("./printer/stafflist/?status="+$("#filter-status").val()+"&rank="+$("#filter_rank").val()+"&post="+$("#filter_post").val()+"&sex="+$("#filter_sex").val()+"&title="+$("#doctitle").val(),"Staff List","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");


        }}]


    });



}


function showdet(detid){

$(detid).slideToggle(100);
}


function printfl(){
    var inp = "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Document heading</label>"
    inp+="<textarea id='doctitle' placeholder='define a custom title for this document' class='form-control'></textarea>"
    inp+="</div></div>";
    BootstrapDialog.show({
        title:"Print Staff List with photos",
        message:inp,
        buttons:[{label:"View & Print",cssClass:"btn-good",action:function(d){
            d.close();
            window.open("./printer/facelist/?title="+$("#doctitle").val(),"Face booklet","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");
        }}]
    });

}

function printcircuit(){
    $.getJSON("./app/getcjson/",function(c){
        var inp = "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
        inp+="<label class='control-label'>Circuit</label>";
        inp+="<select class='form-control' id='circuit'>";
        for(var x =0;x<c.length;x++) {
                inp += "<option value='"+ c[x].id+"'>" +c[x].circuit_name+ "</option>";
        }
        inp += "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
        inp+="<label class='control-label'>Document heading</label>"
        inp+="<textarea id='doctitle' placeholder='define a custom title for this document' class='form-control'></textarea>"
        inp+="</div></div>";
        BootstrapDialog.show({
            title:"Print List Of Staff Under Circuit ",
            message:inp,
            buttons:[{label:"View & Print",cssClass:"btn-good",action:function(d){
                d.close();
                window.open("./printer/circuitlist/?title="+$("#doctitle").val()+"&circuit="+$("#circuit").val(),"General Staff List","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");
            }}]
        });
    });



}
function printreg(){

    var inp = "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Registration Status</label>"
    inp+="<select id='regstatUS' class='form-control'>";
    inp+="<option value='0'>Registered/Professional</option>";
    inp+="<option value='1'>Not Registered/Unprofessional</option>";
    inp+="</select>";
    inp+="</div></div>";
    inp += "<div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
    inp+="<label class='control-label'>Document heading</label>"
    inp+="<textarea id='doctitle' placeholder='define a custom title for this document' class='form-control'></textarea>";
    inp+="</div></div>";
    BootstrapDialog.show({
        title:"Print Staff List Under their registration status",
        message:inp,
        buttons:[{label:"View & Print",cssClass:"btn-good",action:function(d){
            d.close();
            window.open("./printer/ststauslist/?title="+$("#doctitle").val()+"&stat="+$("#regstatUS").val(),"Face booklet","outerHeight=800px,outerWidth=800px,innerHeight=750px,innerWidth=750px,menubar=yes,scrollbars=yes");
        }}]
    });

}

function addfields(){
var temprow = '<div class="row tmprow">';
    temprow+='<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">';
    temprow+='<label class="control-label">Input Label</label>';
    temprow+='<input style="background-color: lightgray;" type="text" class="form-control" name="olabel[]" placeholder="Enter a label that best describes your input"/>';
    temprow+='</div>';
    temprow+='<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">';
    temprow+='<label class="control-label">Input Value</label>';
    temprow+='<input type="text" class="form-control" name="oinput[]" placeholder="Enter a value that corresponds with the label in the left text box"/>';
    temprow+='</div>';
    temprow+='<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">';
    temprow+='<br/>';
    temprow+='<a id="rmorow" style="margin-top: 3px;" class="btn btn-link" onclick="rmorow($(this));return false;" href="#" title="Remove this input row" data-toggle="tooltip"><i class="fa fa-minus-square-o fa-2x text-danger"></i></a>';
    temprow+='</div>';
    temprow+='</div>';
$(".orow").append(temprow);

}
function rmorow(e){
  e.parent().parent().remove();
}


function logout(){
BootstrapDialog.show({
    title:"Confirm Log out",
    message:"Are you sure you want to log out of the system ?",
    buttons:[{label:"LOG OUT",cssClass:'btn-bad',action:function(){

        $.get("./app/logout",function(){

           window.location="../hr";
        });


    }}]

});




}


function getstaffinfo(page){

    var progress = Snarl.addNotification({
        title:"Please Wait...",
        text:"Geting Staff...",
        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
        timeout:null
    });
    $(".snarl-notification").addClass('snarl-info');
    var rank = ($("#filter_rank").val()==null)?"":$("#filter_rank").val();
    var post = ($("#filter_post").val()==null)?"":$("#filter_post").val();

    $
        .get("./app/getstaff/?page="+page+"&rank="+rank+"&post="+post+"&sex="+$("#filter_sex").val()+"&status="+$("#filter-status").val()+"&q="+$(".we-search").val(), function(){

        })
        .done(function(data){
            Snarl.removeNotification(progress);
            console.log($(".staff-cont").children());
            $(".staff-cont").html(data);
        })
        .error(function(){
            Snarl.removeNotification(progress);
            Snarl.addNotification({
                title:"ERROR",
                text:"Something went wrong, could not fetch staff list",
                icon:"<i class='fa fa-bug'></i>",
                timeout:8000
            });
            $(".snarl-notification").addClass('snarl-error');
        });

}



function manageacc(viewid){
    var progress= Snarl.addNotification({
        title:"Loading...",
        text:"Getting list of Login Accounts",
        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
        timeout:null
    });
    $(".snarl-notification").addClass('snarl-info');

    $
        .get("./app/getaccounts",function(){})

        .error(function(){
            Snarl.removeNotification(progress);
            Snarl.addNotification({
                title:"ERROR",
                text:"Something went wrong, could not load data",
                icon:"<i class='fa fa-bug'></i>",
                timeout:8000
            });
            $(".snarl-notification").addClass('snarl-error');
        })
        .done(function(data){
            Snarl.removeNotification(progress);
            $(viewid).html(data);

        });
}


function managstaff(viewid,page){

    $
        .getJSON('./app/getrjson',function(data){
            var ele = "";
            ele+='<option value="" selected>All</option>';
            if(data.length>0){


                for(var i=0;i<data.length;i++){
                    ele+='<option value="'+data[i].id+'">'+data[i].rank_name+'</option>';
                }

                $("#filter_rank").html(ele);
            }
        });

    $
        .getJSON('./app/getpjson/',function(data){
            var ele = "<option value=''>All</option>";
            for(var i=0;i<data.length;i++){
                ele+='<option value="'+data[i].id+'">'+data[i].post_name+'</option>';
            }
            $("#filter_post").html(ele);
        });



    getstaffinfo(page);

}






function regisstaff(viewid){
$
    .getJSON('./app/getrjson',function(data){
if(data.length>0){
 var ele = "";

    for(var i=0;i<data.length;i++){
     ele+='<option value="'+data[i].id+'">'+data[i].rank_name+'</option>';
    }

    $("#selrank").html(ele);
}
    });


    $
        .getJSON('./app/getcircuitjson',function(data){
            if(data.length>0){
                var ele = "<option value='0'>None</option>";
                for(var i=0;i<data.length;i++){
                    ele+='<option value="'+data[i].id+'">'+data[i].circuit_name+'</option>';
                }
                $("#selcircuit").html(ele);
            }
        });

    $("#selcircuit").change(function(e){
       if($("#selcircuit").val().length>0){
           $("#selpost").html("");
            var c = $("#selcircuit").val();
           $
               .getJSON('./app/getpbyidjson/'+c,function(data){
                       var ele = "";
                       for(var i=0;i<data.length;i++){
                           ele+='<option value="'+data[i].id+'">'+data[i].post_name+'</option>';
                       }
                       $("#selpost").html(ele);
               });
       }
    });
}



function refresh(){
    var temptag = window.location.hash;
    var claentag = temptag.replace('#/','');
    var parameter;
    if(claentag.length>10){
        parameter = claentag.replace('managstaff/','');
        var realtag = claentag.substr(0,10);
        var tag = {
            name: realtag
        };
    }else {
        var tag = {
            name: window.location.hash.replace('#/', '')
        };
    }
    if(tag.name=='managstaff'){
        window[tag.name](localStorage.viewid = '#' + tag.name,parameter);
    }else {
        window[tag.name](localStorage.viewid = '#' + tag.name);
    }

}



    function mngcircuit(viewid){
   var progress= Snarl.addNotification({
        title:"Loading...",
        text:"Getting list of Circuits",
        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
        timeout:null
    });
    $(".snarl-notification").addClass('snarl-info');

    $
        .get("./app/getcircuits",function(){})

        .error(function(){
        Snarl.removeNotification(progress);
            Snarl.addNotification({
                title:"ERROR",
                text:"Something went wrong, could not load data",
                icon:"<i class='fa fa-bug'></i>",
                timeout:8000
            });
            $(".snarl-notification").addClass('snarl-error');


        })
        .done(function(data){
            Snarl.removeNotification(progress);
            $(viewid).html(data);

        });
}





function managepost(viewid){
var progress = Snarl.addNotification({
   title:"Loading...",
    text:"Getting list of Posts",
    icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
    timeout:null
});
    $(".snarl-notification").addClass('snarl-info');


    $

        .get("./app/getpost",function(){})


        .error(function(){
            Snarl.removeNotification(progress);
            Snarl.addNotification({
                title:"ERROR",
                text:"Something went wrong, could not load data",
                icon:"<i class='fa fa-bug'></i>",
                timeout:8000
            });
            $(".snarl-notification").addClass('snarl-error');


        })
        .done(function(data){
            Snarl.removeNotification(progress);
            $(viewid).html(data);

        });



}




function managerank(viewid){

    var progress = Snarl.addNotification({
        title:"Loading...",
        text:"Getting list of Ranks",
        icon:"<i class='fa fa-circle-o-notch fa-spin'></i>",
        timeout:null
    });
    $(".snarl-notification").addClass('snarl-info');


    $

        .get("./app/getranks",function(){})


        .error(function(){
            Snarl.removeNotification(progress);
            Snarl.addNotification({
                title:"ERROR",
                text:"Something went wrong, could not load data",
                icon:"<i class='fa fa-bug'></i>",
                timeout:8000
            });
            $(".snarl-notification").addClass('snarl-error');


        })
        .done(function(data){
            Snarl.removeNotification(progress);
            $(viewid).html(data);

        });



}

//-----------------------------------------------------------end of content functions----------------------------------




