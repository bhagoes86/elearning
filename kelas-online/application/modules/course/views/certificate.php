<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sertifikat</title>
  <link rel="stylesheet" href="../fonts/droid/stylesheet.css">
  <style type="text/style">
    html,
    body {
      margin: 0;
      padding: 0;
    }
    body {
      background-color: #fff;
      font-family: 'droid_serifitalic';
    }
    #wrapper {
      width: 900px;
      height: 600px;
      margin-top: 40px;
      margin-left: auto;
      margin-right: auto;
    }
    .sertifikat {
      /*background-image: url('../../../../app/files/kelas-online/bg.jpg');*/
      text-align: center;
    }
    .sertifikat-header {
      padding-top: 35px;
      padding-bottom: -5px;
    }
    .sertifikat-content {
      background-color: #f5f5f5;
      padding-top: 25px;
      padding-bottom: 25px;
      padding-left: 100px;
      padding-right: 100px;
    }
    .sertifikat-content h3 {
      margin-top: 0;
      font-size: 36px;
      font-family: 'droid_bold_italic';
    }
    .sertifikat-content h4 {
      font-size: 22px;
      font-family: 'droid_serifitalic';
      font-weight: 300;
    }
    .sertifikat-content p.no,
    .sertifikat-content p.date {
      font-size: 18px;
      margin-bottom: 0;
      margin-top: 0;
    }
    .sertifikat-content-author { margin-top: 75px; }
    .sertifikat-content .sertifikat-content-author p {
      margin-top: 0;
      margin-bottom: 6px;
    }
    .sertifikat-content .sertifikat-content-author p strong {
      font-size: 16px;
      padding-bottom: 4px;
      border-bottom: 2px solid #ddd;
    }
    .sertifikat-content .sertifikat-content-author p small { font-size: 12px; }
  </style>
</head>
<body>

  <section class="sertifikat" id="wrapper">
    <div class="sertifikat-header">
      <img src="<?php echo PATH_ROOT . '/public/images/sertifikat/header-sertifikat.jpg' ?>"alt="">
    </div>
    <div class="sertifikat-content">
      <h3>Sertifikat</h3>

      <h4>Menyatakan bahwa <strong><?php echo $member->user->full_name ?></strong> telah berhasil menyelesaikan materi "<?php echo $course->name; ?>"</h4>

      <p class="no">No Sertifikat : <strong><?php echo $course->code ?></strong></p>
      <p class="date"><?php echo $member->started_at->format('d F Y') ?></p>

      <div class="sertifikat-content-author">
        <p><strong><?php echo $course->instructor->full_name ?></strong></p>
        <p><small>Pemateri</small></p>
      </div>
    </div>
  </section>

</body>
</html>