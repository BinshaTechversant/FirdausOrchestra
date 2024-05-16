$(document).ready(function(){$("#checkall").click(function(){var c=$(this).prop("checked");$('input[type=checkbox][id^="permission"]').prop("checked",c)})});
