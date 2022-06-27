

          <?php
            $success = $this->session->flashdata('success');
            $error   = $this->session->flashdata('error');
            if (!empty($success))
             {
          ?>
           $.notify({
                
                icon: 'glyphicon glyphicon-info-sign',
                title: '<b>Notification</b><br>',
                message: '<?php echo $success ?>',
            },
            {
                
                
                type: "success alert-success-alt col-md-3",
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1431,
                delay: 5000,
                timer: 1000,
                animate: {
                    enter: 'animated bounceInDown',
                    exit: 'animated bounceOutUp'
                }
            });
        <?php
       
            } 
            if (!empty($error))
             {
        ?>
           $.notify({
                    
                    icon: 'glyphicon glyphicon-info-sign',
                    title: '<b>Notification</b><br>',
                    message: '<?php echo $error ?>',
                },{
                    
                    
                    type: "danger",
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1431,
                    delay: 5000,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
           <?php            
             }
            ?>
 