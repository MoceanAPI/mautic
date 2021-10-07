<?php

$view->extend("MauticCoreBundle:Default:content.html.php");
$view['slots']->set('headerTitle', $heading);

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<div class="table-responsive bg-white" style="padding: 1em;">
<table id="data" class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>Sender</th>
      <th>Datetime</th>
      <th>Message</th>
      <th>Recipient</th>
      <th>Response</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach($history as $h) {
        $dtHelper  = new \Mautic\CoreBundle\Helper\DateTimeHelper($h->getDatetime(), 'Y-m-d H:i:m', 'local');
        $utcString = $dtHelper->toUtcString();
        echo "<tr>";
        echo "<td>".$h->getSender()."</td>";
        echo "<td>".$utcString."</td>";
        echo "<td>".$h->getMessage()."</td>";
        echo "<td>".$h->getRecipient()."</td>";
        echo "<td>".$h->getResponse()."</td>";
        echo "<td>".$h->getStatus()."</td>";
        echo "</tr>";
      }
    ?>
    </tbody>
  </table>
  <button style="float: right;"><a href=<?php echo $action ?>>Export Log</a></button>
</div>

<script>
  $(document).ready(function () {
    $('#data').DataTable({'order': [[ 1, 'desc' ]]});
  });
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>