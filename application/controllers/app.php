<?php

/**
 * Created by PhpStorm.
 * User: yusif
 * Date: 8/17/2017
 * Time: 2:06 PM
 */
class app extends CI_Controller
{
    var $stfid ='';

    public function index(){
        $this->load->view("temp/header");
        $this->load->view("start");
        $this->load->view("views");
        $this->load->view("temp/footer");
    }

    public function getcircuits(){
        $circuits = $this->db->query("select * from circuit order by circuit_name ASC")->result();
       $data['circuits']=$circuits;
        $this->load->view("circuit_list",$data);
    }

    public function getpost(){
    $posts = $this->db->query("select post.id,circuit.id as c_id,post_name,circuit.circuit_name
    from post,circuit where circuit.id=post.circuit order by post_name ASC ")->result();
    $data['posts'] =$posts;
        $this->load->view('post_list',$data);
    }


    public function getranks(){

        $ranks = $this->db->query("select * from ranks")->result();
        $data['ranks']=$ranks;
        $this->load->view('rank_list',$data);
    }


    public function delcircuit($id){
    $this->db->query("delete from circuit where id='$id'");
    }
       public function delpost($id){
        $this->db->query("delete from post where id='$id'");
       }


    public function delrank($id){
        $this->db->query("delete from ranks where id='$id'");
    }


    public function svcircuit(){
    $cname = $this->db->escape($this->input->post('name'));
    $this->db->query("insert into circuit(circuit_name) VALUES ($cname)");
}


    public function getcircuitjson(){
        $circuits = $this->db->query("select * from circuit order by circuit_name ASC")->result();
        echo(json_encode($circuits));
    }


    public function getcircjson($id){
        $circuits = $this->db->query("select * from circuit WHERE id = '$id'")->result();
        echo(json_encode($circuits));
    }


    public function svpost(){
    $cname = $this->input->post('circuit_id');
    $post = $this->db->escape($this->input->post('name'));
    $this->db->query("insert into post(post_name,circuit) VALUES ($post,'$cname')");
}


    public function svrank(){
        $rname = $this->db->escape($this->input->post('name'));
        $this->db->query("insert into ranks(rank_name) VALUES ($rname)");
    }

    Public function upcircuit(){
    $c_id = $this->input->post('id');
    $c_name = $this->db->escape($this->input->post('name'));
    $this->db->query("update circuit set circuit_name = $c_name WHERE id ='$c_id'");
}


    public function uppost(){
        $p_id = $this->input->post('pid');
        $p_name = $this->db->escape($this->input->post('name'));
        $c_id = $this->input->post('circuit_id');
        $this->db->query("update post set post_name = $p_name,circuit='$c_id' WHERE id ='$p_id'");

    }



public function getrankjson($id){
    $rank = $this->db->query("select * from ranks where id = '$id'")->result();
    echo(json_encode($rank));

}
    Public function uprank(){
        $id = $this->input->post('id');
        $rname = $this->db->escape($this->input->post('name'));
        $this->db->query("update ranks set rank_name = $rname where id = '$id'");
    }

    public function getrjson(){
        $rnks = $this->db->query("select * from ranks")->result();
        echo(json_encode($rnks));
    }
    public function getpbyidjson($id){
if($id!=0) {
    $p = $this->db->query("select * from post where circuit = '$id'")->result();
    echo(json_encode($p));

}
    }
    public function getpjson(){

    $p = $this->db->query("select * from post")->result();
    echo(json_encode($p));


    }



    public function dropphoto(){
        if(!empty($_FILES)){
         $config['upload_path']="./assets/uploads/photos";
            $config["allowed_types"]="gif|jpg|png";
            $this->load->library("upload",$config);
            if(!$this->upload->do_upload('file')){
    echo"We could not upload your photo, pleas check your file type";
    }}
    }
   public function dropbak(){
        if(!empty($_FILES)){
         $config['upload_path']="./assets/";
            $config["allowed_types"]="*";
            $this->load->library("upload",$config);
            if(!$this->upload->do_upload('file')){
    echo"We could not upload your photo, pleas check your file type";
    }}
    }


    public function rmphoto(){
        $p = $this->input->get('file');
        unlink('./assets/uploads/photos/'.$p);
    }
    public function rmbak(){
        $p = $this->input->get('file');
        unlink('./assets/'.$p);
    }

    public function rmfile(){
        $p = $this->input->get('file');
        $stfid = $this->input->get('stfid');
        unlink('./assets/uploads/'.$stfid.'/'.$p);
    }


    public function getstfbyid($stfid){

        $staff = $this->db->query("select * from staff where stfid = '$stfid'")->result();
        echo(json_encode($staff));
    }


    public function regstaff(){
        $photo = $this->input->post("photo");
        $stfid = $this->input->post('stfid');
        mkdir("./assets/uploads/".$stfid,0777,true);
        $photo_path = "";
        if($photo){
            $exten= substr($photo,-4,4);
            copy('./assets/uploads/photos/'.$photo ,'./assets/uploads/photos/'.$stfid.$exten);
            $photo_path = $stfid.$exten;
        }
        $stfdata= array(
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'stfid' => $this->input->post('stfid'),
      'sex' => $this->input->post('sex'),
      'dob' => $this->input->post("dob"),
      'rank' => $this->input->post("rank"),
      'post' => $this->input->post("post"),
      'aqual' => $this->input->post('aqual'),
      'pqual' => $this->input->post('pqual'),
      'apdate' => $this->input->post('apdate'),
      'phone' => $this->input->post('cont'),
      'ssnit' => $this->input->post('ssnitno'),
      'regno' => $this->input->post('regno'),
      'cshs' => $this->input->post('cshs'),
      'ccol' => $this->input->post('ccol'),
      'datepro' => $this->input->post("datepro"),
      'bank' => $this->input->post('bank'),
      'acno' => $this->input->post('acno'),
      'trdate' => $this->input->post('trdate'),
      'photo' => $photo_path,
      'status'=>0
        );
        $olabels = $this->input->post('olabel[]');
        $ovalues = $this->input->post('oinput[]');
        if(count($olabels)>0){
            for($i=0;$i<count($olabels); $i++){
                if($olabels[$i] && $ovalues[$i]){
                $this->db->insert('oinfo',$data=array('stfid'=>$stfid,
                                            'olabel'=>$olabels[$i],
                                            'ovalue'=>$ovalues[$i]
                                                ));

            }}}

        $this->db->set($stfdata);
        $rid=$this->db->insert('staff');
}


    public function getstaff(){
     $page = $this->input->get('page');
     $rank= $this->input->get('rank');
     $post = $this->input->get('post');
     $sex = $this->input->get('sex');
     $status = $this->input->get('status');
        $q = $this->input->get('q');
     $per_page = 50;
    $page_query = $this->db->query("select count(*) as staff_count from staff where sex like '$sex%' and rank like '%$rank%' and post like '%$post%' and staff.status LIKE '%$status%' and(fname LIKE '%$q%' or lname like '%$q%' or staff.stfid LIKE '%$q%') ")->result()[0]->staff_count;
    $pages = ceil($page_query/$per_page);
    $page = ( isset($_GET['page'])) ? (int) $_GET['page']:1;
    $start = ($page-1) * $per_page;
    $staff_list= $this->db->query("select staff.status, staff.post as pid, staff.rank as rid, staff.id, fname,lname,sex,stfid,dob,post.post_name,ranks.rank_name,aqual,pqual,apdate,datepro,trdate,phone,ssnit,regno,cshs,ccol,datecrank,bank,acno,photo
    from staff,ranks,post where staff.rank=ranks.id and staff.post=post.id and staff.rank like'%$rank%' and staff.post like '%$post%' and staff.sex LIKE '$sex%' and staff.status LIKE '%$status%' and (fname LIKE '%$q%' OR lname like '%$q%' or staff.stfid LIKE '%$q%')  ORDER by staff.fname ASC,staff.lname ASC limit ".$start.",".$per_page)->result();
        $data['staff_list'] = $staff_list;
        $data['q'] =$q;
        $data['page'] =$page;
        $data['pages'] =$pages;
    $this->load->view("staff_list",$data);
    }
    public function staffcomm($stfid){
        $comms = $this->db->query("select * from comments where stfid = '$stfid' order by dentry ASC ")->result();
        $staff = $this->db->query("select * from staff where stfid = '$stfid'")->result();
        $data['comms'] =$comms;
        $data['stfid'] = $stfid;
        $data['staff'] = $staff;
        $this->load->view("comtemp",$data);
    }


    public function svcomm(){
        $stfid=$this->input->post('sid');
        $comdate = $this->input->post('commdate');
        $comm = $this->db->escape($this->input->post('comm'));
        $this->db->query("insert into comments(stfid,coment,dentry) VALUES('$stfid',$comm,'$comdate') ");
    }


    Public function getcmjson($stfid){
        $comms = $this->db->query("select * from comments where stfid = '$stfid' order by dentry DESC")->result();
        echo(json_encode($comms));
    }

public function delcom($id){
    $this->db->query("delete from comments where id = '$id'");
}

    Public function addinput(){
        $stfid = $this->input->post("instfid");
        $inlabel = $this->db->escape($this->input->post("inlabel"));
        $invalue = $this->db->escape($this->input->post("invalue"));
        $this->db->query("insert into oinfo(stfid,olabel,ovalue) VALUES ('$stfid',$inlabel,$invalue)");
    }

    public function delstaff($id){
        $this->db->query("delete from staff where id ='$id'");

    }

    public function promstaff(){
        $id = $this->input->post("id");
        $datepro = $this->input->post("datepro");
        $rank = $this->input->post("newrank");
        $this->db->query("update staff set datepro = '$datepro',rank='$rank' where stfid = '$id'");
        $ranknema = $this->db->query("select * from ranks where id = '$rank'")->result()[0]->rank_name;
        $com = $this->db->escape("<span style='display: none'>#promo</span> Promoted to the grade of ".$ranknema);
        $this->db->query("insert into comments(stfid,dentry,coment) VALUES('$id','$datepro',$com)");
    }

    public function transtaff(){
        $stfid = $this->input->post("stfid");
        $datetr = $this->input->post("datetr");
        $post = $this->input->post("newpost");
        $this->db->query("update staff set trdate = '$datetr',post='$post' where stfid = '$stfid'");
        $postname = $this->db->query("select * from post where id = '$post'")->result()[0]->post_name;
        $com = $this->db->escape("<span style='display: none'>#trans</span> Transferred to  ".$postname);
        $this->db->query("insert into comments(stfid,dentry,coment) VALUES('$stfid','$datetr',$com)");

    }


    public function gettrans($stfid){
        $trans = $this->db->query("select * from comments where stfid = '$stfid' and coment LIKE'%#trans%' ORDER BY dentry DESC")->result();
    if(count($trans)>0){
    $trans_row="<table class='table table-striped'>";
        $trans_row.="<tr><th><center>TRANSFER HISTORY</center></th></tr>";
        foreach($trans as $tran){
            $trans_row.="<tr><td>";
            $trans_row.="<strong class='text-primary'>".$tran->dentry."</strong><br/>";
            $trans_row.=$tran->coment;
            $trans_row.="</td></tr>";
        }

        $trans_row.="</table>";

        echo $trans_row;
    }


    }

    public function changestat(){
        $status=['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];
        $stfid = $this->input->post('stfid');
        $stdate=$this->input->post('stdate');
        $stat=$this->input->post("stat");
        $this->db->query("update staff set status = '$stat' where stfid = '$stfid'");
$com = $this->db->escape("<span style='display: none;'> #status ".$stat."</span>Status changed to ".$status[$stat]);
$this->db->query("insert into comments(stfid,coment,dentry) VALUES ('$stfid',$com,'$stdate')");

    }

    public function getstaff_upinput($id){
        $staff = $this->db->query("select * from staff where id = '$id'")->result()[0];
        $oinputs = $this->db->query("select * from oinfo where stfid='$staff->stfid'")->result();
        $ranks = $this->db->query("select * from ranks")->result();
        $circuits = $this->db->query("select * from circuit")->result();
        $posts = $this->db->query("select * from post")->result();
        $data['staff']=$staff;
        $data['ranks']=$ranks;
        $data['circuits']=$circuits;
        $data['posts']=$posts;
        $data['oinfo']=$oinputs;
        $this->load->view("staffupinputs",$data);

    }

    public function upstaff(){

        $photo = $this->input->post("photo");
        $stfid = $this->input->post('stfid');
        $photo_path = "";
        $oldid = $this->input->post("oldid");
        if($oldid != $stfid){
        rename("./assets/uploads/".$oldid,"./assets/uploads/".$stfid);
        }
        if($photo){
            $exten= substr($photo,-4,4);
            copy('./assets/uploads/photos/'.$photo ,'./assets/uploads/photos/'.$stfid.$exten);
            $photo_path = $stfid.$exten;
        }



        $stfdata= array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'stfid' => $this->input->post('stfid'),
            'sex' => $this->input->post('sex'),
            'dob' => $this->input->post("dob"),
            'rank' => $this->input->post("rank"),
            'post' => $this->input->post("post"),
            'aqual' => $this->input->post('aqual'),
            'pqual' => $this->input->post('pqual'),
            'apdate' => $this->input->post('apdate'),
            'phone' => $this->input->post('cont'),
            'ssnit' => $this->input->post('ssnitno'),
            'regno' => $this->input->post('regno'),
            'cshs' => $this->input->post('cshs'),
            'ccol' => $this->input->post('ccol'),
            'datepro' => $this->input->post("datepro"),
            'bank' => $this->input->post('bank'),
            'acno' => $this->input->post('acno'),
            'trdate' => $this->input->post('trdate'),
            'photo' => $photo_path,
        );

        $id = $this->input->post("id");
        $oldstfid = $this->db->query("select * from staff where id = '$id'")->result()[0];
        //$this->db->query("update comments set stfid = '$stfid' where stfid = '$oldstfid->stfid'");
        $this->db->where('id',$id);
        $this->db->update('staff',$stfdata);
        $oid = $this->input->post('oid[]');
        $olabel = $this->input->post('olabe[]');
        $ovalue = $this->input->post('ovalue[]');
        if(count($oid)>0){
         for($i=0;$i<count($oid);$i++){
             $ol = $this->db->escape($olabel[$i]);
             $ov = $this->db->escape($ovalue[$i]);
             $this->db->query("update oinfo set stfid = '$stfid',olabel=$ol,ovalue = $ov WHERE id = '$oid[$i]'");

         }
        }
    }


    Public function getprhist($stfid){
    $prhist = $this->db->query("select * from comments where stfid = '$stfid' and coment like '%#promo%' ORDER by dentry DESC")->result();
        if(count($prhist)>0){
            $trans_row="<table class='table table-striped'>";
            $trans_row.="<tr><th><center>PROMOTION HISTORY</center></th></tr>";
            foreach($prhist as $tran){
                $trans_row.="<tr><td>";
                $trans_row.="<strong class='text-primary'>".$tran->dentry."</strong><br/>";
                $trans_row.=$tran->coment;
                $trans_row.="</td></tr>";
            }

            $trans_row.="</table>";

            echo $trans_row;
        }

    }

    public function getstats($stfid){
        $prhist = $this->db->query("select * from comments where stfid = '$stfid' and coment like '%#status%' ORDER by dentry DESC")->result();
        if(count($prhist)>0){
            $trans_row="<table class='table table-striped'>";
            $trans_row.="<tr><th><center>STATUS HISTORY</center></th></tr>";
            foreach($prhist as $tran){
                $trans_row.="<tr><td>";
                $trans_row.="<strong class='text-primary'>".$tran->dentry."</strong><br/>";
                $trans_row.=$tran->coment;
                $trans_row.="</td></tr>";
            }

            $trans_row.="</table>";

            echo $trans_row;
        }
    }


    public function getstffiles($stfid){

        $this->stfid=$stfid;
        $this->load->helper('directory');
        $stffiles = directory_map('./assets/uploads/'.$stfid);
        $data['stfid']=$stfid;
        $data['stffiles'] =$stffiles;
        $this->load->view("filetemp",$data);
    }

    public function dropfile($stfid){
        if(!empty($_FILES)){
            $config['upload_path']="./assets/uploads/".$stfid;
            $config["allowed_types"]="*";
            $this->load->library("upload",$config);
            if(!$this->upload->do_upload('file')){
                echo"We could not upload your file(s), please check your file type". $config['upload_path'];
            }}
    }

    public function getfilelist($stfid){
        $files = get_filenames("./assets/uploads/".$stfid);

        $data['files'] = $files;
        $data['stfid']=$stfid;
$this->load->view('filelist',$data);

    }


    public function downloadfile(){

        $path=$this->input->get('path');

        $this->load->helper("download");

        force_download($path,null);
    }

    public function delfile(){
        $path=$this->input->get('path');
      unlink($path);
    }

    public function getstatdatejson(){
        $stat = $this->db->query("select DISTINCT(dentry) from comments where coment LIKE '%#status%' ORDER by dentry DESC")->result();
        echo(json_encode($stat));
    }

    public function getcjson(){
        $c = $this->db->query("select * from circuit order by circuit_name ASC ")->result();
        echo(json_encode($c));
    }

    public function getaccounts(){
    $users = $this->db->query("select  * from users order by logtime DESC")->result();
    $data['users']=$users;
        $this->load->view("users",$data);
    }

    public function craccount(){
    $uname = $this->input->post('uname');
    $upass = md5($this->input->post("upass"));
    $this->db->query("insert into users(uname,upass) VALUES('$uname','$upass')");

    }


    public function deluser($id){
        $this->db->query("delete from users where id = '$id'");

    }

    public function upuser(){
        $uid = $this->input->post('uid');
        $uname = $this->input->post('uname');
        $upass = $this->input->post('upass');

        if($upass){

            $this->db->query("update users set uname = '$uname',upass='".md5($upass)."' where id = '$uid'");

        }else{
            $this->db->query("update users set uname = '$uname' where id = '$uid'");
        }

    }
    function deloldbackup(){
        $this->load->helper('directory');
        $folders = $this->db->query("select stfid,photo from staff")->result();
        foreach($folders as $folder){
            $fil = directory_map("./assets/backup/".$folder->stfid);
            foreach($fil as $file){
                if (file_exists("./assets/backup/".$folder->stfid."/".$file)){
                    unlink("./assets/backup/".$folder->stfid."/".$file);
                }}
            rmdir("./assets/backup/".$folder->stfid);
        }

        $oldphotos = directory_map("./assets/backup/photos");
        if(count($oldphotos)>0){
            foreach($oldphotos as $photo){
                unlink("./assets/backup/photos/".$photo);
            }}

        rmdir("./assets/backup/photos");
        unlink("./assets/backup/backup.sql");
        unlink("./assets/backup/photo.jpg");
        rmdir("./assets/backup");
    }



    public function backupdb(){
            $this->deloldbackup();
        ini_set('memory_limit','1024M');
        mkdir("./assets/backup");
        copy("./assets/uploads/photo.jpg","./assets/backup/photo.jpg");
        $this->load->dbutil();
        $backup = $this->dbutil->backup(array('format'=>'txt'));
        write_file("./assets/backup/backup.sql",$backup);


        mkdir("./assets/backup/photos");
        $this->load->helper('directory');
        $photos = directory_map("./assets/uploads/photos");
        foreach($photos as $photo){
            copy("./assets/uploads/photos/".$photo,"./assets/backup/photos/".$photo);
        }
        $folders = $this->db->query("select stfid from staff")->result();
        foreach($folders as $folder){
         mkdir("./assets/backup/".$folder->stfid);
            $fil = directory_map("./assets/uploads/".$folder->stfid);
            foreach($fil as $file){
                if (file_exists("./assets/uploads/".$folder->stfid."/".$file)){
                copy("./assets/uploads/".$folder->stfid."/".$file ,"./assets/backup/".$folder->stfid."/".$file);
            }}}
        $this->load->library('zip');
        $this->zip->compression_level = 9;
        $path = './assets/backup/';
        $this->zip->read_dir($path);
        $this->zip->archive('./assets/GES_HR_BACKUP'.date("Y/M/d").'.zip');
        $this->zip->download('GES_HR_BACKUP_'.date("Y/M/d").'.zip');
    }


    function runrestore(){
        $filename='./assets/assets/backup/backup.sql';

        $this->db->query("SET NAMES 'utf8'");
        $templine = '';
        $lines = file($filename);
        foreach ($lines as $line)
        {
            if (substr($line, 0, 1) == '#' || $line == '')
                continue;
            $templine .= $line;
            if (substr(trim($line), -1, 1) == ';')
            {
                $this->db->query($templine);
                $templine = '';
            }
        }
        $this->load->helper("directory");
        $folders = $this->db->query("select stfid,photo from staff")->result();
        foreach($folders as $folder){
            $fil = directory_map("./assets/assets/backup/".$folder->stfid);

            foreach($fil as $file){
                if (file_exists("./assets/assets/backup/".$folder->stfid."/".$file)){
                    copy("./assets/assets/backup/".$folder->stfid."/".$file ,"./assets/uploads/".$folder->stfid."/".$file);
                }}


            if(file_exists("./assets/assets/backup/photos/".$folder->photo)){
                copy("./assets/assets/backup/photos/".$folder->photo ,"./assets/uploads/photos/".$folder->photo);

            }
        }

    }

    Public function restoredb(){
        $dbfile = $this->input->get("file");
        if(file_exists('./assets/'.$dbfile)){
        $filepath = './assets/'.$dbfile;
            $zipmng = new ZipArchive();
            $zipmng->open($filepath);
            $zipmng->extractTo("./assets");

            $this->runrestore();
        }

    }



    public function confirmuser(){
        $uname = $this->db->escape($this->input->get('uname'));
        $upass = $this->input->get('upass');
        $enupass = md5($upass);
        $ucheck = $this->db->query("select * from users where uname = $uname")->result();
        if(count($ucheck)<1){

         $res='{
         "status":0,
         "msg":"Sorry Your login credentials cannot be recognised"

               }';

        }else{
            $pcheck = $this->db->query("select * from users where uname ='".$ucheck[0]->uname."' and upass = '$enupass'")->result();
            if(count($pcheck)>0){
                session_start();
                $_SESSION['uname']=$pcheck[0]->uname;
                $_SESSION['upass']=$pcheck[0]->upass;
                $id=$pcheck[0]->id;
                $this->load->helper("date");
                $now = time();
                $logintime = unix_to_human($now, TRUE, 'eu');
                $this->db->query("update users set logtime = '$logintime' where id = '$id'");

                $res='{
                    "status":1
               }';

            }else{
                $res='{
         "status":0,
         "msg":"Sorry your password is incorrect, please check and try again"
               }';
            }

        }

             $this->output
            ->set_content_type('application/json')
            ->set_output($res);

    }

    public function logout(){
        session_start();
        session_destroy();


    }


}