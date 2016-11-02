<?php
	$connect_error = 'sorry we\'re experiencing connection problems';
	@mysql_connect('127.0.0.1', 'root', '') or die ($connect_error);
	mysql_select_db('webappdev')or die ($connect_error);
?>