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
                            <strong>2 Artikel</strong> masih di review. <a href="#" class="btn btn-sm btn-warning">Lihat</a>
                        </div>
                        <div class="widget">
                            <div class="widget-content">
                                <div class="tab-content" id="myTabTableContent">
                                    <div role="tabpanel" class="tab-pane fade active in" id="article-submit" aria-expanded="true">
                                        <form class="pull-left">
                                            <div class="form-group row">
                                                <label for="inputKeyword" class="col-sm-3 form-control-label">Search</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="keyword">
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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Kembangkan Teknologi Perdesaan, Kementerian Desa Minta Bantuan Dewan Riset Nasional</td>
                                                    <td><div class="label label-success">Publish</div></td>
                                                    <td>2015-11-27 09:47:07</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-konsul">Update</a>
                                                        <a href="#" class="btn btn-danger btn-konsul">Delete</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Karut Marut Proses Perekrutan Pendamping UU No. 6 Tahun 2014 Tentang Desa</td>
                                                    <td><div class="label label-success">Publish</div></td>
                                                    <td>2015-11-27 09:47:07</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-konsul">Update</a>
                                                        <a href="#" class="btn btn-danger btn-konsul">Delete</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Warga Serbu Stand Kemendesa PDTT di Sail Tomini</td>
                                                    <td><div class="label label-success">Publish</div></td>
                                                    <td>2015-11-27 09:47:07</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-konsul">Update</a>
                                                        <a href="#" class="btn btn-danger btn-konsul">Delete</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <nav class="pull-right">
                                          <ul class="pagination">
                                            <li class="page-item">
                                              <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                                            <li class="page-item">
                                              <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                            </li>
                                          </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:content atas-->

            <!-- Begin Recent Activity -->
            <!-- start:content atas-->
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
                                                    <li><a href="#">Satu Satu lala lal lala</a></li>
                                                    <li><a href="#">Yang sangat di kagumi</a></li>
                                                    <li><a href="#">Pemerintah desa rancang UU desa baru</a></li>
                                                    <li><a href="#">Transparansi dana pembangunan desa</a></li>
                                                    <li><a href="#">Pembangunan desa tertinggal dengan metode terbaru</a></li>
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
                                                            foreach(array_reverse($recentMedia) as $media){
                                                                echo '<li class="bg-success">'.anchor($media->link, $media->title).'</li>';
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
                                                <div class="row">
                                                    <div class="list-timeline">
                                                        <div class="col-xs-3 date">
                                                            <i class="fa fa-file-text"></i>
                                                            <small class="text-green">26-01-2016</small>
                                                        </div>
                                                        <div class="col-xs-6 content">
                                                            <div class="title">
                                                                <p>Bagaimana pengelolaan dana anggaran dalam pembangunan desa yang telah di wacanakan oleh pemerintah sejak 2008?</p>
                                                                <button class="btn btn-sm btn-primary">show detail</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="latest-comment">
                                                <h4>Komentar terakhir Anda: </h4>
                                                <ul>
                                                    <li><a href="">Title Konsultasi</a>
                                                        <div class="comment">
                                                            <b>Comment :</b>
                                                            <p>Disini ada comment loh </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="category-konsultasi">
                                                <h4>Kategori konsultasi anda:</h4>
                                                <ul>
                                                    <li><a href="#">Kader Desa</a></li>
                                                    <li><a href="#">Hukum dan Pengetahuan</a></li>
                                                </ul>
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
                                                    <li>
                                                        <a href="#">
                                                            <p>Pengetahuan Dasar</p>
                                                        </a>
                                                        <button class="btn btn-start btn-md btn-block">Mulai Kelas</button>
                                                    </li>                                                
                                                    <li>
                                                        <a href="#">
                                                            <p>Dasar Dasar Kepemimpinan</p>
                                                        </a>
                                                        <button class="btn btn-start btn-md btn-block">Mulai Kelas</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="kelas-content">
                                                <h4>Kelas yang anda Ikuti:</h4>
                                                <ul>
                                                    <li><a href="#">Pengetahuan Dasar</a></li>
                                                    <li><a href="#">Dasar Dasar kepeminpinan</a></li>
                                                </ul>
                                            </div>
                                            <div class="latest-comment">
                                                <h4><i class="fa fa-wechat"></i> Kelas yang ada comment:</h4>
                                                <ul>
                                                    <li><a href="">Pengetahuan dasar</a>
                                                        <div class="comment">
                                                            <p><b>comment: </b>test test test</p>
                                                        </div>
                                                    </li>
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
            <!-- end:content atas-->
            <!-- End Recent Activity -->


<!-- start: content atas -->
<div class="row" id="app-cropit">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="content-articles">
            <div class="content-articles-heading">
                <h3>Submite Artikel</h3>
            </div>
        </section>
        <div class="container content-submit">
            <div class="widget">
                <div class="row">
                    <?php echo form_open('dashboard/sendArticle'); ?>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <fieldset class="form-group">
                                <label for="title">Judul Artikel</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="">
                                <small class="text-muted">Masukkan judul artikel disini</small>
                            </fieldset>
                            <fieldset class="form-group">
                                <textarea name="content" class="editor-simple"></textarea>
                            </fieldset>
                            <fieldset class="form-group hidden-sm-up">
                                 <input type="file" name="filemedia" id="filer_input_img">
                            </fieldset>
                            <fieldset class="form-group hidden-sm-up">
                                <label for="">Keterangan gambar</label>
                                <input type="text" class="form-control" name="caption-img">
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <!-- begin: category -->
                            <div class="widget">
                                <div class="widget-sidebar-heading">
                                    <h3>Category</h3>
                                </div>
                                <div class="widget-sidebar-content">
                                    <?php echo $categories_checkbox ?>
                                </div>
                            </div>
                            <!-- end: category -->
                            <!-- begin: image preview -->
                            <div class="widget hidden-lg-down">
                                <div class="widget-sidebar-heading">
                                    <h3>Gambar Fitur</h3>
                                </div>
                                <div class="widget-sidebar-content">
                                    <cropit-preview name="featured" :show-description="true"></cropit-preview>
                                    <cropit-result name="featured"></cropit-result>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('modal/featured'); ?>
</div> 
<!-- end: content atas -->

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
