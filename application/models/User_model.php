<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class User_model extends CI_model
{

	//------------------------------- login ----------------//

	public function login($data)
	{
		$query = $this->db->from('emp')->where('emp_id', $data['emp_id'])
			->where('password ', $data['password'])->where('resignation_date', '0000-00-00')->limit(1)->get();

		if ($query->num_rows() == 1) {
			return $query;
		} else {
			return false;
		}
	}

	public function logintime($data1)
	{
		$this->db->insert('emp_login_time', $data1);
		return true;
	}
	public function total_work_per_month($emp_id)
	{
		$sql = "select event_id2 from event_attendance where emp_id='" . $emp_id . "'";
		$q = $this->db->query($sql);
		$result = $q->result();
		//print_r($result); 
		if ($q->num_rows() > 0) {
			$result2 = array();
			foreach ($result as $res) {
				$result2[] = $res->event_id2;
			}
			$event_id2 = implode(',', $result2);
			$year = date('m-d');
			if ($year >= '04-01') {
				$year2 = date('Y-04-01');
				$year3 = date('Y-03-31', strtotime($year2 . '+1 years'));
				//print_r($year2);
				//print_r($year3);
			} else {
				$y = date('Y-m-d');
				$year2 = date('Y-04-01', strtotime($y . '-1 years'));
				$year3 = date('Y-03-31');
				// print_r($year2);
				// print_r($year3);
			}

			// print_r($result2); exit;
			$sql = $this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN ($event_id2)  and (`from_date` BETWEEN '$year2' AND '$year3') GROUP by month(from_date) order by from_date");
			// echo $this->db->last_query(); exit;
			return $sql;
		} else {
			$sql = $this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN (0)  GROUP by month(from_date) order by from_date");
			return $sql;
		}
	}

	public function total_work_per_month2($emp_id, $year)
	{
		$sql = "select event_id2 from event_attendance where emp_id='" . $emp_id . "'";
		$q = $this->db->query($sql);
		$result = $q->result();
		$sqlh = "SELECT * FROM `old_history_data` WHERE `emp_id` = '" . $emp_id . "'";
		$qh = $this->db->query($sqlh);
		$resulth = $qh->result();
		//print_r($result); 
		if ($q->num_rows() > 0 or $qh->num_rows() > 0) {
			$result2 = array();
			foreach ($result as $res) {
				$result2[] = $res->event_id2;
			}
			$event_id2 = implode(',', $result2);
			$year2 = date('Y-m-d', strtotime($year . '+1 years'));
			$year3 = date('Y-m-d', strtotime($year2 . ' -1 day'));
			if ($event_id2) {
			} else {
				$event_id2 = 0;
			}
			//$sql=$this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN ($event_id2) and (`from_date` BETWEEN '$year' AND '$year3')  GROUP by month(from_date) order by from_date");
			$sql = $this->db->query("(select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where id IN ($event_id2) and (`from_date` BETWEEN '$year' AND '$year3')  GROUP by month(from_date) order by from_date) UNION ALL (select MONTHNAME(fromdate) as month,sum(program_mandays) as days from old_history_data where emp_id = '$emp_id' and (`fromdate` BETWEEN '$year' AND '$year3') GROUP by month(fromdate) order by fromdate)");
			// echo $this->db->last_query(); exit
			return $sql;
		} else {
			$sql = $this->db->query("select MONTHNAME(from_date) as month,sum((datediff(to_date,from_date)+1) * (man_hours)) as days from event_details where event_id IN (0)  GROUP by month(from_date) order by from_date");
			return $sql;
		}
	}

	public function upcoming_events($emp_id)
	{
		/*$division_id =  $this->session->userdata['logged_in']['division_id'];
        $today_date=date('Y-m-d');
        $list=$this->db->select('*')->from('events')->where('from_date>',$today_date)->where('division_id',$division_id)->order_by('from_date','asc')->get();
        return $list->result();	*/


		$division_id =  $this->session->userdata['logged_in']['division_id'];
		$today_date = date('Y-m-d');

		$sql = "select * from assign_emp where employee_id='" . $emp_id . "'";
		// echo $sql;
		$q = $this->db->query($sql);
		if ($q->num_rows() > 0) {


			$result = $q->result();

			$event = array();
			foreach ($result as $res) {
				//$event_id=$res->event_id;

				$event[] = $res->event_id;
			}
			$event_id = implode(',', $event);

			$list = $this->db->query("select event_details.*, events.event_name,events.location from event_details left join events on events.id= event_details.event_id where event_id IN ($event_id) AND event_details.from_date > '" . $today_date . "' order by event_details.from_date asc");

			return $list->result();
		} else {
			$list = $this->db->query("select event_details.*, events.event_name,events.location from event_details left join events on events.id= event_details.event_id where event_id IN (0) AND event_details.from_date > '" . $today_date . "' order by event_details.from_date asc");

			return $list->result();
		}
	}

	public function pre_test_data($division_id, $emp_id)
	{

		$list = $this->db->select('test_result1.test_id,test.title')->select_sum('points')->from('test_result1')->join('test', 'test_result1.test_id=test.id', 'left')->where('test_type', '1')->group_by('test_result1.test_id')->where('emp_id', $emp_id)->get();
		return $list->result();
		// echo $this->db->last_query();
		// print_r($list->result()); exit;	
	}

	public function post_test_data($division_id, $emp_id)
	{
		$list = $this->db->select('test_result1.test_id,test.title,count(points) as count_points')->select_sum('points')->from('test_result1')->join('test', 'test_result1.test_id=test.id', 'left')->where('test_type', '2')->group_by('test_result1.test_id')->where('emp_id', $emp_id)->get();
		return $list->result();
		//print_r($list->result()); exit;	
	}
	/*------------edit profile------------*/
	public function edit_profile($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('emp', $data);
	}
	public function profile($id)
	{
		return $this->db->from('emp')->where('id', $id)->get();
		//$query=$this->db->from('emp')->where('id',$id)->get();
		//return $query;
	}

	public function test_detail($division)
	{
		/*$query=$this->db->from('test')->where('status','active')->where('test_type','1')->get();
		return $query;*/
		$today_date = date('Y-m-d');
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		return $this->db->query("select title from test WHERE test_type=1 and status = 'active' and course_id = (select course from event_details WHERE from_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id'))");
	}

	public function get_test_event_id($division)
	{

		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		$today_date = date('Y-m-d');
		$sql = "select event_id from event_details where from_date='" . $today_date . "'";

		$q = $this->db->query($sql);

		if ($q->num_rows() > 0) {
			$result = $q->result();

			//print_r($result); 
			$event = array();
			foreach ($result as $res) {
				//$event_id=$res->event_id;

				$event[] = $res->event_id;
			}
			$event_id = implode(',', $event);
			//$course=$res->course;
			$sql1 = "select event_id from assign_emp where event_id IN ($event_id) AND employee_id='" . $emp_id . "'";
			//echo $sql1;
			$q1 = $this->db->query($sql1);
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
		$today_date = date('Y-m-d');
		//$today_date='2019-04-06';
		$sql = "select event_id from event_details where from_date='" . $today_date . "'";
		//echo $sql; exit;

		$q = $this->db->query($sql);


		if ($q->num_rows() > 0) {
			$result = $q->result();

			//print_r($result); 
			$event = array();
			foreach ($result as $res) {
				//$event_id=$res->event_id;

				$event[] = $res->event_id;
			}
			$event_id = implode(',', $event);
			//$course=$res->course;
			$sql1 = "select * from assign_emp where event_id IN ($event_id) AND employee_id='" . $emp_id . "'";
			//echo $sql1;
			$q1 = $this->db->query($sql1);

			if ($q1->num_rows() > 0) {
				$resu1 = $q1->row();
				$event_id1 = $resu1->event_id;
				$qq = "select course from event_details where event_id='" . $event_id1 . "' AND from_date='" . $today_date . "'";
				$qq1 = $this->db->query($qq);
				$re1 = $qq1->row();
				$course_id = $re1->course;

				$id = "select id from test where course_id='" . $course_id . "' AND test_type='1' AND status='active'";
				//echo $id;
				$id12 = $this->db->query($id);
				$id1 = $id12->result();
				// print_r($id1); exit;
				foreach ($id1 as $row) {
					$id2 = $row->id;
				}
				if (empty($id2)) {
					$id2 = "aaa";
				}

				$query = $this->db->from('test_quations')->where('test_id', $id2)->get();
				return $query;
			} else {
				$query = $this->db->from('test_quations')->where('test_id', 0)->get();
				return $query;
			}
		} else {
			$query = $this->db->from('test_quations')->where('test_id', 0)->get();
			return $query;
		}
	}
	public function test1($division)
	{
		$id1 = $this->db->select('id')->from('test')->where('status', 'active')->where('test_type', '1')->get()->result();
		foreach ($id1 as $row) {
			$id2 = $row->id;
		}
		if (empty($id2)) {
			$id2 = "aaa";
		}
		return $query = $this->db->select('count(id) count1')->from('test_quations')->where('test_id', $id2)->get();
		//print_r($query); exit();
	}
	public function test_sub($emp_id, $division)
	{
		$today_date = date('Y-m-d');
		//$course_id = $this->db->query("select course from event_details WHERE from_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id')")->result();

		//print_r($course_id); exit();
		//$id1=$this->db->select('id')->from('test')->where('status','active')->where('test_type','1')->where('course_id',$course_id)->get()->result();
		$id1 = $this->db->query("select * from test where status='active' and test_type=1 and course_id=(select course from event_details WHERE from_date = '$today_date' and event_id in(select event_id from assign_emp where employee_id='$emp_id'))")->result();
		foreach ($id1 as $row) {
			$id2 = $row->id;
		}
		if (empty($id2)) {
			$id2 = "aaa";
		}
		$query = $this->db->select('count(id) count2')->from('test_result1')->where('test_id', $id2)->where('emp_id', $emp_id)->get()->result();
		foreach ($query as $row) {
			$aaa = $row->count2;
		}
		return $aaa;
	}
	public function test_result($emp_id)
	{
		return $this->db->query("SELECT t.emp_id as emp_id, t.test_id as test_id ,SUM(t.points) as points, t2.title title FROM test_result1 t LEFT JOIN test t2 ON t.test_id=t2.id WHERE t.emp_id='$emp_id' AND t2.test_type=1 GROUP by t.test_id");
	}
	// pre test //
	public function pre_test_list()
	{    //course 
		$emp_id = $this->session->userdata['superadmin_login']['id'];
		$sql = "SELECT programs.id as test_id,assign_emp.program_id as program_id,assign_emp.employee_id as emp_id, programs.id as id, programs.course_name as course_id,( CASE WHEN assign_emp.pre_test_complete =1 THEN 1 WHEN (assign_emp.pre_test_complete is null || assign_emp.pre_test_complete!=1) && CAST(concat(programs.to_date,' ',programs.end_time) AS DATETIME)>=now() THEN 2 WHEN (assign_emp.pre_test_complete is null || assign_emp.pre_test_complete!=1) && CAST(concat(programs.to_date,' ',programs.end_time) AS DATETIME)<now() THEN 3 ELSE 0 END) as status, course.course_title FROM `assign_emp` Inner JOIN programs on assign_emp.program_id=programs.id Inner JOIN course on programs.course_name=course.id WHERE employee_id ='" . $emp_id . "'";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function post_test_list()
	{
       $emp_id = $this->session->userdata['superadmin_login']['id'];
	  
		$sql = "SELECT  programs.id as test_id,assign_emp.program_id as program_id,assign_emp.employee_id as emp_id, programs.id as id, programs.course_name as course_id,( CASE WHEN assign_emp.post_test_complete =1 THEN 1 WHEN (assign_emp.post_test_complete is null || assign_emp.post_test_complete!=1) && CAST(concat(programs.to_date,' ',programs.end_time) AS DATETIME)>=now() THEN 2 WHEN (assign_emp.post_test_complete is null || assign_emp.post_test_complete!=1) && CAST(concat(programs.to_date,' ',programs.end_time) AS DATETIME)<now() THEN 3 ELSE 0 END) as status, course.course_title FROM `assign_emp` Inner JOIN programs on assign_emp.program_id=programs.id Inner JOIN course on programs.course_name=course.id WHERE
        Date(NOW()) >=  programs.to_date  AND round(TIME_TO_SEC(TIMEDIFF(programs.end_time,TIME(NOW()))))<3600 AND employee_id ='" . $emp_id ."'";
		 
		 
		$query = $this->db->query($sql);
		return $query;
		 
	}
	
	public function pre_test_detail($test_id,$course_id)
	{
		return $this->db->query("SELECT id,test_id,quations,image,option1,option2,option3,option4,answer FROM test_quations WHERE
		                        test_id=$course_id AND test_type=1");  
								// AND event_details.course =$course_id	
	}
	public function post_test_detail($test_id,$course_id)
	{
		return $this->db->query("SELECT id,test_id,quations,image,option1,option2,option3,option4,answer FROM test_quations WHERE
		                        test_id=$course_id AND test_type=2");  
								// AND event_details.course =$course_id	
	}
	public function pre_test($test_id)
	{
		return $this->db->query("SELECT * FROM test_quations WHERE test_id= $test_id");
	}
	 public function pre_test_sub($course_id,$test_id)
	{
		$emp_id = $this->session->userdata['superadmin_login']['id'];
		 
			 $sql ="SELECT test_type1,COUNT(id) as count2
					FROM test_result1
					WHERE test_type1=1";
					 
					$query=$this->db->query($sql);
					
					$result=$query->result();
					return $result;			 
	}
	 public function post_test_sub($course_id,$test_id)
	{
		$emp_id = $this->session->userdata['superadmin_login']['id'];
		 
			 $sql ="SELECT test_type1,COUNT(id) as count2
					FROM test_result1
					WHERE test_type1=1";
					 
					$query=$this->db->query($sql);
					
					$result=$query->result();
					return $result;			 
	}

	public function pre_test_result($emp_id)
	{
		$sql = "SELECT SUM(A.points) as points,COUNT(A.points) as total,A.test_id,A.emp_id,B.course_title,C.from_date,C.to_date,C.start_time,A.test_type1 FROM `test_result1`	 A
					INNER JOIN programs C on C.id=A.event_id 
					INNER JOIN course B on B.id=A.test_id 
					INNER JOIN test_quations D on D.id=A.q_id
					WHERE D.test_type=1 AND A.emp_id='$emp_id' group by A.test_id";
	}
    public function post_test_result($emp_id)
	{
		$sql = "SELECT SUM(A.points) as points,COUNT(A.points) as total,A.test_id,A.emp_id,B.course_title,C.from_date,C.to_date,C.start_time,A.test_type1 FROM `test_result1`	 A
					INNER JOIN programs C on C.id=A.event_id 
					INNER JOIN course B on B.id=A.test_id 
					INNER JOIN test_quations D on D.id=A.q_id
					WHERE D.test_type=1 AND A.emp_id='$emp_id' group by A.test_id";
	}
	public function pre_test_resultbycourse($emp_id, $test_id)
	{
		$sql = "SELECT SUM(A.points) as points,COUNT(A.points) as total,A.test_id,A.emp_id,B.course_title,C.from_date,C.to_date,C.start_time,A.test_type1,C.id as prgram_id,B.id as course_id,A.q_id FROM `test_result1` A
			INNER JOIN programs C on C.id=A.program_id 
			INNER JOIN course B on B.id=A.test_id 
			INNER JOIN test_quations D on D.id=A.q_id";
  
		return $this->db->query($sql);
	}
    public function post_test_resultbycourse($emp_id, $test_id)
	{
		$sql = "SELECT SUM(A.points) as points,COUNT(A.points) as total,A.test_id,A.emp_id,B.course_title,C.from_date,C.to_date,C.start_time,A.test_type1,C.id as prgram_id,B.id as course_id,A.q_id FROM `test_result1` A
			INNER JOIN programs C on C.id=A.program_id 
			INNER JOIN course B on B.id=A.test_id 
			INNER JOIN test_quations D on D.id=A.q_id";
  
		return $this->db->query($sql);
	}
	

	 
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
     public function percentage_result($emp_id,$program_id,$test_id,$q_id,$test_type){
	        $sql = "SELECT SUM(A.points) as points,COUNT(A.points) as total
	                FROM `test_result1`A  
                    WHERE A.emp_id='$emp_id' and A.program_id ='$program_id' and A.test_id ='$test_id' and A.test_type1 = '$test_type' group by A.test_id";
                    $q=$this->db->query($sql);
            	    $result=$q->result();
            	     //print_r($result);exit;
            	   $percentage = round($result[0]->points * 100 / $result[0]->total,2);  
                   //print_r($percentage);exit;				   
            	   if($test_type==1){
                	   $updata = array(
                    			'pre_test_complete' =>1,
                    			'no_of_que_pre_test' =>$result[0]->total,
                    			'no_of_ans_pre_test' =>$result[0]->points,
                    			'pre_test_complete_at' =>date('Y-m-d')
            			);  
                   }else{
            	       $updata = array(
            	                'no_of_qus_post_test' =>$result[0]->total,
                    			'no_of_ans_post_test' =>$result[0]->points,
                    			'post_test_complete' =>1,
                    			'post_test_complete_at' =>date('Y-m-d')
            			);
            	    }						
						$this->db->where('program_id',$program_id)->where('employee_id',$emp_id);
                        $query=$this->db->update('assign_emp', $updata);
						 
            	   } 
            	   
            	     
	      
 
	 
   public function test2( $emp_id,$course_id,$program_id,$test_type)
	{
		  $sql="SELECT A.*,B.test_type1,B.answer answer2 
		                         FROM test_quations A 
								 LEFT JOIN test_result1 B ON A.id=B.q_id 
								 WHERE A.test_id=$course_id AND B.emp_id='$emp_id' AND B.test_type1 = '$test_type' AND B.program_id='$program_id'"; 
		return $this->db->query($sql);
								 // WHERE A.test_id=41 AND B.emp_id=2 AND B.test_type1 = 1 AND B.program_id=1722
		//return $query;
	}
	
	 
	
	public function evaluation_list()
	{
	    $emp_id = $this->session->userdata['superadmin_login']['id'];
		
		$date = date('Y-m-d');
	 	 $sql="SELECT A.id,B.course_name,B.id as event_id,A.evalu_test_complete,C.course_title as title,D.id as          eva_id,D.course_id,A.program_id,F.eve_id as answer_id,B.id as event_id,A.evalu_test_complete
				FROM assign_emp A 
				INNER JOIN programs B on B.id=A.program_id
				INNER JOIN course C on C.id = B.course_name
				INNER JOIN evaluation D on D.course_id=C.id
				INNER JOIN evaluation_quations E on E.evaluation_id=D.id
				LEFT JOIN evaluation_result F on F.eve_id=D.id 
				WHERE A.employee_id='$emp_id' group by A.employee_id,B.course_name order by C.id desc";        
		return $this->db->query($sql)->result();
	}
	
	
	public function evaluation_cmp()
	{
		$emp_id = $this->session->userdata['logged_in']['emp_id'];
		return $this->db->query("SELECT eve_id,event_id,event_id2 FROM evaluation_result WHERE emp_id = '$emp_id' GROUP BY eve_id")->result();
	}
	public function evaluation($id, $emp_id)
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
		$emp_id = $this->session->userdata['superadmin_login']['id'];
		return $this->db->query("SELECT * FROM evaluation_quations WHERE evaluation_id =$id AND `evaluation_quations`.`status` = 1 ORDER BY `evaluation_quations`.`id` DESC");
	}
	public function evaluation_quations_details($id,$event_id1,$event_id2)
	{
	    $today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['superadmin_login']['id'];
	     
			$sql="SELECT A.id AS id,A.title AS title,A.course_id,B.id AS event_id,C.name AS facult_name 
				  FROM `evaluation` A  
				  INNER JOIN programs B on B.course_name=A.course_id
				  INNER JOIN faculty C on C.id=B.faculty_name
			  WHERE B.id='$event_id1' GROUP BY course_id ORDER BY A.id DESC";
	          return $this->db->query($sql);
	    
	}
	public function evaluation_sub($id,$event_id1,$event_id2)                //,
	{
	    $today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['superadmin_login']['id'];
	   
	    $sql ="SELECT * FROM evaluation_result WHERE emp_id = '$emp_id' AND eve_id = $id AND event_id = $event_id1";  
		// $sql ="SELECT * FROM evaluation_result WHERE emp_id = '$emp_id' AND eve_id = $id AND event_id = $event_id1";  
	    $query = $this->db->query($sql);
	    
	        if ($query->num_rows() >= 1)
	     {
	    	return 1;
			
	     } else {
			
	    	return 2;
	     }
    }
	public function evaluatedResult($id,$event_id1,$event_id2)                //,
	{    
	    $today_date=date('Y-m-d');
		$emp_id = $this->session->userdata['superadmin_login']['id'];
	   
	    $sql ="SELECT * FROM evaluation_result WHERE emp_id = '$emp_id'  ";  
		
		 
	    $query = $this->db->query($sql);
		
		 
	    
	    return $query;
    }
	public function event_attend($data)
	{
		$emp_id = $data['emp_id'];
		$event_id = $data['event_id'];
		$event_id2 = $data['event_id2'];
		$query = $this->db->query("select * from event_attendance where emp_id='$emp_id' and event_id=$event_id and event_id2=$event_id2");
		if ($query->num_rows() >= 1) {
			return 1;
		} else {
			$query1 = $this->db->insert('event_attendance', $data);
			return 2;
		}
	}
	public function evaluation_submit($data)
	{

		if (!empty($data['quations'])) {

			//print_r($data);exit();
			$query = $this->db->insert('evaluation_result', $data);
		}
	}

	public function course()
	{
		return $this->db->from('course_user')->order_by('id', 'desc')->get();
		//return $this->db->from('course')->get();
		//$emp_id = $this->session->userdata['logged_in']['emp_id'];
		// return $this->db->query("SELECT * FROM `course_user` WHERE id in(select course from event_details where event_details.event_id in(SELECT event_id from assign_emp where assign_emp.employee_id = '$emp_id')) ORDER by course_user.id DESC");

	}

	public function single_course($id)
	{
		return $this->db->from('course')->where('id', $id)->get();
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
		$query = $this->db->insert('individual_budget', $data);
	}

	//---------- changeyourpassword ----
	public function changeyourpassword($password)
	{
		if (isset($this->session->userdata['logged_in']['id'])) {
			$id = $this->session->userdata['logged_in']['id'];
			$check_pass =  $this->db->select('password')->get_where('emp', array('id' => $id, 'password' => $password));

			return $check_pass->result();
		}
	}

	public function profileedit($data1)
	{
		if (isset($this->session->userdata['logged_in']['id'])) {
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
	public function servayA()
	{
		return $this->db->from('servay')->where('servay_catgory', 'A')->where('servay_status', 1)->ORDER_BY('servay_id', 'ASC')->get();
	}
	public function servayB()
	{
		return $this->db->from('servay')->where('servay_catgory', 'B')->where('servay_status', 1)->ORDER_BY('servay_id', 'ASC')->get();
	}
	public function servayC()
	{
		return $this->db->from('servay')->where('servay_catgory', 'C')->where('servay_status', 1)->ORDER_BY('servay_id', 'ASC')->get();
	}
	public function servayD()
	{
		return $this->db->from('servay')->where('servay_catgory', 'D')->where('servay_status', 1)->ORDER_BY('servay_id', 'ASC')->get();
	}
	public function servayE1()
	{
		return $this->db->from('servay')->where('servay_catgory', 'E1')->where('servay_status', 1)->ORDER_BY('servay_id', 'ASC')->get();
	}
	public function servayE2()
	{
		return $this->db->from('servay')->where('servay_catgory', 'E2')->where('servay_status', 1)->ORDER_BY('servay_id', 'ASC')->get();
	}
	/*-----------------servayA---------------------*/
	public function servay_submit($data)
	{

		if (!empty($data['servay_id'])) {

			//print_r($data);exit();
			$query = $this->db->insert('servay_result', $data);
		}
	}
	public function servay_emp($data)
	{
		$q1 = $this->db->from('servay_emp')->where('emp_id', $data['emp_id'])->get();
		if ($q1->num_rows() == 0) {
			$query = $this->db->insert('servay_emp', $data);
			$i = $this->db->insert_id();
			return $i;
		}
	}
	public function servay_sub($emp_id)
	{
		$q1 = $this->db->from('servay_emp')->where('emp_id', $emp_id)->get();
		if ($q1->num_rows() >= 1) {
			return 1;
		} else {
			return 0;
		}
	}
	public function test_start_pretest($test_id,$emp_id){
			 $sql = "SELECT A.id,A.from_date,A.to_date,A.start_time,A.end_time,B.id as assign_emp_id,B.employee_id,SUBTIME(a.end_time,date('H:i')) AS test
			 FROM programs A
			 INNER JOIN assign_emp B on B.program_id = A.id
			 WHERE A.id = '$event_id1' AND B.employee_id = '$emp_id' AND date(to_date)=date(now()) AND TIMESTAMPDIFF(MINUTE,time(now()),time(end_time))<=120";
            $test_start=$this->db->query($sql);
            $test_list=$test_start->result();
             return $test_start->num_rows(); 
     }
	  public function test_start_evaluationtest($emp_id){
         $sql = "SELECT A.id,A.from_date,A.to_date,A.start_time,A.end_time,B.id AS assign_emp_id,B.employee_id,SUBTIME(A.end_time,date('H:i')) AS test
         FROM programs A
         INNER JOIN assign_emp B on B.program_id = A.id
         WHERE B.employee_id = 2"; 
         $test_start=$this->db->query($sql);
         $test_list=$test_start->result();
         return $test_start->num_rows(); 
     }
	 /* public function test_start_evaluationtest($event_id1,$emp_id){
         $sql = "select a.id,a.from_date,a.to_date,a.start_time,a.end_time,b.id as assign_emp_id,b.employee_id,SUBTIME(a.end_time,date('H:i')) as test
         from programs a
         inner join assign_emp b on b.program_id = a.id
         where a.id = '$event_id1' and b.employee_id = '$emp_id' and TIMESTAMPDIFF(MINUTE, NOW(), concat(to_date,' ',end_time))<=60"; 
         $test_start=$this->db->query($sql);
            $test_list=$test_start->result();
                return $test_start->num_rows(); 
     }*/
	 public function update_ass_emp($event_id,$emp_id){
	    $updata = array(
    			'evalu_test_complete' =>1,
    			'evalu_complete_at' =>date('Y-m-d')
    			);
			$this->db->where('program_id',$event_id)->where('employee_id',$emp_id);
            $query=$this->db->update('assign_emp', $updata);
            return $event_id;
	}
	public function update_test_complete($event_id,$emp_id){
        $updata = array(
            	       'test_complete'=>2
            			);
            	   
            	    $this->db->where('program_id',$event_id)->where('employee_id',$emp_id);
                    $query=$this->db->update('assign_emp', $updata);
    }
	public function update_cost($event_id,$emp_id){
        $sql="select a.id,a.cost_per_program from programs a where id='$event_id'";
        $cost=$this->db->query($sql);
        $program_cost=$cost->result();
        $sql="select id,program_id,employee_id from assign_emp a where program_id='$event_id' and test_complete=2";
        $test_complete_list=$this->db->query($sql);
        $test_list=$test_complete_list->result();
        $num_of_employee= $test_complete_list->num_rows();
        $give_the_cost = ($program_cost[0]->cost_per_program/$num_of_employee);
        foreach($test_list as $row){
				$employee_id = $row->employee_id;
				$updata = array(
            	       'program_cost'=>$give_the_cost
            			);
            	   
            	    $this->db->where('program_id',$event_id)->where('employee_id',$employee_id);
                    $query=$this->db->update('assign_emp', $updata);
			}
			return $query;
    }
}
