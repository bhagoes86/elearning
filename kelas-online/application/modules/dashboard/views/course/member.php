
<ol class="breadcrumb">
    <li><a href="<?php echo dashboard_url() ?>">Dashboard</a></li>
    <li><a href="<?php echo site_url('dashboard') ?>">Kelas Online</a></li>
    <li><a href="<?php echo site_url('dashboard/course/edit/'.$course->id) ?>"><?php echo $course->name ?></a></li>
    <li class="active">Member</li>
</ol>

<div class="kelas-main">
    <div class="card">
        <div class="card-header">
            Member
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($members as $user): ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo $user->avatar ?>" class="img img-circle img-fluid center-block">
                        </div>
                        <div class="col-md-6">
                            <strong><?php echo $user->full_name ?></strong><br>
                            <small><?php echo $user->email ?></small><br>
                            <small>Joined at <?php echo date('d F Y H:i', strtotime($user->pivot->joined_at)) ?></small><br>
                            
                            <?php if ($user->pivot->status == 'active'): ?>
                                <span class="label label-info">Active</span>
                            <?php elseif ($user->pivot->status == 'pending'): ?>
                                <span class="label label-warning">Pending</span>
                            <?php elseif ($user->pivot->status == 'finished'): ?>
                                <span class="label label-success">Finished</span>
                            <?php endif ?><br><br>

                            <?php if ($user->pivot->status == 'finished'): ?>
                            <!-- Button Trigger Modal -->
                            <!-- <button type="button" class="btn btn-primary btn-small btn-view-quiz" course-id="<?php echo $course->id ?>" user-name="<?php echo $user->full_name ?>" user-id="<?php echo $user->id ?>" data-toggle="modal" data-target="#myModal">Lihat Score Quiz</button> -->
                            <button type="button" class="btn btn-primary btn-small btn-view-exam" course-id="<?php echo $course->id ?>" user-name="<?php echo $user->full_name ?>" user-id="<?php echo $user->id ?>" data-toggle="modal" data-target="#myModal">Lihat Score Exam</button>
                            <!-- End Button Trigger Modal -->
                            <?php endif ?>

                        </div>
                        <div class="col-md-4">
                            <?php if ($user->pivot->status == 'pending'): ?>
                                <a href="<?php echo site_url('dashboard/course/approve-member/'.$course->id.'/'.$user->id) ?>" class="btn btn-primary">Approve</a>
                            <?php endif ?>
                            <a href="<?php echo site_url('dashboard/course/kick-member/'.$course->id.'/'.$user->id) ?>" class="btn btn-delete-lg btn-danger btn-margin-btm">Kick</a>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="card-block">
            <?php echo $members->render() ?>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Skor <span class="title-name-user"></span></h4>
      </div>
      <div class="modal-body">
            <div class="response-data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
    </div>
  </div>
</div>



<?php custom_script() ?>
<script type="text/javascript">
    var scores=function(){

        var url     = "<?php echo site_url('dashboard/course/') ?>";
         
        return{
            init:function(){
                scores.setData();
                
            },
            setData:function(){
                
               
                // $('.btn-view-quiz').click(function(){
                   
                //     var courseid = $(this).attr('course-id');
                //     var username = $(this).attr("user-name");

                    
                //     $('.title-name-user').html(" Quiz " + username);

                //     $.ajax({
                //         type: "GET",
                //         url: url+'/quizscores/'+courseid,
                //         success: function(response){
                            
                //             $('.response-data').html(response);

                //         }
                //     });
                // });

                $('.btn-view-exam').click(function(){
                   
                    var courseid = $(this).attr('course-id');
                    var username = $(this).attr("user-name");
                    var userid   = $(this).attr('user-id');

                    $('.title-name-user').html(" Exam " + username);

                    $.ajax({
                        type: "GET",
                        url: url+'/examscores/'+courseid+'/'+userid,
                        success: function(response){
                            
                            $('.response-data').html(response);

                        }
                    });
                });
               
            },

        } 
        }();
        scores.init();


 </script>

 <?php endcustom_script() ?>