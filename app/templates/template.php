<?php include $this->config['rootFolder'] . 
              $this->config['dirs']['application'] . 
              $this->config['dirs']['templates'] . 'header.php'; ?>
<div>
    <?php include $contentView; ?>
</div>
<?php include $this->config['rootFolder'] . 
              $this->config['dirs']['application'] . 
              $this->config['dirs']['templates'] . 'footer.php'; ?>
