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
              <a style="font-size: 14px;" class="mdc-drawer-link" href="<?php echo base_url('test/userDashboard'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Dashboard
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a style="font-size: 14px;" class="mdc-drawer-link" href="<?php echo base_url('test/profile'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
                Profile
              </a>
            </div>
			<!--<div class="mdc-list-item mdc-drawer-item">
              <a style="font-size: 15px;" class="mdc-drawer-link" href="<?php echo base_url('test/courses'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">star</i>
               Courses
              </a>
            </div>-->
			<div class="mdc-list-item mdc-drawer-item">
              <a style="font-size: 14px;" class="mdc-drawer-link" href="<?php echo base_url('test/before'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">drafts</i>
               Pre Test
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size: 14px;"class="mdc-drawer-link" href="<?php echo base_url('test/postTest'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">menu</i>
               Post Test
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a  style="font-size:14px;"class="mdc-drawer-link" href="<?php echo base_url('test/feedback'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">inbox</i>
               Feed Back
              </a>
            </div>
			<div class="mdc-list-item mdc-drawer-item">
              <a style="font-size: 14px;"class="mdc-drawer-link" href="<?php echo base_url('test/logout'); ?>">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">description</i>
               Logout
              </a>
            </div>
          </nav>
        </div>
      </div>
    </aside>