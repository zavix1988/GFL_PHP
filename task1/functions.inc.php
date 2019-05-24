<?php

function addFile($file) {
    if(is_writable(FILE_DIR)){
        $uploadFile = FILE_DIR . basename($file['fileName']['name']);
        if (is_uploaded_file($file['fileName']['tmp_name'])) {
            if (move_uploaded_file($file['fileName']['tmp_name'], FILE_DIR . basename($file['fileName']['name']))) {
                $_SESSION['message'] = UPLOAD_SUCCESS;
                return true;
            }
        }
    }
    $_SESSION['message'] = UPLOAD_ERR;
    return false;
}

function deleteFile($file) {
    if (file_exists(FILE_DIR.$file) && is_writable(FILE_DIR.$file)){
        $_SESSION['message'] = DEL_SUCCESS;
        return unlink(FILE_DIR.$file);
    }
    $_SESSION['message'] = DEL_ERR;
    return false;
}

function viewDirFiles($dir) {
    if (is_readable(FILE_DIR) && ($handle = opendir($dir))) {
		while (false !== ($entry['name'] = readdir($handle))) {
			if ($entry['name'] == '.' || $entry['name'] == '..') { 
				continue; 
			} 
			$entry['size'] = myFileSize(FILE_DIR.$entry['name']);
			$fileList[] = $entry;
		}
		closedir($handle);
        return $fileList;
    } else {
	    return $fileList = false;
    }
}

function myFileSize($file) {
	if (is_readable($file) && $size = filesize($file)) {
		if ($size < 1024) $size = $size.' B';
		else if(($size = $size/1024) < 1024) $size = round($size, 2).' K';
		else $size = round($size/(1024), 2).' M';
	}else $size = UNSIZE; 
	return $size;
}

function debug($var) {
	echo '<pre>';
	var_dump($var);
	echo '<pre>';
}

function checkDir(){
    if(!is_dir(FILE_DIR)){
        if (mkdir(FILE_DIR, 0766)) {
            return true;
        }
        return false;
    }
    return true;
}