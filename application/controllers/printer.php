<?php

/**
 * Created by PhpStorm.
 * User: Godson
 * Date: 9/3/2017
 * Time: 7:02 PM
 */
class printer extends CI_Controller
{

    public function staffprofile($stfid){

$staff = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post and staff.stfid='$stfid'")->result()[0];

$trans = $this->db->query("select * from comments where stfid = '$stfid' and coment LIKE '%#trans%' ORDER by dentry DESC")->result();
$promo = $this->db->query("select * from comments where stfid = '$stfid' and coment LIKE '%#promo%' ORDER by dentry DESC ")->result();
$status = $this->db->query("select * from comments where stfid = '$stfid' and coment LIKE '%#status%' ORDER by dentry DESC")->result();
$gcom = $this->db->query("select * from comments where stfid = '$stfid' and id not in (select id from comments where coment LIKE '%#trans%' or coment LIKE '%#promo%' or coment LIKE '%#status%'  ) ORDER BY dentry desc")->result();
$oinfo = $this->db->query("select * from oinfo where stfid = '$stfid'")->result();
$data['staff']=$staff;
$data['trans']=$trans;
$data['promo']=$promo;
$data['statuses']=$status;
$data['gcom']=$gcom;
$data['oinfo']=$oinfo;
$this->load->view("printtemp/staffprofile",$data);

    }
    public function stafflist(){
        $rank = $this->input->get('rank');
        $status = $this->input->get('status');
        $post = $this->input->get('post');
        $sex = $this->input->get('sex');
        $title = $this->input->get('title');
        $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post and staff.rank LIKE '%$rank%' and staff.status LIKE '%$status%' and staff.post LIKE '%$post%' and staff.sex LIKE '$sex%' ORDER BY fname asc, lname ASC ")->result();
        $data['title'] =$title;
        $data['stafflist'] = $stafflist;
        $this->load->view('printtemp/stafflist',$data);
    }

    public function genlist(){
        $title = $this->input->get('title');
        $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post ORDER BY fname asc, lname ASC ")->result();
        $data['title'] =$title?$title:'GENERAL STAFF LIST';
        $data['stafflist'] = $stafflist;
        $this->load->view('printtemp/stafflist',$data);

    }


    public function facelist(){
        $title = $this->input->get('title');
        $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post ORDER BY fname asc, lname ASC ")->result();
        $data['title'] =$title?$title:'LIST OF STAFF WITH PHOTOS';
        $data['stafflist'] = $stafflist;
        $this->load->view('printtemp/facelist',$data);

    }


    public function statlist(){
        $status=['Active','Study Leave with pay','Study leave without pay','vacation of post','Diseased','Embargo','Maternity Leave','Exam Leave','Casual Leave','Annual Leave','Sick Leave','Bereavement Leave'];

        $title = $this->input->get('title');
        $year = $this->input->get('year');
        $statusid = $this->input->get('status');
        $stattag = '#status '.$statusid;
        $statname = $status[$statusid];

        $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name,comments.dentry from staff,post,ranks,comments where ranks.id=staff.rank and post.id=staff.post and staff.stfid = comments.stfid and staff.stfid in (select stfid from comments where dentry like '$year%'  and coment LIKE '%$statusid%') ORDER BY fname asc, lname ASC ")->result();
        if(!$title){
            $data['title'] =($statusid!=4)?'list of staff on '.$status[$statusid].' ('.$year.')':'list of diseased staff('.$year.')';

        }else{

            $data['title']=$title;
        }
        $data['stafflist'] = $stafflist;
        $this->load->view('printtemp/statlist',$data);
    }

    public function circuitlist(){
        $title = $this->input->get('title');
        $c = $this->input->get('circuit');
        $cname = $this->db->query("select circuit_name from circuit where id = '$c'")->result()[0]->circuit_name;
        $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post and staff.post in(select id from post where post.circuit = '$c') ORDER BY  post_name ASC, fname asc, lname ASC")->result();
        $data['title'] =$title?$title:'LIST OF STAFF AT '.strtoupper($cname);
        $data['stafflist'] = $stafflist;
        $this->load->view('printtemp/stafflist',$data);
    }



    public function ststauslist(){

        $title = $this->input->get('title');
        $stat = $this->input->get('stat');
        if($stat == 0) {
            $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post and staff.regno <>'N/A' ORDER BY fname asc, lname ASC ")->result();
            $data['title'] = $title ? $title : 'LIST OF REGISTERED/PROFESSIONAL STAFF';
        }else{

            $stafflist = $this->db->query("select staff.*,ranks.rank_name,post.post_name from staff,post,ranks where ranks.id=staff.rank and post.id=staff.post and staff.regno = 'N/A' ORDER BY fname asc, lname ASC ")->result();
            $data['title'] = $title ? $title : 'LIST OF UNREGISTERED/UNPROFESSIONAL STAFF';


        }
            $data['stafflist'] = $stafflist;
        $this->load->view('printtemp/stafflist',$data);


    }

}