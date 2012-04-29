<?php
/**
 * Copyright (c) 2012 Thomas Tanghus <thomas@tanghus.net>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
?>
<td id="importaddressbook_dialog" title="<?php echo $l->t("Import Addressbook"); ?>" colspan="6">
<table>
<tr>
	<th><?php echo $l->t('Select address book to import to:') ?></th>
	<td>
		<select id="book" name="book" class="float">
		<?php
		$contacts_options = OC_Contacts_Addressbook::all(OC_User::getUser());
		echo html_select_options($contacts_options, $contacts_options[0]['id'], array('value'=>'id', 'label'=>'displayname'));
		?>
		</select>
		<span id="import_drop_target" class="droptarget float"><?php echo $l->t("Drop a VCF file to import contacts."); ?> (Max. <?php echo  $_['uploadMaxHumanFilesize']; ?>)</span>
		<a class="svg upload float" title="<?php echo $l->t('Select from HD'); ?>"></a>
	</td>
</tr>
</table>
<form id="import_upload_form" action="<?php echo OC_Helper::linkTo('contacts', 'ajax/uploadimport.php'); ?>" method="post" enctype="multipart/form-data" target="import_upload_target">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_['uploadMaxFilesize'] ?>" id="max_upload">
<input id="import_upload_start" type="file" accept="text/*" name="importfile" />
<input id="close_button" style="float: left;" type="button" onclick="Contacts.UI.Addressbooks.cancel(this);" value="<?php echo $l->t("Cancel"); ?>">
<iframe name="import_upload_target" id='import_upload_target' src=""></iframe>
</form>
</td>
<script type="text/javascript">
Contacts.UI.Addressbooks.loadImportHandlers();
</script>