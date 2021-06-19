<h2>参加者名簿</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>名前</th>
        <th>学年</th>
        <th>課程</th>
        <th>専攻・専門</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
    </thead>
    <?php for($i = 0; $i < count($gl_arr["VIEW_DATA"]["book_list"]); $i++){ ?>

    
    <tbody>
      <tr>
        <td>
            <?php echo $gl_arr["VIEW_DATA"]["part_list"]?>
        </td>
        <td>
            #
        </td>
        <td>
            #
        </td>
        <td>
            #
        </td>
        <td>
            #
        </td>
        <td>
            #
        </td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>