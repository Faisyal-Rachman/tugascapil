<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Three steps
 * 1 - your order
 * 2 - checkout type
 * 3 - success order
 */

function purchase_steps($step1 = null, $step2 = null, $step3 = null)
{
    if ($step1 == 1) {
        $icon1 = ' <i class="zmdi zmdi-dot-circle zmdi-hc-2x" style="color:#0076FF"></i>';
        $class1 = 'step-bg-ok';
    } else {
        $icon1 = '<i class="zmdi zmdi-circle-o zmdi-hc-2x" style="color:#cccccc"></i>';
        $class1 = 'step-bg-not-ok';
    }
    if ($step2 == 2) {
        $icon2 = '<i class="zmdi zmdi-dot-circle zmdi-hc-2x" style="color:#0076FF"></i>';
        $class2 = 'step-bg-ok';
    } else {
        $icon2 = '<i class="zmdi zmdi-circle-o zmdi-hc-2x" style="color:#cccccc"></i>';
        $class2 = 'step-bg-not-ok';
    }
    if ($step3 == 3) {
        $icon3 = '<i class="zmdi zmdi-dot-circle zmdi-hc-2x" style="color:#0076FF"></i>';
        $class3 = 'step-bg-ok';
    } else {
        $icon3 = '<i class="zmdi zmdi-circle-o zmdi-hc-2x" style="color:#cccccc"></i>';
        $class3 = 'step-bg-not-ok';
    }
    ?>
	 <ons-card>
	<ons-row>
  <ons-col> <?= $icon1 ?> <?= lang('step_your_order') ?></ons-col>
  <ons-col> <?= $icon2 ?> <?= lang('step_payment_method') ?></ons-col>
  <ons-col><?= $icon3 ?> <?= lang('step_success_prod') ?></ons-col>
</ons-row>
   </ons-card>
    <?php
}
