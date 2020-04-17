// Calling of Function (When Document is Loaded)
	$(document).ready(function () {
fetchportdata()	
fetchdbdata()
});
var ok =0;

//Function To Fetch Port & Show Display
		function fetchportdata(){
	$.ajax({
        url: 'include/'+mainfile+'.php',
        type: 'get',
		data : {fetchportdata:true},
        dataType: 'JSON', 
		
        success: function(response){
            var len = response.length;
			
if (len !== ""){
	for(var i=0; i<=len; i++){
	$("#fetchtab").remove();
	$("#hidval").remove();
	ok =0;
	}
	$("#tabdata1").remove();
	$("#tabdata2").remove();
	$("#tabdata3").remove();
	
            for(var i=0; i<len; i++){
				if(ok ==0){
					var lineno = response[i].lineno;
					var hidval ="<div id='hidval' data-value='"+lineno+"'></div>";
					$("#hiddenvalue").append(hidval);
				ok++;
				}
				var sl = response[i].sl;
				var ort = response[i].port;
				var port = ort.replace("Listen", "");
				var lineno = response[i].lineno;
				var tr_str = "<tr id='fetchtab'>" +
                    "<th scope='row'>" + sl + "</td>" +
                    "<td align='center'>" + port + "</td>" +
                     "<td align='center'>"+ "<button type='submit' class='btn btn-primary' onclick='removeport("+ lineno + ")'>" + "<i class='fa fa-trash'>" + "</i>"+"</button>"+"</td>" +
                   "</tr>";
$("#fetchtable tbody").append(tr_str);
				}

        }
		} 

    });
		}




//Function To Fetch Database & Show Display
function fetchdbdata(){
	$.ajax({
        url: 'include/'+mainfile+'.php',
        type: 'GET',
		data : {fetchdbname:true},
        dataType: 'JSON',
        success: function(response){
            var len = response.length;
		if (len !== ""){
			for(var i=0; i<=len; i++){
	$("#fetchdbtab").remove();
	}
$("#tabdb1").remove();
$("#tabdb2").remove();
$("#tabdb3").remove();
	
            for(var i=0; i<len; i++){
				
				var sl = response[i].sl;
				var dbname = response[i].db;
				var tr_str2 = "<tr id='fetchdbtab'>" +
                    "<th scope='row'>" + sl + "</td>" +
                    "<td align='center'>" + dbname + "</td>" +
                    "<td align='center'>"+ "<button type='submit' class='btn btn-primary' onclick=\"removedb(\'"+dbname+"\')\"><i class='fa fa-trash'>" + "</i>"+"</button>"+"</td>" +
                    "</tr>";
$("#fetchdbtable tbody").append(tr_str2);
				}

        }
		} 

    });
		}

		  //Function To Remove Database
		 function removedb(db) {
		 $.post("include/"+mainfile+".php", { db: db, removedb:true},
		 function(data){
			
			
			if(data == 2){
				toastr.success('Database Deleted Successfully')
				fetchdbdata()
			}else {
				alert(data);
			toastr.error('Error Occured!')
			}
		});
	}
		
		
		//Function To Remove Port
		function removeport(port) {
		$.post("include/"+mainfile+".php", { port: port, removeport:true},
		function(data){
			
			if(data == 0){
				toastr.success('Port Deleted Successfully')
				fetchportdata()	
			}else {
			toastr.error('Error Occured!')
			}
		});
	    }
	
	
	
	
	
	
//Function To Add Port	
function addport() {
	var port = $("#portno").val();
	var dir = $("#dir").val();
	var lno = document.getElementById('hidval').getAttribute('data-value');
	if(port !=""){
		$.post("include/"+mainfile+".php", { port: port, dir: dir, lno: lno,addport:true},
		function(data){
			if(data == 3){
				fetchportdata()	
				toastr.success('Port Added Successfully')
				 $("#portno").val('');
				 $("#dir").val('');
			}else {
			toastr.error('Error Occured!')
			}
		});
	}
	}
	
	//Function To Create Database	
function createdb() {
	var db = $("#dbname").val();
	if(db !=""){
		$.post("include/"+mainfile+".php", { db : db,createdb:true},
		function(data){
			if(data == 2){
				fetchdbdata()	
				toastr.success('Database Created Successfully')
				 $("#dbname").val('');
			}else {
			toastr.error('Error Occured!')
			}
		});
	}
	}
	
	