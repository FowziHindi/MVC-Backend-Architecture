$(window).ready(function () {
  $('.datepicker').datetimepicker({
    format:'Y-m-d',
    timepicker:false
  });

  $('.datetimepicker').datetimepicker({
    format:'Y-m-d H:i:s'
  });
});

function showConfirmDialog(module, removeId) {
  var r = confirm("Are you sure you want to delete this?");
  if (r === true) {
    window.location.replace("index.php?module=" + module + "&action=delete&id=" + removeId);
  }
}