<script>
//alert("♥");
     if (confirm("ต้องการกรอกข้อมูลสรุปเยี่ยมบ้านหรือไม่?") == true) {
         var sum_id = <?php echo $sum_id;?>;
         var sum_hn = <?php echo $sum_hn;?>;
        location.href = 'summary_form.php?hn='+sum_hn+'&calendar_id='+sum_id;
         
    } else {
        location.href = 'calendar.php';
    }
    

</script>