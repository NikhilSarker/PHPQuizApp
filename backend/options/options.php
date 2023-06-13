<?php
require_once('../layouts/header.php');
require_once('../db_connect.php');

$checking_query = " SELECT * FROM `options` ORDER BY question_id ASC";
$checking_query_to_db = mysqli_query($db_connect, $checking_query);
//$result_to_array = mysqli_fetch_assoc($checking_query_to_db);
//print_r($result_to_array['result']);

?>

<link rel="stylesheet" href="./style.css" type="text/css">
<div id="main">
  <h2>Manage Options</h2>
  <table border="1">
  <tr>
    <th class="text-center">ID</th>
    <th class="text-center">Question ID</th>  
    <th class="text-center">Option Text</th>  
    <th class="text-center">Is Correct</th>   
    <th></th>
    <th></th>
  </tr>

    <?php while ($record = mysqli_fetch_assoc($checking_query_to_db)) : ?>
      <tr>
      <td class="text-center"><?php echo $record['id']; ?></td>
      <td class="text-center"><?php echo $record['question_id'] ; ?></td>
      <td class="text-left"><?php echo  $record['option_text'] ; ?></td>
      <td class="text-center"><?php echo $record['is_correct']; ?></td>
      <td class="text-center"><a href="options_edit.php?id=<?= $record['id']; ?>" class=" btn btn-info">Edit</a></td>
      <td class="text-center"><button  class="delete btn btn-danger" value="<?=$record['id'];?>" >Delete</button></td>
      </tr>
    <?php endwhile; ?>


  </table>

  <p class="add_btn"><a href="options_add.php"><i class="fas fa-plus-square"></i> Add Option</a></p>

</div>






<?php
require_once('../layouts/footer.php');
?>
<?php
if (isset($_SESSION["success"])) { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: '<?= $_SESSION["success"] ?>'
    })
  </script>
<?php
}
unset($_SESSION["success"]);
?>





<script>
  const deleteItem = document.querySelectorAll(".delete");
const deleteItemToArray = Array.from(deleteItem);
deleteItemToArray.map((deleteBtn) => {
    deleteBtn.addEventListener("click", function () {
      
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `options_delete.php?id=${deleteBtn.value}`;
  
        }
      })

    })

  })
</script>
      
      
      



























