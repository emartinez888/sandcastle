window.onload=init;

function init(){
	// both submit buttons are named "verify" must loop to assign the proper onclick event
	var arr = new Array();
	arr=document.getElementsByName("verify");
	for(var i = 0; i < arr.length; i++)
    {
        var obj = arr.item(i);

        if(obj.value=="Sign In"){
        	document.getElementById("signacct").onclick=verifyAcct;// existing account
        }
        else if(obj.value=="Create Account"){
        	document.getElementById("veracct").onclick=verifyNewAcct;// new account
        	(document.getElementsByName("usersignin"))[0].onblur=verifyUsersIds;
        }else if(obj.value=="Update Account"){
        	document.getElementById("veracct").onclick=verifyUpdateAcct;
        	(document.getElementsByName("usersignin"))[0].onblur=verifyUsersIds;
        }
    }
}


function verifyNewAcct(){
	var tmp=verifySingleLogin(document.getElementById("emailsignin").value);
	if(!tmp){
		document.getElementById("error").innerHTML="Wrong User id or first email";
		return tmp;
	}
	tmp=tmp && (document.getElementsByName("emailsignin"))[0].value==(document.getElementsByName("emailsignin2"))[0].value && chkemail((document.getElementsByName("emailsignin2"))[0].value);
	if(!tmp){
		document.getElementById("error").innerHTML="Emails don't match or wrong second email";
		return tmp;
	}	
}

function verifyAcct(){
		var tmp= verifySingleLogin(document.getElementById("emailsignin").value);
		if(!tmp){
			document.getElementById("error").innerHTML="Wrong User id or email";
		}
		return tmp;		
}

function verifySingleLogin(email){
	var name=(document.getElementsByName("usersignin"))[0].value;
	name=name.trim();
	(document.getElementsByName("usersignin"))[0].value=name;// sets back the trimmed user id, allow blanks in id
	
	return (name.length>0) && chkemail(email) && (email.length>0);
}

function chkemail(email){
	var ergx=/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	return ergx.test(email);
}

function verifyUsersIds(){
	document.getElementById("error").innerHTML='';
	
	var name=(document.getElementsByName("usersignin"))[0].value;
	name=name.trim();
	(document.getElementsByName("usersignin"))[0].value=name;// sets back the trimmed user id, allow blanks in id
	if(name.length==0){
		document.getElementById("error").innerHTML="No User Id enterred.";
		return;
	}
	var tmp=document.getElementById("hide").innerHTML;
	tmp=tmp.split(',');
	
	for(var i=0;i<tmp.length;i++){
		if(name==tmp[i]){
			// we found an existing user id, test must fail
			document.getElementById("error").innerHTML="User Id "+name+" already in use";
			(document.getElementsByName("usersignin"))[0].value='';// clear the field
			break;
		}
	}
}

function verifyUpdateAcct(){
	// just checks the user id
	document.getElementById("error").innerHTML='';
	var name=(document.getElementsByName("usersignin"))[0].value;
	name=name.trim();
	(document.getElementsByName("usersignin"))[0].value=name;// sets back the trimmed user id, allow blanks in id
	if(name.length==0){
		document.getElementById("error").innerHTML="No User Id enterred.";
	}
	return (name.length>0);
}