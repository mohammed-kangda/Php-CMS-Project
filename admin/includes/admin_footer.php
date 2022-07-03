</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>
    <script>

        $(document).ready(function () {

            // when user clicks on 'th' input:checkbox then
            $('#selectAllBoxes input').click(function(){

                // if 'th' input:checkbox is checked then
                if(this.checked){

                    // checking all the checkboxes
                    $(':checkbox').each(function(){
                        this.checked = true;
                    })

                }
                
                // if 'th' input:checkbox not checked then
                else{

                    // unchecking other checkboxes       
                    $(':checkbox').each(function(){
                        this.checked = false;
                    })
                    
                }

            });

            var divBox = "<div id='load-screen'><div id='loading'></div></div>";
            $('body').prepend(divBox);
            $('#load-screen').delay(1000).fadeOut(600,function(){
                $(this).remove();
            })
            
        });

    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>