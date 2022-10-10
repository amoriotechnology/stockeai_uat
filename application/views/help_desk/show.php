  <?php
  foreach ($service_list as $services) {

                         ?>
<h1><?php echo html_escape($services['title']);?></h1>
<p><?php echo html_escape($services['description']);?></p>
<?php } ?>