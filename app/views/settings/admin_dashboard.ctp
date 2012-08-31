<script src="<?php echo $this->webroot;?>/fusion_charts/js/FusionCharts.js"></script>
 <?Php echo $this->Html->script(array('FusionCharts.js'));?>
<div class="dashboard index">
    <h2><?php echo $title_for_layout; ?></h2>
    
<table width="100%" border="1">
  <tr>
    <td>Package sold today<div class="dashboard_details_1"><?php echo $today_sell_details;?></div></td>
    <td>Total earning today<div class="dashboard_details_2"><?php 
    echo ($total_earning_today[0]['total']!=0) ? '&euro;'.$total_earning_today[0]['total'] : "None"; ?></div></td>
    <td>Best seller package <span style="color: #99CCCC;"><?php echo $best_sell_package;?></span></td>
  </tr>
  <tr>
    <td>Package sold this week<div class="dashboard_details_1"><?php echo $this_week_sell_details;?></div></td>
    <td>Total earning this month<div class="dashboard_details_2"><?php 
    echo ($total_earning_this_month[0]['total']!=0) ? 'USD:'.$total_earning_this_month[0]['total'] : "None";?></div></td>
    <td>Best seller vas <span style="color: #99CCCC;"><?php echo $best_sell_vas;?></span></td>
  </tr>
  <tr>
    <td>Package sold this month<div class="dashboard_details_1"><?php echo $this_month_sell_details;?></div></td>
    <td>&nbsp;</td>
    <td>Low seller package <span style="color: #99CCCC;"><?php echo $less_sell_package;?></span></td>
  </tr>
  <tr>
    <td>Package sold this year<div class="dashboard_details_1"><?php echo $this_year_sell_details;?></div></td>
    <td>&nbsp;</td>
    <td>Low seller vas <span style="color: #99CCCC;"><?php echo $less_sell_vas;?></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="1" style="margin-top: 20px;">
  <tr>
    <td id="multi_colum">
Loading...
    </td>
    <td id="pie_chart">
    Loading.....
    </td>
  </tr>
</table>

<script type="text/javascript">
	$(document).ready(function(){
		$('#pie_chart').load('<?php echo $this->webroot;?>admin/settings/pie3d');

		$('#multi_colum').load('<?php echo $this->webroot;?>admin/settings/line2d');
	});
</script>
</div>