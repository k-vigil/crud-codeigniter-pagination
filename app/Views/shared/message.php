<?php if (session()->getFlashdata('type') || !empty($errors)): ?>

<div class="alert alert-<?= session()->getFlashdata('type') ?? 'warning' ?> alert-dismissible fade show rounded-0" role="alert">
  <?php if (session()->getFlashdata('msg')): ?>
    <?= session()->getFlashdata('msg') ?>
    <?php else: ?>
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?= $e ?></li>
        <?php endforeach ?>
      </ul>
  <?php endif?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php endif ?>
