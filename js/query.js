// Main File Declaration
var mainfile ="mainfile";
// Calling of Function (When Document is Loaded) & (Every 3 Seconds)
	$(document).ready(function () {
	queryvhcount()
	queryportcount()
	queryexecount()
	querydbcount()
	querysqlversion()
	setInterval(function(){
    queryvhcount()
	queryportcount()
	queryexecount()
	querydbcount()
}, 3000);
});

//Database Count Function
function querydbcount(){
	
		$.post("include/"+mainfile+".php", {dbquery:true},
		function(data){
			if(data != "" ){
				$("#dbcount").empty();
				$("#4pro").empty();
				$("#dbcount").append(data);
				$("#progress4").remove();
				var ProgressBar =  '<div role="progressbar"  style="width:'+ data*10 +'%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>';
	
	$("#4pro").append(ProgressBar);
			}else {
			toastr.error('Error Occured!')
			}
		});
	}
	// Port Count Function
	function queryportcount(){
	
		$.post("include/"+mainfile+".php", {portquery:true},
		function(data){
			
			if(data != "" ){
				$("#portcount").empty();
				$("#2pro").empty();
				$("#portcount").append(data);
				$("#progress2").remove();
				var ProgressBar =  '<div role="progressbar"  style="width:'+ data*10 +'%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>';
	
	$("#2pro").append(ProgressBar);
			}else {
			toastr.error('Error Occured!')
			}
		});
	}
	// Virtual Host Count Function
	function queryvhcount(){
	
		$.post("include/"+mainfile+".php", {vhquery:true},
		function(data){
			
			if(data != "" ){
				$("#vhcount").empty();
				$("#1pro").empty();
				$("#vhcount").append(data);
				$("#progress1").remove();
				var ProgressBar =  '<div role="progressbar"  style="width:'+ data*10 +'%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>';
	
	$("#1pro").append(ProgressBar);
				  
			}else {
			toastr.error('Error Occured!')
			}
		});
	}
	
	// Maximum Exe Time Count Function
	function queryexecount(){
	
		$.post("include/"+mainfile+".php", {exequery:true},
		function(data){
			
			if(data != "" ){
				$("#execount").empty();
				$("#3pro").empty();
				$("#execount").append(data);
				$("#progress3").remove();
				var ProgressBar =  '<div role="progressbar"  style="width:'+ 300/data*100 +'%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>';
	
	$("#3pro").append(ProgressBar);
			}else {
			toastr.error('Error Occured!')
			}
		});
	}
	// Sql Version Function
	function querysqlversion(){
		$.ajax({
        url: 'include/'+mainfile+'.php',
        type: 'GET',
		data : {sqlversion:true},
        dataType: 'JSON',
        success: function(response){
		var version = response;
		document.getElementById("sqlversion").value = version;
	} 

    });
		}
	
	