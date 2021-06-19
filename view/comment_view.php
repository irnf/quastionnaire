<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>日付</th>
        <th>採決</th>
        <th>チェック</th>
        <th>内容</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i=0; $i < count($gl_arr["VIEW_DATA"]["comment_list"]); $i++ ) {?>
      <tr>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["comment_list"][$i]["insert_dt"] ?>
        </td>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["comment_list"][$i]["comment_status"] ?>
        </td>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["comment_list"][$i]["comment_check"] ?>
        </td>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["comment_list"][$i]["comment_comment"] ?>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>