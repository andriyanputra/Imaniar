<script>
$(document).ready(function(){
  var count = 1;
  $('#add').click(function(){
    count = count + 1;
    var html_code = "<tr id='row"+count+"'>";
      html_code += "<td contenteditable='true' class='item_gl'></td>";
      html_code += "<td contenteditable='true' class='item_desc'></td>";
      html_code += "<td contenteditable='true' class='item_kredit'></td>";
      html_code += "<td contenteditable='true' class='item_cost' ></td>";
      html_code += "<td><button name='remove' data-row='row"+count+"' class='btn btn-danger btn-mini remove'><i class='icon-trash bigger-120'></i></button></td>";   
      html_code += "</tr>";  
    $('#crud_table').append(html_code);
  });

  $(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
    $('#' + delete_row).remove();
  });

  $('#save').click(function(){
    var item_gl = [];
    var item_desc = [];
    var item_kredit = [];
    var item_cost = [];
    $('.item_gl').each(function(){
      item_gl.push($(this).text());
    });
    $('.item_desc').each(function(){
      item_desc.push($(this).text());
    });
    $('.item_kredit').each(function(){
      item_kredit.push($(this).text());
    });
    $('.item_cost').each(function(){
      item_cost.push($(this).text());
    });
  
    $.ajax({
      url:"inc/insert.php",
      method:"POST",
      data:{item_gl:item_gl, item_desc:item_desc, item_kredit:item_kredit, item_cost:item_cost},
      success:function(data){
        alert(data);
        $("td[contentEditable='true']").text("");
        for(var i=2; i<= count; i++)
        {
          $('tr#'+i+'').remove();
        }
          //fetch_item_data();
          window.location.href = "http://example.com/new_url";
      }
    });
  });

  function fetch_item_data()
  {
    $.ajax({
      url:"template/fetch.php",
      method:"POST",
      success:function(data)
      {
        $('#inserted_item_data').html(data);
      }
    })
  }
  fetch_item_data();
 
});
</script>