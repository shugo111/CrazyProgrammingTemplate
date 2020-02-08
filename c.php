<?php
include 'FileParser.php';
include 'connection.php';
function errorHandleC($error){
	for($i=0;!is_numeric($error[$i]);$i++)
		;
	$error[$i]=$error[$i]-3;
	return $error;
}
    putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");#cpmment for linux
	$CC="gcc";
	$out="a.exe";//change to a.out for linux
	$code=htmlentities($_POST["text"]);
	$weight=parse_program(html_entity_decode($code));
	$input=$_POST["textfield2"];
	$unid=uniqid();
	$cbox=$_POST['cbox'];
	$filename_code="main".$unid.".c";
	$sample_code="sample".$unid.".c";
	$filename_in="input".$unid.".txt";
	$sample_in="sample".$unid.".txt";
	$filename_error="error".$unid.".txt";
	$sample_error="sampleerr".$unid.".txt";
	$executable="a.out";	
	$command1=$CC." -lm ".$filename_code;
    $command2=$CC." -lm ".$sample_code;
	$command1_error=$command1." 2>".$filename_error;
	$command2_error=$command2." 2>".$sample_error;
	$check=0;
	$hfiles=html_entity_decode("#include<stdio.h>\n#include<math.h>\n#include<ctype.h>\n");
	
	$query="select sample_input from `problem` where e_id=1 and p_id=1";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
    $res=mysqli_fetch_array($result);
    $dbinput=$res[0];
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,htmlspecialchars_decode($hfiles));
	fwrite($file_code,htmlspecialchars_decode($code));
	fclose($file_code);
	
	$sample_file=fopen($sample_code,"w+");
	$query="select sample_pgm from `problem` where e_id=1 and p_id=1";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
    $res=mysqli_fetch_array($result);
    $dbcode=$res[0];
	fwrite($sample_file,htmlspecialchars_decode($hfiles));
	fwrite($sample_file,htmlspecialchars_decode($dbcode));
	fclose($sample_file);
	
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $executable /g everyone:f"); #change to chmod 777 for linux
	exec("cacls  $filename_error /g everyone:f");#change to chmod 777 for linux	
	exec("cacls  $sample_error /g everyone:f");#change to chmod 777 for linux	
	
	$sample_input=fopen($sample_in,"w+");
	fwrite($sample_input,$dbinput);
	fclose($sample_input);

	shell_exec($command1_error);
	
	$error=file_get_contents($filename_error);
	if(trim($error)=="")
	{
		if(trim($input)=="" || $cbox=="0")
		{   
            $out=$out." < ".$sample_in;
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
		if(trim($input)=="" || $cbox=="0")
		{
			$out=$out." < ".$sample_in;
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
                echo htmlentities($output);
	}
	else
	{
		echo errorHandleC($error);
		//$check=1;
	}
	
	shell_exec($command2_error);
	
	$error1=file_get_contents($sample_error);
	
	if(trim($error1)=="")
	{
		if(trim($input)=="" || $cbox=="0")
		{  
            $out=$out." < ".$sample_in;
			$output2=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output2=shell_exec($out);
		}
		//echo "<pre>$output2</pre>";
	}
	if($output==$output2){
		echo "<br>Correct output";
	}
	else
		echo "Wrong output :)";
	echo "<pre>Weight is $weight</pre>";
	exec("del $sample_code");
	exec("del $filename_code");#change del to rm
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");
	
?>
