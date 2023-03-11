<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class User_model extends CI_model {

				//------------------------------- login ----------------//
			
	 public function login($data) {
		$query = $this->db->from('emp')->where('emp_id',$data['emp_id'])
		->where('password ',$data['password'])->where('resignation_date','0000-00-00')->limit(1)->get();
	
	if ($query->num_rows() == 1)
	{
		return $query;
	} else {
		return false;
		}
	}
	
	public function logintime($data1){
        $this->db->insert('emp_login_time',$data1);
        return true;	

    }
    public function total_work_per_month($emp_id){
	    $sql="select event_id2 from event_attendance where emp_id='".$emp_id."'";
	    $q=$this->db->query($sql);
	    $result=$q->result();
	    //print_r($result); 
	    if($q->num_rows()>0){
	    $result2 =array();
	    foreach($result as $res){
	    $result2[]=$res->event_id2;
	    }
	    $event_id2 = implode(',', $result2);
	    $year = date('m-d');
	    if($year>='04-01'){
	        $year2 = date('Y-04-01');
	        $year3 = date( 'Y-03-31', strtotime( $year2 . '+1 years' ));
	        //print_r($year2);
	        //print_r($year3);
	    } else{
	        $y = date('Y-m-d');
	        $year2 = date('Y-04-01', strtotime( $y . '-1 years' ));
	        $year3 =date('Y-03-31');
	       // print_r($year2);
	       // print_r($year3);
	    }
	    
	   // print_r($result2); exit;
	    $sql=$this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN ($event_id2)  and (`from_date` BETWEEN '$year2' AND '$year3') GROUP by month(from_date) order by from_date");
		// echo $this->db->last_query(); exit;
	   return $sql;
	    }else{
	     $sql=$this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN (0)  GROUP by month(from_date) order by from_date");
	   return $sql;
	    }
    }
    
    public function total_work_per_month2($emp_id,$year){
	    $sql="select event_id2 from event_attendance where emp_id='".$emp_id."'";
	    $q=$this->db->query($sql);
	    $result=$q->result();
	    $sqlh="SELECT * FROM `old_history_data` WHERE `emp_id` = '".$emp_id."'";
	    $qh=$this->db->query($sqlh);
	    $resulth=$qh->result();
	    //print_r($result); 
	    if($q->num_rows()>0 or $qh->num_rows()>0){
	    $result2 =array();
	    foreach($result as $res){
	    $result2[]=$res->event_id2;
	    }
	    $event_id2 = implode(',', $result2);
	    $year2 = date( 'Y-m-d', strtotime( $year . '+1 years' ));
	    $year3 = date( 'Y-m-d', strtotime( $year2 . ' -1 day' ));
	    if($event_id2){
	        
	    }else{
	        $event_id2 = 0;
	    }
	    //$sql=$this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN ($event_id2) and (`from_date` BETWEEN '$year' AND '$year3')  GROUP by month(from_date) order by from_date");
	    $sql=$this->db->query("(select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN ($event_id2) and (`from_date` BETWEEN '$year' AND '$year3')  GROUP by month(from_date) order by from_date) UNION ALL (select MONTHNAME(fromdate) as month,sum(program_mandays) as days from old_history_data where emp_id = '$emp_id' and (`fromdate` BETWEEN '$year' AND '$year3') GROUP by month(fromdate) order by fromdate)");
		// echo $this->db->last_query(); exit
	   return $sql;
	    }else{
	     $sql=$this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where event_id IN (0)  GROUP by month(from_date) order by from_date");
	   return $sql;
	    }
    }
    
    public function upcoming_events($emp_id){
      /*$division_id =  $this->session->userdata['logged_in']['division_id'];
        $today_date=date('Y-m-d');
        $list=$this->db->select('*')->from('events')->where('from_date>',$today_date)->where('division_id',$division_id)->order_by('from_date','asc')->get();
        return $list->result();	*/
        
        
         $division_id =  $this->session->userdata['logged_in']['division_id'];
        $today_date=date('Y-m-d');

        $sql="select * from assign_emp where employee_id='".$emp_id."'";
       // echo $sql;
        $q=$this->db->query($sql);
        if($q->num_rows()>0){


            $result=$q->result();

        $event =array();
        foreach($result as $res){
        //$event_id=$res->event_id;
            if(isset($res->event_id)){
            $event[]=$res->event_id;
            }
            else
            {
                $event[]=$res->program_id;
            }
        }
        $event_id = implode(',', $event);
    
     $list=$this->db->query("select event_details.*, events.event_name,events.location from event_details left join events on events.id= event_details.event_id where event_id IN ($event_id) AND event_details.from_date > '".$today_date."' order by event_details.from_date asc");
   
        return $list->result(); 
         
        }else{
 $list=$this->db->query("select event_details.*, events.event_name,events.location from event_details left join events on events.id= event_details.event_id where event_id IN (0) AND event_details.from_date > '".$today_date."' order by event_details.from_date asc");
   
        return $list->result(); 

        }
         
    }
        
    public function pre_test_data($division_id,$emp_id){
        
        $list=$this->db->select('test_result1.test_id,test.title')->select_sum('points')->from('test_result1')->join('test','test_result1.test_id=test.id','left')->where('test_type','1')->group_by('test_result1.test_id')->where('emp_id',$emp_id)->get();
        return $list->result();
        // echo $this->db->last_query();
        // print_r($list->result()); exit;	
    }
        
    public function post_test_data($division_id,$emp_id){
        $list=$this->db->select('test_result1.test_id,test.title,count(points) as count_points')->select_sum('points')->from('test_result1')->join('test','test_result1.test_id=test.id','left')->where('test_type','2')->group_by('test_result1.test_id')->where('emp_id',$emp_id)->get();
        return $list->result();	
        //print_r($list->result()); exit;	
    }
				/*------------edit profile------------*/
	public function edit_profile($id,$data)
	{
		$this->db->where('id',$id);
        $this->db->update('emp', $data);
	}	
	public function profile($id)
	{
		$query=$this->db->from('emp')->where('id',$id)->get();
		return $query;
	}

		// test //
	public function test_detail($division)
	{
		/*$query=$this->db->from('test')->where('status','active')->where('test_type','1')->get();
		return $query;*/
		$today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		return $this->db->query("select title from test WHERE test_type=1 and status = 'active' and course_id = (select course from event_details WHERE from_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id'))");

	}
	
    public function get_test_event_id($division){
        
        $emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
        $sql="select event_id from event_details where from_date='".$today_date."'";
        
        $q=$this->db->query($sql);
        
        if($q->num_rows() >0 ){
        $result=$q->result();
        
        //print_r($result); 
        $event =array();
        foreach($result as $res){
        //$event_id=$res->event_id;
        
        $event[]=$res->event_id;
        }
        $event_id = implode(',', $event);
        //$course=$res->course;
        $sql1="select event_id from assign_emp where event_id IN ($event_id) AND employee_id='".$emp_id."'";
        //echo $sql1;
        $q1=$this->db->query($sql1);
        //print_r($q1->row()); exit;
        return $q1->row();
        
        
        
        }	
    }
	public function test($division)
	{
	/*	$emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
        //$today_date='2019-04-06';
        $sql="select event_id, course from event_details where from_date='".$today_date."'";
        //echo $sql; exit;
        
        $q=$this->db->query($sql);
        
        
        if($q->num_rows() >0 ){
        $result=$q->row();
        
        //print_r($result); 
        $event_id=$result->event_id;
        $course_id=$result->course;
        $sql1="select * from assign_emp where event_id='".$event_id."' AND employee_id='".$emp_id."'";
        //echo $sql1;
        $q1=$this->db->query($sql1);
        
        if($q1->num_rows() > 0){
        
        $id="select id from test where course_id='".$course_id."' AND test_type='1' AND status='active'";
        //echo $id;
        $id12=$this->db->query($id);
        $id1=$id12->result();
        // print_r($id1); exit;
        foreach($id1 as $row){
        $id2 = $row->id;
        }
        if(empty($id2)){
        $id2 ="aaa";
        }
        
        $query=$this->db->from('test_quations')->where('test_id',$id2)->get();
        return $query;
        
        }else{
        $query=$this->db->from('test_quations')->where('test_id',0)->get();
        return $query;
        }
        
        }else{
        $query=$this->db->from('test_quations')->where('test_id',0)->get();
        return $query;
        }*/
        $emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
        //$today_date='2019-04-06';
        $sql="select event_id from event_details where from_date='".$today_date."'";
        //echo $sql; exit;
        
        $q=$this->db->query($sql);
        
        
        if($q->num_rows() >0 ){
        $result=$q->result();
        
        //print_r($result); 
        $event =array();
        foreach($result as $res){
        //$event_id=$res->event_id;
        
        $event[]=$res->event_id;
        }
        $event_id = implode(',', $event);
        //$course=$res->course;
        $sql1="select * from assign_emp where event_id IN ($event_id) AND employee_id='".$emp_id."'";
        //echo $sql1;
        $q1=$this->db->query($sql1);
        
        if($q1->num_rows() > 0){
        $resu1=$q1->row();
        $event_id1=$resu1->event_id;
        $qq="select course from event_details where event_id='".$event_id1."' AND from_date='".$today_date."'";
        $qq1=$this->db->query($qq);
        $re1=$qq1->row();
        $course_id=$re1->course;
        
        $id="select id from test where course_id='".$course_id."' AND test_type='1' AND status='active'";
        //echo $id;
        $id12=$this->db->query($id);
        $id1=$id12->result();
        // print_r($id1); exit;
        foreach($id1 as $row){
        $id2 = $row->id;
        }
        if(empty($id2)){
        $id2 ="aaa";
        }
        
        $query=$this->db->from('test_quations')->where('test_id',$id2)->get();
        return $query;
        
        }else{
        $query=$this->db->from('test_quations')->where('test_id',0)->get();
        return $query;
        }
        
        }else{
        $query=$this->db->from('test_quations')->where('test_id',0)->get();
        return $query;
        }
	}
	public function test1($division)
	{
		$id1=$this->db->select('id')->from('test')->where('status','active')->where('test_type','1')->get()->result();
		foreach($id1 as $row){
			$id2 = $row->id;
		}
		if(empty($id2)){
			$id2 = "aaa";
		}
		return $query=$this->db->select('count(id) count1')->from('test_quations')->where('test_id',$id2)->get();
		//print_r($query); exit();
	}
	public function test_sub($emp_id,$division)
	{
	    $today_date=date('Y-m-d');
	    //$course_id = $this->db->query("select course from event_details WHERE from_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id')")->result();
		
		//print_r($course_id); exit();
		//$id1=$this->db->select('id')->from('test')->where('status','active')->where('test_type','1')->where('course_id',$course_id)->get()->result();
		$id1 = $this->db->query("select * from test where status='active' and test_type=1 and course_id=(select course from event_details WHERE from_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id'))")->result();
		foreach($id1 as $row){
			$id2 = $row->id;
		}
		if(empty($id2)){
			$id2 = "aaa";
		}
		 $query=$this->db->select('count(id) count2')->from('test_result1')->where('test_id',$id2)->where('emp_id',$emp_id)->get()->result();
		foreach($query as $row) {
			$aaa = $row->count2;
		}
		return $aaa;
	}
	public function test_result($emp_id)
	{
		return $this->db->query("SELECT t.emp_id as emp_id, t.test_id as test_id ,SUM(t.points) as points, t2.title title FROM test_result1 t LEFT JOIN test t2 ON t.test_id=t2.id WHERE t.emp_id='$emp_id' AND t2.test_type=1 GROUP by t.test_id");
	//print_r($this);exit
	}
	// pre test //
	public function pre_test_list()
	{
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
	    $quary = $this->db->query("SELECT event_details.event_id as event_id,event_details.course as course_id,test.id as test_id,test.title as title FROM `event_details` Inner JOIN test on event_details.course=test.course_id where (to_date >= '$today_date') and event_id in (SELECT event_id from assign_emp where employee_id =  '$emp_id' ) and STATUS='active' and test.test_type=1");
	    return $quary;
	    ///print_r($quary);exit();
	    
	}
	public function pre_test_detail($event_id,$test_id,$course_id)
	{
		return $this->db->query("SELECT event_id,facult_name,title from event_details INNER JOIN test on event_details.course=test.course_id where test.id=$test_id and event_details.event_id =$event_id and event_details.course =$course_id");
	}
	public function pre_test($test_id)
    {
        return $this->db->query("select * from test_quations where test_id= $test_id");
    }
    public function pre_test_sub($event_id,$test_id)
	{
	 	
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		$query=$this->db->select('count(id) count2')->from('test_result1')->where('event_id',$event_id)->where('test_id',$test_id)->where('emp_id',$emp_id)->get()->result();
		
		foreach($query as $row) {
			$aaa = $row->count2;
		}
		 return $aaa;
	}
		public function pre_test_result($emp_id)
	{
		return $this->db->query("SELECT t.emp_id as emp_id, t.test_id as test_id ,SUM(t.points) as points,COUNT(t.points) as total, t2.title title FROM test_result1 t LEFT JOIN test t2 ON t.test_id=t2.id WHERE t.emp_id='$emp_id' AND t2.test_type=1 GROUP by t.test_id");
	}
    // pre test
		// post test //
		
	public function post_test_list()
	{
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
        $today_added=date('Y-m-d', strtotime($today_date. ' + 2 days'));
        $today_added1=date('Y-m-d', strtotime($today_date. ' - 1 days'));
        $today_added2=date('Y-m-d', strtotime($today_date. ' - 2 days'));
        $today_added3=date('Y-m-d', strtotime($today_date. ' - 3 days'));
        $today_added4=date('Y-m-d', strtotime($today_date. ' - 4 days'));
        /*return  "SELECT event_details.event_id as event_id,event_details.course as course_id,test.id as test_id,test.title as title FROM `event_details` Inner JOIN test on event_details.course=test.course_id where (to_date = '$today_date' or to_date= '$today_added1' or to_date='$today_added2' or to_date='$today_added3' or to_date='$today_added4') and event_id in (SELECT event_id from assign_emp where employee_id =  '$emp_id' ) and STATUS='active' and test.test_type=2";*/
	    $quary = $this->db->query("SELECT event_details.event_id as event_id,event_details.course as course_id,test.id as test_id,test.title as title FROM `event_details` Inner JOIN test on event_details.course=test.course_id where from_date between date(now()) and date(date_add(now(),interval 3 day))  and event_id in (SELECT event_id from assign_emp where employee_id =  '$emp_id' ) and STATUS='active' and test.test_type=2");
	    return $quary;
	    //print_r($quary);exit();
	    
	}
		
	public function post_test_detail($event_id,$test_id,$course_id)
	{
		/*$query=$this->db->from('test')->where('status','active')->where('test_type','2')->get();
		return $query;
		
		$today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		return $this->db->query("select title from test WHERE test_type=2 and status = 'active' and course_id = (select course from event_details WHERE to_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id'))");*/
        
        return $this->db->query("SELECT event_id,facult_name,title from event_details INNER JOIN test on event_details.course=test.course_id where test.id=$test_id and event_details.event_id =$event_id and event_details.course =$course_id");
	}	
	/*public function get_posttest_event_id($division){

        $emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
        $today_added=date('Y-m-d', strtotime($today_date. ' + 2 days'));
        $today_added1=date('Y-m-d', strtotime($today_date. ' - 1 days'));
        $today_added2=date('Y-m-d', strtotime($today_date. ' - 2 days'));
        //$sql="select event_id from event_details where to_date>='".$today_date."' AND to_date<='".$today_added."'";
        $sql="select event_id from event_details where to_date='".$today_date."' OR to_date='".$today_added1."' OR to_date='".$today_added2."'";
       
        $q=$this->db->query($sql);
        
        if($q->num_rows() >0 ){
        $result=$q->result();
        
        //print_r($result); 
        $event =array();
        foreach($result as $res){
        //$event_id=$res->event_id;
        
            $event[]=$res->event_id;
        }
        $event_id = implode(',', $event);
        //$course=$res->course;
        $sql1="select event_id from assign_emp where event_id IN ($event_id) AND employee_id='".$emp_id."'";
        //echo $sql1;
        $q1=$this->db->query($sql1);
        //print_r($q1->row()); exit;
        return $q1->row();
        }	
    }*/
	/*public function post_test($division_id)
	{
		
		
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
        $today_date=date('Y-m-d');
        $today_added=date('Y-m-d', strtotime($today_date. ' + 2 days'));
        $today_added1=date('Y-m-d', strtotime($today_date. ' - 1 days'));
        $today_added2=date('Y-m-d', strtotime($today_date. ' - 2 days'));
       // echo $today_added; exit;
        //$sql="select event_id, course from event_details where to_date>='".$today_date."' AND to_date<='".$today_added."'";
        $sql="select event_id, course from event_details where to_date='".$today_date."' OR to_date='".$today_added1."' OR to_date='".$today_added2."'";
        //echo $sql;
        
        $q=$this->db->query($sql);
        
        
        if($q->num_rows() >0 ){
        $result=$q->row();
        
        //print_r($result); 
        $event_id=$result->event_id;
        $course_id=$result->course;
        $sql1="select * from assign_emp where event_id='".$event_id."' AND employee_id='".$emp_id."'";
        //echo $sql1;
        $q1=$this->db->query($sql1);
        
        if($q1->num_rows() > 0){
        
        $id="select id from test where course_id='".$course_id."' AND test_type='2' AND status='active'";
        //echo $id;
        $id12=$this->db->query($id);
        $id1=$id12->result();
        // print_r($id1); exit;
        foreach($id1 as $row){
        $id2 = $row->id;
        }
        if(empty($id2)){
        $id2 ="aaa";
        }
        
        $query=$this->db->from('test_quations')->where('test_id',$id2)->get();
        return $query;
        
        }else{
        $query=$this->db->from('test_quations')->where('test_id',0)->get();
        return $query;
        }
        
        }else{
        $query=$this->db->from('test_quations')->where('test_id',0)->get();
        return $query;
        }
	}*/
	public function post_test($test_id)
    {
        return $this->db->query("select * from test_quations where test_id= $test_id order by rand()");
    }
	/*public function post_test1($division_id){
		$id1=$this->db->select('id')->from('test')->where('status','active')->where('test_type','2')->get()->result();
		foreach($id1 as $row){
			$id2 = $row->id;
		}
		if(empty($id2)){
			$id2 = "aaa";
		}
		return $query=$this->db->select('count(id) count1')->from('test_quations')->where('test_id',$id2)->get();
		//print_r($query); exit();
	}*/
	public function post_test_sub($event_id,$test_id)
	{
	    /*$today_date=date('Y-m-d');
	    $today_added=date('Y-m-d', strtotime($today_date. ' + 2 days'));
        $today_added1=date('Y-m-d', strtotime($today_date. ' - 1 days'));
        $today_added2=date('Y-m-d', strtotime($today_date. ' - 2 days'));
		//$id1=$this->db->select('id')->from('test')->where('status','active')->where('test_type','2')->get()->result();
		$id1 = $this->db->query("select * from test where status='active' and test_type=2 and course_id=(select course from event_details WHERE to_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id'))")->result();
		
		foreach($id1 as $row){
			$id2 = $row->id;
		}
		if(empty($id2)){
			$id2 = "aaa";
		}
		 $query=$this->db->select('count(id) count2')->from('test_result1')->where('test_id',$id2)->where('emp_id',$emp_id)->get()->result();
		foreach($query as $row) {
			$aaa = $row->count2;
		}
		return $aaa;*/
		
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		$query=$this->db->select('count(id) count2')->from('test_result1')->where('event_id',$event_id)->where('test_id',$test_id)->where('emp_id',$emp_id)->get()->result();
		
		foreach($query as $row) {
			$aaa = $row->count2;
		}
		 return $aaa;
	}
	public function post_test_result($emp_id)
	{
		return $this->db->query("SELECT t.emp_id as emp_id, t.test_id as test_id ,SUM(t.points) as points,COUNT(t.points) as total, t2.title title FROM test_result1 t LEFT JOIN test t2 ON t.test_id=t2.id WHERE t.emp_id='$emp_id' AND t2.test_type=2 GROUP by t.test_id");
	}
	
	 public function exam($data)
    { 

		if(!empty($data['test_id'])){
			$answer = $data['answer'];
			$q_id = $data['q_id'];
			$aaa = $this->db->select('answer')->from('test_quations')->where('id',$q_id)->get()->result();
			foreach($aaa as $row){
				$answer2 = $row->answer;
			}
			if($answer==$answer2){
				$data['points']= 1;
			}else{
				$data['points']= 0;
			}
			//print_r($data);exit();
			$query=$this->db->insert('test_result1',$data);
		}
    }
	
	public function test2($id,$emp_id)
	{
		//$query=$this->db->from('test_quations')->where('test_id',$id)->get();
		return $this->db->query("SELECT t.*, t2.answer answer2 FROM test_quations t LEFT JOIN test_result1 t2 ON t.id=t2.q_id WHERE t.test_id=$id AND t2.emp_id='$emp_id'");
		//return $query;
	}
	
	public function evaluation_list()
	{
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
		$division_id =  $this->session->userdata['logged_in']['division_id'];
		$date = date('Y-m-d');
		//print_r($date);exit();
		//return $this->db->query("SELECT * from evaluation where evaluation.id IN (select evaluation from event_details where event_details.event_id IN (select event_id from assign_emp WHERE assign_emp.employee_id = $emp_id) and event_details.to_date <= '$date') ORDER BY `evaluation`.`id` DESC")->result();
		return $this->db->query("select evaluation.id as ids,evaluation.title,event_details.* from event_details LEFT JOIN evaluation ON event_details.evaluation = evaluation.id where event_details.event_id IN (select event_id from assign_emp WHERE assign_emp.employee_id = '$emp_id') and event_details.to_date <= '$date' ORDER BY event_details.to_date DESC")->result();
	}
	public function evaluation_cmp()
	{
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
	    return $this->db->query("SELECT eve_id,event_id,event_id2 FROM evaluation_result WHERE emp_id = '$emp_id' GROUP BY eve_id")->result();
	}
	public function evaluation($id,$emp_id)
	{
		$division_id =  $this->session->userdata['logged_in']['division_id'];
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$query = $this->db->query("SELECT * FROM evaluation_result where emp_id = '$emp_id' and eve_id = $id ")->result();
		//print_r($query);exit();
		if (empty($query)) {
			return $this->db->query("SELECT * FROM evaluation where division_id = $division_id and to_date = '$date' and id = $id and submit_time < '$time'")->result();
		}
		//print_r($query);exit();
		//return $this->db->query("SELECT * FROM evaluation where category_id = $category_id and to_date = '$date' and id = $id and submit_time < '$time'")->result();
	}
	public function evaluation_quations()
	{
		return $this->db->query("SELECT * FROM evaluation_quations2 ORDER BY id ASC");
	}
	public function evaluation_quations2($id)
	{
	    $today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		//return $this->db->query("select * from evaluation_quations WHERE evaluation_id = (select evaluation from event_details WHERE to_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id')) AND `evaluation_quations`.`status` = 1 ORDER BY `evaluation_quations`.`id` DESC");
		return $this->db->query("select * from evaluation_quations WHERE evaluation_id =$id AND `evaluation_quations`.`status` = 1 ORDER BY `evaluation_quations`.`id` DESC");
	}
	public function evaluation_quations_details($id,$event_id1,$event_id2)
	{
	    $today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
	    //return $this->db->query("select evaluation.id as id,title,facult_name,event_id from evaluation left join event_details on evaluation.id = event_details.evaluation WHERE event_details.to_date='$today_date' and event_details.event_id in (select event_id from assign_emp where employee_id='$emp_id')");
	    return $this->db->query("select evaluation.id as id,evaluation.title as title, event_details.facult_name as facult_name ,event_details.event_id as event_id,event_details.id as event_id2 from event_details left join evaluation on  event_details.evaluation = evaluation.id  WHERE event_details.event_id=$event_id1 and event_details.id=$event_id2 and event_details.evaluation =$id");
	    
	}
	public function evaluation_sub($id,$event_id1,$event_id2)
	{
	    $today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
	    //$query = $this->db->query("SELECT eve_id from evaluation_result WHERE eve_id = (select evaluation from event_details WHERE to_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id')) and emp_id='$emp_id' GROUP by eve_id");
	    $query = $this->db->query("SELECT * from evaluation_result where emp_id	= '$emp_id' and eve_id = $id and event_id = $event_id1 and event_id2 = $event_id2");
	
	        if ($query->num_rows() >= 1)
	    {
	    	return 1;
	    } else {
	    	return 2;
	    }
    }
    public function event_attend($data){
        $emp_id=$data['emp_id'];
        $event_id=$data['event_id'];
        $event_id2=$data['event_id2'];
        $query = $this->db->query("select * from event_attendance where emp_id='$emp_id' and event_id=$event_id and event_id2=$event_id2");
        if($query->num_rows() >= 1){
            return 1;
        }else{
        $query1=$this->db->insert('event_attendance',$data);
             return 2;
        }
    }
	public function evaluation_submit($data)
    {

		if(!empty($data['quations'])){
			
			//print_r($data);exit();
			$query=$this->db->insert('evaluation_result',$data);
		}
    }
	
	public function course()
	{
	    //return $this->db->from('course')->get();
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
	   
	    return $this->db->query("SELECT * FROM `course` WHERE id in(select course from event_details where event_details.event_id in(SELECT event_id from assign_emp where assign_emp.employee_id = '$emp_id')) ORDER by course.id DESC");
	    
	}
	
	public function single_course($id)
	{
	    return $this->db->from('course')->where('id',$id)->get();
	}
	
	public function budget()
	{
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
	    $date = date('Y-m-d');
	    return $this->db->query("SELECT * FROM `events` where id in (select event_id from assign_emp where employee_id='$emp_id') and end_date = '$date'");
	}
	
	public function budget_sub()
	{
	    $emp_id = $this->session->userdata['logged_in']['emp_id'];
	    $date = date('Y-m-d');
	    $aaa = $this->db->query("select * from individual_budget where event_id = (SELECT id FROM `events` where id in (select event_id from assign_emp where employee_id='$emp_id') and end_date = '$date') and emp_id='$emp_id'");
	    return $aaa;
	    //print_r($aaa->result());exit();
	    
	}
	
	public function addbudget($data)
	{
	    $query=$this->db->insert('individual_budget',$data);
	}
	
			//---------- changeyourpassword ----
	public function changeyourpassword($password){
      if(isset($this->session->userdata['logged_in']['id'])) {
        $id = $this->session->userdata['logged_in']['id'];
		$check_pass =  $this->db->select('password')->get_where('emp',array('id'=> $id,'password' => $password));
		
	   return $check_pass->result();
      }
    }
	
	public function profileedit($data1)
     {
	    if(isset($this->session->userdata['logged_in']['id'])) {
	      $id = $this->session->userdata['logged_in']['id'];
	      $this->db->where('id', $id);
	      $this->db->update('emp', $data1);
	      //return $this->db->get_where('users',array('id'=> $id));
	      return true;
	    } else {
	      return false;
	    }
     }
     /*-----------------servayA---------------------*/
    public function servayA(){
        return $this->db->from('servay')->where('servay_catgory','A')->where('servay_status',1)->ORDER_BY('servay_id','ASC')->get();
    }
    public function servayB(){
        return $this->db->from('servay')->where('servay_catgory','B')->where('servay_status',1)->ORDER_BY('servay_id','ASC')->get();
    }
    public function servayC(){
        return $this->db->from('servay')->where('servay_catgory','C')->where('servay_status',1)->ORDER_BY('servay_id','ASC')->get();
    }
    public function servayD(){
        return $this->db->from('servay')->where('servay_catgory','D')->where('servay_status',1)->ORDER_BY('servay_id','ASC')->get();
    }
    public function servayE1(){
        return $this->db->from('servay')->where('servay_catgory','E1')->where('servay_status',1)->ORDER_BY('servay_id','ASC')->get();
    }
    public function servayE2(){
        return $this->db->from('servay')->where('servay_catgory','E2')->where('servay_status',1)->ORDER_BY('servay_id','ASC')->get();
    }
    /*-----------------servayA---------------------*/
    public function servay_submit($data)
    {

		if(!empty($data['servay_id'])){
			
			//print_r($data);exit();
			$query=$this->db->insert('servay_result',$data);
		}
    }
    public function servay_emp($data)
    {
        $q1 = $this->db->from('servay_emp')->where('emp_id',$data['emp_id'])->get();
        if ($q1->num_rows() == 0){
			$query=$this->db->insert('servay_emp',$data);
			$i = $this->db->insert_id();
			return $i;
		}
		
    }
    public function servay_sub($emp_id){
        $q1 = $this->db->from('servay_emp')->where('emp_id',$emp_id)->get();
        if ($q1->num_rows() >= 1){
            return 1;
        } else {
            return 0;
        }
    }
}

?>
