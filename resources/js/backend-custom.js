$(document).ready(function() {
  // console.log('dom');
    $('#checkall').click(function() {
      // console.log('checkall click');
      var checked = $(this).prop('checked');
      $('input[type=checkbox][id^="permission"]').prop('checked', checked);
    });
  })
  