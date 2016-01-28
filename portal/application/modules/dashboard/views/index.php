            <!-- start:content atas-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <section class="content-articles">
                        <div class="content-articles-heading">
                            <h3>Dashboard Post Articles</h3>
                        </div>
                    </section> 
                    <div class="container content-submit">
                        <div class="alert alert-warning" role="alert">
                            <strong><?php echo $draftcount ?> Artikel</strong> masih di review. <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#artikel-status-draft"> Lihat </button>
                        </div>


                        <!-- MODAL EXAM SCORES -->
                        <div class="modal fade" id="artikel-status-draft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Artikel Status Draft</h4>
                              </div>
                              <div class="modal-body">
                                <?php if ($draftcount == 0): ?>
                                    <?php echo "Data kosong." ?>
                                <?php else: ?>
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($drafts as $key => $value): ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $value->title ?></td>
                                                <td><div class="label label-warning"><?php echo $value->status ?></div></td>
                                                <td><a href="<?php echo site_url('dashboard/editArticle/'.$value->id) ?>" class="btn btn-success">Edit</a></td>
                                            </tr>
                                            <?php $no++; endforeach ?>
                                                
                                        </tbody>
                                    </table>
                                <?php endif ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                            </div>
                          </div>
                        </div>
                        <!-- END EXAM SCORES MODAL -->

                        <div class="widget">
                            <div class="widget-content">
                                <div class="tab-content" id="myTabTableContent">
                                    <div role="tabpanel" class="tab-pane fade active in" id="article-submit" aria-expanded="true">
                                        <form class="pull-left">
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                  <a class="btn btn-primary" href="<?php echo site_url('dashboard/sendArticle') ?>"><i class="fa fa-plus"></i> Submit Artikel</a>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="pull-right">
                                            <div class="form-group row">
                                                <label for="inputKeyword" class="col-sm-3 form-control-label">Search</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="keyword" placeholder="Search...">
                                                </div>
                                            </div>
                                        </form>
                                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Status</th>
                                                    <th>Waktu Terbit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1; foreach ($artikel as $key => $value): ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $value->title ?></td>
                                                    <td><div class="label label-success"><?php echo $value->status ?></div></td>
                                                    <td><?php echo date('d F Y h:i:s',strtotime($value->published)) ?></td>
                                                    
                                                </tr>
                                                <?php $no++; endforeach ?>
                                                
                                            </tbody>
                                        </table>
                                        <nav class="pull-right">
                                        <?php echo $artikel->render() ?>
                                        </nav>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:content atas-->

            <!-- start: chart -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <section class="content-articles">
                        <div class="content-articles-heading">
                            <h3>Statistik Top 10</h3>
                        </div>
                    </section>
                    <!-- start:chart-submit-terbanyak -->
                    <div class="top-submit-artikel" style="width:100%; height:400px;"></div><br><br>
                    <!-- end:chart-submit-terbanyak -->

                    <!-- start:chart-aktif-kelas -->
                    <div class="top-aktif-kelas" style="width:100%; height:400px;"></div>
                    <!-- end:chart-aktif-kelas -->
                </div>
            </div>
            <!-- end: chart -->

            <!-- Begin Recent Activity -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <section class="content-articles">
                        <div class="content-articles-heading">
                            <h3>Recent Activity</h3>
                        </div>
                    </section>
                    <div class="recent-activity">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="recent-portal">
                                <div class="container">
                                    <div class="row">
                                        <div class="recent-portal-heading">
                                            <h3>Recent activity portal</h3>
                                        </div>
                                        <div class="recent-portal-content">
                                            <div class="portal-comment">
                                                <h4>Artikel yang anda comment :</h4>
                                                <ul>
                                                    <?php  
                                                        if(!empty($recentArticleComment)){
                                                            foreach($recentArticleComment as $article){
                                                                echo '<li>'.anchor('dashboard/article/show/'.$article->slug, $article->title).'</li>';
                                                            }
                                                        }else{
                                                            echo '<il>Belum ada artikel yang anda komentari.</li>';
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-elibrary">
                                <div class="container">
                                    <div class="row">
                                        <div class="recent-elibrary-heading">
                                            <h3>Recent activity Elibrary</h3>
                                        </div>
                                        <div class="recent-elibrary-content">
                                            <div class="list-elibrary">
                                                <h4>Recent Library</h4>
                                                <ul>
                                                    <?php  
                                                        if(!empty($recentMedia)){
                                                            foreach($recentMedia as $media){
                                                                if($media->status == 'publish'){
                                                                    echo '<li>'.anchor($media->link, $media->title).'</li>';
                                                                }else{
                                                                    echo '<li>'.anchor('elibrary/media/edit/'.$media->id, $media->title).'</li>';
                                                                }
                                                            }
                                                        }else{
                                                            echo '<li class="bg-warning">Anda belum mengunggah library</li>';
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="elibrary-comment">
                                                <h4>Your Media Files</h4>
                                                <ul>
                                                    <li><?php echo anchor('elibrary/media', 'Your Media Files'); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-konsultasi">
                                <div class="container">
                                    <div class="row">
                                        <div class="recent-konsultasi-heading">
                                            <h3>Recent activity konsultasi</h3>
                                        </div>
                                        <div class="recent-konsultasi-content">
                                            <div class="list-konsultasi">
                                                <h4>Konsultasi terakhir anda: </h4>
                                                <?php if ($latestKonsultasi->count()): ?>                                                
                                                    <?php foreach ($latestKonsultasi as $row): ?>                                                    
                                                        <div class="row">
                                                            <div class="list-timeline">
                                                                <div class="col-xs-3 date">
                                                                    <i class="fa fa-file-text"></i>
                                                                    <small class="text-green"><?php echo Carbon\Carbon::parse($row->created_at)->format('d F Y H:i'); ?></small>
                                                                </div>
                                                                <div class="col-xs-6 content">
                                                                    <div class="title">
                                                                        <p><b><?php echo $row->subjek ?></b></p>
                                                                        <p><?php echo $row->pesan ?></p>
                                                                        <a href="<?php echo site_url('konsultasi/konsultasi/detail/'.$row->id) ?>" class="btn btn-sm btn-primary">show detail</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php else: ?>
                                                    <div class="alert alert-warning">Tidak ada Konsultasi.</div>
                                                <?php endif ?>
                                            </div>
                                            <div class="latest-comment">
                                                <h4>Balasan terakhir Anda: </h4>
                                                <?php foreach ($latestReply as $reply): ?>                                                    
                                                    <ul>
                                                        <li>
                                                            <?php if (sentinel()->inRole(array('ta'))): ?>     
                                                                <a href="<?php echo site_url('konsultasi/dashboard/detail/'.$reply->id) ?>"><?php echo $reply->subjek ?></a>                                                                
                                                            <?php else: ?>                                                           
                                                                <a href="<?php echo site_url('konsultasi/konsultasi/detail/'.$reply->id) ?>"><?php echo $reply->subjek ?></a>
                                                            <?php endif ?>
                                                            <div class="comment">
                                                                <b>Balasan :</b>
                                                                <p><?php echo $reply->isi ?></p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="recent-forum">
                                <div class="container">
                                    <div class="row">
                                        <div class="recent-forum-heading">
                                            <h3>Recent activity forum</h3>
                                        </div>
                                        <div class="recent-forum-content">
                                            <div class="forum-tread">
                                                <div class="notification">
                                                    <?php 
                                                        foreach ( $forumNotif as $notif ) {
                                                            echo '<h4><i class="fa fa-info"></i> Anda diundang kedalam forum thread <b> '.anchor('dashboard/viewThread/'.$notif->thread_id, '"'.$notif->title.'"').'</b></h4>';
                                                        }
                                                    ?>
                                                </div>
                                                <h4>Forum yang diikuti: </h4>
                                                <ul>
                                                    <?php 
                                                        foreach($forumCategories as $cat){
                                                            echo '<li>'.anchor('forum/thread/category/'.$cat->id, $cat->category_name).'</li>';
                                                        }
                                                    ?>
                                                </ul>
                                                <div class="latest-comment">
                                                    <h4><i class="fa fa-wechat"></i> Komentar terakhir anda :</h4>
                                                    <ul>
                                                        <li>
                                                            <?php 
                                                                if(!empty($forumLatestComment)){
                                                                    foreach ($threadLatestComment as $thr) {
                                                                        echo anchor('forum/thread/view/'.$thr->id, $thr->title);
                                                                    }
                                                                    foreach ($forumLatestComment as $comment) {
                                                                        echo '<div class="comment">
                                                                                <p><b>comment: </b>'.BBCodeParser($comment->message).'</p>
                                                                            </div>';
                                                                    }
                                                                }else{
                                                                    echo '<div class="alert alert-warning">Belum ada komentar dari anda.</div>';
                                                                }
                                                            ?>
                                                        </li>
                                                    </ul>
                                                    <h4><i class="fa fa-wechat"></i> Komentar baru :</h4>
                                                    <ul>
                                                        <?php  
                                                            if(isset($newThreadComments)){
                                                                foreach($allThreads as $thr){
                                                                    $no     = 0;
                                                                    foreach ($newThreadComments as $newComments) {
                                                                        if($newComments->reply_to == $thr->id){
                                                                            $no = $no + 1;
                                                                        }
                                                                    }
                                                                    if($no > 0){
                                                                        echo '<li>'.anchor('dashboard/viewThreadCommentar/'.$thr->id, $thr->title.' <div class="label label-success">'.$no.'</div>').'</li>';
                                                                    }
                                                                }
                                                            }else{
                                                                echo '<li><div class="alert alert-warning">Belum ada komentar baru.</div></li>';
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="lastest-comment">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-kelas">
                                <div class="container">
                                    <div class="row">
                                        <div class="recent-kelas-heading">
                                            <h3>Recent Activity Kelas Online</h3>
                                        </div>
                                        <div class="recent-kelas-content">
                                            <div class="kelas-terbaru">
                                                <h4><i class="fa fa-info"></i> Kelas Terbaru:</h4>
                                                <ul>

                                                    <?php if ($courses->count() == 0): ?>
                                                        
                                                        <li><a href="javascript:;" title="">Tidak ada kelas terbaru</a></li>   
                                                    
                                                    <?php else: ?>
                                                    
                                                        <?php foreach ($courses as $key => $course): ?>
                                                        <li>
                                                            <?php $coursecode = str_replace('.', '-', $course->code); ?>
                                                            <a href="<?php echo site_url('kelas-online/course/join/'.$coursecode) ?>"><p><?php echo $course->name ?></p></a>
                                                            <a href="<?php echo site_url('kelas-online/course/join/'.$coursecode) ?>" class="btn btn-start btn-md btn-block">Mulai Kelas</a>
                                                        </li>
                                                        <?php endforeach ?>
                                                    
                                                    <?php endif ?>
                                                    
                                                </ul>
                                            </div>
                                            <div class="kelas-content">
                                              <h4>Kelas yang anda Ikuti:</h4>
                                                <ul>
                                                    <?php if ($myclasscourse->count() == 0): ?>
                                                        
                                                        <li><a href="javascript:;" title="">Tidak ada kelas yang anda ikuti</a></li>   
                                                    
                                                    <?php else: ?>
                                                        
                                                        <?php foreach ($myclasscourse as $key => $mycourse): ?>
                                                            <li>
                                                                <?php $mycoursecode = str_replace('.', '-', $mycourse->course->code); ?>
                                                                <a href="<?php echo site_url('kelas-online/course/join/'.$mycoursecode) ?>"><?php echo $mycourse->course->name ?></a>
                                                            </li>
                                                        <?php endforeach ?>

                                                    <?php endif ?>  
                                                </ul>
                                            </div>
                                            <div class="latest-comment">
                                                <h4><i class="fa fa-wechat"></i> Kelas yang ada comment:</h4>
                                                <ul>
                                                    <?php if($coursecomments->count() != 0): ?>
                                                        <?php foreach ($coursecomments as $comment): ?>
                                                        <li><a href="javascript:;"><?php echo $comment->course->name ?></a>
                                                            <div class="comment">
                                                                <p><b>comment </b><br>
                                                                <?php echo $comment->name." : ".$comment->content ?></p>
                                                            </div>
                                                        </li>
                                                        <?php endforeach ?>
                                                    <?php else: ?>
                                                        <li><a href="javascript:;" title="">Tidak ada data</a></li>
                                                    <?php endif ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Recent Activity -->
            <?php
            $nama       = '';
            foreach ($toptenarticles as $key => $value) {
                
                $nama .= $value->nama.",";
            }

            
            $hasil = ''; 
            foreach ($toptenarticlecount as $key => $value) {
                
                $hasil .= $value->occurences.",";
            }


            ?>
            <span id="hasil-skor-artikel"><?php echo $hasil ?></span>
            <span id="hasil-nama-contributor"><?php echo $nama ?></span>  
            

<?php custom_stylesheet() ?>

    <link href="<?php echo asset('/plugins/jQuery.filer-1.0.5/css/jquery.filer.css') ?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo asset('/plugins/jQuery.filer-1.0.5/css/themes/jquery.filer-dragdropbox-theme.css') ?>" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo asset('stylesheets/custom-jquery-filer.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('node_modules/datatables/media/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('stylesheets/cropit.css') ?>">

<?php endcustom_stylesheet() ?>

<?php custom_script() ?>
<?php $this->load->view('template/vue_cropit'); ?>
 <!--jQuery-->
<script src="<?php echo asset('javascript/editor.js') ?>"></script>
<script src="<?php echo asset('plugins/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo asset('node_modules/cropit/dist/jquery.cropit.js') ?>"></script>
<script src="<?php echo asset('node_modules/vue/dist/vue.min.js') ?>"></script>
<!-- hight chart -->
<script src="<?php echo asset('plugins/highcharts/js/highcharts.js') ?>"></script>
<script src="<?php echo asset('javascript/custom-hightcharts.js') ?>"></script>
<script src="<?php echo asset('javascript/exporting-hightchart.js') ?>"></script>

<script src="<?php echo asset('javascript/cropit.vue.js') ?>"></script>
<script type="text/javascript" src="<?php echo asset('/plugins/jQuery.filer-1.0.5/js/jquery.filer.min.js?v=1.0.5') ?>"></script>
<script type="text/javascript" src="<?php echo asset('/javascript/jquery.filer.custom.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        tinymce.init({
            selector: '.editor'
        })
    });
</script>

<script type="text/javascript">
    $('.description-text').on('keyup', function() {
        limitText(this, 250)
    });

    function limitText(field, maxChar){
        var ref = $(field),
            val = ref.val();
        if ( val.length >= maxChar ){
            ref.val(function() {
                console.log(val.substr(0, maxChar))
                return val.substr(0, maxChar);       
            });
        }
    }

</script>

<script type="text/javascript">
function checkInput(){
    if(document.getElementById('filer_input_media').value == ''){  
        alert('Anda harus memilih file untuk diunggah terlebih dahulu!');  
        document.getElementById('filer_input_media').focus();  
        return false;  
    }else{
        var count   = document.getElementsByClassName('fileName');
        var id      = '';
        for(var i=0;i<count.length;i++){
            if(i>0){
                id = i;
            }
            if(document.getElementById('fileName'+id).value == ''){  
                alert('Nama file harus diisi terlebih dahulu!');  
                document.getElementById('fileName'+id).focus();  
                return false;  
            }
        }
    }
    document.getElementById('formMedia').submit();
}
</script>

<?php endcustom_script() ?>
