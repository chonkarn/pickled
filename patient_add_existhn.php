
<script>
    if (confirm("HN นี้มีอยู่แล้วในฐานข้อมูล ต้องการจะแก้ไขหรือไม่ ") == true) {
        var x = <?php echo(json_encode($hn)); ?>;
        var y = <?php echo(json_encode($type)); ?>;
        window.location = 'patient_form.php?hn='+x+'&type='+y;
    } else {
        window.location = 'patient.php';
    }
</script>
