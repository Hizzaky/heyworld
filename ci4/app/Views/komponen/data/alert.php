        <!-- Notif -->
<?php
$dataSesi = session();
$alertSukses = $dataSesi->getFlashdata($sukses);
$alertFail = $dataSesi->getFlashdata($fail);

if (isset($alertSukses)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $alertSukses ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    </div>
<?php endif;
if (isset($alertFail)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $alertFail ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>