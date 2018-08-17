
<section class="stu_mid_sec">
         <div class="top_con admin_container">
            <div class="left_wrap1 col-lg-3 col-md-3 col-sm-3 col-xs-3">
               <div class="stu_sec_left">
                  <div class="bg-layer"></div>
                  <ul class="nav nav-tabs">
                  <li class="dash-ico nav-link active"><a  data-toggle="tab" href="#users_tab"  data-url="admin/users">Users</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  
                  <li class="exam-ico nav-link"><a data-toggle="tab" href="#institutions_tab" data-url="admin/institutions"> Institutions</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  <li class="repo-ico nav-link"><a data-toggle="tab" href="#schools_tab" data-url="admin/schools"> Schools</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  <li class="repo-ico nav-link"><a data-toggle="tab" href="#CreateSub_tab">Subjects</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  <li class="repo-ico nav-link"><a data-toggle="tab" href="#CreateTopic_tab">Topics</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  <li class="repo-ico nav-link"><a data-toggle="tab" href="#Upload_Questions">Upload Questions</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  <li class="repo-ico nav-link"><a data-toggle="tab" href="#Image_Questions">Create Image Questions</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
                  <li class="repo-ico nav-link"><a data-toggle="tab" href="#Create_Question_Paper">Create Question Paper</a><i  class="fa fa-caret-down" style="display: none;"></i></li>
               </div>
            </div>

           <div class="right_wrap1 col-lg-9 col-md-9 col-sm-9 col-xs-9 pull-right">
            <div class="tab-content">
            <div class="alert-danger"><?php echo $this->session->flashdata('message');?></div>
            <!-- User Registration-->
            <div id="users_tab" class="tab-pane fade in active">
                  
            </div>
            <!-- Institution-->
            <div id="institutions_tab" class="tab-pane fade">
            </div>
            <div id="schools_tab" class="tab-pane fade">
            </div>

            </div>
           </div> 
            
         </div>
         </div>
      </section>
