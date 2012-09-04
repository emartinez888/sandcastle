window.onload=init;

var $i=function(id){
	return document.getElementById(id);
}

var $n=function(name){
	return document.getElementsByName(name);
}

var $t=function(tag){
	return document.getElementsByTagName(tag);
}

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
	
	document.getElementById("addart").onclick=addart;
	//document.getElementById("addartimages").onclick=addimages;
	//document.getElementById("addarteditimages").onclick=viewimages;
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

function addart(){
	// the master element is the Form
	// create a DIV for each new art to add
	// append to this table to DIV then to Form ..
	var imgfilecnt=0;
	
	var div=document.createElement("div");
	div.setAttribute("name", "singleart");// each div containing a piece of art is named the same: "singleart"
	var tb=document.createElement("table");
	var tbody = document.createElement("tbody");

	var labelstring=["Title(displayed):","Value:","Description:"];
	for(var i=0;i<=2;i++){
		var tr=document.createElement("tr");
		var td1=document.createElement("td");
		var td2=document.createElement("td");
		var td3=document.createElement("td");
		var lb=document.createElement("label");
		if(i==0){
			var lbreq=document.createElement("label");
			lbreq.setAttribute("class","red");
			var lbsup=document.createElement("sup");
			lbsup.innerHTML="required";
			lbreq.appendChild(lbsup);
			td3.appendChild(lbreq);
		}
		lb.innerHTML=labelstring[i];
		var inp=document.createElement("input");
		if(i==2){
			inp.setAttribute("type","textarea");
			inp.setAttribute("cols","100");
			inp.setAttribute("rows","20");
		}else{
			inp.setAttribute("type","text");
		}
		
		
		// appending rows
		td1.appendChild(lb);
		td2.appendChild(inp);
		tr.appendChild(td1);
		tr.appendChild(td2);
		tr.appendChild(td3);
		tbody.appendChild(tr);
	}
	tb.appendChild(tbody);
	
	// appending table to div
	div.appendChild(tb);
	
	var h3=document.createElement("p");
	h3.innerHTML="Images to Upload for this art:";
	div.appendChild(h3);

	// create browse file area
	// need small div with table with 2 columns
	var divm=document.createElement("div");
	divm.setAttribute("name", "imagefiles");// could be a bunch of those
	var lb=document.createElement("label");
	imgfilecnt++;
	lb.innerHTML="Image "+imgfilecnt;
	var inp=document.createElement("input");
	inp.setAttribute("type","file");
	inp.setAttribute("accept","image/gif,image/jpeg,image/png");
	var tb=document.createElement("table");// reuse var tb
	var tblname=document.getElementsByTagName("table").length;// set master tables id's as mast-0, mast-1, etc...
	tblname="mast-"+tblname;
	tb.setAttribute("id",tblname);
	var tbody = document.createElement("tbody");
	var tr=document.createElement("tr");
	var td1=document.createElement("td");
	var td2=document.createElement("td");
	td1.appendChild(lb);
	td2.appendChild(inp);
	tr.appendChild(td1);
	tr.appendChild(td2);
	tbody.appendChild(tr);
	
	// more images link
	var tr=document.createElement("tr");
	var td1=document.createElement("td");
	var a=document.createElement("a");
	a.setAttribute("name","addartimages");// link to add images
	a.setAttribute("id","from~"+tblname);
	a.setAttribute("href","#");
	a.innerHTML="more images";
	//a.setAttribute("onclick","addimages('"+name+"');");// a.name
	a.onclick=addimages;
	td1.appendChild(a);
	tr.appendChild(td1);
	tbody.appendChild(tr);
	
	// view/edit images link
	var tr=document.createElement("tr");
	var td1=document.createElement("td");
	var a=document.createElement("a");
	a.setAttribute("name","addarteditimages");// link to view images
	a.setAttribute("href","#");
	a.innerHTML="View/ Edit images";
	td1.appendChild(a);
	tr.appendChild(td1);
	tbody.appendChild(tr);
	tb.appendChild(tbody);
	divm.appendChild(tb);
	
	div.appendChild(divm);
	
	// appending DIV to form
	document.getElementsByTagName("form")[0].appendChild(div);
	
}

function addimages(){
	// expands the DIV containing the file images loader with new image files
	// find the master tables and insert new row
	
	var trgtbl=(this.id.split("~"))[1];
	//document.getElementsByName("piname")[0].value=trgtbl;
	var tbles=document.getElementsByTagName("table");
	
	for(var i=0;i<tbles.length;i++){
		
		if(tbles[i].id==trgtbl){
			// expand here by inserting at the end (avoid the last two links)
			var cnt=tbles[i].getElementsByTagName("TR").length-1;
			var row = tbles[i].insertRow(tbles[i].getElementsByTagName("TR").length-2);

			var cell1 = row.insertCell(0);
			cell1.innerHTML = "Image "+cnt;
			
			var inp=document.createElement("input");
			inp.setAttribute("type","file");
			inp.setAttribute("accept","image/gif,image/jpeg,image/png");
			
			var cell2 = row.insertCell(1);
			cell2.appendChild(inp);
		}
	}
}