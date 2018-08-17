/*$("form#regForm").submit(function(e) {
    var thisform = document.getElementById('regForm');
    e.preventDefault();    
    var formData = new FormData(thisform);
    console.log(formData);
    $.ajax({
        url: 'user/register',
        type: 'POST',
        data: formData,
        enctype: 'multipart/form-data',
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false
    });
});*/

$('.admin_container .nav-tabs li > a').click(function(e){

   
    var url= this.getAttribute('data-url');
    var contentDiv = this.getAttribute('href');
  /*  if ( $(contentDiv).children().length > 0 ) {
        
        return;
   }*/
   
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            $(contentDiv).html(data);
        }
        
    });

});

function submitForm(formId,redirect,contentDiv){
    
    var thisform = document.getElementById(formId);
    var action = thisform.getAttribute('action');
    var formData = new FormData(thisform);
    
    $.ajax({
        url: action,
        type: 'POST',
        data: formData,
        enctype: 'multipart/form-data',
        success: function (data) {
            alert(contentDiv);
           // loadRedirect(redirect,contentDiv);
           $('#'+contentDiv).html(data);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;   
}

function loadRedirect(url,divToUpdate){

    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            $('#'+divToUpdate).html(data);
        }
        
    });   
}


function createNew(url,divToUpdate){
 
    
       
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            $('#'+divToUpdate).html(data);
        }
        
    });
}

function renderRolebasedFields(option){
    
    $.ajax({
        url: 'admin/renderRoleBasedFields/?role_id='+option,
        type: 'GET',
        success: function (data) {
            $('#user_class_map').html(data);
        }
        
    });



}

function loadSchools(instituteId){
	
    $.ajax({
        url: 'admin/getSchoolsByInsId/?ins_id='+instituteId,
        type: 'GET',
        success: function (data) {
            

$('#school').find('option').remove().end().append('<option value="0">Select School</option>');



			$("#school").removeAttr('disabled');
			var obj = jQuery.parseJSON(data);
			
			$.each( obj, function( key, value ) {
				$("#school").append( new Option(value.school_name,value.school_id) );
			});
		}
        
    });
}
function loadClasses(schoolId){
	
    $.ajax({
        url: 'admin/getClassesBySchoolId/?school_id='+schoolId,
        type: 'GET',
        success: function (data) {
            $('#class').find('option').remove().end().append('<option value="0">Select Class</option>');
			$("#class").removeAttr('disabled');
			var obj = jQuery.parseJSON(data);
			
			$.each( obj, function( key, value ) {
				$("#class").append( new Option(value.class_name,value.class_id) );
			});
		}
        
    });
}


function loadDistricts(stateId){

    $.getJSON('admin/getDistrictsBystateId/?state_id='+stateId, function(data){
        $('#districts').html('');
        $('#districts').append('<option value="">Select</option>');
        $.each(data, function (index, value) {
            
            
            $('#districts').append('<option value="' + value.district_id + '">' + value.district_name + '</option>');
        });
    });
    
}
function viewSchool(schoolId,divToUpdate){

    $.ajax({
        url: 'admin/view_school/?school_id='+schoolId,
        type: 'GET',
        success: function (data) {
            $('#'+divToUpdate).html(data);
        }
        
    });
}
function editSchool(schoolId,divToUpdate){

    $.ajax({
        url: 'admin/edit_school/?school_id='+schoolId,
        type: 'GET',
        success: function (data) {
            $('#'+divToUpdate).html(data);
        }
        
    });
}

function editInstitution(institutionId,divToUpdate){

    $.ajax({
        url: 'admin/edit_institution/?institution_id='+institutionId,
        type: 'GET',
        success: function (data) {
            $('#'+divToUpdate).html(data);
        }
        
    });
}

function viewInstitution(institutionId,divToUpdate){

    $.ajax({
        url: 'admin/view_institution/?institution_id='+institutionId,
        type: 'GET',
        success: function (data) {
            $('#'+divToUpdate).html(data);
        }
        
    });
}
function deleteInstitution(institutionId,divToUpdate){

 $.confirm({
        text: "Are you sure to delete?",
        confirm: function(button) {
             $.ajax({
				url: 'admin/delete_institution/?institution_id='+institutionId,
				type: 'GET',
				success: function (data) {
					$('#'+divToUpdate).html(data);
				}
        
			});
        },
        cancel: function(button) {
         return false;
        }
    });
       
   
   
}

function deleteSchool(schoolId,divToUpdate){

 $.confirm({
        text: "Are you sure to delete?",
        confirm: function(button) {
             $.ajax({
				url: 'admin/delete_school/?school_id='+schoolId,
				type: 'GET',
				success: function (data) {
					$('#'+divToUpdate).html(data);
				}
        
			});
        },
        cancel: function(button) {
         return false;
        }
    });
       
   
   
}