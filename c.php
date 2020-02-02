<?php
function errorHandleC($error){
	return $error;
}
    putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="a.exe";//change for linux
	$code=htmlentities($_POST["text"]);
	$input=$_POST["textfield2"];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$check=0;
	$hfiles=html_entity_decode("#include<stdio.h>\n#include<math.h>\n#include<ctype.h>\n");
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,htmlspecialchars_decode($hfiles));
	fwrite($file_code,htmlspecialchars_decode($code));
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $executable /g everyone:f"); #change to chmod for linux
	exec("cacls  $filename_error /g everyone:f");#change to chmod for linux	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
        echo htmlentities($output);
	}
	else if(!strpos($error,"error"))
	{
		echo errorHandleC($error);
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
                echo htmlentities($output);
	}
	else
	{
		echo errorHandleC($error);
		$check=1;
	}
	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<pre>Compiled And Executed In: $seconds s</pre>";
	if($check==1)
	{
		echo "<pre>Verdict : CE</pre>";
	}
	else if($check==0 && $seconds>3)
	{
		echo "<pre>Verdict : TLE</pre>";
	}
	else if(trim($output)=="")
	{
		echo "<pre>Verdict : WA</pre>";
	}
	else if($check==0)
	{
		echo "<pre>Verdict : AC</pre>";
	}
	exec("del $filename_code");
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");
	
?>
