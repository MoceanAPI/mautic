<?php

$view->extend("MauticCoreBundle:Default:content.html.php");
$view['slots']->set('headerTitle', $heading);

?>
<div class="box-layout">
  <?php echo $view['form']->start($form); ?>
  <div class="col-md-9 bg-auto height-auto bdr-r">
    <div class="pa-md">
      <div class="form-group mb-10">

        <div class="row mt-xs">
          <div class="col-sm-6">
            <label class="control-label mb-xs">Credit Balance</label>
            <p><?php echo $credit; ?></p>
          </div>
        </div>

        <div class="row mt-xs">
          <div class="col-sm-6">
            <label class="control-label mb-xs"><?php echo $view['form']->label($form['recipient']); ?></label>
            <?php echo $view['form']->widget($form['recipient'], ['attr' => ['onchange' => 'showBySelect(this)']]); ?>
          </div>
        </div>

        <div class="row mt-xs" id="specificRecipientDiv" style="display: none;">
          <div class="col-sm-6">
            <label class="control-label mb-xs"><?php echo $view['form']->label($form['specific_recipients']); ?></label>
            <?php echo $view['form']->widget($form['specific_recipients']); ?>
          </div>
        </div>
        
        <div class="row mt-xs" id="specificNumberDiv" style="display: none;">
          <div class="col-sm-6">
            <label class="control-label mb-xs"><?php echo $view['form']->label($form['specific_numbers']); ?></label>
            <?php echo $view['form']->widget($form['specific_numbers']); ?>
          </div>
        </div>

        <div class="row mt-xs">
          <div class="col-sm-6">
            <label class="control-label mb-xs"><?php echo $view['form']->label($form['message']); ?></label>
            <?php echo $view['form']->widget($form['message']); ?>
          </div>
        </div>
        
        <div class="row mt-xs">
          <div class="col-sm-6">
            <?php echo $view['form']->widget($form['send'], ['attr' => ['style' => 'float: right']]); ?>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <?php echo $view['form']->end($form); ?>
</div>

<script type="text/javascript">
  function showBySelect(selected) {
      if (selected.value == "2") {
          document.getElementById("specificRecipientDiv").style.display = "block";
          document.getElementById("specificNumberDiv").style.display = "none";
      }
      else if (selected.value == "3") {
          document.getElementById("specificNumberDiv").style.display = "block";
          document.getElementById("specificRecipientDiv").style.display = "none";
      }
      else {
          document.getElementById("specificNumberDiv").style.display = "none";
          document.getElementById("specificRecipientDiv").style.display = "none";
      }
  }
</script>