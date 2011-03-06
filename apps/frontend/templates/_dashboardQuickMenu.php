<?php
  $module = $sf_context->getModuleName();
?>
<?php if ($sf_user->isAuthenticated() && ($module != 'content') && ($module != 'news') && ($module != 'system')) { ?>
	<a href="Javascript:void(0);"><img border="0" id="dashboard_quick_menu_link" src="/images/buttons/dashboard-quick-menu-show.png" alt="Dashboard Quick Menu" width="42" height="419" /></a>
	<div id="dashboard_quick_menu">
		<h2 class="dashboard-quick-menu-header orange-header">User Management</h2>
		<div class="dashboard-quick-menu-items">
			<p>
				<a href="<?php echo url_for('networks/index'); ?>"><img src="/images/buttons/dashboard-networks.png" class="left no-margin" alt="Networks" width="35" height="35" /></a>
				<a href="<?php echo url_for('networks/index'); ?>">Networks</a>
			</p>
			<p>
				<a href="<?php echo url_for('administrators/index'); ?>"><img src="/images/buttons/dashboard-administrators.png" class="left no-margin" alt="Administrators" width="35" height="35" /></a>
				<a href="<?php echo url_for('administrators/index'); ?>">Administrators</a>
			</p>
			<p>
				<a href="<?php echo url_for('agents/index'); ?>"><img src="/images/buttons/dashboard-agents.png" class="left no-margin" alt="Agents" width="35" height="35" /></a>
				<a href="<?php echo url_for('agents/index'); ?>">Agents</a>
			</p>
			<p>
				<a href="<?php echo url_for('users/yourAccount'); ?>"><img src="/images/buttons/dashboard-your-account.png" class="left no-margin" alt="Your Account" width="35" height="35" /></a>
				<a href="<?php echo url_for('users/yourAccount'); ?>">Your Account</a>
			</p>
		</div>
		<h2 class="dashboard-quick-menu-header green-header">Property Management</h2>
		<div class="dashboard-quick-menu-items">
			<p>
				<a href="<?php echo url_for('developments/index'); ?>"><img src="/images/buttons/dashboard-developments.png" class="left no-margin" alt="Developments" width="35" height="35" /></a>
				<a href="<?php echo url_for('developments/index'); ?>">Developments</a>
			</p>
			<p>
				<a href="<?php echo url_for('phases/index'); ?>"><img src="/images/buttons/dashboard-phases.png" class="left no-margin" alt="Phases" width="35" height="35" /></a>
				<a href="<?php echo url_for('phases/index'); ?>">Phases</a>
			</p>
			<p>
				<a href="<?php echo url_for('floors/index'); ?>"><img src="/images/buttons/dashboard-floors.png" class="left no-margin" alt="Floors" width="35" height="35" /></a>
				<a href="<?php echo url_for('floors/index'); ?>">Floors</a>
			</p>
			<p>
				<a href="<?php echo url_for('blocks/index'); ?>"><img src="/images/buttons/dashboard-blocks.png" class="left no-margin" alt="Blocks" width="35" height="35" /></a>
				<a href="<?php echo url_for('blocks/index'); ?>">Blocks</a>
			</p>
			<p>
				<a href="<?php echo url_for('propertyStatuses/index'); ?>"><img src="/images/buttons/dashboard-property-statuses.png" class="left no-margin" alt="Property Statuses" width="35" height="35" /></a>
				<a href="<?php echo url_for('propertyStatuses/index'); ?>">Property Statuses</a>
			</p>
			<p>
				<a href="<?php echo url_for('propertyTypes/index'); ?>"><img src="/images/buttons/dashboard-property-types.png" class="left no-margin" alt="Property Types" width="35" height="35" /></a>
				<a href="<?php echo url_for('propertyTypes/index'); ?>">Property Types</a>
			</p>
			<p>
				<a href="<?php echo url_for('properties/index'); ?>"><img src="/images/buttons/dashboard-properties.png" class="left no-margin" alt="Properties" width="35" height="35" /></a>
				<a href="<?php echo url_for('properties/index'); ?>">Properties</a>
			</p>
		</div>
		<h2 class="dashboard-quick-menu-header blue-header">Settings</h2>
		<div class="dashboard-quick-menu-items">
			<p>
				<a href="<?php echo url_for('settings/index'); ?>"><img src="/images/buttons/dashboard-settings.png" class="left no-margin" alt="Settings" width="35" height="35" /></a>
				<a href="<?php echo url_for('settings/index'); ?>">Settings</a>
			</p>
			<p>
				<a href="<?php echo url_for('licenses/index'); ?>"><img src="/images/buttons/dashboard-licenses.png" class="left no-margin" alt="Licenses" width="35" height="35" /></a>
				<a href="<?php echo url_for('licenses/index'); ?>">Licenses</a>
			</p>
			<div class="spacer-10"></div>
		</div>
	</div>
<?php } ?>