<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="index.html" class="brand-logo">
          <img src="https://www.golearning.fr/wp-content/themes/go_learning_v3/public/img/logo_couleur.svg" style="width:50%"alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/dashboard'); ?>">
                <i  style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Dashboard
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" style="font-size: 15px;" href="<?php echo base_url('main/emp'); ?>">
                <i style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                Employee
              </a>
            </div>
          <!--  <div class="mdc-list-item mdc-drawer-item">
            <a class="mdc-drawer-link" href="<?php echo base_url('main/adminDetails'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
                User Details
              </a>
            </div>-->
            <div class="mdc-list-item mdc-drawer-item">
            <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/division'); ?>">
                <i  style="font-size: 15px;"class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pie_chart_outlined</i>
                Unit
              </a>
            </div>
			  <div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('main/faculty'); ?>">
                <i  style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
                Faculty
              </a>
            </div>
			 <div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 15px;" class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu2">
                <i style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
                Master
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu2">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
				 

                 
				  <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/sbu_master'); ?>">
                    SBU 
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link"  href="<?php echo base_url('main/branch_master'); ?>">
                    Branch
                    </a>
                  </div>
				  <i class='fas fa-angle-double-right'></i>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/grade_master'); ?>">
                    Grade 
                    </a>
                  </div>
                  
				   <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/employee_type_master'); ?>">
                     Employee Type
                    </a>
                  </div>
				   <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;" style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/designation_master'); ?>">
                    Designation 
                    </a>
                  </div>
				   <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('main/organization_master'); ?>">
                    Organization 
                    </a>
                  </div>
				   <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('main/function_master'); ?>">
                    Function 
                    </a>
                  </div>
				  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('main/gender_master'); ?>">
                    Gender 
                    </a>
                  </div>
                </nav>
              </div>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 15px;" class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu1">
                <i style="font-size: 15px;"  class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" >pages</i>
                Programs
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu1">
                <nav class="mdc-list mdc-drawer-submenu">
                 
                  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('main/program'); ?>">
                    Program Name
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('main/programGroup'); ?>">
                    Program Group
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('main/program_types'); ?>">
                    Program Type
                    </a>
                  </div>
               
				  <!-- <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('main/events_list') ?>">
                    Program List
                    </a>
                  </div>-->
                </nav>
              </div>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/course'); ?>"     >
                <i style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
                New Course
              </a>
            </div>
            
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url('main/programs'); ?>"  style="margin: -3px;">
                <i style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" >description</i>
                Assign Training Course
              </a>
            </div>
          
            <!--<div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url('main/events_list') ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
                Program List
              </a>
            </div>-->
            <div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 15px;"class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
                <i style="font-size: 15px;" class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
                Report
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <!--<div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('main/sbureport'); ?>">
                    SBU Wise
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('main/divisionreport'); ?>">
                    Division Wise
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('main/masterdatareport'); ?>">
                    MandaysMaster&nbsp;Data
                    </a>
                  </div>
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="<?php echo base_url('Reports/attendance'); ?>">
                    Attendance
                    </a>
                  </div>   -->
                  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('main/masterdatareport'); ?>">
                    MandaysMaster&nbsp;Data
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a  style="font-size: 15px;"class="mdc-drawer-link" href="<?php echo base_url('main/evaluationreport'); ?>">
                    Evaluation Feedback
                    </a>
                  </div>
                 
                
                </nav>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </aside>