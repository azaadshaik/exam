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
$(document).delegate(":input[data-search]", "keyup", function() {
	var eleId = this.id;
		$('.search-result').hide();
        if($('#'+eleId).val().length > 2 ){
			
			$('#'+eleId).addClass('ui-autocomplete-loading');	
			$('.search-button').hide();
			$.ajax({
				url: $('#'+eleId).attr('data-search'),
				 type: 'GET',
				data: {
					term : $('#'+eleId).val(),
					module:$('#'+eleId).attr('data-table')
				},
				success: function(data) {
					$('.search-button').show();
					$('#'+eleId).removeClass('ui-autocomplete-loading');
					$('.search-result').html(data);
					$('.search-result').show();
						
				}
			});
		}
		else{
			return false;
		}
  
})
 

$('.admin_container .nav-tabs li > a').click(function(e){

   
    var url= this.getAttribute('data-url');
    var contentDiv = this.getAttribute('href');
  /*  if ( $(contentDiv).children().length > 0 ) {
        
        return;
   }*/
   $('#loader').show();
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $(contentDiv).html(data);
        }
        
    });

});


function submitForm(formId,redirect,contentDiv){
	
	
    $('#loader').show();
    var thisform = document.getElementById(formId);
    var action = thisform.getAttribute('action');
    var formData = new FormData(thisform);
    
    $.ajax({
        url: action,
        type: 'POST',
        data: formData,
        enctype: 'multipart/form-data',
        success: function (data) {
            $('#loader').hide();
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
$('#loader').show();
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });   
}


function createNew(url,divToUpdate){
 
    $('#loader').show();
       
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
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
function renderQuestionOptions(options_count){
    
    $.ajax({
        url: 'admin/renderQuestionOptions/?options_count='+options_count,
        type: 'GET',
        success: function (data) {
            $('#question_options').html(data);
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
function loadSubjects(classId){
	
    $.ajax({
        url: 'admin/getSubjectsByClassId/?class_id='+classId,
        type: 'GET',
        success: function (data) {
            

$('#subject').find('option').remove().end().append('<option value="0">Select Subject</option>');



			$("#subject").removeAttr('disabled');
			var obj = jQuery.parseJSON(data);
			
			$.each( obj, function( key, value ) {
				$("#subject").append( new Option(value.subject_name,value.subject_id) );
			});
		}
        
    });
}
function loadTopics(subjectId){
	
    $.ajax({
        url: 'admin/getTopicsBySubjectId/?subject_id='+subjectId,
        type: 'GET',
        success: function (data) {
            

$('#topic').find('option').remove().end().append('<option value="0">Topic</option>');



			$("#topic").removeAttr('disabled');
			var obj = jQuery.parseJSON(data);
			
			$.each( obj, function( key, value ) {
				$("#topic").append( new Option(value.topic_name,value.topic_id) );
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

function loadSections(classId){
	
    $.ajax({
        url: 'admin/getSectionsByClassId/?class_id='+classId,
        type: 'GET',
        success: function (data) {
            $('#section').find('option').remove().end().append('<option value="0">Select Section</option>');
			$("#section").removeAttr('disabled');
			var obj = jQuery.parseJSON(data);
			
			$.each( obj, function( key, value ) {
				$("#section").append( new Option(value.section_name,value.section_id) );
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
	
	$('#loader').show();
    $.ajax({
        url: 'admin/view_school/?school_id='+schoolId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
			
        }
        
    });
}
function viewSubject(subjectId,divToUpdate){
	$('#loader').show();
    $.ajax({
        url: 'admin/view_subject/?subject_id='+subjectId,
        type: 'GET',
        success: function (data) {
			$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}
function editSchool(schoolId,divToUpdate){
	$('#loader').show();
    $.ajax({
        url: 'admin/edit_school/?school_id='+schoolId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}

function editSubject(subjectId,divToUpdate){
	$('#loader').show();
    $.ajax({
        url: 'admin/edit_subject/?subject_id='+subjectId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}
function editTopic(topicId,divToUpdate){
$('#loader').show();
    $.ajax({
        url: 'admin/edit_topic/?topic_id='+topicId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}



function editInstitution(institutionId,divToUpdate){
$('#loader').show();
    $.ajax({
        url: 'admin/edit_institution/?institution_id='+institutionId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}

function viewInstitution(institutionId,divToUpdate){
$('#loader').show();
    $.ajax({
        url: 'admin/view_institution/?institution_id='+institutionId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}
function deleteInstitution(institutionId,divToUpdate){

 $.confirm({
        text: "Are you sure to delete?",
        confirm: function(button) {
		$('#loader').show();
             $.ajax({
				url: 'admin/delete_institution/?institution_id='+institutionId,
				type: 'GET',
				success: function (data) {
				$('#loader').hide();
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
		$('#loader').show();
             $.ajax({
				url: 'admin/delete_school/?school_id='+schoolId,
				type: 'GET',
				success: function (data) {
				$('#loader').hide();
					$('#'+divToUpdate).html(data);
				}
        
			});
        },
        cancel: function(button) {
         return false;
        }
    });
       
   
   
}

function deleteTopic(topicId,divToUpdate){

    $.confirm({
           text: "Are you sure to delete?",
           confirm: function(button) {
		   $('#loader').show();
                $.ajax({
				
                   url: 'admin/delete_topic/?topic_id='+topicId,
                   type: 'GET',
                   success: function (data) {
				   $('#loader').hide();
                       $('#'+divToUpdate).html(data);
                   }
           
               });
           },
           cancel: function(button) {
            return false;
           }
       });
          
      
      
   }
function deleteSubject(subjectId,divToUpdate){

    $.confirm({
           text: "Are you sure to delete?",
           confirm: function(button) {
		   $('#loader').show();
                $.ajax({
                   url: 'admin/delete_subject/?subject_id='+subjectId,
                   type: 'GET',
                   success: function (data) {
				   $('#loader').hide();
                       $('#'+divToUpdate).html(data);
                   }
           
               });
           },
           cancel: function(button) {
            return false;
           }
       });
          
      
      
   }

function editUser(userId,divToUpdate){
$('#loader').show();
	 $.ajax({
        url: 'user/edit_user/?user_id='+userId,
        type: 'GET',
        success: function (data) {
		$('#loader').hide();
            $('#'+divToUpdate).html(data);
        }
        
    });
}
function viewUser(userId,divToUpdate){
$('#loader').show();
    $.ajax({
       url: 'user/view_user/?user_id='+userId,
       type: 'GET',
       success: function (data) {
	   $('#loader').hide();
           $('#'+divToUpdate).html(data);
       }
       
   });
}

function viewTopic(topicId,divToUpdate){
$('#loader').show();
    $.ajax({
       url: 'admin/view_topic/?topic_id='+topicId,
       type: 'GET',
       success: function (data) {
	   $('#loader').hide();
           $('#'+divToUpdate).html(data);
       }
       
   });
}
function deleteUser(userId,divToUpdate){


    $.confirm({
        text: "Are you sure to delete?",
        confirm: function(button) {
		$('#loader').show();
            $.ajax({
                url: 'user/delete_user/?user_id='+userId,
                type: 'GET',
                success: function (data) {
				$('#loader').hide();
                    $('#'+divToUpdate).html(data);
                }
                
            });
        },
        cancel: function(button) {
         return false;
        }
    });
    
}



  function editQuestion(questionId,divToUpdate){
    $('#loader').show();
        $.ajax({
            url: 'admin/edit_question/?question_id='+questionId,
            type: 'GET',
            success: function (data) {
            $('#loader').hide();
                $('#'+divToUpdate).html(data);
            }
            
        });
    }
	function viewQuestion(questionId,divToUpdate){
    $('#loader').show();
        $.ajax({
            url: 'admin/view_question/?question_id='+questionId,
            type: 'GET',
            success: function (data) {
            $('#loader').hide();
                $('#'+divToUpdate).html(data);
            }
            
        });
    }

    function resetImageInput(closeLinkId,elementId,imageId){
        
        $('#'+elementId).val('');
        $('#hidden-'+elementId).val('');
        $('#'+imageId).attr('src','#');
        $('#'+imageId).addClass('hide');
        $('#'+closeLinkId).addClass('hide')
        
    }
    function renderOptionImage(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
      
            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
                    $('#'+id).removeClass('hide');
                    $('#'+id).addClass('image_holder');
                    $('#'+id).siblings().removeClass('hide');
                    
            };
      
            reader.readAsDataURL(input.files[0]);
        }
      }

      function editExam(examId,divToUpdate){
        $('#loader').show();
            $.ajax({
                url: 'admin/edit_exam/?exam_id='+examId,
                type: 'GET',
                success: function (data) {
                $('#loader').hide();
                    $('#'+divToUpdate).html(data);
                }
                
            });
        }
        
        function viewExam(examId,divToUpdate){
        $('#loader').show();
            $.ajax({
                url: 'admin/view_exam/?exam_id='+examId,
                type: 'GET',
                success: function (data) {
                $('#loader').hide();
                    $('#'+divToUpdate).html(data);
                }
                
            });
        }
        function deleteExam(examId,divToUpdate){
        
         $.confirm({
                text: "Are you sure to delete?",
                confirm: function(button) {
                $('#loader').show();
                     $.ajax({
                        url: 'admin/delete_exam/?exam_id='+examId,
                        type: 'GET',
                        success: function (data) {
                        $('#loader').hide();
                            $('#'+divToUpdate).html(data);
                        }
                
                    });
                },
                cancel: function(button) {
                 return false;
                }
            });
        }
        $(document).delegate("#examDatetime", "click", function() {
            
        $('#examDatetime').datetimepicker({
            formatDate:'Y/m/d',
           minDate:'-1970/01/01',//yesterday is minimum date(for today use 0 or -1970/01/01)
           //maxDate:'+1970/01/02'//tomorrow is maximum date calendar
           step:15,
          });
        });

        $(document).delegate(":input", "focus", function() {
            if($(this).hasClass('error')){    
                $( this ).removeClass('error');
                $( this ).parent().next('div' ).hide();
            }

        });

function updateQuestions(){
$('#loader').show();
var selectedClass = $('#class').val();
var selectedSubject = $('#subject').val();
var selectedtopic = $('#topic').val();
var selectedlevel = $('#level').val();
    $.ajax({
        url: 'admin/loadQuestions',
        type: 'POST',
		data:{class_id:selectedClass,subject_id:selectedSubject,topic_id:selectedtopic,level:selectedlevel},
        success: function (data) {
		$('#loader').hide();
            $('#div1').html(data);
        }
        
    });   
}

function validateQuestionPaperForm(){

if($('#questionPaperName').val()==''){
	$('#questionPaperName').addClass('error');
	$('#questionPaperName').parent().next('div' ).html('<p>Question Paper Name is required</p> ');
	
	$('#questionPaperName').parent().next('div' ).show();
	return false;
}
else if($('#questionPaperCode').val()==''){
	$('#questionPaperCode').addClass('error');
	$('#questionPaperCode').parent().next('div' ).html('<p>Question Paper Code is required</p> ');
	
	$('#questionPaperCode').parent().next('div' ).show();
}
else if($('#exam_id').val()==0){
	$('#exam_id').addClass('error');
	$('#exam_id').parent().next('div' ).html('<p>Exam Name is required</p> ');
	
	$('#exam_id').parent().next('div' ).show();
}
else{
	submitForm('questionPaperForm','bla','question_papers_tab');
}
var selectedSubject = $('#subject').val();
var selectedtopic = $('#topic').val();
var selectedlevel = $('#level').val();
    $.ajax({
        url: 'admin/loadQuestions',
        type: 'POST',
		data:{class_id:selectedClass,subject_id:selectedSubject,topic_id:selectedtopic,level:selectedlevel},
        success: function (data) {
		$('#loader').hide();
            $('#div1').html(data);
        }
        
    });   
}

 

