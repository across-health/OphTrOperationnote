<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<h3><?php echo $element->elementType->name ?></h3>
<div class="procedureContainer clearfix<?php echo ($last) ? ' last' : ''; ?>">
	<div class="rightHalf">
		<div class="detailRow clearfix">
			<?php
			$this->widget('application.modules.eyedraw.OEEyeDrawWidgetCataract', array(
				'side'=>$element->eye->getShortName(),
				'mode'=>'view',
				'size'=>200,
				'model'=>$element,
				'attribute'=>'eyedraw',
				'to_image'=>true,
			));
			?>
			<?php
			$this->widget('application.modules.eyedraw.OEEyeDrawWidgetSurgeonPosition', array(
				'side'=>$element->eye->getShortName(),
				'mode'=>'view',
				'size'=>200,
				'model'=>$element,
				'attribute'=>'eyedraw2',
				'to_image'=>true
			));
			?>
		</div>
		<div class="detailRow leftAlign">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('iol_type_id'))?>:
			</div>
			<div class="value">
				<?php echo $element->iol_type->name?>
			</div>
		</div>
		<div class="detailRow leftAlign">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('iol_power'))?>:
			</div>
			<div class="value">
				<?php echo $element->iol_power ?>
			</div>
		</div>
		<div class="detailRow leftAlign">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('iol_position_id'))?>:
			</div>
			<div class="value">
				<?php echo $element->iol_position->name?>
			</div>
		</div>
		<div class="detailRow clearVal">
			<div class="label">
				Complication Notes
			</div>
			<div class="value">
				<?php echo $element->complication_notes ?>
			</div>
		</div>
	</div>
	<div class="leftHalf">
		<div class="detailRow">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('incision_site_id'))?>:
			</div>
			<div class="value">
				<?php echo $element->incision_site->name?>
			</div>
		</div>
		<div class="detailRow">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('length'))?>:
			</div>
			<div class="value">
				<?php echo $element->length?>
			</div>
		</div>
		<div class="detailRow">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('meridian'))?>:
			</div>
			<div class="value">
				<?php echo $element->meridian?>
			</div>
		</div>
		<div class="detailRow">
			<div class="label">
				<?php echo CHtml::encode($element->getAttributeLabel('incision_type_id'))?>:
			</div>
			<div class="value">
				<?php echo $element->incision_type->name?>
			</div>
		</div>
		<div class="detailRow clearVal">
			<div class="label">
				Details
			</div>
			<div class="value">
				<?php echo $element->report2 ?>
			</div>
		</div>
		<div class="detailRow clearVal">
			<div class="label">
				Cataract Report
			</div>
			<div class="value pronounced">
				<?php foreach (explode(chr(10),$element->report) as $line) {?>
					<strong><?php echo $line?></strong><br>
				<?php }?>
			</div>
		</div>
		<div class="detailRow">
			<div class="label">
				Devices Used:
			</div>
			<div class="value">
				<?php if (!$element->operative_devices) {?>
					None
				<?php } else {?>
					<?php foreach ($element->operative_devices as $device) {?>
						<?php echo $device->name?><br>
					<?php }?>
				<?php }?>
			</div>
		</div>
		<div class="detailRow clearVal">
			<div class="label">
				Per Operative Complication
			</div>
			<div class="value">
				<?php if (!$element->complications) {?>
					None
				<?php } else {?>
					<?php foreach ($element->complications as $complication) {?>
						<?php echo $complication->name?></br>
					<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
</div>