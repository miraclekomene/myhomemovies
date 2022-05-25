<!-- <button type="submit" id="submit">load</button>
<div id="message"></div>
<ul id="pagination">1</ul> -->

<script>
// $(document).ready(function () {
//     $("#submit").click(function (e) {
//         var validate = Validate();
//         $("#message").html(validate);

//         CallAPI(1);
//     });
  
//     function CallAPI(page) {
//         $.ajax({
//             url: "https://api.themoviedb.org/3/movie/top_rated?language=en-US&query=" + "&page=" + page + "&include_adult=false",
//             data: { "api_key": "c9e0274b13597713a26a1de12ec39786" },
//             dataType: "json",
//             success: function (result, status, xhr) {
//                 var resultHtml = $("<div class=\"resultDiv\"><p>Names</p>");
//                 for (i = 0; i < result["results"].length; i++) {
  
//                     var image = result["results"][i]["profile_path"] == null ? "Image/no-image2.jpg" : "https://image.tmdb.org/t/p/w500/" + result["results"][i]["profile_path"];
  
//                     resultHtml.append("<div class=\"result\" resourceId=\"" + result["results"][i]["id"] + "\">" + "<img src=\"" + image + "\" />" + "<p><a>" + result["results"][i]["name"] + "</a></p></div>")
//                 }
  
//                 resultHtml.append("</div>");
//                 $("#message").html(resultHtml);
  
//                 Paging(result["total_pages"]);
//             },
//             error: function (xhr, status, error) {
//                 $("#message").html("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
//             }
//         });
//     }
  
//     function Paging(totalPage) {
//         var obj = $("#pagination").twbsPagination({
//             totalPages: totalPage,
//             visiblePages: 24,
//             onPageClick: function (event, page) {
//                 CallAPI(page);
//             }
//         });
//     }
  
//     $(document).ajaxStart(function () {
//         $(".imageDiv img").show();
//     });
  
//     $(document).ajaxStop(function () {
//         $(".imageDiv img").hide();
//     });
// });

</script>





<?php
//Getting default page number
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
// Formula for pagination
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
    "SELECT COUNT(*) FROM top_rated";
    // $result = $total_pages_sql;
    // $total_rows = mysqli_fetch_array($result)[0];
    // $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM top_rated LIMIT $offset, $no_of_records_per_page";
    // $res_data = mysqli_query($toprated,$sql);
    // $cnt=1;
    // while($row = mysqli_fetch_array($res_data)){?>
<tr>
    <td><?php //echo $cnt;?></td>
    <td><?php //echo $row['Name'];?></td>
    <td><?php //echo $row['PhoneNumber'];?></td>
    <td><?php //echo $row['Emailid'];?></td>
    <td><?php //echo $row['PostingDate'];?></td>
</tr>
 <?php
// $cnt++;
//   }
//     ?>
</table>
<!-- <div align="center">
    <ul class="pagination" >
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php //if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php //if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php //if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php //if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php //echo $total_pages; ?>">Last</a></li>
    </ul>
</div> -->