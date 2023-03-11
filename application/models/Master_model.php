<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Master_model extends CI_model {
    
    public function fetchMasterData()
	{
	    $query=$this->db->query("SELECT a.*,d.function,d.name,d.emp_id,d.sbu,d.designation,c.program_name,
	    e.group_name,g.feedback,g.course_title,d.grade,b.employee_id,h.divisions,z.name as fac_name,
	    a.cost_per_program,b.no_of_que_pre_test,
	    b.no_of_ans_pre_test,b.no_of_qus_post_test,b.no_of_ans_post_test,b.pre_test_complete,b.post_test_complete,b.evalu_test_complete,b.program_cost,
	    IF(b.evalu_test_complete=1,'YES','No') as eva_complete,FORMAT((b.post_test_complete-b.pre_test_complete/b.post_test_complete),2) as growth_percentage,FORMAT(a.no_of_hrs/8, 3) as  no_of_hours2
	    FROM programs a 
	    INNER JOIN assign_emp b ON a.id = b.program_id 
	    INNER JOIN emp d ON d.emp_id = b.employee_id 
	    LEFT JOIN program c ON a.program_name =c.id 
	    LEFT JOIN program_group e ON a.program_group_name =e.id 
	    LEFT JOIN course g ON a.course_name =g.id 
	    LEFT JOIN divisions h ON b.division_id =h.id 
	    LEFT JOIN faculty z ON a.faculty_name =z.id 
	    where b.post_test_complete is not null and evalu_test_complete=1
	    GROUP BY a.id,a.course_name,b.employee_id ORDER BY a.id DESC")->result_array();
	   
	   return $query;
	   
	}	
    public function MasterData($from_date,$to_date)
	{
	     
	     $query=$this->db->query("SELECT a.*,d.function,d.name,d.emp_id,d.sbu,d.designation,c.program_name,
	    e.group_name,g.feedback,g.course_title,d.grade,b.employee_id,h.divisions,z.name as fac_name,
	    a.cost_per_program,b.no_of_que_pre_test,
	    b.no_of_ans_pre_test,b.no_of_qus_post_test,b.no_of_ans_post_test,b.pre_test_complete,b.post_test_complete,b.evalu_test_complete,b.program_cost,
	    IF(b.evalu_test_complete=1,'YES','No') as eva_complete,FORMAT((b.post_test_complete-b.pre_test_complete/b.post_test_complete),2) as growth_percentage,FORMAT(a.no_of_hrs/8, 3) as  no_of_hours2  
	    FROM programs a 
	    INNER JOIN assign_emp b ON a.id = b.program_id 
	    INNER JOIN emp d ON d.emp_id = b.employee_id 
	    LEFT JOIN program c ON a.program_name =c.id 
	    LEFT JOIN program_group e ON a.program_group_name =e.id 
	    LEFT JOIN course g ON a.course_name =g.id 
	    LEFT JOIN divisions h ON b.division_id =h.id 
	    LEFT JOIN faculty z ON a.faculty_name =z.id 
	    where a.from_date between '$from_date' and '$to_date' and b.post_test_complete is not null and evalu_test_complete=1
	     GROUP BY a.id,a.course_name,b.employee_id ORDER BY a.id DESC")->result_array();
	   
	   return $query;
	   
	}

}
?>