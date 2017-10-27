<?php
/**
 * The create view file of webhook module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     webhook 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/form.html.php';?>
<div class='container mw-1400px'>
  <div id="titlebar">
    <div class="heading">
      <strong><?php echo $lang->webhook->api;?></strong>
      <small class="text-muted"> <?php echo $lang->webhook->create;?> <i class="icon-pencil"></i></small>
    </div>
  </div>
  <form id='webhookForm' method='post' class='ajaxForm'>
    <table class='table table-form'>
      <tr>
        <th class='w-80px'><?php echo $lang->webhook->name;?></th>
        <td class='w-p50'><?php echo html::input('name', '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->webhook->url;?></th>
        <td><?php echo html::input('url', '', "class='form-control'");?></td>
        <td><?php if($type == 'dingding') echo $lang->webhook->note->dingding;?></td>
      </tr>
      <?php if($type != 'dingding'):?>
      <tr>
        <th><?php echo $lang->webhook->contentType;?></th>
        <td><?php echo html::select('contentType', $config->webhook->contentTypes, '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->webhook->sendType;?></th>
        <td><?php echo html::select('sendType', $lang->webhook->sendTypeList, '', "class='form-control'");?></td>
        <td><?php echo $lang->webhook->note->async;?></td>
      </tr>
      <?php endif;?>
      <tr>
        <th><?php echo $lang->webhook->product;?></th>
        <td><?php echo html::select('products[]', $products, '', "class='form-control chosen' multiple");?></td>
        <td><?php echo $lang->webhook->note->product;?></td>
      </tr>
      <tr>
        <th><?php echo $lang->webhook->project;?></th>
        <td><?php echo html::select('projects[]', $projects, '', "class='form-control chosen' multiple");?></td>
        <td><?php echo $lang->webhook->note->project;?></td>
      </tr>
      <?php if($type != 'dingding'):?>
      <tr>
        <th><?php echo $lang->webhook->params;?></th>
        <td class='labelWidth' colspan='2'><?php echo html::checkbox('params', $lang->webhook->paramsList, 'text');?></td>
      </tr>
      <?php endif;?>
      <tr>
        <th><?php echo $lang->webhook->action;?></th>
        <td colspan='2'>
          <table class='table table-bordered'>
            <?php foreach($config->webhook->objectTypes as $objectType => $actions):?>
            <tr>
              <td class='w-90px'>
                <label class='checkbox-inline'>
                  <input type='checkbox' class='objectType'><strong><?php echo $objectTypes[$objectType];?></strong>
                </label>
              </td>
              <td class='labelWidth'><?php echo html::checkbox("actions[$objectType]", $objectActions[$objectType]);?></td>
            </tr>
            <?php endforeach;?>
          </table>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->webhook->desc;?></th>
        <td colspan='2'><?php echo html::textarea('desc', '', "rows='3' class='form-control'");?></td>
      </tr>
      <tr>
        <th></th>
        <td><?php echo html::submitButton();?></td>
        <td></td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.lite.html.php';?>
