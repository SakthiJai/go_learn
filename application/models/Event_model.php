<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Event_model extends CI_model {
    
    public function events(){
        return $this->db->query("SELECT a.id,a.nature_program,a.from_date,a.to_date,a.venue,a.start_time,a.end_time,a.location,a.ttt,a.evaluation,a.created_user,b.program_name,c.course_title
from programs a
inner join program b on b.id = a.program_name
inner join course c on c.id = a.course_name 
order by a.id desc");   
    }
}