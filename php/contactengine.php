<?php
$EmailFrom = "bwinnirmal@gmail.com";   //your first email from where you want to send email
$EmailTo = "prajapatinirmal9@gmail.com";   //your second email where you want to receive contact form content

// -------------------------- Getting values in variable -------------------//
$Subject = $_POST['Name']." Contacted you from your portfolio site";  //mail subject
$Name = Trim(stripslashes($_POST['Name']));    //getting name from html page
$Email = Trim(stripslashes($_POST['Email']));     //getting email from html page
$Project = Trim(stripslashes($_POST['Project']));     //getting project from html page
$Message = Trim(stripslashes($_POST['Message']));     //getting message from html page

//------------------------------------- validation -----------------------//
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

//----------------------------- prepare email body text -------------------//
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Project: ";
$Body .= $Project;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

//--------------------------------- send email --------------------------------
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

//--------------------------------- redirect to success page ------------------
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=index.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>