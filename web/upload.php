<?php
	if (!empty($_FILES))
	{
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
		$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
		move_uploaded_file($tempFile, $targetFile);
		echo "1";
	}
?>