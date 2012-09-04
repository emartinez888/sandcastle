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
	arr=$n("verify");
	for(var i = 0; i < arr.length; i++)
    {
        var obj = arr.item(i);

        if(obj.value=="Sign In"){
        	$i("signacct").onclick=verifyAcct;// existing account
        }
        else if(obj.value=="Create Account"){
        	$i("veracct").onclick=verifyNewAcct;// new account
        	($n("usersignin"))[0].onblur=verifyUsersIds;
        }else if(obj.value=="Update Account"){
        	$i("veracct").onclick=verifyUpdateAcct;
        	($n("usersignin"))[0].onblur=verifyUsersIds;
        }
    }
	
	$i("addart").onclick=addart;
	//$i("addartimages").onclick=addimages;
	//$i("addarteditimages").onclick=viewimages;
}


function verifyNewAcct(){
	var tmp=verifySingleLogin($i("emailsignin").value);
	if(!tmp){
		$i("error").innerHTML="Wrong User id or first email";
		return tmp;
	}
	tmp=tmp && ($n("emailsignin"))[0].value==($n("emailsignin2"))[0].value && chkemail(($n("emailsignin2"))[0].value);
	if(!tmp){
		$i("error").innerHTML="Emails don't match or wrong second email";
		return tmp;
	}	
}

function verifyAcct(){
		var tmp= verifySingleLogin($i("emailsignin").value);
		if(!tmp){
			$i("error").innerHTML="Wrong User id or email";
		}
		return tmp;		
}

function verifySingleLogin(email){
	var name=($n("usersignin"))[0].value;
	name=name.trim();
	($n("usersignin"))[0].value=name;// sets back the trimmed user id, allow blanks in id
	
	return (name.length>0) && chkemail(email) && (email.length>0);
}

function chkemail(email){
	var ergx=/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	return ergx.test(email);
}

function verifyUsersIds(){
	$i("error").innerHTML='';
	
	var name=($n("usersignin"))[0].value;
	name=name.trim();
	($n("usersignin"))[0].value=name;// sets back the trimmed user id, allow blanks in id
	if(name.length==0){
		$i("error").innerHTML="No User Id enterred.";
		return;
	}
	var tmp=$i("hide").innerHTML;
	tmp=tmp.split(',');
	
	for(var i=0;i<tmp.length;i++){
		if(name==tmp[i]){
			// we found an existing user id, test must fail
			$i("error").innerHTML="User Id "+name+" already in use";
			($n("usersignin"))[0].value='';// clear the field
			break;
		}
	}
}

function verifyUpdateAcct(){
	// just checks the user id
	$i("error").innerHTML='';
	var name=($n("usersignin"))[0].value;
	name=name.trim();
	($n("usersignin"))[0].value=name;// sets back the trimmed user id, allow blanks in id
	if(name.length==0){
		$i("error").innerHTML="No User Id enterred.";
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
	divm.setAttribute("id","imagefiles-"+$n("imagefiles").length);// set id similar to name should match the view/edit link
	var lb=document.createElement("label");
	imgfilecnt++;
	lb.innerHTML="Image "+imgfilecnt;
	var inp=document.createElement("input");
	inp.setAttribute("type","file");
	inp.setAttribute("accept","image/gif,image/jpeg,image/png");
	var tb=document.createElement("table");// reuse var tb
	var tblname=$t("table").length;// set master tables id's as mast-0, mast-1, etc...
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
	a.setAttribute("id","aimagefiles-"+$n("imagefiles").length);// related to its div
	a.onclick=editimages;
	td1.appendChild(a);
	tr.appendChild(td1);
	tbody.appendChild(tr);
	tb.appendChild(tbody);
	divm.appendChild(tb);
	
	div.appendChild(divm);
	
	// create div to hold view/ edit area
	// append to master DIV and give it an id
	var divm=document.createElement("div");
	divm.setAttribute("id", "editimages-"+$n("imagefiles").length);// leave this div blank
	div.appendChild(divm);
	
	// appending DIV to form
	$t("form")[0].appendChild(div);
	
}

function addimages(){
	// expands the DIV containing the file images loader with new image files
	// find the master tables and insert new row
	
	var trgtbl=(this.id.split("~"))[1];
	//$n("piname")[0].value=trgtbl;
	var tbles=$t("table");
	
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

function editimages(){
	// loop through valid file images and populate editimages-xx div
	// check if the filename is already in the editimages-xx div
	
	var trgid=this.id.split("-")[1];// from the anchor's id name
	var trgdiv=$i("editimages-"+trgid);// the expanding div, receiver
	trgid="imagefiles-"+trgid;// the div holding the filenames
	var divs=$n("imagefiles");// gets all divs with name imagefiles
	
	for(var i=0;i<divs.length;i++){
		// looping through all divs and select the ones named imagefiles
		//document.write(divs[i].id,trgid,divs[i].id==trgid,trgdiv.hasChildNodes());
		if(divs[i].id==trgid){
			// found a matching id one
			// check if filename is already in view/edit images div
			//document.write(divs[i].getElementsByTagName("input").length);
			if(!trgdiv.hasChildNodes()){
				var lb=document.createElement("label");
				lb.innerHTML=divs[i].getElementsByTagName("input")[0].value;
				trgdiv.appendChild(lb);
			}else{
				var test=true;
				for(var j=0;j<trgdiv.getElementsByTagName("label").length;j++){
					if(trgdiv.getElementsByTagName("label")[j].innerHTML==divs[i].getElementsByTagName("input")[0].value){
						test=false;
						break;
					}
				}
				if(test){
					var lb=document.createElement("label");
					lb.innerHTML=divs[i].getElementsByTagName("input")[0].value;
					trgdiv.appendChild(lb);
				}
			}
		}
	}
}