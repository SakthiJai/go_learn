<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Super_model extends CI_model {
    		//------------------------------- login ----------------//
	public function login($data) {
	    //print_r($data);exit;
	 $query = $this->db->from('superadmin')->where('user_name',$data['user_name'])->where('password ',$data['password'])->limit(1)->get();
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
      //  $query =$this->db->query("select * from emp where emp_id = $emp_id");
		
		//$query = $this->db->table('emp')->where('emp_id',$emp_id)->select('emp.*')->get()->getNumRows();
	  
	     $this->db->where('emp_id', $emp_id);
		 $query = $this->db->get('emp');
		 $count_row = $query->num_rows();
		 
           if ($count_row >= 1){
               return false;
           } else {
               return $this->db->insert('emp',$insertUserData);
           }
		   
		   
     }
	 public function updateEmp($emp_id,$updateUserData){
     
	     $this->db->where('emp_id', $emp_id);
		 $query = $this->db->get('emp');
		 $count_row = $query->num_rows();
		 
           if ($count_row >= 1){
			    return $this->db->update('emp',$updateUserData);
               //return false;
           } else {
               return false;
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
	public function adddivision($data){
		//print_r($data);
		return $this->db->insert('divisions',$data);
    }
    public function delete_division($id){
        $this->db->where('id',$id)->delete('divisions');
        return true;
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
            return $this->db->from('course')->where('course_title !=',"")->where('status=','1')->order_by('course_title','ASC')->get();
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
	public function program_type1(){
            return $this->db->from('program_types')->order_by('type','ASC')->get();
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
    public function editprogram($id){
        return $this->db->from('program')->where('id',$id)->get();	
    }
    
    public function updateprogram($id,$data){
        return $this->db->where('id',$id)->update('program',$data);	
        
    }
    public function creatingprogram($data){
        $this->db->insert('program',$data);
        return $this->db->insert_id();
    }
    public function creatingprograms($data){
        $this->db->insert('programs',$data);
        return $this->db->insert_id();
    }
    public function creatingevent($data1){
        $this->db->insert('events', $data1);
        return $this->db->insert_id();
    }
    public function program(){
		return $this->db->from('program')->order_by('id','desc')->get();
	}
	public function program1(){
            return $this->db->from('program')->order_by('program_name','ASC')->get();
    }
    public function programs(){
        return $this->db->select('programs.*')->from('programs')->order_by('programs.id','desc')->get();
    }
    public function program_group1(){
            return $this->db->from('program_group')->order_by('group_name','ASC')->get();
    }
   
    public function selectemp_ids($emp_ids){
        // if($division_id == 0){
        //     $str="emp.division_id >= 0";
        // } else {
        //     $str="emp.division_id = $division_id";
        // }
        $list = $this->db->query("select emp.emp_id,emp.name,emp.division_id from emp where emp.emp_id in ($emp_ids) ORDER by emp_id DESC");
        return $list->result();
    }
    public function addassignemp($data){
		//print_r($data);exit;
        $this->db->insert('assign_emp',$data);
        return 1;
    }
    public function assigned_emp($id){
		//print_r($id);exit;
        $assigned_emp = $this->db->query("select assign_emp.*,emp.name from assign_emp left join emp on  emp.emp_id = assign_emp.employee_id  where assign_emp.program_id = $id group by assign_emp.employee_id order by assign_emp.employee_id,employee_id,emp.emp_id");
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
    public function getCourseDetails($id)
    {
        /*return $this->db->select('course.program_id,course.program_group_id,course.traning_type_id')
                        ->from('course')
                        ->where('course.id',$id)
                        ->get();*/
                        
        $list = $this->db->query("select course.program_id,course.program_group_id,course.traning_type_id from course where id='".$id."'");
        return $list->result();                
    }
    public function getProgramDetails($id)
    {
        /*return $this->db->select('course.program_id,course.program_group_id,course.traning_type_id')
                        ->from('course')
                        ->where('course.id',$id)
                        ->get();*/
                        
        $list = $this->db->query("select program_group_id,training_type_id from program where id='".$id."'");
        return $list->result();                
    }
    public function group(){
		return $this->db->from('program_group')->order_by('id','DESC')->get();
	}
	 public function addprogramGroup($data){
        $this->db->insert('program_group',$data);
        return $this->db->insert_id();
    }
    public function updateprogramGroup($id,$data){
        return $this->db->where('id',$id)->update('program_group',$data);	
    }
    public function editprogramGroup($id){
        return $this->db->from('program_group')->where('id',$id)->get();	
    }
    public function addevent($data){
        $this->db->insert('events',$data);
        return $this->db->insert_id();	
    }
    public function programEvents(){
		return $this->db->from('program')->order_by('id','desc')->get();
	}
	public function addattendance($data){
        $this->db->insert('attendance',$data);
        return $this->db->insert_id();
    }
    public function addfeedbackEvalution($Data)
    {
		 if($this->db->insert('evaluation',$Data))
		{
		    return $this->db->insert_id();
		}
    }
    public function addquestionEvalution($insertUserData)
    {
		return $this->db->insert('evaluation_quations',$insertUserData);
    }
    
     public function deleteProgram($id)
    {
        //print_r($id);exit();
         return $this->db->where('id',$id)->delete('program');
    }
     public function deleteProgramgroup($id)
    {
        //print_r($id);exit();
         return $this->db->where('id',$id)->delete('program_group');
    }
     public function deleteProgramtypes($id)
    {
        //print_r($id);exit();
         return $this->db->where('id',$id)->delete(' program_types');
    }
    public function asign_employee_check($assignemployee,$from_date,$to_date,$program_id)
    {
         $emp_id = explode(' ',$assignemployee);
        foreach($emp_id as $employee_id){
            if($program_id==""){
                 $sql = "select B.employee_id 
                from assign_emp B 
                inner join programs A on A.id=B.program_id 
                where B.employee_id='$employee_id' and  ('$from_date' between A.from_date and A.to_date ||  '$to_date' between A.from_date and A.to_date )";
                $employee_list=$this->db->query($sql);
                $employee=$employee_list->result();
               return $employee[0]->employee_id;
            }else{
                 $sql = "select B.employee_id 
                from assign_emp B 
                inner join programs A on A.id=B.program_id 
                where B.employee_id='$employee_id' and  ('$from_date' between A.from_date and A.to_date ||  '$to_date' between A.from_date and A.to_date ) and A.id != '$program_id'";
                $employee_list=$this->db->query($sql);
                $employee=$employee_list->result();
               return $employee[0]->employee_id;
            }
        }
        
    }
    public function programdeletedata($id)
    {
        //print_r($id);exit();
         return $this->db->where('id',$id)->delete('programs');
    }
    public function editprogramlist($id)
    {
        return $this->db->from('programs')->where('id',$id)->get();
    }
    public function programEmployeelist($id)
    {
        return $this->db->from('assign_emp')->where('program_id',$id)->get();
    }
    public function updatingprograms($data,$programList_id){
        $update_id= $this->db->where('id',$programList_id)->update('programs',$data);
        if($update_id){
            return $update_id;
        }else{
            return 500;
        }
    }
    public function updateassignemp($data,$programList_id){
        //$delete_id=$this->db->where('program_id',$programList_id)->delete('assign_emp');
            $add= $this->db->insert('assign_emp',$data);
            return 1;
    }
    public function deleteprogra($programList_id){
        $delete_id=$this->db->where('program_id',$programList_id)->delete('assign_emp');
        return 1;
    }
    public function programdelete($id){
        $delete_id=$this->db->where('id',$id)->delete('programs');
        $this->db->where('program_id',$id)->delete('assign_emp');
        return 1;
    }
    ///Master
	/*
	public function grade_master(){
		//return $this->db->from('sbu_master')->order_by('id')->get();
	}
	public function addgrade(){
		//return $this->db->from('sbu_master')->order_by('id')->get();
	}
	public function employee_type_master(){
		//return $this->db->from('sbu_master')->order_by('id')->get();
	}
	public function designation_master(){
		//return $this->db->from('sbu_master')->order_by('id')->get();
	}
	public function organication_master(){
		//return $this->db->from('sbu_master')->order_by('id')->get();
	}
	public function function_master(){
		//return $this->db->from('sbu_master')->order_by('id')->get();
	}*/
	public function sbu(){
		return $this->db->from('sbu')->order_by('id','sbu')->get();
	}
	public function sbu_master(){
		return $this->db->from('sbu')->get();
	}
	public function addsbu($data){
		 $this->db->insert('sbu',$data);
	return true;
		/*$query =$this->db->query("select * from sbu where id = $emp_id");
           if ($query->num_rows() >= 1){
               return false;
           } else {
               return $this->db->insert('emp',$insertUserData);
           }*/
	}
	public function branch(){
		return $this->db->from('branch')->order_by('id','branch')->get();
	}
	public function branch_master(){
		return $this->db->from('branch')->get();
	}
	public function addbranch($data){
		return $this->db->insert('branch',$data);
	}
	public function grade_master(){
		return $this->db->from('grade')->get();
	}
	public function grade(){
		return $this->db->from('grade')->order_by('id','grade')->get();
	}
	public function addgrade($data){
		return $this->db->insert('grade',$data);
	}
	public function employee_type(){
		return $this->db->from('emp_type')->order_by('id','emp_type')->get();
	}
	public function employee_type_master(){
		return $this->db->from('emp_type')->get();
	}
	public function addemployee_type($data){
		return $this->db->insert('emp_type',$data);
	}
	public function designation(){
		return $this->db->from('designation')->order_by('id','designation')->get();
	}
	public function designation_master(){
		return $this->db->from('designation')->get();
	}
	public function adddesignation($data){
		return $this->db->insert('designation',$data);
	}
	public function organization(){
		return $this->db->from('organication')->order_by('id','organication')->get();
	}
	public function organication_master(){
		return $this->db->from('organication')->get();
	}
	public function addorganication($data){
		return $this->db->insert('organication',$data);
	}
	public function function_master(){
		return $this->db->from('function')->get();
	}
	public function addfunction($data){
		return $this->db->insert('function',$data);
	}
	public function gender_master(){
		return $this->db->from('gender')->get();
	}
	public function gender(){
		return $this->db->from('gender')->order_by('id','gender')->get();
	}
	public function addgender($data){
		return $this->db->insert('gender',$data);
	}
	public function editorg($id){
        return $this->db->from('organication')->where('id',$id)->get();	
    }
	public function updateorg($id,$data){
        return $this->db->where('id',$id)->update('organication',$data); 
    }
	public function delete_org($id){
        $this->db->where('id',$id)->delete('organication');
        return true;
    }
	public function editsbu($id){
        return $this->db->from('sbu')->where('id',$id)->get();	
    }
	public function updatesbu($id,$data){
        return $this->db->where('id',$id)->update('sbu',$data); 
    }
	public function delete_sbu($id){
        $this->db->where('id',$id)->delete('sbu');
        return true;
    }
	public function editbranch($id){
        return $this->db->from('branch')->where('id',$id)->get();	
    }
	public function updatebranch($id,$data){
        return $this->db->where('id',$id)->update('branch',$data);	
    }
	public function delete_branch($id){
        $this->db->where('id',$id)->delete('branch');
        return true;
    }
	public function editgender($id){
        return $this->db->from('gender')->where('id',$id)->get();	
    }
	public function updategender($id,$data){
        return $this->db->where('id',$id)->update('gender',$data);	
    }
	public function delete_gender($id){
        $this->db->where('id',$id)->delete('gender');
        return true;
    }
	public function update_emp_type($id,$data){
        return $this->db->where('id',$id)->update('emp_type',$data);	
    }
	public function delete_emp_type($id){
        $this->db->where('id',$id)->delete('emp_type');
        return true;
    }
	public function editfunction($id){
        return $this->db->from('function')->where('id',$id)->get();	
    }
	public function updatefunction($id,$data){
        return $this->db->where('id',$id)->update('function',$data);	
    }
	public function delete_function($id){
        $this->db->where('id',$id)->delete('function');
        return true;
    }
	public function editdes($id){
        return $this->db->from('designation')->where('id',$id)->get();	
    }
	public function update_des($id,$data){
        return $this->db->where('id',$id)->update('designation',$data);	
    }
	public function delete_des($id){
        $this->db->where('id',$id)->delete('designation');
        return true;
    }
	public function editemptype($id){
        return $this->db->from('emp_type')->where('id',$id)->get();	
    }
	public function editgrade($id){
        return $this->db->from('grade')->where('id',$id)->get();	
    }
	public function updategrade($id,$data){
        return $this->db->where('id',$id)->update('grade',$data);	
    }
	public function delete_grade($id){
        $this->db->where('id',$id)->delete('grade');
        return true;
    }
    public function editEmployee($id){
		return $this->db->from('emp')->where('id',$id)->get()->result_array();	
	}
}
?>