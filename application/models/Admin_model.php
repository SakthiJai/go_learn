<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Admin_model extends CI_model {
    		//------------------------------- login ----------------//
	public function login($data) {
		$query = $this->db->from('admin')->where('user_name',$data['user_name'])->where('password ',$data['password'])->limit(1)->get();
	    if ($query->num_rows() == 1)
	    {
	    	return $query;
	    } else {
	    	return false;
	    }
	} 
	public function emp()
    {
        return $this->db->from('emp')->where('emp_status', 1)->order_by('id','desc')->get();
    }
	public function division(){
		return $this->db->from('divisions')->order_by('id','desc')->get();
	}
	public function divisions1(){
		return $this->db->from('divisions')->order_by('id','divisions')->get();
	}
    public function addingemp($emp_id,$insertUserData){
        $query =$this->db->query("select * from emp where emp_id = $emp_id");
           if ($query->num_rows() >= 1){
               return false;
           } else {
               return $this->db->insert('emp',$insertUserData);
           }
     }
	public function emp_history(){
       $list= $this->db->from('emp_history')->get();
        return $list->result();   
     }
        /*------------------------division------------------------------*/
    public function divisions(){
		return $this->db->from('divisions')->order_by('id','desc')->get();
	}
	public function editdivision($id){
        return $this->db->from('divisions')->where('id',$id)->get();	
    }
    public function updatedivision($id,$data){
        return $this->db->where('id',$id)->update('divisions',$data);	
    }
	public function adddivision($insertUserData){
		return $this->db->insert('divisions',$insertUserData);
    }
    
    /*--------------------division--------------------------*/
         /*--------------------faculty--------------------------*/
    public function faculty()
    {
		return $this->db->from('faculty')->order_by('id','desc')->get();
	}
	public function faculty1()
    {
		return $this->db->from('faculty')->order_by('name','ASC')->get();
	}
	
	public function editfaculty($id){
        return $this->db->from('faculty')->where('id',$id)->get();	
    }
    
    public function updatefaculty($id,$data){
        return $this->db->where('id',$id)->update('faculty',$data);	
        
    }
    
	public function addfaculty($insertUserData)
    {
		return $this->db->insert('faculty',$insertUserData);
    }

    public function faculty_delete($id)
    {
    $this->db->where('id',$id);
        $this->db->delete('faculty');
        if($this->db->affected_rows() > 0){
		return true;
        }else{
            return false;

        } 
    }
         /*--------------------faculty--------------------------*/
         /*--------------------course-------------------------*/
    public function course(){
            return $this->db->from('course')->order_by('id','DESC')->get();
    }
    public function course1(){
            return $this->db->from('course')->order_by('course_title','ASC')->get();
    }
    public function coursedata($id){
            return $this->db->from('course')->where('id',$id)->get()->row_array();
    }
    public function course_adding($data)
    {
        $this->db->insert('course',$data);
        return $this->db->insert_id();
    } 
    public function courese_name($id){
      $c =  $this->db->from('course')->where('id',$id)->get()->row_array();
      //print_r($c);exit();
        return $c['course_title'];
    }
    public function feedback_question()
    {
        return $this->db->select('quations,type')->from('feedback_quations2')->order_by('id','DESC')->get()->result();
    }
    public function feedback_questionadd($Data1)
    {
		return $this->db->insert('feedback_quations',$Data1);
    }
    public function feedback_questions($id){
         return $this->db->from('feedback_quations')->where('course_id',$id)->order_by('id','desc')->get();
    }
    public function addfeedback_quation($Data)
    {
		return $this->db->insert('feedback_quations',$Data);
    }
    public function delete_feedback_quations($id){
        $this->db->where('id',$id);
        $this->db->delete('feedback_quations');
        if($this->db->affected_rows() > 0){
		    return true;
        }else{
            return false;
        }
    }
    public function activefeedback_quation($id){
        	return $this->db->where('id',$id)->update('feedback_quations',array('status' => 1));
    }
    public function inactivefeedback_quation($id){
        	return $this->db->where('id',$id)->update('feedback_quations',array('status' => 2));
    }
         /*--------------------course--------------------------*/
         /*--------------------test--------------------------*/
    public function pretestquestions_adding($data){
        return $this->db->insert('pretest_questions',$data);
    }
    public function pertest_questions($id){
        return $this->db->from('pretest_questions')->where('course_id',$id)->get();
    }
    public function posttestquestions_adding($data){
        return $this->db->insert('posttest_questions',$data);
    }
    public function posttest_questions($id){
        return $this->db->from('posttest_questions')->where('course_id',$id)->get();
    }

         /*--------------------test--------------------------*/
         /*--------------------program_types--------------------------*/
    public function program_types()
    {
		return $this->db->from('program_types')->order_by('id','desc')->get();
	}
	public function editprogram_types($id){
        return $this->db->from('program_types')->where('id',$id)->get();	
    }
    public function updateprogram_types($id,$data){
        return $this->db->where('id',$id)->update('program_types',$data);	
    }
	public function addprogram_types($insertUserData)
    {
		return $this->db->insert('program_types',$insertUserData);
    }
    /*--------------------program_types--------------------------*/
    /*--------------------program--------------------------*/
    public function creatingprogram($data){
        $this->db->insert('programs',$data);
        return $this->db->insert_id();
    }
    
    public function creating($data){
        $this->db->insert('events',$data);
        return $this->db->insert_id();
    }
    
    public function creatingevent($data1){
        $this->db->insert('events', $data1);
        return $this->db->insert_id();
    }
    public function programs(){
        return $this->db->select('programs.*,divisions.divisions as division')->from('programs')->JOIN('divisions','programs.division_id=divisions.id','left')->order_by('programs.id','desc')->get();
    }
    public function selectemp_ids($division_id,$emp_ids){
        if($division_id == 0){
            $str="emp.division_id >= 0";
        } else {
            $str="emp.division_id = $division_id";
        }
        $list = $this->db->query("select emp.emp_id,emp.name,emp.division_id from emp where emp_id in ($emp_ids) ORDER by emp_id DESC");
        return $list->result();
    }
    public function addassignemp($data){
        $this->db->insert('assign_emp',$data);
        return 1;
    }
    public function assigned_emp($id){
        $assigned_emp = $this->db->query("select assign_emp.*,emp.name from assign_emp left join emp on  emp.emp_id = assign_emp.employee_id  where assign_emp.program_id = $id order by assign_emp.employee_id");
        return $assigned_emp;
    }
    public function assigned_empdelete($id){
        $this->db->where('id',$id)->delete('assign_emp');
        return true;
    }
    public function checkttt($program_id){
        $query =  $this->db->query("select * from programs where id = $program_id and ttt='TTT'");
        if ($query->num_rows() >= 1)
	    {
	    	return 1;
	    } else {
	        return 0;
	    }
    }
    public function insertfaculty($empid,$program_id){
        $query = $this->db->query("select * from emp where emp_id = $empid")->result();
        foreach($query as $quer){
            $query1 = array(
            'emp_id' => $quer->emp_id,
            'program_id' => $program_id,
            'name' => $quer->name,
            'mobile' => $quer->mobile,
            'email' => $quer->email,
            'company_name' => 'Coromandel International Limited',
            'state' => $quer->state,
            );
        }
        return $this->db->insert('faculty',$query1);
    }
    public function p_course($p_id){
        return $this->db->select('events.*,course.course_title as course,faculty.name as faculty_name')
                        ->from('events')->JOIN('course','events.course_id=course.id','left')
                        ->JOIN('faculty','events.faculty_id=faculty.id','left')
                        ->where('events.program_id',$p_id)
                        ->order_by('events.id','desc')->get();
    }
    /*--------------------- Evalution ------------------*/
    	 
		public function admin_evaluation()
    {
		return $this->db->from('evaluation')->order_by('id','desc')->get();
	}
		public function editadmin_evaluation($id)
	{
		return $this->db->from('evaluation')->where('id',$id)->get();
	}
		public function updateadmin_evaluation($inputdata,$id)
	{
        return $this->db->where('id',$id)->update('evaluation',$inputdata);
    }
    	public function admin_addevaluation($insertUserData)
    {
		 $this->db->insert('evaluation',$insertUserData);
		return $this->db->insert_id();
		
    }
     public function admin_evaluationqus()
    {
        return $this->db->select('quations,type')->from('evaluation_quations2')->order_by('id','DESC')->get()->result();
    }
    public function admin_evaluationqusgroup()
    {
        return $this->db->select('quations,type')->from('evaluation_quations2')->group_by('type')->order_by('id','DESC')->get()->result();
    }
    public function admin_evaluationdata()
    {
        $assigned_emp = $this->db->query("SELECT * ,GROUP_CONCAT(quations) as groupquations FROM (select A.id as pid,A.course_name,G.program_name,F.group_name,A.training_type ,B.course_title,C.id as eveid,D.id, D.quations,D.type ,E.answer,E.emp_id from programs A 
inner join course B on B.id=A.course_name
inner join evaluation C on C.course_id = B.id
inner join evaluation_quations D on D.evaluation_id = C.id
left join evaluation_result E on (E.eve_id=C.id and E.event_id=A.id)
inner join program_group F on F.id=A.program_group_name
inner join program G on G.id=A.program_group_name
where 1
group by A.id,B.id,C.id,D.id
order by A.id desc,D.type asc limit 1000) AS AA GROUP BY AA.pid,AA.course_name,AA.eveid,AA.type order by AA.pid desc");
        return $assigned_emp;
    }
    public function admin_addevaluation2($Data1)
    {
		return $this->db->insert('evaluation_quations',$Data1);
    }
     public function evaluation_quations($id)
    {
        return $this->db->from('evaluation_quations')->where('evaluation_id',$id)->order_by('id','desc')->get();
    }
    public function addevaluation_quation($insertUserData)
    {
        //return $insertUserData;
		 $this->db->insert('evaluation_quations',$insertUserData);
		 return $this->db->insert_id();
    }
    public function check_evaluation($evaluation_id,$quations,$type)
    {
         $sql ="select *
        from evaluation_quations 
        where evaluation_id = '$evaluation_id' and type='$type'";
        $check_evaluation=$this->db->query($sql);
       return $check_evaluation->num_rows();
    }
      public function activeevaluation_quation($id,$status) 
    {
		if($status==2){$status1=1;}else{$status1=2;}
        	return $this->db->where('id',$id)->update('evaluation_quations',array('status' => $status1));
    }
     public function delete_evaluation_quations($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('evaluation_quations');
        if($this->db->affected_rows() > 0){
		return true;
        }else{
            return false;

        }
    }
    public function evaluation_result($from_date='',$to_date='')
    {
        $str= 'evaluation.id> 0';
        if($from_date!=''){
            $str= $str.' AND evaluation.to_date>="'.$from_date.'"';
        }
        if($to_date!=''){
        $str= $str.' AND evaluation.to_date<="'.$to_date.'"';
        }
       
        $date = date('Y-m-d');
        //return $this->db->from('evaluation')->where($str)->order_by('id','asc')->get();
        return $this->db->query("SELECT A.ev_id as id1,A.tit as title1,A.facultyname as facultyname1,A.eventID as event_id,A.eventId2 as event_id2,A.to_date as to_date,events.event_name as event_name1 FROM events JOIN (SELECT evaluation.id AS ev_id,evaluation.title AS tit,event_details.facult_name AS facultyname,event_details.event_id AS eventID, event_details.id AS eventId2,event_details.to_date AS to_date FROM `evaluation` JOIN event_details ON evaluation.id=event_details.evaluation where  event_details.to_date<='$date') A ON A.eventID=events.id where A.eventId2 in (select event_id2 from event_attendance) ORDER BY A.to_date DESC");
    }
    	public function evaluation_graph($id,$event_id,$event_id2)
	{
		return $this->db->query("SELECT quations,CAST(avg(answer) as decimal(10,2)) as answer,type FROM `evaluation_result` where eve_id=$id AND event_id=$event_id AND event_id2=$event_id2 AND quations!='Suggestions for improvement' GROUP BY `type` ORDER BY id")->result();
	}
		public function program_group()
    {
		return $this->db->from('program_group')->order_by('id','desc')->get();
	}
	public function exitcourse($course,$id){
		//print_r($id);exit;
	    if($id==''){
        $query = $this->db->from('course')->where('course_title',$course)->get();
	    }
	    else
	    {
	        $query = $this->db->from('course')->where('course_title',$course)->where('id !=',$id)->get();
	    }
        if ($query->num_rows() >= 1){
	    	return 2;
	    } else {
	    	return 1;
	    }
	}
	public function getCourse($id)
	{
	    
	    	return $this->db->where('id',$id)->get('course')->result();
	
	
	}
	 public function instructor_course_adding($data)
    {
        return $this->db->insert('course',$data);
    }
    public function course_updating($data,$id)
    {
        if($this->db->where('id',$id)->update('course',$data))
		{
			return $id;
		}
    }
    public function evalutionUpdate($course,$evalution)
    {
        return $this->db->where('id',$evalution)->update('evaluation',array('course_id'=>$course));
    }
    public function getPretestList()
    {
        return  $this->db->select('course.*')
		                ->from('course')->where('pretest_id',1)
		                ->order_by('id','desc')->get();
	
    }
     public function getPosttestList()
    {
        return  $this->db->select('course.*')
		                ->from('course')->where('posttest_id',1)
		                ->order_by('id','desc')->get();
    }
    public function getPreposttestList()
    {
        return  $this->db->select('course.*')
		                ->from('course')->where('pre_and_post',1)
		                ->order_by('id','desc')->get();
    }
    public function deleteCourse($id)
    {
         return $this->db->where('id',$id)->delete('course');
    }
    public function testquation($id,$type)
	{
		//print_r($id);exit;
	   if($type==3){
	       return $this->db->from('test_quations')->group_by('quations')->where('test_id',$id)->get()->result();
	   }else{
	       return $this->db->from('test_quations')->where('test_id',$id)->where('test_type',$type)->get()->result();
	   }
	}
	public function testquation1($id,$type)
	{
	       return $this->db->from('test_quations')->where('test_id',$id)->where('test_type',$type)->get()->result();
	}
	public function testtile($id)
	{
		return $this->db->from('course')->where('id',$id)->get()->result();
	}
	public function deletetestquation($id){
	    $this->db->where('id',$id);
        $this->db->delete('test_quations');
        if($this->db->affected_rows() > 0){
		    return true;
        }else{
            return false;
        }
	}
		public function addquation($insertUserData)
    {
       
            return $this->db->insert('test_quations',$insertUserData);
        
	
    }
    	public function addpostquation($insertUserData)
    {
		return $this->db->insert('test_quations',$insertUserData);
    }
      public function addprepostquation($insertUserData)
    {
		return $this->db->insert('test_quations',$insertUserData);
    }
	public function edittestquation($id){
        $list=$this->db->from('test_quations')->where('id',$id)->get();
        return $list->row();
    }
    public function updatequation($id,$data){
        $this->db->where('id',$id)->update('test_quations',$data);
        return true;
    }
   public function attendance_events()
    {
        $date = date('Y-m-d');
        //return $this->db->query("select * from events");
        /*echo "select events.*, event_details.facult_name, event_details.id as event_id2, event_details.to_date as to_date from events left join event_details on event_details.event_id = events.id where event_details.to_date <= '$date' ORDER BY event_details.to_date DESC";*/
    /*$sql="select events.*, event_details.facult_name, event_details.id as event_id2, event_details.to_date as to_date from events left join event_details on event_details.event_id = events.id where event_details.to_date <= '$date' ORDER BY event_details.to_date DESC";
   print_r($sql);exit;*/
   $sql="SELECT  A.*,A.id as test_id,B.to_date ,D.name as faculty_name,B.nature_program,C.id as course_id,D.id as name, B.id as event_id,C.course_title FROM `assign_emp` 
         A left join programs B on B.id=A.program_id 
          left join course C on C.id=B.course_name
        left join  faculty D on D.id=B.faculty_name
             where B.to_date<='$date' 
            group by B.id ORDER BY A.`id` DESC";
    return $this->db->query($sql);
    

    }
      public function attendance($id,$program_id)
    {
       // return $this->db->query("select individual_budget.emp_id,emp.emp_id,emp.name,emp.mobile,emp.email,emp.state,emp.division,emp.organisation_unit,emp.function,emp.sbu,emp.grade,emp.designation,emp.dob,emp.doj from individual_budget left join emp on individual_budget.emp_id=emp.emp_id where individual_budget.event_id=$id");
           //$sql="select event_attendance.emp_id,emp.emp_id,emp.name,emp.mobile,emp.email,emp.state,emp.division,emp.organisation_unit,emp.function,emp.sbu,emp.grade,emp.designation,emp.dob,emp.doj from event_attendance left join emp on event_attendance.emp_id=emp.emp_id where event_attendance.event_id=$id and event_attendance.event_id2=$event_id2 group by event_attendance.emp_id";
          //print_r($sql);exit;
          /*$sql="SELECT A.id as test_id,B.id as program_id,A.employee_id as emp_id,D.id,D.name,D.sbu,D.email,D.mobile,D.state,D.grade,D.division,D.organisation_unit,D.function,D.designation
FROM assign_emp A
left join programs B on B.id=A.program_id 
left join  emp D on D.emp_id=A.employee_id
where A.program_id =$program_id group by B.id ORDER BY A.id DESC";*/
$sql="SELECT A.id as test_id,B.id as program_id,A.employee_id as emp_id,D.id,D.name,D.sbu,D.email,D.mobile,D.state,D.grade,D.division,D.organisation_unit,D.function,D.designation,D.dob,D.doj,
E.event_id as evaluation_result_status,F.event_id as post_test_status,A.program_id as pre_test_status,B.from_date,datediff(now(), date(B.from_date)) as expiredDate
FROM assign_emp A
left join programs B on B.id=A.program_id 
left join  emp D on D.emp_id=A.employee_id
left join evaluation_result E on (E.emp_id=A.employee_id and B.id=E.event_id)
left join test_result1 F on (F.emp_id=A.employee_id and F.event_id=B.id)
where A.program_id =$program_id group by B.id,A.employee_id ORDER BY A.id DESC";
        return $this->db->query($sql);
       
        
       
    }
    
    public function attend_attendance($id,$program_id)
    {
       // return $this->db->query("select individual_budget.emp_id,emp.emp_id,emp.name,emp.mobile,emp.email,emp.state,emp.division,emp.organisation_unit,emp.function,emp.sbu,emp.grade,emp.designation,emp.dob,emp.doj from individual_budget left join emp on individual_budget.emp_id=emp.emp_id where individual_budget.event_id=$id");
           //$sql="select event_attendance.emp_id,emp.emp_id,emp.name,emp.mobile,emp.email,emp.state,emp.division,emp.organisation_unit,emp.function,emp.sbu,emp.grade,emp.designation,emp.dob,emp.doj from event_attendance left join emp on event_attendance.emp_id=emp.emp_id where event_attendance.event_id=$id and event_attendance.event_id2=$event_id2 group by event_attendance.emp_id";
          //print_r($sql);exit;
          /*$sql="SELECT A.id as test_id,B.id as program_id,A.employee_id as emp_id,D.id,D.name,D.sbu,D.email,D.mobile,D.state,D.grade,D.division,D.organisation_unit,D.function,D.designation
FROM assign_emp A
left join programs B on B.id=A.program_id 
left join  emp D on D.emp_id=A.employee_id
where A.program_id =$program_id group by B.id ORDER BY A.id DESC";*/
$sql="SELECT A.id as test_id,B.id as program_id,A.employee_id as emp_id,D.id,D.name,D.sbu,D.email,D.mobile,D.state,D.grade,D.division,D.organisation_unit,D.function,D.designation,D.dob,D.doj,
E.event_id as evaluation_result_status,F.event_id as post_test_status,A.program_id as pre_test_status,B.from_date,datediff(now(), date(B.from_date)) as expiredDate
FROM assign_emp A
left join programs B on B.id=A.program_id 
left join  emp D on D.emp_id=A.employee_id
left join evaluation_result E on (E.emp_id=A.employee_id and B.id=E.event_id)
left join test_result1 F on (F.emp_id=A.employee_id and F.event_id=B.id)
where A.program_id =$program_id group by B.id,A.employee_id ORDER BY A.id DESC";
        return $this->db->query($sql);
    }
    public function absent_attendance($id,$program_id)
    {
       
$sql="SELECT A.id as test_id,B.id as program_id,A.employee_id as emp_id,D.id,D.name,D.sbu,D.email,D.mobile,D.state,D.grade,D.division,D.organisation_unit,D.function,D.designation,
E.event_id as evaluation_result_status,F.event_id as post_test_status,A.program_id as pre_test_status,B.from_date,datediff(now(), date(B.from_date)) as expiredDate,D.dob,D.doj
FROM assign_emp A
left join programs B on B.id=A.program_id 
left join  emp D on D.emp_id=A.employee_id
left join evaluation_result E on (E.emp_id=A.employee_id and B.id=E.event_id)
left join test_result1 F on (F.emp_id=A.employee_id and F.event_id=B.id)
where A.program_id =$program_id group by B.id,A.employee_id ORDER BY A.id DESC";
        return $this->db->query($sql);
    }
    
    
    public function p_name($id){
        return $this->db->query("select * from events where id= $id");
    }
    public function updateFeedBackCourseId($tempId,$courseId)
    {
        return $this->db->where('test_id',$tempId)->update('test_quations',array('test_id' => $courseId));
    }
    public function updateFeedBackId($tempId,$courseId)
    {
        return $this->db->where('id',$tempId)->update('evaluation',array('course_id' => $courseId));
    }
    public function getprogramTypes($id){
      $c =  $this->db->from('program_types')->where('id',$id)->get()->row_array();
      //print_r($c);exit();
        return $c['type'];
    }
    public function fetchQuestions($id){
        $assigned_emp = $this->db->query("    SELECT A.* FROM `test_quations` A inner join course B on B.id=A.test_id 
    inner join programs C on C.course_name=B.id
    where C.id=".$id);
        return $assigned_emp;
    }
    public function checkPostTestStatus($pid,$emp)
    {
          //  $c =  $this->db->from('test_result1')->where('event_id',$pid)->where('emp_id',$emp)->get()->row_array();
          //echo "select * from test_result1 where event_id = $pid and emp_id ='".$emp."'";
         $query =  $this->db->query("select * from test_result1 where event_id = $pid and emp_id ='".$emp."'");
        if ($query->num_rows() >= 1)
	    {
	    	return 0;
	    } else {
	        return 1;
	    }
    }
    public function fetchEvaQuestions($id){
        
        $assigned_emp = $this->db->query("SELECT A.* FROM `evaluation_quations` A inner join evaluation B on B.id= A.evaluation_id 
inner join course C on C.id=B.course_id inner join programs D on D.course_name=C.id where D.id=".$id);
        return $assigned_emp;
    }
	public function getfeedbackmainid($id){
		return $this->db->where('course_id',$id)->get('evaluation')->result();
	}
	/*
    public function checkEvaTestStatus($pid,$emp)
    {
          //  $c =  $this->db->from('test_result1')->where('event_id',$pid)->where('emp_id',$emp)->get()->row_array();
         $query =  $this->db->query("select * from evaluation_result where event_id = $pid and emp_id ='".$emp."'");
        if ($query->num_rows() >= 1)
	    {
	    	return 0;
	    } else {
	        return 1;
	    }
    }*/
}
?>