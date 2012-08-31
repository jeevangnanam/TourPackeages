<div class="paddingb68">
<div class="background">
<div class="container_24  ">
<div class="col-padding">
<div class="wrapper">
<?php 
$this->pageTitle = 'Sitemap'; 
debug($dynamics);
?> 
<h1> 
    Sitemap 
</h1> 

<table cellpadding="0" cellspacing="0"> 
<?php 
if( isset($dynamics) && !empty($dynamics) ): 
    foreach ($dynamics as $dynamic): ?> 
    <tr> 
        <th> 
        <?php echo $html->link( 
                               $dynamic['options']['controllertitle'], 
                               array( 
                                          'controller' => $dynamic['options']['url']['controller'],  
                                          'action' => $dynamic['options']['url']['index'] 
                                          )); ?> 
        </th> 
    </tr> 
    <?php foreach ($dynamic['data'] as $section):?> 
    <tr> 
        <td> 
        > <?php echo $html->link( 
                              $section[$dynamic['model']][$dynamic['options']['fields']['name']], 
                               array( 
                                          'controller' => $dynamic['options']['url']['controller'],  
                                          'action' => $dynamic['options']['url']['action'],  
                                          $section[$dynamic['model']][$dynamic['options']['fields']['id']] 
                                          ) ); ?> 
        </td> 
    </tr> 
    <?php endforeach;?> 
    <tr> 
        <td class="clear">&nbsp;</td> 
    </tr> 
<?php 
    endforeach; 
endif; 

if(isset($statics) && !empty($statics) ):?> 
    <tr> 
        <td class="title"> 
            Misc 
        </td> 
    </tr> 
    <?php foreach ($statics as $static): ?> 
    <tr> 
        <td> 
        <?php echo $html->link( 
                               $static['title'], 
                               $static['url']); ?> 
        </td> 
    </tr> 
    <?php endforeach;?> 
    <tr> 
        <td class="clear">&nbsp;</td> 
    </tr> 
<?php endif; ?>    
</table>

</div>
</div>
</div>
</div>
</div>