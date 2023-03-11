<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $h_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="<?php echo base_url();?>assets/main.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- DataTables -->
    <link href="<?php echo  base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo  base_url()?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo  base_url()?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <!--<div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>-->
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <ul class="header-menu nav">
                                        <!--<li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                <i class="nav-link-icon fa fa-edit"></i>
                                                Change Password
                                            </a>
                                        </li>-->
                                        <li class="btn-group nav-item">
                                            <a href="<?php echo base_url('index.php/superadmin/logout'); ?>" class="nav-link">
                                                <i class="nav-link-icon fa fa-power-off"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div> 
        <div class="ui-theme-settings">
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    
                </div>
            </div>
        </div>      
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu" >
                                <li class="app-sidebar__heading ">Dashboard</li>
                                <li>
                                    <a href="<?php echo base_url('superadmin/dashboard');?>" class="mm-active">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    Home
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Employees</li>
                                <li>
                                    <a href="<?php echo base_url('superadmin/emp');?>">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    Employees
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('superadmin/addemp');?>">
                                        <i class="metismenu-icon pe-7s-add-user"></i>
                                        ADD Employee
                                    </a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="<?php echo base_url('superadmin/employee_history');?>">-->
                                <!--        <i class="metismenu-icon pe-7s-note2"></i>-->
                                <!--        Employee History-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="<?php echo base_url('superadmin/division');?>">-->
                                <!--        <i class="metismenu-icon pe-7s-way"></i>-->
                                <!--        Division-->
                                <!--    </a>-->
                                <!--</li>-->
                                
                                <li class="app-sidebar__heading">Programs</li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Programs
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <!--<li>-->
                                        <!--    <a href="<?php echo base_url('superadmin/faculty');?>">-->
                                        <!--        <i class="metismenu-icon pe-7s-diamond"></i>-->
                                        <!--        Faculty-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a href="<?php echo base_url('superadmin/program');?>">-->
                                        <!--        <i class="metismenu-icon pe-7s-menu">-->
                                        <!--        </i>Programs-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li>
                                            <a href="#">
                                                <i class="metismenu-icon pe-7s-keypad">
                                                </i>Test
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon pe-7s-note">
                                                </i>Feedback Form
                                            </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo base_url('superadmin/createprogram')?>">
                                                <i class="metismenu-icon pe-7s-loop">
                                                </i>Create Programs
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('superadmin/programs')?>">
                                                <i class="metismenu-icon pe-7s-albums">
                                                </i>Programs List
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('superadmin/program_types');?>">
                                        <i class="metismenu-icon pe-7s-expand1"></i>
                                        Program Types
                                    </a>
                                </li>
                                 <li class="app-sidebar__heading">Reports</li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-albums"></i>
                                        Reports
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('superadmin/sbureport');?>">
                                                <i class="metismenu-icon">
                                                </i>SBU Wise
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('superadmin/divisionreport')?>">
                                                <i class="metismenu-icon">
                                                </i>Division Wise
                                            </a>
                                        </li>
                                        <!--<li>
                                            <a href="#">
                                                <i class="metismenu-icon">
                                                </i>Program Wise
                                            </a>
                                        </li>-->
                                        <li>
                                            <a href="<?php echo base_url('superadmin/masterdatareport')?>">
                                                <i class="metismenu-icon">
                                                </i>Masterdata
                                            </a>
                                        </li>
                                         
                                        <!--<li>
                                            <a href="#">
                                                <i class="metismenu-icon">
                                                </i>Master Graph
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon">
                                                </i>Attendance
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                
                
                
