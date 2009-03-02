<?php

echo 'hi';
?>

<html><head>

<script language="JavaScript" type="text/javascript">
<!--
function fnSubmit() {
window.document.allow.submit();
return;
}
// -->
</script>
</head>
<body LANGUAGE="javascript" onload="return fnSubmit()">
<body>

<form action="http://www.yourPage.com/roster/index.php?p=guild-armorysync&amp;a=g:1" method="post" id="allow" name="allow">
<input type="hidden" id="start" name="action" value="start" />
<input type="hidden" name="job_id" value="0" />
<input name="password" class="wowinput128" type="password" size="30" maxlength="30" value="yourPass" />
<input type="submit" value="Go" /> 
</form>
</body></html>
