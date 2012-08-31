<script type="text/javascript" src="/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "specific_textareas",
        editor_selector : "content",
		theme : "advanced",
		width: "800",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<?php $this->Html->script(array('nodes'), false); ?>
<div class="nodes form">
    <h2><?php echo $title_for_layout; ?></h2>
    <?php echo $this->Form->create('Node', array('url' => array('action' => 'add', $typeAlias)));?>
        <fieldset>
            <div class="tabs">
                <ul>
                    <li><a href="#node-main"><span><?php __($type['Type']['title']); ?></span></a></li>
                    <?php if (count($taxonomy) > 0) { ?><li><a href="#node-terms"><span><?php __('Terms'); ?></span></a></li><?php } ?>
                    <?php if ($type['Type']['comment_status'] != 0) { ?><li><a href="#node-comments"><span><?php __('Comments'); ?></span></a></li><?php } ?>
                    <li><a href="#node-meta"><span><?php __('Custom fields'); ?></span></a></li>
                    <li><a href="#node-access"><span><?php __('Access'); ?></span></a></li>
                    <li><a href="#node-publishing"><span><?php __('Publishing'); ?></span></a></li>
                    <?php echo $this->Layout->adminTabs(); ?>
                </ul>

                <div id="node-main">
                <?php
                    echo $this->Form->input('parent_id', array('type' => 'select', 'options' => $nodes, 'empty' => true));
                    echo $this->Form->input('title');
                    echo $this->Form->input('slug', array('class' => 'slug'));
                    echo $this->Form->input('excerpt');
                    echo $this->Form->input('body', array('class' => 'content'));
                ?>
                </div>

                <?php if (count($taxonomy) > 0) { ?>
                <div id="node-terms">
                <?php
                    foreach ($taxonomy AS $vocabularyId => $taxonomyTree) {
                        echo $this->Form->input('TaxonomyData.'.$vocabularyId, array(
                            'label' => $vocabularies[$vocabularyId]['title'],
                            'type' => 'select',
                            'multiple' => true,
                            'options' => $taxonomyTree,
                        ));
                    }
                ?>
                </div>
                <?php } ?>

                <?php if ($type['Type']['comment_status'] != 0) { ?>
                <div id="node-comments">
                <?php
                    echo $this->Form->input('comment_status', array(
                        'type' => 'radio',
                        'div' => array('class' => 'radio'),
                        'options' => array(
                            '0' => __('Disabled', true),
                            '1' => __('Read only', true),
                            '2' => __('Read/Write', true),
                        ),
                        'value' => $type['Type']['comment_status'],
                    ));
                ?>
                </div>
                <?php } ?>

                <div id="node-meta">
                    <div id="meta-fields">
                        <?php
                            $fields = array();
                            if (count($fields) > 0) {
                                foreach ($fields AS $fieldKey => $fieldValue) {
                                    echo $this->Layout->metaField($fieldKey, $fieldValue);
                                }
                            } else {
                                echo $this->Layout->metaField();
                            }
                        ?>
                        <div class="clear">&nbsp;</div>
                    </div>
                    <a href="#" class="add-meta"><?php __('Add another field'); ?></a>
                </div>

                <div id="node-access">
                    <?php
                        echo $this->Form->input('Role.Role');
                    ?>
                </div>

                <div id="node-publishing">
                <?php
                    echo $this->Form->input('status', array(
                        'label' => __('Published', true),
                        'checked' => 'checked',
                    ));
                    echo $this->Form->input('promote', array(
                        'label' => __('Promoted to front page', true),
                        'checked' => 'checked',
                    ));
                    echo $this->Form->input('user_id');
                    echo $this->Form->input('created');
                ?>
                </div>
                <?php echo $this->Layout->adminTabs(); ?>
                <div class="clear">&nbsp;</div>
            </div>
        </fieldset>
    <?php
        echo $this->Form->input('token_key', array(
            'type' => 'hidden',
            'value' => $this->params['_Token']['key'],
        ));
    ?>
    <div class="buttons">
    <?php
        echo $this->Form->submit(__('Apply', true), array('name' => 'apply'));
        echo $this->Form->end(__('Save', true));
        echo $this->Html->link(__('Cancel', true), array(
            'action' => 'index',
        ), array(
            'class' => 'cancel',
        ));
    ?>
    </div>
</div>