 

            <div class="app-main__outer">
               <div class="app-main__inner" >
                    <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-user-plus icon-gradient bg-night-fade"></i>
                    </div>
                    <div>Add Employee
                        <div class="page-title-subheading">Add employee details</div>
                    </div>
                </div>
            </div>
        </div> 
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <!--<li class="nav-item" >
                <a role="tab"  class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Import CSV file</span>
                </a>
            </li>-->
        </ul>
                    <div class="tab-content" >
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                            <form class="" action="<?php echo base_url('superadmin/addingemp');?>" method="POST">
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleSelect" class=""><strong>Division: </strong></label>
                                                            <select class="custom-select" name="division_id" required>
                                                                <option value="" >Select Division</option>
                                                                <?php foreach($division->result() as $divisions){ ?>
                                                                    <option value="<?php echo $divisions->id; ?>"> <?php echo $divisions->divisions; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""> <strong>  Employee ID :</strong></label>
                                                            <input name="emp_id" id="exampleText" placeholder="Employee ID" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class="">  <strong>Name :</strong></label>
                                                            <input name="name" id="exampleText" placeholder="Name" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="examplePhone" class=""> <strong>Phone :</strong></label>
                                                            <input name="phone" id="exampleEmail" placeholder="Phone" type="Phone" class="form-control">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleEmail" class=""><strong>Email :</strong></label>
                                                                <input name="email" id="exampleEmail" placeholder="Email" type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="examplePassword" class=""> <strong>Password :</strong></label>
                                                                <input name="password" id="examplePassword" placeholder="Password"  value="coromandel" type="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""><strong>SBU :</strong></label>
                                                            <input name="sbu" id="exampleText" placeholder="SBU" type="email" class="form-control" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""> <strong> Branch/Plant :</strong></label>
                                                            <input name="branch_plant" id="exampleText" placeholder="Branch/Plant" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""><strong>Grade :</strong></label>
                                                            <input name="grade" id="exampleText" placeholder="Grade" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class="">  <strong>Employee Type :</strong></label>
                                                            <select class="form-control" name= "emp_type" >
                                                                <option value="">select</option>
                                                                <option value="MS">MS</option>
                                                                <option value="NMS">NMS</option>
                                                                <option value="Contract">Contract</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""> <strong>  Designation :</strong></label>
                                                            <input name="designation" id="exampleText" placeholder="Designation" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleDate" class=""> <strong>Date of Birth :</strong></label>
                                                        <input name="dob" input type="date" id="exampleDate" placeholder="Date of birth" type="10/07/1984" class="form-control"></div>
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleDate" class="">  <strong> Date of Join :</strong></label>
                                                            <input name="doj" input type="date" id="exampleDate" placeholder="10/7/2010" type="Date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""> <strong>   Organisation Unit :</strong></label>
                                                            <input name="organisation_unit" id="exampleText" placeholder="Organisation Unit" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleText" class=""> <strong> Function :</strong></label>
                                                            <input name="function" id="exampleText" placeholder="Function" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
            
                                
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">  <strong> Previous Experience :</strong></label><input name="prev_exp" id="exampleText" placeholder="Previous Experience" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Gender :</strong></label><input name="gender" id="exampleText" placeholder="Gender" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  IO ID :</strong></label><input name="io_id" id="exampleText" placeholder="IO ID" type="text" class="form-control"></div>
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">  <strong> IO Name :</strong></label><input name="io_name" id="exampleText" placeholder="IO Name" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  FRO ID :</strong></label><input name="fro_id" id="exampleText" placeholder="FRO ID" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  FRO Name :</strong></label><input name="fro_name" id="exampleText" placeholder="FRO Name" type="text" class="form-control"></div>
                                                    </div>
                                                </div>
            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">  <strong> RO ID :</strong></label><input name="ro_id" id="exampleText" placeholder="RO ID" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  RO Name :</strong></label><input name="ro_name" id="exampleText" placeholder="RO Name" type="text" class="form-control"></div>
                                                    </div>
                                                    <!--<div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Blood Group :</strong></label><input name="blood_group" id="exampleText" placeholder="Blood Group" type="text" class="form-control"></div>
                                                    </div>-->
                                                </div>
                            
                                                <!--<div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">  <strong> Religion :</strong></label><input name="religion" id="exampleText" placeholder="Religion" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Birth place :</strong></label><input name="birth_place" id="exampleText" placeholder="Birth place" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong> State :</strong></label><input name="state" id="exampleText" placeholder="State" type="text" class="form-control"></div>
                                                    </div>
                                                </div>
            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">  <strong> Father name :</strong></label><input name="father_name" id="exampleText" placeholder="Religion" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  PF nominee 1 :</strong></label><input name="pf_nominee1" id="exampleText" placeholder="Birth place" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong> Nominee 1 relationship :</strong></label><input name="relationship1" id="exampleText" placeholder="State" type="text" class="form-control"></div>
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">  <strong> PF Nominee 2 :</strong></label><input name="pf_nominee2" id="exampleText" placeholder="Religion" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Nominee 2 relationship :</strong></label><input name="relationship2" id="exampleText" placeholder="Birth place" type="text" class="form-control"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong> T-shirt size :</strong></label><input name="tshirt_size" id="exampleText" placeholder="State" type="text" class="form-control"></div>
                                                    </div>
                                                </div>
            
                                                <div class="form-row">
                                                    <div class="col-md-4">
                            
                                                       <div class="position-relative form-group"><label for="exampleSelect" class=""><strong>Preferred Food</strong></label>
                                                       <select name="food_pref" id="exampleSelect" class="custom-select">
                            
                                                         <option value="">Select</option>
                                                         <option>Veg</option>
                                                         <option>Non Veg</option></select>
                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Passport NO :</strong></label>
                                                        <input name="passport_no" id="exampleText" placeholder="Passport NO" type="text" class="form-control"></div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleDate" class="">  <strong> Passport Expiry Date : </strong></label>
                                                        <input name="passport_expiry_date" id="exampleDate" input type="date" placeholder="10/07/2026" type="Date" class="form-control"></div>
                                                    </div>
                                                    
                                                </div>-->
                                                <button class="mt-1 btn btn-primary">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>                                                                                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                                                                                                                                                    
        </div>
    </div>
   
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>	
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/addemp.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
    
</body>

</html>