<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>名前</th>
        <th>課程</th>
        <th>学年</th>
        <th>専攻・専門</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i=0; $i < count($gl_arr["VIEW_DATA"]["part_list"]["name"]); $i++){?>    
      <tr>
        <td>
          <?php echo $gl_arr["VIEW_DATA"]["part_list"]["name"][$i]["result_name"]?>
        </td>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["part_list"]["course"][$i]["course_name"]?>
        </td>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["part_list"]["grade"][$i]["grade_name"] ?>
        </td>
        <td>
         <?php echo $gl_arr["VIEW_DATA"]["part_list"]["ac"][$i]["ac_name"] ?>
        </td>
      </tr>

      <?php } ?>
    </tbody>
    
  </table>