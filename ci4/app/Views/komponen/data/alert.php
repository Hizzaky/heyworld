        <!-- Notif -->
<?php
$dataSesi = session();
$sukses = $dataSesi->getFlashdata($alertSukses);
$fail = $dataSesi->getFlashdata($alertFail);

if (isset($sukses)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $sukses ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    </div>
<?php endif;
if (isset($fail)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $fail ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>