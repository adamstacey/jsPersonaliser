<?php if ($sf_user->isAuthenticated()) { ?>
	<div class="right-column-menu">
		<h3 class="right-column-header-1">
			<span class="right-column-header-2">
				<span class="right-column-header-3">User Management</span>
			</span>
		</h3>
		<ul class="links-menu">
			<li><a href="<?php echo url_for('administrators/index'); ?>">Administrators</a></li>
			<li><a href="<?php echo url_for('networks/index'); ?>">Networks</a></li>
			<li><a href="<?php echo url_for('agents/index'); ?>">Agents</a></li>
		</ul>
	</div>
	<div class="right-column-menu">
		<h3 class="right-column-header-1">
			<span class="right-column-header-2">
				<span class="right-column-header-3">Property Management</span>
			</span>
		</h3>
		<ul class="links-menu">
			<li><a href="<?php echo url_for('developments/index'); ?>">Developments</a></li>
			<li><a href="<?php echo url_for('phases/index'); ?>">Phases</a></li>
			<li><a href="<?php echo url_for('floors/index'); ?>">Floors</a></li>
			<li><a href="<?php echo url_for('propertyTemplates/index'); ?>">Property Templates</a></li>
			<li><a href="<?php echo url_for('properties/index'); ?>">Properties</a></li>
		</ul>
	</div>
	<div class="right-column-menu">
		<h3 class="right-column-header-1">
			<span class="right-column-header-2">
				<span class="right-column-header-3">System</span>
			</span>
		</h3>
		<ul class="links-menu">
			<li><a href="<?php echo url_for('settings/index'); ?>">Settings</a></li>
			<li><a href="<?php echo url_for('licenses/index'); ?>">Licenses</a></li>
		</ul>
	</div>
<?php } ?>