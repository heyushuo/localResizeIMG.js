<?php
 
    $base64_string = $_POST['base64_string'];

    $savename = uniqid().'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式

    $savepath = 'images/'.$savename; 

    $image = base64_to_img( $base64_string, $savepath );

    if($image){
        echo '{"status":1,"content":"上传成功","url":"'.$image.'"}';
    }else{
        echo '{"status":0,"content":"上传失败"}';
    } 

    function base64_to_img( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    } 
?>